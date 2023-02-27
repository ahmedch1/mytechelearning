<?php
/**
 * Kindergarten Hero Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Kindergarten_Hero extends Widget_Base {

	public function get_name() {
        return 'eCademy_Kindergarten_Hero';
    }

	public function get_title() {
        return esc_html__( 'Kindergarten Hero', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Kindergarten_Hero_Area',
			[
				'label' => esc_html__( 'Banner Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'ecademy-toolkit' ),
                    'types' => [ 'classic'],
                    'selector' => '{{WRAPPER}} .kindergarten-main-banner',
                ]
            );

            $this->add_control(
                'top_shape_image',
                [
                    'label'		=> esc_html__('Top Shape Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> 'A lifetime of <span>Confidence</span> starts here',
				]
			);

			$this->add_control(
                'title_tag',
                [
                    'label' 	=> esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::SELECT,
                    'options' 	=> [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h1',
                ]
            );

			$this->add_control(
				'content',
				[
					'label' 	=> esc_html__( 'Content', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Join For Free', 'ecademy-toolkit'),
				]
            );

            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Profile', 'ecademy-toolkit'),
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

            $this->add_control(
                'circle_shape_image',
                [
                    'label'		=> esc_html__('Circle Shape Image', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
			);

        $this->end_controls_section();

        $this->start_controls_section(
			'image_area',
			[
				'label' => esc_html__( 'Images', 'ecademy-toolkit' ),
			]
        );
            $this->add_control(
                'fimage1',
                [
                    'label'		=> esc_html__('Feature Image One', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'fimage2',
                [
                    'label'		=> esc_html__('Feature Image Two', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'fimage3',
                [
                    'label'		=> esc_html__('Feature Image Three', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'fimage4',
                [
                    'label'		=> esc_html__('Feature Image Four', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label'		=> esc_html__('Shape Image One', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

            $this->add_control(
                'shape2',
                [
                    'label'		=> esc_html__('Shape Image Two', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

            $this->add_control(
                'shape3',
                [
                    'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'shape4',
                [
                    'label'		=> esc_html__('Shape Image Four', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'shape5',
                [
                    'label'		=> esc_html__('Shape Image Five', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );
            $this->add_control(
                'shape6',
                [
                    'label'		=> esc_html__('Shape Image Six', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'shape_divider',
			[
				'label' => esc_html__( 'Shape Divider', 'ecademy-toolkit' ),
			]
        );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'top_shape_divider',
                    'label' => esc_html__( 'Top Shape Divider', 'ecademy-toolkit' ),
                    'types' => [ 'classic'],
                    'selector' => '{{WRAPPER}} .kindergarten-main-banner::after',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'bottom_shape_divider',
                    'label' => esc_html__( 'Bottom Shape Divider', 'ecademy-toolkit' ),
                    'types' => [ 'classic'],
                    'selector' => '{{WRAPPER}} .kindergarten-main-banner::before',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'banner_style',
			[
				'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .kindergarten-banner-content h1, .kindergarten-banner-content h2, .kindergarten-banner-content h3, .kindergarten-banner-content h4, .kindergarten-banner-content h5, .kindergarten-banner-content h6' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .kindergarten-banner-content h1, .kindergarten-banner-content h2, .kindergarten-banner-content h3, .kindergarten-banner-content h4, .kindergarten-banner-content h5, .kindergarten-banner-content h6',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'span_title_typography',
                    'label' => esc_html__( 'Span Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .kindergarten-banner-content h1 span, .kindergarten-banner-content h2 span, .kindergarten-banner-content h3 span, .kindergarten-banner-content h4 span, .kindergarten-banner-content h5 span, .kindergarten-banner-content h6 span',
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .kindergarten-banner-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .kindergarten-banner-content p',
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

		// Button Icon
        if( $settings['button_icon'] != '' ):
            $icon = $settings['button_icon'];
        else:
            $icon = 'flaticon-user';
        endif;

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

        <div class="kindergarten-main-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="kindergarten-banner-content">
                            <?php if( $settings['top_shape_image']['url'] != '' ): ?>
                                <div class="image">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['top_shape_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['top_shape_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

							<<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>>
								<?php echo $settings['title']; ?>
							</<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>

                            <?php if( $button_text != '' ): ?>
								<a href="<?php echo esc_url( $link ); ?>" class="default-btn-style-two"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                            <?php endif; ?>

                            <?php if( $settings['circle_shape_image']['url'] != '' ): ?>
                                <div class="circle-shape">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['circle_shape_image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['circle_shape_image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="kindergarten-banner-image">
                            <div class="row">
                                <?php if( $settings['fimage1']['url'] != '' ): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="image">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['fimage1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.02" data-revert="true">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['fimage1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.02" data-revert="true">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['fimage2']['url'] != '' ): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="image">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['fimage2']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.04" data-revert="true">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['fimage2']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.04" data-revert="true">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['fimage3']['url'] != '' ): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="image">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['fimage3']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.06" data-revert="true">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['fimage3']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.06" data-revert="true">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['fimage4']['url'] != '' ): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="image">
                                            <img class="mt-4" src="<?php echo esc_url( $settings['fimage4']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" data-speed="0.08" data-revert="true">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $settings['shape1']['url'] != '' ): ?>
                <div class="kindergarten-shape1">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape2']['url'] != '' ): ?>
                <div class="kindergarten-shape2">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape3']['url'] != '' ): ?>
                <div class="kindergarten-shape3">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape4']['url'] != '' ): ?>
                <div class="kindergarten-shape4">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape5']['url'] != '' ): ?>
                <div class="kindergarten-shape5">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape6']['url'] != '' ): ?>
                <div class="kindergarten-shape1">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape6']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape6']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Kindergarten_Hero );