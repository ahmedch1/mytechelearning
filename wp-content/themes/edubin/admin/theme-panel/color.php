<?php
// Header top
$wp_customize->add_setting( 'hidden_separator_primary_color',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'hidden_separator_primary_color',
    array(
        'label' => __( 'Theme Colors', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Primary color
$wp_customize->add_setting( 'primary_color',
    array(
        'default' => $this->defaults['primary_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization',
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'primary_color',
    array(
        'label' => esc_html__( 'Primary Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Secondary color
$wp_customize->add_setting( 'secondary_color',
    array(
        'default' => $this->defaults['secondary_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'secondary_color',
    array(
        'label' => esc_html__( 'Secondary Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Content color
$wp_customize->add_setting( 'content_color',
    array(
        'default' => $this->defaults['content_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'content_color',
    array(
        'label' => esc_html__( 'Content Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Header top
$wp_customize->add_setting( 'header_top_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'header_top_hidden_separator',
    array(
        'label' => __( 'Header Top', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
 // Text color
    $wp_customize->add_setting( 'header_top_text_color',
        array(
            'default' => $this->defaults['header_top_text_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_top_text_color',
        array(
            'label' => esc_html__( 'Header Top Text', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );

    // Link color
    $wp_customize->add_setting( 'header_top_link_color',
        array(
            'default' => $this->defaults['header_top_link_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_top_link_color',
        array(
            'label' => esc_html__( 'Header Top Link', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
    // Background color
    $wp_customize->add_setting( 'header_top_bg_color',
        array(
            'default' => $this->defaults['header_top_bg_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_top_bg_color',
        array(
            'label' => esc_html__( 'Header Top Background', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
// Header banner overlay
$wp_customize->add_setting( 'header_banner_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'header_banner_hidden_separator',
    array(
        'label' => __( 'Theme Header', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Banner overlay
$wp_customize->add_setting( 'header_banner_overlay_color',
    array(
        'default' => $this->defaults['header_banner_overlay_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_banner_overlay_color',
    array(
        'label' => esc_html__( 'Header Banner Overlay', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Header title color
$wp_customize->add_setting( 'header_title_color',
    array(
        'default' => $this->defaults['header_title_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_title_color',
    array(
        'label' => esc_html__( 'Header Title Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Breadcrumb color
$wp_customize->add_setting( 'breadcrumb_text_color',
    array(
        'default' => $this->defaults['breadcrumb_text_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'breadcrumb_text_color',
    array(
        'label' => esc_html__( 'Breadcrumb Text Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Header menu background
$wp_customize->add_setting( 'header_menu_bg_color',
    array(
        'default' => $this->defaults['header_menu_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_menu_bg_color',
    array(
        'label' => esc_html__( 'Header Menu Background', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Header menu sticky background
$wp_customize->add_setting( 'header_menu_sticky_bg_color',
    array(
        'default' => $this->defaults['header_menu_sticky_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'header_menu_sticky_bg_color',
    array(
        'label' => esc_html__( 'Header Sticky Menu Background', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Back to top icon
$wp_customize->add_setting( 'search_popup_bg_color',
    array(
        'default' => $this->defaults['search_popup_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'search_popup_bg_color',
    array(
        'label' => esc_html__( 'Search Popup Overlay', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Title/Heading Hidden Control
$wp_customize->add_setting( 'title_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'title_hidden_separator',
    array(
        'label' => __( 'Title/Heading', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);


// Heading/Title color
$wp_customize->add_setting( 'tertiary_color',
    array(
        'default' => $this->defaults['tertiary_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'tertiary_color',
    array(
        'label' => esc_html__( 'Title Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Test of Hidden Control
$wp_customize->add_setting( 'link_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'link_hidden_separator',
    array(
        'label' => __( 'Links/Anchor', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Link color
$wp_customize->add_setting( 'link_color',
    array(
        'default' => $this->defaults['link_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'link_color',
    array(
        'label' => esc_html__( 'Link Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Link hover color
$wp_customize->add_setting( 'link_hover_color',
    array(
        'default' => $this->defaults['link_hover_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'link_hover_color',
    array(
        'label' => esc_html__( 'Link Hover Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Test of Hidden Control
$wp_customize->add_setting( 'button_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'button_hidden_separator',
    array(
        'label' => __( 'Buttons', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Button text color
$wp_customize->add_setting( 'btn_text_color',
    array(
        'default' => $this->defaults['btn_text_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'btn_text_color',
    array(
        'label' => esc_html__( 'Button Text', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Button hover text
$wp_customize->add_setting( 'btn_text_hover_color',
    array(
        'default' => $this->defaults['btn_text_hover_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'btn_text_hover_color',
    array(
        'label' => esc_html__( 'Button Hover Text', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Button/Submit color
$wp_customize->add_setting( 'btn_color',
    array(
        'default' => $this->defaults['btn_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'btn_color',
    array(
        'label' => esc_html__( 'Button Background', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );


// Button/Submit hover color
$wp_customize->add_setting( 'btn_hover_color',
    array(
        'default' => $this->defaults['btn_hover_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'btn_hover_color',
    array(
        'label' => esc_html__( 'Button Background Hover', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Menu hidden control
$wp_customize->add_setting( 'menu_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'menu_hidden_separator',
    array(
        'label' => __( 'Menu', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Menu
$wp_customize->add_setting( 'menu_text_color',
    array(
        'default' => $this->defaults['menu_text_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'menu_text_color',
    array(
        'label' => esc_html__( 'Menu Text Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// menu link/hover color
$wp_customize->add_setting( 'menu_hover_color',
    array(
        'default' => $this->defaults['menu_hover_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'menu_hover_color',
    array(
        'label' => esc_html__( 'Menu Hover Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// menu active color
$wp_customize->add_setting( 'menu_active_color',
    array(
        'default' => $this->defaults['menu_active_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'menu_active_color',
    array(
        'label' => esc_html__( 'Menu Active Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Sub menu color
$wp_customize->add_setting( 'sub_menu_text_color',
    array(
        'default' => $this->defaults['sub_menu_text_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_text_color',
    array(
        'label' => esc_html__( 'Sub Menu Text Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );


// Sub menu arrow color
$wp_customize->add_setting( 'sub_menu_arrow_color',
    array(
        'default' => $this->defaults['sub_menu_arrow_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_arrow_color',
    array(
        'label' => esc_html__( 'Sub Menu Arrow Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Sub menu bg color
$wp_customize->add_setting( 'sub_menu_bg_color',
    array(
        'default' => $this->defaults['sub_menu_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_bg_color',
    array(
        'label' => esc_html__( 'Sub Menu Background Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Sub menu border color
$wp_customize->add_setting( 'sub_menu_border_color',
    array(
        'default' => $this->defaults['sub_menu_border_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'sub_menu_border_color',
    array(
        'label' => esc_html__( 'Sub Menu Border Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Mobile menu icon color
$wp_customize->add_setting( 'mobile_menu_icon_color',
    array(
        'default' => $this->defaults['mobile_menu_icon_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'mobile_menu_icon_color',
    array(
        'label' => esc_html__( 'Mobile Menu Icon Color', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Placeholder hidden
$wp_customize->add_setting( 'placeholder_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'placeholder_hidden_separator',
    array(
        'label' => __( 'Placeholder', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Placeholder Color
$wp_customize->add_setting( 'placeholder_color',
    array(
        'default' => $this->defaults['placeholder_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'placeholder_color',
    array(
        'label' => esc_html__( 'Placeholder', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Preloader hidden
$wp_customize->add_setting( 'preloader_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'preloader_hidden_separator',
    array(
        'label' => __( 'Preloader', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Preloader primary
$wp_customize->add_setting( 'preloader_color_primary',
    array(
        'default' => $this->defaults['preloader_color_primary'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'preloader_color_primary',
    array(
        'label' => esc_html__( 'Preloader Primary', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Prealoader secondary 
$wp_customize->add_setting( 'preloader_color_secondary',
    array(
        'default' => $this->defaults['preloader_color_secondary'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'preloader_color_secondary',
    array(
        'label' => esc_html__( 'Preloader Secondary ', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Prealoader background 
$wp_customize->add_setting( 'preloader_bg_color',
    array(
        'default' => $this->defaults['preloader_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'preloader_bg_color',
    array(
        'label' => esc_html__( 'Preloader background ', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );

// Back to top hidden
$wp_customize->add_setting( 'back_to_top_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'back_to_top_hidden_separator',
    array(
        'label' => __( 'Back to Top', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
// Back to top icon
$wp_customize->add_setting( 'bakc_to_top_icon_color',
    array(
        'default' => $this->defaults['bakc_to_top_icon_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'bakc_to_top_icon_color',
    array(
        'label' => esc_html__( 'Back to Top Icon', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Back to top
$wp_customize->add_setting( 'bakc_to_top_bg_color',
    array(
        'default' => $this->defaults['bakc_to_top_bg_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_hex_rgba_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'bakc_to_top_bg_color',
    array(
        'label' => esc_html__( 'Back to Top Background', 'edubin' ),
        'section' => 'colors',
        'show_opacity' => true,
        'priority' => 5,
        'palette' => array(
            '#000',
            '#fff',
            '#df312c',
            '#df9a23',
            '#eef000',
            '#7ed934',
            '#1571c1',
            '#8309e7'
        )
    )
) );
// Footer  Hidden Control
$wp_customize->add_setting( 'footer_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'footer_hidden_separator',
    array(
        'label' => __( 'Footer', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);
 // Text color
    $wp_customize->add_setting( 'footer_text_color',
        array(
            'default' => $this->defaults['footer_text_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'footer_text_color',
        array(
            'label' => esc_html__( 'Footer Text', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );

    // Link color
    $wp_customize->add_setting( 'footer_link_color',
        array(
            'default' => $this->defaults['footer_link_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'footer_link_color',
        array(
            'label' => esc_html__( 'Footer Link Color', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
    // Button/footer color
    $wp_customize->add_setting( 'footer_btn_submit_color',
        array(
            'default' => $this->defaults['footer_btn_submit_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'footer_btn_submit_color',
        array(
            'label' => esc_html__( 'Footer Button/Submit', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );

    // Background color
    $wp_customize->add_setting( 'footer_bg_color',
        array(
            'default' => $this->defaults['footer_bg_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'footer_bg_color',
        array(
            'label' => esc_html__( 'Footer Background', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
    
    // Text color
    $wp_customize->add_setting( 'copyright_text_color',
        array(
            'default' => $this->defaults['copyright_text_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'copyright_text_color',
        array(
            'label' => esc_html__( 'Footer Copyright Text', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );

    // Link color
    $wp_customize->add_setting( 'copyright_link_color',
        array(
            'default' => $this->defaults['copyright_link_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'copyright_link_color',
        array(
            'label' => esc_html__( 'Footer Copyright Link', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
    // Background color
    $wp_customize->add_setting( 'copyright_bg_color',
        array(
            'default' => $this->defaults['copyright_bg_color'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control( new Edubin_Customize_Alpha_Color_Control( $wp_customize, 'copyright_bg_color',
        array(
            'label' => esc_html__( 'Footer Copyright Background', 'edubin' ),
            'section' => 'colors',
            'show_opacity' => true,
            'priority' => 5,
            'palette' => array(
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ) );
// Test of Hidden Control
$wp_customize->add_setting( 'other_hidden_separator',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( 'other_hidden_separator',
    array(
        'label' => __( 'Others', 'edubin' ),
        'section' => 'colors',
        'type' => 'hidden',
        'priority' => 5,
    )
);