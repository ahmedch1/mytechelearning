<?php
/**
 * Funfacts Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Funfacts extends Widget_Base {

	public function get_name() {
        return 'eCademy_Funfacts';
    }

	public function get_title() {
        return __( 'Funfacts', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-counter';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'funfacts_section',
			[
				'label' => __( 'Funfacts Control', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'funfacts_style',
				[
					'label' => __( 'Style', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'         => __( 'Style One', 'ecademy-toolkit' ),
						'2'         => __( 'Style Two', 'ecademy-toolkit' ),
						'3'         => __( 'Style Three', 'ecademy-toolkit' ),
						'4'         => __( 'Style Four', 'ecademy-toolkit' ),
						'5'         => __( 'Style Five', 'ecademy-toolkit' ),
						'6'         => __( 'Style Six', 'ecademy-toolkit' ),
					],
					'default' => '1',
				]
			);

			$this->add_control(
                'number_bg',
                [
                    'label' => esc_html__( 'Number Background Shape Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'funfacts_style' => ['3','4'],
                    ]
                ]
            );

			$repeater = new Repeater();
            $repeater->add_control(
                'number', [
					'type'    => Controls_Manager::NUMBER,
					'label'   => esc_html__( 'Ending Number', 'ecademy-toolkit' ),
					'default' => 1926,
                ]
            );
            $repeater->add_control(
                'title', [
					'type'    => Controls_Manager::TEXT,
					'label'   => esc_html__( 'Title', 'ecademy-toolkit' ),
					'default' => esc_html__('Finished Sessions', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'number_suffix', [
					'type'    => Controls_Manager::TEXT,
					'label'   => esc_html__( 'Number Suffix', 'ecademy-toolkit' ),
                ]
            );
            $this->add_control(
                'items',
                [
                    'label'   => esc_html__( 'Add Counter Item', 'ecademy-toolkit' ),
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
				'bg_color',
				[
					'label' => __( 'Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .funfacts-list, .funfacts-area.bg-f5f7fa, .funfacts-area-two, .funfacts-area-three.bg-fff8f8 ' => 'background-color: {{VALUE}}',
					],
				]
			);

            $this->add_control(
                'counter_color',
                [
                    'label' => __( 'Number Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts-box h3, .single-funfacts-item h3, .single-funfacts h3, .single-funfacts-item h3, .funfacts-box h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .single-funfacts-box h3, .single-funfacts-item h3, .single-funfacts h3, .single-funfacts-item h3, .funfacts-box h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-funfacts-box p, .single-funfacts-item p, .single-funfacts p, .single-funfacts-item p,.funfacts-box p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .single-funfacts-box p, .single-funfacts-item p, .single-funfacts p, .single-funfacts-item p, .funfacts-box p' => 'font-size: {{SIZE}}px;',
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
		<?php if( $settings['funfacts_style'] == '1' ): ?>
            <div class="funfacts-list">
                <div class="row">
                    <?php foreach( $settings['items'] as $item ): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-funfacts-box">
								<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
                                <p><?php echo esc_html( $item['title'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
		<?php elseif( $settings['funfacts_style'] == '2' ): ?>
			<div class="funfacts-area bg-f5f7fa">
				<div class="container">
					<div class="row">
						<?php foreach( $settings['items'] as $item ): ?>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="single-funfacts-item">
									<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
									<p><?php echo esc_html( $item['title'] ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php elseif( $settings['funfacts_style'] == '3' ): ?>
			<div class="funfacts-area-two">
				<div class="container">
					<div class="row">
						<?php foreach( $settings['items'] as $item ): ?>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="single-funfacts">
									<?php if( $settings['number_bg']['url'] != '' ): ?>
										<?php if( $is_lazyloader == true ): ?>
											<img sm-src="<?php echo esc_url( $settings['number_bg']['url'] ); ?>" alt="<?php echo esc_attr__( 'Number Background' ); ?>">
										<?php else: ?>
											<img src="<?php echo esc_url( $settings['number_bg']['url'] ); ?>" alt="<?php echo esc_attr__( 'Number Background' ); ?>">
										<?php endif; ?>
									<?php endif; ?>
									<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
									<p><?php echo esc_html( $item['title'] ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php elseif( $settings['funfacts_style'] == '4' ): ?>
			<div class="container">
				<div class="row">
					<?php foreach( $settings['items'] as $item ): ?>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-funfacts-item with-box-shadow" style="background-image:url(<?php echo esc_url( $settings['number_bg']['url'] ); ?>);">
								<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
								<p><?php echo esc_html( $item['title'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php elseif( $settings['funfacts_style'] == '5' ): ?>
			<div class="funfacts-area-three bg-fff8f8 pt-100 pb-70">
				<div class="container">
					<div class="row">
						<?php foreach( $settings['items'] as $item ): ?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-6">
								<div class="funfacts-box">
									<div class="content">
										<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
										<p><?php echo esc_html( $item['title'] ); ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php elseif( $settings['funfacts_style'] == '6' ): ?>
			<div class="container">
				<div class="row">
					<?php foreach( $settings['items'] as $item ): ?>
						<div class="col-lg-3 col-md-3 col-sm-3 col-6">
							<div class="funfacts-box">
								<div class="content">
									<h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><?php echo esc_html( $item['number_suffix'] ); ?></h3>
									<p><?php echo esc_html( $item['title'] ); ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new eCademy_Funfacts );