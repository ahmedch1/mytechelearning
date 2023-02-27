<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Edubin_Slider extends Widget_Base {

    public function get_name() {
        return 'edubin-slider-addons';
    }
    
    public function get_title() {
        return __( 'Edubin Advanced Slider', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'slider', 'edubin slider', 'custom slider'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-post-slider';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
             'owl',
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
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'slider_image_size',
                'default'   => 'full',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'background_size',
            [
                'label' => _x( 'Background Size', 'Background Control', 'edubin-core' ),
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
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'background_position',
            [
                'label' => _x( 'Position', 'Background Position', 'edubin-core' ),
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
            'background_overlay',
            [
                'label' => __( 'Background Overlay', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
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
                'default'     => __('Choose the right <br> Theme for education', 'edubin-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'header_tag',
            [
                'label' => __( 'Slider Title HTML Tag', 'edubin-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h1',
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
                'label'     => __('Description Color', 'edubin-core'),
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
                        'title'             => __('Choose the right <br> Theme for education', 'edubin-core'),
                        'slider_content'    => "Lorem dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard dummy text.",
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
        // Height & Spacing
        //======================================================================

        $this->start_controls_section(
            'height_space_section',
            [
                'label' => __('Spacing', 'edubin-core'),
            ]
        );
        $this->add_control(
            'slider_height_section',
            [
                'label' => __( 'Height & Position', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_responsive_control(
            'slider_height',
            [
                'label' => __( 'Height', 'edubin-core' ),
                'description' => __('Keep blank value for the default full screen 100vh', 'edubin-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                ],
                'size_units' => [ 'vh','px', ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider, .edubin-slider .slide' => 'height: {{SIZE}}{{UNIT}};',
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
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .edubin-slider .content-box' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_right_space',
            [
                'label'       => __('Left/Right Space', 'edubin-core'),
                'type'        => Controls_Manager::SLIDER,
                'description' => __('It will be work for title, contest and button all sections', 'edubin-core'),
                'range'       => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .edubin-slider .content-box' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_position_section',
            [
                'label' => __( 'Title Spacing', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_responsive_control(
            'title_spacing',
            [
                'label'     => __('Spacing Left/Right', 'edubin-core'),
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
                    '{{WRAPPER}} .edubin-slider .content-box.text-left .slider-title' => 'padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-slider .content-box.text-right .slider-title' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_spacing_center',
            [
                'label'     => __('Content Spacing for Center Align', 'edubin-core'),
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
                    '{{WRAPPER}} .edubin-slider .content-box.text-center .slider-title' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_content_spacing',
            [
                'label'     => __('Content Spacing', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .slider-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_spacing_section',
            [
                'label' => __( 'Content Spacing', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_responsive_control(
            'content_spacing',
            [
                'label'     => __('Content Spacing Left/Right Align', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 570,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box.text-left .edubin-slider-content' => 'padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-slider .content-box.text-right .edubin-slider-content' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_spacing_ccenter',
            [
                'label'     => __('Content Spacing for Center Align', 'edubin-core'),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 200,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box.text-center .edubin-slider-content' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-content ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
         $this->end_controls_section();

        //======================================================================
        // Global Options
        //======================================================================

        $this->start_controls_section(
            'section_global_option',
            [
                'label' => __('Global Options', 'edubin-core'),
               // 'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'speed_animation_section',
            [
                'label' => __( 'Speed & Animation', 'edubin-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'slautolay',
            [
                'label' => esc_html__( 'Auto Play', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slarrows',
            [
                'label' => esc_html__( 'Nav Arrow', 'edubin-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slautoplay_speed',
            [
                'label' => __('Autoplay speed', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 12000,
            ]
        );


        $this->add_control(
            'slanimation_speed',
            [
                'label' => __('Autoplay animation speed', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 12000,
            ]
        );
        $this->add_control(
            'slpause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'edubin-core'),
                'label_on' => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Pause on Hover', 'edubin-core'),
            ]
        );
        $this->add_control(
            'slmouse_drag',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'edubin-core'),
                'label_on' => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Mouse Drag', 'edubin-core'),
            ]
        );
        $this->add_control(
            'sltouch_drag',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'edubin-core'),
                'label_on' => __('Yes', 'edubin-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Touch Drag', 'edubin-core'),
            ]
        );

        $this->add_control(
            'global_bg_section',
            [
                'label' => __( 'Slider Gradient Overlay', 'edubin-core' ),
                'description' => __('Using this option individual overlay will be override', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        //Gradient          
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_a',
                'label' => __( 'Gradient Overlay', 'edubin-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .edubin-slider-background-overlay',
            ]
        );
        
         $this->end_controls_section();

        //======================================================================
        // Slider Title Style
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
                'label'    => __('Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .slider-title',
            ]
        );
        $this->add_control(
            'title_span_color',
            [
                'label'     => __('Span Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .slider-title span' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_span_typography',
                'label'    => __('Span Typography', 'edubin-core'),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .slider-title span',
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
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-content',
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
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn:hover' => 'border-color: {{VALUE}};',
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
                'selector'    => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.left-btn' => 'margin-right: {{SIZE}}{{UNIT}};',
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
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_two',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color_two',
            [
                'label'     => __('Background Color', 'edubin-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn:hover' => 'border-color: {{VALUE}};',
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
                'selector'    => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn',
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
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_two',
                'selector' => '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn',
            ]
        );

        $this->add_responsive_control(
            'text_padding_two',
            [
                'label'      => __('Padding', 'edubin-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .edubin-slider .content-box .edubin-slider-btn .rep-btn.right-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->end_controls_section();

        // ==== Nav button ===

        $this->start_controls_section(
            'section_nav_style',
            [
                'label' => __('Nav Arrow', 'edubin-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs('nav_style_tabs');

                $this->start_controls_tab(
                    'nav_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'nav_icon_color',
                        [
                            'label' => __( 'Icon', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev span, .edubin-slider .owl-nav .owl-next span' => 'color: {{VALUE}};',
                            ],
                        ]
                    );                    $this->add_control(
                        'nav_border_color',
                        [
                            'label' => __( 'Border', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev, .edubin-slider .owl-nav .owl-next' => 'border: 2px solid {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'nav_bg_color',
                        [
                            'label'     => __('Background', 'edubin-core'),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-slider .owl-nav .owl-next' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'nav_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'nav_icon_hover_color',
                    [
                        'label' => __( 'Icon', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev:hover span, .edubin-slider .owl-nav .owl-next:hover span' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'nav_border_hover_color',
                    [
                        'label' => __( 'Border', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev:hover, .edubin-slider .owl-nav .owl-next:hover' => 'border: 2px solid {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'nav_bg_hover_color',
                    [
                        'label'     => __('Background', 'edubin-core'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .edubin-slider .owl-nav .owl-prev:hover' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-slider .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->end_controls_tab(); // Hover Tab end

            $this->end_controls_tabs();
    
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        // $custom_order_ck    = $this->get_settings_for_display('custom_order');
        // $orderby            = $this->get_settings_for_display('orderby');
        // $postorder          = $this->get_settings_for_display('postorder');


        // Carusel options
        $this->add_render_attribute( 'edubin_course_carousel_attr', 'class', 'edubin-slider-carousel owl-carousel owl-theme' );

            $slider_settings = [
                'arrows' => ('yes' === $settings['slarrows']),
                'autoplay' => ('yes' === $settings['slautolay']),
                'autoplay_speed' => absint($settings['slautoplay_speed']),
                'animation_speed' => absint($settings['slanimation_speed']),
                'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
                'mouse_drag' => ('yes' === $settings['slmouse_drag']),
                'touch_drag' => ('yes' === $settings['sltouch_drag']),
            ];

            $slider_settings = array_merge( $slider_settings );

            $this->add_render_attribute( 'edubin_course_carousel_attr', 'data-settings', wp_json_encode( $slider_settings ) );

        ?>

               
    <div class="edubin-slider">
        <div <?php echo $this->get_render_attribute_string( 'edubin_course_carousel_attr' ); ?>>
        <?php $i = 0;?>
            <?php foreach ($settings['slider_option'] as $slider): ?>
            <?php $active = $i == 0 ? 'active' : '';

            // image url with image size
            $image_src = wp_get_attachment_image_src( $slider['background_image']['id'], $slider['slider_image_size_size'] );

            ?>
            <div class="slide" style="background-image: url(<?php echo esc_url($image_src[0]); ?>); background-size: <?php echo $slider['background_size']; ?>; background-position: <?php echo $slider['background_position']; ?>; ">

                <?php $slider_overlay = $slider['background_overlay_color']; ?>
                  <div class="edubin-slider-background-overlay" <?php if ($slider_overlay): ?> style="background-color:<?php echo $slider_overlay; ?>"<?php endif;?>></div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                            <div class="content-box text-<?php echo $slider['content_align']; ?>">
                                <<?php echo esc_attr( $slider['header_tag'] ); ?> class="slider-title" style="<?php if ($slider['title_color']): ?> color:<?php echo $slider['title_color']; ?><?php endif;?>"> <?php echo $slider['title']; ?></<?php echo esc_attr( $slider['header_tag'] ); ?>>
                                <div class="edubin-slider-content" style="<?php if ($slider['slider_content_color']): ?> color:<?php echo $slider['slider_content_color']; ?><?php endif;?>"><?php echo $slider['slider_content']; ?></div>

                                <div class="button-box edubin-slider-btn">

                                    <?php if ($slider['btn_one_enable']): ?>
                                        <div class="slider-btn-left">
                                            <a href="<?php echo $slider['link']['url']; ?>" <?php if($slider['link']["is_external"] == 'on'): ?> target="_blank"<?php endif; ?> class="rep-btn left-btn"><?php echo $slider['btn_text']; ?></a>
                                        </div>
                                    <?php endif;?>

                                    <?php if ($slider['btn_two_enable']): ?>
                                       <div class="slider-btn-right">
                                            <a href="<?php echo $slider['link_two']['url']; ?>" <?php if($slider['link_two']["is_external"] == 'on'): ?> target="_blank"<?php endif; ?> class="rep-btn right-btn"><?php echo $slider['btn_text_two']; ?></a>
                                       </div>
                                    <?php endif;?>
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php $i++;endforeach;?>

        </div>
    </div>



<?php

    }

}

