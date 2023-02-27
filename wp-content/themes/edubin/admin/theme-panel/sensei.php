<?php
// Archive page
$wp_customize->add_section('sensei_archive_page_section',
    array(
        'title' => esc_html__('Archive Page', 'edubin'),
        'panel' => 'sensei_panel',
    )
);

// Style
$wp_customize->add_setting('sensei_course_archive_style',
    array(
        'default'           => $this->defaults['sensei_course_archive_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);

$wp_customize->add_control('sensei_course_archive_style',
    array(
        'label'   => esc_html__('Course Style', 'edubin'),
        'section' => 'sensei_archive_page_section',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('Style 01', 'edubin'),
            '2' => esc_html__('Style 02', 'edubin'),
            '3' => esc_html__('Style 03', 'edubin'),
            '4' => esc_html__('Style 04', 'edubin'),
            '5' => esc_html__('Style 05', 'edubin'),
            '6' => esc_html__('Style 06', 'edubin'),
        ),
    )
);
//sensei_course_per_page
$wp_customize->add_setting( 'sensei_course_per_page',
    array(
        'default' => $this->defaults['sensei_course_per_page'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'sensei_course_per_page',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'sensei_archive_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
// Column
$wp_customize->add_setting('sensei_course_archive_clm',
    array(
        'default'           => $this->defaults['sensei_course_archive_clm'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('sensei_course_archive_clm',
    array(
        'label'   => esc_html__('Courses Column', 'edubin'),
        'section' => 'sensei_archive_page_section',
        'type'    => 'select',
        'choices' => array(
            '6' => esc_html__('Column 2', 'edubin'),
            '4' => esc_html__('Column 3', 'edubin'),
            '3' => esc_html__('Column 4', 'edubin'),
        ),
    )
);
// Media
$wp_customize->add_setting( 'sensei_archive_media_show',
    array(
        'default' => $this->defaults['sensei_archive_media_show'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'sensei_archive_media_show',
    array(
        'label' => esc_html__( 'Media', 'edubin' ),
        'section' => 'sensei_archive_page_section'
    )
) );
// sensei_archive_page_title
$wp_customize->add_setting( 'sensei_archive_page_title',
    array(
        'default' => $this->defaults['sensei_archive_page_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'sensei_archive_page_title',
    array(
        'label' => esc_html__( 'Custom Page Title', 'edubin' ),
        'type' => 'text',
        'section' => 'sensei_archive_page_section'
    )
);
// Archive image size
$wp_customize->add_setting( 'sensei_archive_image_size',
    array(
        'default' => $this->defaults['sensei_archive_image_size'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'sensei_archive_image_size',
    array(
        'label' => __( 'Image Size', 'edubin' ),
        'section' => 'sensei_archive_page_section',
        'input_attrs' => array(
            'placeholder' => __( 'Select image size', 'edubin' ),
            'multiselect' => false,
        ),
        'choices' => get_intermediate_image_sizes(),
    )
) );

// intor_video_imaget
$wp_customize->add_setting('sensei_intor_video_image',
    array(
        'default'           => $this->defaults['sensei_intor_video_image'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_intor_video_image',
    array(
        'label'   => esc_html__('Intro Video', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));
// Custom placeholder image
$wp_customize->add_setting('sensei_custom_placeholder_image', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['sensei_custom_placeholder_image'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sensei_custom_placeholder_image', array(
  'label'       => esc_html__('Custom Placeholder Image', 'edubin'),
  'section'     => 'sensei_archive_page_section',
)));
// Title
$wp_customize->add_setting( 'sensei_archive_title_show',
    array(
        'default' => $this->defaults['sensei_archive_title_show'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization'
    )
);
$wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'sensei_archive_title_show',
    array(
        'label' => esc_html__( 'Title', 'edubin' ),
        'section' => 'sensei_archive_page_section'
    )
) ); 
// Price
$wp_customize->add_setting('sensei_price_show',
    array(
        'default'           => $this->defaults['sensei_price_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_price_show',
    array(
        'label'   => esc_html__('Price', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));

// Lesson
$wp_customize->add_setting('sensei_lesson_show',
    array(
        'default'           => $this->defaults['sensei_lesson_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_lesson_show',
    array(
        'label'   => esc_html__('Lessons', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));

// Category
$wp_customize->add_setting('sensei_cat_show',
    array(
        'default'           => $this->defaults['sensei_cat_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_cat_show',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));
// Avatar
$wp_customize->add_setting('sensei_instructor_name_on_off',
    array(
        'default'           => $this->defaults['sensei_instructor_name_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_instructor_name_on_off',
    array(
        'label'   => esc_html__('Create by Avatar', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));

// Name
$wp_customize->add_setting('sensei_instructor_name_on_off',
    array(
        'default'           => $this->defaults['sensei_instructor_name_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_instructor_name_on_off',
    array(
        'label'   => esc_html__('Create by Name', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));

// Excerpt
$wp_customize->add_setting('sensei_excerpt_show',
    array(
        'default'           => $this->defaults['sensei_excerpt_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_excerpt_show',
    array(
        'label'   => esc_html__('Excerpt', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));

// See more Button
$wp_customize->add_setting('see_more_btn_or_icon',
    array(
        'default'           => $this->defaults['see_more_btn_or_icon'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'see_more_btn_or_icon',
    array(
        'label'   => esc_html__('See More/Icon', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));
// Read more button text
$wp_customize->add_setting('sensei_see_more_btn_text',
    array(
        'default'           => $this->defaults['sensei_see_more_btn_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('sensei_see_more_btn_text',
    array(
        'label'   => esc_html__('See More Button - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'sensei_archive_page_section',
    )
);
// Free custom text
$wp_customize->add_setting('free_custom_text',
    array(
        'default'           => $this->defaults['free_custom_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('free_custom_text',
    array(
        'label'   => esc_html__('Free - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'sensei_archive_page_section',
    )
);

// ====== Sensei single page ======
$wp_customize->add_section('sensei_single_page_section',
    array(
        'title' => esc_html__('Single Page', 'edubin'),
        'panel' => 'sensei_panel',
    )
);
    // Course Style
    $wp_customize->add_setting( 'sensei_single_page_layout',
        array(
            'default' => $this->defaults['sensei_single_page_layout'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( 'sensei_single_page_layout',
        array(
            'label' => esc_html__( 'Single Page Layout', 'edubin' ),
            'section' => 'sensei_single_page_section',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( 'Style 01', 'edubin' ),
                '2' => esc_html__( 'Style 02', 'edubin' ),
                '3' => esc_html__( 'Style 03', 'edubin' ),
                '4' => esc_html__( 'Style 04', 'edubin' ),
            )
        )
    );
$wp_customize->add_setting('sensei_intro_video_position',
    array(
        'default'           => $this->defaults['sensei_intro_video_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('sensei_intro_video_position',
    array(
        'label'   => esc_html__('Preview Media', 'edubin'),
        'section' => 'sensei_single_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'intro_video_content' => esc_html__('Content Section', 'edubin'),
            'intro_video_sidebar' => esc_html__('Sidebar Section', 'edubin'),
        ),
    )
);

// sensei_single_header_meta
$wp_customize->add_setting('sensei_single_header_meta',
    array(
        'default'           => $this->defaults['sensei_single_header_meta'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_header_meta',
    array(
        'label'   => esc_html__('Header Meta', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_breadcrumb
$wp_customize->add_setting('sensei_single_breadcrumb',
    array(
        'default'           => $this->defaults['sensei_single_breadcrumb'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_breadcrumb',
    array(
        'label'   => esc_html__('Breadcrumb', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_last_update_single
$wp_customize->add_setting('sensei_last_update_single',
    array(
        'default'           => $this->defaults['sensei_last_update_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_last_update_single',
    array(
        'label'   => esc_html__('Last Updated', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_short_text
$wp_customize->add_setting('sensei_single_short_text',
    array(
        'default'           => $this->defaults['sensei_single_short_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_short_text',
    array(
        'label'   => esc_html__('Short Text', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_info_heading
$wp_customize->add_setting( 'sensei_single_info_heading',
    array(
        'default' => $this->defaults['sensei_single_info_heading'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'sensei_single_info_heading',
    array(
        'label' => esc_html__( 'Course Info', 'edubin' ),
        'type' => 'text',
        'section' => 'sensei_related_page_section'
    )
);
// Instructor
$wp_customize->add_setting('sensei_instructor_single',
    array(
        'default'           => $this->defaults['sensei_instructor_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_instructor_single',
    array(
        'label'   => esc_html__('Instructor', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei custom meta position
$wp_customize->add_setting('sensei_custom_features_position',
    array(
        'default'           => $this->defaults['sensei_custom_features_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('sensei_custom_features_position',
    array(
        'label'   => esc_html__('Custom Features List Position', 'edubin'),
        'section' => 'course_features_section',
        'type'    => 'select',
        'choices' => array(
            'top'    => esc_html__('Top', 'edubin'),
            'bottom' => esc_html__('Buttom', 'edubin'),
        ),
    )
);
// sensei_single_created_by
$wp_customize->add_setting('sensei_single_created_by',
    array(
        'default'           => $this->defaults['sensei_single_created_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_created_by',
    array(
        'label'   => esc_html__('Created By', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));

// sensei_single_lessons
$wp_customize->add_setting('sensei_single_lessons',
    array(
        'default'           => $this->defaults['sensei_single_lessons'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_lessons',
    array(
        'label'   => esc_html__('Lessons', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_course_cat
$wp_customize->add_setting('sensei_single_course_cat',
    array(
        'default'           => $this->defaults['sensei_single_course_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_course_cat',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_language
$wp_customize->add_setting('sensei_single_language',
    array(
        'default'           => $this->defaults['sensei_single_language'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_language',
    array(
        'label'   => esc_html__('Language', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));

// sensei_single_social_shear
$wp_customize->add_setting('sensei_single_social_shear',
    array(
        'default'           => $this->defaults['sensei_single_social_shear'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_social_shear',
    array(
        'label'   => esc_html__('Social Share', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_single_sidebar_sticky
$wp_customize->add_setting('sensei_single_sidebar_sticky',
    array(
        'default'           => $this->defaults['sensei_single_sidebar_sticky'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_single_sidebar_sticky',
    array(
        'label'   => esc_html__('Sidebar Sticky', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
// sensei_last_update_single
$wp_customize->add_setting('sensei_last_update_single',
    array(
        'default'           => $this->defaults['sensei_last_update_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_last_update_single',
    array(
        'label'   => esc_html__('Last Update', 'edubin'),
        'section' => 'sensei_single_page_section',
    )
));
$wp_customize->add_setting('sensei_intro_video_position',
    array(
        'default'           => $this->defaults['sensei_intro_video_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('sensei_intro_video_position',
    array(
        'label'   => esc_html__('Intro Video Position', 'edubin'),
        'section' => 'sensei_single_page_section',
        'type'    => 'select',
        'choices' => array(
            'intro_video_content' => esc_html__('Content', 'edubin'),
            'intro_video_sidebar' => esc_html__('Sidebar', 'edubin'),
        ),
    )
);
// *** ======== sensei_related_page_section ========= ******
$wp_customize->add_section('sensei_related_page_section',
    array(
        'title' => esc_html__('Related Courses', 'edubin'),
        'panel' => 'sensei_panel',
    )
);
//sensei_related_course_position
$wp_customize->add_setting('sensei_related_course_position',
    array(
        'default'           => $this->defaults['sensei_related_course_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('sensei_related_course_position',
    array(
        'label'   => esc_html__('Related Course Preview', 'edubin'),
        'section' => 'sensei_related_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'sidebar' => esc_html__('Sidebar Area', 'edubin'),
            'content' => esc_html__('Content Area', 'edubin'),
        ),
    )
);
//sensei_related_course_style
$wp_customize->add_setting('sensei_related_course_style',
    array(
        'default'           => $this->defaults['sensei_related_course_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'sensei_related_course_style',
    array(
        'label'       => esc_html__('Related Course Style', 'edubin'),
        'section'     => 'sensei_related_page_section',
        'choices'     => array(
            'round' => esc_html__('Round', 'edubin'),
            'square' => esc_html__('Square', 'edubin'),
        ),
    )
));

// sensei_related_course_title
$wp_customize->add_setting( 'sensei_related_course_title',
    array(
        'default' => $this->defaults['sensei_related_course_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'sensei_related_course_title',
    array(
        'label' => esc_html__( 'Custom Heading', 'edubin' ),
        'type' => 'text',
        'section' => 'sensei_related_page_section'
    )
);
//sensei_related_course_items
$wp_customize->add_setting( 'sensei_related_course_items',
    array(
        'default' => $this->defaults['sensei_related_course_items'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'sensei_related_course_items',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'sensei_related_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
//sensei_related_course_by
$wp_customize->add_setting('sensei_related_course_by',
    array(
        'default'           => $this->defaults['sensei_related_course_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'sensei_related_course_by',
    array(
        'label'       => esc_html__('Related Course By', 'edubin'),
        'section'     => 'sensei_related_page_section',
        'choices'     => array(
            'category' => esc_html__('Category', 'edubin'),
            'tags' => esc_html__('Tags', 'edubin'),
        ),
    )
));

// *** ======== sensei_utilities_section ========= ******
$wp_customize->add_section('sensei_utilities_section',
    array(
        'title' => esc_html__('Utilities', 'edubin'),
        'panel' => 'sensei_panel',
    )
);

// sensei_layout_override
$wp_customize->add_setting('sensei_layout_override',
    array(
        'default'           => $this->defaults['sensei_layout_override'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'sensei_layout_override',
    array(
        'label'   => esc_html__('Custom Lesson Style', 'edubin'),
        'section' => 'sensei_utilities_section',
    )
));