<?php
/**
 * Motivation Banner Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Motivation_Banner extends Widget_Base {

	public function get_name() {
        return 'eCademy_Motivation_Banner';
    }

	public function get_title() {
        return esc_html__( 'Motivation Banner', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Motivation_Banner_Area',
			[
				'label' => esc_html__( 'Banner Controls', 'ecademy-toolkit' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
				'bg_img',
				[
					'label' => esc_html__( 'Background Image', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
			);

            $this->add_control(
				'top_title',
				[
					'label' 	=> esc_html__( 'Top Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('I am John Doe', 'ecademy-toolkit'),
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Opportunities Don\'t Happen, You Create Them', 'ecademy-toolkit'),
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
					'default' 	=> esc_html__('Get My Free Book', 'ecademy-toolkit'),
				]
            );

            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Get My Free Book', 'ecademy-toolkit'),
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
                'fimage',
                [
                    'label'		=> esc_html__('Feature Image', 'ecademy-toolkit'),
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

            $repeater = new Repeater();
            $repeater->add_control(
                'social_title', [
                    'label' => __( 'Social Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Linkedin', 'ecademy-toolkit' ),
                ]
            );
            $repeater->add_control(
                'social_link', [
                    'label' => __( 'Social Link', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( '#', 'ecademy-toolkit' ),
                ]
            );
            $this->add_control(
                'items', [
                    'label'=>esc_html__('Social Links', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: REPEATER,
                    'fields' => $repeater->get_controls(),
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
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-banner-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-banner-content .sub-title',
                ]
            );

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .motivation-banner-content h1, .motivation-banner-content h2, .motivation-banner-content h3, .motivation-banner-content h4, .motivation-banner-content h5, .motivation-banner-content h6' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-banner-content h1, .motivation-banner-content h2, .motivation-banner-content h3, .motivation-banner-content h4, .motivation-banner-content h5, .motivation-banner-content h6',
                ]
            );

			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .motivation-banner-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-banner-content p',
                ]
            );

            $this->add_control(
                'social_title_color',
                [
                    'label' => esc_html__( 'Social Link Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-banner-area .social-links li a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'spcial_title_typography',
                    'label' => __( 'Social Link Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-banner-area .social-links li a',
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

        <div class="motivation-banner-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']); ?>);">
            <div class="container">
                <?php if($settings['items']): ?>
                    <ul class="social-links">
                        <?php foreach($settings['items'] as $item): ?>
                            <li><a href="<?php echo esc_url($item['social_link']); ?>" target="_blank"><?php echo esc_html($item['social_title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="motivation-banner-content">
                            <span class="sub-title"><?php echo esc_html($settings['top_title']); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?> class="jost-font">
								<?php echo wp_kses_post( $settings['title'] ); ?>
							</<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo esc_html( $settings['content'] ); ?></p>
                            <?php if( $button_text != '' ): ?>
								<a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="motivation-banner-image">
                            <?php if( $settings['fimage']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $settings['shape1']['url'] != '' ): ?>
                <div class="motivation-shape-1">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if( $settings['shape2']['url'] != '' ): ?>
                <div class="motivation-shape-2">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if( $settings['shape3']['url'] != '' ): ?>
                <div class="motivation-shape-3">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Motivation_Banner );