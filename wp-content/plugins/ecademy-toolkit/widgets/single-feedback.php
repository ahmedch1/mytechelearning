<?php
/**
 * Single Feedback Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Single_Feedback extends Widget_Base {

	public function get_name() {
        return 'Single_Feedback';
    }

	public function get_title() {
        return esc_html__( 'Single Feedback', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-post-excerpt';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Single_Feedback',
			[
				'label' => esc_html__( 'eCademy Single Feedback', 'ecademy-toolkit' ),
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
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'section_image',
                [
                    'label' => esc_html__( 'Section Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Section Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('More Than 200,000 People Agree That We are Different', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'image',
                [
                    'label' => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'name',
                [
                    'label' => esc_html__( 'Name', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('John Smith', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'designation',
                [
                    'label' => esc_html__( 'Designation', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Python Developer', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'feedback',
                [
                    'label' => esc_html__( 'Feedback', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed tempor incididunt ut labore et dolore.', 'ecademy-toolkit'),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_shape_images',
			[
				'label' => esc_html__( 'Shape Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                        'style' => '2',
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
                        '{{WRAPPER}} .testimonials-area.ptb-100.bg-fef8ef, .health-coaching-feedback-area' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .health-coaching-inner h2' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .health-coaching-inner h2',
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Name Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box h3, .feedback-quote .client-info .title h3' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Name Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-testimonials-box h3, .feedback-quote .client-info .title h3',
                ]
            );

            $this->add_control(
                'designation_color',
                [
                    'label' => esc_html__( 'Designation Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box span, .feedback-quote .client-info .title span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'label' => __( 'Designation Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-testimonials-box span, .feedback-quote .client-info .title span',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Feedback Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box p, .feedback-quote p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Feedback Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-testimonials-box p, .feedback-quote p',
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
        $this-> add_inline_editing_attributes('name','none');
        $this-> add_inline_editing_attributes('designation','none');
        $this-> add_inline_editing_attributes('feedback','none');

        ?>

        <?php if( $settings['style'] == '1' ): ?>
            <div class="testimonials-area ptb-100 bg-fef8ef">
                <div class="container">
                    <div class="single-testimonials-box">
                        <?php if( $settings['image']['url'] != '' ): ?>
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="client-img" alt="<?php echo esc_attr( $settings['name'] ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="client-img" alt="<?php echo esc_attr( $settings['name'] ); ?>">
                            <?php endif; ?>
                        <?php endif; ?>
                        <p <?php echo $this-> get_render_attribute_string('feedback'); ?>><?php echo wp_kses_post( $settings['feedback'] ); ?></p>
                        <h3 <?php echo $this-> get_render_attribute_string('name'); ?>><?php echo esc_html( $settings['name'] ); ?></h3>
                        <span <?php echo $this-> get_render_attribute_string('designation'); ?>><?php echo esc_html( $settings['designation'] ); ?></span>

                        <div class="shape-img">
                            <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" class="shape-1" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" class="shape-1" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if( $settings['shape_image2']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" class="shape-2" alt="<?php echo esc_attr__( 'Shape Image Two', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" class="shape-2" alt="<?php echo esc_attr__( 'Shape Image Two', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if( $settings['shape_image3']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" class="shape-3" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" class="shape-3" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="health-coaching-feedback-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <?php if( $settings['section_image']['url'] != '' ): ?>
                                <div class="health-coaching-feedback-image">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['section_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['section_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="health-coaching-inner">
                                <h2><?php echo wp_kses_post( $settings['title'] ); ?></h2>
                                <div class="feedback-quote">
                                    <p <?php echo $this-> get_render_attribute_string('feedback'); ?>><?php echo wp_kses_post( $settings['feedback'] ); ?></p>
                                    <div class="client-info">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <?php if( $settings['image']['url'] != '' ): ?>
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="client-img" alt="<?php echo esc_attr( $settings['name'] ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="client-img" alt="<?php echo esc_attr( $settings['name'] ); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <div class="title">
                                                <h3 <?php echo $this-> get_render_attribute_string('name'); ?>><?php echo esc_html( $settings['name'] ); ?></h3>
                                                <span <?php echo $this-> get_render_attribute_string('designation'); ?>><?php echo esc_html( $settings['designation'] ); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                        <div class="object1">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( $settings['shape_image2']['url'] != '' ): ?>
                                        <div class="object2">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( $settings['shape_image3']['url'] != '' ): ?>
                                        <div class="object3">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( $settings['shape_image4']['url'] != '' ): ?>
                                        <div class="object4">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( $settings['shape_image4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Single_Feedback );