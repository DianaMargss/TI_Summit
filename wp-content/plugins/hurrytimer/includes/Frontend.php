<?php

namespace Hurrytimer;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://nabillemsieh.com
 * @since      1.0.0
 *
 * @package    Hurrytimer
 * @subpackage Hurrytimer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hurrytimer
 * @subpackage Hurrytimer/public
 * @author     Nabil Lemsieh <contact@nabillemsieh.com>
 */
class Frontend
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version     The version of this plugin.
     *
     * @since    1.0.0
     *
     */
    public function __construct($plugin_name, $version)
    {


        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        $shortcode         = new CampaignShortcode();
        add_shortcode('hurrytimer', [$shortcode, 'content']);
        add_action('wp_footer', [$this, 'maybeDisplayStickyBar']);
        add_action('wp', [$this, 'handleWCSingleProduct']);
        add_action('wp_ajax_action_change_stock_status', [$this, 'ajaxChangeStockStatus']);
        add_action('wp_ajax_nopriv_action_change_stock_status', [$this, 'ajaxChangeStockStatus']);
    }

    function maybeDisplayStickyBar()
    {
        $stickyCampaigns = $posts = get_posts([
            'post_type'        => HURRYT_POST_TYPE,
            'numberposts'      => -1,
            'post_status'      => 'publish',
            'meta_key'         => 'enable_sticky',
            'meta_value'       => C::YES,
            'suppress_filters' => false,
        ]);
        foreach ($stickyCampaigns as $post) {
            echo do_shortcode('[hurrytimer id="' . $post->ID . '"]');
        }

    }

    function changeStockStatus()
    {
        check_ajax_referer('hurryt', 'ajax_nonce');
        if (isset($_POST['id']) || ! isset($_POST['stockStatus'])) {
            die(-1);
        }
        $id          = intval($_POST['id']);
        $stockStatus = sanitize_key($_POST['stockStatus']);
        $wcCampaign  = new WCCampaign();
        $campaign    = new Campaign($id);

        $wcCampaign->changeStockStatus($campaign, $stockStatus);
        die();
    }


    public function handleWCSingleProduct()
    {
        global $post;

        if (Utils\Helpers::isWcActive() && is_product()) {
            $wcCampaign = new WCCampaign();
            $wcCampaign->run($post->ID);
        }

    }


    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        $buildVersion = false;

        $filePath = HURRYT_DIR . 'assets/css/hurrytimer.css';
        if (file_exists($filePath)) {
            $buildVersion = filemtime($filePath);
        }

        if ( ! $buildVersion) {
            $buildVersion = time();
        }

        wp_enqueue_style(
            $this->plugin_name,
            HURRYT_URL . 'assets/css/hurrytimer.css', [], $buildVersion
        );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        wp_enqueue_script(
            'hurryt-cookie',
            HURRYT_URL . 'assets/js/cookie.min.js',
            [],
            '2.2.0',
            true
        );
        wp_enqueue_script(
            'hurryt-countdown',
            HURRYT_URL . 'assets/js/jquery.countdown.min.js',
            ['jquery'],
            '2.2.0',
            true
        );


        wp_enqueue_script(
            $this->plugin_name,
            HURRYT_URL . 'assets/js/hurrytimer.js',
            ['hurryt-countdown', 'hurryt-cookie'],
            $this->version,
            true
        );
        wp_localize_script($this->plugin_name, 'hurrytimer_ajax_object', [
            'ajax_url'                => admin_url('admin-ajax.php'),
            'ajax_nonce'              => wp_create_nonce('hurryt'),
            'sticky_bar_hide_timeout' => apply_filters('hurryt_sticky_bar_hide_timeout',
                7),
            'actionsOptions'          => [
                'none'                => C::ACTION_NONE,
                'hide'                => C::ACTION_HIDE,
                'redirect'            => C::ACTION_REDIRECT,
                'stockStatus'         => C::ACTION_CHANGE_STOCK_STATUS,
                'hideAddToCartButton' => C::ACTION_HIDE_ADD_TO_CART_BUTTON,
                'displayMessage'      => C::ACTION_DISPLAY_MESSAGE,
            ],
            'restartOptions'          => [
                'none'        => C::RESTART_NONE,
                'immediately' => C::RESTART_IMMEDIATELY,
                'afterReload' => C::RESTART_AFTER_RELOAD,
            ],
        ]);
    }
}
