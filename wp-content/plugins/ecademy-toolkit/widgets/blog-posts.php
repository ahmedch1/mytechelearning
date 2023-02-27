<?php
/**
 * Posts Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Posts extends Widget_Base {

	public function get_name() {
        return 'eCademy_Posts';
    }

	public function get_title() {
        return __( 'Posts', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-post-slider';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Posts',
			[
				'label' => __( 'eCademy Posts', 'ecademy-toolkit' ),
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
                        '3'         => __( 'Style Three', 'ecademy-toolkit' ),
                        '4'         => __( 'Style Four', 'ecademy-toolkit' ),
                        '5'         => __( 'Style Five', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
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
                'order',
                [
                    'label' => __( 'Posts Order By', 'ecademy-toolkit' ),
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
                    'label' => __( 'Item', 'ecademy-toolkit' ),
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
                    'default' => __('View all posts', 'ecademy-toolkit'),
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
			'blog_style',
			[
				'label' => __( 'Color Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'tag_color',
                [
                    'label' => esc_html__( 'Tag Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .post-content .category, .single-blog-post-item .post-content .category, .single-blog-item .post-content .category, .single-post-box .post-content .meta li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tag_color_hover',
                [
                    'label' => esc_html__( 'Tag Color Hover', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .post-content .category:hover, .single-blog-post-item .post-content .category:hover:hover, .single-blog-item .post-content .category, .single-post-box .post-content .meta li a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'tag_typography',
                    'label' => __( 'Tag Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-blog-post .post-content .category, .single-blog-post-item .post-content .category, .single-blog-item .post-content .category, .single-post-box .post-content .meta li a',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .post-content h3 a, .single-blog-post-item .post-content h3 a, .single-blog-post-box .post-content h3 a, .single-blog-item .post-content h3 a, .single-post-box .post-content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color_hover',
                [
                    'label' => esc_html__( 'Title Color Hover', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .post-content h3 a:hover, .single-blog-post-item .post-content h3 a:hover, .single-blog-post-box .post-content h3 a:hover, .single-blog-item .post-content h3 a:hover, .single-post-box .post-content h3 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-blog-post .post-content h3 a, .single-blog-post-item .post-content h3 a, .single-blog-post-box .post-content h3, .single-blog-item .post-content h3, .single-post-box .post-content h3',
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
                'post_type'     => 'post',
                'posts_per_page'=> $settings['count'],
                'order'         => $settings['order'],
                'tax_query'     => array(
                    array(
                        'taxonomy'      => 'category',
                        'field'         => 'slug',
                        'terms'         => $settings['cat_name'],
                        'hide_empty'    => false
                    )
                )
            );
        } else {
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $settings['count'],
                'order'             => $settings['order'],
                'meta_key'          => '_thumbnail_id',
            );
        }
        $post_array = new \WP_Query( $args );

        // Get Button Link
        if($settings['link_type'] == 1){
            $link = get_page_link( $settings['link_to_page'] );
        } else {
            $link = $settings['ex_link'];
        }
		?>
            <?php if( $settings['style'] == '1' ): ?>
                <div class="container">
                    <div class="row">
                        <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-blog-post">
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php else: ?>
                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="post-content">
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
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <ul class="post-content-footer d-flex justify-content-between align-items-center">
                                            <li>
                                                <?php
                                                    $user       = get_the_author_meta('ID');
                                                    $user_image = get_avatar_url($user, ['size' => '51']);
                                                ?>
                                                <div class="post-author d-flex align-items-center">
                                                    <?php if( $is_lazyloader == true ): ?>
                                                        <img sm-src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                    <?php endif; ?>
                                                    <span><?php echo esc_html( get_the_author() ); ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <i class='flaticon-calendar'></i> <?php echo get_the_date( 'Y-m-d' ); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php elseif( $settings['style'] == '2' ): ?>
                <div class="container">
                    <div class="row">
                        <?php $i = 0; while($post_array->have_posts()): $post_array->the_post(); ?>
                            <?php if( $i == 0 ): ?>
                                <div class="col-lg-8 col-md-12">
                                    <div class="single-blog-post-item">
                                        <div class="post-image">
                                            <a href="<?php the_permalink(); ?>" class="d-block">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_810x545' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_810x545' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="post-content">
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
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php the_excerpt(); ?></p>
                                            <ul class="post-content-footer d-flex align-items-center">
                                                <li>
                                                    <?php
                                                        $user       = get_the_author_meta('ID');
                                                        $user_image = get_avatar_url($user, ['size' => '51']);
                                                    ?>
                                                    <div class="post-author d-flex align-items-center">
                                                        <?php if( $is_lazyloader == true ): ?>
                                                            <img sm-src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                        <?php endif; ?>
                                                        <span><?php echo esc_html( get_the_author() ); ?></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class='flaticon-calendar'></i> <?php echo get_the_date( 'Y-m-d' ); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php $i++; endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                        <div class="col-lg-4 col-md-12">
                            <div class="blog-post-list">
                                <div class="row">
                                    <?php $count = 0; while($post_array->have_posts()): $post_array->the_post();  ?>
                                        <?php if( $count != 0 ): ?>
                                            <div class="col-lg-12 col-sm-6 col-md-6">
                                                <div class="single-blog-post-item">
                                                    <div class="post-image">
                                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                                            <?php if( $is_lazyloader == true ): ?>
                                                                <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php $count++; endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>

                        <?php if( $settings['bottom_title'] != '' || $settings['bottom_link_title'] != '' ): ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="blog-post-info">
                                    <p><?php echo esc_html( $settings['bottom_title'] ); ?>​ <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $settings['bottom_link_title'] ); ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif( $settings['style'] == '3' ): ?>
                <div class="container">
                <?php if( $settings['count'] == 1 ): ?>
                    <div class="col-lg-6 offset-lg-3">
                <?php else: ?>
                    <div class="blog-slides owl-carousel owl-theme">
                <?php endif; ?>
                        <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                            <div class="single-blog-post-box">
                                <div class="post-image">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                        <?php else: ?>
                                            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>

                                <div class="post-content">
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
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <ul class="post-content-footer d-flex justify-content-between align-items-center">
                                        <li>
                                            <?php
                                                $user       = get_the_author_meta('ID');
                                                $user_image = get_avatar_url($user, ['size' => '51']);
                                            ?>
                                            <div class="post-author d-flex align-items-center">
                                                <?php if( $is_lazyloader == true ): ?>
                                                    <img sm-src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                <?php endif; ?>
                                                <span><?php echo esc_html( get_the_author() ); ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <i class='flaticon-calendar'></i> <?php echo get_the_date( 'Y-m-d' ); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <?php if( $settings['bottom_title'] != '' || $settings['bottom_link_title'] != '' ): ?>
                        <div class="blog-post-info">
                            <p><?php echo esc_html( $settings['bottom_title'] ); ?>​ <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $settings['bottom_link_title'] ); ?></a></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php elseif( $settings['style'] == '4' ): ?>
                <div class="container">
                    <div class="row">
                        <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-blog-item">
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php else: ?>
                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php endif; ?>
                                        </a>

                                        <a href="<?php the_permalink(); ?>" class="link-btn"></a>
                                    </div>

                                    <div class="post-content">
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
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php elseif( $settings['style'] == '5' ): ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <?php while($post_array->have_posts()): $post_array->the_post(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-post-box">
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <?php if( $is_lazyloader == true ): ?>
                                                <img sm-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php else: ?>
                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecademy_default_thumb' ); ?>" alt="<?php the_post_thumbnail_caption();  ?>">
                                            <?php endif; ?>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <ul class="meta d-flex justify-content-between align-items-center">
                                            <li>
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
                                            </li>

                                            <li><i class='flaticon-calendar'></i> <?php echo get_the_date(); ?></li>
                                        </ul>

                                        <h3 class="inter-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        <ul class="post-content-footer d-flex justify-content-between align-items-center">
                                            <li>
                                                <?php 
                                                    $user       = get_the_author_meta('ID');
                                                    $user_image = get_avatar_url($user, ['size' => '51']); 
                                                ?>
                                                <div class="post-author d-flex align-items-center">
                                                    <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                                    <span><?php echo esc_html( get_the_author() ); ?></span>
                                                </div>
                                            </li>
                                            <li><a href="<?php the_permalink(); ?>" class="link-btn"><i class='bx bx-right-arrow-alt'></i></a></li>
                                        </ul>
                                            
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Posts );