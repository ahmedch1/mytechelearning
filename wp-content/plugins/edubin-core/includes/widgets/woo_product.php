<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Woo_Product extends Widget_Base {

    public function get_name() {
        return 'edubin-woo-product-addons';
    }
    
    public function get_title() {
        return __( 'Woo Product', 'edubin-core' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-products';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
            // 'slick',
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'woo_products_section',
            [
                'label' => __( 'Products', 'edubin-core' ),
            ]
        );
        $this->add_control(
            'posts_column',
            [
                'label' => __('Items Column', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '3' => __('4 Column', 'edubin-core'),
                    '4' => __('3 Column', 'edubin-core'),
                ],
                'condition'=>[
                    'carousel_on_off!'=> 'yes',
                ]
            ]
        );

        $this->add_control(
            'carusel_items_column',
            [
                'label' => esc_html__( 'Items Column', 'edubin-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 3,
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );
        $this->add_control(
            'post_limit',
            [
                'label' => __('Number of Product', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'custom_order',
            [
                'label' => esc_html__( 'Custom Order', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC'  => esc_html__('Descending','edubin-core'),
                    'ASC'   => esc_html__('Ascending','edubin-core'),
                ],
                'condition' => [
                    'custom_order!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Orderby', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'none'          => esc_html__('None','edubin-core'),
                    'ID'            => esc_html__('ID','edubin-core'),
                    'date'          => esc_html__('Date','edubin-core'),
                    'name'          => esc_html__('Name','edubin-core'),
                    'title'         => esc_html__('Title','edubin-core'),
                    'comment_count' => esc_html__('Comment count','edubin-core'),
                    'rand'          => esc_html__('Random','edubin-core'),
                ],
                'condition' => [
                    'custom_order' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'woo_shop_category',
            [
                'label' => __('Select Category', 'edubin-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => edubin_wooocommerce_shop_get_taxonomies(),
                'multiple' => true,
            ]
        );

        $this->add_control(
            'carousel_on_off',
            [
                'label' => esc_html__( 'Carousel', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
                'separator'=>'before',
            ]
        );
        $this->add_control(
            'title_length',
            [
                'label' => __( 'Title Length', 'edubin-core' ),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 5,
                'separator'=>'before',
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
        $this->end_controls_section();

        // Carousel setting
        $this->start_controls_section(
            'carousel_option',
            [
                'label' => esc_html__( 'Carousel Option', 'edubin-core' ),
                 'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'slarrows',
            [
                'label' => esc_html__( 'Nav Arrow', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                 'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'nav_arrow_style',
            [
                'label' => __( 'Nav Style', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => __( 'Style 1', 'edubin-core' ),
                    '2'   => __( 'Style 2', 'edubin-core' ),
                ],
                'condition' => [
                     'slarrows'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'slprevicon',
            [
                'label' => __( 'Previous icon', 'edubin-core' ),
                'type' => Controls_Manager::ICON,
                'default' => 'flaticon-back',
                'condition' => [
                    'slarrows' => 'yes',
                     'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'slnexticon',
            [
                'label' => __( 'Next icon', 'edubin-core' ),
                'type' => Controls_Manager::ICON,
                'default' => 'flaticon-next',
                'condition' => [
                    'slarrows' => 'yes',
                     'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'sldots',
            [
                'label' => esc_html__( 'Dots', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
                 'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );
        $this->add_control(
            'slautolay',
            [
                'label' => esc_html__( 'Auto play', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'no',
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'slautoplay_speed',
            [
                'label' => __('Autoplay speed', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );


        $this->add_control(
            'slanimation_speed',
            [
                'label' => __('Autoplay animation speed', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 300,
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => __( 'Tablet', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'sltablet_width',
            [
                'label' => __('Tablet Resolution', 'edubin-core'),
                'description' => __('The resolution to tablet.', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 786,
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'heading_mobile',
            [
                'label' => __( 'Mobile Phone', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
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
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->add_control(
            'slmobile_width',
            [
                'label' => __('Mobile Resolution', 'edubin-core'),
                'description' => __('The resolution to mobile.', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
                'condition'=>[
                    'carousel_on_off'=>'yes',
                ]
            ]
        );

        $this->end_controls_section(); // Option end

        // Style Title tab section
        $this->start_controls_section(
            'lp_course_title_style_section',
            [
                'label' => __( 'Title', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'show_review'=>'yes',
                ]
            ]
        );
            
            $this->start_controls_tabs('title_style_tabs');

                $this->start_controls_tab(
                    'title_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'title_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-single-course .course-content .course-title a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'label' => __( 'Typography', 'edubin-core' ),
                            'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                            ],
                            'selector' => '{{WRAPPER}} .edubin-single-course .course-content .course-title a',
                        ]
                    );

                    $this->add_responsive_control(
                        'title_padding',
                        [
                            'label' => __( 'Padding', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-single-course .course-content .course-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'title_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'title_hover_color',
                    [
                        'label' => __( 'Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-single-course .course-content .course-title a:hover' => 'color: {{VALUE}}',
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
                'label' => __( 'Meta', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'meta_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-course .course-bottom .admin ul li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .course-bottom .admin ul li i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .course-bottom .admin ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .course-bottom .admin ul li a span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .course-content span.enroll-users' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __( 'Price Typography', 'edubin-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-1 span, .edubin-single-course .thum .edubin-course-price-2 span, .edubin-single-course .thum .edubin-course-price-3 span',
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-1 span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-2 span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-3 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'price_bg_color',
            [
                'label' => __( 'Price Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-1 span' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-2 span' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .thum .edubin-course-price-3 span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_typography',
                'label' => __( 'Review Typography', 'edubin-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
                'selector' => '{{WRAPPER}} .edubin-single-course .course-content span.course-reviews',
            ]
        );
        $this->add_control(
            'review_color',
            [
                'label' => __( 'Review Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-course .star-rating span:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .edubin-single-course .star-rating:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


        // Style Slider arrow style start
        $this->start_controls_section(
            'lp_course_arrow_style',
            [
                'label'     => __( 'Arrow', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'slarrows'  => 'yes',
                ],
            ]
        );
        
            $this->start_controls_tabs( 'lp_course_arrow_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'lp_course_arrow_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'arrow_color',
                        [
                            'label' => __( 'Icon Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-lp-courses-addons.edubin-nav-button-2 .edubin-carousel-activation button.slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'arrow_position',
                        [
                            'label' => __( 'Position', 'edubin-core' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 1,
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-lp-courses-addons.edubin-nav-button-1 .edubin-carousel-activation button.slick-arrow' => 'top: -{{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'arrow_bg_color',
                        [
                            'label' => __( 'Background', 'edubin-core' ),
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
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow',
                        ]
                    );

                    $this->add_responsive_control(
                        'course_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'lp_course_arrow_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'slider_arrow_hover_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
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
                            'label' => __( 'Background', 'edubin-core' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_arrow_hover_border',
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-carousel-activation button.slick-arrow:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_arrow_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'edubin-core' ),
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
                'label' => __( 'Dot', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'dot_size',
            [
                'label' => __( 'Dot Size', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-activation .slick-dots li button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_position',
            [
                'label' => __( 'Position', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'label' => __( 'Space Between', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-carousel-activation .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Course body style
        $this->start_controls_section(
            'course_layout_style_section',
            [
                'label' => __( 'Layout', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs('body_box_tabs');

                $this->start_controls_tab(
                    'body_box_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'box_shadow',
                        'selector' => '{{WRAPPER}} .edubin-single-course',
                    ]
                );

                $this->end_controls_tab(); // Normal Tab end

                $this->start_controls_tab(
                    'body_box_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [   'label' => __( 'Box Shadow Hover', 'edubin-core' ),
                        'name' => 'box_shadow_hover',
                        'selector' => '{{WRAPPER}} .edubin-single-course:hover',
                    ]
                );

                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();
            
         $this->add_control(
            'course_bg_color',
            [
                'label' => __( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .edubin-single-course .course-content' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $custom_order_ck    = $this->get_settings_for_display('custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order          = $this->get_settings_for_display('order');
        $post_limit          = $this->get_settings_for_display('post_limit');

        // Course Column
        $this->add_render_attribute( 'edubin_posts_column', 'class', 'products columns-'.$settings['posts_column'] );
        // Button style
        $this->add_render_attribute( 'edubin_carousel_btn_style', [ 'class' => 'edubin-lp-courses-addons edubin-nav-button-'.$settings['nav_arrow_style'] ] );
        // Carusel options
        $this->add_render_attribute( 'edubin_course_carousel_attr', 'class',  ($settings['carousel_on_off'] ? 'edubin-carousel-activation' : 'row tpc_g_30') );

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

            $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );
            $this->add_render_attribute( 'edubin_course_carousel_attr', 'data-settings', wp_json_encode( $slider_settings ) );
       
        // Query
        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $post_limit,
            'order'                 => $order
        );

        // Custom Order
        if( $custom_order_ck == 'yes' ){
            $args['orderby']    = $orderby;
        }
        if( !empty($settings['woo_shop_category']) ){
            $get_categories = $settings['woo_shop_category'];
        }else{
           $get_categories = $settings['woo_shop_category'];
        }

            $tribe_events_cats = str_replace(' ', '', $get_categories);

            if (  !empty( $get_categories ) ) {
                if( is_array($tribe_events_cats) && count($tribe_events_cats) > 0 ){
                    $field_name = is_numeric( $tribe_events_cats[0] ) ? 'term_id' : 'slug';
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'terms' => $tribe_events_cats,
                            'field' => $field_name,
                            'include_children' => false
                        )
                );
             }
        }

        $query = new \WP_Query( $args ); ?>
        <div class="woocommerce woocommerce-addons-wrapper">
            <div <?php echo $this->get_render_attribute_string( 'edubin_carousel_btn_style' ); ?>>

            <?php if($settings['carousel_on_off'] == 'yes' ): ?>
                <ul class="products columns-4">
            <div <?php echo $this->get_render_attribute_string( 'edubin_course_carousel_attr' ); ?>>
            <?php else : ?>
                <ul <?php echo $this->get_render_attribute_string( 'edubin_posts_column' ); ?> >
            <?php endif; ?>
                    <?php
                        if( $query->have_posts() ):
                        while( $query->have_posts() ): $query->the_post();
                        global $product;
                    ?>
                    <li class="product">

                        <?php if (has_post_thumbnail()): ?>
                          <div class="overlay"></div>
                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php the_permalink(); ?>">
                               <?php the_post_thumbnail($settings['image_size']);?>
                            </a>
                        <?php endif ?>

                        <div class="edubin-cart-button-list">
                        
                               <?php woocommerce_template_loop_add_to_cart(); ?>

                            <a class="edubin-cart-link" href="<?php the_permalink();?>">
                                <i class="flaticon-zoom"></i>
                            </a>
                        </div>

                        <a href="<?php the_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">

                            <h2 class="woocommerce-loop-product__title"><?php echo get_the_title();?></h2>

                        </a>
                           <?php woocommerce_template_loop_rating(); ?>

                            <span class="price"><?php woocommerce_template_loop_price();?></span>

                    </li>
                    <?php endwhile; wp_reset_postdata(); wp_reset_query(); endif; ?>
            <?php if(!$settings['carousel_on_off'] == 'yes' ): ?>
                </ul>

            <?php else : ?>
            </div>
                </ul>
            <?php endif; ?>

            </div>
        </div>

        <?php

    }



}

