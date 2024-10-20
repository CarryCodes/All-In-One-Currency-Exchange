<?php

/**
 * Setup Plugin needs
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_PLUGIN_NEEDS
{

	public function __construct()
	{
		add_action('admin_notices', array($this, 'admin_notices'));
	}
	/**
	 * Displays admin notices for WooCommerce plugin requirements.
	 *
	 * This function checks if WooCommerce is installed and activated. If not, it displays appropriate admin notices
	 * with instructions to install or activate WooCommerce.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function admin_notices()
	{
		if (!$this->woocommerce_installed()) {
			$install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=woocommerce'), 'install-plugin_woocommerce');
			echo '<div class="notice notice-error is-dismissible">
					<p>[All In One Currency Exchange] Woocommerce is not installed. Please <a href="' . esc_url($install_url) . '">Install Woocommerce</a> to start integration.</p>
				</div>';
		} elseif (!$this->woocommerce_activated()) {
			$activate_url = wp_nonce_url('plugins.php?action=activate&plugin=woocommerce/woocommerce.php', 'activate-plugin_woocommerce/woocommerce.php');
			echo '<div class="notice notice-error is-dismissible">
					<p>[All In One Currency Exchange] Woocommerce is not activated. Please <a href="' . esc_url($activate_url) . '">Activate Woocommerce</a> to start integration.</p>
				</div>';
		}
	}
	/**
	 * Checks if WooCommerce is installed.
	 *
	 * This function retrieves a list of all installed plugins and checks if WooCommerce is present.
	 * It uses the 'get_plugins()' function to retrieve the list of installed plugins and then checks
	 * if the 'woocommerce/woocommerce.php' plugin is present in the list.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Returns true if WooCommerce is installed, false otherwise.
	 */
	function woocommerce_installed()
	{
		$plugins = get_plugins();
		return isset($plugins['woocommerce/woocommerce.php']);
	}
	/**
	 * Checks if WooCommerce is activated.
	 *
	 * This function verifies if WooCommerce is activated in the WordPress installation.
	 * It includes the necessary plugin file and then checks if the 'woocommerce/woocommerce.php'
	 * plugin is active and if the 'WC' function is defined, which indicates that WooCommerce is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Returns true if WooCommerce is activated, false otherwise.
	 */
	function woocommerce_activated()
	{
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');
		return is_plugin_active('woocommerce/woocommerce.php') && function_exists('WC');
	}
}

new AIOCE_PLUGIN_NEEDS();
