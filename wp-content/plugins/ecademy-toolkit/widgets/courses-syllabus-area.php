<?php
/**
 * Courses Syllabus Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Courses_Syllabus extends Widget_Base {

	public function get_name() {
        return 'eCademy_Courses_Syllabus';
    }

	public function get_title() {
        return esc_html__( 'Courses Syllabus', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-post-list';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Courses_Syllabus',
			[
				'label' => esc_html__( 'eCademy Courses Syllabus', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'ecademy-toolkit' ),
                    'types' => [ 'classic' ],
                    'selector' => '{{WRAPPER}} .download-syllabus-area::before',
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
                    'default' => esc_html__('Download Courses Syllabus', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Your email address will not be published. Required fields are marked *', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'shortcode',
                [
                    'label' => esc_html__( 'Contact From 7 Shortcode', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
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
                ]
			);

			$this->add_control(
                'shape3',
                [
                    'label'		=> esc_html__('Shape Image Three', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: MEDIA,
                ]
            );


        $this->end_controls_section();

        $this->start_controls_section(
			'blog_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .download-syllabus-form h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .download-syllabus-form h2',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .download-syllabus-form p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .download-syllabus-form p',
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

        <div class="download-syllabus-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <?php if( $settings['image']['url'] != '' ): ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="download-syllabus-image">
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                    <?php else: ?>
                        <div class="col-lg-12 col-md-12">
                    <?php endif; ?>
                        <div class="download-syllabus-form">

                            <h2><?php echo wp_kses_post( $settings['title'] ); ?></h2>
                            <p><?php echo esc_html( $settings['content'] ); ?></p>

                            <?php echo do_shortcode( $settings['shortcode'] ); ?>

                            <?php if( $settings['shape1']['url'] != '' ): ?>
                                <div class="syllabus-shape1">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_html( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_html( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image One', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $settings['shape2']['url'] != '' ): ?>
                                <div class="syllabus-shape2">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape2', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape2', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $settings['shape3']['url'] != '' ): ?>
                                <div class="syllabus-shape3">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image Three', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Courses_Syllabus );