<?php
/**
 * Partner Logo Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Partner_Logo extends Widget_Base {

	public function get_name() {
        return 'Partner_Logo';
    }

	public function get_title() {
        return __( 'Partner Logo', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo Control', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
			$this->add_control(
				'section_style',
				[
					'label' => esc_html__( 'Section Style', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'              => esc_html__( 'Style One', 'ecademy-toolkit' ),
						'2'              => esc_html__( 'Style Two(with slider)', 'ecademy-toolkit' ),
					],
					'default' => '1',
				]
			);

			$repeater = new Repeater();
            $repeater->add_control(
                'logo', [
					'type'    => Controls_Manager::MEDIA,
					'label'   => esc_html__( 'Logo', 'ecademy-toolkit' ),
                ]
            );
            $this->add_control(
                'logos',
                [
                    'label'   => esc_html__( 'Add Partner Logo', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'partner_styling',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
				'padding_top',
				[
					'label' => __( 'Padding Top', 'ecademy-toolkit' ),
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
						'{{WRAPPER}} .partner-area.border-bottom' => 'padding-top: {{SIZE}}px;',
					],
				]
            );

            $this->add_responsive_control(
				'padding_bottom',
				[
					'label' => __( 'Padding Bottom', 'ecademy-toolkit' ),
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
						'{{WRAPPER}} .partner-area.border-bottom' => 'padding-bottom: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'border_color',
				[
					'label' => esc_html__( 'Border Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .partner-area.border-bottom' => 'border-bottom-color: {{VALUE}} !important',
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
		<?php if($settings['section_style'] == '1'): ?>
			<div class="partner-area pt-100 pb-70 border-bottom">
				<div class="container">
					<div class="row align-items-center">
						<?php foreach( $settings['logos'] as $item ): ?>
							<div class="col-lg-2 col-6 col-sm-3 col-md-3">
								<div class="single-partner-item">
									<?php if( $is_lazyloader == true ): ?>
										<img sm-src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'ecademy-toolkit' ); ?>">
									<?php else: ?>
										<img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'ecademy-toolkit' ); ?>">
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php elseif($settings['section_style'] == '2'): ?>
			<div class="partner-area ptb-100">
				<div class="container">
					<div class="partner-slides owl-carousel owl-theme">
						<?php foreach( $settings['logos'] as $item ): ?>
							<div class="partner-item">
								<?php if( $is_lazyloader == true ): ?>
									<img sm-src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'ecademy-toolkit' ); ?>">
								<?php else: ?>
									<img src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Logo', 'ecademy-toolkit' ); ?>">
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register( new eCademy_Partner_Logo );