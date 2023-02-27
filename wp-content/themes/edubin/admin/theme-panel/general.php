<?php

// Secondary logo
$wp_customize->add_setting('sticky_logo', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['sticky_logo'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sticky_logo', array(
  'label'       => esc_html__('Secondary Logo (Optional)', 'edubin'),
  'description' => esc_html__('Secondary logo only for transparent header.', 'edubin'),
  'section'     => 'title_tagline',
  'settings'    => 'sticky_logo',
  'priority'    => 9,
)));

// Logo size
$wp_customize->add_setting( 'logo_size',
    array(
        'default' => $this->defaults['logo_size'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'logo_size',
    array(
        'label' => esc_html__( 'Logo Size', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'       => 9,
        'input_attrs' => array(
            'min' => 10, 
            'max' => 400, 
            'step' => 1, 
        ),
    )
) );

// Mobile logo
$wp_customize->add_setting('mobile_logo', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['mobile_logo'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile_logo', array(
  'label'       => esc_html__('Mobile Logo (Optional)', 'edubin'),
  'description' => esc_html__('Mobile logo only for small device.', 'edubin'),
  'section'     => 'title_tagline',
  'settings'    => 'mobile_logo',
  'priority'    => 9,
)));

// Mobile Logo size
$wp_customize->add_setting( 'mobile_logo_size',
    array(
        'default' => 50,
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'mobile_logo_size',
    array(
        'label' => esc_html__( 'Mobile Logo Size', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'       => 9,
        'input_attrs' => array(
            'min' => 50, 
            'max' => 300, 
            'step' => 1, 
        ),
    )
) );

// Mobile logo device width
$wp_customize->add_setting( 'mobile_logo_screen_width',
    array(
        'default' => 480,
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'mobile_logo_screen_width',
    array(
        'label' => esc_html__( 'Mobile Logo Screen Width', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'       => 9,
        'input_attrs' => array(
            'min' => 480, 
            'max' => 992, 
            'step' => 1, 
        ),
    )
) );

// logo_top_space
$wp_customize->add_setting( 'logo_top_space',
    array(
        'default' => $this->defaults['logo_top_space'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'logo_top_space',
    array(
        'label' => esc_html__( 'Logo Top Space', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'   => 9,
        'input_attrs' => array(
            'min' => 0, 
            'max' => 100, 
            'step' => 1, 
        ),
    )
) );

// logo_bottom_space
$wp_customize->add_setting( 'logo_bottom_space',
    array(
        'default' => $this->defaults['logo_bottom_space'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'logo_bottom_space',
    array(
        'label' => esc_html__( 'Logo Bottom Space', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'   => 9,
        'input_attrs' => array(
            'min' => 0, 
            'max' => 100, 
            'step' => 1, 
        ),
    )
) );

// logo_top_space_mobile
$wp_customize->add_setting( 'logo_top_space_mobile',
    array(
        'default' => $this->defaults['logo_top_space_mobile'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'logo_top_space_mobile',
    array(
        'label' => esc_html__( 'Logo Top Space (Mobile)', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'   => 9,
        'input_attrs' => array(
            'min' => 0, 
            'max' => 100, 
            'step' => 1, 
        ),
    )
) );
// logo_bottom_space_mobile
$wp_customize->add_setting( 'logo_bottom_space_mobile',
    array(
        'default' => $this->defaults['logo_bottom_space_mobile'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'logo_bottom_space_mobile',
    array(
        'label' => esc_html__( 'Logo Bottom Space (Mobile)', 'edubin' ),
        'section' => 'title_tagline', 
        'priority'   => 9,
        'input_attrs' => array(
            'min' => 0, 
            'max' => 100, 
            'step' => 1, 
        ),
    )
) );

// Preloader
$wp_customize->add_section('preloader_section',
    array(
        'title' => esc_html__('Preloader', 'edubin'),
        'panel' => 'general_panel',
        'priority'   => 50,
    )
);
$wp_customize->add_setting('preloader_show',
    array(
        'default'           => $this->defaults['preloader_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'preloader_show',
    array(
        'label'   => esc_html__('Preloader', 'edubin'),
        'section' => 'preloader_section',
    )
));
// Preloader styles
$wp_customize->add_setting( 'preloader_styles',
    array(
        'default' => $this->defaults['preloader_styles'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization'
    )
);
$wp_customize->add_control( 'preloader_styles',
    array(
        'label' => esc_html__( 'Preloader Type', 'edubin' ),
        'section' => 'preloader_section',
        'type' => 'select',
        'choices' => array(
            'image_preloader' => esc_html__( 'Logo Preloader', 'edubin' ),
            'preloader_1' => esc_html__( 'Style 1', 'edubin' ),
            'preloader_2' => esc_html__( 'Style 2', 'edubin' ),
        )
    )
);
// Logo Preloader
$wp_customize->add_setting('preloader_image_url', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['preloader_image_url'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'preloader_image_url', array(
  'label'       => esc_html__('Preloader Image', 'edubin'),
  'description' => esc_html__('It will be work only if you select preloader type "Logo Preloader"', 'edubin'),
  'section'     => 'preloader_section',
  'settings'    => 'preloader_image_url',
  'priority'    => 100,
)));

// Back to Top;
$wp_customize->add_section('back_to_top_section',
    array(
        'title' => esc_html__('Back to Top', 'edubin'),
        'panel' => 'general_panel',
        'priority'   => 50,
    )
);
$wp_customize->add_setting('back_to_top_show',
    array(
        'default'           => $this->defaults['back_to_top_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'back_to_top_show',
    array(
        'label'   => esc_html__('Back to Top', 'edubin'),
        'section' => 'back_to_top_section',
    )
));


// Breadcrumb
$wp_customize->add_section('breadcrumb_section',
    array(
        'title' => esc_html__('Breadcrumb', 'edubin'),
        'panel' => 'general_panel',
        'priority'   => 50,
    )
);

$wp_customize->add_setting('breadcrumb_show',
    array(
        'default'           => $this->defaults['breadcrumb_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'breadcrumb_show',
    array(
        'label'   => esc_html__('Breadcrumb', 'edubin'),
        'section' => 'breadcrumb_section',
    )
));
// Level title
$wp_customize->add_setting( 'shortcode_breadcrumb',
    array(
        'default' => $this->defaults['shortcode_breadcrumb'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'shortcode_breadcrumb',
    array(
        'label' => esc_html__( 'Shortcode Breadcrumb', 'edubin' ),
        'type' => 'text',
        'section' => 'breadcrumb_section'
    )
);
// 404 page
$wp_customize->add_setting('error_404_img', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
    'default'           => $this->defaults['error_404_img'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'error_404_img', array(
    'label'    => esc_html__('404 Image', 'edubin'),
    'section'  => 'error_404',
    'settings' => 'error_404_img',
    'priority' => 9,
)));

$wp_customize->add_setting( 'error_404_heading',
    array(
        'default' => $this->defaults['error_404_heading'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'error_404_heading',
    array(
        'label' => esc_html__( '404 Title', 'edubin' ),
        'type' => 'text',
        'section' => 'error_404'
    )
);
$wp_customize->add_setting( 'error_404_text',
    array(
        'default' => $this->defaults['error_404_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'error_404_text',
    array(
        'label' => esc_html__( '404 Text', 'edubin' ),
        'type' => 'textarea',
        'section' => 'error_404'
    )
);
$wp_customize->add_setting( 'error_404_link_text',
    array(
        'default' => $this->defaults['error_404_link_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'error_404_link_text',
    array(
        'label' => esc_html__( 'Go Home Text', 'edubin' ),
        'type' => 'text',
        'section' => 'error_404'
    )
);
// RTL 
$wp_customize->add_section('rtl_section',
    array(
        'title' => esc_html__('RTL', 'edubin'),
        'panel' => 'general_panel',
        'priority'   => 80,
    )
);

$wp_customize->add_setting('rtl_enable',
    array(
        'default'           => $this->defaults['rtl_enable'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'rtl_enable',
    array(
        'label'   => esc_html__('RTL', 'edubin'),
        'section' => 'rtl_section',
    )
));
// RTL Logo align
$wp_customize->add_setting('rtl_header_logo_align',
    array(
        'default'           => $this->defaults['rtl_header_logo_align'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'rtl_header_logo_align',
    array(
        'label'   => esc_html__('Logo Left Align', 'edubin'),
        'section' => 'rtl_section',
    )
));
// RTL Menu align
$wp_customize->add_setting('rtl_header_menu_align',
    array(
        'default'           => $this->defaults['rtl_header_menu_align'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'rtl_header_menu_align',
    array(
        'label'   => esc_html__('Menu Right Align', 'edubin'),
        'section' => 'rtl_section',
    )
));

// RTL Cart/Search cion align
$wp_customize->add_setting('rtl_header_cart_align',
    array(
        'default'           => $this->defaults['rtl_header_cart_align'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'rtl_header_cart_align',
    array(
        'label'   => esc_html__('Cart Left Align', 'edubin'),
        'section' => 'rtl_section',
    )
));

// Learndash other settings start
$wp_customize->add_section('utilities_sections',
    array(
        'title' => esc_html__('Utilities', 'edubin'),
        'panel' => 'general_panel',
    )
);
// Page featured image
$wp_customize->add_setting('pages_featured_image',
    array(
        'default'           => $this->defaults['pages_featured_image'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'pages_featured_image',
    array(
        'label'   => esc_html__('Pages Featured Image', 'edubin'),
        'section' => 'utilities_sections',
    )
));

// multiple_lms_error_massage
$wp_customize->add_setting('multiple_lms_error_massage',
    array(
        'default'           => $this->defaults['multiple_lms_error_massage'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'multiple_lms_error_massage',
    array(
        'label'   => esc_html__('Multiple Error Message', 'edubin'),
        'section' => 'utilities_sections',
    )
));

// hidden_separator_before_feature_img
$wp_customize->add_setting( 'hidden_separator_before_feature_img',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'hidden_separator_before_feature_img',
    array(
        'label' => __( 'CSS Libraries', 'edubin' ),
        'section' => 'utilities_sections',
        'type' => 'hidden',
    )
);
// Load bootstrap
$wp_customize->add_setting('load_bootstrap_css',
    array(
        'default'           => $this->defaults['load_bootstrap_css'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_bootstrap_css',
    array(
        'label'       => esc_html__('Load Bootstrap CSS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));
// Load bootstrap
$wp_customize->add_setting('load_bootstrap_rtl_css',
    array(
        'default'           => $this->defaults['load_bootstrap_rtl_css'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_bootstrap_rtl_css',
    array(
        'label'       => esc_html__('Load Bootstrap RTL CSS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));
// Load fontawesome
$wp_customize->add_setting('load_fontawesome_css',
    array(
        'default'           => $this->defaults['load_fontawesome_css'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_fontawesome_css',
    array(
        'label'       => esc_html__('Load Fontawesome CSS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));
// Load Owl Carousel
$wp_customize->add_setting('load_owl_carousel_css',
    array(
        'default'           => $this->defaults['load_owl_carousel_css'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_owl_carousel_css',
    array(
        'label'       => esc_html__('Load Owl Carousel CSS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));
// Load animate css
$wp_customize->add_setting('load_animate_css',
    array(
        'default'           => $this->defaults['load_animate_css'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_animate_css',
    array(
        'label'       => esc_html__('Load Animate CSS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));
// hidden_separator_before_load_css
$wp_customize->add_setting( 'hidden_separator_before_load_css',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'hidden_separator_before_load_css',
    array(
        'label' => __( 'JS Libraries', 'edubin' ),
        'section' => 'utilities_sections',
        'type' => 'hidden',
    )
);
// Load bootstrap js
$wp_customize->add_setting('load_bootstrap_js',
    array(
        'default'           => $this->defaults['load_bootstrap_js'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_bootstrap_js',
    array(
        'label'       => esc_html__('Load Bootstrap JS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));


// Load Owl Carousel js
$wp_customize->add_setting('load_owl_carousel_js',
    array(
        'default'           => $this->defaults['load_owl_carousel_js'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'load_owl_carousel_js',
    array(
        'label'       => esc_html__('Load Owl Carousel JS', 'edubin'),
        'section'     => 'utilities_sections',
        'choices'     => array(
            '1'  => esc_html__('Yes', 'edubin'),
            '0' => esc_html__('No', 'edubin'),
        ),
    )
));

