<?php

/**
 * Setup Active/Deactive Hooks
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_Activities
{

	public function __construct()
	{
		// Register activation and deactivation hooks
		register_activation_hook(AIOCE_PLUGIN_FILE, array($this, 'activate'));
		register_deactivation_hook(AIOCE_PLUGIN_FILE, array($this, 'deactivate'));
	}


	/**
	 * Activate action 
	 *
	 * @since 1.0.0
	 */
	public function activate()
	{
	}

	/**
	 * Deactivate action 
	 *
	 * @since 1.0.0
	 */
	public function deactivate()
	{
	}
}

new AIOCE_Activities();
