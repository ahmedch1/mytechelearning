<?php

defined('ABSPATH') || exit;

/**
 * Register widget areas.
 */
function edubin_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Blog Sidebar', 'edubin'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Header Top', 'edubin'),
        'id'            => 'header-top',
        'description'   => esc_html__('Add widgets here to appear in your header top area.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title d-none">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Footer 1', 'edubin'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Footer 2', 'edubin'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Footer 3', 'edubin'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Footer 4', 'edubin'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Copyright 1', 'edubin'),
        'id'            => 'copyright',
        'description'   => esc_html__('Add widgets here to appear in your footer copyright.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('(Edubin) Copyright 2', 'edubin'),
        'id'            => 'copyright_2',
        'description'   => esc_html__('Add widgets here to appear in your footer copyright right side.', 'edubin'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Tutor login before
    if (function_exists('tutor')) {

        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor Single Page', 'edubin'),
            'id'            => 'tutor-course-sidebar-2',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor course details pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget edubin-course-widget edubin-tutor-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="tutor-course-widget-title widget-title">',
            'after_title'   => '</h2>',
        ));

        //Tuotr other sidebar
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS Login From Before', 'edubin'),
            'id'            => 'edubin-tutor-login-form-before-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS login pages from before section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));
        // Tutor login after
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS Login From After', 'edubin'),
            'id'            => 'edubin-tutor-login-form-after-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS login pages from after section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));

        // Tutor student register  before
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS Student Register From Before', 'edubin'),
            'id'            => 'edubin-tutor-student-reg-form-before-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS register pages from before section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));

        // Tutor student register after
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS Student Register From After', 'edubin'),
            'id'            => 'edubin-tutor-student-reg-form-after-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS register pages from after section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));

        // Tutor instructor register  before
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS Instructor Register From Before', 'edubin'),
            'id'            => 'edubin-tutor-instructor-reg-form-before-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS instructor register pages from before section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));

        // Tutor instructor register after
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Tutor LMS instructor Register From After', 'edubin'),
            'id'            => 'edubin-tutor-instructor-reg-form-after-widget',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Tutor LMS register pages from after section.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title edubin-wtb-hide">',
            'after_title'   => '</h2>',
        ));
    }
    // LearnPress
    if (class_exists('LearnPress')) {
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) LearnPress Archive Page', 'edubin'),
            'id'            => 'lp-course-sidebar-1',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on LearnPress course archive pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget edubin-course-widget edubin-lp-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="lp-course-widget-title widget-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) LearnPress Single Page', 'edubin'),
            'id'            => 'lp-course-sidebar-2',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on LearnPress course details pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget edubin-course-widget edubin-lp-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="lp-course-widget-title widget-title">',
            'after_title'   => '</h2>',
        ));
    }
    // LearnDash
    if (class_exists('SFWD_LMS')) {
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) LearnDash Single', 'edubin'),
            'id'            => 'ld-course-sidebar-1',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on LearnDash course details pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget edubin-course-widget edubin-ld-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
    // Sensei
    if (class_exists('Sensei_Main')) {
        register_sidebar(array(
            'name'          => esc_html__('(Edubin) Sensei Single', 'edubin'),
            'id'            => 'sensei-course-sidebar-1',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on Sensei course details pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget edubin-sensei-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'edubin_widgets_init');

function edubin_tribe_events_widgets_init()
{
    // The Events Calender
    if (class_exists('Tribe__Events__Main')) {
        register_sidebar(array(
            'name'          => esc_html__('The Events Calendar Single', 'edubin'),
            'id'            => 'tribe_event_sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on The Events Calendar details pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'edubin_tribe_events_widgets_init');

function edubin_woocommerce_widgets_init()
{
    // WooCommerce

    if (class_exists('WooCommerce')) {
        register_sidebar(array(
            'name'          => esc_html__('WooCommerce Shop Page', 'edubin'),
            'id'            => 'woocommerce_shop_page_sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on shop page pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('WooCommerce Shop Page Top', 'edubin'),
            'id'            => 'woocommerce_shop_page_top_sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on shop page top pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('WooCommerce Single Page Top', 'edubin'),
            'id'            => 'woocommerce_product_page_top_sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar on woocommerce shop product details page top pages.', 'edubin'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'edubin_woocommerce_widgets_init');


