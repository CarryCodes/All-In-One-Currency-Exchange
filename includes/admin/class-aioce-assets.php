<?php

/**
 * Handle backend scripts
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_Assets
{
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_enqueue_scripts'), 10, 1);
	}

	/**
	 * Enqueue Backend Scripts
	 *
	 * @since 1.0.0
	 */
	public static function admin_enqueue_scripts()
	{
		$currentScreen = get_current_screen();
		$screenID = $currentScreen->id;
		if ($screenID === "toplevel_page_aioce") {
			$apiNonce = wp_create_nonce('wp_rest');
			$root = rest_url(AIOCE_REST_API_ROUTE . '/');
			$baseUrl = AIOCE_URL; // can be used for assets


			wp_enqueue_script('aioce-backend', AIOCE_URL . 'includes/admin/assets/js/index.js', array('wp-i18n'), AIOCE_VERSION, true);
			wp_localize_script(
				'aioce-backend',
				'AIOCE',
				array(
					'apiNonce' => $apiNonce,
					'root' => $root,
					'baseUrl' => $baseUrl,
				)
			);
		}
	}
}

new AIOCE_Assets();
