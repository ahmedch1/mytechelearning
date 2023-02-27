<?php
/**
 * Feedback Slider Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Feedback_Slider extends Widget_Base {

	public function get_name() {
        return 'Feedback Slider';
    }

	public function get_title() {
        return esc_html__( 'Feedback Slider', 'ecademy-toolkit' );
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
				'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'         => esc_html__( 'Style One', 'ecademy-toolkit' ),
                    '2'         => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                    '3'         => esc_html__( 'Style Three', 'ecademy-toolkit' ),
                ],
                'default' => '1',
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
            'name', [
                'label' => __( 'Name', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Olivar Lucy' , 'ecademy-toolkit' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'designation', [
                'label' => __( 'Designation', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Designer' , 'ecademy-toolkit' ),
            ]
        );

        $repeater->add_control(
            'feedback', [
                'label' => __( 'Feedback Content', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.' , 'ecademy-toolkit' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ecademy_feedback_items',
            [
                'label' => __( 'Slider Item', 'ecademy-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => __( 'Olivar Lucy', 'ecademy-toolkit' ),
                        'designation' => __( 'Designer', 'ecademy-toolkit' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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
                'condition' => [
                    'content_section' => '1',
                ]
            ]
        );

        $this->add_control(
            'shape3',
            [
                'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: MEDIA,
                'condition' => [
                    'content_section' => '1',
                ]
            ]
        );
        $this->add_control(
            'shape4',
            [
                'label'		=> esc_html__('Shape Image Four', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: MEDIA,
                'condition' => [
                    'content_section' => '1',
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
            'bd_color',
            [
                'label' => esc_html__( 'Section Background Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .divider2, .divider3' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .feedback-area.bg-fffaf3, .feedback-area.bg-6ba292' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'feedback_color',
            [
                'label' => esc_html__( 'Feedback Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-box p, .gym-feedback-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'feedback_size',
            [
                'label' => esc_html__( 'Feedback Font Size', 'ecademy-toolkit' ),
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
                    '{{WRAPPER}} .single-feedback-box p, .gym-feedback-box p' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Name Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-box .client-info .title h3, .gym-feedback-box .title h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_size',
            [
                'label' => esc_html__( 'Name Font Size', 'ecademy-toolkit' ),
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
                    '{{WRAPPER}} .single-feedback-box .client-info .title h3' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-box .client-info .title span, .gym-feedback-box .title span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'designation_size',
            [
                'label' => esc_html__( 'Designation Font Size', 'ecademy-toolkit' ),
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
                    '{{WRAPPER}} .single-feedback-box .client-info .title span, .gym-feedback-box .title span' => 'font-size: {{SIZE}}px;',
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

        if( $settings['section_style'] == '1' ):
            $section_class = 'feedback-area bg-fffaf3 ptb-100';
        elseif(  $settings['section_style'] == '2'):
            $section_class = 'feedback-area bg-6ba292 ptb-100';
        endif;

        $count = 0;
        foreach ($slider as $items => $counts):
            $count++;
        endforeach;
        ?>

        <?php if($settings['section_style'] != '3'): ?>
            <div class="<?php echo esc_attr( $section_class ); ?>">
                <div class="container">
                    <?php if( $count == 1 ): ?>
                        <div class="col-lg-12">
                    <?php else: ?>
                        <div class="feedback-slides-two owl-carousel owl-theme">
                    <?php endif; ?>
                        <?php foreach ($slider as $key => $value): ?>
                            <div class="single-feedback-box">
                                <p><?php echo esc_html( $value['feedback'] ); ?></p>
                                <div class="client-info d-flex align-items-center">
                                    <?php if( $value['image']['url'] != '' ): ?>
                                        <img class="rounded-circle" src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>">
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

                <div class="divider2"></div>
                <div class="divider3"></div>

                <?php if( $settings['shape1']['url'] != '' ): ?>
                    <div class="tree-shape">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'shape image', 'ecademy-toolkit' ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="gym-feedback-area ptb-100" style="background-image:url(<?php echo esc_url($settings['shape1']['url']); ?>);">
                <div class="container-fluid">
                    <div class="gym-feedback-slides owl-carousel owl-theme">
                        <?php foreach ($slider as $key => $value): ?>
                            <div class="gym-feedback-box">
                                <p><?php echo esc_html( $value['feedback'] ); ?></p>
                                <div class="title">
                                    <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                    <span><?php echo esc_html( $value['designation'] ); ?></span>
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

Plugin::instance()->widgets_manager->register( new eCademy_Feedback_Slider );