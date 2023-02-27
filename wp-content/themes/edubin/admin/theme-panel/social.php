<?php
// Social Link
$wp_customize->add_section( 'social_section',
    array(
        'title' => esc_html__( 'Social Links', 'edubin' ),
        'panel' => 'general_panel',
        'priority'   => 40,
    )
);

// Add our Checkbox switch setting and control for opening URLs in a new tab
$wp_customize->add_setting('social_newtab',
    array(
        'default'           => $this->defaults['social_newtab'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_newtab',
    array(
        'label'   => esc_html__('Open in new browser tab', 'edubin'),
        'section' => 'social_section',
    )
));
$wp_customize->selective_refresh->add_partial('social_newtab',
    array(
        'selector'            => '.social',
        'container_inclusive' => false,
        'render_callback'     => function () {
            echo edubin_get_social_media();
        },
        'fallback_refresh'    => true,
    )
);

// Add our Text Radio Button setting and Custom Control for controlling alignment of icons
$wp_customize->add_setting('social_alignment',
    array(
        'default'           => $this->defaults['social_alignment'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'social_alignment',
    array(
        'label'       => esc_html__('Alignment', 'edubin'),
        'description' => esc_html__('Choose the alignment for your social icons', 'edubin'),
        'section'     => 'social_section',
        'choices'     => array(
            'alignleft'  => esc_html__('Left', 'edubin'),
            'alignright' => esc_html__('Right', 'edubin'),
        ),
    )
));
$wp_customize->selective_refresh->add_partial('social_alignment',
    array(
        'selector'            => '.social',
        'container_inclusive' => false,
        'render_callback'     => function () {
            echo edubin_get_social_media();
        },
        'fallback_refresh'    => true,
    )
);
// Header top show/hide
$wp_customize->add_setting('follow_us_show',
    array(
        'default'           => $this->defaults['follow_us_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'follow_us_show',
    array(
        'label'   => esc_html__('Enable Follow Us', 'edubin'),
        'section' => 'social_section',
    )
));
// Login button text
$wp_customize->add_setting('follow_us_text',
    array(
        'default'           => $this->defaults['follow_us_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);
$wp_customize->add_control('follow_us_text',
    array(
        'label'   => esc_html__('Custom Follow Us Text', 'edubin'),
        'type'    => 'text',
        'section' => 'social_section',
    )
);
// Add our Sortable Repeater setting and Custom Control for Social media URLs
$wp_customize->add_setting('social_urls',
    array(
        'default'           => $this->defaults['social_urls'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'edubin_url_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Sortable_Repeater_Custom_Control($wp_customize, 'social_urls',
    array(
        'label'         => esc_html__('Social URLs', 'edubin'),
        'description'   => esc_html__('Add your social media links. If you want to remove social media just keep all links blank ', 'edubin'),
        'section'       => 'social_section',
        'button_labels' => array(
            'add' => esc_html__('Add Icon', 'edubin'),
        ),
    )
));
$wp_customize->selective_refresh->add_partial('social_urls',
    array(
        'selector'            => '.social',
        'container_inclusive' => false,
        'render_callback'     => function () {
            echo edubin_get_social_media();
        },
        'fallback_refresh'    => true,
    )
);

$wp_customize->add_setting('social_url_icons',
    array(
        'default'           => $this->defaults['social_url_icons'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization',
    )
);

// Social Shear
$wp_customize->add_section( 'social_shear_section',
    array(
        'title' => esc_html__( 'Social Shear', 'edubin' ),
        'panel' => 'general_panel',
        'priority'   => 40,
    )
);

// social_shear_show
$wp_customize->add_setting('social_shear_show',
    array(
        'default'           => $this->defaults['social_shear_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_show',
    array(
        'label'   => esc_html__('Enable Social Shear', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_tooltip
$wp_customize->add_setting('social_shear_tooltip',
    array(
        'default'           => $this->defaults['social_shear_tooltip'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_tooltip',
    array(
        'label'   => esc_html__('Enable Tooltip', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_facebook
$wp_customize->add_setting('social_shear_facebook',
    array(
        'default'           => $this->defaults['social_shear_facebook'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_facebook',
    array(
        'label'   => esc_html__('Facebook', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_twitter
$wp_customize->add_setting('social_shear_twitter',
    array(
        'default'           => $this->defaults['social_shear_twitter'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_twitter',
    array(
        'label'   => esc_html__('Twitter', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_tumblr
$wp_customize->add_setting('social_shear_tumblr',
    array(
        'default'           => $this->defaults['social_shear_tumblr'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_tumblr',
    array(
        'label'   => esc_html__('Tumblr', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_linkedin
$wp_customize->add_setting('social_shear_linkedin',
    array(
        'default'           => $this->defaults['social_shear_linkedin'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_linkedin',
    array(
        'label'   => esc_html__('Linkedin', 'edubin'),
        'section' => 'social_shear_section',
    )
));
// social_shear_email
$wp_customize->add_setting('social_shear_email',
    array(
        'default'           => $this->defaults['social_shear_email'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'social_shear_email',
    array(
        'label'   => esc_html__('Email', 'edubin'),
        'section' => 'social_shear_section',
    )
));