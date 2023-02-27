<?php
/**
 * Courses Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Courses extends Widget_Base {

	public function get_name() {
        return 'eCademy_Courses';
    }

	public function get_title() {
        return __( 'LearnPress Courses', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'course_section',
			[
				'label' => __( 'Courses', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'card_style',
            [
                'label' => __( 'Card Style', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'1'              => __( 'Style One', 'ecademy-toolkit' ),
					'2'              => __( 'Style Two (without boxshadow)', 'ecademy-toolkit' ),
					'3'              => __( 'Style Three', 'ecademy-toolkit' ),
					'4'              => __( 'Style Four', 'ecademy-toolkit' ),
					'5'              => __( 'Style Five(with slider)', 'ecademy-toolkit' ),
					'6'              => __( 'Style Six', 'ecademy-toolkit' ),
					'7'              => __( 'Style Seven(with slider)', 'ecademy-toolkit' ),
				],
				'default' => '1',
           ]
        );

        $this->add_control(
            'cat_name',
            [
                'label' => __( 'Choose Category', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => ecademy_toolkit_get_courses_cat_list(),
            ]
        );

        $this->add_control(
            'filter',
            [
                'label' => __( 'Courses Filter By', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'popular'               => __( 'Featured', 'ecademy-toolkit' ),
					'trending'              => __( 'Trending', 'ecademy-toolkit' ),
					'recent'                => __( 'Recent', 'ecademy-toolkit' ),
				],
				'default' => 'recent',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Courses Order By', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					'DESC'      => __( 'DESC', 'ecademy-toolkit' ),
					'ASC'       => __( 'ASC', 'ecademy-toolkit' ),
				],
				'default' => 'DESC',
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
            'lessons_title',
            [
                'label' 	=> esc_html__( 'Lessons Title', 'ecademy-toolkit' ),
                'type' 		=> Controls_Manager::TEXT,
                'default' 	=> __('Lessons', 'ecademy-toolkit'),
                'condition' => [
                    'card_style' => ['1', '2', '3', '4', '5', '6'],
                ]
            ]
        );

        $this->add_control(
            'students_title',
            [
                'label' 	=> esc_html__( 'Students Title', 'ecademy-toolkit' ),
                'type' 		=> Controls_Manager::TEXT,
                'default' 	=> __('Students', 'ecademy-toolkit'),
                'condition' => [
                    'card_style' => ['1', '2', '3', '4', '5', '6'],
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
                'type' 		=> Controls_Manager::TEXT,
                'default' 	=> __('View All Courses', 'ecademy-toolkit'),
                'condition' => [
                    'card_style' => ['4', '6'],
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
                    'card_style' => ['4', '6'],
                ]
            ]
        );

        $this->add_control(
            'btn_link_type',
            [
                'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                'type' 			=> Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' => [
                    '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                    '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                ],
                'condition' => [
                    'card_style' => ['4', '6'],
                ]
            ]
        );

        $this->add_control(
            'btn_link_to_page',
            [
                'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                'type' 			=> Controls_Manager::SELECT,
                'label_block' 	=> true,
                'options' 		=> ecademy_toolkit_get_page_as_list(),
                'condition' => [
                    'btn_link_type' => '1',
                ]
            ]
        );

        $this->add_control(
            'btn_ex_link',
            [
                'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                'type'		=> Controls_Manager:: TEXT,
                'condition' => [
                    'link_type' => '2',
                ]
            ]
        );

        $this->add_control(
            'bottom_title',
            [
                'label' => __( 'Bottom Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Get the most dedicated consultation for your life-changing course. Earn a certification for your effort and passion', 'ecademy-toolkit'),
                'condition' => [
                    'card_style' => ['1', '2', '3', '4', '5', '6'],
                ]
            ]
        );
        $this->add_control(
            'bottom_link_title',
            [
                'label' => __( 'Bottom Link Title', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Join Free Now.', 'ecademy-toolkit'),
                'condition' => [
                    'card_style' => ['1', '2', '3', '4', '5', '6'],
                ]
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
                'condition' => [
                    'card_style' => ['1', '2', '3', '4', '5', '6'],
                ]
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
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        if ( !ecademy_plugin_active( 'learnpress/learnpress.php' ) ) {
            if( is_user_logged_in() ):
                ?>
                <div class="container">
                    <div class="alert alert-danger" role="alert">
                        <?php echo esc_html__( 'Please Install and activated LearnPress plugin', 'ecademy-toolkit' ); ?>
                    </div>
                </div>
                <?php
            endif;
			return;
		}

        // Post Query
        if( $settings['cat_name'] != '' ) {
            if( $settings['filter'] == 'trending' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                    'tax_query'         => array(
                        array(
                            'taxonomy'      => 'course_category',
                            'field'         => 'slug',
                            'terms'         => $settings['cat_name'],
                            'hide_empty'    => false,
                        )
                    ),
                    'meta_query'	=> array(
                        'relation'		=> 'AND',
                        array(
                            'key'	 	=> 'trending_course',
                            'value'	  	=> true,
                            'compare' 	=> 'IN',
                        ),
                    ),
                );
            elseif( $settings['filter'] == 'popular' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                    'tax_query'         => array(
                        array(
                            'taxonomy'      => 'course_category',
                            'field'         => 'slug',
                            'terms'         => $settings['cat_name'],
                            'hide_empty'    => false,
                        )
                    ),
                    'ignore_sticky_posts' => true,
                    'meta_query'          => array(
                        array(
                            'key'   => '_lp_featured',
                            'value' => 'yes',
                        )
                    ),
                );
            else:
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                    'tax_query'         => array(
                        array(
                            'taxonomy'      => 'course_category',
                            'field'         => 'slug',
                            'terms'         => $settings['cat_name'],
                            'hide_empty'    => false,
                        )
                    )
                );
            endif;
        } else {

            if( $settings['filter'] == 'trending' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                    'meta_query'	=> array(
                        'relation'		=> 'AND',
                        array(
                            'key'	 	=> 'trending_course',
                            'value'	  	=> true,
                            'compare' 	=> 'IN',
                        ),
                    ),
                );
            elseif( $settings['filter'] == 'popular' ):
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                    'ignore_sticky_posts' => true,
                    'meta_query'          => array(
                        array(
                            'key'   => '_lp_featured',
                            'value' => 'yes',
                        )
                    ),
                );
            else:
                $args = array(
                    'post_type'         => 'lp_course',
                    'posts_per_page'    => $settings['count'],
                    'order'             => $settings['order'],
                    'meta_key'          => '_thumbnail_id',
                );
            endif;
        }

        $post_array = new \WP_Query( $args );

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }
        ?>
        <?php if( $settings['card_style'] != '4' && $settings['card_style'] != '5' && $settings['card_style'] != '6' && $settings['card_style'] != '7' ): ?>
            <div class="container">
                <div class="row">
                    <?php while($post_array->have_posts()): $post_array->the_post(); $course         = \LP_Global::course(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-courses-box <?php if( $settings['card_style'] == '2' ): ?>without-boxshadow<?php elseif( $settings['card_style'] == '3' ): ?>bg-color<?php endif; ?>">
                                <div class="courses-image">
                                    <a href="<?php the_permalink(); ?>" class="d-block image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                        <?php else: ?>
                                            <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                        <?php endif; ?>
                                    </a>

                                    <?php echo $course->get_course_price_html(); ?>
                                </div>
                                <div class="courses-content">
                                    <div class="course-author d-flex align-items-center">
                                        <?php ecademy_lp_the_loop_instructor(); ?>
                                    </div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_excerpt(); ?>

                                    <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                        <?php if(ecademy_lp_the_loop_lessons()): ?>
                                            <li>
                                                <i class='flaticon-agenda'></i>
                                                <?php echo ecademy_lp_the_loop_lessons(); ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(ecademy_lp_the_loop_students()): ?>
                                            <li>
                                                <i class='flaticon-people'></i>
                                                <?php echo ecademy_lp_the_loop_students(); ?> <?php echo esc_html( $settings['students_title'] ); ?>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

                    <?php if( !is_user_logged_in() ): ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="courses-info">
                                <p><?php echo esc_html( $settings['bottom_title'] ); ?> <a href="<?php echo esc_url( $link ); ?>"><strong><?php echo esc_html( $settings['bottom_link_title'] ); ?></strong>​</a></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif( $settings['card_style'] == '4' || $settings['card_style'] == '6' ):
            // Button Icon
            if( $settings['button_icon'] != '' ):
                $icon = $settings['button_icon'];
            else:
                $icon = 'flaticon-user';
            endif;

            // Get Button Link
            if($settings['btn_link_type'] == 1){
                $btn_link = get_page_link( $settings['btn_link_to_page'] );
            } else {
                $btn_link = $settings['btn_ex_link'];
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php while($post_array->have_posts()): $post_array->the_post(); $course         = \LP_Global::course(); ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="<?php if( $settings['card_style'] == '6' ): ?>single-courses-item without-box-shadow<?php else: ?>single-courses-item<?php endif; ?>">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="courses-image">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php the_post_thumbnail_url('ecademy_400x400'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                            <?php else: ?>
                                                <img src="<?php the_post_thumbnail_url('ecademy_400x400'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                            <?php endif; ?>

                                            <a href="<?php the_permalink(); ?>" class="link-btn"></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="courses-content">
                                            <?php echo $course->get_course_price_html(); ?>
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <ul class="courses-content-footer d-flex justify-content-between align-items-center">
                                                <?php if(ecademy_lp_the_loop_lessons()): ?>
                                                    <li>
                                                        <i class='flaticon-agenda'></i>
                                                        <?php echo ecademy_lp_the_loop_lessons(); ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(ecademy_lp_the_loop_students()): ?>
                                                    <li>
                                                        <i class='flaticon-people'></i>
                                                        <?php echo ecademy_lp_the_loop_students(); ?> <?php echo esc_html( $settings['students_title'] ); ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="courses-info">
                        <?php if( $settings['button_text'] != '' ): ?>
                            <a href="<?php echo esc_url( $btn_link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></a>
                        <?php endif; ?>
                        <?php if( !is_user_logged_in() ): ?>
                            <p><?php echo esc_html( $settings['bottom_title'] ); ?> <a href="<?php echo esc_url( $link ); ?>"><strong><?php echo esc_html( $settings['bottom_link_title'] ); ?></strong>​</a></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $settings['card_style'] == '5'): ?>
            <div class="container">
                <?php if( $settings['count'] == 1 ): ?>
                    <div class="col-lg-6 offset-lg-3">
                <?php else: ?>
                    <div class="courses-slides owl-carousel owl-theme">
                <?php endif; ?>
                    <?php while($post_array->have_posts()): $post_array->the_post(); $course         = \LP_Global::course(); ?>
                        <div class="single-courses-box <?php if( $settings['card_style'] == '2' ): ?>without-boxshadow<?php elseif( $settings['card_style'] == '3' ): ?>bg-color<?php endif; ?>">
                            <div class="courses-image">
                                <a href="<?php the_permalink(); ?>" class="d-block image">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                    <?php else: ?>
                                        <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                    <?php endif; ?>
                                </a>

                                <?php echo $course->get_course_price_html(); ?>
                            </div>
                            <div class="courses-content">
                                <div class="course-author d-flex align-items-center">
                                    <?php ecademy_lp_the_loop_instructor(); ?>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>

                                <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                    <?php if(ecademy_lp_the_loop_lessons()): ?>
                                        <li>
                                            <i class='flaticon-agenda'></i>
                                            <?php echo ecademy_lp_the_loop_lessons(); ?> <?php echo esc_html( $settings['lessons_title'] ); ?>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(ecademy_lp_the_loop_students()): ?>
                                        <li>
                                            <i class='flaticon-people'></i>
                                            <?php echo ecademy_lp_the_loop_students(); ?> <?php echo esc_html( $settings['students_title'] ); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <?php if( !is_user_logged_in() ): ?>
                    <div class="courses-info">
                        <p><?php echo esc_html( $settings['bottom_title'] ); ?> <a href="<?php echo esc_url( $link ); ?>"><strong><?php echo esc_html( $settings['bottom_link_title'] ); ?></strong>​</a></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if( $settings['card_style'] == '7'): ?>
            <div class="container">
                <?php if( $settings['count'] == 1 ): ?>
                    <div class="col-lg-6 offset-lg-3">
                <?php else: ?>
                    <div class="courses-slides-two owl-carousel owl-theme">
                <?php endif; ?>
                    <?php while($post_array->have_posts()): $post_array->the_post(); $course         = \LP_Global::course(); ?>
                        <div class="single-kindergarten-courses-box">
                            <div class="courses-image">
                                <a href="<?php the_permalink(); ?>" class="d-block image">
                                    <?php if( $is_lazyloader == true ): ?>
                                        <img sm-src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                    <?php else: ?>
                                        <img src="<?php the_post_thumbnail_url('ecademy_default_thumb'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                    <?php endif; ?>
                                </a>

                                <?php echo $course->get_course_price_html(); ?>
                                <a href="<?php the_permalink(); ?>" class="link-btn"></a>
                            </div>
                            <div class="courses-content">
                                <div class="course-author d-flex align-items-center">
                                    <?php ecademy_lp_the_loop_instructor(); ?>
                                </div>
                                <h3 class="font-weight-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Courses );