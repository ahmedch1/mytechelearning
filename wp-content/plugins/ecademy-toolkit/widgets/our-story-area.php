<?php
/**
 * Our Story Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Our_Story_Area extends Widget_Base {

	public function get_name() {
        return 'eCademy_Our_Story_Area';
    }

	public function get_title() {
        return __( 'Our Story Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-table-of-contents';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Our_Story_Area_section',
			[
				'label' => __( 'Our_Story_Area Control', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $repeater = new Repeater();
            $repeater->add_control(
                'style', [
                    'label' => __( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => __( 'Style One', 'ecademy-toolkit' ),
                        '2'         => __( 'Style Two', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $repeater->add_control(
                'number', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Number', 'ecademy-toolkit' ),
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'title', [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'default' => esc_html__('Inspirational Stories Are Less About Success', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'content', [
                    'type'    => Controls_Manager::TEXTAREA,
                    'label'   => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'default' => esc_html__('eCademy.Com began in 2005. After years in the web hosting industry, we realized that it was near impossible for the average jane or joe to create their own website. Traditional web hosting services were simply too complicated, time-consuming, and expensive to manage.', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'image', [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'items',
                [
                    'label'   => esc_html__( 'Add List Item', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'counter_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'counter_color',
                [
                    'label' => __( 'Number Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .our-story-title h3 .number' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
				'number_size',
				[
					'label' => __( 'Number Font Size', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .our-story-title h3 .number' => 'font-size: {{SIZE}}px;',
					],
				]
			);

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .our-story-title h3' => 'color: {{VALUE}}',
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
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .our-story-title h3' => 'font-size: {{SIZE}}px;',
					],
				]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .our-story-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'content_size',
				[
					'label' => __( 'Content Font Size', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .our-story-content p' => 'font-size: {{SIZE}}px;',
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

        ?>
        <div class="our-story-area ptb-100">
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['items'] as $item ): ?>
                        <?php if( $item['style'] == '1' ): ?>
                            <div class="col-lg-4 col-md-12">
                                <div class="our-story-title">
                                    <h3><span class="number"><?php echo esc_html( $item['number'] ); ?></span> <?php echo esc_html( $item['title'] ); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="our-story-content">
                                    <?php echo wp_kses_post( $item['content'] ); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php if( $item['image']['url'] != '' ): ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="our-story-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Our Story Image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Our Story Image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new eCademy_Our_Story_Area );