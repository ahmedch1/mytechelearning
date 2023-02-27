<?php
// Archive page
$wp_customize->add_section('ld_archive_page_section',
    array(
        'title' => esc_html__('Archive Page', 'edubin'),
        'panel' => 'learndash_panel',
    )
);

// Style
$wp_customize->add_setting('ld_course_archive_style',
    array(
        'default'           => $this->defaults['ld_course_archive_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);

$wp_customize->add_control('ld_course_archive_style',
    array(
        'label'   => esc_html__('Course Style', 'edubin'),
        'section' => 'ld_archive_page_section',
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
//ld_course_per_page
$wp_customize->add_setting( 'ld_course_per_page',
    array(
        'default' => $this->defaults['ld_course_per_page'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'ld_course_per_page',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'ld_archive_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );

// Column
$wp_customize->add_setting('ld_course_archive_clm',
    array(
        'default'           => $this->defaults['ld_course_archive_clm'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('ld_course_archive_clm',
    array(
        'label'   => esc_html__('Courses Column', 'edubin'),
        'section' => 'ld_archive_page_section',
        'type'    => 'select',
        'choices' => array(
            '6' => esc_html__('Column 2', 'edubin'),
            '4' => esc_html__('Column 3', 'edubin'),
            '3' => esc_html__('Column 4', 'edubin'),
        ),
    )
);

// ld_archive_page_title
$wp_customize->add_setting( 'ld_archive_page_title',
    array(
        'default' => $this->defaults['ld_archive_page_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'ld_archive_page_title',
    array(
        'label' => esc_html__( 'Custom Page Title', 'edubin' ),
        'type' => 'text',
        'section' => 'ld_archive_page_section'
    )
);
// Title
    $wp_customize->add_setting( 'ld_archive_title_show',
        array(
            'default' => $this->defaults['ld_archive_title_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'ld_archive_title_show',
        array(
            'label' => esc_html__( 'Title', 'edubin' ),
            'section' => 'ld_archive_page_section'
        )
    ) ); 
    // ld_excerpt_show
    $wp_customize->add_setting('ld_excerpt_show',
        array(
            'default'           => $this->defaults['ld_excerpt_show'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_excerpt_show',
        array(
            'label'   => esc_html__('Excerpt', 'edubin'),
            'section' => 'ld_archive_page_section',
        )
    ));
    // Media
    $wp_customize->add_setting( 'ld_archive_media_show',
        array(
            'default' => $this->defaults['ld_archive_media_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'ld_archive_media_show',
        array(
            'label' => esc_html__( 'Media', 'edubin' ),
            'section' => 'ld_archive_page_section'
        )
    ) );
    // Archive image size
    $wp_customize->add_setting( 'ld_archive_image_size',
        array(
            'default' => $this->defaults['ld_archive_image_size'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_text_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'ld_archive_image_size',
        array(
            'label' => __( 'Image Size', 'edubin' ),
            'section' => 'ld_archive_page_section',
            'input_attrs' => array(
                'placeholder' => __( 'Select image size', 'edubin' ),
                'multiselect' => false,
            ),
            'choices' => get_intermediate_image_sizes(),
        )
    ) );

    $wp_customize->add_setting( 'ld_archive_image_size',
        array(
            'default' => $this->defaults['ld_archive_image_size'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_text_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'ld_archive_image_size',
        array(
            'label' => __( 'Media Image Size', 'edubin' ),
            'section' => 'ld_archive_page_section',
            'input_attrs' => array(
                'placeholder' => __( 'Select image size', 'edubin' ),
                'multiselect' => false,
            ),
            'choices' => get_intermediate_image_sizes(),
        )
    ) );
    // Course image fix size
    $wp_customize->add_setting( 'ld_course_fix_img_height',
        array(
            'default' => $this->defaults['ld_course_fix_img_height'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_sanitize_integer'

        )
    );
    $wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'ld_course_fix_img_height',
        array(
            'label' => esc_html__( 'Custom Image Height', 'edubin' ),
            'description' => esc_html__('Keep blank for default value', 'edubin'),
            'section' => 'ld_archive_page_section', 
            'input_attrs' => array(
                'min' => 100, 
                'max' => 450, 
                'step' => 1, 
            ),
        )
    ) );

    // intor_video_imaget
    $wp_customize->add_setting('ld_intor_video_image',
        array(
            'default'           => $this->defaults['ld_intor_video_image'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_intor_video_image',
        array(
            'label'   => esc_html__('Intro Video', 'edubin'),
            'section' => 'ld_archive_page_section',
        )
    ));
    // Custom placeholder image
    $wp_customize->add_setting('ld_custom_placeholder_image', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'transport'         => 'refresh',
      'default'           => $this->defaults['ld_custom_placeholder_image'],
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ld_custom_placeholder_image', array(
      'label'       => esc_html__('Custom Placeholder Image', 'edubin'),
      'section'     => 'ld_archive_page_section',
    )));
    // Category
    $wp_customize->add_setting( 'ld_cat_show',
        array(
            'default' => $this->defaults['ld_cat_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'ld_cat_show',
        array(
            'label' => esc_html__( 'Category', 'edubin' ),
            'section' => 'ld_archive_page_section'
        )
    ) );  
// Price
$wp_customize->add_setting('ld_price_show',
    array(
        'default'           => $this->defaults['ld_price_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_price_show',
    array(
        'label'   => esc_html__('Price', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Lesson
$wp_customize->add_setting('ld_lesson_show',
    array(
        'default'           => $this->defaults['ld_lesson_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_lesson_show',
    array(
        'label'   => esc_html__('Lessons', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Lesson Text
$wp_customize->add_setting('ld_lesson_text_show',
    array(
        'default'           => $this->defaults['ld_lesson_text_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_lesson_text_show',
    array(
        'label'   => esc_html__('Lesson Text', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Topic
$wp_customize->add_setting('ld_topic_show',
    array(
        'default'           => $this->defaults['ld_topic_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_topic_show',
    array(
        'label'   => esc_html__('Topic', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Topic
$wp_customize->add_setting('ld_topic_text_show',
    array(
        'default'           => $this->defaults['ld_topic_text_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_topic_text_show',
    array(
        'label'   => esc_html__('Topic Text', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Review
$wp_customize->add_setting('ld_review_show',
    array(
        'default'           => $this->defaults['ld_review_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_review_show',
    array(
        'label'   => esc_html__('Review', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
// Review Count
$wp_customize->add_setting('ld_review_text_show',
    array(
        'default'           => $this->defaults['ld_review_text_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_review_text_show',
    array(
        'label'   => esc_html__('Review Count', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
  
// Category
$wp_customize->add_setting('ld_cat_show',
    array(
        'default'           => $this->defaults['ld_cat_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_cat_show',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
// Avatar
$wp_customize->add_setting('ld_instructor_name_on_off',
    array(
        'default'           => $this->defaults['ld_instructor_name_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_instructor_name_on_off',
    array(
        'label'   => esc_html__('Create by Avatar', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Name
$wp_customize->add_setting('ld_instructor_name_on_off',
    array(
        'default'           => $this->defaults['ld_instructor_name_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_instructor_name_on_off',
    array(
        'label'   => esc_html__('Create by Name', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Views
$wp_customize->add_setting('ld_views_show',
    array(
        'default'           => $this->defaults['ld_views_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_views_show',
    array(
        'label'   => esc_html__('Views', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// Comment
$wp_customize->add_setting('ld_comment_show',
    array(
        'default'           => $this->defaults['ld_comment_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_comment_show',
    array(
        'label'   => esc_html__('Comments', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
// progress bar
$wp_customize->add_setting('ld_progress_bar_show',
    array(
        'default'           => $this->defaults['ld_progress_bar_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_progress_bar_show',
    array(
        'label'   => esc_html__('Progress Bar', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));

// custom_closed_btn_url
$wp_customize->add_setting('custom_closed_btn_url',
    array(
        'default'           => $this->defaults['custom_closed_btn_url'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'custom_closed_btn_url',
    array(
        'label'   => esc_html__('Custom Closed Button URL', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
// See more Button
$wp_customize->add_setting('see_more_btn',
    array(
        'default'           => $this->defaults['see_more_btn'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'see_more_btn',
    array(
        'label'   => esc_html__('See More Button', 'edubin'),
        'section' => 'ld_archive_page_section',
    )
));
// Read more button text
$wp_customize->add_setting('ld_see_more_btn_text',
    array(
        'default'           => $this->defaults['ld_see_more_btn_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('ld_see_more_btn_text',
    array(
        'label'   => esc_html__('See More Button - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'ld_archive_page_section',
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
        'section' => 'ld_archive_page_section',
    )
);
// Free custom text
$wp_customize->add_setting('enrolled_custom_text',
    array(
        'default'           => $this->defaults['enrolled_custom_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('enrolled_custom_text',
    array(
        'label'   => esc_html__('Enrolled - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'ld_archive_page_section',
    )
);
// Free custom text
$wp_customize->add_setting('completed_custom_text',
    array(
        'default'           => $this->defaults['completed_custom_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('completed_custom_text',
    array(
        'label'   => esc_html__('Completed - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'ld_archive_page_section',
    )
);

// Groups Archive page
$wp_customize->add_section('ld_groups_archive_page_section',
    array(
        'title' => esc_html__('Groups Archive Page', 'edubin'),
        'panel' => 'learndash_panel',
    )
);
//ld_groups_course_per_page
$wp_customize->add_setting( 'ld_groups_course_per_page',
    array(
        'default' => $this->defaults['ld_groups_course_per_page'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'ld_groups_course_per_page',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'ld_groups_archive_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
// ld_groups_archive_page_title
$wp_customize->add_setting( 'ld_groups_archive_page_title',
    array(
        'default' => $this->defaults['ld_groups_archive_page_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'ld_groups_archive_page_title',
    array(
        'label' => esc_html__( 'Custom Page Title', 'edubin' ),
        'type' => 'text',
        'section' => 'ld_groups_archive_page_section'
    )
);

// learndash single page
$wp_customize->add_section('learndash_single_page_section',
    array(
        'title' => esc_html__('Single Page', 'edubin'),
        'panel' => 'learndash_panel',
    )
);
$wp_customize->add_setting('ld_single_page_layout',
    array(
        'default'           => $this->defaults['ld_single_page_layout'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('ld_single_page_layout',
    array(
        'label'   => esc_html__('Styles', 'edubin'),
        'section' => 'learndash_single_page_section',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('Style 01', 'edubin'),
            '2' => esc_html__('Style 02', 'edubin'),
            '3' => esc_html__('Style 03', 'edubin'),
            '4' => esc_html__('Style 04', 'edubin'),
        ),
    )
);

$wp_customize->add_setting('ld_intro_video_position',
    array(
        'default'           => $this->defaults['ld_intro_video_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('ld_intro_video_position',
    array(
        'label'   => esc_html__('Preview Media', 'edubin'),
        'section' => 'learndash_single_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'intro_video_content' => esc_html__('Content Section', 'edubin'),
            'intro_video_sidebar' => esc_html__('Sidebar Section', 'edubin'),
        ),
    )
);
// ld_single_breadcrumb
$wp_customize->add_setting('ld_single_breadcrumb',
    array(
        'default'           => $this->defaults['ld_single_breadcrumb'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_breadcrumb',
    array(
        'label'   => esc_html__('Breadcrumb', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_course_info
$wp_customize->add_setting('ld_single_course_info',
    array(
        'default'           => $this->defaults['ld_single_course_info'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_course_info',
    array(
        'label'   => esc_html__('Course Info', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_course_cat
$wp_customize->add_setting('ld_single_course_cat',
    array(
        'default'           => $this->defaults['ld_single_course_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_course_cat',
    array(
        'label'   => esc_html__('Course Category', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_social_shear
$wp_customize->add_setting('ld_single_social_shear',
    array(
        'default'           => $this->defaults['ld_single_social_shear'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_social_shear',
    array(
        'label'   => esc_html__('Social Share', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_sidebar_sticky
$wp_customize->add_setting('ld_single_sidebar_sticky',
    array(
        'default'           => $this->defaults['ld_single_sidebar_sticky'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_sidebar_sticky',
    array(
        'label'   => esc_html__('Sidebar Sticky', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_review
$wp_customize->add_setting('ld_single_review',
    array(
        'default'           => $this->defaults['ld_single_review'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_review',
    array(
        'label'   => esc_html__('Reviews', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_last_update
$wp_customize->add_setting('ld_single_last_update',
    array(
        'default'           => $this->defaults['ld_single_last_update'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_last_update',
    array(
        'label'   => esc_html__('Last Updated', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_short_text
$wp_customize->add_setting('ld_single_short_text',
    array(
        'default'           => $this->defaults['ld_single_short_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_short_text',
    array(
        'label'   => esc_html__('Short Text', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_info_heading
$wp_customize->add_setting( 'ld_single_info_heading',
    array(
        'default' => $this->defaults['ld_single_info_heading'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'ld_single_info_heading',
    array(
        'label' => esc_html__( 'Course Info', 'edubin' ),
        'type' => 'text',
        'section' => 'ld_related_page_section'
    )
);
// ld_single_created_by
$wp_customize->add_setting('ld_single_created_by',
    array(
        'default'           => $this->defaults['ld_single_created_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_created_by',
    array(
        'label'   => esc_html__('Created By', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_duration
$wp_customize->add_setting('ld_single_duration',
    array(
        'default'           => $this->defaults['ld_single_duration'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_duration',
    array(
        'label'   => esc_html__('Duration', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_lessons
$wp_customize->add_setting('ld_single_lessons',
    array(
        'default'           => $this->defaults['ld_single_lessons'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_lessons',
    array(
        'label'   => esc_html__('Lessons', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_topic
$wp_customize->add_setting('ld_single_topic',
    array(
        'default'           => $this->defaults['ld_single_topic'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_topic',
    array(
        'label'   => esc_html__('Topic', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_cat
$wp_customize->add_setting('ld_single_cat',
    array(
        'default'           => $this->defaults['ld_single_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_cat',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));
// ld_single_language
$wp_customize->add_setting('ld_single_language',
    array(
        'default'           => $this->defaults['ld_single_language'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'ld_single_language',
    array(
        'label'   => esc_html__('Language', 'edubin'),
        'section' => 'learndash_single_page_section',
    )
));

// **=== ld_related_page_section ===**
$wp_customize->add_section('ld_related_page_section',
    array(
        'title' => esc_html__('Related Courses', 'edubin'),
        'panel' => 'learndash_panel',
    )
);
//ld_related_course_position
$wp_customize->add_setting('ld_related_course_position',
    array(
        'default'           => $this->defaults['ld_related_course_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('ld_related_course_position',
    array(
        'label'   => esc_html__('Related Course Preview', 'edubin'),
        'section' => 'ld_related_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'sidebar' => esc_html__('Sidebar Area', 'edubin'),
            'content' => esc_html__('Content Area', 'edubin'),
        ),
    )
);
//ld_related_course_style
$wp_customize->add_setting('ld_related_course_style',
    array(
        'default'           => $this->defaults['ld_related_course_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'ld_related_course_style',
    array(
        'label'       => esc_html__('Related Course Style', 'edubin'),
        'section'     => 'ld_related_page_section',
        'choices'     => array(
            'round' => esc_html__('Round', 'edubin'),
            'square' => esc_html__('Square', 'edubin'),
        ),
    )
));
// ld_related_course_title
$wp_customize->add_setting( 'ld_related_course_title',
    array(
        'default' => $this->defaults['ld_related_course_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'ld_related_course_title',
    array(
        'label' => esc_html__( 'Custom Heading', 'edubin' ),
        'type' => 'text',
        'section' => 'ld_related_page_section'
    )
);
//ld_related_course_items
$wp_customize->add_setting( 'ld_related_course_items',
    array(
        'default' => $this->defaults['ld_related_course_items'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'ld_related_course_items',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'ld_related_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
//ld_related_course_by
$wp_customize->add_setting('ld_related_course_by',
    array(
        'default'           => $this->defaults['ld_related_course_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'ld_related_course_by',
    array(
        'label'       => esc_html__('Related Course By', 'edubin'),
        'section'     => 'ld_related_page_section',
        'choices'     => array(
            'category' => esc_html__('Category', 'edubin'),
            'tags' => esc_html__('Tags', 'edubin'),
        ),
    )
));
