<?php
/**
 * Video Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Video_Area extends Widget_Base {

	public function get_name() {
        return 'eCademy_Video_Area';
    }

	public function get_title() {
        return __( 'Video Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-video-camera';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Video_Area',
			[
				'label' => __( 'Video Area Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'image',
				[
					'label' => __( 'Image', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
			);

			$this->add_control(
				'video_link',
				[
					'label' => __( 'Video Link(YouTube)', 'ecademy-toolkit' ),
					'type' => Controls_Manager::TEXT,
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
		<div class="video-area">
			<div class="container">
				<div class="video-box mt-0">
					<?php if( $settings['image']['url'] != '' ): ?>
						<div class="image">
							<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="shadow" alt="<?php echo esc_attr__( 'Video Image', 'ecademy-toolkit' ); ?>">
						</div>
					<?php endif; ?>

					<?php if( $settings['video_link'] != '' ): ?>
						<a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Video_Area );