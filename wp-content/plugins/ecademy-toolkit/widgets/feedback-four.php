<?php
/**
 * Feedback Four Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Feedback_Four extends Widget_Base {

	public function get_name() {
        return 'FeedbackArea';
    }

	public function get_title() {
        return esc_html__( 'Feedback Area Four', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-star-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Feedback_Four',
			[
				'label' => esc_html__( 'eCademy Section', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Testimonials', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Our Guardian Feedback', 'ecademy-toolkit'),
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
                    'default' => esc_html__("We always give extra care to our student's skills improvements and feel excited to share our latest research and learnings!", 'ecademy-toolkit'),
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
                    'default' => esc_html__('Lorem ipsum dolor sit aadamet45, consectetur adipiscing elit elit3, sed do eiusmod tempor incididunt ut labore et dolore.', 'ecademy-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'slider_items',
                [
                    'label' => esc_html__('Feedback Slider Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'label_block' => true,
                    'title_field' => '{{{ name }}}',
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'fimage',
                [
                    'label' => esc_html__( 'Feedback Card Background Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
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
                        '{{WRAPPER}} .feedback-area.bg-6dbbbd.pt-100.pb-70' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feedback-area.bg-6dbbbd .section-title .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .feedback-area.bg-6dbbbd .section-title .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .feedback-area.bg-6dbbbd .section-title h3, .feedback-area.bg-6dbbbd .section-title h4, .feedback-area.bg-6dbbbd .section-title h5, .feedback-area.bg-6dbbbd .section-title h5, .feedback-area.bg-6dbbbd .section-title h6, .feedback-area.bg-6dbbbd .section-title h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h5, .section-title h6, .section-title h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feedback-area.bg-6dbbbd .section-title p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title p',
                ]
            );

            $this->add_control(
                'slider_name_color',
                [
                    'label' => esc_html__( 'Slider Name Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-feedback-item .client-info h3' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_name_typography',
                    'label' => __( 'Slider Name Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-feedback-item .client-info h3',
                ]
            );

            $this->add_control(
                'slider_content_color',
                [
                    'label' => esc_html__( 'Slider Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-feedback-item .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_content_typography',
                    'label' => __( 'Slider Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-feedback-item .content p',
                ]
            );

            $this->add_control(
                'slider_designation_color',
                [
                    'label' => esc_html__( 'Slider Designation Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-feedback-item .client-info span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_designation_typography',
                    'label' => __( 'Slider Designation Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-feedback-item .client-info span',
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
        ?>
        <div class="feedback-area bg-6dbbbd pt-100 pb-70">
            <div class="container">
                <?php if( $settings['top_title'] != '' && $settings['title'] != '' && $settings['content'] != '' ): ?>
                    <div class="section-title">
                        <?php if( $settings['top_title'] != '' ): ?>
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <?php endif; ?>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> class="font-weight-black" <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="container-fluid">
                <div class="feedback-slides-three owl-carousel owl-theme">
                    <?php foreach( $settings['slider_items'] as $item ): ?>
                        <div class="single-kindergarten-feedback-item">
                            <div class="content">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <p><?php echo esc_html( $item['feedback'] ); ?></p>
                            </div>

                            <div class="client-info">
                                <?php if( $item['image']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h3 class="font-weight-black"><?php echo esc_html( $item['name'] ); ?></h3>
                                <span><?php echo esc_html( $item['designation'] ); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if( $settings['shape_image1']['url'] != '' ): ?>
                <div class="kindergarten-shape13">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape_image2']['url'] != '' ): ?>
                <div class="kindergarten-shape14">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new Feedback_Four );