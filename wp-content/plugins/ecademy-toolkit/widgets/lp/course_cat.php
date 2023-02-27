<?php
/**
 * Courses Categories Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Courses_Categories extends Widget_Base {

	public function get_name() {
        return 'eCademy_Courses_Categories';
    }

	public function get_title() {
        return __( 'Courses Categories', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-basket-light';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Courses_Categories',
			[
				'label' => __( 'Courses Categories Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'ecademy-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('View All Categories', 'ecademy-toolkit'),
				]
            );

            $this->add_control(
				'button_icon',
				[
					'label' => __( 'Button Icon', 'ecademy-toolkit' ),
					'type' => Controls_Manager::ICON,
				]
            );

            $this->add_control(
                'link_type',
                [
                    'label' => esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'  => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' => esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'=>esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'courses_text',
                [
                    'label'=>esc_html__('Courses Title', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'label' => __( 'Courses', 'ecademy-toolkit' ),
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'plugin_type', [
                    'label' => __( 'Select Your Activate Plugin', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' 	=> [
                        'lp'         => esc_html__( 'LearnPress', 'ecademy-toolkit' ),
                        'tutor'      => esc_html__( 'Tutor LMS', 'ecademy-toolkit' ),
                        'ld'        => esc_html__( 'LearnDash', 'ecademy-toolkit' ),
                    ],
                    'default' => 'lp',
                ]
            );
            $repeater->add_control(
                'cat_name', [
                    'label' => __( 'Choose Category', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => ecademy_toolkit_get_courses_cat_list(),
                    'condition' => [
                        'plugin_type' => 'lp',
                    ]
                ]
            );
            $repeater->add_control(
                'tutor_cat_name', [
                    'label' => esc_html__( 'Choose Category', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_tutor_courses_cat_list(),
                    'condition' => [
                        'plugin_type' => 'tutor',
                    ]
                ]
            );
            $repeater->add_control(
                'ld_cat_name', [
                    'label' => esc_html__( 'Choose Category', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_ld_courses_cat_list(),
                    'condition' => [
                        'plugin_type' => 'ld',
                    ]
                ]
            );
            $repeater->add_control(
                'card_bg', [
                    'label'=>esc_html__('Background Image', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: MEDIA,
                ]
            );

            $this->add_control(
                'slider_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'courses_categories_us_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-categories-box .content h3' => 'color: {{VALUE}}',
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
							'max' => 100,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-categories-box .content h3' => 'font-size: {{SIZE}}px;',
					],
				]
            );

            $this->add_control(
				'desc_color',
				[
					'label' => __( 'Info Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-categories-box .content span' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'desc_size',
				[
					'label' => __( 'Info Font Size', 'ecademy-toolkit' ),
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
						'{{WRAPPER}} .single-categories-box .content span' => 'font-size: {{SIZE}}px;',
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

        // Get Button Link
        $link = '';
        if($settings['link_type'] == 1){
            $link = get_page_link($settings['link_to_page']);
        } else {
            $link = $settings['ex_link'];
        }

        // Button Icon
        if( $settings['button_icon'] != '' ):
            $icon = $settings['button_icon'];
        else:
            $icon = 'flaticon-user';
        endif;

		?>
        <div class="container">
            <div class="row">
                <?php foreach( $settings['slider_item'] as $item ): ?>
                    <?php
                        if( $item['plugin_type'] == 'lp' ):
                            $taxonomy = 'course_category';
                            $cat_name = $item['cat_name'];
                        elseif( $item['plugin_type'] == 'tutor' ):
                            $taxonomy = 'course-category';
                            $cat_name = $item['tutor_cat_name'];
                        elseif( $item['plugin_type'] == 'ld' ):
                            $taxonomy = 'ld_course_category';
                            $cat_name = $item['ld_cat_name'];
                        endif;
                        // Cat query
                        $args = array(
                            'orderby' => 'slug',
                            'parent' => 0,
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            'terms' => $cat_name
                        );

                        // Cat ID
                        $id = get_term_by( 'name', $cat_name, $taxonomy );
                        // Cat Link
                        $cat_link = get_category_link($id->term_id);
                    ?>
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-categories-box">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url($item['card_bg']['url']); ?>" alt="<?php echo $cat_name; ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url($item['card_bg']['url']); ?>" alt="<?php echo $cat_name; ?>">
                            <?php endif; ?>

                            <div class="content">
                                <h3><?php echo $cat_name; ?></h3>
                                <?php
                                $categories = get_categories( $args );
                                foreach( $categories as $category ){
                                    if( $category->name == $item['cat_name']  ): ?>
                                    <span><?php echo esc_html($category->category_count); ?> <?php echo esc_html( $settings['courses_text'] ); ?></span>
                                    <?php
                                    endif;
                                }
                                ?>

                            </div>
                            <a href="<?php echo esc_url( $cat_link ); ?>" class="link-btn"></a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if( $settings['button_text'] != '' ): ?>
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="categories-btn-box">
                            <a href="<?php echo esc_url( $link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
<?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Courses_Categories );