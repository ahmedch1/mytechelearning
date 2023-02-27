<?php

// Woocommerce section sidebar.
$wp_customize->add_section('edubin_wc_section_sidebar',
    array(
        'title' => esc_html__('Sidebar', 'edubin'),
        'panel' => 'woocommerce',
    )
);

$wp_customize->add_setting('edubin_wc_sidebar',
    array(
        'default'           => $this->defaults['edubin_wc_sidebar'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Image_Radio_Button_Custom_Control($wp_customize, 'edubin_wc_sidebar',
    array(
        'label'       => esc_html__('Sidebar', 'edubin'),
        'description' => esc_html__('Select your sidebar position', 'edubin'),
        'section'     => 'edubin_wc_section_sidebar',
        'choices'     => array(
            'sidebarleft'  => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/sidebar-left.png',
                'name'  => esc_html__('Left Sidebar', 'edubin'),
            ),
            'sidebarnone'  => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/sidebar-none.png',
                'name'  => esc_html__('No Sidebar', 'edubin'),
            ),
            'sidebarright' => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/sidebar-right.png',
                'name'  => esc_html__('Right Sidebar', 'edubin'),
            ),
        ),
    )
));
// Woocommerce sidebar width
$wp_customize->add_setting('woo_sidebar_width',
    array(
        'default'           => $this->defaults['woo_sidebar_width'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'woo_sidebar_width',
    array(
        'label'       => esc_html__('Sidebar Width', 'edubin'),
        'section'     => 'edubin_wc_section_sidebar',
        'choices'     => array(
            'sidebar_small'  => esc_html__('25%', 'edubin'),
            'sidebar_big' => esc_html__('33%', 'edubin'),
        ),
    )
));
// Woocommerce review
$wp_customize->add_section('edubin_wc_section_review',
    array(
        'title' => esc_html__('Review', 'edubin'),
        'panel' => 'woocommerce',
    )
);

    // Review
    $wp_customize->add_setting( 'woo_review_tab_show',
        array(
            'default' => $this->defaults['woo_review_tab_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'woo_review_tab_show',
        array(
            'label' => esc_html__( 'Review', 'edubin' ),
            'section' => 'edubin_wc_section_review'
        )
    ) );    
    // Review
    $wp_customize->add_setting( 'woo_review_tab_login_user_show',
        array(
            'default' => $this->defaults['woo_review_tab_login_user_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'woo_review_tab_login_user_show',
        array(
            'label' => esc_html__( 'Publicly/Login User only', 'edubin' ),
            'section' => 'edubin_wc_section_review'
        )
    ) );

