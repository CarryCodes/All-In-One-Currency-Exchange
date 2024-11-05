<?php

/**
 * Setup WC Functions
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_WCFunc
{

	public function __construct()
	{
		// Load Wc Functions

		add_filter('woocommerce_get_price_html', array($this, 'shopProductPage'), 10, 2);
		add_filter('woocommerce_cart_item_price', array($this, 'cartItemPrice'), 10, 2);
		add_filter('woocommerce_cart_item_subtotal', array($this, 'cartItemSubtotal'), 10, 2);
		add_filter('woocommerce_cart_total', array($this, 'cartTotal'), 10, 2);
		add_filter('woocommerce_order_formatted_line_subtotal', array($this, 'orderDetailsSubtotal'), 10, 2);
		add_filter('woocommerce_order_subtotal_to_display', array($this, 'orderDetailsTotal'), 10, 3);
		add_filter('woocommerce_get_formatted_order_total', array($this, 'orderDetailsTotal2'), 10, 2);
	}
	/**
	 * Retrieves the conversion rate for a given currency using an external API.
	 * If the conversion rate is available in the transient cache, it will be returned.
	 * If the quota limit is reached, it will return the quota message.
	 * If the API request fails, it will return null.
	 *
	 * @param string $currency The target currency for conversion.
	 *
	 * @return float|string|null The conversion rate if available, quota message if limit reached, or null if request fails.
	 * @since 1.0.0
	 */
	function getConversionRate($currency)
	{
		$conversion_rate = get_transient('conversionRate' . $currency);
		if ($conversion_rate !== false) {
			return $conversion_rate;
		}
		$quota = get_transient('quota');
		if ($quota !== false) {
			return $quota;
		}
		$APIKEY = get_option(AIOCE_PREFIX . 'apikey');
		$api_url = AIOCE_API . AIOCE_API_VERSION . $APIKEY . '/' . 'latest/' . get_woocommerce_currency() . '/' . $currency;
		$response = wp_remote_get($api_url);

		if (is_wp_error($response)) {
			return null;
		}

		$body = wp_remote_retrieve_body($response);
		$data = json_decode($body, true);
		if (isset($data['status'])) {
			if ($data['status'] == 'fail') {
				if ($data['message'] == 'Quota has not remining requests!') {
					set_transient(AIOCE_PREFIX . 'quota', null, AIOCE_API_TRANSIENTFAIL);
				}
				return null;
			}
		}
		if (!isset($data['conversion_rate'])) {
			return null;
		}

		$conversion_rate = floatval($data['conversion_rate']);
		set_transient(AIOCE_PREFIX . 'conversionRate' . $currency, $conversion_rate, AIOCE_API_TRANSIENT);

		return $conversion_rate;
	}
	/**
	 * Prepares the price for display in the other currency.
	 *
	 * This function retrieves the conversion rate for the target currency,
	 * multiplies the original price by the conversion rate, and formats the result.
	 * If the conversion rate is not available, it returns null.
	 *
	 * @param float $original_price The original price in the current currency.
	 *
	 * @return string|null The formatted price in the target currency, or null if the conversion rate is not available.
	 * @since 1.0.0
	 */
	public function preparePrice($original_price)
	{
		$currency = get_option(AIOCE_PREFIX . 'wc_currency');
		$conversion_rate = $this->getConversionRate($currency);
		if ($conversion_rate == null) {
			return null;
		}
		$converted_price = $original_price * $conversion_rate;
		$converted_price =  round($converted_price, 2);
		$formatted_converted_price = wc_price($converted_price, array('currency' => $currency));
		return $formatted_converted_price;
	}
	/**
	 * Prepares the necessary data for the block to display in the frontend.
	 *
	 * This function retrieves the selected currency, the conversion rate for the selected currency,
	 * and the settings for displaying the currency in different WooCommerce pages.
	 *
	 * @return array|null An associative array containing the currency, conversion rate, and settings,
	 *                    or null if the conversion rate is not available.
	 *                    The array has the following structure:
	 *                    [
	 *                      'currency' => string,
	 *                      'conversion_rate' => float,
	 *                      'settings' => array
	 *                    ]
	 * @since 1.0.0
	 */
	public function prepareBlock()
	{

		$currency = get_option(AIOCE_PREFIX . 'wc_currency');
		$conversion_rate = $this->getConversionRate($currency);
		// if ($conversion_rate == null) {
		// 	return null;
		// }
		$settings = [];
		foreach ($this->registered_settings() as $key) {
			$value = get_option($key, '');
			$settings[$key] = $value;
		}
		return array('currency' => $currency, 'conversion_rate' => $conversion_rate, 'settings' => $settings);
	}
	/**
	 * Modifies the price display in the shop and single product pages.
	 *
	 * This function checks if the current page is the shop or a product category page, and if the
	 * "Display in Shop" option is enabled in the plugin settings. If both conditions are met,
	 * it retrieves the original price of the product, converts it to the selected currency,
	 * and appends the converted price to the original price in parentheses.
	 *
	 * @param string $price The original price HTML.
	 * @param WC_Product $product The product object.
	 *
	 * @return string The modified price HTML with the converted price appended.
	 * @since 1.0.0
	 */
	function shopProductPage($price, $product)
	{

		if ((is_shop() || is_product_category()) && !get_option(AIOCE_PREFIX . 'wc_shop')) {
			return $price;
		} else if (is_product() && !get_option(AIOCE_PREFIX . 'wc_product')) {
			return $price;
		}
		$original_price = wc_get_price_to_display($product);
		$formatted_converted_price = $this->preparePrice($original_price);
		if ($formatted_converted_price == null)
			return $price;
		$price .= ' (' . $formatted_converted_price . ')';

		return $price;
	}
	/**
	 * Modifies the price display in the cart and checkout pages.
	 *
	 * This function checks if the current page is the cart or checkout page, and if the
	 * "Display in Cart/Checkout" option is enabled in the plugin settings. If both conditions are met,
	 * it retrieves the original price of the product in the cart, converts it to the selected currency,
	 * and appends the converted price to the original price in parentheses.
	 *
	 * @param string $price The original price HTML.
	 * @param array $cart_item The cart item data.
	 *
	 * @return string The modified price HTML with the converted price appended.
	 * @since 1.0.0
	 */
	function cartItemPrice($price, $cart_item)
	{
		if (is_cart() && !get_option(AIOCE_PREFIX . 'wc_cart')) {
			return $price;
		} else if (is_checkout() && !get_option(AIOCE_PREFIX . 'wc_checkout')) {
			return $price;
		}
		$product = $cart_item['data'];
		$original_price = wc_get_price_to_display($product);
		$formatted_converted_price = $this->preparePrice($original_price);
		if ($formatted_converted_price == null)
			return $price;
		$price .= ' (' . $formatted_converted_price . ')';

		return $price;
	}
	/**
	 * Modifies the subtotal display in the cart and checkout pages.
	 *
	 * This function checks if the current page is the cart or checkout page, and if the
	 * "Display in Cart/Checkout" option is enabled in the plugin settings. If both conditions are met,
	 * it retrieves the original subtotal of the products in the cart, converts it to the selected currency,
	 * and appends the converted subtotal to the original subtotal in parentheses.
	 *
	 * @param string $subtotal The original subtotal HTML.
	 * @param array $cart_item The cart item data.
	 *
	 * @return string The modified subtotal HTML with the converted subtotal appended.
	 * @since 1.0.0
	 */
	function cartItemSubtotal($subtotal, $cart_item)
	{

		if (is_cart() && !get_option(AIOCE_PREFIX . 'wc_cart')) {
			return $subtotal;
		} else if (is_checkout() && !get_option(AIOCE_PREFIX . 'wc_checkout')) {
			return $subtotal;
		}

		$product = $cart_item['data'];
		$original_price = wc_get_price_to_display($product) * $cart_item['quantity'];
		$formatted_converted_subtotal = $this->preparePrice($original_price);
		if ($formatted_converted_subtotal == null)
			return $subtotal;
		$subtotal .= ' (' . $formatted_converted_subtotal . ')';

		return $subtotal;
	}
	/**
	 * Modifies the total display in the cart and checkout pages.
	 *
	 * This function checks if the current page is the cart or checkout page, and if the
	 * "Display in Cart/Checkout" option is enabled in the plugin settings. If both conditions are met,
	 * it retrieves the original total of the products in the cart, converts it to the selected currency,
	 * and appends the converted total to the original total in parentheses.
	 *
	 * @param string $total The original total HTML.
	 *
	 * @return string The modified total HTML with the converted total appended.
	 * @since 1.0.0
	 */
	function cartTotal($total)
	{
		if (is_cart() && !get_option(AIOCE_PREFIX . 'wc_cart')) {
			return $total;
		} else if (is_checkout() && !get_option(AIOCE_PREFIX . 'wc_checkout')) {
			return $total;
		}
		$cart_total = WC()->cart->get_total('edit');
		$cart_total_numeric = floatval(wp_strip_all_tags($cart_total));

		$formatted_converted_total = $this->preparePrice($cart_total_numeric);
		if ($formatted_converted_total == null)
			return $total;
		$total .= ' (' . $formatted_converted_total . ')';

		return $total;
	}
	/**
	 * Modifies the subtotal display in the thank you page.
	 *
	 * This function checks if the "Display in Thank You" option is enabled in the plugin settings.
	 * If the option is enabled and the current page is the thank you page, it retrieves the original subtotal
	 * of the products in the order, converts it to the selected currency, and appends the converted subtotal
	 * to the original subtotal in parentheses.
	 *
	 * @param string $subtotal The original subtotal HTML.
	 * @param array $order_item The order item data.
	 *
	 * @return string The modified subtotal HTML with the converted subtotal appended.
	 * @since 1.0.0
	 */
	function orderDetailsSubtotal($subtotal, $order_item)
	{
		if (!get_option(AIOCE_PREFIX . 'wc_thank_you')) {
			return $subtotal;
		}
		if (is_order_received_page()) {
			$original_price = $order_item['subtotal'];
			$subtotal_numeric = floatval(wp_strip_all_tags($original_price));
			$formatted_converted_subtotal = $this->preparePrice($subtotal_numeric);
			if ($formatted_converted_subtotal != null) {
				$subtotal .= ' (' . $formatted_converted_subtotal . ')';
			}
		}
		return $subtotal;
	}
	/**
	 * Modifies the total display in the thank you page.
	 *
	 * This function checks if the "Display in Thank You" option is enabled in the plugin settings.
	 * If the option is enabled and the current page is the thank you page, it retrieves the original total
	 * of the products in the order, converts it to the selected currency, and appends the converted total
	 * to the original total in parentheses.
	 *
	 * @param string $total The original total HTML.
	 * @param WC_Order $order The order object.
	 *
	 * @return string The modified total HTML with the converted total appended.
	 * @since 1.0.0
	 */
	function orderDetailsTotal($total, $compound, $order)
	{

		if (!get_option(AIOCE_PREFIX . 'wc_thank_you')) {
			return $total;
		}
		if (is_order_received_page()) {
			$total_numeric = floatval(wp_strip_all_tags($order->get_total()));
			$formatted_converted_total = $this->preparePrice($total_numeric);
			if ($formatted_converted_total != null) {
				$total .= ' (' . $formatted_converted_total . ')';
			}
		}
		return $total;
	}
	/**
	 * Modifies the total display in the thank you page.
	 *
	 * This function checks if the "Display in Thank You" option is enabled in the plugin settings.
	 * If the option is enabled and the current page is the thank you page, it retrieves the original total
	 * of the products in the order, converts it to the selected currency, and appends the converted total
	 * to the original total in parentheses.
	 *
	 * @param string $total The original total HTML.
	 * @param WC_Order $order The order object.
	 *
	 * @return string The modified total HTML with the converted total appended.
	 * @since 1.0.0
	 */
	function orderDetailsTotal2($total, $order)
	{

		if (!get_option(AIOCE_PREFIX . 'wc_thank_you')) {
			return $total;
		}
		if (is_order_received_page()) {
			$total_numeric = floatval(wp_strip_all_tags($order->get_total()));
			$formatted_converted_total = $this->preparePrice($total_numeric);
			if ($formatted_converted_total != null) {
				$total .= ' (' . $formatted_converted_total . ')';
			}
		}
		return $total;
	}
	private static $instance;
	/**
	 * Retrieves the singleton instance of the AIOCE_WCFunc class.
	 *
	 * This method ensures that only one instance of the class is created throughout the application.
	 * If an instance already exists, it will be returned. Otherwise, a new instance will be created.
	 *
	 * @return AIOCE_WCFunc The singleton instance of the class.
	 * @since 1.0.0
	 */
	public static function get_instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Retrieves the list of registered settings for the plugin.
	 *
	 * This function returns an array of strings, each representing a unique setting option for the plugin.
	 * The options are prefixed with the AIOCE_PREFIX constant and correspond to different WooCommerce settings.
	 *
	 * @return array An array of strings representing the registered settings.
	 * @since 1.0.0
	 */
	private function registered_settings()
	{
		$options = array(
			AIOCE_PREFIX . 'wc_currency',
			AIOCE_PREFIX . 'wc_shop',
			AIOCE_PREFIX . 'wc_product',
			AIOCE_PREFIX . 'wc_cart',
			AIOCE_PREFIX . 'wc_checkout',
			AIOCE_PREFIX . 'wc_thank_you',
			AIOCE_PREFIX . 'wc_my_account',

		);
		return $options;
	}
}

AIOCE_WCFunc::get_instance();
