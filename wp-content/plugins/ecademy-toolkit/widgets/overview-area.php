<?php
/**
 * Overview Area  Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Overview_Area  extends Widget_Base {

	public function get_name() {
        return 'Overview_Area ';
    }

	public function get_title() {
        return esc_html__( 'Overview Area ', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-single-post';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Overview_Area ',
			[
				'label' => esc_html__( 'eCademy Overview Area ', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => esc_html__( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'         => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Distance Learning', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Feel Like You Are Attending Your Classes Physically!', 'ecademy-toolkit'),
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
                    'default' => esc_html__('eCademy training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your classes virtually by sitting in your comfort zone. Our flexible learning initiatives will help you to learn better and quicker than the traditional ways of learning skills.', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
				'user_button_text',
				[
					'label' 	=> esc_html__( 'User Logged in Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Get Started Now', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '1',
                    ]
				]
			);

            $this->add_control(
				'button_text',
				[
					'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Get Started Now', 'ecademy-toolkit'),
                    'condition' => [
                        'style' => '1',
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
                        'style' => '1',
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
                        'style' => '1',
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

        $this->end_controls_section();

        // Buttons
        $this->start_controls_section(
            'buttons_sec',
            [
                'label' => __( 'Buttons', 'ecademy-toolkit' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'btn_top_title', [
                    'label' => __( 'Button Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => 'GET IT ON'
                ]
            );
            $repeater->add_control(
                'btn_title', [
                    'label' => __( 'Button Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => 'Google Play'
                ]
            );

            $repeater->add_control(
                'btn_img', [
                    'label' => __( 'Button Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $repeater->add_control(
                'btn_url', [
                    'label' => __( 'Button URL', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::URL,
                    'default' => [
                        'url' => '#'
                    ]
                ]
            );

            $this->add_control(
                'buttons', [
                    'label' => __( 'Create buttons', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'title_field' => '{{{ btn_title }}}',
                    'fields' => $repeater->get_controls(),
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

        $this->end_controls_section(); // End Buttons

        $this->start_controls_section(
			'section_images',
			[
				'label' => esc_html__( 'Images', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'image1',
                [
                    'label' => esc_html__( 'Overview Area Image', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label' => esc_html__( 'Shape Image One', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'shape2',
                [
                    'label' => esc_html__( 'Shape Image Two', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'shape3',
                [
                    'label' => esc_html__( 'Shape Image Three', 'ecademy-toolkit' ),
                    'type'	 => Controls_Manager::MEDIA,
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'shape4',
                [
                    'label' => esc_html__( 'Shape Image Four', 'ecademy-toolkit' ),
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
                        '{{WRAPPER}} .overview-box .overview-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .overview-box .overview-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .overview-box .overview-content h2, .overview-box .overview-content h3, .overview-box .overview-content h4, .overview-box .overview-content h5, .overview-box .overview-content h5, .overview-box .overview-content h6, .overview-box .overview-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .overview-box .overview-content h2, .overview-box .overview-content h3, .overview-box .overview-content h4, .overview-box .overview-content h5, .overview-box .overview-content h5, .overview-box .overview-content h6, .overview-box .overview-content h1',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .overview-box .overview-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .overview-box .overview-content p',
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

        if ( is_user_logged_in() ):
            $button_text = $settings['user_button_text'];
        else:
            $button_text = $settings['button_text'];
        endif;
        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="container">
                <div class="overview-box">
                    <div class="overview-content">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                        <?php if( $button_text != '' ):
                            // Button Icon
                            if( $settings['button_icon'] != '' ):
                                $icon = $settings['button_icon'];
                            else:
                                $icon = 'flaticon-user';
                            endif;
                            ?>
                            <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                        <?php endif; ?>
                    </div>

                    <?php if( $settings['image1']['url'] != '' ): ?>
                        <div class="overview-image">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title_tag'] ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title_tag'] ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="container">
                <div class="overview-box">
                    <?php if( $settings['image1']['url'] != '' ): ?>
                        <div class="overview-image">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title_tag'] ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['image1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title_tag'] ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="overview-content">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                        <div class="btn-box">
                            <?php
                            foreach ($settings['buttons'] as $button) {
                                echo "<a href='{$button['btn_url']['url']}' class='playstore-btn'> <img src='{$button['btn_img']['url']}' alt='{$button['btn_title']}'> {$button['btn_top_title']} <span>{$button['btn_title']}</span> </a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $settings['shape1']['url'] != '' ): ?>
                <div class="shape2" data-speed="0.06" data-revert="true">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape2']['url'] != '' ): ?>
                <div class="shape3" data-speed="0.06" data-revert="true">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape3']['url'] != '' ): ?>
                <div class="shape4" data-speed="0.06" data-revert="true">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if( $settings['shape4']['url'] != '' ): ?>
                <div class="shape9" data-speed="0.06" data-revert="true">
                    <?php if( $is_lazyloader == true ): ?>
                        <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__('Shape Image', 'ecademy-toolkit') ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Overview_Area  );