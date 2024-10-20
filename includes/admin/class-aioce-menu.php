<?php

/**
 * Setup Menu Pages
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_Menu
{

	public function __construct()
	{
		// Add submenu items
		add_action('admin_menu', array($this, 'register_menu'));
		// Add links under plugin page.
		add_filter('plugin_action_links_all-in-one-currency-exchange/all-in-one-currency-exchange.php', array($this, 'add_settings_link'));
		add_filter('plugin_action_links_all-in-one-currency-exchange/all-in-one-currency-exchange.php', array($this, 'docs_link'));
	}


	/**
	 * Define Menu
	 *
	 * @since 1.0.0
	 */
	public function register_menu()
	{
		add_menu_page(__('AIO-Currency Exchange', 'all-in-one-currency-exchange'), __('AIO-Currency Exchange', 'all-in-one-currency-exchange'), 'manage_options', 'aioce', array($this, 'display_admin_page'), AIOCE_ADMIN_ASSETS . "img/icon.png");
	}

	/**
	 * Init the view part.
	 *
	 * @since 1.0.0
	 */
	public function display_admin_page()
	{
		echo "<noscript> <h1>You need to enable JavaScript to run All In One Currency Exchange Plugin.</h1></noscript><div id='root'></div>";
	}

	/**
	 * Plugin Settings Link on plugin page
	 *
	 * @since 		1.0.0
	 */
	function add_settings_link($links)
	{
		$settings = array(
			'<a href="' . admin_url('admin.php?page=aioce&tab=settings') . '">Settings</a>',
		);
		return array_merge($links, $settings);
	}


	/**
	 * Plugin Documentation Link on plugin page
	 *
	 * @since 		1.0.0
	 */
	function docs_link($links)
	{
		$docs = array(
			'<a target="_blank" href="https://currencyexchangerate-api.com/docs">Documentation</a>',
		);
		return array_merge($links, $docs);
	}
}

new AIOCE_Menu();
