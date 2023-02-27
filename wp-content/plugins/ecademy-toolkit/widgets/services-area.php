<?php
/**
 * Services Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Services_Area extends Widget_Base {

	public function get_name() {
        return 'ServicesArea';
    }

	public function get_title() {
        return esc_html__( 'Services Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-handle';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Services_Area',
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
                    'default' => esc_html__('Our Services', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Best Services for Kids', 'ecademy-toolkit'),
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
                    'default' => esc_html__('Explore all of our courses and pick your suitable ones to enroll and start learning with us! We ensure that you will never regret it!', 'ecademy-toolkit'),
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'box_shape', [
                    'label' => esc_html__('Box Shape Image', 'ecademy-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'icon', [
                    'label' => esc_html__('Icon', 'ecademy-toolkit'),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $repeater->add_control(
                'title', [
                    'label' => esc_html__('Title', 'ecademy-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Music Training', 'ecademy-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'content', [
                    'label' => esc_html__('Content', 'ecademy-toolkit'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, ipsum adipiscing elit elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum.', 'ecademy-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'slider_items',
                [
                    'label' => esc_html__('Services Slider Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'title_field' => '{{{ title }}}',
                    'fields' => $repeater->get_controls(),
                ]
            );

            $this->add_control(
                'fimage',
                [
                    'label' => esc_html__( 'Section Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'image_margin',
                [
                    'label' => __( 'Section Image Top Space', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .kids-kite-image' => 'margin-top: -{{SIZE}}{{UNIT}};',
                    ],
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
                        '{{WRAPPER}} .kindergarten-services-area.bg-f7ebeb.pt-100' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title .sub-title, .premium-access-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title .sub-title, .premium-access-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h5, .section-title h6, .section-title h1' => 'color: {{VALUE}}',
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
                        '{{WRAPPER}} .section-title p, .premium-access-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title p, .premium-access-content p',
                ]
            );

            $this->add_control(
                'slider_icon_color',
                [
                    'label' => esc_html__( 'Slider Icon Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-services-box .content .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_icon_typography',
                    'label' => __( 'Slider Icon Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-services-box .content .icon',
                ]
            );

            $this->add_control(
                'slider_title_color',
                [
                    'label' => esc_html__( 'Slider Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-services-box .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_title_typography',
                    'label' => __( 'Slider Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-services-box .content h3',
                ]
            );

            $this->add_control(
                'slider_content_color',
                [
                    'label' => esc_html__( 'Slider Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kindergarten-services-box .content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'slider_content_typography',
                    'label' => __( 'Slider Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kindergarten-services-box .content p',
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
        <div class="kindergarten-services-area bg-f7ebeb pt-100">
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

                <div class="services-slides owl-carousel owl-theme">
                    <?php foreach( $settings['slider_items'] as $item ): ?>
                        <div class="single-kindergarten-services-box">
                            <?php if( $item['box_shape']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $item['box_shape']['url'] ); ?>" alt="<?php echo esc_attr_e('Box Shape', 'ecademy-toolkit') ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $item['box_shape']['url'] ); ?>" alt="<?php echo esc_attr_e('Box Shape', 'ecademy-toolkit') ?>">
                                <?php endif; ?>
                            <?php endif; ?>

                            <div class="content">
                                <?php if( $item['icon'] != '' ): ?>
                                    <div class="icon">
                                        <i class="<?php echo esc_attr( $item['icon'] ) ?>"></i>
                                    </div>
                                <?php endif; ?>

                                <h3 class="font-weight-black"><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo esc_html( $item['content'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if( $settings['fimage']['url'] != '' ): ?>
                    <div class="kids-kite-image">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr_e('Box Shape', 'ecademy-toolkit') ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr_e('Box Shape', 'ecademy-toolkit') ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if( $settings['shape_image1']['url'] != '' ): ?>
                <div class="kindergarten-shape9">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape_image2']['url'] != '' ): ?>
                <div class="kindergarten-shape10">
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

Plugin::instance()->widgets_manager->register( new Services_Area );