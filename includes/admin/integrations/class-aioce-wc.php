<?php

/**
 * Setup Woocommerce integration
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_WOOCOMMERCE
{

	public function __construct()
	{
		// Add block widget items
		add_action('init', array($this, 'register_widgets'));
	}


	/**
	 * Register widgets
	 *
	 * @since 1.0.0
	 */
	public function register_widgets()
	{

		if (!did_action('woocommerce_blocks_loaded')) {
			return;
		}
		require_once AIOCE_ABSPATH . 'includes/admin/integrations/wc/class-aioce-wc-blocks.php';
		add_action(
			'woocommerce_blocks_mini-cart_block_registration',
			function ($integration_registry) {
				$integration_registry->register(AIOCE_WC_BLOCKS::instance());
			}
		);
		add_action(
			'woocommerce_blocks_cart_block_registration',
			function ($integration_registry) {
				$integration_registry->register(AIOCE_WC_BLOCKS::instance());
			}
		);
		add_action(
			'woocommerce_blocks_checkout_block_registration',
			function ($integration_registry) {
				$integration_registry->register(AIOCE_WC_BLOCKS::instance());
			}
		);
	}
}

new AIOCE_WOOCOMMERCE();
