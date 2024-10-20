<?php

/**
 * Plugin Name: All In One Currency Exchange
 * Description: Tool for everything related to currency exchange in your site.
 * Version: 1.0.0
 * Author: currencyexchangerate-api.com
 * Author URI: https://currencyexchangerate-api.com
 * Text Domain: all-in-one-currency-exchange
 * Requires at least: 5.9
 * Tested up to: 6.1
 * License:     GPL-2.0
 * Requires PHP: 7.2
 * Requires Plugins: woocommerce
 * WC requires at least: 3.9
 * WC tested up to: 9.1
 *
 */

defined('ABSPATH') || exit;

final class AIOCE
{
    private static $instance;

    private $version = '1.0.0';

    private function __construct()
    {
        $this->define_constants();
        $this->includes();
        $this->integrations();
    }


    /**
     * Handles the plugin's integrations with other plugins or systems.
     *
     * This function includes the necessary files for integrating with Elementor and WooCommerce.
     * If the current environment is the admin area, it also includes the Elementor integration file.
     *
     * @since 1.0
     *
     * @return void
     */
    private function integrations()
    {
        if (is_admin()) {
            require_once(AIOCE_ABSPATH . 'includes/admin/integrations/class-aioce-elementor.php');
        }
        require_once(AIOCE_ABSPATH . 'includes/admin/integrations/class-aioce-wc.php');
    }
    /**
     * Includes the necessary files for the plugin's functionality.
     *
     * This function checks if the current environment is the admin area and includes specific files for the admin interface.
     * It then includes files for integrating with WooCommerce and other functionalities.
     *
     * @since 1.0
     *
     * @return void
     */
    private function includes()
    {
        if (is_admin()) {
            require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-plugin-needs.php');
            require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-menu.php');
            require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-assets.php');
            require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-activities.php');
        }
        require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-wc-functions.php');
        require_once(AIOCE_ABSPATH . 'includes/admin/class-aioce-api.php');
    }
    /**
     * Define Plugin Constants.
     * @since 1.0
     */
    private function define_constants()
    {
        $this->define('AIOCE_DEV', false);
        $this->define('AIOCE_REST_API_ROUTE', 'aioce/api/v1');
        $this->define('AIOCE_URL', plugin_dir_url(__FILE__));
        $this->define('AIOCE_PLUGIN_FILE', __FILE__);
        $this->define('AIOCE_ADMIN_ASSETS', plugin_dir_url(__FILE__) .  "includes/admin/assets/");
        $this->define('AIOCE_ABSPATH', dirname(__FILE__) . '/');
        $this->define('AIOCE_VERSION', $this->get_version());
        $this->define('AIOCE_PREFIX', 'aioce_');
        $this->define('AIOCE_API', 'https://api.currencyexchangerate-api.com/');
        $this->define('AIOCE_API_VERSION', 'v1/');
        $this->define('AIOCE_API_TRANSIENT', 3);
        $this->define('AIOCE_API_TRANSIENTFAIL', 3600);
    }

    /**
     * Returns Plugin version for global
     * @since  1.0
     */
    private function get_version()
    {
        return $this->version;
    }

    /**
     * Define constant if not already set.
     *
     * @since  1.0
     * @param  string $name
     * @param  string|bool $value
     */
    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

AIOCE::get_instance();
