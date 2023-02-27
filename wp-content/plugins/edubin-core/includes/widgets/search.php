<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

use Elementor\Core\Schemes\Color as Scheme_Color;
use Elementor\Core\Schemes\Typography as Scheme_Typography;

class Edubin_Elementor_Widget_Search extends Widget_Base {

	public function get_name() {
		return 'edubin-search';
	}

	public function get_title() {
		return __('Search', 'edubin-core');
	}
    public function get_keywords() {
        return [ 'Search', 'find', 'course search', 'site search'];
    }
	public function get_icon() {
		return 'edubin-icon eicon-search';
	}
	public function get_categories() {
		return ['edubin-core'];
	}
    protected function register_controls() {

        $this->start_controls_section(
            'search_content',
            [
                'label' => __( 'Search', 'edubin-core' ),
            ]
        );
        
            $this->add_control(
                'search_style',
                [
                    'label' => __( 'Style', 'edubin-core' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Style 1', 'edubin-core' ),
                        '2'   => __( 'Style 2', 'edubin-core' ),
                        '3'   => __( 'Style 3', 'edubin-core' ),
                    ],
                ]
            );
            $this->add_control(
                'search_type',
                [
                    'label'   => __('Search Type', 'edubin-core'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'tpc_wp_search',
                    'options' => [
                        'tpc_wp_search'    => __('WordPress Search', 'edubin-core'),
                        'tpc_tutor_search' => __('Tutor Search', 'edubin-core'),
                        'tpc_lp_search'    => __('LearnPress Search', 'edubin-core'),
                        'tpc_ld_search'    => __('LearnDash Search', 'edubin-core'),
                    ],
                ]
            );
            $this->add_control(
                'inpur_placeholder',
                [
                    'label' => __( 'Placeholder Text', 'edubin-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Search', 'edubin-core' ),
                    'placeholder' => __( 'Search', 'edubin-core' ),
                ]
            );

            $this->add_control(
                'search_btn_icon_type',
                [
                    'label' => esc_html__('Button Icon Type','edubin-core'),
                    'type' =>Controls_Manager::CHOOSE,
                    'options' =>[
                        'buttontext' =>[
                            'title' =>__('Text','edubin-core'),
                            'icon' =>'fa fa-font',
                        ],
                        'icon' =>[
                            'title' =>__('Icon','edubin-core'),
                            'icon' =>'fa fa-info',
                        ]
                    ],
                    'default' =>'icon',

                ]
            );

            $this->add_control(
                'search_button_text',
                [
                    'label' => __( 'Search Button Text', 'edubin-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Search', 'edubin-core' ),
                    'placeholder' => __( 'Search', 'edubin-core' ),
                    'condition' => [
                        'search_btn_icon_type' => 'buttontext',
                    ]
                ]
            );


        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'edubin_search_style_section',
            [
                'label' => __( 'Style', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_responsive_control(
                'search_style_align',
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
                        '{{WRAPPER}} .edubin-search-box-wrap' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'center',
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'search_section_margin',
                [
                    'label' => __( 'Margin', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'search_section_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'edubin_search_style_input',
            [
                'label' => __( 'Input', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_control(
                'search_input_text_color',
                [
                    'label'     => __( 'Text Color', 'edubin-core' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input'   => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'search_input_placeholder_color',
                [
                    'label'     => __( 'Placeholder Color', 'edubin-core' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input[type*="text"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-search-box-wrap input[type*="text"]::-moz-placeholder'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .edubin-search-box-wrap input[type*="text"]:-ms-input-placeholder'  => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'search_input_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .edubin-search-box-wrap input',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'edubin-core' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .edubin-search-box-wrap input',
                ]
            );

            $this->add_responsive_control(
                'search_input_margin',
                [
                    'label' => __( 'Margin', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'search_input_padding',
                [
                    'label' => __( 'Padding', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'search_input_height',
                [
                    'label' => __( 'Height', 'edubin-core' ),
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
                    'default' => [
                        'unit' => 'px',
                        'size' => 45,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );
            $this->add_responsive_control(
                'search_input_width',
                [
                    'label' => __( 'Width', 'edubin-core' ),
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
                        '{{WRAPPER}} .edubin-search-box-wrap input' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'search_input_border',
                    'label' => __( 'Border', 'edubin-core' ),
                    'selector' => '{{WRAPPER}} .edubin-search-box-wrap input',
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'search_input_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .edubin-search-box-wrap input' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'edubin_search_style_submit_button',
            [
                'label' => __( 'Submit Button', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            // Button Tabs Start
            $this->start_controls_tabs('search_style_submit_tabs');

                // Start Normal Submit button tab
                $this->start_controls_tab(
                    'search_style_submit_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );
                    
                    $this->add_control(
                        'search_submitbutton_text_color',
                        [
                            'label'     => __( 'Color', 'edubin-core' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'search_submitbutton_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .edubin-search-box-wrap input',
                            'condition' => [
                                'search_btn_icon_type' => 'buttontext',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'search_submitbutton_background',
                            'label' => __( 'Background', 'edubin-core' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .edubin-search-box-wrap button.btn-search',
                        ]
                    );

                    $this->add_responsive_control(
                        'search_submitbutton_margin',
                        [
                            'label' => __( 'Margin', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'search_submitbutton_padding',
                        [
                            'label' => __( 'Padding', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'search_submitbutton_height',
                        [
                            'label' => __( 'Height', 'edubin-core' ),
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
                            'default' => [
                                'unit' => 'px',
                                'size' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'search_submitbutton_border',
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-search-box-wrap button.btn-search',
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'search_submitbutton_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal submit Button tab end

                // Start Hover Submit button tab
                $this->start_controls_tab(
                    'search_style_submit_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                    
                    $this->add_control(
                        'search_submitbutton_hover_text_color',
                        [
                            'label'     => __( 'Color', 'edubin-core' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search:hover'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'search_submitbutton_hover_background',
                            'label' => __( 'Background', 'edubin-core' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .edubin-search-box-wrap button.btn-search:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'search_submitbutton_hover_border',
                            'label' => __( 'Border', 'edubin-core' ),
                            'selector' => '{{WRAPPER}} .edubin-search-box-wrap button.btn-search:hover',
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'search_submitbutton_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'edubin-core' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap button.btn-search:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Hover Submit Button tab End

            $this->end_controls_tabs(); // Button Tabs End

        $this->end_controls_section();

        $this->start_controls_section(
            'edubin_search_style_icon',
            [
                'label' => __( 'Search Icon', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            // Button Tabs Start
            $this->start_controls_tabs('search_style_icon_tabs');

                // Start Normal Submit button tab
                $this->start_controls_tab(
                    'search_style_icon_normal_tab',
                    [
                        'label' => __( 'Normal', 'edubin-core' ),
                    ]
                );
                    
                    $this->add_control(
                        'search_style_icon_color',
                        [
                            'label'     => __( 'Color', 'edubin-core' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap .top-search i'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal submit Button tab end

                // Start Hover Submit button tab
                $this->start_controls_tab(
                    'search_style_icon_hover_tab',
                    [
                        'label' => __( 'Hover', 'edubin-core' ),
                    ]
                );
                    
                    $this->add_control(
                        'search_style_icon_text_color',
                        [
                            'label'     => __( 'Color', 'edubin-core' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .edubin-search-box-wrap .top-search i:hover'   => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Hover Submit Button tab End

            $this->end_controls_tabs(); // Button Tabs End

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $this->add_render_attribute( 'edubin_search_attr', 'class', 'edubin-search-box-wrap' );
        $this->add_render_attribute( 'edubin_search_attr', 'class', 'edubin-search-sty-wraple-'.$settings['search_style'] );

        $this->add_render_attribute(
            'input_attr', [
                'placeholder' => $settings['inpur_placeholder'],
                'type' => 'text',
                'name' => 's',
                'title' => esc_html__( 'Search', 'edubin-core' ),
                'value' => get_search_query(),
            ]
        );
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'edubin_search_attr' ); ?> >
                <form action="<?php if ($settings['search_type'] == 'tpc_wp_search'): ?><?php echo esc_url( home_url( '/' ) ); ?><?php elseif ($settings['search_type'] == 'tpc_tutor_search'): ?><?php echo esc_url(get_post_type_archive_link('courses')); ?><?php elseif ($settings['search_type'] == 'tpc_lp_search'): ?><?php echo esc_url(get_post_type_archive_link('lp_course')); ?><?php elseif ($settings['search_type'] == 'tpc_ld_search'): ?><?php echo esc_url(get_post_type_archive_link('sfwd-courses')); ?><?php endif; ?>" method="get" role="search">

                    <?php
                        if ( $settings['search_style'] == '3' ) {
               
                        }     

                        if ( $settings['search_style'] == '2' ) {
                            ?>
                                
                            <div class="top-search"><a href="javascript:void(0)" id="search"><i class="flaticon-zoom"></i></a>
                                </div>
                            <div class="edubin-search-box">
                                <div class="edubin-search-form">
                                    <div class="edubin-closebtn">
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <form action="<?php if ($settings['search_type'] == 'tpc_wp_search'): ?><?php echo esc_url( home_url( '/' ) ); ?><?php elseif ($settings['search_type'] == 'tpc_tutor_search'): ?><?php echo esc_url(get_post_type_archive_link('courses')); ?><?php elseif ($settings['search_type'] == 'tpc_lp_search'): ?><?php echo esc_url(get_post_type_archive_link('lp_course')); ?><?php elseif ($settings['search_type'] == 'tpc_ld_search'): ?><?php echo esc_url(get_post_type_archive_link('sfwd-courses')); ?><?php endif; ?>" method="get">
                                        <input placeholder="<?php esc_attr_e( 'Search Here..', 'edubin' ) ?>" type="text" name="s" id="popup-search" value="<?php the_search_query(); ?>" />
                                        <button><i class="flaticon-zoom"></i></button>
                                    </form>
                                </div> 
                            </div>

                            <?php
                        }

                        else{
                            echo '<input '.$this->get_render_attribute_string( 'input_attr' ).' >';

                                if( $settings['search_btn_icon_type'] == 'icon' ) { ?>
                                    <button type="submit" class="btn-search search-trigger"><i class="flaticon-zoom"></i> <?php echo $settings['search_button_text']; ?></button>
                                <?php
                                    }else{
                                echo sprintf( '<button type="submit" class="htb-btn btn-search">%1$s</button>', $settings['search_button_text'] );
                            }
                        }
                    ?>

                </form>
            </div>


        <?php
    }

}

