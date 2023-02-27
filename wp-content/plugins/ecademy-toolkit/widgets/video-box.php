<?php
/**
 * Video Box Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Video_Box extends Widget_Base {

	public function get_name() {
        return 'eCademy_Video_Box';
    }

	public function get_title() {
        return __( 'Video Box', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-video-camera';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Video_Box',
			[
				'label' => __( 'Video Box Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'style',
				[
					'label' => __( 'Style', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'         => __( 'Style One', 'ecademy-toolkit' ),
						'2'         => __( 'Style Two', 'ecademy-toolkit' ),
					],
					'default' => '1',
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
					'label' => __( 'Video Link', 'ecademy-toolkit' ),
					'type' => Controls_Manager::TEXT,
				]
            );

			$this->add_control(
				'shape1',
				[
					'label' => __( 'Shape Image One', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );
			$this->add_control(
				'shape2',
				[
					'label' => __( 'Shape Image Two', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );
			$this->add_control(
				'shape3',
				[
					'label' => __( 'Shape Image Three', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );
			$this->add_control(
				'shape4',
				[
					'label' => __( 'Shape Image Four', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );
			$this->add_control(
				'shape5',
				[
					'label' => __( 'Shape Image Five', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
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
		<?php if( $settings['style'] == '1' ): ?>
			<div class="video-box">
				<?php if( $settings['image']['url'] != '' ): ?>
					<div class="image">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="shadow" alt="<?php echo esc_attr__( 'Video Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="shadow" alt="<?php echo esc_attr__( 'Video Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if( $settings['video_link'] != '' ): ?>
					<a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i></a>
				<?php endif; ?>

				<?php if( $settings['shape1']['url'] != '' ): ?>
					<div class="shape10" data-speed="0.03" data-revert="true">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if( $settings['shape2']['url'] != '' ): ?>
				<div class="shape2" data-speed="0.03" data-revert="true">
					<?php if( $is_lazyloader == true ): ?>
						<img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php else: ?>
						<img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if( $settings['shape3']['url'] != '' ): ?>
				<div class="shape3" data-speed="0.03" data-revert="true">
					<?php if( $is_lazyloader == true ): ?>
						<img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php else: ?>
						<img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if( $settings['shape4']['url'] != '' ): ?>
				<div class="shape4" data-speed="0.03" data-revert="true">
					<?php if( $is_lazyloader == true ): ?>
						<img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php else: ?>
						<img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if( $settings['shape5']['url'] != '' ): ?>
				<div class="shape9" data-speed="0.03" data-revert="true">
					<?php if( $is_lazyloader == true ): ?>
						<img sm-src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php else: ?>
						<img src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php elseif( $settings['style'] == '2' ): ?>
			<div class="success-story-area pb-100">
				<div class="container">
					<div class="video-box mt-0">
						<?php if( $settings['image']['url'] != '' ): ?>
							<div class="image">
								<?php if( $is_lazyloader == true ): ?>
									<img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="shadow" alt="<?php echo esc_attr__( 'Video Image', 'ecademy-toolkit' ); ?>">
								<?php else: ?>
									<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" class="shadow" alt="<?php echo esc_attr__( 'Video Image', 'ecademy-toolkit' ); ?>">
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if( $settings['video_link'] != '' ): ?>
							<a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i></a>
						<?php endif; ?>

						<?php if( $settings['shape1']['url'] != '' ): ?>
							<div class="shape10" data-speed="0.03" data-revert="true">
								<?php if( $is_lazyloader == true ): ?>
									<img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
								<?php else: ?>
									<img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
								<?php endif; ?>
							</div>
						<?php endif; ?>

					</div>
				</div>

				<?php if( $settings['shape2']['url'] != '' ): ?>
					<div class="shape2" data-speed="0.03" data-revert="true">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if( $settings['shape3']['url'] != '' ): ?>
					<div class="shape3" data-speed="0.03" data-revert="true">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if( $settings['shape4']['url'] != '' ): ?>
					<div class="shape4" data-speed="0.03" data-revert="true">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if( $settings['shape5']['url'] != '' ): ?>
					<div class="shape9" data-speed="0.03" data-revert="true">
						<?php if( $is_lazyloader == true ): ?>
							<img sm-src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php else: ?>
							<img src="<?php echo esc_url( $settings['shape5']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Video_Box );