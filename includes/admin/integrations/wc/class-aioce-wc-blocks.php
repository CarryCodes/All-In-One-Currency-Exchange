<?php

use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;

/**
 * Class for integrating with WooCommerce Blocks
 * @since 1.0.0
 */
class AIOCE_WC_BLOCKS implements IntegrationInterface
{
    /**
     * The single instance of the class.
     *
     * @var AIOCE_WC_BLOCKS
     *
     * @since 1.0.0
     */

    protected static $_instance = null;

    /**
     * Main AIOCE_WC_BLOCKS instance. Ensures only one instance of AIOCE_WC_BLOCKS is loaded or can be loaded.
     *
     * @static
     * @return AIOCE_WC_BLOCKS
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
     * Cloning is forbidden.
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, esc_html(__('Ops!', 'all-in-one-currency-exchange')));
    }

    /**
     * Unserializing instances of this class is forbidden.
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, esc_html(__('Ops!', 'all-in-one-currency-exchange')));
    }

    /**
     * The name of the integration.
     *
     * @return string
     * @since 1.0.0
     */
    public function get_name()
    {
        return 'aioce-wc-blocks';
    }

    /**
     * When called invokes any initialization/setup for the integration.
     * @since 1.0.0
     */
    public function initialize()
    {
        wp_enqueue_script('aioce-wc-blocks', AIOCE_URL . 'includes/client/assets/js/index.js', array(), AIOCE_VERSION, true);
    }

    /**
     * Returns an array of script handles to enqueue in the frontend context.
     *
     * @return string[]
     * @since 1.0.0
     */
    public function get_script_handles()
    {
        return array('aioce-wc-blocks');
    }

    /**
     * Returns an array of script handles to enqueue in the editor context.
     *
     * @return string[]
     * @since 1.0.0
     */
    public function get_editor_script_handles()
    {
        return array('aioce-wc-blocks');
    }

    /**
     * An array of key, value pairs of data made available to the block on the client side.
     *
     * @return array
     * @since 1.0.0
     */
    public function get_script_data()
    {
        $wc_func = AIOCE_WCFunc::get_instance();
        $res = $wc_func->prepareBlock();
        return $res;
    }
}
