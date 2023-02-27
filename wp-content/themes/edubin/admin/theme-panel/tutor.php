<?php
    // Archive page
    $wp_customize->add_section('tutor_archive_page_section',
        array(
            'title' => esc_html__('Course Archive', 'edubin'),
            'panel' => 'tutor_panel',
        )
    );
    // Course Style
    $wp_customize->add_setting( 'tutor_course_archive_style',
        array(
            'default' => $this->defaults['tutor_course_archive_style'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( 'tutor_course_archive_style',
        array(
            'label' => esc_html__( 'Course Style', 'edubin' ),
            'section' => 'tutor_archive_page_section',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( 'Style 01', 'edubin' ),
                '2' => esc_html__( 'Style 02', 'edubin' ),
                '3' => esc_html__( 'Style 03', 'edubin' ),
                '4' => esc_html__( 'Style 04', 'edubin' ),
                '5' => esc_html__( 'Style 05', 'edubin' ),
                '6' => esc_html__( 'Style 06', 'edubin' ),
                'plugin_default' => esc_html__( 'Plugin Default Style', 'edubin' ),
            )
        )
    ); 
    // tutor_archive_page_title
    $wp_customize->add_setting( 'tutor_archive_page_title',
        array(
            'default' => $this->defaults['tutor_archive_page_title'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'tutor_archive_page_title',
        array(
            'label' => esc_html__( 'Custom Page Title', 'edubin' ),
            'type' => 'text',
            'section' => 'tutor_archive_page_section'
        )
    );
    // Title
    $wp_customize->add_setting( 'tutor_archive_title_show',
        array(
            'default' => $this->defaults['tutor_archive_title_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_archive_title_show',
        array(
            'label' => esc_html__( 'Title', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) ); 
    // tutor_excerpt_show
    $wp_customize->add_setting('tutor_excerpt_show',
        array(
            'default'           => $this->defaults['tutor_excerpt_show'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_excerpt_show',
        array(
            'label'   => esc_html__('Excerpt', 'edubin'),
            'section' => 'tutor_archive_page_section',
        )
    ));
    // Media
    $wp_customize->add_setting( 'tutor_archive_media_show',
        array(
            'default' => $this->defaults['tutor_archive_media_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_archive_media_show',
        array(
            'label' => esc_html__( 'Media', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );

    $wp_customize->add_setting( 'tutor_archive_image_size',
        array(
            'default' => $this->defaults['tutor_archive_image_size'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_text_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'tutor_archive_image_size',
        array(
            'label' => __( 'Media Image Size', 'edubin' ),
            'section' => 'tutor_archive_page_section',
            'input_attrs' => array(
                'placeholder' => __( 'Select image size', 'edubin' ),
                'multiselect' => false,
            ),
            'choices' => get_intermediate_image_sizes(),
        )
    ) );
    // Course image fix size
    $wp_customize->add_setting( 'tutor_course_fix_img_height',
        array(
            'default' => $this->defaults['tutor_course_fix_img_height'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_sanitize_integer'

        )
    );
    $wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'tutor_course_fix_img_height',
        array(
            'label' => esc_html__( 'Custom Image Height', 'edubin' ),
            'description' => esc_html__('Keep blank for default value', 'edubin'),
            'section' => 'tutor_archive_page_section', 
            'input_attrs' => array(
                'min' => 100, 
                'max' => 450, 
                'step' => 1, 
            ),
        )
    ) );

// intor_video_imaget
$wp_customize->add_setting('tutor_intor_video_image',
    array(
        'default'           => $this->defaults['tutor_intor_video_image'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_intor_video_image',
    array(
        'label'   => esc_html__('Intro Video', 'edubin'),
        'section' => 'tutor_archive_page_section',
    )
));
// Custom placeholder image
$wp_customize->add_setting('tutor_custom_placeholder_image', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['tutor_custom_placeholder_image'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tutor_custom_placeholder_image', array(
  'label'       => esc_html__('Custom Placeholder Image', 'edubin'),
  'section'     => 'tutor_archive_page_section',
)));
    // Category
    $wp_customize->add_setting( 'tutor_cat_show',
        array(
            'default' => $this->defaults['tutor_cat_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_cat_show',
        array(
            'label' => esc_html__( 'Category', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
   // tutor_enroll_show
    $wp_customize->add_setting( 'tutor_enroll_show',
        array(
            'default' => $this->defaults['tutor_enroll_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_enroll_show',
        array(
            'label' => esc_html__( 'Enrolled Students', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  

   // tutor_lesson_show
    $wp_customize->add_setting( 'tutor_lesson_show',
        array(
            'default' => $this->defaults['tutor_lesson_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_lesson_show',
        array(
            'label' => esc_html__( 'Lesson', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
    // tutor_lesson_text
    $wp_customize->add_setting( 'tutor_lesson_text',
        array(
            'default' => $this->defaults['tutor_lesson_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'tutor_lesson_text',
        array(
            'label' => esc_html__( 'Lesson - Custom Text', 'edubin' ),
            'type' => 'text',
            'section' => 'tutor_course_filter_section'
        )
    );
    // tutor_lessons_text
    $wp_customize->add_setting( 'tutor_lessons_text',
        array(
            'default' => $this->defaults['tutor_lessons_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'tutor_lessons_text',
        array(
            'label' => esc_html__( 'Lessons - Custom Text', 'edubin' ),
            'type' => 'text',
            'section' => 'tutor_course_filter_section'
        )
    );
    // tutor_duration_show
    $wp_customize->add_setting( 'tutor_duration_show',
        array(
            'default' => $this->defaults['tutor_duration_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_duration_show',
        array(
            'label' => esc_html__( 'Duration', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
    // tutor_quiz_show
    $wp_customize->add_setting( 'tutor_quiz_show',
        array(
            'default' => $this->defaults['tutor_quiz_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_quiz_show',
        array(
            'label' => esc_html__( 'Quiz', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  

    // tutor_show_btn
    // $wp_customize->add_setting( 'tutor_show_btn',
    //     array(
    //         'default' => $this->defaults['tutor_show_btn'],
    //         'transport' => 'refresh',
    //         'sanitize_callback' => 'edubin_switch_sanitization'
    //     )
    // );
    // $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_show_btn',
    //     array(
    //         'label' => esc_html__( 'Price/Dynamic Button', 'edubin' ),
    //         'section' => 'tutor_archive_page_section'
    //     )
    // ) ); 
    // Price
    $wp_customize->add_setting( 'tutor_price_show',
        array(
            'default' => $this->defaults['tutor_price_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_price_show',
        array(
            'label' => esc_html__( 'Price', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
    // Instructor image
    $wp_customize->add_setting( 'tutor_instructor_img_on_off',
        array(
            'default' => $this->defaults['tutor_instructor_img_on_off'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_instructor_img_on_off',
        array(
            'label' => esc_html__( 'Instructor Avatar', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );    
    // Instructor name
    $wp_customize->add_setting( 'tutor_instructor_name_on_off',
        array(
            'default' => $this->defaults['tutor_instructor_name_on_off'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_instructor_name_on_off',
        array(
            'label' => esc_html__( 'Instructor Name', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );
 // tutor_review_show
    $wp_customize->add_setting( 'tutor_review_show',
        array(
            'default' => $this->defaults['tutor_review_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_review_show',
        array(
            'label' => esc_html__( 'Review', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  

 // tutor_show_review_text
    $wp_customize->add_setting( 'tutor_show_review_text',
        array(
            'default' => $this->defaults['tutor_show_review_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_show_review_text',
        array(
            'label' => esc_html__( 'Review Count', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  

    // tutor_level_show
    $wp_customize->add_setting( 'tutor_level_show',
        array(
            'default' => $this->defaults['tutor_level_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_level_show',
        array(
            'label' => esc_html__( 'Level', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
    // tutor_wishlist_show
    $wp_customize->add_setting( 'tutor_wishlist_show',
        array(
            'default' => $this->defaults['tutor_wishlist_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_wishlist_show',
        array(
            'label' => esc_html__( 'Wishlist', 'edubin' ),
            'section' => 'tutor_archive_page_section'
        )
    ) );  
    // tutor_permalink_type
    $wp_customize->add_setting( 'tutor_permalink_type',
        array(
            'default' => $this->defaults['tutor_permalink_type'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( 'tutor_permalink_type',
        array(
            'label' => esc_html__( 'Permalink Type', 'edubin' ),
            'section' => 'tutor_archive_page_section',
            'type' => 'select',
            'choices' => array(
                'tutor_archive_price' => esc_html__( 'Price', 'edubin' ),
                'tutor_archive_permalink' => esc_html__( 'See More', 'edubin' ),
                'tutor_archive_dynamic_url' => esc_html__( 'Tutor Dynamic URL', 'edubin' ),
            )
        )
    );
    // tutor_see_more_text
    $wp_customize->add_setting( 'tutor_see_more_text',
        array(
            'default' => $this->defaults['tutor_see_more_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'tutor_see_more_text',
        array(
            'label' => esc_html__( 'See More - Custom Text', 'edubin' ),
            'type' => 'text',
            'section' => 'tutor_archive_page_section'
        )
    );
// Top filter bar
$wp_customize->add_setting('tutor_hide_archive_text',
    array(
        'default'           => $this->defaults['tutor_hide_archive_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_hide_archive_text',
    array(
        'label'   => esc_html__('Hide Archive: Text', 'edubin'),
        'section' => 'tutor_archive_page_section',
    )
));
// Pagination
$wp_customize->add_setting('tutor_archive_pagi_aligment',
    array(
        'default'           => $this->defaults['tutor_archive_pagi_aligment'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'tutor_archive_pagi_aligment',
    array(
        'label'       => esc_html__('Pagination Aliment', 'edubin'),
        'section'     => 'tutor_archive_page_section',
        'choices'     => array(
            'flex-start'  => esc_html__('Left', 'edubin'),
            'center' => esc_html__('Center', 'edubin'),
            'flex-end' => esc_html__('Right', 'edubin'),
        ),
    )
));
// ========= Start filter settings =======
$wp_customize->add_section('tutor_course_filter_section',
    array(
        'title' => esc_html__('Course Filter', 'edubin'),
        'panel' => 'tutor_panel',
    )
);
// Filter course per page
$wp_customize->add_setting( 'tutor_course_filter_per_page',
    array(
        'default' => $this->defaults['tutor_course_filter_per_page'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'tutor_course_filter_per_page',
    array(
        'label' => esc_html__( 'Course Filter Per Page', 'edubin' ),
        'section' => 'tutor_course_filter_section', 
        'priority'       => 6,
        'input_attrs' => array(
            'min' => 3, 
            'max' => 21, 
            'step' => 1, 
        ),
    )
) );
// Filter course column
$wp_customize->add_setting( 'tutor_course_filter_column',
    array(
        'default' => $this->defaults['tutor_course_filter_column'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'tutor_course_filter_column',
    array(
        'label' => esc_html__( 'Course Filter Column', 'edubin' ),
        'section' => 'tutor_course_filter_section', 
        'input_attrs' => array(
            'min' => 2, 
            'max' => 4, 
            'step' => 1, 
        ),
    )
) );
// Course search
$wp_customize->add_setting('filter_course_search_show',
    array(
        'default'           => $this->defaults['filter_course_search_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'filter_course_search_show',
    array(
        'label'   => esc_html__('Course Search', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));

// Results show
$wp_customize->add_setting('tutor_filter_results_show',
    array(
        'default'           => $this->defaults['tutor_filter_results_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_results_show',
    array(
        'label'   => esc_html__('Filter Results', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));

// Select show
$wp_customize->add_setting('tutor_filter_select_show',
    array(
        'default'           => $this->defaults['tutor_filter_select_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_select_show',
    array(
        'label'   => esc_html__('Filter Select', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));

// Top filter bar
$wp_customize->add_setting('tutor_sidebar_filter_show',
    array(
        'default'           => $this->defaults['tutor_sidebar_filter_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_sidebar_filter_show',
    array(
        'label'   => esc_html__('Sidebar Filter', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Sidebar positon
$wp_customize->add_setting( 'tutor_filter_sidebar_position',
    array(
        'default' => $this->defaults['tutor_filter_sidebar_position'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization'
    )
);
$wp_customize->add_control( 'tutor_filter_sidebar_position',
    array(
        'label' => esc_html__( 'Sidebar Position', 'edubin' ),
        'section' => 'tutor_course_filter_section',
        'type' => 'select',
        'choices' => array(
            'left' => esc_html__( 'Left', 'edubin' ),
            'right' => esc_html__( 'Right', 'edubin' ),
        )
    )
);
// Course category count
$wp_customize->add_setting('tutor_course_cat_count',
    array(
        'default'           => $this->defaults['tutor_course_cat_count'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_course_cat_count',
    array(
        'label'   => esc_html__('Courses Count', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Price
$wp_customize->add_setting('tutor_filter_price_show',
    array(
        'default'           => $this->defaults['tutor_filter_price_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_price_show',
    array(
        'label'   => esc_html__('Price', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Price text 
$wp_customize->add_setting( 'tutor_filter_custom_price_text',
    array(
        'default' => $this->defaults['tutor_filter_custom_price_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'tutor_filter_custom_price_text',
    array(
        'label' => esc_html__( 'Price - Custom Text', 'edubin' ),
        'type' => 'text',
        'section' => 'tutor_course_filter_section'
    )
);
// Level
$wp_customize->add_setting('tutor_filter_level_show',
    array(
        'default'           => $this->defaults['tutor_filter_level_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_level_show',
    array(
        'label'   => esc_html__('Level', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Level 
$wp_customize->add_setting( 'tutor_filter_custom_level_text',
    array(
        'default' => $this->defaults['tutor_filter_custom_level_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'tutor_filter_custom_level_text',
    array(
        'label' => esc_html__( 'Level - Custom Text', 'edubin' ),
        'type' => 'text',
        'section' => 'tutor_course_filter_section'
    )
);

// Category
$wp_customize->add_setting('tutor_filter_category_show',
    array(
        'default'           => $this->defaults['tutor_filter_category_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_category_show',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Category title
$wp_customize->add_setting( 'tutor_filter_custom_cat_text',
    array(
        'default' => $this->defaults['tutor_filter_custom_cat_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);
$wp_customize->add_control( 'tutor_filter_custom_cat_text',
    array(
        'label' => esc_html__( 'Category - Custom Text', 'edubin' ),
        'type' => 'text',
        'section' => 'tutor_course_filter_section'
    )
);
// Topic
$wp_customize->add_setting('tutor_filter_topic_show',
    array(
        'default'           => $this->defaults['tutor_filter_topic_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_filter_topic_show',
    array(
        'label'   => esc_html__('Topic', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));
// Topic title
$wp_customize->add_setting( 'tutor_filter_custom_topic_text',
    array(
        'default' => $this->defaults['tutor_filter_custom_topic_text'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);
$wp_customize->add_control( 'tutor_filter_custom_topic_text',
    array(
        'label' => esc_html__( 'Topic - Custom Text', 'edubin' ),
        'type' => 'text',
        'section' => 'tutor_course_filter_section'
    )
);

// Pagination
$wp_customize->add_setting('tutor_course_pagination',
    array(
        'default'           => $this->defaults['tutor_course_pagination'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_course_pagination',
    array(
        'label'   => esc_html__('Pagination', 'edubin'),
        'section' => 'tutor_course_filter_section',
    )
));

// ========= End filter settings =======

// Tutor single page
$wp_customize->add_section('tutor_single_page_section',
    array(
        'title' => esc_html__('Single Page', 'edubin'),
        'panel' => 'tutor_panel',
    )
);
    // Course Style
    $wp_customize->add_setting( 'tutor_single_page_layout',
        array(
            'default' => $this->defaults['tutor_single_page_layout'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( 'tutor_single_page_layout',
        array(
            'label' => esc_html__( 'Styles', 'edubin' ),
            'section' => 'tutor_single_page_section',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( 'Style 01', 'edubin' ),
                '2' => esc_html__( 'Style 02', 'edubin' ),
                '3' => esc_html__( 'Style 03', 'edubin' ),
                '4' => esc_html__( 'Style 04', 'edubin' ),
            )
        )
    );
    // tutor_single_sidebar_sticky
    $wp_customize->add_setting( 'tutor_single_sidebar_sticky',
        array(
            'default' => $this->defaults['tutor_single_sidebar_sticky'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'tutor_single_sidebar_sticky',
        array(
            'label' => esc_html__( 'Sidebar Sticky', 'edubin' ),
            'section' => 'tutor_single_page_section'
        )
    ) );
    // tutor_single_header_meta
    $wp_customize->add_setting('tutor_single_header_meta',
        array(
            'default'           => $this->defaults['tutor_single_header_meta'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_single_header_meta',
        array(
            'label'   => esc_html__('Header Meta', 'edubin'),
            'section' => 'tutor_single_page_section',
        )
    ));
    // tutor_single_breadcrumb
    $wp_customize->add_setting('tutor_single_breadcrumb',
        array(
            'default'           => $this->defaults['tutor_single_breadcrumb'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_single_breadcrumb',
        array(
            'label'   => esc_html__('Breadcrumb', 'edubin'),
            'section' => 'tutor_single_page_section',
        )
    ));
    // tutor_single_social_shear
    $wp_customize->add_setting('tutor_single_social_shear',
        array(
            'default'           => $this->defaults['tutor_single_social_shear'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_single_social_shear',
        array(
            'label'   => esc_html__('Social Share', 'edubin'),
            'section' => 'tutor_single_page_section',
        )
    ));
    // tutor_single_course_cat
    $wp_customize->add_setting('tutor_single_course_cat',
        array(
            'default'           => $this->defaults['tutor_single_course_cat'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_single_course_cat',
        array(
            'label'   => esc_html__('Course Category', 'edubin'),
            'section' => 'tutor_single_page_section',
        )
    ));

// tutor_single_excerpt
$wp_customize->add_setting('tutor_single_excerpt',
    array(
        'default'           => $this->defaults['tutor_single_excerpt'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_single_excerpt',
    array(
        'label'   => esc_html__('Excerpt', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));
// tutor_last_update_single
$wp_customize->add_setting('tutor_last_update_single',
    array(
        'default'           => $this->defaults['tutor_last_update_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_last_update_single',
    array(
        'label'   => esc_html__('Last Update', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));
// tutor_review_single
$wp_customize->add_setting('tutor_review_single',
    array(
        'default'           => $this->defaults['tutor_review_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_review_single',
    array(
        'label'   => esc_html__('Review', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));

// tutor_instructor_single
$wp_customize->add_setting('tutor_instructor_single',
    array(
        'default'           => $this->defaults['tutor_instructor_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_instructor_single',
    array(
        'label'   => esc_html__('Instructor', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));
// tutor_lesson_single
$wp_customize->add_setting('tutor_lesson_single',
    array(
        'default'           => $this->defaults['tutor_lesson_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_lesson_single',
    array(
        'label'   => esc_html__('Lesson', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));
// tutor_enrolled_single
$wp_customize->add_setting('tutor_enrolled_single',
    array(
        'default'           => $this->defaults['tutor_enrolled_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_enrolled_single',
    array(
        'label'   => esc_html__('Enrolled', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));
// tutor_duration_single
$wp_customize->add_setting('tutor_duration_single',
    array(
        'default'           => $this->defaults['tutor_duration_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_duration_single',
    array(
        'label'   => esc_html__('Duration', 'edubin'),
        'section' => 'tutor_single_page_section',
    )
));

// **=== tutor_related_page_section ===**
$wp_customize->add_section('tutor_related_page_section',
    array(
        'title' => esc_html__('Related Courses', 'edubin'),
        'panel' => 'tutor_panel',
    )
);
//tutor_related_course_position
$wp_customize->add_setting('tutor_related_course_position',
    array(
        'default'           => $this->defaults['tutor_related_course_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('tutor_related_course_position',
    array(
        'label'   => esc_html__('Related Course Preview', 'edubin'),
        'section' => 'tutor_related_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'sidebar' => esc_html__('Sidebar Area', 'edubin'),
            'content' => esc_html__('Content Area', 'edubin'),
        ),
    )
);
//tutor_related_course_style
$wp_customize->add_setting('tutor_related_course_style',
    array(
        'default'           => $this->defaults['tutor_related_course_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'tutor_related_course_style',
    array(
        'label'       => esc_html__('Related Course Style', 'edubin'),
        'section'     => 'tutor_related_page_section',
        'choices'     => array(
            'round' => esc_html__('Round', 'edubin'),
            'square' => esc_html__('Square', 'edubin'),
        ),
    )
));
// tutor_related_course_title
$wp_customize->add_setting( 'tutor_related_course_title',
    array(
        'default' => $this->defaults['tutor_related_course_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'tutor_related_course_title',
    array(
        'label' => esc_html__( 'Custom Heading', 'edubin' ),
        'type' => 'text',
        'section' => 'tutor_related_page_section'
    )
);
//tutor_related_course_items
$wp_customize->add_setting( 'tutor_related_course_items',
    array(
        'default' => $this->defaults['tutor_related_course_items'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'tutor_related_course_items',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'tutor_related_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
//tutor_related_course_by
$wp_customize->add_setting('tutor_related_course_by',
    array(
        'default'           => $this->defaults['tutor_related_course_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'tutor_related_course_by',
    array(
        'label'       => esc_html__('Related Course By', 'edubin'),
        'section'     => 'tutor_related_page_section',
        'choices'     => array(
            'category' => esc_html__('Category', 'edubin'),
            'tags' => esc_html__('Tags', 'edubin'),
        ),
    )
));

// ======== Tutor login page ==========
$wp_customize->add_section('tutor_login_page_section',
    array(
        'title' => esc_html__('Login Page', 'edubin'),
        'panel' => 'tutor_panel',
    )
);
// Header page title align
$wp_customize->add_setting('tutor_login_form_widget_align',
    array(
        'default'           => $this->defaults['tutor_login_form_widget_align'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_text_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'tutor_login_form_widget_align',
    array(
        'label'    => __('Widget Align'),
        'section'  => 'tutor_login_page_section',
        'choices'  => array(
            'left'   => __('Left'),
            'center' => __('Center'),
            'right'  => __('Right'),
        ),
    )
));

      // tutor other settings start
   $wp_customize->add_section( 'tutor_course_others_section',
        array(
            'title' => esc_html__( 'Utilities', 'edubin' ),
            'panel' => 'tutor_panel'
        )
    );
// Use Tutor LMS settings color
$wp_customize->add_setting('tutor_settings_color',
    array(
        'default'           => $this->defaults['tutor_settings_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_settings_color',
    array(
        'label'   => esc_html__('Use Tutor Settings Color', 'edubin'),
        'section' => 'tutor_course_others_section',
    )
));

// tutor_hide_profile_page_header
$wp_customize->add_setting('tutor_hide_profile_page_header',
    array(
        'default'           => $this->defaults['tutor_hide_profile_page_header'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'tutor_hide_profile_page_header',
    array(
        'label'   => esc_html__('Hide Profile Page Header', 'edubin'),
        'section' => 'tutor_course_others_section',
    )
));

