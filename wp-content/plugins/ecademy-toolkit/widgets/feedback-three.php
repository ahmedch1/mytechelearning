<?php
/**
 * Feedback Three Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Feedback_Three extends Widget_Base {

	public function get_name() {
        return 'FeedbackThree';
    }

	public function get_title() {
        return __( 'Feedback Three', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial';
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
			'bg_image',
			[
				'label' => __( 'Background Image', 'ecademy-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'image', [
                'label' => __( 'Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'ecademy-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Olivar Lucy', 'ecademy-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'designation', [
                'label' => esc_html__('Designation', 'ecademy-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Designer', 'ecademy-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'feedback', [
                'label' => esc_html__('Feedback Content', 'ecademy-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', 'ecademy-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ecademy_feedback_items',
            [
                'label' => esc_html__('Slider Item', 'ecademy-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [ 'name' => esc_html__(' Item #1', 'ecademy-toolkit') ],

                ],
                'fields' => $repeater->get_controls(),
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
            'bd_color',
            [
                'label' => __( 'Card Background Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-slides-style-two.feedback-slides.owl-theme::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'feedback_color',
            [
                'label' => __( 'Feedback Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'feedback_size',
            [
                'label' => __( 'Feedback Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box p' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __( 'Name Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box .client-info .title h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_size',
            [
                'label' => __( 'Name Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box .client-info .title h3' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => __( 'Designation Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box .client-info .title span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'designation_size',
            [
                'label' => __( 'Designation Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item-box .client-info .title span' => 'font-size: {{SIZE}}px;',
                ],
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
        $slider = $settings['ecademy_feedback_items'];

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        ?>

        <div class="feedback-with-bg-image ptb-100 jarallax" data-jarallax='{"speed": 0.3}' style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
            <div class="container">
                <div class="feedback-slides feedback-slides-style-two owl-theme owl-carousel">
                    <?php foreach ($slider as $key => $value): ?>
                        <div class="single-feedback-item-box">
                            <p><?php echo esc_html( $value['feedback'] ); ?></p>

                            <div class="client-info d-flex align-items-center">
                                <?php if( $value['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="title">
                                    <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                    <span><?php echo esc_html( $value['designation'] ); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Feedback_Three );