<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Edubin_Elementor_Widget_Testimonial extends Widget_Base {

    public function get_name() {
        return 'edubin-testimonial-addons';
    }
    
    public function get_title() {
        return __( 'Testimonial', 'edubin-core' );
    }
    public function get_keywords() {
        return [ 'Testimonial', 'feedback', 'client feedback'];
    }
    public function get_icon() {
        return 'edubin-icon eicon-testimonial';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function get_script_depends() {
        return [
            'slick',
            'edubin-widgets-scripts',
        ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'edubin_testimonial_content_section',
            [
                'label' => __( 'Testimonial', 'edubin-core' ),
            ]
        );

            $this->add_control(
                'testi_style',
                [
                    'label' => __( 'Style', 'edubin-core' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Style 1', 'edubin-core' ),
                        '2'   => __( 'Style 2', 'edubin-core' ),
                        '3'   => __( 'Style 3', 'edubin-core' ),
                        '4'   => __( 'Style 4', 'edubin-core' ),
                        '6'   => __( 'Style 5', 'edubin-core' ),
                    ],
                ]
            );
            $this->add_control(
                'heading',
                [
                    'label'   => __( 'Heading', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Happy Students','edubin-core'),
                    'condition' => [
                        'testi_style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'bg_image',
                [
                    'label' => __( 'Image', 'edubin-core' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'testi_style' => '2',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'bg_imagesize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'testi_style' => '2',
                    ]
                ]
            );
            $this->add_responsive_control(
                'fixed_image_size',
                [
                    'label' => __( 'Size', 'edubin-core' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'default' => [
                        'size' => '',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-2-area .edubin-testi-bg-image img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'slider_on',
                [
                    'label' => esc_html__( 'Carousel', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator'=>'before',
                ]
            );

            $repeater = new Repeater();

            $repeater->add_control(
                'client_name',
                [
                    'label'   => __( 'Name', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Johan Doe','edubin-core'),

                ]    
            );

            $repeater->add_control(
                'client_image',
                [
                    'label' => __( 'Image', 'edubin-core' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ]
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'client_imagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $repeater->add_control(
                'client_designation',
                [
                    'label'   => __( 'Designation', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Managing Director','edubin-core'),
                ]
            );

            $repeater->add_control(
                'client_say_heading',
                [
                    'label'   => __( 'Client Say Heading', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('I enjoyed the course thoroughly!','edubin-core'),
                ]
            );

            $repeater->add_control(
                'client_say',
                [
                    'label'   => __( 'Client Say', 'edubin-core' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem','edubin-core'),
                ]
            );

            $this->add_control(
                'edubin_testimonial_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                     'fields'  => $repeater->get_controls(),

                    'default' => [

                        [
                            'client_name'           => __('James Smith','edubin-core'),
                            'client_designation'    => __( 'CFO Apple Corp','edubin-core' ),
                            'client_say_heading'            => __( 'Fantastic! Great instructor!', 'edubin-core' ),
                            'client_say'            => __( 'I am grateful for your wonderful course! Your tutors are the best, and I am completely satisfied with the level of professional teaching. I recommend these courses to everyone, and wish you, guys, luck with the new studies!', 'edubin-core' ),
                        ],

                        [
                            'client_name'           => __('Monica Blews','edubin-core'),
                            'client_designation'    => __( 'Manager','edubin-core' ),
                            'client_say_heading'            => __( 'I enjoyed every lesson', 'edubin-core' ),
                            'client_say'            => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet. It is a very good course for those who are the beginner. luck with the new studies!', 'edubin-core' ),
                        ],

                        [
                            'client_name'           => __('John Dowson','edubin-core'),
                            'client_designation'    => __( 'Developer','edubin-core' ),
                            'client_say_heading'            => __( 'Fantastic! Great instructor!', 'edubin-core' ),
                            'client_say'            => __( 'I am grateful for your wonderful course! Your tutors are the best, and I am completely satisfied with the level of professional teaching. I recommend these courses to everyone, and wish you, guys, luck with the new studies!', 'edubin-core' ),
                        ],
                    ],
                    'title_field' => '{{{ client_name }}}',
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'client_image_divider_size',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
        
            $this->add_responsive_control(
                'quote_show_hide',
                [
                    'label' => esc_html__( 'Quote', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator'=>'before',
                ]
            );
        $this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'testimonial_slider_option',
            [
                'label' => esc_html__( 'Slider Option', 'edubin-core' ),
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

            $this->add_control(
                'slitems',
                [
                    'label' => esc_html__( 'Slider Items', 'edubin-core' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Slider Arrow', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
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
                        'slider_on' => 'yes',
                        'slarrows' => 'yes',
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
                        'slider_on' => 'yes',
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Slider dots', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcentermode',
                [
                    'label' => esc_html__( 'Center Mode', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcenterpadding',
                [
                    'label' => esc_html__( 'Center padding', 'edubin-core' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'default' => 50,
                    'condition' => [
                        'slider_on' => 'yes',
                        'slcentermode' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautolay',
                [
                    'label' => esc_html__( 'Slider auto play', 'edubin-core' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator' => 'before',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautoplay_speed',
                [
                    'label' => __('Autoplay speed', 'edubin-core'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3000,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'slanimation_speed',
                [
                    'label' => __('Autoplay animation speed', 'edubin-core'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300,
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_tablet',
                [
                    'label' => __( 'Tablet', 'edubin-core' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_mobile',
                [
                    'label' => __( 'Mobile Phone', 'edubin-core' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
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
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

        $this->end_controls_section(); // Slider Option end

        // Style Testimonial area tab section
        $this->start_controls_section(
            'testi_style_area',
            [
                'label' => __( 'Style', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-testi-2-area' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-testi-3 .testimonial-cont' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-testi-3 .testimonial-cont:after' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .edubin-carousel-style > .edubin-testi-single' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'edubin_testimonial_section_padding',
            [
                'label' => __( 'Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-2-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-3 .testimonial-cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-carousel-style .edubin-testi-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'edubin_testimonial_section_margin',
            [
                'label' => __( 'Margin', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-2-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-3 .testimonial-cont' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-carousel-style .edubin-testi-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'testi_heading_style_area',
            [
                'label' => __( 'Heading', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'testi_style' => '2',
                ]
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-2-area .testi-heading .heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testi_heading_padding',
            [
                'label' => __( 'Heading Padding', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-2-area .testi-heading .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' =>'before',
            ]
        );

        $this->end_controls_section();

        // Style Testimonial image style start
        $this->start_controls_section(
            'edubin_testimonial_image_style',
            [
                'label'     => __( 'Image', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'edubin_testimonial_arrow_height',
                [
                    'label' => __( 'Height', 'edubin-core' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 300,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-thum img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-carousel-style .testi-img img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'edubin_testimonial_image_border',
                    'label' => __( 'Border', 'edubin-core' ),
                    'selector' => '{{WRAPPER}} .testimonal-image img, .edubin-carousel-style .testi-img img',
                ]
            );

            $this->add_responsive_control(
                'edubin_testimonial_image_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .testimonal-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .edubin-carousel-style .testi-img img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
        $this->add_control(
            'thumb_bg_color',
            [
                'label' => __( 'Image Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-6 .edubin-testi-single .testimonial-thum .testimonial-shape::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section(); // Style Testimonial image style end

        $this->start_controls_section(
            'testi_quote_style',
            [
                'label'     => __( 'Quote', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'testi_style' => array('1','4','6'),
                ]
            ]
        );

            $this->add_control(
                'quote_icon_color',
                [
                    'label' => __( 'Icon Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-1 .edubin-testi-single .testimonial-thum .quote i' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-6 .edubin-testi-single .testimonial-cont i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'quote_bg_color',
                [
                    'label' => __( 'Background Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-1 .edubin-testi-single .testimonial-thum .quote i' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-6 .edubin-testi-single .testimonial-cont i' => 'background: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section(); // Style Testimonial image style end

        $this->start_controls_section(
            'edubin_testimonial_name_style',
            [
                'label'     => __( 'Name', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_responsive_control(
                'edubin_testimonial_name_align',
                [
                    'label' => __( 'Alignment', 'edubin-core' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'edubin-core' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'edubin-core' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'edubin-core' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .name' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .name' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-3 .name' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'testi_name_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .name' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .name' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-3 .name' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-carousel-style .name' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'edubin_testimonial_name_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_TEXT,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-testi-single .testimonial-cont .name, .edubin-testi-2 .testi-single .name, .edubin-carousel-style .name',
                ]
            );

            $this->add_responsive_control(
                'edubin_testimonial_name_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-carousel-style .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section(); // Style Testimonial name style end

        // Style Testimonial designation style start
        $this->start_controls_section(
            'edubin_testimonial_designation_style',
            [
                'label'     => __( 'Degree', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'edubin_testimonial_designation_align',
                [
                    'label' => __( 'Alignment', 'edubin-core' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'edubin-core' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'edubin-core' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'edubin-core' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .degree' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .degree' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-carousel-style .degree' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'edubin_testimonial_designation_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .degree' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .degree' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-carousel-style .degree' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'edubin_testimonial_designation_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_TEXT,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-testi-single .testimonial-cont .degree, .edubin-testi-2 .testi-single .degree, .edubin-carousel-style .degree',
                ]
            );

            $this->add_responsive_control(
                'edubin_testimonial_designation_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont .degree' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .degree' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-carousel-style .degree' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section(); // Style Testimonial designation style end


        // Style Testimonial designation style start
        $this->start_controls_section(
            'edubin_testimonial_clientsay_style',
            [
                'label'     => __( 'Client say', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'edubin_testimonial_clientsay_align',
                [
                    'label' => __( 'Alignment', 'edubin-core' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'edubin-core' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'edubin-core' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'edubin-core' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'edubin-core' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-3 .testi-heading' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont p' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .content' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .edubin-carousel-style .testi-content' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'edubin_testimonial_clientsay_color',
                [
                    'label' => __( 'Color', 'edubin-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont p' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single p' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-carousel-style .testi-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'edubin_testimonial_clientsay_typography',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_TEXT,
                    ],
                    'selector' => '{{WRAPPER}} .edubin-testi-single .testimonial-cont p, .edubin-testi-2 .testi-single p,  .edubin-carousel-style .testi-content p',
                ]
            );

            $this->add_responsive_control(
                'edubin_testimonial_clientsay_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-testi-single .testimonial-cont p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-testi-2 .testi-single .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .edubin-carousel-style .testi-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section(); // Style Testimonial designation style end


        // Style Testimonial arrow style start
        $this->start_controls_section(
            'edubin_testimonial_arrow_style',
            [
                'label'     => __( 'Arrow', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'testimonial_arrow_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'testimonial_arrow_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'edubin_testimonial_arrow_color',
                        [
                            'label' => __( 'Icon Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-testi-1 .slick-arrow' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-testi-2 .slick-prev, .edubin-testi-2 .slick-next' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow i' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'edubin_testimonial_arrow_bg_color',
                        [
                            'label' => __( 'Background Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );                    
                    $this->add_control(
                        'edubin_testimonial_arrow_border_color',
                        [
                            'label' => __( 'Border Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow' => 'border-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'edubin_testimonial_arrow_fontsize',
                        [
                            'label' => __( 'Icon Size', 'edubin-core' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 60,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-testi-1 .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .edubin-testi-2 .slick-prev, .edubin-testi-2 .slick-next' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'edubin_testimonial_arrow_width',
                        [
                            'label' => __( 'Size', 'edubin-core' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 20,
                                    'max' => 80,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 40,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-testi-1 .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .edubin-testi-2 .slick-prev, .edubin-testi-2 .slick-next' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'edubin_testimonial_arrow_border_radious',
                        [
                            'label' => __( 'Border Radius', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'box_shadow',
                            'selector' => '{{WRAPPER}} .edubin-carousel-style button.slick-arrow',
                        ]
                    );

                    $this->add_responsive_control(
                        'edubin_testimonial_arrow_padding',
                        [
                            'label' => __( 'Padding', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-testi-1 .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .edubin-testi-2 .slick-prev, .edubin-testi-2 .slick-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'testimonial_arrow_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );

                    $this->add_control(
                        'edubin_testimonial_arrow_hover_color',
                        [
                            'label' => __( 'Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-testi-1 .slick-arrow:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-testi-2 .slick-arrow:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover i' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'edubin_testimonial_arrow_bg_hover_color',
                        [
                            'label' => __( 'Background Hover Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'edubin_testimonial_arrow_border_hover_color',
                        [
                            'label' => __( 'Border Hover Color', 'edubin-core' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover' => 'border-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'hover_box_shadow',
                            'selector' => '{{WRAPPER}} .edubin-carousel-style button.slick-arrow:hover',
                        ]
                    );

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Style Testimonial arrow style end


        // Style Testimonial Dots style start
        $this->start_controls_section(
            'edubin_testimonial_dots_style',
            [
                'label'     => __( 'Dot', 'edubin-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'slider_on' => 'yes',
                    'sldots'  => 'yes',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'testimonial_dots_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'testimonial_dots_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'edubin_testimonial_dot_color',
                    [
                        'label' => __( 'Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-testi-1 .slick-dots li button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-testi-2 .slick-dots li button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-testi-3 .slick-dots li button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-carousel-style .slick-dots li button' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'testimonial_dots_style_hover_tab',
                    [
                        'label' => __( 'Active', 'edubin-core' ),
                    ]
                );
                $this->add_control(
                    'edubin_testimonial_dot_active_color',
                    [
                        'label' => __( 'Color', 'edubin-core' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .edubin-testi-1 .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-testi-2 .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-testi-3 .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .edubin-carousel-style .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->add_responsive_control(
            'dot_size',
            [
                'label' => __( 'Dot Size', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 40,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1 .slick-dots li button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-2 .slick-dots li button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_position',
            [
                'label' => __( 'Position', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1 .slick-dots' => 'bottom: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-2 .slick-dots' => 'bottom: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-3 .slick-dots' => 'bottom: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots' => 'bottom: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dot_space_between',
            [
                'label' => __( 'Space Between', 'edubin-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 40,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-testi-1 .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-testi-2 .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .edubin-carousel-style .slick-dots li' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // Style Testimonial dots style end

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $slider_settings = [
            'arrows' => ('yes' === $settings['slarrows']),
            'arrow_prev_txt' => $settings['slprevicon'],
            'arrow_next_txt' => $settings['slnexticon'],
            'dots' => ('yes' === $settings['sldots']),
            'autoplay' => ('yes' === $settings['slautolay']),
            'autoplay_speed' => absint($settings['slautoplay_speed']),
            'animation_speed' => absint($settings['slanimation_speed']),
            'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
            'center_mode' => ( 'yes' === $settings['slcentermode']),
            'center_padding' => absint($settings['slcenterpadding']),
            'testimonial_style_ck' => absint( $settings['testi_style'] ),
        ];

        $slider_responsive_settings = [
            'display_columns' => $settings['slitems'],
            'scroll_columns' => $settings['slscroll_columns'],
            'tablet_width' => $settings['sltablet_width'],
            'tablet_display_columns' => $settings['sltablet_display_columns'],
            'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
            'mobile_width' => $settings['slmobile_width'],
            'mobile_display_columns' => $settings['slmobile_display_columns'],
            'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],

        ];

        $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );


        $this->add_render_attribute( 'testimonial_area_attr', 'class', 'edubin-testi-'.$settings['testi_style'] );
        $this->add_render_attribute( 'testimonial_area_attr', 'class', 'edubin-testimonial-style-'.$settings['testi_style'] );

        if( $settings['slider_on'] == 'yes'){
            $this->add_render_attribute( 'testimonial_area_attr', 'class', 'edubin-carousel-dot-1 edubin-carousel-nav-1 edubin-testimonial-activation edubin-carousel-style' );   
            $this->add_render_attribute( 'testimonial_area_attr', 'data-settings', wp_json_encode( $slider_settings ) );   
        }

        ?>
    <?php if( $settings['testi_style'] == 1 ): ?>     
        <div <?php echo $this->get_render_attribute_string( 'testimonial_area_attr' ); ?>>
            <?php foreach ( $settings['edubin_testimonial_list'] as $testimonial ) :?>
                <div class="edubin-testi-single">
                    <div class="testimonial-thum">
                    <?php
                        if( !empty($testimonial['client_image']['url']) ){
                            echo '<div class="testimonal-image">'.Group_Control_Image_Size::get_attachment_image_html( $testimonial, 'client_imagesize', 'client_image' ).'</div>';
                        } 
                    ?>
                        <div class="quote">
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <?php
                            if( !empty($testimonial['client_say']) ){
                                echo '<p>'.esc_html__( $testimonial['client_say'], 'edubin-core' ).'</p>';
                            }
                            if( !empty($testimonial['client_name']) ){
                                echo '<h6 class="name">'.esc_html__( $testimonial['client_name'], 'edubin-core' ).'</h6>';
                            }
                            if( !empty($testimonial['client_designation']) ){
                                echo '<p class="degree">'.esc_html__( $testimonial['client_designation'], 'edubin-core' ).'</p>';
                            }
                        ?>
                    </div>
                </div> 
            <?php endforeach; ?>
        </div> <!-- End testimonial style 1 -->

        <?php elseif( $settings['testi_style'] == 2 ): ?>
            <div class="edubin-testi-2-area">
                <div class="testi-heading">
                    <?php echo '<h3 class="heading">'.esc_html__( $settings['heading'], 'edubin-core' ).'</h3>'; ?>
                </div>
                <div <?php echo $this->get_render_attribute_string( 'testimonial_area_attr' ); ?>>
                    <?php foreach ( $settings['edubin_testimonial_list'] as $testimonial ) :?>
                        <div class="testi-single">
                            <?php
                                if( !empty($testimonial['client_image']['url']) ){
                                    echo Group_Control_Image_Size::get_attachment_image_html( $testimonial, 'client_imagesize', 'client_image' );
                                } 
                            ?>
                            <?php
                                if( !empty($testimonial['client_say']) ){
                                    echo '<p class="content">'.esc_html__( $testimonial['client_say'], 'edubin-core' ).'</p>';
                                }
                                if( !empty($testimonial['client_name']) ){
                                    echo '<h6 class="name">'.esc_html__( $testimonial['client_name'], 'edubin-core' ).'</h6>';
                                }
                                if( !empty($testimonial['client_designation']) ){
                                    echo '<p class="degree">'.esc_html__( $testimonial['client_designation'], 'edubin-core' ).'</p>';
                                }
                            ?>
                        </div> <!-- single student -->
                    <?php endforeach; ?>
                </div> <!-- student slied -->
      
                <?php 
                  if( !empty($settings['bg_image']['url']) ){
                        echo '<div class="edubin-testi-bg-image">'.Group_Control_Image_Size::get_attachment_image_html( $settings, 'bg_imagesize', 'bg_image' ).'</div>';
                    }
                 ?>
            </div> <!-- End testimonial style 2 -->

        <?php elseif( $settings['testi_style'] == 3 ): ?>
            <div <?php echo $this->get_render_attribute_string( 'testimonial_area_attr' ); ?>>
                <?php foreach ( $settings['edubin_testimonial_list'] as $testimonial ) :?>
                    <div class="edubin-testi-single">
                        <div class="testimonial-cont">
                            <?php
                                if( !empty($testimonial['client_say_heading']) ){
                                    echo '<h3 class="testi-heading">'.esc_html__( $testimonial['client_say_heading'], 'edubin-core' ).'</h3>';
                                }
                                if( !empty($testimonial['client_say']) ){
                                    echo '<p>'.esc_html__( $testimonial['client_say'], 'edubin-core' ).'</p>';
                                }
                            ?>
                        </div>
                        <div class="testimonial-thum">
                        <?php
                            if( !empty($testimonial['client_image']['url']) ){
                                echo '<div class="testimonal-image">'.Group_Control_Image_Size::get_attachment_image_html( $testimonial, 'client_imagesize', 'client_image' ).'</div>';
                            } 
                        ?>
                        <div class="testi-name-degree">
                            <?php

                                if( !empty($testimonial['client_name']) ){
                                        echo '<h6 class="name">'.esc_html__( $testimonial['client_name'], 'edubin-core' ).'</h6>';
                                }
                                if( !empty($testimonial['client_designation']) ){
                                        echo '<p class="degree">'.esc_html__( $testimonial['client_designation'], 'edubin-core' ).'</p>';
                                }
                            ?>
                        </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
            </div> <!-- End testimonial style 3 -->
        <?php elseif( $settings['testi_style'] == 4 ): ?>
            <div <?php echo $this->get_render_attribute_string( 'testimonial_area_attr' ); ?>>
                <?php foreach ( $settings['edubin_testimonial_list'] as $testimonial ) :?>
                    <div class="edubin-testi-single">

                    <?php if ( $settings['quote_show_hide']) : ?>
                        <div class="testi-icon-wrap">
                            <svg 
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="61px" height="40px">
                            <path fill-rule="evenodd"  fill="<?php if ($settings['quote_bg_color']): echo $settings['quote_bg_color']; else : echo '#ffc600'; endif ?>"
                             d="M41.139,39.999 L19.860,39.999 C8.892,39.999 -0.000,31.045 -0.000,19.998 C-0.000,8.952 8.892,-0.001 19.860,-0.001 L41.139,-0.001 C52.108,-0.001 61.000,8.952 61.000,19.998 C61.000,25.702 61.000,39.999 61.000,39.999 C61.000,39.999 46.445,39.999 41.139,39.999 Z"/>
                            <path fill-rule="evenodd"  fill="<?php if ($settings['quote_icon_color']): echo $settings['quote_icon_color']; else : echo '#fff'; endif ?>"
                             d="M46.000,24.777 C46.000,28.760 42.819,32.000 38.908,32.000 C35.096,32.000 32.114,28.978 31.816,24.813 C31.308,17.720 34.819,11.932 37.980,9.129 C38.075,9.046 38.191,9.005 38.308,9.005 C38.429,9.005 38.549,9.049 38.644,9.136 C38.925,9.396 39.117,9.595 39.537,10.031 C39.858,10.364 40.317,10.840 41.059,11.596 C41.229,11.770 41.254,12.042 41.117,12.245 C39.303,14.927 39.255,16.856 39.319,17.563 C43.039,17.782 46.000,20.933 46.000,24.777 ZM40.062,12.020 C39.484,11.429 39.102,11.033 38.824,10.744 C38.595,10.507 38.440,10.346 38.304,10.210 C36.897,11.581 32.242,16.761 32.813,24.740 C33.072,28.357 35.635,30.982 38.908,30.982 C42.267,30.982 45.001,28.199 45.001,24.777 C45.001,21.354 42.267,18.570 38.908,18.570 C38.722,18.570 38.545,18.456 38.459,18.290 C38.277,17.937 37.861,15.476 40.062,12.020 ZM21.159,32.000 C17.349,32.000 14.366,28.978 14.067,24.814 L14.067,24.813 C13.560,17.721 17.071,11.932 20.232,9.130 C20.326,9.046 20.443,9.005 20.560,9.005 C20.680,9.005 20.801,9.049 20.896,9.136 C21.178,9.396 21.371,9.596 21.793,10.035 C22.114,10.367 22.572,10.843 23.311,11.596 C23.481,11.770 23.506,12.042 23.369,12.245 C21.555,14.928 21.506,16.856 21.570,17.563 C25.291,17.782 28.252,20.933 28.252,24.777 C28.252,28.760 25.070,32.000 21.159,32.000 ZM21.159,18.570 C20.974,18.570 20.796,18.456 20.710,18.290 C20.528,17.937 20.113,15.476 22.314,12.020 C21.738,11.432 21.358,11.037 21.080,10.749 C20.849,10.510 20.692,10.347 20.555,10.210 C19.149,11.581 14.493,16.762 15.064,24.740 C15.323,28.357 17.887,30.982 21.159,30.982 C24.519,30.982 27.253,28.199 27.253,24.777 C27.253,21.354 24.519,18.570 21.159,18.570 Z"/>
                            </svg>
                        </div>  
                    <?php endif; ?>

                        <div class="testi-content">
                            <?php
                                if( !empty($testimonial['client_say']) ){
                                    echo '<p>'.esc_html__( $testimonial['client_say'], 'edubin-core' ).'</p>';
                                }
                            ?>
                        </div>

                        <div class="testi-thum-degree-wrap">
                            <?php
                                if( !empty($testimonial['client_image']['url']) ){
                                    echo '<div class="testi-img">'.Group_Control_Image_Size::get_attachment_image_html( $testimonial, 'client_imagesize', 'client_image' ).'</div>';
                                } 
                            ?>
                            <div class="testi-name-degree">
                                <?php

                                    if( !empty($testimonial['client_name']) ){
                                            echo '<h6 class="name">'.esc_html__( $testimonial['client_name'], 'edubin-core' ).'</h6>';
                                    }
                                    if( !empty($testimonial['client_designation']) ){
                                            echo '<p class="degree">'.esc_html__( $testimonial['client_designation'], 'edubin-core' ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>

                    </div> 
                <?php endforeach; ?>
            </div> <!-- End testimonial style 3 -->
        <?php elseif( $settings['testi_style'] == 6 ): ?>
            <div <?php echo $this->get_render_attribute_string( 'testimonial_area_attr' ); ?>>
                <?php foreach ( $settings['edubin_testimonial_list'] as $testimonial ) :?>
                    <div class="edubin-testi-single layout-6">
                        <div class="testimonial-thum">
                            <?php
                                if( !empty($testimonial['client_image']['url']) ){
                                    echo '<div class="testimonal-image">'.Group_Control_Image_Size::get_attachment_image_html( $testimonial, 'client_imagesize', 'client_image' ).'</div>';
                                } 
                            ?>
                            <div class="testimonial-shape"></div>
                        </div>
                        <div class="testimonial-cont">
                            <i class="fas fa-quote-right"></i>
                                <?php                                
                                if( !empty($testimonial['client_say']) ){
                                    echo '<p>'.esc_html__( $testimonial['client_say'], 'edubin-core' ).'</p>';
                                } ?>
                        <div class="testi-name-degree">
                            <?php

                                if( !empty($testimonial['client_name']) ){
                                        echo '<h6 class="name">'.esc_html__( $testimonial['client_name'], 'edubin-core' ).'</h6>';
                                }
                                if( !empty($testimonial['client_designation']) ){
                                        echo '<p class="degree">'.esc_html__( $testimonial['client_designation'], 'edubin-core' ).'</p>';
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <!-- End testimonial style 3 -->
        <?php endif; ?>

        <?php
    }
}

