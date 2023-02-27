<?php

// The event calender archive page
$wp_customize->add_section('tribe_events_archive_page_section',
    array(
        'title' => esc_html__('Archive Page', 'edubin'),
        'panel' => 'edubin_tribe_customizer_panel',
    )
);
// tribe_events_archive_page_title
$wp_customize->add_setting( 'tribe_events_archive_page_title',
    array(
        'default' => $this->defaults['tribe_events_archive_page_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'tribe_events_archive_page_title',
    array(
        'label' => esc_html__( 'Custom Page Title', 'edubin' ),
        'type' => 'text',
        'section' => 'tribe_events_archive_page_section'
    )
);
// edubin_archive_events_layout
$wp_customize->add_setting( 'edubin_archive_events_layout',
    array(
        'default' => $this->defaults['edubin_archive_events_layout'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization'
    )
);
$wp_customize->add_control( 'edubin_archive_events_layout',
    array(
        'label' => esc_html__( 'Page Layout', 'edubin' ),
        'section' => 'tribe_events_archive_page_section',
        'type' => 'select',
        'choices' => array(
            'default' => esc_html__( 'Plugin Default', 'edubin' ),
            'layout_2' => esc_html__( 'Grid Layout', 'edubin' ),
        )
    )
);
    //events_course_per_page
    $wp_customize->add_setting( 'events_course_per_page',
        array(
            'default' => $this->defaults['events_course_per_page'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_sanitize_integer'

        )
    );
    $wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'events_course_per_page',
        array(
            'label' => esc_html__( 'Events Items', 'edubin' ),
            'section' => 'tribe_events_archive_page_section', 
            'input_attrs' => array(
                'min' => 1, 
                'max' => 30, 
                'step' => 1, 
            ),
        )
    ) );

// events_columns
$wp_customize->add_setting('events_columns',
    array(
        'default'           => $this->defaults['events_columns'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'events_columns',
    array(
        'label'       => esc_html__('Event Columns', 'edubin'),
        'section'     => 'tribe_events_archive_page_section',
        'choices'     => array(
            '12' => esc_html__('1', 'edubin'),
            '6' => esc_html__('2', 'edubin'),
            '4' => esc_html__('3', 'edubin'),
            '3' => esc_html__('4', 'edubin'),
        ),
    )
));

// event_intor_video_image
$wp_customize->add_setting('event_intor_video_image',
    array(
        'default'           => $this->defaults['event_intor_video_image'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'event_intor_video_image',
    array(
        'label'   => esc_html__('Intro Video', 'edubin'),
        'section' => 'tribe_events_archive_page_section',
    )
));
// event_custom_placeholder_image
$wp_customize->add_setting('event_custom_placeholder_image', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['event_custom_placeholder_image'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'event_custom_placeholder_image', array(
  'label'       => esc_html__('Custom Placeholder Image', 'edubin'),
  'section'     => 'tribe_events_archive_page_section',
)));


// show_event_date 
$wp_customize->add_setting( 'show_event_date',
    array(
        'default' => $this->defaults['show_event_date'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'show_event_date',
    array(
        'label' => esc_html__( 'Event Date', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 

// show_event_end_date 
$wp_customize->add_setting( 'show_event_end_date',
    array(
        'default' => $this->defaults['show_event_end_date'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'show_event_end_date',
    array(
        'label' => esc_html__( 'Event End Date', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 
// show_event_time 
$wp_customize->add_setting( 'show_event_time',
    array(
        'default' => $this->defaults['show_event_time'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'show_event_time',
    array(
        'label' => esc_html__( 'Event Time', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 
// show_event_vanue 
$wp_customize->add_setting( 'show_event_vanue',
    array(
        'default' => $this->defaults['show_event_vanue'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'show_event_vanue',
    array(
        'label' => esc_html__( 'Event Vanue', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 
// price 
$wp_customize->add_setting( 'tbe_price',
    array(
        'default' => $this->defaults['tbe_price'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_price',
    array(
        'label' => esc_html__( 'Price', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 
//events_title_word
$wp_customize->add_setting( 'events_title_word',
    array(
        'default' => $this->defaults['events_title_word'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'events_title_word',
    array(
        'label' => esc_html__( 'Title Word Count', 'edubin' ),
        'section' => 'tutor_course_filter_section', 
        'input_attrs' => array(
            'min' => 3, 
            'max' => 240, 
            'step' => 1, 
        ),
    )
) );
// Meta 
$wp_customize->add_setting( 'tbe_archive_meta',
    array(
        'default' => $this->defaults['tbe_archive_meta'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_archive_meta',
    array(
        'label' => esc_html__( 'Meta', 'edubin' ),
        'section' => 'tribe_events_archive_page_section'
    )
) ); 
// edubin_events_date_format
$wp_customize->add_setting( 'edubin_events_date_format',
    array(
        'default' => $this->defaults['edubin_events_date_format'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'edubin_events_date_format',
    array(
        'label' => esc_html__( 'Date Format', 'edubin' ),
        'type' => 'text',
        'section' => 'tribe_events_archive_page_section'
    )
);
// edubin_events_time_format
$wp_customize->add_setting( 'edubin_events_time_format',
    array(
        'default' => $this->defaults['edubin_events_time_format'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'edubin_events_time_format',
    array(
        'label' => esc_html__( 'Time Format', 'edubin' ),
        'type' => 'text',
        'section' => 'tribe_events_archive_page_section'
    )
);
// edubin_events_date_separator
$wp_customize->add_setting( 'edubin_events_date_separator',
    array(
        'default' => $this->defaults['edubin_events_date_separator'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'edubin_events_date_separator',
    array(
        'label' => esc_html__( 'Date Separator', 'edubin' ),
        'type' => 'text',
        'section' => 'tribe_events_archive_page_section'
    )
);
// edubin_events_time_separator
$wp_customize->add_setting( 'edubin_events_time_separator',
    array(
        'default' => $this->defaults['edubin_events_time_separator'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'edubin_events_time_separator',
    array(
        'label' => esc_html__( 'Time Separator', 'edubin' ),
        'type' => 'text',
        'section' => 'tribe_events_archive_page_section'
    )
);
// ===== The event calender single page =====
$wp_customize->add_section('edubin_tribe_events_single_page',
    array(
        'title' => esc_html__('Single Page', 'edubin'),
        'panel' => 'edubin_tribe_customizer_panel',
    )
);

// Layout
$wp_customize->add_setting( 'edubin_tribe_events_layout',
    array(
        'default' => $this->defaults['edubin_tribe_events_layout'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization'
    )
);
$wp_customize->add_control( 'edubin_tribe_events_layout',
    array(
        'label' => esc_html__( 'Page Layout', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page',
        'type' => 'select',
        'choices' => array(
            'default' => esc_html__( 'Plugin Default', 'edubin' ),
            'layout_1' => esc_html__( 'Layout 01', 'edubin' ),
            'layout_2' => esc_html__( 'Layout 02', 'edubin' ),
        )
    )
);
// Countdown 
$wp_customize->add_setting( 'tbe_event_countdown',
    array(
        'default' => $this->defaults['tbe_event_countdown'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_event_countdown',
    array(
        'label' => esc_html__( 'Countdown', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// Maps 
$wp_customize->add_setting( 'tbe_event_maps',
    array(
        'default' => $this->defaults['tbe_event_maps'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_event_maps',
    array(
        'label' => esc_html__( 'Maps', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// event_date 
$wp_customize->add_setting( 'tbe_event_cost',
    array(
        'default' => $this->defaults['tbe_event_cost'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_event_cost',
    array(
        'label' => esc_html__( 'Event Cost', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 

// start_time 
$wp_customize->add_setting( 'tbe_start_time',
    array(
        'default' => $this->defaults['tbe_start_time'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_start_time',
    array(
        'label' => esc_html__( 'Start Time', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// end_time 
$wp_customize->add_setting( 'tbe_end_time',
    array(
        'default' => $this->defaults['tbe_end_time'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_end_time',
    array(
        'label' => esc_html__( 'End Time', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) );  
// website 
$wp_customize->add_setting( 'tbe_website',
    array(
        'default' => $this->defaults['tbe_website'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_website',
    array(
        'label' => esc_html__( 'Website', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// phone 
$wp_customize->add_setting( 'tbe_phone',
    array(
        'default' => $this->defaults['tbe_phone'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_phone',
    array(
        'label' => esc_html__( 'Phone', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// tbe_email 
$wp_customize->add_setting( 'tbe_email',
    array(
        'default' => $this->defaults['tbe_email'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_email',
    array(
        'label' => esc_html__( 'Email', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// tbe_organizer
$wp_customize->add_setting( 'tbe_organizer_ids',
    array(
        'default' => $this->defaults['tbe_organizer_ids'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_organizer_ids',
    array(
        'label' => esc_html__( 'Organizer', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 

// Location 
$wp_customize->add_setting( 'tbe_location',
    array(
        'default' => $this->defaults['tbe_location'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_location',
    array(
        'label' => esc_html__( 'Location', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// Content before massage 
$wp_customize->add_setting( 'tbe_content_before_massage',
    array(
        'default' => $this->defaults['tbe_content_before_massage'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_content_before_massage',
    array(
        'label' => esc_html__( 'Before Content', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 
// Content after massage 
$wp_customize->add_setting( 'tbe_content_after_massage',
    array(
        'default' => $this->defaults['tbe_content_after_massage'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tbe_content_after_massage',
    array(
        'label' => esc_html__( 'After Content', 'edubin' ),
        'section' => 'edubin_tribe_events_single_page'
    )
) ); 