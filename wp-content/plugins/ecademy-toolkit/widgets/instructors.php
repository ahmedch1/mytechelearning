<?php
/**
 * Instructors Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Instructors extends Widget_Base {

	public function get_name() {
        return 'eCademy_Instructors';
    }

	public function get_title() {
        return __( 'LearnPress Instructors', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-user-circle-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Instructors',
			[
				'label' => __( 'eCademy Instructors', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'instructor_style',
                [
                    'label' => __( 'Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => __( 'Style One(Slider)', 'ecademy-toolkit' ),
                        '2'         => __( 'Style Two', 'ecademy-toolkit' ),
                        '3'         => __( 'Style Three(Slider)', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Item', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => __( 'User Order By', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'      => __( 'DESC', 'ecademy-toolkit' ),
                        'ASC'       => __( 'ASC', 'ecademy-toolkit' ),
                    ],
                    'default' => 'DESC',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'team_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
			$this->add_responsive_control(
				'name_size',
				[
					'label' => __( 'Name Font Size', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 40,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-advisor-box .advisor-content h3, .start-with-success-box .content h3, .single-advisor-item .advisor-content h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'designation_size',
				[
					'label' => __( 'Designation Font Size', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-advisor-box .advisor-content .sub-title, .start-with-success-box .content h3, .single-advisor-item .advisor-content span' => 'font-size: {{SIZE}}px;',
					],
				]
            );

			$this->add_responsive_control(
				'description_size',
				[
					'label' => __( 'Description Font Size', 'ecademy-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .single-advisor-box .advisor-content p' => 'font-size: {{SIZE}}px;',
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

        $exclude_list = array( 14 );
        $args = array(
            'role'          => 'lp_teacher',
            'order'         => $settings['order'],
            'number'         => $settings['count'],
        );
        $user_query = new \WP_User_Query( $args );
        $teachers   = $user_query->get_results();
		?>
        <?php if( $settings['instructor_style'] == '1' ): ?>
            <?php if( $settings['count'] == 1 ): ?>
                <div class="col-lg-6 offset-lg-3">
            <?php else: ?>
                <div class="advisor-slides owl-carousel owl-theme">
            <?php endif; ?>
                <?php
                if ( ! empty( $teachers ) ) {
                    foreach ( $teachers as $teacher ) {
                        $teacher_info = get_userdata( $teacher->ID );
						if( get_field('user_image', 'user_' .$teacher->ID) != '' ):
                            ?>
                            <div class="single-advisor-box">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="advisor-image">
                                            <?php
                                            $image  = get_field('user_image', 'user_' .$teacher->ID);
                                            $size    = 'ecademy_advisor_thumb_one';
                                            if( $image ) {
                                                echo wp_get_attachment_image( $image, $size );
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="advisor-content">
                                            <h3><a href="<?php echo home_url( '/profile/' ); echo $teacher_info->nickname; ?>"><?php echo esc_html( $teacher_info->display_name ); ?></a></h3>
                                            <span class="sub-title"><p><?php the_field('designation_name', 'user_' .$teacher->ID ); ?></p></span>
                                            <p><?php echo esc_html( $teacher_info->description ); ?></p>
                                            <ul class="social-link">
                                                <?php
                                                if( have_rows('user_social_links', 'user_'. $teacher->ID ) ):
                                                    while ( have_rows('user_social_links', 'user_'. $teacher->ID ) ) : the_row();
                                                    ?>
                                                        <li><a href="<?php echo esc_url( the_sub_field('user_social_link')); ?>" class="d-block" target="_blank"><i class="<?php echo esc_attr( the_sub_field('user_select_social_icon') ); ?>"></i></a></li>
                                                    <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endif;
                    }
                } ?>
            </div>
        <?php elseif( $settings['instructor_style'] == '2' ): ?>
            <div class="container">
                <div class="row">
                    <?php
                    if ( ! empty( $teachers ) ) {
                        foreach ( $teachers as $teacher ) {
                            $teacher_info = get_userdata( $teacher->ID );
                            if( get_field('user_image', 'user_' .$teacher->ID) != '' ):
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="start-with-success-box">
                                        <div class="image">
                                            <a href="<?php echo home_url( '/profile/' ); echo $teacher_info->nickname; ?>">
                                            <?php
                                            $image  = get_field('user_image', 'user_' .$teacher->ID);
                                            $size    = 'ecademy_advisor_thumb_two';
                                            if( $image ) {
                                                echo wp_get_attachment_image( $image, $size );
                                            }
                                            ?>
                                            </a>
                                        </div>

                                        <div class="content">
                                            <a href="<?php echo home_url( '/profile/' ); echo $teacher_info->nickname; ?>" class="link-btn"><i class="flaticon-right"></i></a>

                                            <h3><?php echo esc_html( $teacher_info->display_name ); ?></h3>
                                            <span><?php the_field('designation_name', 'user_' .$teacher->ID ); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        }
                    } ?>
                </div>
            </div>
        <?php elseif( $settings['instructor_style'] == '3' ): ?>
            <div class="container">
                <?php if( $settings['count'] == 1 ): ?>
                    <div class="col-lg-6 offset-lg-3">
                <?php else: ?>
                    <div class="advisor-slides-two owl-carousel owl-theme">
                <?php endif; ?>
                <?php
                if ( ! empty( $teachers ) ) {
                    foreach ( $teachers as $teacher ) {
                        $teacher_info = get_userdata( $teacher->ID );
						if( get_field('user_image', 'user_' .$teacher->ID) != '' ):
                            ?>
                            <div class="single-advisor-item">
                                <div class="advisor-image">
                                    <?php
                                    $image  = get_field('user_image', 'user_' .$teacher->ID);
                                    $size    = 'ecademy_advisor_thumb_two';
                                    if( $image ) {
                                        echo wp_get_attachment_image( $image, $size );
                                    }
                                    ?>

                                    <ul class="social-link">
                                        <?php
                                        if( have_rows('user_social_links', 'user_'. $teacher->ID ) ):
                                            while ( have_rows('user_social_links', 'user_'. $teacher->ID ) ) : the_row();
                                            ?>
                                                <li><a href="<?php echo esc_url( the_sub_field('user_social_link')); ?>" class="d-block" target="_blank"><i class="<?php echo esc_attr( the_sub_field('user_select_social_icon') ); ?>"></i></a></li>
                                            <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </ul>
                                </div>

                                <div class="advisor-content">
                                    <h3><a href="<?php echo home_url( '/profile/' ); echo $teacher_info->nickname; ?>"><?php echo esc_html( $teacher_info->display_name ); ?></a></h3>
                                    <span><?php the_field('designation_name', 'user_' .$teacher->ID ); ?></span>
                                </div>
                            </div>
                            <?php
                        endif;
                    }
                } ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Instructors );