<?php
/**
 * Feedback Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Feedback extends Widget_Base {

	public function get_name() {
        return 'Feedback';
    }

	public function get_title() {
        return __( 'Feedback', 'ecademy-toolkit' );
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
            'feedback_style',
            [
                'label' => __( 'Feedback Style', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'         => __( 'Style One', 'ecademy-toolkit' ),
                    '2'         => __( 'Style Two', 'ecademy-toolkit' ),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'top_title',
            [
                'label' => __( 'Top Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Distance learning', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Flexible Study at Your Own Pace, According to Your Own Needs', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title Tag', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1'         => __( 'h1', 'ecademy-toolkit' ),
                    'h2'         => __( 'h2', 'ecademy-toolkit' ),
                    'h3'         => __( 'h3', 'ecademy-toolkit' ),
                    'h4'         => __( 'h4', 'ecademy-toolkit' ),
                    'h5'         => __( 'h5', 'ecademy-toolkit' ),
                    'h6'         => __( 'h6', 'ecademy-toolkit' ),
                ],
                'default' => 'h2',
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('With the open university, you can study whenever and wherever you choose. We have students in over 128 countries and a global reputation as a pioneer in the field of flexible learning. Our flexible teaching also means, if you travel often or need to relocate, you can continue to study wherever you go.', 'ecademy-toolkit'),
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

        $this->add_control(
            'bottom_title',
            [
                'label' => __( 'Bottom Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Not a member yet?', 'ecademy-toolkit'),
                'condition' => [
                    'feedback_style' => '1',
                ]
            ]
        );
        $this->add_control(
            'bottom_link_title',
            [
                'label' => __( 'Bottom Link Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Register now', 'ecademy-toolkit'),
                'condition' => [
                    'feedback_style' => '1',
                ]
            ]
        );

        $this->add_control(
            'link_type',
            [
                'label' 		=> esc_html__( 'Link Type', 'ecademy-toolkit' ),
                'type' 			=> Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' => [
                    '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                    '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                ],
                'condition' => [
                    'feedback_style' => '1',
                ]
            ]
        );

        $this->add_control(
            'link_to_page',
            [
                'label' 		=> esc_html__( 'Link Page', 'ecademy-toolkit' ),
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
                'label'		=> esc_html__('External Link', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: TEXT,
                'condition' => [
                    'link_type' => '2',
                ]
            ]
        );

        $this->add_control(
            'shape1',
            [
                'label'		=> esc_html__('Shape Image One', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: MEDIA,
                'condition' => [
                    'feedback_style' => '2',
                ]
            ]
        );

        $this->add_control(
            'shape2',
            [
                'label'		=> esc_html__('Shape Image Two', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: MEDIA,
                'condition' => [
                    'feedback_style' => '2',
                ]
            ]
        );

        $this->add_control(
            'shape3',
            [
                'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: MEDIA,
                'condition' => [
                    'feedback_style' => '2',
                ]
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
            'top_title_color',
            [
                'label' => __( 'Top Title Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-content .sub-title, .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'top_title_size',
            [
                'label' => __( 'Top Title Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .feedback-content .sub-title, .section-title .sub-title' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-content h2, .feedback-content h3, .feedback-content h4, .feedback-content h5, .feedback-content h5, .feedback-content h6, .feedback-content h1, .section-title h1, .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_size',
            [
                'label' => __( 'Title Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .feedback-content h2, .feedback-content h3, .feedback-content h4, .feedback-content h5, .feedback-content h5, .feedback-content h6, .feedback-content h1, .section-title h1, .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'feedback_color',
            [
                'label' => __( 'Feedback Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-content p, .single-testimonials-item p, .section-title p' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .feedback-content p, .single-testimonials-item p, .section-title p' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __( 'Name Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item .client-info .title h3, .single-testimonials-item h3' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .single-feedback-item .client-info .title h3, .single-testimonials-item h3' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => __( 'Designation Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item .client-info .title span, .single-testimonials-item span' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .single-feedback-item .client-info .title span, .single-testimonials-item span' => 'font-size: {{SIZE}}px;',
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

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }

        $count = 0;
        foreach ($slider as $items => $counts):
            $count++;
        endforeach;
        ?>
        <?php if( $settings['feedback_style'] == '1' ): ?>
            <div class="feedback-content">
                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                <?php if( $count == 1 ): ?>
                    <div class="col-lg-12">
                <?php else: ?>
                    <div class="feedback-slides owl-carousel owl-theme">
                <?php endif; ?>
                    <?php foreach ($slider as $key => $value): ?>
                        <div class="single-feedback-item">
                            <p><?php echo esc_html( $value['feedback'] ); ?></p>
                            <div class="client-info d-flex align-items-center">
                                <?php if( $value['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img class="shadow rounded-circle" sm-src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                    <?php else: ?>
                                        <img class="shadow rounded-circle" src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
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

                <?php if( !is_user_logged_in() ): ?>
                    <div class="feedback-info">
                        <p><?php echo esc_html( $settings['bottom_title'] ); ?> <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $settings['bottom_link_title'] ); ?></a></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $settings['feedback_style'] == '2' ): ?>
            <div class="testimonials-area ptb-100">
                <div class="container">
                    <div class="section-title">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                    </div>

                    <?php if( $count == 1 ): ?>
                        <div class="col-lg-12">
                    <?php else: ?>
                        <div class="testimonials-slides owl-carousel owl-theme">
                    <?php endif; ?>
                        <?php foreach ($slider as $key => $value): ?>
                            <div class="single-testimonials-item">
                                <?php if( $value['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img class="client-img" sm-src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                    <?php else: ?>
                                        <img class="client-img" src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <p><?php echo esc_html( $value['feedback'] ); ?></p>
                                <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                <span><?php echo esc_html( $value['designation'] ); ?></span>

                                <div class="shape-img">
                                    <?php if( $settings['shape1']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" class="shape-1" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" class="shape-1" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $settings['shape2']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" class="shape-2" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" class="shape-2" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $settings['shape3']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" class="shape-3" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" class="shape-3" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Feedback );