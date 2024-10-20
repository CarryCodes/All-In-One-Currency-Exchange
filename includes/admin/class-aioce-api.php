<?php

/**
 * Admin API
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_API
{

    /**
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;

    public function __construct()
    {
        add_action('rest_api_init', function () {
            // Settings
            register_rest_route(
                AIOCE_REST_API_ROUTE,
                '/wc_settings',
                array(
                    array(
                        'methods' => 'GET',
                        'callback' => array($this, 'get_wc_settings'),
                        'permission_callback' => array($this, 'get_permission'),
                    ),
                    array(
                        'methods' => 'POST',
                        'callback' => array($this, 'set_wc_settings'),
                        'permission_callback' => array($this, 'get_permission'),
                    ),
                )
            );
            register_rest_route(
                AIOCE_REST_API_ROUTE,
                '/dashboard',
                array(
                    array(
                        'methods' => 'GET',
                        'callback' => array($this, 'get_dashboard'),
                        'permission_callback' => array($this, 'get_permission'),
                    ),
                    array(
                        'methods' => 'POST',
                        'callback' => array($this, 'set_dashboard'),
                        'permission_callback' => array($this, 'get_permission'),
                    ),
                )
            );
        });
    }

    /**
     *
     * Ensures only one instance is loaded or can be loaded.
     *
     * @since 1.0.0
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Returns an array of HTML tags that are allowed for settings.
     *
     * This function is used to define which HTML tags are allowed when saving settings.
     * By default, no HTML tags are allowed. If specific tags need to be allowed, they should be added to the returned array.
     *
     * @return array An array of allowed HTML tags.
     *
     * @since 1.0.0
     */
    private function allowed_html_settings()
    {
        return array();
    }
    /**
     * Returns an array of registered dashboard options.
     *
     * This function retrieves the list of options related to the dashboard settings.
     * The options are stored in the database and are used to manage the dashboard
     * functionality of the plugin.
     *
     * @return array An array of registered dashboard options.
     *
     * @since 1.0.0
     */
    private function registered_dashboard()
    {
        $options = array(
            AIOCE_PREFIX . 'apikey',
            AIOCE_PREFIX . 'username',
        );
        return $options;
    }
    /**
     * Retrieves the list of options related to the WooCommerce settings.
     *
     * This function is used to define the options that will be managed through the plugin's settings.
     * The options are stored in the database and are used to customize the WooCommerce integration.
     *
     * @return array An array of registered WooCommerce settings options.
     *
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

    /**
     * Retrieves the dashboard settings from the database.
     *
     * This function fetches the dashboard settings from the WordPress database using the registered dashboard options.
     * The dashboard settings are returned as a REST API response with a status code of 200.
     *
     * @param WP_REST_Request $request The request object containing the parameters passed to the API endpoint.
     *
     * @return WP_REST_Response A REST API response containing the dashboard settings.
     *
     * @since 1.0.0
     */
    function get_dashboard($request)
    {
        $settings = [];
        foreach ($this->registered_dashboard() as $key) {
            $value = get_option($key, '');
            $settings[$key] = $value;
        }
        return new WP_REST_Response($settings, 200);
    }
    /**
     * Updates the dashboard settings in the WordPress database.
     *
     * This function sanitizes and updates the dashboard settings based on the provided data.
     * It retrieves the allowed HTML tags from the 'allowed_html_settings' method and sanitizes
     * the input data accordingly. The sanitized data is then updated in the WordPress database.
     *
     * @param WP_REST_Request $data The request object containing the parameters passed to the API endpoint.
     *
     * @return WP_REST_Response A REST API response containing the updated data with a status code of 200.
     *
     * @since 1.0.0
     */
    function set_dashboard($data)
    {
        $allowed_html = $this->allowed_html_settings();
        $data = $data->get_params();



        foreach ($data as $key => $value) {
            $sanitized_data = in_array($key, $allowed_html) ? wp_kses_post($value) : sanitize_text_field($value);

            update_option($key, $sanitized_data);
        }

        return new WP_REST_Response($data, 200);
    }
    /**
     * Retrieves the WooCommerce settings from the database.
     *
     * This function fetches the WooCommerce settings from the WordPress database using the registered settings options.
     * The WooCommerce settings are returned as a REST API response with a status code of 200.
     *
     * @return WP_REST_Response A REST API response containing the WooCommerce settings.
     *
     * @since 1.0.0
     */
    function get_wc_settings()
    {
        $settings = [];
        foreach ($this->registered_settings() as $key) {
            $value = get_option($key, '');
            $settings[$key] = $value;
        }
        return new WP_REST_Response($settings, 200);
    }
    /**
     * Updates the WooCommerce settings in the WordPress database.
     *
     * This function sanitizes and updates the WooCommerce settings based on the provided data.
     * It retrieves the allowed HTML tags from the 'allowed_html_settings' method and sanitizes
     * the input data accordingly. The sanitized data is then updated in the WordPress database.
     *
     * @param WP_REST_Request $data The request object containing the parameters passed to the API endpoint.
     *
     * @return WP_REST_Response A REST API response containing the updated data with a status code of 200.
     *
     * @since 1.0.0
     */
    function set_wc_settings($data)
    {
        $allowed_html = $this->allowed_html_settings();
        $data = $data->get_params();
        foreach ($data as $key => $value) {
            $sanitized_data = in_array($key, $allowed_html) ? wp_kses_post($value) : sanitize_text_field($value);
            update_option($key, $sanitized_data);
        }

        return new WP_REST_Response($data, 200);
    }


    /**
     * Permission Callback for API endpoints.
     *
     * This function checks if the current user has the necessary capabilities to access the API endpoints.
     * It verifies if the user is an administrator or has the 'manage_woocommerce' capability.
     *
     * @return bool Returns true if the user has the required capabilities, false otherwise.
     *
     * @since 1.0.0
     */
    function get_permission()
    {
        if (current_user_can('administrator') || current_user_can('manage_woocommerce')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, esc_html(__('Cheatin&#8217; huh?', 'all-in-one-currency-exchange')), esc_html(AIOCE_VERSION));
    }
}

AIOCE_API::instance();
