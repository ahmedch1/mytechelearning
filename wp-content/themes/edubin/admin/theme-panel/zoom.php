<?php
// Archive page
$wp_customize->add_section('zoom_meeting_archive_page_section',
    array(
        'title' => esc_html__('Archive Page', 'edubin'),
        'panel' => 'zoom_meeting_panel',
    )
);

// Hosted
$wp_customize->add_setting('edubin_zm_archive_hotted',
    array(
        'default'           => $this->defaults['edubin_zm_archive_hotted'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'edubin_zm_archive_hotted',
    array(
        'label'   => esc_html__('Hosted', 'edubin'),
        'section' => 'zoom_meeting_archive_page_section',
    )
));
// Start Date
$wp_customize->add_setting('edubin_zm_archive_start_date',
    array(
        'default'           => $this->defaults['edubin_zm_archive_start_date'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'edubin_zm_archive_start_date',
    array(
        'label'   => esc_html__('Start Date', 'edubin'),
        'section' => 'zoom_meeting_archive_page_section',
    )
));

// Tiemzone
$wp_customize->add_setting('edubin_zm_archive_time_zone',
    array(
        'default'           => $this->defaults['edubin_zm_archive_time_zone'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'edubin_zm_archive_time_zone',
    array(
        'label'   => esc_html__('Timezone', 'edubin'),
        'section' => 'zoom_meeting_archive_page_section',
    )
));

// Excerpt
$wp_customize->add_setting('edubin_zm_excerpt',
    array(
        'default'           => $this->defaults['edubin_zm_excerpt'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'edubin_zm_excerpt',
    array(
        'label'   => esc_html__('Excerpt', 'edubin'),
        'section' => 'zoom_meeting_archive_page_section',
    )
));

