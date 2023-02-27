<?php
/**
 * Grid Cards Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Grid_Cards extends Widget_Base {

	public function get_name() {
        return 'eCademy_Grid_Cards';
    }

	public function get_title() {
        return esc_html__( 'Grid Cards', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-columns';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'ecademy_Grid_Cards_controls',
			[
				'label' => esc_html__( 'Grid Cards Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Choose Columns', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => esc_html__( '1', 'ecademy-toolkit' ),
                        '2'   => esc_html__( '2', 'ecademy-toolkit' ),
                        '3'   => esc_html__( '3', 'ecademy-toolkit' ),
                        '4'   => esc_html__( '4', 'ecademy-toolkit' ),
                        'default'   => esc_html__( 'Default', 'ecademy-toolkit' ),
                    ],
                    'default' => 'default',
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
                    'default'   => esc_html__('One-On-One Coaching', 'ecademy-toolkit'),
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'     => __( 'Content', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Excepteur sint occaecat cupidatat non proident, unt in culpa qui officia deserunt mollit anim id est laborum. But I must explain to you how all this mistaken idea of denouncing pleasure and praising.', 'ecademy-toolkit'),
                ]
            );
            
            $repeater->add_control(
                'link_text', [
                    'label'     => __( 'Link Text', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => esc_html__('Discover More', 'ecademy-toolkit'),
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
                ]
            );

            $this->add_control(
                'link_tab_type',
                [
                    'label' => esc_html__( 'Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '_blank'              => esc_html__( 'Opens the linked document in a new window or tab', 'ecademy-toolkit' ),
                        '_self'              => esc_html__( '	Opens the linked document in the same frame as it was clicked', 'ecademy-toolkit' ),
                        '_parent'              => esc_html__( 'Opens the linked document in the parent frame', 'ecademy-toolkit' ),
                        '_top'              => esc_html__( 'Opens the linked document in the full body of the window', 'ecademy-toolkit' ),
                    ],
                    'default' => '_self',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'Grid_Cards_style',
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
                    'selector' => '{{WRAPPER}} .single-coaching-types-box h3',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-coaching-types-box h3' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-coaching-types-box p',
                ]
            );

            $this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-coaching-types-box p' => 'color: {{VALUE}}',
					],
				]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'link_typography',
                    'label' => __( 'Link Text Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-coaching-types-box .link-btn',
                ]
            );

            $this->add_control(
				'link_color',
				[
					'label' => __( 'Link Text Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-coaching-types-box .link-btn' => 'color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'link_hover_color',
				[
					'label' => __( 'Link Text Hover Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-coaching-types-box .link-btn:hover' => 'color: {{VALUE}}',
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

        // Card Columns
        $columns = $settings['columns'];
        if ($columns == '1') {
            $column = 'col-lg-12 col-sm-6 col-md-6';
        }elseif ($columns == '2') {
            $column = 'col-lg-6 col-sm-6 col-md-6';
        }elseif ($columns == '3') {
            $column = 'col-lg-4 col-md-6';
        }elseif ($columns == '4') {
            $column = 'col-lg-3 col-sm-6 col-md-6';
        }
        if ($columns == 'default') {
            $column = 'col-lg-4 col-md-6';
        }
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <?php foreach( $settings['card_item'] as $item ):

                    // Get Button Link
                    if( $item['link_type'] == 1 ){
                        $link = get_page_link( $item['link_to_page'] );
                    } else {
                        $link = $item['ex_link'];
                    }
                    ?>
                    <div class="<?php echo esc_attr($column); ?>">
                        <div class="single-coaching-types-box">
                            <?php if(  $item['image']['url'] != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            <h3 class="inter-font"><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo wp_kses_post( $item['content'] ); ?></p>

                            <?php if( $link != '' ): ?>
                                <a target="<?php echo esc_attr($settings['link_tab_type']); ?>" href ="<?php echo esc_url( $link ); ?>" class="link-btn"><?php echo esc_html( $item['link_text'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Grid_Cards );