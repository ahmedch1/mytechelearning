<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use eCademy_Bootstrap_Navwalker;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Navbar extends Widget_Base {

    public function get_name() {
        return 'ecademy-navbar';
    }

    public function get_title() {
        return __( 'Navbar', 'ecademy-toolkit' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_keywords() {
        return [ 'Menu', 'Navigation' ];
    }

    public function get_categories() {
        return [ 'ecademy-elements' ];
    }

    protected function register_controls() {

        // Menu
        $this->start_controls_section(
            'menu_settings',
            [
                'label' => __( 'Menu', 'ecademy-toolkit' ),
            ]
        );

            $this->add_control(
                'menu', [
                    'label' => __( 'Menu', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => ecademy_get_menu_array()
                ]
            );
            $this->add_control(
				'navbar_bg',
				[
					'label' => esc_html__( 'Navbar Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar-area, .ecademy-nav .navbar .navbar-nav .nav-item:hover .dropdown-menu' => 'background-color: {{VALUE}} !important',
					],
				]
            );

            $this->add_control(
				'sticky_navbar_bg',
				[
					'label' => esc_html__( 'Sticky Navbar Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .navbar-area.is-sticky, .navbar-area.is-sticky .ecademy-nav .navbar .navbar-nav .nav-item:hover .dropdown-menu' => 'background-color: {{VALUE}} !important',
					],
				]
            );

            $this->add_control(
                'sec_padding', [
                    'label' => __( 'Navbar Padding', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',

                    ],
                ]
            );

        $this->end_controls_section();


        // Logo settings
        $this->start_controls_section(
            'section_logo',
            [
                'label' => __( 'Logo', 'ecademy-toolkit' ),
            ]
        );

            $this->add_control(
                'main_logo',
                [
                    'label' => __( 'Main Logo', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'logomax_width',
                [
                    'label' => __( 'Max Width', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'rem' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-brand img' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Mobile Logo
        $this->start_controls_section(
            'section_mobile_logo',
            [
                'label' => __( 'Mobile Logo', 'ecademy-toolkit' ),
            ]
        );

            $this->add_control(
                'mobile_logo',
                [
                    'label' => __( 'Main Logo', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'mobile_logomax_width',
                [
                    'label' => __( 'Max Width', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'rem' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ecademy-responsive-menu>.logo>a>img' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Layout Settings
        $this->start_controls_section(
            'layout_settings',
            [
                'label' => __( 'Layout Settings', 'ecademy-toolkit' ),
            ]
        );

            $this->add_control(
                'nav_box_layout', [
                    'label' => __( 'Navbar box layout', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'container-fluid',
                    'options' => [
                        'container' => esc_html__( 'Wide', 'ecademy-toolkit' ),
                        'container-fluid' => esc_html__( 'Full Width', 'ecademy-toolkit' ),
                    ]
                ]
            );

            $this->add_control(
                'menu_alignment', [
                    'label' => __( 'Menu Alignment', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'right',
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'ecademy-toolkit' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'ecademy-toolkit' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'ecademy-toolkit' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ]
                ]
            );

        $this->end_controls_section();

        // Navbar Settings
        $this->start_controls_section(
            'navbar_settings',
            [
                'label' => __( 'Navbar Settings', 'ecademy-toolkit' ),
            ]
        );
            $this->add_control(
                'is_sticky',
                [
                    'label' => __( 'Sticky', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'ecademy-toolkit' ),
                    'label_off' => __( 'No', 'ecademy-toolkit' ),
                    'return_value' => 'yes',
                    'default' => 'yes'
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Menu Item Typography', 'ecademy-toolkit' ),
                    'name' => 'typography_menu_item',
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ecademy-nav .navbar .navbar-nav .nav-item a',
                ]
            );
            $this->add_control(
				'menu_item_color',
				[
					'label' => esc_html__( 'Menu Item Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .navbar-nav .nav-item a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a, .ecademy-nav .others-option .cart-btn a, .others-option-for-responsive .option-inner .others-option .cart-btn a' => 'color: {{VALUE}} !important',
					],
				]
            );
            $this->add_control(
				'menu_item_hover_color',
				[
					'label' => esc_html__( 'Menu Item Active/Hover Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .navbar-nav .nav-item a:hover, .ecademy-nav .navbar .navbar-nav .nav-item a:focus, .ecademy-nav .navbar .navbar-nav .nav-item a.active, .ecademy-nav .navbar .navbar-nav .nav-item:hover a, .ecademy-nav .navbar .navbar-nav .nav-item.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li.active a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li.active a, .ecademy-nav .others-option .cart-btn a:hover' => 'color: {{VALUE}} !important',
						'{{WRAPPER}} .ecademy-nav .others-option .cart-btn a span, .others-option-for-responsive .option-inner .others-option .cart-btn a span' => 'background-color: {{VALUE}} !important',
					],
				]
            );

            $this->add_control(
				'dropdown_menu_border_color',
				[
					'label' => esc_html__( 'Dropdown Menu Border Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu' => 'border-color: {{VALUE}} !important',
					],
				]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Mobile Menu Item Typography', 'ecademy-toolkit' ),
                    'name' => 'typography_mobile_menu_item',
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a',
                ]
            );
            $this->add_control(
				'mobile_menu_item_color',
				[
					'label' => esc_html__( 'Mobile Menu Item Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a' => 'color: {{VALUE}} !important',
					],
				]
            );
            $this->add_control(
				'mobile_menu_item_hover_color',
				[
					'label' => esc_html__( 'Mobile Menu Item Active/Hover Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mean-container .mean-nav ul li a:hover, .mean-container .mean-nav ul li li a:hover, .ecademy-responsive-nav .mean-container a.meanmenu-reveal' => 'color: {{VALUE}} !important',
						'{{WRAPPER}} .ecademy-responsive-nav .mean-container a.meanmenu-reveal span' => 'background: {{VALUE}} !important',
						'{{WRAPPER}} .others-option-for-responsive .dot-menu .inner .circle' => 'background-color: {{VALUE}} !important',
					],
				]
            );

        $this->end_controls_section();

        // Addisonian Settings
        $this->start_controls_section(
            'navbar_optional_settings',
            [
                'label' => __( 'Search and Cart Settings', 'ecademy-toolkit' ),
            ]
        );
            $this->add_control(
                'is_cart',
                [
                    'label' => __( 'Enable Cart Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'             => __( 'Yes', 'ecademy-toolkit' ),
                        '2'            => __( 'NO', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'is_search',
                [
                    'label' => __( 'Enable Search Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'             => __( 'Yes', 'ecademy-toolkit' ),
                        '2'            => __( 'NO', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_control(
                'search_placeholder',
                [
                    'label' => __( 'Search Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Search for anything', 'ecademy-toolkit' ),
                    'condition' => [
                        'is_search' => '1',
                    ],
                ]
            );

            $this->add_control(
				'bg_placeholder',
				[
					'label' => esc_html__( 'Search Placeholder Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .search-box .input-search, .others-option-for-responsive .option-inner .search-box .input-search' => 'background-color: {{VALUE}}',
					],
                    'condition' => [
                        'is_search' => '1',
                    ],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Search Placeholder Typography', 'ecademy-toolkit' ),
                    'name' => 'typography_placeholder',
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ecademy-nav .navbar .search-box .input-search, .others-option-for-responsive .option-inner .search-box .input-search',
                    'condition' => [
                        'is_search' => '1',
                    ],
                ]
            );
            $this->add_control(
				'color_placeholder',
				[
					'label' => esc_html__( 'Search Placeholder Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .search-box .input-search::placeholder, .others-option-for-responsive .option-inner .search-box .input-search::placeholder' => 'color: {{VALUE}}',
					],
                    'condition' => [
                        'is_search' => '1',
                    ],
				]
            );
            $this->add_control(
				'icon_color_placeholder',
				[
					'label' => esc_html__( 'Search Placeholder Icon Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ecademy-nav .navbar .search-box button, .others-option-for-responsive .option-inner .search-box button' => 'color: {{VALUE}}',
					],
                    'condition' => [
                        'is_search' => '1',
                    ],
				]
            );
        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'nav_button',
            [
                'label' => __( 'Button', 'ecademy-toolkit' ),
            ]
        );
            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Button Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Login', 'ecademy-toolkit' ),
                ]
            );
            $this->add_control(
                'button_icon',
                [
                    'label' => __( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                ]
            );

            $this->add_control(
                'link_type',
                [
                    'label' => esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'  => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' => esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'=>esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'login_button_text',
                [
                    'label' => __( 'User Logged In Button Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Profile', 'ecademy-toolkit' ),
                ]
            );
            $this->add_control(
                'login_button_icon',
                [
                    'label' => __( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                ]
            );

            $this->add_control(
                'login_link_type',
                [
                    'label' => esc_html__( 'User Logged In Button Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'  => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'login_link_to_page',
                [
                    'label' => esc_html__( 'User Logged In Button Link Page', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'login_link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'login_ex_link',
                [
                    'label'=>esc_html__('User Logged In Button External Link', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'condition' => [
                        'login_link_type' => '2',
                    ]
                ]
            );
            $this->add_control(
                'button_padding', [
                    'label' => __( 'Button Padding', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',

                    ],
                ]
            );
            $this->add_control(
				'button_bg',
				[
					'label' => esc_html__( 'Button Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn' => 'background-color: {{VALUE}}',
					],
				]
            );

            $this->add_control(
                'button_top',
                [
                    'label' => __( 'Top', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn i' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'label' => __( 'Button Text Typography', 'ecademy-toolkit' ),
                    'name' => 'typography_button',
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );
            $this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Button Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_control(
				'hover_button_bg',
				[
					'label' => esc_html__( 'Hover Button Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn span' => 'background-color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'hover_button_color',
				[
					'label' => esc_html__( 'Hover Button Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}}',
					],
				]
            );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();

        $is_sticky = ( $settings['is_sticky'] != 'yes' ) ? ' no-sticky' : '';

        $logo           = !empty($settings['main_logo']['url']) ? $settings['main_logo']['url'] : '';
        $mobile_logo    = !empty($settings['mobile_logo']['url']) ? $settings['mobile_logo']['url'] : '';

        $hide_adminbar = 'hide-adminbar';

        switch ( $settings['menu_alignment'] ) {
            case 'right':
                $ul_class = 'navbar-nav ml-auto';
                break;
            case 'left':
                $ul_class = 'navbar-nav mr-auto left';
                break;
            case 'center':
                $ul_class = 'navbar-nav ml-auto mr-auto';
                break;
        }

        ?>

		<div class="navbar-area<?php echo $is_sticky; ?>">
            <div class="ecademy-responsive-nav">
                <div class="container">
                    <div class="ecademy-responsive-menu">
                        <div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) );?>">
								<?php if( $mobile_logo != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
									    <img sm-src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php else: ?>
									    <img src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php endif; ?>
								<?php elseif( $logo != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
									    <img sm-src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php else: ?>
									    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php endif; ?>
								<?php else: ?>
									<h2><?php bloginfo( 'name' ); ?></h2>
								<?php endif; ?>
							</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ecademy-nav">
                <div class="<?php echo esc_attr( $settings['nav_box_layout'] ); ?>">
                    <nav class="navbar navbar-expand-md navbar-light">
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if( $logo != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
								    <img sm-src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php else: ?>
								    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php endif; ?>
							<?php else: ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
							<?php endif; ?>
						</a>

                        <div class="collapse navbar-collapse mean-menu">
							<?php if( $settings['is_search'] == '1' ): ?>
								<form class="search-box" method="get" action="<?php echo site_url( '/' ); ?>">
									<input type="text" value="" name="s" class="input-search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>">
									<input type="hidden" value="course" name="ref" />
									<input type="hidden" name="post_type" value="lp_course">
									<button type="submit"><i class="flaticon-search"></i></button>
								</form>
							<?php endif; ?>

                            <?php
                            $menu = !empty($settings['menu']) ? $settings['menu'] : '';
                            $primary_nav_arg = [
                                'menu'            => $menu,
                                'theme_location'  => 'primary',
                                'container'       => null,
                                'menu_class'      => $ul_class,
                                'depth'           => 3,
                                'walker'          => new eCademy_Bootstrap_Navwalker(),
                                'fallback_cb'     => 'eCademy_Bootstrap_Navwalker::fallback',
                            ];
							if(has_nav_menu('primary')){ wp_nav_menu( $primary_nav_arg );  }
							?>

							<div class="others-option d-flex align-items-center">
								<?php if( $settings['is_cart'] == '1' ) {
									if ( class_exists( 'WooCommerce' ) ) { ?>
										<div class="option-item">
											<div class="cart-btn">
												<a href="<?php echo esc_url(wc_get_cart_url()) ?>"><i class="flaticon-shopping-cart"></i>
												<span class="mini-cart-count"></span></a>
											</div>
										</div>
										<?php
									}
								} ?>

                                <!-- Normal Button -->
                                <?php
                                // Button Icon
                                if( $settings['button_icon'] != '' ):
                                    $icon = $settings['button_icon'];
                                else:
                                    $icon = 'flaticon-user';
                                endif;

                                // Get Button Link
                                $link = '';
                                if($settings['link_type'] == 1){
                                    $link = get_page_link($settings['link_to_page']);
                                } else {
                                    $link = $settings['ex_link'];
                                }
                                if( !is_user_logged_in() ):
                                    if( $settings['button_text'] != '' ): ?>
                                        <div class="option-item">
                                            <a href="<?php echo esc_url(  $link ); ?>" class="default-btn">
                                                <i class="<?php echo esc_attr($icon); ?>"></i>
                                                <?php echo esc_html( $settings['button_text'] ); ?><span></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- User Logged in Button -->
                                <?php
                                // Button Icon
                                $login_icon = '';
                                if( $settings['login_button_icon'] != '' ):
                                    $login_icon = $settings['login_button_icon'];
                                else:
                                    $login_icon = 'flaticon-user';
                                endif;

                                // Get Button Link
                                $login_link = '';
                                if($settings['login_link_type'] == 1){
                                    $login_link = get_page_link($settings['login_link_to_page']);
                                } else {
                                    $login_link = $settings['login_ex_link'];
                                }

                                if( is_user_logged_in() ):
                                    if( $settings['login_button_text'] != '' ): ?>
                                        <div class="option-item">
                                            <a href="<?php echo esc_url(  $login_link ); ?>" class="default-btn">
                                                <i class="<?php echo esc_attr($login_icon); ?>"></i>
                                                <?php echo esc_html( $settings['login_button_text'] ); ?><span></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
							</div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <?php if( $settings['is_search'] == '1' ): ?>
								<form class="search-box" method="get" action="<?php echo site_url( '/' ); ?>">
									<input type="text" value="" name="s" class="input-search" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>">
									<input type="hidden" value="course" name="ref" />
									<input type="hidden" name="post_type" value="lp_course">
									<button type="submit"><i class="flaticon-search"></i></button>
								</form>
							<?php endif; ?>

							<div class="others-option d-flex align-items-center">
								<?php if( $settings['is_cart'] == '1' ) {
									if ( class_exists( 'WooCommerce' ) ) { ?>
										<div class="option-item">
											<div class="cart-btn">
												<a href="<?php echo esc_url(wc_get_cart_url()) ?>"><i class="flaticon-shopping-cart"></i>
												<span class="mini-cart-count"></span></a>
											</div>
										</div>
										<?php
									}
								} ?>

                                <!-- Normal Button -->
                                <?php
                                // Button Icon
                                if( $settings['button_icon'] != '' ):
                                    $icon = $settings['button_icon'];
                                else:
                                    $icon = 'flaticon-user';
                                endif;

                                // Get Button Link
                                $link = '';
                                if($settings['link_type'] == 1){
                                    $link = get_page_link($settings['link_to_page']);
                                } else {
                                    $link = $settings['ex_link'];
                                }
                                if( !is_user_logged_in() ):
                                    if( $settings['button_text'] != '' ): ?>
                                        <div class="option-item">
                                            <a href="<?php echo esc_url(  $link ); ?>" class="default-btn">
                                                <i class="<?php echo esc_attr($icon); ?>"></i>
                                                <?php echo esc_html( $settings['button_text'] ); ?><span></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- User Logged in Button -->
                                <?php
                                // Button Icon
                                $login_icon = '';
                                if( $settings['login_button_icon'] != '' ):
                                    $login_icon = $settings['login_button_icon'];
                                else:
                                    $login_icon = 'flaticon-user';
                                endif;

                                // Get Button Link
                                $login_link = '';
                                if($settings['login_link_type'] == 1){
                                    $login_link = get_page_link($settings['login_link_to_page']);
                                } else {
                                    $login_link = $settings['login_ex_link'];
                                }

                                if( is_user_logged_in() ):
                                    if( $settings['login_button_text'] != '' ): ?>
                                        <div class="option-item">
                                            <a href="<?php echo esc_url(  $login_link ); ?>" class="default-btn">
                                                <i class="<?php echo esc_attr($login_icon); ?>"></i>
                                                <?php echo esc_html( $settings['login_button_text'] ); ?><span></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

}
Plugin::instance()->widgets_manager->register( new Navbar );