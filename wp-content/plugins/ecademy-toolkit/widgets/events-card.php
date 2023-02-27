<?php
/**
 * Events Area Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Events_Grid extends Widget_Base {

	public function get_name() {
        return 'eCademy_Events_Grid';
    }

	public function get_title() {
        return __( 'Events Grid', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-toggle';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'course_section',
			[
				'label' => __( 'Events Grid', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Events Order By', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'DESC'      => __( 'DESC', 'ecademy-toolkit' ),
					'ASC'       => __( 'ASC', 'ecademy-toolkit' ),
				],
				'default' => 'DESC',
            ]
        );
        
        $this->add_control(
            'cat_name', [
                'label' => esc_html__( 'Category', 'ecademy-toolkit' ),
                'description' => esc_html__( 'Enter the category slugs separated by commas (Eg. cat1, cat2)', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'count',
			[
				'label' => __( 'Count', 'ecademy-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
        );

        $this->add_control(
            'bottom_title',
            [
                'label' => __( 'Bottom Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Get into details now?', 'ecademy-toolkit'),
            ]
        );
        $this->add_control(
            'bottom_link_title',
            [
                'label' => __( 'Bottom Link Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('View all events', 'ecademy-toolkit'),
            ]
        );

        $this->add_control(
            'link_type',
            [
                'label' 		=> esc_html__( 'Link Type', 'ecademy-toolkit' ),
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
                'label' 		=> esc_html__( 'Link Page', 'ecademy-toolkit' ),
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
                'label'		=> esc_html__('External Link', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: TEXT,
                'condition' => [
                    'link_type' => '2',
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
                'event_title_color',
                [
                    'label' => esc_html__( 'Event Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kitchen-events-box .events-content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_title_typography',
                    'label' => __( 'Event Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kitchen-events-box .events-content h3',
                ]
            );

            $this->add_control(
                'event_top_title_color',
                [
                    'label' => esc_html__( 'Tag Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kitchen-events-box .events-content .category' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_top_title_typography',
                    'label' => __( 'Tag Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kitchen-events-box .events-content .category',
                ]
            );

            $this->add_control(
                'event_date_color',
                [
                    'label' => esc_html__( 'Meta Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-kitchen-events-box .events-content .events-content-footer li' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'event_date_typography',
                    'label' => __( 'Meta Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-kitchen-events-box .events-content .events-content-footer li',
                ]
            );

            $this->add_control(
                'link_color',
                [
                    'label' => esc_html__( 'Link Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .kitchen-events-info p a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'link_typography',
                    'label' => __( 'Link Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .kitchen-events-info p a',
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

        // Post Query
        if( $settings['cat_name'] != '' ) {
            $args = array(
                'post_type'     => 'tp_event',
                'posts_per_page'=> $settings['count'],
                'order'         => $settings['order'],
                'tax_query'     => array(
                    array(
                        'taxonomy'      => 'tp_event_category',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false
                    )
                )
            );
        } else {
            $args = array(
                'post_type'         => 'tp_event',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'meta_key'          => '_thumbnail_id',
            );
        }
        $event_array = new \WP_Query( $args );

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <?php while($event_array->have_posts()): $event_array->the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-kitchen-events-box">
                            <div class="events-image">
                                <a href="<?php the_permalink(); ?>" class="d-block">
                                    <?php the_post_thumbnail( 'ecademy_default_thumb' ); ?>
                                </a>
                            </div>
                            <div class="events-content">
                                <?php
                                $posttags = get_the_tags();
                                $count = 0; $sep = '';
                                if ( $posttags ) {
                                    foreach( $posttags as $tag ) {
                                        $count++;
                                        echo '<a class="category" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
                                        if( $count > 0 ) break;
                                    }
                                }
                                ?>
                                <h3 class="font-weight-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                <ul class="events-content-footer d-flex justify-content-between align-items-center">
                                    <?php
                                    $date_start = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                                    $date_string = date_i18n( get_option( 'date_format' ), $date_start ); ?>
                                    <li><i class='flaticon-calendar'></i> <?php echo esc_html( $date_string ); ?></li>
                                    <li><i class='bx bx-map'></i> <?php echo esc_html( get_field( 'event_location' ) ); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
                
                <div class="col-lg-12 col-md-12">
                    <div class="kitchen-events-info">
                        <p><?php echo esc_html( $settings['bottom_title'] ); ?> <a href="<?php echo esc_url( $link ); ?>"><strong><?php echo esc_html( $settings['bottom_link_title'] ); ?></strong>​</a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Events_Grid );