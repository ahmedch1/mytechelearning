<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Slider_Pro extends Widget_Base {

    public function get_name() {
        return 'edubin-slider-pro';
    }
    
    public function get_title() {
        return __( 'Edubin Basic Slider ', 'edubin-core' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-slider-push';
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
            'section_content',
            [
                'label' => __('Slides', 'edubin-core'),
            ]
        );
        $repeater = new Repeater();

        //======================================================================
        // Slider Background
        //======================================================================
        $repeater->start_controls_tabs('reperter_tabs_bg_title_content');

        //======================================================================
        // Slider background repeater
        //======================================================================

        $repeater->start_controls_tab('slider_backgroud_tab', ['label' => __('Background', 'edubin-core')]);

        $repeater->add_control(
            'background_image',
            [
                'label'   => __('Choose Image', 'edubin-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'background_size',
            [
                'label' => _x( 'Size', 'Background Control', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => _x( 'Cover', 'Background Control', 'edubin-core' ),
                    'contain' => _x( 'Contain', 'Background Control', 'edubin-core' ),
                    'auto' => _x( 'Auto', 'Background Control', 'edubin-core' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-bg' => 'background-size: {{VALUE}}',
                ],
                // 'conditions' => [
                //     'terms' => [
                //         [
                //             'name' => 'background_image[url]',
                //             'operator' => '!=',
                //             'value' => '',
                //         ],
                //     ],
                // ],
            ]
        );

        $repeater->add_control(
            'background_position',
            [
                'label' => _x( 'Size', 'Background Position', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'left top' => _x( 'left top', 'Background Position', 'edubin-core' ),
                    'left center' => _x( 'left center', 'Background Position', 'edubin-core' ),
                    'left bottom' => _x( 'left bottom', 'Background Position', 'edubin-core' ),
                    'right top' => _x( 'right top', 'Background Position', 'edubin-core' ),
                    'right center' => _x( 'right center', 'Background Position', 'edubin-core' ),
                    'right bottom' => _x( 'right bottom', 'Background Position', 'edubin-core' ),
                    'center top' => _x( 'center top', 'Background Position', 'edubin-core' ),
                    'center center' => _x( 'center center', 'Background Position', 'edubin-core' ),
                    'center bottom' => _x( 'center bottom', 'Background Position', 'edubin-core' ),
                    'initial' => _x( 'initial', 'Background Position', 'edubin-core' ),
                    'inherit' => _x( 'inherit', 'Background Position', 'edubin-core' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .edubin-slider-background-image' => 'background-size: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'background_ken_burns',
            [
                'label' => __( 'Ken Burns Effect', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                // 'conditions' => [
                //     'terms' => [
                //         [
                //             'name' => 'background_image[url]',
                //             'operator' => '!=',
                //             'value' => '',
                //         ],
                //     ],
                // ],
            ]
        );

        $repeater->add_control(
            'zoom_direction',
            [
                'label' => __( 'Zoom Direction', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'in',
                'options' => [
                    'in' => __( 'In', 'edubin-core' ),
                    'out' => __( 'Out', 'edubin-core' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_ken_burns',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'background_overlay',
            [
                'label' => __( 'Background Overlay', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                // 'conditions' => [
                //     'terms' => [
                //         [
                //             'name' => 'background_image[url]',
                //             'operator' => '!=',
                //             'value' => '',
                //         ],
                //     ],
                // ],
            ]
        );

        $repeater->add_control(
            'background_overlay_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_overlay',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );


        $repeater->end_controls_tab();

//======================================================================
        // Slider tab content
        //======================================================================

        $repeater->start_controls_tab('slider_content_tab', ['label' => __('Content', 'edubin-core')]);

        $repeater->add_responsive_control(
            'content_align',
            [
                'label'   => __('Content Alignment', 'edubin-core'),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'left',
                'options' => [
                    'left'   => [
                        'title' => __('Left', 'edubin-core'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'edubin-core'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'edubin-core'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => __('Slider Title', 'edubin-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('<span>Choose the right</span><br> Theme for education', 'edubin-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label'     => __('Title Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
            ]
        );
        $repeater->add_control(
            'slider_content',
            [
                'label'     => __('Description', 'edubin-core'),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __("Lorem dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard dummy text.", 'edubin-core'),
            ]
        );

        $repeater->add_control(
            'slider_content_color',
            [
                'label'     => __('Content Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
            ]
        );

        $repeater->end_controls_tab();

        //======================================================================
        // Slider tab button
        //======================================================================
        $repeater->start_controls_tab('slider_button_tab', ['label' => __('Button', 'edubin-core')]);

        //======================================================================
        // Slider btn tab one
        //======================================================================

        $repeater->add_control(
            'btn_one_enable',
            [
                'label'        => __('Button Left', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'label_on'     => __('Show', 'edubin-core'),
                'label_off'    => __('Hide', 'edubin-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->add_control(
            'btn_text',
            [
                'label'       => __('Button Left Text', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Contact Us', 'edubin-core'),
                'placeholder' => __('Contact Us', 'edubin-core'),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'       => __('Button Left Link', 'edubin-core'),
                'type'        => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'edubin-core'),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        //======================================================================
        // Slider btn two tab
        //======================================================================
        $repeater->add_control(
            'btn_two_enable',
            [
                'label'        => __('Button Right', 'edubin-core'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => '',
                'label_on'     => __('Show', 'edubin-core'),
                'label_off'    => __('Hide', 'edubin-core'),
                'return_value' => 'yes',
            ]
        );

        $repeater->add_control(
            'btn_text_two',
            [
                'label'       => __('Button Right Text', 'edubin-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Get Started', 'edubin-core'),
                'placeholder' => __('Get Started', 'edubin-core'),
            ]
        );

        $repeater->add_control(
            'link_two',
            [
                'label'       => __('Button Right Link', 'edubin-core'),
                'type'        => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'edubin-core'),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->end_controls_tabs();

        $this->add_control(
            'slider_option',
            [
                'label'       => __('Slider Options', 'edubin-core'),
                'type'        => Controls_Manager::REPEATER,
                'show_label'  => true,
                'default'     => [
                    [
                        'title'             => __('<span>Choose the right</span><br> Theme for education', 'edubin-core'),
                        'slider_content'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget fringilla erat. Morbi tempor diam a est cursus eleifend. Integer odio nisi, porta ac dui vel, elementum aliquet massa.',
                        'slider_image'      => '',
                        'btn-text'          => 'Read More',
                        'btn-link'          => '#',
                        'title_animation'   => 'fadeInLeft',
                        'content_animation' => 'fadeInLeft',
                        'btn_animation'     => 'fadeInLeft',

                    ],
                ],
                'fields'  => $repeater->get_controls(),
                'title_field' => '{{{title}}}',
            ]
        );

        $this->end_controls_section();

        //======================================================================
        // Slider Title
        //======================================================================

        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Title Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption h2.edubin-slider-title',
            ]
        );
        $this->add_responsive_control(
            'title_spacing',
            [
                'label'     => __('Title Spacing Left/Right', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 0,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-right .edubin-slider-title' => 'padding-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-left .edubin-slider-title' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_spacing_center',
            [
                'label'     => __('Content Spacing Center Align', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 20,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-center .edubin-slider-title' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_content_spacing',
            [
                'label'     => __('Title Content Spacing', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption h2.edubin-slider-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_span_typography',
                'label'    => __('Span Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption h2.edubin-slider-title span',
            ]
        );

        $this->end_controls_section();

        //======================================================================
        // Slider Content Style
        //======================================================================

        $this->start_controls_section(
            'content_style',
            [
                'label' => __('Content', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __('Content Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-content',
            ]
        );
        $this->add_responsive_control(
            'content_spacing',
            [
                'label'     => __('Content Spacing Left/Right Align', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 20,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-left .edubin-slider-content' => 'padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-right .edubin-slider-content' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_spacing_ccenter',
            [
                'label'     => __('Content Spacing Center Align', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 20,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption.text-center .edubin-slider-content' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_button_spacing',
            [
                'label'     => __('Content Button Spacing', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-content ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //======================================================================
        // Slider Global Options
        //======================================================================

        $this->start_controls_section(
            'section_option',
            [
                'label' => __('Slide Options', 'edubin-core'),
                //'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_height_position',
            [
                'label' => __( 'Custom Height & Position', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'slider_height',
            [
                'label' => __( 'Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default screen 100vh', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ 'px', 'vh', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-item' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'caption_position',
            [
                'label'       => __('Content Position', 'edubin-core'),
                'type'        => Controls_Manager::SLIDER,
                'description' => __('Blank value for center position', 'edubin-core'),
                'range'       => [
                    'px' => [
                        'min' => 0,
                        'max' => 900,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_animation',
            [
                'label' => __( 'Speed & Animation', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'slider_interval',
            [
                'label'   => __('Slider Speed', 'edubin-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => '18000',
            ]
        );

        $this->add_control(
            'animation_effect',
            [
                'label'     => __('Animation Effect', 'edubin-core'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'inherit',
                'options'   => [
                    'inherit'   => __('Slide', 'edubin-core'),
                    'carousel-fade' => __('Fade', 'edubin-core'),
                    'zoomef'    => __('Slide & Zoom', 'edubin-core'),
                    'carousel-fade zoomef'    => __('Slide & Fade', 'edubin-core'),
                ],
            ]
        );
        $this->add_control(
            'heading_nav_arrow',
            [
                'label' => __( 'Nav & Arrow', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'nav_enable',
            [
                'label'   => __('Nav', 'edubin-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'enable'  => __('Enable', 'edubin-core'),
                'disable' => __('Disable', 'edubin-core'),
            ]
        );

        $this->add_control(
            'nav_style',
            [
                'label'     => __( 'Nav Style', 'edubin-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'style5',
                'options'   => [
                    'style1'   => __( 'Style 1', 'edubin-core' ),
                    'style2'   => __( 'Style 2', 'edubin-core' ),
                    'style3'   => __( 'Style 3', 'edubin-core' ),
                    'style4'   => __( 'Style 4', 'edubin-core' ),
                    'style5'   => __( 'Style 5', 'edubin-core' ),
                ],
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label'     => __('Icon Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
            ]
        );
        $this->add_control(
            'heading_dot',
            [
                'label' => __( 'Dot Options', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'dot_enable',
            [
                'label'   => __('Dot', 'edubin-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on'     => __('Show', 'edubin-core'),
                'label_off'    => __('Hide', 'edubin-core'),
                'return_value' => 'no'
            ]
        );
        $this->add_control(
            'dot_position',
            [
                'label'     => __('Dot Position', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-indicators' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //======================================================================
        // Button style one
        //======================================================================
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Button Left', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color_one',
            [
                'label'     => __('Border Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label'     => __('Border Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label'      => __('Border Radius', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->add_control(
            'space_btween_button',
            [
                'label'     => __('Button Space Between', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.left-btn' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //======================================================================
        // Button Style two
        //======================================================================
        $this->start_controls_section(
            'section_style_two',
            [
                'label' => __('Button Right', 'edubin-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'typography_two',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                ],
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn',
            ]
        );

        $this->start_controls_tabs('tabs_button_style_two');

        $this->start_controls_tab(
            'tab_button_normal_two',
            [
                'label' => __('Normal', 'edubin-core'),
            ]
        );

        $this->add_control(
            'button_text_color_two',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_two',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover_two',
            [
                'label' => __('Hover', 'edubin-core'),
            ]
        );

        $this->add_control(
            'hover_color_two',
            [
                'label'     => __('Text Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color_two',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color_two',
            [
                'label'     => __('Border Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border_two',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn',
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'border_radius_two',
            [
                'label'      => __('Border Radius', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_two',
                'selector' => '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding_two',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} #edubin-slider .carousel-caption .edubin-slider-btn .rep-btn.right-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->end_controls_section();

    } // End options

    protected function render( $instance = [] ) {

    $settings = $this->get_settings(); ?>

    <div class="edubin-slider-pro carousel slide <?php echo $settings['animation_effect']; ?>" data-ride="carousel" data-interval="<?php echo $settings['slider_interval']; ?>" id="edubin-slider">
        <div class="carousel-inner" role="listbox">
              <?php $i = 0;?>
                <?php foreach ($settings['slider_option'] as $slider): ?>
                <?php $active = $i == 0 ? 'active' : '';?>

                  <div class="carousel-item <?php echo $active; ?>">
    
                      <div class="edubin-slider-background-image" style="background-image: url(<?php echo $slider['background_image']['url']; ?>); background-size: <?php echo $slider['background_size']; ?>; background-position: <?php echo $slider['background_position']; ?>; "></div>

                        <?php $slider_overlay = $slider['background_overlay_color']; ?>
                      <div class="edubin-slider-background-overlay" <?php if ($slider_overlay): ?> style="background-color:<?php echo $slider_overlay; ?>"<?php endif;?>></div>

                              <div class="carousel-caption text-<?php echo $slider['content_align']; ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slider-conent-area">
                                              <?php if ($slider['title']): ?>
                                                <h2 class="edubin-slider-title animated fadeInLeft" style="animation-delay: 0.3s; animation-duration: 1.2s; <?php if ($slider['title_color']): ?> color:<?php echo $slider['title_color']; ?><?php endif;?>">
                                                    <?php echo $slider['title']; ?>
                                                </h2>
                                            <?php endif;?>
                                            <?php if ($slider['slider_content']): ?>
                                              <?php $content_color = $slider['slider_content_color']; ?>
                                                <div class="edubin-slider-content animated fadeInLeft" style="animation-delay: 0.4s; animation-duration: 1.1s; <?php if ($content_color): ?>color:<?php echo $content_color; ?>;<?php endif;?>">
                                                  <?php echo $slider['slider_content']; ?>
                                                </div>
                                            <?php endif;?>

                                            <div class="edubin-slider-btn">

                                                <?php if ($slider['btn_one_enable']): ?>
                                                    <div class="slider-btn-left animated fadeInUp" style="animation-delay: 0.3s; animation-duration: 1.2s;">
                                                        <a href="<?php echo $slider['link']['url']; ?>" <?php if($slider['link']["is_external"] == 'on'): ?> target="_blank"<?php endif; ?> class="rep-btn left-btn"><?php echo $slider['btn_text']; ?></a>
                                                    </div>
                                                <?php endif;?>

                                                <?php if ($slider['btn_two_enable']): ?>
                                                   <div class="slider-btn-right animated fadeInUp" style="animation-delay: 0.4s; animation-duration: 1.2s;">
                                                        <a href="<?php echo $slider['link_two']['url']; ?>" <?php if($slider['link_two']["is_external"] == 'on'): ?> target="_blank"<?php endif; ?> class="rep-btn right-btn"><?php echo $slider['btn_text_two']; ?></a>
                                                   </div>
                                                <?php endif;?>
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                  </div>
              <?php $i++;endforeach;?>
        </div>

          <?php if ($settings['nav_enable'] == 'yes' && $settings['nav_style'] == 'style5'): ?>
          <div class="edubin-slider-nav-<?php echo $settings['nav_style']; ?> <?php if (!$settings['nav_enable_mobile'] == 'yes'): echo 'nav-mobile-none';endif;?>">
                 <a class="edubin-nav carousel-control-prev " href="#edubin-slider" role="button" data-slide="prev">
                   <i class="flaticon-back"></i>
                  </a>
                  <a class="edubin-nav carousel-control-next" href="#edubin-slider" role="button" data-slide="next">
                    <i class="flaticon-next"></i>
                  </a>
            </div>
          <?php elseif($settings['nav_enable'] == 'yes') : ?>
            <div class="edubin-slider-nav-<?php echo $settings['nav_style']; ?> <?php if (!$settings['nav_enable_mobile'] == 'yes'): echo 'nav-mobile-none';endif;?>">
                <a class="edubin-prev" href="#edubin-slider" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon">
                    <?php if ($settings['nav_style'] == 'style4'): ?>
                      <i class="flaticon-back"></i>
                   <?php else: ?>
                      <i class="flaticon-back"></i>
                   <?php endif;?>
                  </span>

                </a>
                  <a class="edubin-next" href="#edubin-slider" role="button" data-slide="next">
                  <span class="carousel-control-prev-icon">
                    <?php if ($settings['nav_style'] == 'style4'): ?>
                      <i class="flaticon-next"></i>
                   <?php else: ?>
                      <i class="flaticon-next"></i>
                   <?php endif;?>
                  </span>
                  </a>
            </div>
      <?php endif;?>

      <!-- Dot -->
      <?php if ($settings['dot_enable']): ?>
          <ol class="carousel-indicators">
          <?php $i = 0;?>
            <?php foreach ($settings['slider_option'] as $slider): ?>
            <?php $active = $i == 0 ? 'active' : '';?>
              <li data-target="#edubin-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
          <?php $i++;endforeach;?>
          </ol>
        <?php endif;?>
    </div>

<?php

    }

}

