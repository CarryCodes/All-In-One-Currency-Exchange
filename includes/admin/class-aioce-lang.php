<?php

/**
 * Setup Translation Files
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_Lang
{

	public function __construct()
	{
		// Load translation files
		add_action('plugins_loaded', array($this, 'load_textdomain'));
	}
	/**
	 * Load translation files
	 *
	 * @since 1.0.0
	 */
	function load_textdomain()
	{
		load_plugin_textdomain('aioce', false, AIOCE_PLUGIN_LANG);
	}
}

new AIOCE_Lang();
