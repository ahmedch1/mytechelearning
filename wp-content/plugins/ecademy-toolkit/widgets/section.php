<?php
/**
 * Section Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Section extends Widget_Base {

	public function get_name() {
        return 'Section';
    }

	public function get_title() {
        return esc_html__( 'Section', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-handle';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Section',
			[
				'label' => esc_html__( 'eCademy Section', 'ecademy-toolkit' ),
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
                        '3'         => __( 'Style Three(with image)', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Education for everyone', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Online Coaching Lessons For Remote Learning', 'ecademy-toolkit'),
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
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Apply to Become a Teacher', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => ['2', '3'],
                    ]
				]
			);

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
                    'default' 	=> __('Start For Free', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => ['2', '3'],
                    ]
				]
			);

            $this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                    'condition' => [
                        'style' => ['2', '3'],
                    ]
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
                    'condition' => [
                        'style' => ['2', '3'],
                    ]
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
                'shape_image1',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => ['2', '3'],
                    ]
                ]
            );

            $this->add_control(
                'shape_image2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );
            $this->add_control(
                'shape_image3',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
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
                        '{{WRAPPER}} .section-title .sub-title, .premium-access-content .sub-title,.premium-access-content-style-two .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title .sub-title, .premium-access-content .sub-title, .premium-access-content-style-two .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h5, .section-title h6, .section-title h1, .premium-access-content h2, .premium-access-content h3, .premium-access-content h4, .premium-access-content h5, .premium-access-content h5, .premium-access-content h6, .premium-access-content h1, .premium-access-content-style-two h2, .premium-access-content-style-two h3, .premium-access-content-style-two h4, .premium-access-content-style-two h5, .premium-access-content-style-two h5, .premium-access-content-style-two h6' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title h2, .section-title h3, .section-title h4, .section-title h5, .section-title h5, .section-title h6, .section-title h1, .premium-access-content h2, .premium-access-content h3, .premium-access-content h4, .premium-access-content h5, .premium-access-content h5, .premium-access-content h6, .premium-access-content h1, .premium-access-content-style-two h2, .premium-access-content-style-two h3, .premium-access-content-style-two h4, .premium-access-content-style-two h5, .premium-access-content-style-two h5, .premium-access-content-style-two h6',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title p, .premium-access-content p, .premium-access-content-style-two p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .section-title p, .premium-access-content p, .premium-access-content-style-two p',
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
            <?php if( $settings['style'] == '1' ): ?>
                <div class="section-title">
                    <?php if( $settings['top_title'] != '' ): ?>
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                    <?php endif; ?>
                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                </div>
            <?php elseif( $settings['style'] == '2' ):
                if ( is_user_logged_in() ):
                    $button_text = $settings['user_button_text'];
                else:
                    $button_text = $settings['button_text'];
                endif;
                ?>
                <div class="premium-access-area ptb-100">
                    <div class="container">
                        <div class="premium-access-content">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                        <?php if( $button_text ):
                            // Button Icon
                            if( $settings['button_icon'] != '' ):
                                $icon = $settings['button_icon'];
                            else:
                                $icon = 'flaticon-agenda';
                            endif;

                            // Get Button Link
                            if($settings['link_type'] == 1){
                                $link = get_page_link( $settings['link_to_page'] );
                            } else {
                                $link = $settings['ex_link'];
                            }
                        ?>
                            <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                        <?php endif; ?>
                        </div>
                    </div>

                    <?php if( $settings['shape_image1']['url'] != '' ): ?>
                        <div class="shape3">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape_image2']['url'] != '' ): ?>
                        <div class="shape4">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape_image2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( $settings['shape_image2']['url'] != '' ): ?>
                        <div class="shape8">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape_image3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php elseif( $settings['style'] == '3' ):
                if ( is_user_logged_in() ):
                    $button_text = $settings['user_button_text'];
                else:
                    $button_text = $settings['button_text'];
                endif;
                ?>
                <div class="premium-access-area-two">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="premium-access-content-style-two">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                                    <?php if( $button_text ):
                                        // Button Icon
                                        if( $settings['button_icon'] != '' ):
                                            $icon = $settings['button_icon'];
                                        else:
                                            $icon = 'flaticon-agenda';
                                        endif;

                                        // Get Button Link
                                        if($settings['link_type'] == 1){
                                            $link = get_page_link( $settings['link_to_page'] );
                                        } else {
                                            $link = $settings['ex_link'];
                                        }
                                    ?>
                                        <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['shape_image1']['url'] != '' ): ?>
                                    <div class="premium-access-image-style-two">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['shape_image1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Section );