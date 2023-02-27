<?php
/**
 * Language Courses Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Language_Courses extends Widget_Base {

	public function get_name() {
        return 'eCademy_Language_Courses';
    }

	public function get_title() {
        return esc_html__( 'Features Area', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-icon-box';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Language_Courses_controls',
			[
				'label' => esc_html__( 'Language Courses Controls', 'ecademy-toolkit' ),
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

            $repeater = new Repeater();
            $repeater->add_control(
                'image', [
                    'label'     => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Chinese', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'link_text', [
                    'label'     => __( 'Link Text', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('View More', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'default_icon', [
                    'label' => esc_html__( 'Select Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $repeater->add_control(
                'link_type', [
                    'label'     => __( 'Link Type', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'     => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2'     => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );
            $repeater->add_control(
                'link_to_page', [
                    'label'     => __( 'Link Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );
            $repeater->add_control(
                'ex_link', [
                    'label'     => __( 'External Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );
            $this->add_control(
                'card_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'condition' => [
                        'style' => '1',
                    ]
                ]
            );


            $repeater2 = new Repeater();
            $repeater2->add_control(
                'yoga_image', [
                    'label'     => esc_html__( 'Image', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $repeater2->add_control(
                'yoga_title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Chinese', 'ecademy-toolkit'),
                ]
            );
            $repeater2->add_control(
                'yoga_content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', 'ecademy-toolkit'),
                ]
            );
            $repeater2->add_control(
                'yoga_link_text', [
                    'label'     => __( 'Link Text', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('View More', 'ecademy-toolkit'),
                ]
            );
            $repeater2->add_control(
                'yoga_link_type', [
                    'label'     => __( 'Link Type', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'     => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2'     => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );
            $repeater2->add_control(
                'yoga_link_to_page', [
                    'label'     => __( 'Link Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'yoga_link_type' => '1',
                    ]
                ]
            );
            $repeater2->add_control(
                'yoga_ex_link', [
                    'label'     => __( 'External Page', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'yoga_link_type' => '2',
                    ]
                ]
            );
            $this->add_control(
                'yoga_card_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater2->get_controls(),
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'features_boxes_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-language-courses-box h3, .single-yoga-courses-box .courses-content h3',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-language-courses-box h3, .single-yoga-courses-box .courses-content h3' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-language-courses-box p, .single-yoga-courses-box .courses-content p',
                ]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-language-courses-box p, .single-yoga-courses-box .courses-content p' => 'color: {{VALUE}}',
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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

		?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="boxes-area bg-f5f7fa">
                <div class="container">
                    <div class="row">
                        <?php foreach( $settings['card_item'] as $item ):
                            // Get Button Link
                            if( $item['link_type'] == 1 ){
                                $link = get_page_link( $item['link_to_page'] );
                            } else {
                                $link = $item['ex_link'];
                            }

                            // Icon
                            $icon =$item['default_icon'];
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-language-courses-box">
                                    <?php if( $item['image']['url'] != '' ): ?>
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                    <p><?php echo esc_html( $item['content'] ); ?></p>

                                    <?php if( $item['link_text'] != '' ): ?>
                                        <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $item
                                    ['link_text'] ); ?><span></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="container">
                <div class="row">
                    <?php foreach( $settings['yoga_card_item'] as $item ):
                        // Get Button Link
                        if( $item['yoga_link_type'] == 1 ){
                            $link = get_page_link( $item['yoga_link_to_page'] );
                        } else {
                            $link = $item['yoga_ex_link'];
                        }

                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-yoga-courses-box">
                                <?php if( $item['yoga_image']['url'] != '' ): ?>
                                    <div class="courses-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $item['yoga_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['yoga_title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $item['yoga_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['yoga_title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="courses-content">
                                    <h3><?php echo esc_html( $item['yoga_title'] ); ?></h3>
                                    <p><?php echo esc_html( $item['yoga_content'] ); ?></p>

                                    <?php if( $item['yoga_link_text'] != '' ): ?>
                                        <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><?php echo esc_html( $item
                                    ['yoga_link_text'] ); ?><span></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Language_Courses );