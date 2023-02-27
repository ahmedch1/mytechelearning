<?php

if (!defined('ABSPATH')) {
    exit();
}
// Exit if accessed directly

if (!function_exists('is_plugin_active')) {include_once ABSPATH . 'wp-admin/includes/plugin.php';}

if (!class_exists('Edubin_Elementor_Addons_Init')) {

    class Edubin_Elementor_Addons_Init
    {

        public function __construct()
        {
           // add_action('init', array($this, 'edubin_after_setup_theme'));
            add_action('elementor/widgets/widgets_registered', array($this, 'edubin_includes_widgets'));
            add_action('elementor/editor/after_enqueue_styles', array($this, 'edubin_editor_styles'));
            add_action('elementor/frontend/after_register_styles', array($this, 'edubin_register_frontend_styles'), 10);
            add_action('elementor/frontend/after_register_scripts', array($this, 'edubin_register_fronted_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array($this, 'edubin_enqueue_frontend_styles'), 10);
            add_action('elementor/frontend/after_enqueue_scripts', array($this, 'edubin_enqueue_frontend_scripts'), 10);
            //add_action('wp_enqueue_scripts', array($this, 'edubin_default_scripts'));

        }

        // Default Script call all pages
        // public function edubin_default_scripts()
        // {
        //     wp_enqueue_style('edubin-widgets', EDUBIN_ADDONS_PL_URL . 'assets/css/edubin-widgets.css');
        // }

        // Add Image size
        public function edubin_after_setup_theme()
        {
            add_image_size('edubin_size_650x390', 650, 390, true);
            add_image_size('edubin_size_1000x600', 1000, 600, true);
        }

        // Include Widgets File
        public function edubin_includes_widgets()
        {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets_control.php';
        }

        public function edubin_editor_styles()
        {
            wp_enqueue_style('edubin-element-editor', EDUBIN_ADDONS_PL_URL . 'assets/css/edubin-elementor-editor.css', '', EDUBIN_VERSION);
        }

        // Register frontend style
        public function edubin_register_frontend_styles()
        {
            $rand = rand(0, 999999999999);
            wp_register_style(
                'bootstrap',
                EDUBIN_ADDONS_PL_URL . 'assets/css/bootstrap.min.css',
                array(),
                EDUBIN_VERSION
            );

            wp_register_style(
                'edubin-keyframes',
                EDUBIN_ADDONS_PL_URL . 'assets/css/edubin-keyframes.css',
                array(),
                $rand
            );

            wp_register_style(
                'edubin-widgets',
                EDUBIN_ADDONS_PL_URL . 'assets/css/edubin-widgets.css',
                array(),
                $rand
            );

            wp_register_style(
                'animate',
                EDUBIN_ADDONS_PL_URL . 'assets/css/animate.css',
                array(),
                EDUBIN_VERSION
            );

            wp_register_style(
                'slick',
                EDUBIN_ADDONS_PL_URL . 'assets/css/slick.min.css',
                array(),
                EDUBIN_VERSION
            );

            wp_register_style(
                'swiper',
                EDUBIN_ADDONS_PL_URL . 'assets/css/swiper.css',
                array('edubin-widgets'),
                EDUBIN_VERSION
            );

        }

        // Register frontend script
        public function edubin_register_fronted_scripts()
        {

            wp_register_script(
                'popper',
                EDUBIN_ADDONS_PL_URL . 'assets/js/popper.min.js',
                array('jquery'),
                EDUBIN_VERSION,
                true
            );
            wp_register_script(
                'bootstrap',
                EDUBIN_ADDONS_PL_URL . 'assets/js/bootstrap.min.js',
                array('jquery'),
                EDUBIN_VERSION,
                true
            );

            wp_register_script(
                'edubin-widgets-scripts',
                EDUBIN_ADDONS_PL_URL . 'assets/js/edubin-widgets-active.js',
                array('jquery'),
                EDUBIN_VERSION,
                true
            );

            wp_register_script(
                'slick',
                EDUBIN_ADDONS_PL_URL . 'assets/js/slick.min.js',
                array('jquery'),
                EDUBIN_VERSION,
                true
            );

            wp_register_script(
                'jquery-easing',
                EDUBIN_ADDONS_PL_URL . 'assets/js/jquery.easing.1.3.js',
                array('jquery'),
                null,
                true
            );
            wp_register_script(
                'swiper',
                EDUBIN_ADDONS_PL_URL . 'assets/js/swiper.min.js',
                array('jquery'),
                null,
                true
            );

            wp_register_script(
                'youtube-popup',
                EDUBIN_ADDONS_PL_URL . 'assets/js/youtube-popup.js',
                array('jquery'),
                null,
                true
            );

            wp_register_script(
                'countdownTimer',
                EDUBIN_ADDONS_PL_URL . 'assets/js/jquery.countdownTimer.js',
                array('jquery'),
                null,
                true
            );
        }

        // enqueue frontend style
        public function edubin_enqueue_frontend_styles()
        {
            wp_enqueue_style('bootstrap');
            wp_enqueue_style('animate');
            wp_enqueue_style('edubin-keyframes');
            wp_enqueue_style('slick');
            wp_enqueue_style('edubin-widgets');
        }

        // enqueue frontend scripts
        public function edubin_enqueue_frontend_scripts()
        {
            wp_enqueue_script('youtube-popup');
            wp_enqueue_script('slick');
            wp_enqueue_script('bootstrap');
        }

    }
    new Edubin_Elementor_Addons_Init();

}
