<?php
// Footer widget
$wp_customize->add_section('footer_global_section',
    array(
        'title' => esc_html__('Footer Global', 'edubin'),
        'panel' => 'footer_panel',
    )
);
// Footer type
$wp_customize->add_setting('edubin_footer_type',
    array(
        'default'           => $this->defaults['edubin_footer_type'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('edubin_footer_type',
    array(
        'label'   => esc_html__('Footer Type', 'edubin'),
        'section' => 'footer_global_section',
        'type'    => 'select',
        'choices' => array(
            'edubin_elementor_footer' => esc_html__('Elementor Builder', 'edubin'),
            'edubin_theme_footer' => esc_html__('Theme Footer', 'edubin'),
        ),
    )
);
// Select Elementor footer
$wp_customize->add_setting( 'edubin_get_elementor_footer',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control( new Edubin_Dropdown_Posts_Custom_Control( $wp_customize, 'edubin_get_elementor_footer',
    array(
        'label' => __( 'Select Elementor Footer', 'edubin' ),
        'section' => 'footer_global_section',
        'input_attrs' => array(
            'posts_per_page' => -1,
            'post_type' => 'eb_footer',
            'orderby' => 'name',
            'order' => 'ASC',
        ),
    )
) );

// Footer variations
$wp_customize->add_setting('footer_variations',
    array(
        'default'           => $this->defaults['footer_variations'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);

$wp_customize->add_control('footer_variations',
    array(
        'label'   => esc_html__('Theme Footer Variations', 'edubin'),
        'section' => 'footer_global_section',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('Style 1', 'edubin'),
            '2' => esc_html__('Style 2', 'edubin'),
        ),
    )
);
// Footer widget
$wp_customize->add_section('footer_section',
    array(
        'title' => esc_html__('Footer Widget', 'edubin'),
        'panel' => 'footer_panel',
    )
);
// Copyright show/hide
$wp_customize->add_setting('copyright_show',
    array(
        'default'           => $this->defaults['copyright_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'copyright_show',
    array(
        'label'    => esc_html__('Footer Copyright', 'edubin'),
        'section'  => 'copyright_section',
        'priority' => 9,
    )
));

// Copyright
$wp_customize->add_section('copyright_section',
    array(
        'title' => esc_html__('Copyright', 'edubin'),
        'panel' => 'footer_panel',
    )
);
$wp_customize->add_setting('copyright_text',
    array(
        'default'           => $this->defaults['copyright_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('copyright_text',
    array(
        'label'   => esc_html__('Copyright Text', 'edubin'),
        'type'    => 'text',
        'section' => 'copyright_section',
    )
);
// Footer menu
$wp_customize->add_setting('show_copyright_menu',
    array(
        'default'           => $this->defaults['show_copyright_menu'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'show_copyright_menu',
    array(
        'label'   => esc_html__('Copyright Menu On Small Device', 'edubin'),
        'section' => 'copyright_section',
    )
));

// Footer widget area
$wp_customize->add_setting('footer_widget_area_column',
    array(
        'default'           => $this->defaults['footer_widget_area_column'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Image_Radio_Button_Custom_Control($wp_customize, 'footer_widget_area_column',
    array(
        'label'       => esc_html__('Footer Widget Column', 'edubin'),
        'description' => esc_html__('Select your footer widget column', 'edubin'),
        'section'     => 'footer_section',
        'choices'     => array(
            '12'      => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-1.png',
                'name'  => esc_html__('12', 'edubin'),
            ),
            '6_6'     => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-2.png',
                'name'  => esc_html__('6-6', 'edubin'),
            ),
            '4_4_4'   => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-3.png',
                'name'  => esc_html__('4-4-4', 'edubin'),
            ),
            '3_3_3_3' => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-4.png',
                'name'  => esc_html__('3-3-3-3', 'edubin'),
            ),
            '3_6_3'   => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-5.png',
                'name'  => esc_html__('3-6-3', 'edubin'),
            ),
            '4_3_2_3' => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-6.png',
                'name'  => esc_html__('4-3-2-3', 'edubin'),
            ),
            '4_2_2_4' => array(
                'image' => trailingslashit(get_template_directory_uri()) . 'admin/assets/images/footer-7.png',
                'name'  => esc_html__('4-2-2-4', 'edubin'),
            ),
        ),
    )
));
