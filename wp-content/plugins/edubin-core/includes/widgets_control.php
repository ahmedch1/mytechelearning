<?php

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly.

class Edubin_Widgets_Control
{

    public function __construct()
    {
        $this->edubin_widgets_control();
    }

    // Control Widgets
    public function edubin_widgets_control()
    {

        $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/header_menu.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Header_Menu());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/footer_menu.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Footer_Menu());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/logo.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Logo());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/delimiter.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Delimiter());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/icon_text.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Icon_Text());
        
        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/custom_icon.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Custom_Icon());
        
        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/woo_cart.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_WooCart());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/search.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Search());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/join_login_logout.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Join_Login_Logout());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_slider.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Edubin_Slider());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/slider_pro.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Slider_Pro());
        if (class_exists('LearnPress')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/lp_courses_carousel.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_LP_Course_Carousel());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_filter.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Filter());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/lp_search.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_LP_Search());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_category.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Category());
        }
        if (function_exists('tutor')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tutor_courses_carousel.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Tutor_Course_Carousel());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_filter_tutor.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Filter_Tutor());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tutor_search.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Tutor_Search());
        }

        if (class_exists('SFWD_LMS')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/ld_courses_carousel.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_LD_Course_Carousel());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_filter_ld.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Filter_LD());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/ld_groups_courses_carousel.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_LD_Groups_Course_Carousel());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/ld_search.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_LD_Search());
        }
        if (class_exists('Sensei_Main')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/sensei_courses_carousel.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Sensei_Course_Carousel());

            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_filter_sensei.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Filter_Sensei());

            // require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/sensei_search.php';
            // $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Sensei_Search());
        }
        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_category_custom.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Category_Custom());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/course_instractor.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Course_Instractor());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/section_1.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Section_1());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/section_2.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Section_2());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/section_3.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Section_3());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/section_4.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Section_4());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/teachers.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Teachers());

        if (class_exists('Tribe__Events__Main')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/events.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Events());
        }
        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_cuctom_event.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Custom_Event());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_testimonial.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Testimonial());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/latest_post.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Latest_Post());
        if (class_exists('WooCommerce')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/woo_product.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Woo_Product());
        }
        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/counter.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Counter());

      require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/countdown.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Countdown());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/video_popup.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Video_PopUp());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/image_carousel.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Icon_Category());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_title.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Title());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_section_title.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Section_Title());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/services_box.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Services_Box());

        require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/cta.php';
        $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_CTA());

        // Third party plugins Addons
        // if (is_plugin_active('mailchimp-for-wp/mailchimp-for-wp.php')) {
        //     require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_mailchimp_for_wp.php';
        //     $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Mailchimp_Wp());
        // }

        if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_contact_form_seven.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Contact_Form_Seven());
        }

        if (is_plugin_active('revslider/revslider.php')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/edubin_revolution_slider.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_Revolution_Slider());
        }
        
        if (is_plugin_active('wpforms-lite/wpforms.php') || is_plugin_active('wpforms/wpforms.php')) {
            require_once EDUBIN_ADDONS_PL_PATH . 'includes/widgets/wpforms.php';
            $widgets_manager->register_widget_type(new \Elementor\Edubin_Elementor_Widget_WPforms());
        }

    }

}
new Edubin_Widgets_Control();
