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
	public function register_widgets()
	{
		require_once(AIOCE_ABSPATH . 'includes/admin/integrations/elementor/class-aioce-thank-you-widget.php');
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \AIOCE_Elementor());
	}
}

new AIOCE_ELEMENTOR();
