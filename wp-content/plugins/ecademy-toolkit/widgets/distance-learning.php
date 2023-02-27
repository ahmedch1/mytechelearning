<?php
/**
 * About Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Distance_Learning extends Widget_Base {

	public function get_name() {
        return 'Distance_Learning';
    }

	public function get_title() {
        return esc_html__( 'About Area One', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-single-post';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Distance_Learning',
			[
				'label' => esc_html__( 'eCademy About Area One', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'         => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                        '3'         => esc_html__( 'Style Three', 'ecademy-toolkit' ),
                        '4'         => esc_html__( 'Style Four', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('About Area', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('89% of People Learning for Professional Development Report Career Benefits Like Getting a Promotion, Starting a New Career', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'title', [
                    'label'     => __( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Expert Instruction', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'default_icon', [
                    'label' => esc_html__( 'Select Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $this->add_control(
                'list_items',
                [
                    'label' => esc_html__('List Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Profile', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Join For Free', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
				]
            );

            $this->add_control(
                'link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_images',
			[
				'label' => esc_html__( 'Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'image1',
                [
                    'label' => esc_html__( 'About Area Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'image2',
                [
                    'label' => esc_html__( 'About Area Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => ['1', '3'],
                    ]
                ]
            );
            $this->add_control(
                'image3',
                [
                    'label' => esc_html__( 'About Area Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );
            $this->add_control(
                'image4',
                [
                    'label' => esc_html__( 'About Area Image Four', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );

            $this->add_control(
                'shape_image12',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => ['2'],
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_shape_images',
			[
				'label' => esc_html__( 'Shape Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style' => ['1', '3'],
                ]
			]
        );
            $this->add_control(
                'shape_image1',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'shape_image2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_image3',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_image4',
                [
                    'label' => esc_html__( 'Shape Image Four', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => ['1'],
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'section_bg_color',
                [
                    'label' => esc_html__( 'Section Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-area.bg-fef8ef, .about-area' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content h2, .about-content h3, .about-content h4, .about-content h5, .about-content h5, .about-content h6, .about-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content h2, .about-content h3, .about-content h4, .about-content h5, .about-content h5, .about-content h6, .about-content h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content p',
                ]

            );
            $this->add_control(
                'list_title_color',
                [
                    'label' => esc_html__( 'List Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-content .features-list li span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'lis_title_content_typography',
                    'label' => __( 'List Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .about-content .features-list li span',
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }

        if ( is_user_logged_in() ):
            $button_text = $settings['user_button_text'];
        else:
            $button_text = $settings['button_text'];
        endif;
        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="about-area bg-fef8ef ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-image">
                                <div class="row">
                                    <?php if( $settings['image1']['url'] != '' ): ?>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                            <div class="image wow fadeInLeft">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $settings['image2']['url'] != '' ): ?>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                            <div class="image wow fadeInDown">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $settings['image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $settings['image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $settings['image3']['url'] != '' ): ?>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                            <div class="image wow fadeInUp">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $settings['image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $settings['image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $settings['image4']['url'] != '' ): ?>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                            <div class="image wow fadeInRight">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $settings['image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $settings['image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="about-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <ul class="features-list">
                                    <?php foreach( $settings['list_items'] as $item ):
                                        // Icon
                                        $icon =$item['default_icon'];
                                        ?>
                                        <li><span><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></span></li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php if( $button_text != '' ):
                                        // Button Icon
                                        if( $settings['button_icon'] != '' ):
                                            $icon = $settings['button_icon'];
                                        else:
                                            $icon = 'flaticon-user';
                                        endif;
                                    ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                    <div class="shape1" data-speed="0.06" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php else: ?>
                         <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php endif; ?>
                        </div>
                <?php endif; ?>

                <?php if( $settings['shape_image2']['url'] != '' ): ?>
                    <div class="shape2" data-speed="0.06" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $settings['shape_image3']['url'] != '' ): ?>
                    <div class="shape3" data-speed="0.06" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $settings['shape_image4']['url'] != '' ): ?>
                    <div class="shape4" data-speed="0.06" data-revert="true">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="about-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if( $settings['image1']['url'] != '' ): ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="about-image text-center">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="about-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $settings['list_items'] ): ?>
                                    <ul class="features-list">
                                        <?php foreach( $settings['list_items'] as $item ):
                                            // Icon
                                            $icon = '';
                                            $icon =$item['default_icon'];
                                            ?>
                                            <?php if( $icon != ''|| $item['title'] != '' ): ?>
                                                <li><span><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></span></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if( $button_text != '' ):
                                        // Button Icon
                                        if( $settings['button_icon'] != '' ):
                                            $icon = $settings['button_icon'];
                                        else:
                                            $icon = 'flaticon-user';
                                        endif;
                                    ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if( $settings['shape_image12']['url'] != '' ): ?>
                    <div class="bulb">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image12']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image12']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['style'] == '4' ): ?>
            <div class="why-choose-us-area ptb-100">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="why-choose-us-image">
                                <?php if( $settings['image1']['url'] != '' ): ?>
                                    <div class="about-image text-center">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="why-choose-us-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                <?php if( $settings['list_items'] ): ?>
                                    <ul class="features-list">
                                        <?php foreach( $settings['list_items'] as $item ):
                                            // Icon
                                            $icon = '';
                                            $icon =$item['default_icon'];
                                            ?>
                                            <?php if( $icon != ''|| $item['title'] != '' ): ?>
                                                <li><span><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></span></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                    <?php if( $button_text != '' ):
                                        // Button Icon
                                            if( $settings['button_icon'] != '' ):
                                                $icon = $settings['button_icon'];
                                            else:
                                                $icon = 'flaticon-user';
                                            endif;
                                        ?>
                                        <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '3' ): ?>
            <div class="about-area ptb-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="kindergarten-about-image">
                                <div class="main-image">
                                    <?php if( $settings['image1']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $settings['image2']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['image2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['image2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                    <div class="shape">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'About Us' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="about-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> class="font-weight-black" <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <div <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></div>

                                <ul class="about-list">
                                    <?php foreach( $settings['list_items'] as $item ):
                                        // Icon
                                        $icon = 'bx bx-check';
                                        if( $item['default_icon'] != '' ):
                                            $icon = $item['default_icon'];
                                        else:
                                        $icon = 'bx bx-check';
                                        endif;

                                        ?>
                                        <li><span><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></span></li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php if( $button_text != '' ):
                                        // Button Icon
                                        if( $settings['button_icon'] != '' ):
                                            $icon = $settings['button_icon'];
                                        else:
                                            $icon = 'flaticon-user';
                                        endif;
                                    ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="default-btn-style-two"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if( $settings['shape_image2']['url'] != '' ): ?>
                    <div class="kindergarten-shape7">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image' ); ?>">
                        <?php endif; ?>
                        </div>
                <?php endif; ?>
                <?php if( $settings['shape_image3']['url'] != '' ): ?>
                    <div class="kindergarten-shape8">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Distance_Learning );