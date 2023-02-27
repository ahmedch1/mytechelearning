<?php
/**
 * About Me Two Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_About_Me_2 extends Widget_Base {

	public function get_name() {
        return 'About_Me_2';
    }

	public function get_title() {
        return esc_html__( 'About Me Two', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_About_Me_2',
			[
				'label' => esc_html__( 'eCademy About Area Me', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('ABOUT ME', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Keep you accountable for your goals as a business and as a leader within your organization', 'ecademy-toolkit'),
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
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
				'video_title',
				[
					'label' 	=> esc_html__( 'Video Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Watch Video', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'video_link',
				[
					'label' 	=> esc_html__( 'YouTube Video Link', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('https://www.youtube.com/watch?v=Y5KCDWi7h9o', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
                'quote',
                [
                    'label' => esc_html__( 'Quote', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('“I wake up every morning and think to myself, ‘how far can I push this company in the next 24 hours.’”', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'bottom_content',
                [
                    'label' => esc_html__( 'Bottom Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Join For Free', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
				]
            );

            $this->add_control(
                'link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'img',
                [
                    'label' => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'shape_img',
                [
                    'label' => esc_html__( 'Shape Image 1', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_img2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
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
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-about-me-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-about-me-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-about-me-content h2, .motivation-about-me-content h3, .motivation-about-me-content h4, .motivation-about-me-content h5, .motivation-about-me-content h5, .motivation-about-me-content h6, .motivation-about-me-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-about-me-content h2, .motivation-about-me-content h3, .motivation-about-me-content h4, .motivation-about-me-content h5, .motivation-about-me-content h5, .motivation-about-me-content h6, .motivation-about-me-content h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-about-me-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-about-me-content p',
                ]
            );
            

            $this->add_control(
                'quote_color',
                [
                    'label' => esc_html__( 'Quote Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .motivation-about-me-content .quote' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'quote_typography',
                    'label' => __( 'Quote Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .motivation-about-me-content .quote',
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

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }
        ?>
        <div class="motivation-about-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="motivation-about-image">
                            <?php if( $settings['img']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['img']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['img']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Me Two', 'ecademy-toolkit' ); ?>">
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($settings['video_title']): ?>
                                <div class="video-btn-box">
                                    <a href="<?php echo esc_url($settings['video_link']); ?>" class="video-btn popup-youtube"><i class="flaticon-play"></i> <?php echo esc_html($settings['video_title']); ?></a>
                                </div>
                            <?php endif; ?>

                            <div class="motivation-shape-4">
                                <?php if( $settings['shape_img']['url'] != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php echo esc_url( $settings['shape_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( $settings['shape_img']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Me Two', 'ecademy-toolkit' ); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="motivation-about-me-content">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                            <?php if($settings['quote']): ?>
                                <div class="quote">
                                    <?php echo wp_kses_post( $settings['quote'] ); ?>
                                </div>
                            <?php endif; ?>
                            <p><?php echo wp_kses_post( $settings['bottom_content'] ); ?></p>
                            <?php if( $settings['button_text'] != '' ): ?>
                                <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr($settings['button_icon']); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
                            <?php endif; ?>                    </div>
                    </div>
                </div>
            </div>

            <div class="motivation-shape-5">
                <?php if( $settings['shape_img2']['url'] != '' ): ?>
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Us' ); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape_img2']['url'] ); ?>" alt="<?php echo esc_attr__( 'About Me Two', 'ecademy-toolkit' ); ?>">
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_About_Me_2 );