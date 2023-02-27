<?php

defined('ABSPATH') || exit;

/**
 * Enqueue scripts and styles.
 */
function edubin_scripts()
{

    global $wp_styles;

    $defaults               = edubin_generate_defaults();
    $rtl_enable             = get_theme_mod('rtl_enable', $defaults['rtl_enable']);
    $header_variations      = get_theme_mod('header_variations', $defaults['header_variations']);
    $tutor_settings_color   = get_theme_mod('tutor_settings_color', $defaults['tutor_settings_color']);
    $load_bootstrap_css     = get_theme_mod('load_bootstrap_css', $defaults['load_bootstrap_css']);
    $load_bootstrap_rtl_css = get_theme_mod('load_bootstrap_rtl_css', $defaults['load_bootstrap_rtl_css']);
    $load_fontawesome_css   = get_theme_mod('load_fontawesome_css', $defaults['load_fontawesome_css']);
    $load_owl_carousel_css  = get_theme_mod('load_owl_carousel_css', $defaults['load_owl_carousel_css']);
    $load_animate_css       = get_theme_mod('load_animate_css', $defaults['load_animate_css']);
    $load_bootstrap_js      = get_theme_mod('load_bootstrap_js', $defaults['load_bootstrap_js']);
    $load_owl_carousel_js   = get_theme_mod('load_owl_carousel_js', $defaults['load_owl_carousel_js']);
    $preloader_show   = get_theme_mod('preloader_show', $defaults['preloader_show']);
    $lp_use_plugin_color   = get_theme_mod('lp_use_plugin_color', $defaults['lp_use_plugin_color']);
    // Theme stylesheet.
    wp_enqueue_style('edubin-style', get_stylesheet_uri());
    // Theme block stylesheet.
    wp_enqueue_style('edubin-block-style', get_template_directory_uri() . '/assets/css/blocks.css', array('edubin-style'), EDUBIN_THEME_VERSION);
    if (is_rtl() && $rtl_enable == true && $load_bootstrap_rtl_css) {
        wp_enqueue_style('bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css');
    }
    if ( $load_bootstrap_css) {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.2.1');
    }
    if ( $load_fontawesome_css) {
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', '5.9.0');
    }
    wp_enqueue_style('edubin-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon.css', EDUBIN_THEME_VERSION);
    if ( $load_owl_carousel_css) {
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', '2.3.4');
    }
    if ( $load_animate_css) {
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', '3.7.0');
    }
    
    if (class_exists('SFWD_LMS') || class_exists('LearnPress') || class_exists('Sensei_Main') || function_exists('tutor') ):
    wp_enqueue_style('edubin-global-course', get_template_directory_uri() . '/assets/css/global-course.css', array(), EDUBIN_THEME_VERSION);
    endif;

    if (class_exists('LearnPress')):
        $get_lp_plugin_dir        = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        $lp_plugin_version_number = get_plugin_data($get_lp_plugin_dir);

        if ( $lp_plugin_version_number['Version'] < '4.0.0'):
            wp_enqueue_style('edubin-learnpress', get_template_directory_uri() . '/assets/css/learnpress.css', array(), EDUBIN_THEME_VERSION);
        endif;

        if ( $lp_plugin_version_number['Version'] > '4.0.0'):
            wp_enqueue_style('edubin-learnpress-v4', get_template_directory_uri() . '/assets/css/learnpress-v4.css', array(), EDUBIN_THEME_VERSION);

            if ( $lp_use_plugin_color ):
                wp_enqueue_style('edubin-learnpress-color', get_template_directory_uri() . '/assets/css/learnpress-color.css', array(), EDUBIN_THEME_VERSION);
            endif;

        endif;

    endif;
    if (class_exists('SFWD_LMS')):
        wp_enqueue_style('edubin-learndash', get_template_directory_uri() . '/assets/css/learndash.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (function_exists('tutor')):
        wp_enqueue_style('edubin-tutor', get_template_directory_uri() . '/assets/css/tutor.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (function_exists('tutor') && !$tutor_settings_color):
        wp_enqueue_style('edubin-tutor-color', get_template_directory_uri() . '/assets/css/tutor-color.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('Sensei_Main')):
        wp_enqueue_style('edubin-sensei', get_template_directory_uri() . '/assets/css/sensei.css', array(), EDUBIN_THEME_VERSION);
    endif;

    if (class_exists('Tribe__Events__Main')):
        wp_enqueue_style('edubin-events', get_template_directory_uri() . '/assets/css/events.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('Tribe__Events__Filterbar__PUE')):
        wp_enqueue_style('edubin-events-filterbar', get_template_directory_uri() . '/assets/css/filterbar.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('WPForms')):
        wp_enqueue_style('edubin-wpforms', get_template_directory_uri() . '/assets/css/wpforms.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists( 'WPCF7_ContactForm' )):
        wp_enqueue_style('edubin-wpcf7', get_template_directory_uri() . '/assets/css/wpcf7.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('UM')):
        wp_enqueue_style('edubin-ultimate-member', get_template_directory_uri() . '/assets/css/ulm.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('Mega_Menu') && $header_variations == 'header_v3'):
        wp_enqueue_style('edubin-max-mega-menu', get_template_directory_uri() . '/assets/css/max-menu.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('Video_Conferencing_With_Zoom')):
        wp_enqueue_style('edubin-zoom-conferencing', get_template_directory_uri() . '/assets/css/zoom.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('WooCommerce')):
        wp_enqueue_style('edubin-woocommerce', get_template_directory_uri() . '/assets/css/wc.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('BuddyPress')):
        wp_enqueue_style('edubin-buddypress', get_template_directory_uri() . '/assets/css/buddypress.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists('bbPress')):
        wp_enqueue_style('edubin-bbpress', get_template_directory_uri() . '/assets/css/bbpress.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists( 'PMPro_Membership_Level' )) :
        wp_enqueue_style('edubin-paid-membership', get_template_directory_uri() . '/assets/css/pmp.css', array(), EDUBIN_THEME_VERSION);
    endif;
    if (class_exists( 'Edubin_Shortcode_Social' )) :
        wp_enqueue_style('edubin-core', get_template_directory_uri() . '/assets/css/edubin-core.css', array(), EDUBIN_THEME_VERSION);
    endif;
    
    if ( $preloader_show ) :
        wp_enqueue_style('edubin-preloader', get_template_directory_uri() . '/assets/css/preloader.css', array(), EDUBIN_THEME_VERSION);
    endif;
       
    if ( is_404() || is_search() ) :
        wp_enqueue_style('edubin-preloader', get_template_directory_uri() . '/assets/css/preloader.css', array(), EDUBIN_THEME_VERSION);
    endif;
    
    wp_enqueue_style('edubin-global-theme', get_template_directory_uri() . '/assets/css/global-theme.css', array(), EDUBIN_THEME_VERSION);

    wp_enqueue_style('edubin-theme', get_template_directory_uri() . '/assets/css/style.css', array(), EDUBIN_THEME_VERSION);

    wp_enqueue_script('edubin-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), EDUBIN_THEME_VERSION, true);

    if ( $rtl_enable == true) {
        wp_enqueue_style('edubin-theme-rtl', get_template_directory_uri() . '/rtl.css', array(), EDUBIN_THEME_VERSION);
    }

    $font_url = edubin_get_font_url();
    if (!empty($font_url)) {
        wp_enqueue_style('edubin-fonts', esc_url_raw($font_url), array(), null);
    }

    $edubin_l10n = array(
        'quote' => edubin_get_svg(array('icon' => 'quote-right')),
    );

    if (has_nav_menu('top')) {
        wp_enqueue_script('edubin-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), EDUBIN_THEME_VERSION, true);
        $edubin_l10n['expand']   = esc_html__('Expand child menu', 'edubin');
        $edubin_l10n['collapse'] = esc_html__('Collapse child menu', 'edubin');
        $edubin_l10n['icon']     = edubin_get_svg(array('icon' => 'angle-down', 'fallback' => true));
    }

    wp_enqueue_script('edubin-global', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), EDUBIN_THEME_VERSION, true);
    wp_enqueue_script('jquery-scrollto', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js', array('jquery'), '2.1.2', true);
    if ( $load_owl_carousel_js) {
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.js', array('jquery'), '2.3.4', true);
    }
    wp_enqueue_script('youtube-popup', get_template_directory_uri() . '/assets/js/youtube-popup.js', array('jquery'), EDUBIN_THEME_VERSION, true);
    if ( $load_bootstrap_js) {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.1.3', true);
    }
    wp_enqueue_script('edubin-theme-script', get_template_directory_uri() . '/assets/js/edubin-theme.js', array('jquery'), EDUBIN_THEME_VERSION, true);

    wp_localize_script('edubin-skip-link-focus-fix', 'edubinScreenReaderText', $edubin_l10n);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'edubin_scripts');

/**
 * Register/Enqueue JS/CSS In Admin Panel
 */
function edubin_register_admin_styles()
{
    wp_enqueue_style('edubin-admin-css', get_template_directory_uri() . '/assets/css/admin.css', array(), EDUBIN_THEME_VERSION);
    wp_enqueue_style('edubin-customizer', get_template_directory_uri() . '/admin/assets/css/customizer.css', array(), EDUBIN_THEME_VERSION);
    
    if (class_exists('RWMB_Loader')) {
        wp_enqueue_script('edubin-metaboxes', get_template_directory_uri() . '/admin/assets/js/metaboxes.js', array('jquery'), '1.0.0');
    }
}
add_action('admin_enqueue_scripts', 'edubin_register_admin_styles');

/**
 * Enqueues styles for the block-based editor.
 */
function edubin_block_editor_styles()
{
    // Block styles.
    wp_enqueue_style('edubin-block-editor-style', get_template_directory_uri() . '/assets/css/editor-blocks.css', array(), EDUBIN_THEME_VERSION);
    // Add custom fonts.
    wp_enqueue_style('edubin-fonts', edubin_get_font_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'edubin_block_editor_styles');


// ** Upload image **

function edubin_admin_scripts($hook)
{

    wp_enqueue_media();

    wp_enqueue_script('upload-image', get_template_directory_uri() . '/assets/js/image-upload.js', array('jquery'), '1.0.0');

}

add_action('admin_enqueue_scripts', 'edubin_admin_scripts');
