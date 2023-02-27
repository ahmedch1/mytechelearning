<?php
/**
 * Banner Slider Widget
 */

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

class eCademy_Banner_Slider extends Widget_Base {

	public function get_name() {
        return 'BannerSlider';
    }

	public function get_title() {
        return __( 'Banner Slider', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-slides';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Slider Title Tag', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1'         => __( 'h1', 'ecademy-toolkit' ),
                    'h2'         => __( 'h2', 'ecademy-toolkit' ),
                    'h3'         => __( 'h3', 'ecademy-toolkit' ),
                    'h4'         => __( 'h4', 'ecademy-toolkit' ),
                    'h5'         => __( 'h5', 'ecademy-toolkit' ),
                    'h6'         => __( 'h6', 'ecademy-toolkit' ),
                ],
                'default' => 'h1',
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __( 'Button Icon', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'options' => ecademy_flaticons(),
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'count',
            [
                'label' 		=> esc_html__( 'Slider Count', 'ecademy-toolkit' ),
                'type' 			=> Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' => [
                    '1'  	=> esc_html__( 'Yes', 'ecademy-toolkit' ),
                    '2' 	=> esc_html__( 'No', 'ecademy-toolkit' ),
                ],
            ]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'image', [
				'label' => __( 'Image', 'ecademy-toolkit' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'ecademy-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'START YOUR FITNESS JOURNEY WITH EXPERT' , 'ecademy-toolkit' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'ecademy-toolkit' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.' , 'ecademy-toolkit' ),
			]
		);

        $repeater->add_control(
			'button_text', [
				'label' => __( 'Button Text', 'ecademy-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Join For Free' , 'ecademy-toolkit' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'button_link', [
				'label' => __( 'Button Link', 'ecademy-toolkit' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		$this->add_control(
			'ecademy_slider_items',
			[
				'label' => __( 'Slider Item', 'ecademy-toolkit' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'START YOUR FITNESS JOURNEY WITH EXPERT', 'ecademy-toolkit' ),
						'content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 'ecademy-toolkit' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
    $this->end_controls_section();

    $this->start_controls_section(
        'style',
        [
            'label' => __( 'Style', 'ecademy-toolkit' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gym-banner-content h1, .gym-banner-content h2, .gym-banner-content h3, .gym-banner-content h4, .gym-banner-content h5, .gym-banner-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .gym-banner-content h1, .gym-banner-content h2, .gym-banner-content h3, .gym-banner-content h4, .gym-banner-content h5, .gym-banner-content h6',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gym-banner-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .gym-banner-content p',
            ]
        );

    $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $slider = $settings['ecademy_slider_items'];

        // Button Icon
        if( $settings['button_icon'] != '' ):
            $icon = $settings['button_icon'];
        else:
            $icon = 'flaticon-user';
        endif;

        ?>

        <div class="gym-home-area" style="background-image:url(<?php echo esc_url($settings['bg_image']['url']); ?>);">
            <div class="gym-banner-slides owl-carousel owl-theme">
                <?php foreach ($slider as $key => $value): ?>
                    <div class="gym-banner-item">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12">
                                    <div class="gym-banner-content">
                                        <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $value['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                        <p><?php echo esc_html( $value['content'] ); ?></p>

                                        <?php if( $value['button_text'] != '' ): ?>
                                            <a href="<?php echo esc_url( $value['button_link']['url'] ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_attr($value['button_text']); ?><span></span></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <?php if( $value['image']['url'] != '' ): ?>
                                    <div class="gym-banner-image">
                                        <img src="<?php echo esc_url($value['image']['url']); ?>" alt="<?php echo esc_attr($value['title']); ?>">
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if($settings['count'] == '1'): ?>
                <div class="sliderCounter"></div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Banner_Slider );