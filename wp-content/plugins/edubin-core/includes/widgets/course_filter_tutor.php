<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Course_Filter_For_Tutor;


class Edubin_Elementor_Widget_Course_Filter_Tutor extends Widget_Base {

    public function get_name() {
        return 'edubin-course-filter-tutor';
    }
    
    public function get_title() {
        return __( 'Course Filter (Tutor)', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Course Filter', 'Tutor course filter', 'Tutor course filter' , 'filter search', 'filter course' ];
    }
    public function get_icon() {
        return 'edubin-icon eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'course_query_section',
            [
                'label' => __('Course Query', 'edubin-core'),
            ]
        );
        $this->add_control(
            'course_style',
            [
                'label' => __( 'Course Style', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style 01', 'edubin-core'),
                    '2' => __('Style 02', 'edubin-core'),
                    '3' => __('Style 03', 'edubin-core'),
                    '4' => __('Style 04', 'edubin-core'),
                    '5' => __('Style 05', 'edubin-core'),
                    '6' => __('Style 06', 'edubin-core'),
                ],
            ]
        );
          $this->add_control(
            'posts_column',
            [
                'label' => __('Items Column', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '2' => __('6 Column', 'edubin-core'),
                    '3' => __('4 Column', 'edubin-core'),
                    '4' => __('3 Column', 'edubin-core'),
                    '6' => __('2 Column', 'edubin-core'),
                    '12' => __('1 Column', 'edubin-core'),
                ],
            ]
        );

        $this->add_control(
            'post_limit',
            [
                'label' => __('Number of Course', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
       
        $this->end_controls_section();


        // ===== Price & Permalink ======
        $this->start_controls_section(
            'course_price_permalink',
            [
                'label' => __('Price & Permalink', 'edubin-core'),
            ]
        );
        $this->add_control(
            'permalink_type',
            [
                'label' => esc_html__('Permalink Type', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'tutor_archive_price',
                'options' => [
                    'tutor_archive_dynamic_url' => esc_html__('Tutor Dynamic URL', 'edubin-core'),
                    'tutor_archive_permalink' => esc_html__('See More', 'edubin-core'),
                    'tutor_archive_price' => esc_html__('Price', 'edubin-core'),
                ],
                // 'condition' => [
                //  'custom_order!' => 'yes',
                // ],
            ]
        );

        $this->add_control(
            'see_more_text',
            [
                'label'   => __( 'See More', 'edubin-core' ),
                'type'    => Controls_Manager::TEXT,
                'placeholder' => __('See More','edubin-core'),
                'default' => 'See More',
            ]
        );   
        // $this->add_control(
        //     'text_free',
        //     [
        //         'label'   => __( 'Free', 'edubin-core' ),
        //         'type'    => Controls_Manager::TEXT,
        //         'placeholder' => __('Free','edubin-core'),
        //         'default' => 'Free',
        //     ]
        // );        
        // $this->add_control(
        //     'text_get_nrolled',
        //     [
        //         'label'   => __( 'Get Enrolled', 'edubin-core' ),
        //         'type'    => Controls_Manager::TEXT,
        //         'placeholder' => __('Get Enrolled','edubin-core'),
        //         'default' => 'Get Enrolled',
        //     ]
        // );        
        // $this->add_control(
        //     'text_start_learning',
        //     [
        //         'label'   => __( 'Start Learning', 'edubin-core' ),
        //         'type'    => Controls_Manager::TEXT,
        //         'placeholder' => __('Start Learning','edubin-core'),
        //         'default' => 'Start Learning',
        //     ]
        // );        
        // $this->add_control(
        //     'text_continue_learning',
        //     [
        //         'label'   => __( 'Continue Learning', 'edubin-core' ),
        //         'type'    => Controls_Manager::TEXT,
        //         'placeholder' => __('Continue Learning','edubin-core'),
        //         'default' => 'Continue Learning',
        //     ]
        // );
        $this->end_controls_section();
        
        // ===== Title & Excerpt ======
        $this->start_controls_section(
            'title_and_excerpt',
            [
                'label' => __('Title & Excerpt', 'edubin-core'),
            ]
        );
        $this->add_control(
            'show_title',
            [
                'label' => esc_html__('Title', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'title_length',
            [
                'label' => __('Title Length', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 15,
            ]
        );
        $this->add_control(
            'show_excerpt',
            [
                'label' => esc_html__('Excerpt', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_excerpt_list',
            [
                'label' => esc_html__('Excerpt List Item', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        // ===== Image & Video ====

        $this->start_controls_section(
            'courses_media',
            [
                'label' => __( 'Media', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'media_show',
            [
                'label' => esc_html__( 'Media', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'intor_video_image',
            [
                'label' => esc_html__( 'Intro Video', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->add_control(
            'custom_placeholder_image',
            [
                'label'   => __('Custom Placeholder Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
            ]
        );

        $this->add_responsive_control(
            'fixed_image_height',
            [
                'label' => __( 'Fixed Image Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 350,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course .course__media a > img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-course .intro-video-sidebar .intro-video' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===== Course Meta
        $this->start_controls_section(
            'course_meta_option',
            [
                'label' => __('Course Meta', 'edubin-core'),
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Category', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_wishlist',
            [
                'label' => esc_html__('Wishlist', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_level',
            [
                'label' => esc_html__('Level', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_review',
            [
                'label' => esc_html__('Review', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_review_text',
            [
                'label' => esc_html__('Review Text', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_enroll',
            [
                'label' => esc_html__('Enrolled Student', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_lesson',
            [
                'label' => esc_html__( 'Lessons', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_lesson_text',
            [
                'label' => esc_html__( 'Lessons Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_quiz',
            [
                'label' => esc_html__( 'Quiz', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_quiz_text',
            [
                'label' => esc_html__( 'Quiz Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_duration',
            [
                'label' => esc_html__('Duration', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_duration_text',
            [
                'label' => esc_html__( 'Duration Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'show_author_avator',
            [
                'label' => esc_html__('Author Avatar', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_author_name',
            [
                'label' => esc_html__('Author Name', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        // $this->add_control(
        //     'show_btn',
        //     [
        //         'label' => esc_html__('Price/Dynamic Button', 'edubin-core'),
        //         'type' => Controls_Manager::SWITCHER,
        //         'return_value' => 'yes',
        //         'default' => '',
        //     ]
        // );
        $this->add_control(
            'show_price',
            [
                'label' => esc_html__('Price', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section(); // Option End
        
        // Course (List) ===
        
        $this->start_controls_section(
            'course_meta_list_option',
            [
                'label' => __( 'Course (List)', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'list_show_title',
            [
                'label' => esc_html__('Title', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_excerpt',
            [
                'label' => esc_html__('Excerpt', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_cat',
            [
                'label' => esc_html__('Category', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_wishlist',
            [
                'label' => esc_html__('Wishlist', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_level',
            [
                'label' => esc_html__('Level', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_review',
            [
                'label' => esc_html__('Review', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_review_text',
            [
                'label' => esc_html__('Review Text', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'list_show_enroll',
            [
                'label' => esc_html__('Enrolled Student', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_lesson',
            [
                'label' => esc_html__( 'Lessons', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_lesson_text',
            [
                'label' => esc_html__( 'Lessons Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'list_show_quiz',
            [
                'label' => esc_html__( 'Quiz', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'list_show_quiz_text',
            [
                'label' => esc_html__( 'Quiz Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'list_show_duration',
            [
                'label' => esc_html__('Duration', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'list_show_duration_text',
            [
                'label' => esc_html__( 'Duration Text', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'list_show_author_avator',
            [
                'label' => esc_html__('Author Avatar', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'list_show_author_name',
            [
                'label' => esc_html__('Author Name', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        // $this->add_control(
        //     'list_show_btn',
        //     [
        //         'label' => esc_html__('Price/Dynamic Button', 'edubin-core'),
        //         'type' => Controls_Manager::SWITCHER,
        //         'return_value' => 'yes',
        //         'default' => '',
        //     ]
        // );
        $this->add_control(
            'list_show_price',
            [
                'label' => esc_html__('Price', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        // Filter Top =======
        $this->start_controls_section(
            'course_filter_top_option',
            [
                'label' => __( 'Filter Top', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'show_filter_top',
            [
                'label' => esc_html__( 'Filter Top', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        ); 
        $this->add_control(
            'show_filter_search',
            [
                'label' => esc_html__( 'Search', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'filter_search_placeholder',
            [
              'label' => __( 'Search Placeholder', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Search our course',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_ajax_search_text',
            [
              'label' => __( 'Ajax Search Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Searching..',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'show_filter_order',
            [
                'label' => esc_html__( 'Order by', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        ); 
        $this->add_control(
            'filter_newly_published',
            [
              'label' => __( 'Newly Published', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Newly Published',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_oldest_published',
            [
              'label' => __( 'Oldest Published', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Oldest Published',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_a_to_z',
            [
              'label' => __( 'Course Title (A-Z)', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Course Title (A-Z)',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_z_to_a',
            [
              'label' => __( 'Course Title (Z-A)', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Course Title (Z-A)',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'show_filter_showing_results',
            [
                'label' => esc_html__( 'Showing Results', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'filter_of',
            [
              'label' => __( 'Of', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'of',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_showing',
            [
              'label' => __( 'Showing', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Showing',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'filter_results',
            [
              'label' => __( 'results', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'results',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'show_filter_grid_list',
            [
                'label' => esc_html__( 'Grid/List', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'course_filter_sidebar_option',
            [
                'label' => __( 'Filter Sidebar', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'show_filter_section',
            [
                'label' => esc_html__( 'Filter', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        ); 
        $this->add_control(
            'sidebar_position',
            [
                'label' => __('Filter Position', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => __('Left', 'edubin-core'),
                    'right' => __('Right', 'edubin-core'),
                ],
            ]
        );
        $this->add_control(
            'show_filter_cat',
            [
                'label' => esc_html__( 'Category', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  
        $this->add_control(
            'filter_cat_text',
            [
              'label' => __( 'Category Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Filter Category',
              'label_block' => true,
          ]
        );
        $this->add_control(
            'show_filter_cat_count',
            [
                'label' => esc_html__( 'Category Count', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,

                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  
        $this->add_control(
            'show_filter_tag',
            [
                'label' => esc_html__( 'Tag', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'filter_tag_text',
            [
              'label' => __( 'Tag Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Tag',
              'label_block' => true,
          ]
        );
        $this->add_control(
            'show_filter_tag_count',
            [
                'label' => esc_html__( 'Tag Count', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_filter_author',
            [
                'label' => esc_html__( 'Instructor', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                 'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'filter_author_text',
            [
              'label' => __( 'Instructor Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Instructor',
              'label_block' => true,
          ]
        );
        $this->add_control(
            'show_filter_author_count',
            [
                'label' => esc_html__( 'Instructor Count', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        ); 
        $this->add_control(
            'show_filter_language',
            [
                'label' => esc_html__( 'Languages', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  
        $this->add_control(
            'filter_language_text',
            [
              'label' => __( 'Languages Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Languages',
              'label_block' => true,
          ]
        ); 
        $this->add_control(
            'show_filter_language_count',
            [
                'label' => esc_html__( 'Languages Count', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  
        $this->add_control(
            'show_filter_level',
            [
                'label' => esc_html__( 'Level', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => '',
            ]
        ); 
        $this->add_control(
            'filter_level_text',
            [
              'label' => __( 'Level Text', 'edubin-core' ),
              'type'  => Controls_Manager::TEXT,
              'default' => 'Level',
              'label_block' => true,
          ]
        );     
        $this->end_controls_section();

        // Course body style
        $this->start_controls_section(
            'course_style_section',
            [
                'label' => __('Style', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'courses_align',
            [
                'label' => __('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'edubin-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'edubin-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'edubin-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-course-container' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .edubin-tutor-courses-addons .tutor-courses-wrap.style-2 .tutor-course-col .tutor-course' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .course__title' => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs('body_box_tabs');

        $this->start_controls_tab(
            'body_box_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .edubin-tutor-courses-addons .slick-slide, .edubin-tutor-courses-addons .tutor-courses-wrap.style-2 .tutor-course-col .tutor-course, .edubin-course',
            ]
        );

        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
            'body_box_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            ['label' => __('Box Shadow Hover', 'edubin-core'),
            'name' => 'box_shadow_hover',
            'selector' => '{{WRAPPER}} .tutor-loop-course-container:hover, .edubin-tutor-courses-addons .tutor-courses-wrap.style-2 .tutor-course-col .tutor-course:hover, .edubin-course:hover',
        ]
    );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();

        $this->add_control(
            'course_bg_color',
            [
                'label' => __('Content Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-course-container' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-tutor-courses-addons .tutor-courses-wrap.style-2 .tutor-course-col .tutor-course' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .course__content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'course_footer_bg_color',
            [
                'label' => __('Footer Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-course-footer' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Pagination 
        $this->start_controls_section(
        'pagination_section',
            [
                'label' => __( 'Pagination', 'edubin-core' ),
            ]
        );

        $this->add_control(
        'pagi_on_off',
            [
                'label' => esc_html__( 'Pagination', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        ); 
        $this->add_responsive_control(
        'pagi_align',
            [
                'label'         => esc_html__( 'Alignment', 'edubin-core' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title'=> esc_html__( 'Left', 'edubin-core' ),
                        'icon' => 'eicon-text-align-left',
                        ],
                    'center'    => [
                        'title'=> esc_html__( 'Center', 'edubin-core' ),
                        'icon' => 'eicon-text-align-center',
                        ],
                    'right'     => [
                        'title'=> esc_html__( 'Right', 'edubin-core' ),
                        'icon' => 'eicon-text-align-right',
                        ],
                    ],
                'toggle'        => false,
                'default'       => 'center',
                'selectors'     => [
                    '{{WRAPPER}} nav.navigation.pagination' => 'text-align: {{VALUE}};',
                    ],
            ]
        );
        $this->add_control(
            'pagi_end_size',
            [
                'label' => __('End Size', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );  
        $this->add_control(
        'pagi_mid_size',
            [
                'label' => __('Mid Size', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );  

        $this->add_control(
        'pagi_show_all',
            [   
                'label' => esc_html__( 'Show All', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'edubin-core'),
                'label_on' => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->end_controls_section();


        // Style Title tab section
        $this->start_controls_section(
            'course_title_style_section',
            [
                'label' => __('Title', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_review' => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('title_style_tabs');

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-title h2 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-col .tutor-course-body h3 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course__title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .tutor-course-loop-title h2 a, .tutor-course-col .tutor-course-body h3 a, .course__title a',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tutor-course-col .tutor-course-body h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .course__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_section_height',
            [
                'label' => __( 'Title Section Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 23,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ 'px', ],
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-col .tutor-course-body h3' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .course__title' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'course_style' =>  array('2', '3'),
                ],
            ]
        );
        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-title h2 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-col .tutor-course-body h3 a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course__title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style content excerpt
        $this->start_controls_section(
            'tutor_course_excerpt_style_section',
            [
                'label' => __('Excerpt', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_excerpt' => 'yes',
                ],
                'condition' => [
                    'course_style' => '1',
                ],
            ]
        );
        $this->add_control(
            'excerpt_color',
            [
                'label' => __('Excerpt Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-tutor-courses-addons .edubin-tutor-excerpt p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'excerpt_padding',
            [
                'label' => __('Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .edubin-tutor-courses-addons .edubin-tutor-excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Style Title tab section
        $this->start_controls_section(
            'filter_style_section',
            [
                'label' => __( 'Filter Top', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'filter_sidebar_top_bg_color',
            [
                'label' => __( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .switch-layout-container' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Style Title tab section
        $this->start_controls_section(
            'filter_sidebar_style_section',
            [
                'label' => __( 'Filter Sidebar', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
                   
        $this->add_control(
            'filter_widget_color',
            [
                'label' => __( 'Heading Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-filter-wrapper .widget-title' => 'color: {{VALUE}}',
                ],
            ]
        );   
        $this->add_control(
            'filter_headeing_bg_color',
            [
                'label' => __( 'Heading Border', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .widget .widget-title:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'filter_widget_count_typography',
                'label' => __( 'Heading Typography', 'edubin-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-course-filter-wrapper .widget-title',
            ]
        );
        $this->add_control(
            'filter_sidebar_bg_color',
            [
                'label' => __( 'Sidebar Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-filter-wrapper .single-filter.widget' => 'background: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'filter_section_height',
            [
                'label' => __( 'Widget Fixed Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'separator' => 'before',
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 70,
                        'max' => 800,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-course-filter-wrapper .filter-content' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_responsive_control(
            'filter_widget_padding',
            [
                'label' => __( 'Widget Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-sidebar-filter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'filter_widget_margin',
            [
                'label' => __( 'Widget Margin', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-sidebar-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Level 
        $this->start_controls_tabs('filter_level_style_tabs');

                $this->start_controls_tab(
                    'filter_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'filter_level_color',
                        [
                            'label' => __( 'Level Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-course-filter-wrapper .single-filter.widget label' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'filter_level_typography',
                            'label' => __( 'Level Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_TEXT,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-course-filter-wrapper .single-filter.widget label',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'filter_level_count_typography',
                            'label' => __( 'Count Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_TEXT,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-course-filter-wrapper .filter-checkbox-count',
                        ]
                    );

                    $this->add_responsive_control(
                        'filter_level_padding',
                        [
                            'label' => __( 'Level Padding', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-course-filter-wrapper .single-filter.widget label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'filter_level_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'filter_inpur_hover_color',
                    [
                        'label' => __( 'Level Hover Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-course-filter-wrapper .single-filter.widget label:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style Meta tab section
        $this->start_controls_section(
            'post_meta_style_section',
            [
                'label' => __('Course Meta', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'level_typography',
                'label' => __('Level Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .tutor-course-loop-level',
            ]
        );
        $this->add_control(
            'Level_bg_color',
            [
                'label' => __('Level Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-level' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'course_cat_typography',
                'label' => __('Category Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .tutor-course-loop-level, .course__categories a',
            ]
        );
        $this->add_control(
            'cat_color',
            [
                'label' => __('Category Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-course .course__categories a' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'cat_bg_color',
            [
                'label' => __('Category Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-course .course__categories a' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'wishlist_icon_color',
            [
                'label' => __('Wishlist Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-header-meta .tutor-course-wishlist a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-loop-header-meta .tutor-course-wishlist:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .course__wishlist a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'wishlist_bg_color',
            [
                'label' => __('Wishlist Background Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-header-meta .tutor-course-wishlist' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-loop-header-meta .tutor-course-wishlist:hover a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course__wishlist a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'meta_icon_color',
            [
                'label' => __('Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-single-loop-meta i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course-meta span i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'meta_text_color',
            [
                'label' => __('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-single-loop-meta span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course-meta span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'meta_Secondary_text_color',
            [
                'label' => __('Secondary Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-author>div span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_name_typography',
                'label' => __('Author Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
                'selector' => '{{WRAPPER}} .tutor-loop-author>.tutor-single-course-author-name a, .tutor-course-author, .edubin-course .author__name a',
            ]
        );

        $this->start_controls_tabs('author_name_style_tabs');

        $this->start_controls_tab(
            'author_name_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => __('Author Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-author>.tutor-single-course-author-name a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-author' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-course .author__name a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
            'author_name_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );
        $this->add_control(
            'author_name_hover_color',
            [
                'label' => __('Author Hover Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-author>.tutor-single-course-author-name a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tutor-course-author:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-course .author__name a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cat_typography',
                'label' => __('Category Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .tutor-loop-author>.tutor-course-lising-category a',
                'condition' => [
                    'course_style' => '1',
                ],
            ]
        );

        $this->start_controls_tabs('cat_style_tabs');

        $this->start_controls_tab(
            'cat_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
                'condition' => [
                    'course_style' => '1',
                ],
            ]
        );

        // $this->add_control(
        //     'cat_color',
        //     [
        //         'label' => __('Category Color', 'edubin-core'),
        //         'type' => Controls_Manager::COLOR,
        //         'default' => '',
        //         'selectors' => [
        //             '{{WRAPPER}} .tutor-loop-author>.tutor-course-lising-category a' => 'color: {{VALUE}}',
        //         ],
        //         'condition' => [
        //             'course_style' => '1',
        //         ],
        //     ]
        // );

        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
            'cat_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
                'condition' => [
                    'course_style' => '1',
                ],
            ]
        );
        $this->add_control(
            'cat_hover_color',
            [
                'label' => __('Category Hover Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-loop-author>.tutor-course-lising-category a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __('Price Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .tutor-course-loop-price>.price, .course__content--meta .price',
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => __('Price Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-price>.price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .course__content--meta .price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'enroll_icon_color',
            [
                'label' => __('Enroll Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a::before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'enroll_typography',
                'label' => __('Enroll Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a',
            ]
        );

        $this->start_controls_tabs('enroll_style_tabs');

        $this->start_controls_tab(
            'enroll_style_normal_tab',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'enroll_color',
            [
                'label' => __('Enroll text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
            'enroll_style_hover_tab',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );
        $this->add_control(
            'enroll_hover_color',
            [
                'label' => __('Enroll Text Hover Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();


        $this->end_controls_section();
    }

    protected function render( $instance = [] ) { 

    $settings   = $this->get_settings_for_display();

    $sidebar_position = $settings['sidebar_position'];

        // Course Column
        // $this->add_render_attribute( 'edubin_posts_column', 'class', 'col-sm-'.$settings['slmobile_display_columns'].' col-md-'.$settings['sltablet_display_columns'].' col-lg-'.$settings['posts_column'] );        

    $this->add_render_attribute( 'edubin_posts_column', 'class', 'col-sm-6 col-lg-'.$settings['posts_column'] );
        // Price style
     $this->add_render_attribute( 'edubin_price_style', 'class', 'edubin-course-price-'.$settings['course_style'] );

    // Customizer option
    global $wp, $wp_query;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $selected_cat = !empty($_GET['course-category']) ? (array) $_GET['course-category'] : array();
    $selected_cat = array_map('sanitize_text_field', $selected_cat);
    $selected_cat = array_map('intval', $selected_cat);

    $is_queried_object = false;
    if (isset($wp_query->queried_object->term_id)) {
        $is_queried_object = true;
        $selected_cat = array($wp_query->queried_object->term_id);
    }

    $selected_tag = !empty($_GET['course-tag']) ? (array) $_GET['course-tag'] : array();
    $selected_tag = array_map('sanitize_text_field', $selected_tag);
    $selected_tag = array_map('intval', $selected_tag);

    $selected_language= !empty($_GET['tutor_course_language']) ? (array) $_GET['tutor_course_language'] : array();
    $selected_language = array_map('sanitize_text_field', $selected_language);
    $selected_language = array_map('intval', $selected_language);

    $selected_author = !empty($_GET['course_author']) ? (array) $_GET['course_author'] : array();
    $selected_author = array_map('sanitize_text_field', $selected_author);

    $selected_level = !empty($_GET['course_level']) ? (array) $_GET['course_level'] : array('all_levels');
    $selected_level = array_map('sanitize_text_field', $selected_level);

    $course_terms_cat = get_terms(array(
        'taxonomy' => 'course-category',
        'hide_empty' => true,
        //'parent' => 0,
    ));

    $course_terms_tag = get_terms(array(
        'taxonomy' => 'course-tag',
        'hide_empty' => true,
    ));

    $course_terms_language = get_terms(array(
        'taxonomy' => 'tutor_course_language',
        'hide_empty' => true,
    ));

   // $course_levels =  tutor_course_level();
    $course_levels =  tutor_utils()->course_levels();

    $course_level_filter = !empty($selected_level) && !in_array('all_levels', $selected_level) ? array(
        'key' => '_tutor_course_level',
        'value' => $selected_level,
        'compare' => 'IN',
    ) : array();

    if (!empty($selected_author)) {
           $totatl_author_ides = $selected_author;
       }
       else {
            $totatl_author_ides = '';
    }

    $args = array(
        'post_type' => tutor()->course_post_type,
        'post_status' => 'publish',
        'author__in' => $totatl_author_ides,
        'paged' => $paged,
        'posts_per_page' => $settings['post_limit'],
        's' => get_search_query(),
        'meta_query' => array(
            $course_level_filter,
        ),
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'course-category',
                'field' => 'term_id',
                'terms' => $selected_cat,
                'operator' => !empty($selected_cat) ? 'IN' : 'NOT IN',
            ),
            array(
                'taxonomy' => 'course-tag',
                'field' => 'term_id',
                'terms' => $selected_tag,
                'operator' => !empty($selected_tag) ? 'IN' : 'NOT IN',
            ),
            array(
                'taxonomy' => 'tutor_course_language',
                'field' => 'term_id',
                'terms' => $selected_language,
                'operator' => !empty($selected_language) ? 'IN' : 'NOT IN',
            ),
        ),
    );

    $course_filter = 'newest_first';
    if (!empty($_GET['tutor_course_filter'])) {
        $course_filter = sanitize_text_field($_GET['tutor_course_filter']);
    }
    switch ($course_filter) {
        case 'newest_first':
            $args['orderby'] = 'ID';
            $args['order'] = 'desc';
            break;
        case 'oldest_first':
            $args['orderby'] = 'ID';
            $args['order'] = 'asc';
            break;
        case 'course_title_az':
            $args['orderby'] = 'post_title';
            $args['order'] = 'asc';
            break;
        case 'course_title_za':
            $args['orderby'] = 'post_title';
            $args['order'] = 'desc';
            break;
    }

    $query = new \WP_Query( $args );
    ob_start();?>


    <div class="row tpc_g_30">
        <?php if ($settings['show_filter_section']): ?>

    <?php
        // get current url with query string.
        $current_url =  home_url( $wp->request ); 
        // get the position where '/page.. ' text start.
        $pos = strpos($current_url , '/page');
        // remove string from the specific postion
        $finalurl = substr($current_url,0,$pos);

    ?>
    <div class="col-12 col-md-4 col-lg-3 order-2 order-sm-<?php echo $sidebar_position == 'right' ? 2 : 1; ?> mb-4 md-lg-0">

        <div class="edubin-course-filter-wrapper"> 

            <form class="edubin-sidebar-filter" action="<?php echo esc_url($finalurl); ?>" method="get">
                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
    
                    <!--  Filter by categories -->
                    <?php if ($settings['show_filter_cat']): ?>
                    <div class="single-filter widget <?php if (!$settings['show_filter_cat_count']) { echo esc_attr('hide__filter_cat'); }?>">

                    <?php if ($settings['filter_cat_text']) : ?>
                        <h4 class="widget-title"><?php echo esc_html($settings['filter_cat_text']); ?></h4>
                    <?php endif;?>

                    <?php $tutor_filter_object = new \Tutor_Course_filter_Nasted_Cat();
                       $tutor_filter_object->render_terms('category');
                    ?>

                    </div>
                    <?php endif ?>
                     <!--  //Filter by categories -->

                    <!--  filter by tag -->
                    <?php if ($settings['show_filter_tag']): ?>
                    <div class="single-filter widget"> 
                     <?php if ($settings['filter_tag_text']) { ?>  
                        <h4 class="widget-title"><?php echo esc_html($settings['filter_tag_text']); ?></h4>
                    <?php } ?>
                        <div class="filter-content">
                       <?php
                       foreach ($course_terms_tag as $course_tag) {
                            ?>
                                <label for="tag-<?php echo esc_attr($course_tag->slug) ?>">
                                    <input
                                        type="checkbox"
                                        name="course-tag[]"
                                        value="<?php echo esc_attr($course_tag->term_id) ?>"
                                        id="tag-<?php echo esc_attr($course_tag->slug) ?>"
                                        <?php echo in_array($course_tag->term_id, $selected_tag) ? 'checked="checked"' : ''; ?>
                                    >
                                    <span class="filter-checkbox"><?php echo esc_html($course_tag->name) ?></span>
                                    <?php if ($settings['show_filter_tag_count']) { ?>
                                        <span class="filter-checkbox-count"><?php echo esc_attr('('. $course_tag->count .')');?></span>
                                    <?php } ?>
                                </label>
                        <?php }?>
                        </div>
                    </div>
                    <?php endif ?>
                    <!--  //End tag -->

                    <!--  Filter by author -->
                    <?php if ($settings['show_filter_author']): ?>
                    <div class="single-filter widget">

                    <?php if ($settings['filter_author_text']) { ?>
                        <h4 class="widget-title"><?php echo esc_html($settings['filter_author_text']); ?></h4>
                    <?php } ?>

                        <div class="filter-content">
                            <?php
                            $course_authors = get_users();
                            foreach ($course_authors as $user) {
                                if ( edubin_count_user_posts_by_type( $user->ID, 'courses') ) {
                            ?>
                                <label for="<?php echo $user->ID; ?>">
                                    <input
                                        type="checkbox"
                                        name="course_author[]"
                                        value="<?php echo $user->ID; ?>"
                                        id="<?php echo $user->ID; ?>"
                                        <?php echo in_array( $user->ID, $selected_author) ? 'checked="checked"' : ''; ?>
                                    >
                                <span class="filter-checkbox"><?php echo $user->display_name; ?></span>
                                <?php $user_post_count = edubin_count_user_posts_by_type( $user->ID, 'courses'); ?>

                                <?php if ($settings['show_filter_author_count']) { ?>
                                    <span class="filter-checkbox-count"><?php echo esc_attr('('. $user_post_count .')');?></span>
                                <?php } ?>

                                </label>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <!--  //End Filter by author -->

                    <!-- Filter by language -->
                    <?php if ($settings['show_filter_language']): ?>
                        <div class="single-filter widget">
                        <h4 class="widget-title"><?php echo esc_html($settings['filter_language_text']); ?></h4>
                            <div class="filter-content">
                            <?php
                                foreach ($course_terms_language as $tutor_course_language) {
                            ?>
                                <label for="tag-<?php echo esc_attr($tutor_course_language->slug) ?>">
                                    <input
                                        type="checkbox"
                                        name="tutor_course_language[]"
                                        value="<?php echo esc_attr($tutor_course_language->term_id) ?>"
                                        id="tag-<?php echo esc_attr($tutor_course_language->slug) ?>"
                                        <?php echo in_array($tutor_course_language->term_id, $selected_language) ? 'checked="checked"' : ''; ?>
                                    >
                                    <span class="filter-checkbox"><?php echo esc_html($tutor_course_language->name) ?></span>

                                    <?php if ($settings['show_filter_language_count']) { ?>
                                        <span class="filter-checkbox-count"><?php echo esc_attr('('. $tutor_course_language->count .')');?></span>
                                    <?php } ?>

                                </label>
                            <?php } ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <!--  //End Filter by language -->

                    <!--  Filter by level -->
                    <?php if ($settings['show_filter_level']): ?>
                        <div class="single-filter widget">
                            <?php if ($settings['filter_level_text']) { ?>
                                <h4 class="widget-title"><?php echo esc_html($settings['filter_level_text']); ?></h4>
                           <?php } ?>
                            <div class="filter-content">
                            <?php
                            foreach ($course_levels as $key => $course_level) {
                                if ($key == 'all_levels') {
                                    continue;
                                }
                            ?>
                                <label for="<?php echo esc_attr($key); ?>">
                                    <input
                                        type="checkbox"
                                        name="course_level[]"
                                        value="<?php echo esc_attr($key); ?>"
                                        id="<?php echo esc_attr($key); ?>"
                                        <?php echo in_array($key, $selected_level) ? 'checked="checked"' : ''; ?>
                                    >
                                    <span class="filter-checkbox"></span>
                                    <?php echo esc_html($course_level); ?>
                                </label>
                                <?php
                            }?>
                            </div>
                        </div>
                    <?php endif ?>
                <!--  //End level -->
            </form>
        </div>
    </div>
    <?php endif; ?>

        <div class="col order-1 order-sm-<?php echo $sidebar_position == 'right' ? 1 : 2; ?> edubin-">
          <?php if ($settings['show_filter_top']): ?>
            <div class="edubin-course-top switch-layout-container ">
            <?php if ($settings['show_filter_grid_list']): ?>
               <div class="filter__top edubin-course-switch-layout switch-layout">
                  <a href="javascript:void(0)" id="edubin_showdiv1" ><i class="fa fa-th-large"></i></a>
                  <a href="javascript:void(0)" id="edubin_showdiv2" ><i class="fa fa-list-ul"></i></a>
               </div>
            <?php endif; ?>
            <?php if ($settings['show_filter_showing_results']): ?>
               <div class="filter__top course-index">
                 <?php $count = 0;?>
                  <span><?php echo esc_html($settings['filter_showing']); ?> <?php echo esc_html( $count + $query->post_count ); ?> <?php echo esc_html($settings['filter_of']); ?> <?php echo esc_attr($query->found_posts); ?> <?php echo esc_html($settings['filter_results']); ?></span>
               </div>
            <?php endif; ?>
            <?php if ($settings['show_filter_order']): ?>
               <div class="filter__top edubin-course-order">
                   <form class="edubin-course-filter-form" method="get">
                        <select name="tutor_course_filter" class="small">
                            <option value="newest_first" <?php if (isset($_GET["tutor_course_filter"]) ? selected("newest_first", $_GET["tutor_course_filter"]) : "");?> ><?php echo esc_html($settings['filter_newly_published']); ?></option>
                            <option value="oldest_first" <?php if (isset($_GET["tutor_course_filter"]) ? selected("oldest_first", $_GET["tutor_course_filter"]) : "");?>><?php echo esc_html($settings['filter_oldest_published']); ?></option>
                            <option value="course_title_az" <?php if (isset($_GET["tutor_course_filter"]) ? selected("course_title_az", $_GET["tutor_course_filter"]) : "");?>><?php echo esc_html($settings['filter_a_to_z']); ?></option>
                            <option value="course_title_za" <?php if (isset($_GET["tutor_course_filter"]) ? selected("course_title_za", $_GET["tutor_course_filter"]) : "");?>><?php echo esc_html($settings['filter_z_to_a']); ?></option>
                        </select>
                    </form>
               </div>
            <?php endif; ?>
            <?php if ($settings['show_filter_search']): ?>
               <div class="filter__top courses-searching">
                  <form method="get" action="<?php echo esc_url($finalurl); ?>"  autocomplete="off">
                     <input type="text" name="s" placeholder="<?php echo esc_html($settings['filter_search_placeholder']); ?>" id="keyword" class="input_search form-control course-search-filter">
                     <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
               </div>
            <?php endif; ?>
            </div>
            <?php endif; ?>

      <!--  Loop course -->
        <div class="edubin-courses-wrap">
            <div class="edubin-lp-course-wrapper-<?php echo esc_attr($settings['course_style']); ?>">
                <!--Product Grid-->
                <div id="edubindiv1" class="row tpc_g_30 layout__<?php echo esc_attr($settings['course_style']); ?>">
                    <?php
                        if( $query->have_posts() ):
                        while( $query->have_posts() ): $query->the_post();
                     ?>
                    <?php require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/tutor_filter_grid.php'; ?>
                    <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
                    <?php endif; ?>
                </div>

             <!--Product List-->         
              <div id="edubindiv2" class="row tpc_g_30 layout__<?php echo esc_attr($settings['course_style']); ?>" style="display:none;">
                    <?php
                        if( $query->have_posts() ):
                        while( $query->have_posts() ): $query->the_post();
                     ?>
                    <?php require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/tutor_filter_list.php'; ?>
                    <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
                    <?php endif; ?>
              </div>

            </div>
        </div>
      <!--  //End loop course -->

      <!--   pagination -->
             <?php 
             if ($settings['pagi_on_off']) : ?>

                    <nav class="navigation pagination" role="navigation" aria-label="Posts">
                        <div class="nav-links">
                            <?php 
                                echo paginate_links( array(
                                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                    'total'        => $query->max_num_pages,
                                    'current'      => max( 1, get_query_var( 'paged' ) ),
                                    'format'       => '?paged=%#%',
                                    'show_all'     => $settings['pagi_show_all'],
                                    'type'         => 'plain',
                                    'end_size'     => $settings['pagi_end_size'],
                                    'mid_size'     => $settings['pagi_mid_size'],
                                    'prev_next'    => true,
                                    'prev_text' => '<i class="flaticon-back" aria-hidden="true"></i>',
                                    'next_text' => '<i class="flaticon-next" aria-hidden="true"></i>',
                                    'add_args'     => false,
                                    'add_fragment' => '',
                                ) );
                            ?>
                        </div> <!-- row -->  
                    </nav>
                <?php endif; //end pagination ?>
        <!--  //End pagination -->

        </div>
    </div>

    <?php

    $output = ob_get_contents();
    ob_end_clean();
    echo $output;


    }

}

