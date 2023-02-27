<?php
/**
 * Feature Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Feature_Card extends Widget_Base {

	public function get_name() {
        return 'FeatureCard';
    }

	public function get_title() {
        return esc_html__( 'Feature Card', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Feature_Card',
			[
				'label' => esc_html__( 'eCademy Feature Card', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'image',
                [
                    'label' => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Infants', 'ecademy-toolkit'),
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
                    'default' => 'h3',
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'sub_title',
                [
                    'label' => esc_html__( 'Sub Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('3 - 12 Months', 'ecademy-toolkit'),
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
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-selected-ages-box h2, {{WRAPPER}} .single-selected-ages-box h3, {{WRAPPER}} .single-selected-ages-box h4, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h6, {{WRAPPER}} .single-selected-ages-box h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-selected-ages-box h2, {{WRAPPER}} .single-selected-ages-box h3, .single-selected-ages-box h4, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h6, {{WRAPPER}} .single-selected-ages-box h1',
                ]
            );

            $this->add_control(
                'title_bg_color',
                [
                    'label' => esc_html__( 'Title Background Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-selected-ages-box h2, {{WRAPPER}} .single-selected-ages-box h3, {{WRAPPER}} .single-selected-ages-box h4, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h5, {{WRAPPER}} .single-selected-ages-box h6, {{WRAPPER}} .single-selected-ages-box h1' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-selected-ages-box p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-selected-ages-box p',
                ]
            );

            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-selected-ages-box .ages-number' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Sub Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-selected-ages-box .ages-number',
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
            <div class="single-selected-ages-box">
                <?php if( $settings['image']['url'] != '' ): ?>
                    <div class="image">
                        <?php if( $is_lazyloader == true ): ?>
                            <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                        <?php else: ?>
                            <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                    <span class="ages-number"><?php echo esc_html( $settings['sub_title'] ); ?></span>
                </div>
            </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Feature_Card );