<?php 
     $wp_customize->add_panel( 'blog_panel',
        array(
            'title' => esc_html__( 'Blog', 'edubin' ),
            'priority'   => 100,
        )
    );
    // List page
    $wp_customize->add_section( 'blog_list_section',
        array(
            'title' => esc_html__( 'Blog Page', 'edubin' ),
            'panel' => 'blog_panel',
        )
    );

    // Blog sidebar position 
    $wp_customize->add_setting( 'blog_sidebar',
        array(
            'default' => $this->defaults['blog_sidebar'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_sidebar',
        array(
            'label' => esc_html__( 'Sidebar', 'edubin' ),
            'description' => esc_html__( 'Select your sidebar position', 'edubin' ),
            'section' => 'blog_list_section',
            'choices' => array(
                'sidebarleft' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-left.png',
                    'name' => esc_html__( 'Left Sidebar', 'edubin' )
                ),
                'sidebarnone' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-none.png',
                    'name' => esc_html__( 'No Sidebar', 'edubin' )
                ),
                'sidebarright' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-right.png',
                    'name' => esc_html__( 'Right Sidebar', 'edubin' )
                )
            )
        )
    ) );

    // blog_sidebar_width
    $wp_customize->add_setting('blog_sidebar_width',
        array(
            'default'           => $this->defaults['blog_sidebar_width'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'blog_sidebar_width',
        array(
            'label'       => esc_html__('Sidebar Width', 'edubin'),
            'section'     => 'blog_list_section',
            'choices'     => array(
                '3' => esc_html__('25%', 'edubin'),
                '4' => esc_html__('33%', 'edubin'),
            ),
        )
    ));

    // blog_sidebar_gap
    $wp_customize->add_setting('blog_sidebar_gap',
        array(
            'default'           => $this->defaults['blog_sidebar_gap'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'blog_sidebar_gap',
        array(
            'label'       => esc_html__('Sidebar Side Gap', 'edubin'),
            'section'     => 'blog_list_section',
            'choices'     => array(
                '0' => esc_html__('00px', 'edubin'),
                '5' => esc_html__('05px', 'edubin'),
                '10' => esc_html__('10px', 'edubin'),
                '15' => esc_html__('15px', 'edubin'),
                '20' => esc_html__('20px', 'edubin'),
                '25' => esc_html__('25px', 'edubin'),
                '30' => esc_html__('30px', 'edubin'),
                '35' => esc_html__('35px', 'edubin'),
                '40' => esc_html__('40px', 'edubin'),
                '45' => esc_html__('45px', 'edubin'),
                '50' => esc_html__('50px', 'edubin'),
            ),
        )
    ));
    // blog_sidebar_sticky
    $wp_customize->add_setting( 'blog_sidebar_sticky',
        array(
            'default' => $this->defaults['blog_sidebar_sticky'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_sidebar_sticky',
        array(
            'label' => esc_html__( 'Sidebar Sticky', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );
    // Author
    $wp_customize->add_setting( 'blog_author_show',
        array(
            'default' => $this->defaults['blog_author_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_author_show',
        array(
            'label' => esc_html__( 'Author', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );

    // Date
    $wp_customize->add_setting( 'blog_date_show',
        array(
            'default' => $this->defaults['blog_date_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_date_show',
        array(
            'label' => esc_html__( 'Post Date', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );

    // Category
    $wp_customize->add_setting( 'blog_category_show',
        array(
            'default' => $this->defaults['blog_category_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_category_show',
        array(
            'label' => esc_html__( 'Category', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );

    // Comment
    $wp_customize->add_setting( 'blog_comment_show',
        array(
            'default' => $this->defaults['blog_comment_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_comment_show',
        array(
            'label' => esc_html__( 'Comment', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );
    // post view
    $wp_customize->add_setting( 'blog_view_show',
        array(
            'default' => $this->defaults['blog_view_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_view_show',
        array(
            'label' => esc_html__( 'Post view', 'edubin' ),
            'section' => 'blog_list_section'
        )
    ) );

    // Single page
    $wp_customize->add_section( 'blog_single_section',
        array(
            'title' => esc_html__( 'Single Page', 'edubin' ),
            'panel' => 'blog_panel'
        )
    );;
    
    // Blog single sidebar position 
    $wp_customize->add_setting( 'blog_single_sidebar',
        array(
            'default' => $this->defaults['blog_single_sidebar'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_single_sidebar',
        array(
            'label' => esc_html__( 'Sidebar', 'edubin' ),
            'description' => esc_html__( 'Select your sidebar position', 'edubin' ),
            'section' => 'blog_single_section',
            'choices' => array(
                'sidebarleft' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-left.png',
                    'name' => esc_html__( 'Left Sidebar', 'edubin' )
                ),
                'sidebarnone' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-none.png',
                    'name' => esc_html__( 'No Sidebar', 'edubin' )
                ),
                'sidebarright' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'admin/assets/images/sidebar-right.png',
                    'name' => esc_html__( 'Right Sidebar', 'edubin' )
                )
            )
        )
    ) );
    // blog_single_sidebar_width
    $wp_customize->add_setting('blog_single_sidebar_width',
        array(
            'default'           => $this->defaults['blog_single_sidebar_width'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'blog_single_sidebar_width',
        array(
            'label'       => esc_html__('Sidebar Width', 'edubin'),
            'section'     => 'blog_single_section',
            'choices'     => array(
                '3' => esc_html__('25%', 'edubin'),
                '4' => esc_html__('33%', 'edubin'),
            ),
        )
    ));

    // blog_single_sidebar_gap
    $wp_customize->add_setting('blog_single_sidebar_gap',
        array(
            'default'           => $this->defaults['blog_single_sidebar_gap'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'blog_single_sidebar_gap',
        array(
            'label'       => esc_html__('Sidebar Side Gap', 'edubin'),
            'section'     => 'blog_single_section',
            'choices'     => array(
                '0' => esc_html__('00px', 'edubin'),
                '5' => esc_html__('05px', 'edubin'),
                '10' => esc_html__('10px', 'edubin'),
                '15' => esc_html__('15px', 'edubin'),
                '20' => esc_html__('20px', 'edubin'),
                '25' => esc_html__('25px', 'edubin'),
                '30' => esc_html__('30px', 'edubin'),
                '35' => esc_html__('35px', 'edubin'),
                '40' => esc_html__('40px', 'edubin'),
                '45' => esc_html__('45px', 'edubin'),
                '50' => esc_html__('50px', 'edubin'),
            ),
        )
    ));

    // blog_single_sidebar_sticky
    $wp_customize->add_setting( 'blog_single_sidebar_sticky',
        array(
            'default' => $this->defaults['blog_single_sidebar_sticky'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_sidebar_sticky',
        array(
            'label' => esc_html__( 'Sidebar Sticky', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Author
    $wp_customize->add_setting( 'blog_single_author_show',
        array(
            'default' => $this->defaults['blog_single_author_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_author_show',
        array(
            'label' => esc_html__( 'Author', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Date
    $wp_customize->add_setting( 'blog_single_date_show',
        array(
            'default' => $this->defaults['blog_single_date_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_date_show',
        array(
            'label' => esc_html__( 'Post Date', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Category
    $wp_customize->add_setting( 'blog_single_category_show',
        array(
            'default' => $this->defaults['blog_single_category_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_category_show',
        array(
            'label' => esc_html__( 'Category', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Comment
    $wp_customize->add_setting( 'blog_single_comment_show',
        array(
            'default' => $this->defaults['blog_single_comment_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_comment_show',
        array(
            'label' => esc_html__( 'Comment', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );
    // post view
    $wp_customize->add_setting( 'blog_single_view_show',
        array(
            'default' => $this->defaults['blog_single_view_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_view_show',
        array(
            'label' => esc_html__( 'Post view', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );
    // Tags view
    $wp_customize->add_setting( 'blog_single_tags_show',
        array(
            'default' => $this->defaults['blog_single_tags_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_tags_show',
        array(
            'label' => esc_html__( 'Tags view', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // blog_single_social_share
    $wp_customize->add_setting( 'blog_single_social_share',
        array(
            'default' => $this->defaults['blog_single_social_share'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_single_social_share',
        array(
            'label' => esc_html__( 'Social Share', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Next Prev
    $wp_customize->add_setting( 'blog_nav_show',
        array(
            'default' => $this->defaults['blog_nav_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_nav_show',
        array(
            'label' => esc_html__( 'Post Navigation', 'edubin' ),
            'section' => 'blog_single_section'
        )
    ) );

    // Single page
    $wp_customize->add_section( 'blog_releted_section',
        array(
            'title' => esc_html__( 'Related Post', 'edubin' ),
            'panel' => 'blog_panel'
        )
    );;
    
    // Related post
    $wp_customize->add_setting( 'blog_related_show',
        array(
            'default' => $this->defaults['blog_related_show'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_switch_sanitization'
        )
    );
    $wp_customize->add_control( new Edubin_Toggle_Switch_Custom_control( $wp_customize, 'blog_related_show',
        array(
            'label' => esc_html__( 'Related Post', 'edubin' ),
            'section' => 'blog_releted_section'
        )
    ) );    
    // blog_related_title
    $wp_customize->add_setting( 'blog_related_title',
        array(
            'default' => $this->defaults['blog_related_title'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control( 'blog_related_title',
        array(
            'label' => esc_html__( 'Related Posts Title', 'edubin' ),
            'type' => 'text',
            'section' => 'blog_releted_section'
        )
    );
 
    // related_total_posts
    $wp_customize->add_setting( 'related_total_posts',
        array(
            'default' => $this->defaults['related_total_posts'],
            'transport' => 'refresh',
            'sanitize_callback' => 'edubin_sanitize_integer'

        )
    );
    $wp_customize->add_control( new Edubin_Slider_Custom_Control( $wp_customize, 'related_total_posts',
        array(
            'label' => esc_html__( 'Number of Related Items', 'edubin' ),
            'section' => 'blog_releted_section', 
            'input_attrs' => array(
                'min' => 0, 
                'max' => 10, 
                'step' => 1, 
            ),
        )
    ) );

    // related_post_columns
    $wp_customize->add_setting('related_post_columns',
        array(
            'default'           => $this->defaults['related_post_columns'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'related_post_columns',
        array(
            'label'       => esc_html__('Related Posts Columns', 'edubin'),
            'section'     => 'blog_releted_section',
            'choices'     => array(
                '12' => esc_html__('1', 'edubin'),
                '6' => esc_html__('2', 'edubin'),
                '4' => esc_html__('3', 'edubin'),
                '3' => esc_html__('4', 'edubin'),
            ),
        )
    ));

    // related_posts_by
    $wp_customize->add_setting('related_posts_by',
        array(
            'default'           => $this->defaults['related_posts_by'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'edubin_radio_sanitization',
        )
    );
    $wp_customize->add_control(new Edubin_Text_Radio_Button_Custom_Control($wp_customize, 'related_posts_by',
        array(
            'label'       => esc_html__('Related Posts By', 'edubin'),
            'section'     => 'blog_releted_section',
            'choices'     => array(
                'category' => esc_html__('Category', 'edubin'),
                'tags' => esc_html__('Tags', 'edubin'),
            ),
        )
    ));


