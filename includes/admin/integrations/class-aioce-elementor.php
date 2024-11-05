<?php

/**
 * Setup Elementor integration
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_ELEMENTOR
{


	public function __construct()
	{
		// Add widget items
		add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
	}


	/**
	 * Register widgets
	 *
	 * @since 1.0.0
	 */
	public function register_widgets($widgets_manager)
	{
		require_once(AIOCE_ABSPATH . 'includes/admin/integrations/elementor/class-aioce-thank-you-widget.php');
		$widgets_manager->register_widget_type(new \AIOCE_THANKYOU_WIDGET());
	}
}

new AIOCE_ELEMENTOR();
