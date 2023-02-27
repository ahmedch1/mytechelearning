<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Sensei_Course_Carousel extends Widget_Base {

	public function get_name() {
		return 'edubin-sensei-course';
	}

	public function get_title() {
		return __('Courses (Sensei)', 'edubin-core');
	}
	public function get_keywords() {
		return [ 'sensei', 'sensei course', 'courses', 'sensei lms'];
	}
	public function get_icon() {
		return 'edubin-icon eicon-gallery-grid';
	}

	public function get_categories() {
		return ['edubin-core'];
	}

	public function get_script_depends() {
		return [
			// 'slick',
			'edubin-widgets-scripts',
		];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_sections',
			[
				'label' => __('Courses', 'edubin-core'),
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
			'carousel_on_off',
			[
				'label' => esc_html__('Carousel', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
				'separator' => 'before',
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
				'condition' => [
					'carousel_on_off!' => 'yes',
				],
			]
		);

		$this->add_control(
			'carusel_items_column',
			[
				'label' => esc_html__('Items Column', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 20,
				'step' => 1,
				'default' => 3,
				'condition' => [
					'carousel_on_off' => 'yes',
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

		$this->add_control(
			'sensei_courses_category_or_tag',
			[
				'label' => esc_html__('Choose Category or Tag', 'edubin-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sensei_courses_categories',
				'options' => [
					'sensei_courses_categories' => esc_html__('Category', 'edubin-core'),
					'sensei_courses_tag' => esc_html__('Tag', 'edubin-core'),
				],
			]
		);

		$this->add_control(
			'sensei_courses_categories',
			[
				'label' => __('Select Category', 'edubin-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => edubin_sensei_get_taxonomies(),
				'multiple' => true,
				'condition' => [
					'sensei_courses_category_or_tag!' => 'sensei_courses_tag',
				],
			]
		);
		$this->add_control(
			'sensei_courses_tag',
			[
				'label' => __('Select Tag', 'edubin-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => edubin_sensei_get_tag(),
				'multiple' => true,
				'condition' => [
					'sensei_courses_category_or_tag!' => 'sensei_courses_categories',
				],
			]
		);
		$this->add_control(
			'custom_order',
			[
				'label' => esc_html__('Custom Order', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'postorder',
			[
				'label' => esc_html__('Order', 'edubin-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('Descending', 'edubin-core'),
					'ASC' => esc_html__('Ascending', 'edubin-core'),
				],
				'condition' => [
					'custom_order!' => 'yes',
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__('Orderby', 'edubin-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'none' => esc_html__('None', 'edubin-core'),
					'ID' => esc_html__('ID', 'edubin-core'),
					'date' => esc_html__('Date', 'edubin-core'),
					'name' => esc_html__('Name', 'edubin-core'),
					'title' => esc_html__('Title', 'edubin-core'),
					'comment_count' => esc_html__('Comment count', 'edubin-core'),
					'rand' => esc_html__('Random', 'edubin-core'),
				],
				'condition' => [
					'custom_order' => 'yes',
				],
			]
		);


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

		// === Carousel setting ====
		$this->start_controls_section(
			'carousel_option',
			[
				'label' => esc_html__('Carousel Option', 'edubin-core'),
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slarrows',
			[
				'label' => esc_html__('Nav Arrow', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrow_style',
			[
				'label' => __('Nav Style', 'edubin-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __('Style 1', 'edubin-core'),
					'2' => __('Style 2', 'edubin-core'),
				],
				'condition' => [
					'slarrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'slprevicon',
			[
				'label' => __('Previous icon', 'edubin-core'),
				'type' => Controls_Manager::ICON,
				'default' => 'flaticon-back',
				'condition' => [
					'slarrows' => 'yes',
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slnexticon',
			[
				'label' => __('Next icon', 'edubin-core'),
				'type' => Controls_Manager::ICON,
				'default' => 'flaticon-next',
				'condition' => [
					'slarrows' => 'yes',
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'sldots',
			[
				'label' => esc_html__('Dots', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slpause_on_hover',
			[
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __('No', 'edubin-core'),
				'label_on' => __('Yes', 'edubin-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'label' => __('Pause on Hover?', 'edubin-core'),
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);
		$this->add_control(
			'slautolay',
			[
				'label' => esc_html__('Auto play', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'separator' => 'before',
				'default' => 'no',
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slautoplay_speed',
			[
				'label' => __('Autoplay speed', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 3000,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slanimation_speed',
			[
				'label' => __('Autoplay animation speed', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 300,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slscroll_columns',
			[
				'label' => __('Slider item to scroll', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'heading_tablet',
			[
				'label' => __('Tablet', 'edubin-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'sltablet_display_columns',
			[
				'label' => __('Slider Items', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 8,
				'step' => 1,
				'default' => 1,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'sltablet_scroll_columns',
			[
				'label' => __('Slider item to scroll', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 8,
				'step' => 1,
				'default' => 1,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'sltablet_width',
			[
				'label' => __('Tablet Resolution', 'edubin-core'),
				'description' => __('The resolution to tablet.', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 769,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'heading_mobile',
			[
				'label' => __('Mobile Phone', 'edubin-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slmobile_display_columns',
			[
				'label' => __('Slider Items', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 4,
				'step' => 1,
				'default' => 1,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slmobile_scroll_columns',
			[
				'label' => __('Slider item to scroll', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 4,
				'step' => 1,
				'default' => 1,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);

		$this->add_control(
			'slmobile_width',
			[
				'label' => __('Mobile Resolution', 'edubin-core'),
				'description' => __('The resolution to mobile.', 'edubin-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 480,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);
		$this->end_controls_section(); // Option end
		
		// === Start Course Meta Options
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
                'default' => 'yes',
            ]
        );
		$this->add_control(
			'show_lesson_text_list_item',
			[
				'label' => esc_html__( 'Lessons Text List Item', 'edubin-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
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

		$this->add_control(
			'show_price',
			[
				'label' => esc_html__('Price', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_icon_or_button',
			[
				'label' => esc_html__('Icon/Button', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'see_more_btn',
			[
				'label' => esc_html__('Button', 'edubin-core'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'text_see_more',
			[
				'label'   => __( 'Button Text', 'edubin-core' ),
				'type'    => Controls_Manager::TEXT,
				'placeholder' => __('See More','edubin-core'),
				'default' => 'See More',
				'condition' => [
					'see_more_btn' => 'yes',
				],
			]
		);    

        $this->end_controls_section(); // Option End

		// ==== Course style
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
        			'{{WRAPPER}} .sensei-loop-course-container' => 'text-align: {{VALUE}};',
        			'{{WRAPPER}} .edubin-sensei-course .sensei-courses-wrap.style-2 .sensei-course-col .sensei-course' => 'text-align: {{VALUE}};',
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
        		'selector' => '{{WRAPPER}} .edubin-sensei-course .slick-slide, .edubin-sensei-course .sensei-courses-wrap.style-2 .sensei-course-col .sensei-course, .edubin-course',
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
			'selector' => '{{WRAPPER}} .sensei-loop-course-container:hover, .edubin-sensei-course .sensei-courses-wrap.style-2 .sensei-course-col .sensei-course:hover, .edubin-course:hover',
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
					'{{WRAPPER}} .sensei-loop-course-container' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .edubin-sensei-course .sensei-courses-wrap.style-2 .sensei-course-col .sensei-course' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .course__content' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'course_title_color',
			[
				'label' => __('Title Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sensei-loop-course-container' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .edubin-sensei-course .sensei-courses-wrap.style-2 .sensei-course-col .sensei-course' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .course__content' => 'background-color: {{VALUE}}',
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
				'default' => '',
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
					'{{WRAPPER}} .edubin-course .course__title a' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .edubin-course .course__title a',
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __('Padding', 'edubin-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .edubin-course .course__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .edubin-course .course__title' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .edubin-course .course__title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab(); // Hover Tab end

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Style content excerpt
		$this->start_controls_section(
			'course_excerpt_style_section',
			[
				'label' => __('Excerpt', 'edubin-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'excerpt_color',
			[
				'label' => __('Excerpt Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-course .course__excerpt' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .edubin-course .course__excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Style Meta tab section
		$this->start_controls_section(
			'post_meta_style_section',
			[
				'label' => __('Meta', 'edubin-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'meta_icon_color',
			[
				'label' => __('Icon Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-course .course__content--meta i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .edubin-course .course__content--meta span' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .edubin-course .author__name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'course_cat_typography',
				'label' => __('Category Typography', 'edubin-core'),
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .edubin-course .course__categories a',
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_name_typography',
				'label' => __('Author Typography', 'edubin-core'),
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .edubin-course .author__name, .edubin-course .author__name a',
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
					'{{WRAPPER}} .edubin-course .author__name' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .edubin-course .author__name a:hover' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .edubin-course .course__content--meta .price',
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __('Price Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-course .course__content--meta .price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __('Button Typography', 'edubin-core'),
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .edubin-course .course__content--meta .price.see__more a',
			]
		);

		$this->start_controls_tabs('btn_style_tabs');

		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __('Normal', 'edubin-core'),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => __('Button text Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-course .course__content--meta .price.see__more a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab(); // Normal Tab end

        $this->start_controls_tab(
        	'btn_style_hover_tab',
        	[
        		'label' => __('Hover', 'edubin-core'),
        	]
        );
        $this->add_control(
        	'btn_hover_color',
        	[
        		'label' => __('Button Text Hover Color', 'edubin-core'),
        		'type' => Controls_Manager::COLOR,
        		'default' => '',
        		'selectors' => [
        			'{{WRAPPER}} .edubin-course .course__content--meta .price.see__more a:hover' => 'color: {{VALUE}}',
        		],
        	]
        );

        $this->end_controls_tab(); // Hover Tab end

        $this->end_controls_tabs();

        $this->end_controls_section();

		// ==== Arrow Style =====
        $this->start_controls_section(
        	'course_arrow_style',
        	[
        		'label' => __('Arrow', 'edubin-core'),
        		'tab' => Controls_Manager::TAB_STYLE,
        		'condition' => [
        			'slarrows' => 'yes',
        			'carousel_on_off' => 'yes',
        		],

        	]
        );

        $this->start_controls_tabs('course_arrow_style_tabs');

		// Normal tab Start
        $this->start_controls_tab(
        	'course_arrow_style_normal_tab',
        	[
        		'label' => __('Normal', 'edubin-core'),
        	]
        );

        $this->add_control(
        	'arrow_color',
        	[
        		'label' => __('Icon Color', 'edubin-core'),
        		'type' => Controls_Manager::COLOR,
        		'default' => '',
        		'selectors' => [
        			'{{WRAPPER}} .edubin-carousel-activation button.slick-arrow' => 'color: {{VALUE}};',
        			'{{WRAPPER}} .edubin-sensei-course.edubin-nav-button-2 .edubin-carousel-activation button.slick-arrow' => 'color: {{VALUE}};',
        		],
        	]
        );
        $this->add_responsive_control(
        	'arrow_position',
        	[
        		'label' => __('Position', 'edubin-core'),
        		'type' => Controls_Manager::SLIDER,
        		'size_units' => ['px'],
        		'range' => [
        			'px' => [
        				'min' => 0,
        				'max' => 200,
        				'step' => 1,
        			],
        		],
        		'selectors' => [
        			'{{WRAPPER}} .edubin-sensei-course.edubin-nav-button-1 .edubin-carousel-activation button.slick-arrow' => 'top: -{{SIZE}}{{UNIT}};',
        		],
        	]
        );
        $this->add_control(
        	'arrow_bg_color',
        	[
        		'label' => __('Background', 'edubin-core'),
        		'type' => Controls_Manager::COLOR,
        		'default' => '',
        		'selectors' => [
        			'{{WRAPPER}} .edubin-carousel-activation button.slick-arrow' => 'background-color: {{VALUE}};',
        		],
        	]
        );
        $this->add_group_control(
        	Group_Control_Border::get_type(),
        	[
        		'name' => 'course_arrow_border',
        		'label' => __('Border', 'edubin-core'),
        		'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow',
        	]
        );

        $this->add_responsive_control(
        	'course_border_radius',
        	[
        		'label' => esc_html__('Border Radius', 'edubin-core'),
        		'type' => Controls_Manager::DIMENSIONS,
        		'selectors' => [
        			'{{WRAPPER}} .edubin-carousel-activation button.slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
        		],
        	]
        );

		$this->end_controls_tab(); // Normal tab end

		// Hover tab Start
		$this->start_controls_tab(
			'course_arrow_style_hover_tab',
			[
				'label' => __('Hover', 'edubin-core'),
			]
		);

		$this->add_control(
			'slider_arrow_hover_color',
			[
				'label' => __('Color', 'edubin-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'slider_arrow_hover_background',
				'label' => __('Background', 'edubin-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'slider_arrow_hover_border',
				'label' => __('Border', 'edubin-core'),
				'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover',
			]
		);

		$this->add_responsive_control(
			'slider_arrow_hover_border_radius',
			[
				'label' => esc_html__('Border Radius', 'edubin-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->end_controls_tab(); // Hover tab end

		$this->end_controls_tabs();

		$this->end_controls_section(); // Style arrow style end

		// Style Dot section
		$this->start_controls_section(
			'course_dot_style_section',
			[
				'label' => __('Dot', 'edubin-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_on_off' => 'yes',
				],
			]
		);
		$this->add_control(
			'dot_color',
			[
				'label' => __( 'Dot Color', 'edubin-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation .slick-dots li button' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .edubin-carousel-activation .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'dot_size',
			[
				'label' => __('Dot Size', 'edubin-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation .slick-dots li button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dot_position',
			[
				'label' => __('Position', 'edubin-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation .slick-dots li' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dot_space_between',
			[
				'label' => __('Space Between', 'edubin-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .edubin-carousel-activation .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();

		$custom_order_ck = $this->get_settings_for_display('custom_order');
		$orderby = $this->get_settings_for_display('orderby');
		$postorder = $this->get_settings_for_display('postorder');

     	if (function_exists('sensei')) : // Check sensei lms active


		// Course Column
        $this->add_render_attribute('edubin_posts_column', 'class', 'col-xs-' . '12' . ' col-sm-' . '6' . ' col-md-' . '6' . ' col-lg-' . $settings['posts_column'] );

		// Button style
     	$this->add_render_attribute('edubin_carousel_btn_style', ['class' => 'edubin__courses__addon edubin-sensei-course edubin-nav-button-' . $settings['nav_arrow_style']]);
     	$course_layout = 'layout__'.$settings['course_style'];
		// Carusel options
     	$this->add_render_attribute('edubin_course_carousel_attr', 'class', ($settings['carousel_on_off'] ? 'edubin-carousel-activation '. "$course_layout" : 'row'));

     	$slider_settings = [
     		'arrows' => ('yes' === $settings['slarrows']),
     		'arrow_prev_txt' => $settings['slprevicon'],
     		'arrow_next_txt' => $settings['slnexticon'],
     		'dots' => ('yes' === $settings['sldots']),
     		'autoplay' => ('yes' === $settings['slautolay']),
     		'autoplay_speed' => absint($settings['slautoplay_speed']),
     		'animation_speed' => absint($settings['slanimation_speed']),
     		'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
     	];

     	$slider_responsive_settings = [
     		'display_columns' => $settings['carusel_items_column'],
     		'scroll_columns' => $settings['slscroll_columns'],
     		'tablet_width' => $settings['sltablet_width'],
     		'tablet_display_columns' => $settings['sltablet_display_columns'],
     		'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
     		'mobile_width' => $settings['slmobile_width'],
     		'mobile_display_columns' => $settings['slmobile_display_columns'],
     		'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],

     	];

     	$slider_settings = array_merge($slider_settings, $slider_responsive_settings);

     	$this->add_render_attribute('edubin_course_carousel_attr', 'data-settings', wp_json_encode($slider_settings));

     	if ($settings['sensei_courses_category_or_tag'] == 'sensei_courses_categories') {

     		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			// Query
     		$args_cat = array(
     			'post_type' => 'course',
     			'post_status' => 'publish',
     			'ignore_sticky_posts' => 1,
     			'paged'          => $paged,
     			'posts_per_page' => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
     			'order' => $postorder,
     		);

			// Custom Order
     		if ($custom_order_ck == 'yes') {
     			$args_cat['orderby'] = $orderby;
     		}

     	} elseif ($settings['sensei_courses_category_or_tag'] == 'sensei_courses_tag') {

     		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			// Query
     		$args_tag = array(
     			'post_type' => 'course',
     			'post_status' => 'publish',
     			'paged'       => $paged,
     			'ignore_sticky_posts' => 1,
     			'posts_per_page' => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
     			'order' => $postorder,
     		);

			// Custom Order
     		if ($custom_order_ck == 'yes') {
     			$args_tag['orderby'] = $orderby;
     		}
     	}

     	if (!empty($settings['sensei_courses_categories'])) {
     		$get_categories = $settings['sensei_courses_categories'];
     	} else {
     		$get_categories = $settings['sensei_courses_categories'];
     	}

     	$carousel_cats = str_replace(' ', '', $get_categories);

     	if (!empty($get_categories)) {
     		if (is_array($carousel_cats) && count($carousel_cats) > 0) {
     			$field_name = is_numeric($carousel_cats[0]) ? 'term_id' : 'slug';

     			$args_cat['tax_query'] = array(
     				array(
     					'taxonomy' => 'course-category',
     					'terms' => $carousel_cats,
     					'field' => $field_name,
     					'include_children' => false,
     				),
     			);
     		}
     	}

     	if (!empty($settings['sensei_courses_tag'])) {
     		$get_tag = $settings['sensei_courses_tag'];
     	} else {
     		$get_tag = $settings['sensei_courses_tag'];
     	}

     	$carousel_tag = str_replace(' ', '', $get_tag);

     	if (!empty($get_categories)) {
     		if (is_array($carousel_tag) && count($carousel_tag) > 0) {
     			$field_name = is_numeric($carousel_tag[0]) ? 'term_id' : 'slug';

     			$args_tag['tax_query'] = array(
     				array(
     					'taxonomy' => 'course-tag',
     					'terms' => $carousel_tag,
     					'field' => $field_name,
     					'include_children' => false,
     				),
     			);
     		}
     	}

     	if ($settings['sensei_courses_category_or_tag'] == 'sensei_courses_categories') {

     		$cat_tag_args = $args_cat;

     	} elseif ($settings['sensei_courses_category_or_tag'] == 'sensei_courses_tag') {
     		$cat_tag_args = $args_tag;
     	}

     	$carousel_post = new \WP_Query($cat_tag_args);

     	?>
     	<div <?php echo $this->get_render_attribute_string('edubin_carousel_btn_style'); ?>>

     		<?php if ($settings['carousel_on_off'] == 'yes'): ?>
     			<div <?php echo $this->get_render_attribute_string('edubin_course_carousel_attr'); ?>>
     			<?php else : ?>
     				<div class="row tpc_g_30 layout__<?php echo esc_attr($settings['course_style']); ?>">
     				<?php endif;?>

     				<?php
     				if ($carousel_post->have_posts()):
     					while ($carousel_post->have_posts()): $carousel_post->the_post();
     						?>

     						<?php if (!$settings['carousel_on_off'] == 'yes'): ?>
     							<div <?php echo $this->get_render_attribute_string('edubin_posts_column'); ?> >
     								<div class="edubin-sensei-courses-column-area">
     								<?php endif;?>

     								<?php if ($settings['carousel_on_off'] == 'yes'): ?>
     									<div class="edubin-sensei-course-loop">
     									<?php endif;?>

							            <?php if ($settings['course_style'] == '1') : 
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_1.php'; 
							                    elseif ($settings['course_style'] == '2') : 
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_2.php';
							                    elseif ($settings['course_style'] == '3') :
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_3.php';
							                    elseif ($settings['course_style'] == '4') :
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_4.php';
							                    elseif ($settings['course_style'] == '5') :
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_5.php';
							                    elseif ($settings['course_style'] == '6') :
							                        require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/sensei/layout_6.php';
							                endif; ?>

     									<?php if ($settings['carousel_on_off'] == 'yes'): ?>
     									</div>
     								<?php endif;?>


     								<?php if (!$settings['carousel_on_off'] == 'yes'): ?>
     								</div>
     							</div>
     						<?php endif;?>

     					<?php endwhile;
     					wp_reset_postdata();
     					wp_reset_query();


     					if ($settings['pagi_on_off']) : ?>

     						<nav class="navigation pagination" role="navigation" aria-label="Posts">
     							<div class="nav-links">
     								<?php 
     								echo paginate_links( array(
     									'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
     									'total'        => $carousel_post->max_num_pages,
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
     				<?php	endif; 
     			endif;
     			?>

     		</div>
     	</div>


     	<?php

     }

 }
