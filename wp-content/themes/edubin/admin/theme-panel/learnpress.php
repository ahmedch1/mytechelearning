<?php
// Archive page
$wp_customize->add_section('lp_archive_page_section',
    array(
        'title' => esc_html__('Archive Page', 'edubin'),
        'panel' => 'learnpress_panel',
    )
);

// Style
$wp_customize->add_setting('lp_course_archive_style',
    array(
        'default'           => $this->defaults['lp_course_archive_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_course_archive_style',
    array(
        'label'   => esc_html__('Course Style', 'edubin'),
        'section' => 'lp_archive_page_section',
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

// Column
$wp_customize->add_setting('lp_course_archive_clm',
    array(
        'default'           => $this->defaults['lp_course_archive_clm'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_course_archive_clm',
    array(
        'label'   => esc_html__('Courses Column', 'edubin'),
        'section' => 'lp_archive_page_section',
        'type'    => 'select',
        'choices' => array(
            '6' => esc_html__('Column 2', 'edubin'),
            '4' => esc_html__('Column 3', 'edubin'),
            '3' => esc_html__('Column 4', 'edubin'),
        ),
    )
);
// lp_archive_page_title
$wp_customize->add_setting( 'lp_archive_page_title',
    array(
        'default' => $this->defaults['lp_archive_page_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'lp_archive_page_title',
    array(
        'label' => esc_html__( 'Custom Page Title', 'edubin' ),
        'type' => 'text',
        'section' => 'lp_archive_page_section'
    )
);
// LP top bar
$wp_customize->add_setting('lp_header_top',
    array(
        'default'           => $this->defaults['lp_header_top'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_header_top',
    array(
        'label'   => esc_html__('Top Bar', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Title
    $wp_customize->add_setting( 'lp_archive_title_show',
        array(
            'default' => $this->defaults['lp_archive_title_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_archive_title_show',
        array(
            'label' => esc_html__( 'Title', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) ); 
    // lp_excerpt_show
    $wp_customize->add_setting('lp_excerpt_show',
        array(
            'default'           => $this->defaults['lp_excerpt_show'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_excerpt_show',
        array(
            'label'   => esc_html__('Excerpt', 'edubin'),
            'section' => 'lp_archive_page_section',
        )
    ));
    // Media
    $wp_customize->add_setting( 'lp_archive_media_show',
        array(
            'default' => $this->defaults['lp_archive_media_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_archive_media_show',
        array(
            'label' => esc_html__( 'Media', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );
    // Archive image size
    $wp_customize->add_setting( 'lp_archive_image_size',
        array(
            'default' => $this->defaults['lp_archive_image_size'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_text_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'lp_archive_image_size',
        array(
            'label' => __( 'Image Size', 'edubin' ),
            'section' => 'lp_archive_page_section',
            'input_attrs' => array(
                'placeholder' => __( 'Select image size', 'edubin' ),
                'multiselect' => false,
            ),
            'choices' => get_intermediate_image_sizes(),
        )
    ) );

    $wp_customize->add_setting( 'lp_archive_image_size',
        array(
            'default' => $this->defaults['lp_archive_image_size'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_text_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Dropdown_Select2_Custom_Control( $wp_customize, 'lp_archive_image_size',
        array(
            'label' => __( 'Media Image Size', 'edubin' ),
            'section' => 'lp_archive_page_section',
            'input_attrs' => array(
                'placeholder' => __( 'Select image size', 'edubin' ),
                'multiselect' => false,
            ),
            'choices' => get_intermediate_image_sizes(),
        )
    ) );
    // Course image fix size
    $wp_customize->add_setting( 'lp_course_fix_img_height',
        array(
            'default' => $this->defaults['lp_course_fix_img_height'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_sanitize_integer'

        )
    );
    $wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'lp_course_fix_img_height',
        array(
            'label' => esc_html__( 'Custom Image Height', 'edubin' ),
            'description' => esc_html__('Keep blank for default value', 'edubin'),
            'section' => 'lp_archive_page_section', 
            'input_attrs' => array(
                'min' => 100, 
                'max' => 450, 
                'step' => 1, 
            ),
        )
    ) );

// intor_video_imaget
$wp_customize->add_setting('lp_intor_video_image',
    array(
        'default'           => $this->defaults['lp_intor_video_image'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_intor_video_image',
    array(
        'label'   => esc_html__('Intro Video', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Custom placeholder image
$wp_customize->add_setting('lp_custom_placeholder_image', array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
  'transport'         => 'refresh',
  'default'           => $this->defaults['lp_custom_placeholder_image'],
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'lp_custom_placeholder_image', array(
  'label'       => esc_html__('Custom Placeholder Image', 'edubin'),
  'section'     => 'lp_archive_page_section',
)));


    // lp_level_show
    $wp_customize->add_setting( 'lp_level_show',
        array(
            'default' => $this->defaults['lp_level_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_level_show',
        array(
            'label' => esc_html__( 'Level', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );  
    // lp_wishlist_show
    $wp_customize->add_setting( 'lp_wishlist_show',
        array(
            'default' => $this->defaults['lp_wishlist_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_wishlist_show',
        array(
            'label' => esc_html__( 'Wishlist', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );  

    // Category
    $wp_customize->add_setting( 'lp_cat_show',
        array(
            'default' => $this->defaults['lp_cat_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_cat_show',
        array(
            'label' => esc_html__( 'Category', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );  
   // lp_enroll_show
    $wp_customize->add_setting( 'lp_enroll_show',
        array(
            'default' => $this->defaults['lp_enroll_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_enroll_show',
        array(
            'label' => esc_html__( 'Enrolled Students', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );  

    // lp_duration_show
    // $wp_customize->add_setting( 'lp_duration_show',
    //     array(
    //         'default' => $this->defaults['lp_duration_show'],
    //         'transport' => 'refresh',
    //         'sanitize_callback' => 'edubin_switch_sanitization'
    //     )
    // );
    // $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_duration_show',
    //     array(
    //         'label' => esc_html__( 'Duration', 'edubin' ),
    //         'section' => 'lp_archive_page_section'
    //     )
    // ) );  
    // Price
    // $wp_customize->add_setting( 'lp_price_show',
    //     array(
    //         'default' => $this->defaults['lp_price_show'],
    //         'transport' => 'refresh',
    //         'sanitize_callback' => 'edubin_switch_sanitization'
    //     )
    // );
    // $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_price_show',
    //     array(
    //         'label' => esc_html__( 'Price', 'edubin' ),
    //         'section' => 'lp_archive_page_section'
    //     )
    // ) );  
    // Instructor image
    $wp_customize->add_setting( 'lp_instructor_img_on_off',
        array(
            'default' => $this->defaults['lp_instructor_img_on_off'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_instructor_img_on_off',
        array(
            'label' => esc_html__( 'Instructor Avatar', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );    
    // Instructor name
    $wp_customize->add_setting( 'lp_instructor_name_on_off',
        array(
            'default' => $this->defaults['lp_instructor_name_on_off'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_instructor_name_on_off',
        array(
            'label' => esc_html__( 'Instructor Name', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );

// Title height
$wp_customize->add_setting('lp_course_title_height',
    array(
        'default'           => $this->defaults['lp_course_title_height'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_title_height',
    array(
        'label'   => esc_html__('Title Fixed Height', 'edubin'),
        'section' => 'sensei_archive_page_section',
    )
));
// Price
$wp_customize->add_setting('lp_price_show',
    array(
        'default'           => $this->defaults['lp_price_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_price_show',
    array(
        'label'   => esc_html__('Price', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Full Price
// $wp_customize->add_setting('lp_full_price_show',
//     array(
//         'default'           => $this->defaults['lp_full_price_show'],
//         'transport'         => 'refresh',
//         'sanitize_callback' => 'edubin_switch_sanitization',
//     )
// );
// $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_full_price_show',
//     array(
//         'label'   => esc_html__('Show Price .00', 'edubin'),
//         'section' => 'lp_archive_page_section',
//     )
// ));
// Review
$wp_customize->add_setting('lp_review_show',
    array(
        'default'           => $this->defaults['lp_review_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_review_show',
    array(
        'label'   => esc_html__('Review', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Review Text
$wp_customize->add_setting('lp_review_text_show',
    array(
        'default'           => $this->defaults['lp_review_text_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_review_text_show',
    array(
        'label'   => esc_html__('Review Text', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Instructor image
$wp_customize->add_setting('lp_instructor_img_on_off',
    array(
        'default'           => $this->defaults['lp_instructor_img_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_instructor_img_on_off',
    array(
        'label'   => esc_html__('Instructor Image', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Instructor name
$wp_customize->add_setting('lp_instructor_name_on_off',
    array(
        'default'           => $this->defaults['lp_instructor_name_on_off'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_instructor_name_on_off',
    array(
        'label'   => esc_html__('Instructor Name', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Enroll
// $wp_customize->add_setting('lp_enroll_on_off',
//     array(
//         'default'           => $this->defaults['lp_enroll_on_off'],
//         'transport'         => 'refresh',
//         'sanitize_callback' => 'edubin_switch_sanitization',
//     )
// );
// $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_enroll_on_off',
//     array(
//         'label'   => esc_html__('Enroll', 'edubin'),
//         'section' => 'lp_archive_page_section',
//     )
// ));

// Comment
// $wp_customize->add_setting('lp_comment_show',
//     array(
//         'default'           => $this->defaults['lp_comment_show'],
//         'transport'         => 'refresh',
//         'sanitize_callback' => 'edubin_switch_sanitization',
//     )
// );
// $wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_comment_show',
//     array(
//         'label'   => esc_html__('Comments', 'edubin'),
//         'section' => 'lp_archive_page_section',
//     )
// ));

// Lesson
$wp_customize->add_setting('lp_lesson_show',
    array(
        'default'           => $this->defaults['lp_lesson_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_lesson_show',
    array(
        'label'   => esc_html__('Lesson', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Quiz
$wp_customize->add_setting('lp_quiz_show',
    array(
        'default'           => $this->defaults['lp_quiz_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_quiz_show',
    array(
        'label'   => esc_html__('Quiz', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Categories
$wp_customize->add_setting('lp_cat_show',
    array(
        'default'           => $this->defaults['lp_cat_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_cat_show',
    array(
        'label'   => esc_html__('Categories', 'edubin'),
        'section' => 'lp_archive_page_section',
    )
));
// Logo size
$wp_customize->add_setting('lp_archive_image_height',
    array(
        'default'           => $this->defaults['lp_archive_image_height'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer',

    )
);
$wp_customize->add_control(new Edubin_Slider_Custom_Control($wp_customize, 'lp_archive_image_height',
    array(
        'label'       => esc_html__('Image Height', 'edubin'),
        'section'     => 'lp_archive_page_section',
        'input_attrs' => array(
            'min'  => 100,
            'max'  => 300,
            'step' => 1,
        ),
    )
));


// ====== Star LearnPress single page settings =======
$wp_customize->add_section('learnpress_single_page_section',
    array(
        'title' => esc_html__('Single Page', 'edubin'),
        'panel' => 'learnpress_panel',
    )
);
$wp_customize->add_setting('lp_single_page_layout',
    array(
        'default'           => $this->defaults['lp_single_page_layout'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_single_page_layout',
    array(
        'label'   => esc_html__('Styles', 'edubin'),
        'section' => 'learnpress_single_page_section',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('Style 01', 'edubin'),
            '2' => esc_html__('Style 02', 'edubin'),
            '3' => esc_html__('Style 03', 'edubin'),
            '4' => esc_html__('Style 04', 'edubin'),
        ),
    )
);

$wp_customize->add_setting('lp_intro_video_position',
    array(
        'default'           => $this->defaults['lp_intro_video_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_intro_video_position',
    array(
        'label'   => esc_html__('Preview Media', 'edubin'),
        'section' => 'learnpress_single_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'intro_video_content' => esc_html__('Content Section', 'edubin'),
            'intro_video_sidebar' => esc_html__('Sidebar Section', 'edubin'),
        ),
    )
);
// lp_single_header_meta
$wp_customize->add_setting('lp_single_header_meta',
    array(
        'default'           => $this->defaults['lp_single_header_meta'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_header_meta',
    array(
        'label'   => esc_html__('Header Meta', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_breadcrumb
$wp_customize->add_setting('lp_single_breadcrumb',
    array(
        'default'           => $this->defaults['lp_single_breadcrumb'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_breadcrumb',
    array(
        'label'   => esc_html__('Breadcrumb', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_sidebar_sticky
$wp_customize->add_setting('lp_single_sidebar_sticky',
    array(
        'default'           => $this->defaults['lp_single_sidebar_sticky'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_sidebar_sticky',
    array(
        'label'   => esc_html__('Sidebar Sticky', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_course_cat
$wp_customize->add_setting('lp_single_course_cat',
    array(
        'default'           => $this->defaults['lp_single_course_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_course_cat',
    array(
        'label'   => esc_html__('Course Category', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_social_shear
$wp_customize->add_setting('lp_single_social_shear',
    array(
        'default'           => $this->defaults['lp_single_social_shear'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_social_shear',
    array(
        'label'   => esc_html__('Social  Shear', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_course_graduation
$wp_customize->add_setting('lp_single_course_graduation',
    array(
        'default'           => $this->defaults['lp_single_course_graduation'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_course_graduation',
    array(
        'label'   => esc_html__('Course Graduation', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_course_time
$wp_customize->add_setting('lp_single_course_time',
    array(
        'default'           => $this->defaults['lp_single_course_time'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_course_time',
    array(
        'label'   => esc_html__('Course Time', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_progress
$wp_customize->add_setting('lp_single_progress',
    array(
        'default'           => $this->defaults['lp_single_progress'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_progress',
    array(
        'label'   => esc_html__('Progress', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));

// lp_single_course_info
$wp_customize->add_setting('lp_single_course_info',
    array(
        'default'           => $this->defaults['lp_single_course_info'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_course_info',
    array(
        'label'   => esc_html__('Course Info', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));

// Instructor
$wp_customize->add_setting('lp_instructor_single',
    array(
        'default'           => $this->defaults['lp_instructor_single'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_instructor_single',
    array(
        'label'   => esc_html__('Instructor', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));

// Category
$wp_customize->add_setting('lp_single_cat',
    array(
        'default'           => $this->defaults['lp_single_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_cat',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// Review
$wp_customize->add_setting('lp_single_review',
    array(
        'default'           => $this->defaults['lp_single_review'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);

$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_review',
    array(
        'label'   => esc_html__('Review', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));

// lp_single_last_update
$wp_customize->add_setting('lp_single_last_update',
    array(
        'default'           => $this->defaults['lp_single_last_update'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_last_update',
    array(
        'label'   => esc_html__('Last Updated', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_excerpt
$wp_customize->add_setting('lp_single_excerpt',
    array(
        'default'           => $this->defaults['lp_single_excerpt'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_excerpt',
    array(
        'label'   => esc_html__('Excerpt', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// lp_single_enroll_btn
$wp_customize->add_setting('lp_single_enroll_btn',
    array(
        'default'           => $this->defaults['lp_single_enroll_btn'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_single_enroll_btn',
    array(
        'label'   => esc_html__('Enroll Button', 'edubin'),
        'section' => 'learnpress_single_page_section',
    )
));
// Custom price text
$wp_customize->add_setting('lp_course_price_text',
    array(
        'default'           => $this->defaults['lp_course_price_text'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_price_text',
    array(
        'label'   => esc_html__('Price - Custom Text', 'edubin'),
        'type'    => 'text',
        'section' => 'learnpress_single_page_section',
    )
);
// Custom buy now btn
$wp_customize->add_setting('lp_course_buy_now_btn',
    array(
        'default'           => $this->defaults['lp_course_buy_now_btn'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_buy_now_btn',
    array(
        'label'   => esc_html__('Buy Now - Custom Button Text', 'edubin'),
        'type'    => 'text',
        'section' => 'learnpress_single_page_section',
    )
);
// custom enroll btb
$wp_customize->add_setting('lp_course_enroll_btn',
    array(
        'default'           => $this->defaults['lp_course_enroll_btn'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_enroll_btn',
    array(
        'label'   => esc_html__('Enroll - Custom Button Text', 'edubin'),
        'type'    => 'text',
        'section' => 'learnpress_single_page_section',
    )
);

// =========== ***  Learnpress Course information ============ ****

$wp_customize->add_section('course_features_section',
    array(
        'title' => esc_html__('Course Features', 'edubin'),
        'panel' => 'learnpress_panel',
    )
);
// lp_single_info_heading
$wp_customize->add_setting('lp_single_info_heading',
    array(
        'default'           => $this->defaults['lp_single_info_heading'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_single_info_heading',
    array(
        'label'   => esc_html__('Custom Course Features Title', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Learnpress custom meta position
$wp_customize->add_setting('lp_custom_features_position',
    array(
        'default'           => $this->defaults['lp_custom_features_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_custom_features_position',
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
// Course enroll
$wp_customize->add_setting('lp_course_feature_enroll_show',
    array(
        'default'           => $this->defaults['lp_course_feature_enroll_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_enroll_show',
    array(
        'label'   => esc_html__('Enrolled', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_enroll',
    array(
        'default'           => $this->defaults['lp_course_feature_enroll'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_enroll',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course duration
$wp_customize->add_setting('lp_course_feature_duration_show',
    array(
        'default'           => $this->defaults['lp_course_feature_duration_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_duration_show',
    array(
        'label'   => esc_html__('Duration', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_duration',
    array(
        'default'           => $this->defaults['lp_course_feature_duration'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_duration',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course Lessons
$wp_customize->add_setting('lp_course_feature_lessons_show',
    array(
        'default'           => $this->defaults['lp_course_feature_lessons_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_lessons_show',
    array(
        'label'   => esc_html__('Lessons', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_lessons',
    array(
        'default'           => $this->defaults['lp_course_feature_lessons'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

   // lp_lesson_show
    $wp_customize->add_setting( 'lp_lesson_show',
        array(
            'default' => $this->defaults['lp_lesson_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'lp_lesson_show',
        array(
            'label' => esc_html__( 'Lesson', 'edubin' ),
            'section' => 'lp_archive_page_section'
        )
    ) );  
    // lp_lesson_text
    $wp_customize->add_setting( 'lp_lesson_text',
        array(
            'default' => $this->defaults['lp_lesson_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'lp_lesson_text',
        array(
            'label' => esc_html__( 'Lesson - Custom Text', 'edubin' ),
            'type' => 'text',
            'section' => 'lp_archive_page_section'
        )
    );
    // lp_lessons_text
    $wp_customize->add_setting( 'lp_lessons_text',
        array(
            'default' => $this->defaults['lp_lessons_text'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'lp_lessons_text',
        array(
            'label' => esc_html__( 'Lessons - Custom Text', 'edubin' ),
            'type' => 'text',
            'section' => 'lp_archive_page_section'
        )
    );
$wp_customize->add_control('lp_course_feature_lessons',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course max student
$wp_customize->add_setting('lp_course_feature_max_students_show',
    array(
        'default'           => $this->defaults['lp_course_feature_max_students_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_max_students_show',
    array(
        'label'   => esc_html__('Max Students', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_max_tudents',
    array(
        'default'           => $this->defaults['lp_course_feature_max_tudents'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_max_tudents',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);

// Course quizzes
$wp_customize->add_setting('lp_course_feature_quizzes_show',
    array(
        'default'           => $this->defaults['lp_course_feature_quizzes_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_quizzes_show',
    array(
        'label'   => esc_html__('Quizzes', 'edubin'),
        'section' => 'course_features_section',
    )
));

$wp_customize->add_setting('lp_course_feature_quizzes',
    array(
        'default'           => $this->defaults['lp_course_feature_quizzes'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_quizzes',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course retake count
$wp_customize->add_setting('lp_course_feature_retake_count_show',
    array(
        'default'           => $this->defaults['lp_course_feature_retake_count_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_retake_count_show',
    array(
        'label'   => esc_html__('Re-take', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_retake_count',
    array(
        'default'           => $this->defaults['lp_course_feature_retake_count'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_retake_count',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course Assessments
$wp_customize->add_setting('lp_course_feature_assessments_show',
    array(
        'default'           => $this->defaults['lp_course_feature_assessments_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_assessments_show',
    array(
        'label'   => esc_html__('Assessments', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_assessments',
    array(
        'default'           => $this->defaults['lp_course_feature_assessments'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_assessments',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);

// Course Skill Level
$wp_customize->add_setting('lp_course_feature_skill_level_show',
    array(
        'default'           => $this->defaults['lp_course_feature_skill_level_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_skill_level_show',
    array(
        'label'   => esc_html__('Skill Level', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_skill_level',
    array(
        'default'           => $this->defaults['lp_course_feature_skill_level'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_skill_level',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course Cat
$wp_customize->add_setting('lp_course_feature_cat_show',
    array(
        'default'           => $this->defaults['lp_course_feature_cat_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_cat_show',
    array(
        'label'   => esc_html__('Category', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_cat',
    array(
        'default'           => $this->defaults['lp_course_feature_cat'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_cat',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);
// Course Language
$wp_customize->add_setting('lp_course_feature_language_show',
    array(
        'default'           => $this->defaults['lp_course_feature_language_show'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_switch_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_course_feature_language_show',
    array(
        'label'   => esc_html__('Language', 'edubin'),
        'section' => 'course_features_section',
    )
));
$wp_customize->add_setting('lp_course_feature_language',
    array(
        'default'           => $this->defaults['lp_course_feature_language'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control('lp_course_feature_language',
    array(
        'label'   => esc_html__('Custom Level', 'edubin'),
        'type'    => 'text',
        'section' => 'course_features_section',
    )
);

// **=== lp_related_page_section ===**
$wp_customize->add_section('lp_related_page_section',
    array(
        'title' => esc_html__('Related Courses', 'edubin'),
        'panel' => 'learnpress_panel',
    )
);
//lp_related_course_position
$wp_customize->add_setting('lp_related_course_position',
    array(
        'default'           => $this->defaults['lp_related_course_position'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control('lp_related_course_position',
    array(
        'label'   => esc_html__('Related Course Preview', 'edubin'),
        'section' => 'lp_related_page_section',
        'type'    => 'select',
        'choices' => array(
            'none' => esc_html__('None', 'edubin'),
            'sidebar' => esc_html__('Sidebar Area', 'edubin'),
            'content' => esc_html__('Content Area', 'edubin'),
        ),
    )
);
//lp_related_course_style
$wp_customize->add_setting('lp_related_course_style',
    array(
        'default'           => $this->defaults['lp_related_course_style'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'lp_related_course_style',
    array(
        'label'       => esc_html__('Related Course Style', 'edubin'),
        'section'     => 'lp_related_page_section',
        'choices'     => array(
            'round' => esc_html__('Round', 'edubin'),
            'square' => esc_html__('Square', 'edubin'),
        ),
    )
));
// lp_related_course_title
$wp_customize->add_setting( 'lp_related_course_title',
    array(
        'default' => $this->defaults['lp_related_course_title'],
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control( 'lp_related_course_title',
    array(
        'label' => esc_html__( 'Custom Heading', 'edubin' ),
        'type' => 'text',
        'section' => 'lp_related_page_section'
    )
);
//lp_related_course_items
$wp_customize->add_setting( 'lp_related_course_items',
    array(
        'default' => $this->defaults['lp_related_course_items'],
        'transport' => 'refresh',
        'sanitize_callback' => 'edubin_sanitize_integer'

    )
);
$wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'lp_related_course_items',
    array(
        'label' => esc_html__( 'Courses Items', 'edubin' ),
        'section' => 'lp_related_page_section', 
        'input_attrs' => array(
            'min' => 1, 
            'max' => 30, 
            'step' => 1, 
        ),
    )
) );
//lp_related_course_by
$wp_customize->add_setting('lp_related_course_by',
    array(
        'default'           => $this->defaults['lp_related_course_by'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'edubin_radio_sanitization',
    )
);
$wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'lp_related_course_by',
    array(
        'label'       => esc_html__('Related Course By', 'edubin'),
        'section'     => 'lp_related_page_section',
        'choices'     => array(
            'category' => esc_html__('Category', 'edubin'),
            'tags' => esc_html__('Tags', 'edubin'),
        ),
    )
));

// ===== Learnpress other settings start =====
$wp_customize->add_section('lp_course_others_section',
    array(
        'title' => esc_html__('Utilities', 'edubin'),
        'panel' => 'learnpress_panel',
    )
);
//lp_use_plugin_color
$wp_customize->add_setting('lp_use_plugin_color',
    array(
        'default'           => $this->defaults['lp_use_plugin_color'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
);

$wp_customize->add_control(new Edubin_Toggle_Switch_Custom_control($wp_customize, 'lp_use_plugin_color',
    array(
        'label'   => esc_html__('Override LearnPress Settings Color', 'edubin'),
        'section' => 'lp_course_others_section',
    )
));
