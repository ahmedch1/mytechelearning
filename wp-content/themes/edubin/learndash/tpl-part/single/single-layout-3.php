<?php
/**
 * The template for displaying all single posts
 */

get_header(); 

   $post_id = edubin_get_id();

    global $post; $post_id = $post->ID;

    $course_id = $post_id;
    $user_id   = get_current_user_id();

    if(function_exists('edubinGetPostViewsCustom')){ edubinSetPostViewsCustom(get_the_ID()); }

    // Customizer option
    $defaults = edubin_generate_defaults();
    $ld_see_more_btn_text = get_theme_mod( 'ld_see_more_btn_text', $defaults['ld_see_more_btn_text']); 
    $free_custom_text = get_theme_mod( 'free_custom_text', $defaults['free_custom_text'] ); 
    $enrolled_custom_text = get_theme_mod( 'enrolled_custom_text', $defaults['enrolled_custom_text'] ); 
    $completed_custom_text = get_theme_mod( 'completed_custom_text', $defaults['completed_custom_text'] ); 
    $ld_intro_video_position = get_theme_mod( 'ld_intro_video_position', $defaults['ld_intro_video_position']); 
    $ld_related_course_position = get_theme_mod( 'ld_related_course_position', $defaults['ld_related_course_position']); 

    ?>

    <?php  get_template_part( 'learndash/tpl-part/single/single', 'header');  ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container">
                <div class="row tpc_column_reverse">

                    <div class="col-lg-1">
                        <?php  // get_template_part( 'learndash/tpl-part/single/single', 'sidebar');  ?>
                    </div>

                <?php while ( have_posts() ) : the_post();
                        global $post; $post_id = $post->ID;
                        $course_id = $post_id;
                        $user_id   = get_current_user_id();
                        $current_id = $post->ID;

                        $enable_video = get_post_meta( $post->ID, '_learndash_course_grid_enable_video_preview', true );
                        $embed_code   = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );
                        $button_text  = $ld_see_more_btn_text;

                        // Retrive oembed HTML if URL provided
                        if ( preg_match( '/^http/', $embed_code ) ) {
                            $embed_code = wp_oembed_get( $embed_code, array( 'height' => 600, 'width' => 400 ) );
                        }

                        $button_text = isset( $button_text ) && ! empty( $button_text ) ? $button_text : esc_html__( 'See more', 'edubin' );

                        $button_text = apply_filters( 'learndash_course_grid_custom_button_text', $button_text, $post_id );

                        $options = get_option('sfwd_cpt_options');
                        $currency = null;

                        if ( ! is_null( $options ) ) {
                            if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                            $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
                        }

                        if( is_null( $currency ) )
                            $currency = 'USD';

                        $course_options = get_post_meta($post_id, "_sfwd-courses", true);
                        if ($free_custom_text) {
                            $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $free_custom_text;
                        } else {
                            $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : esc_html__( 'Free', 'edubin' );
                        }
                        


                        $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                        $is_completed = learndash_course_completed( $user_id, $course_id );

                        if( $price == '' )
                            if ($free_custom_text) {
                                $price .= $free_custom_text;
                            } else {
                                $price .= esc_html__( 'Free', 'edubin' );
                            }
                            
                           

                        if ( is_numeric( $price ) ) {
                            if ( $currency == "USD" )
                                $price = '$' . $price;
                            else
                                $price .= ' ' . $currency;
                        }

                        $class       = '';
                        $ribbon_text = '';

                        if ( $has_access && ! $is_completed ) {
                            $class = 'ld_course_grid_price ribbon-enrolled';

                            if ($enrolled_custom_text) {
                              $ribbon_text = $enrolled_custom_text;
                            } else {
                                $ribbon_text = esc_html__( 'Enrolled', 'edubin' );
                            }
                            
                        } elseif ( $has_access && $is_completed ) {
                            $class = 'ld_course_grid_price';

                            if ($completed_custom_text) {
                                $ribbon_text = $completed_custom_text;
                            } else {
                                $ribbon_text = esc_html__( 'Completed', 'edubin' );
                            }
                        } else {
                            $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                            $ribbon_text = $price;
                        }

                ?>

                    <div class="col-lg-10">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                   

                        <?php 
                            $edubin_ld_video = get_post_meta($post_id, 'edubin_ld_video', true);
                            $embed_code = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true ); 
                        ?>

                        <?php if ( $edubin_ld_video && $ld_intro_video_position == 'intro_video_content' ) : ?>

                          <div class="intro-video-sidebar intro-video-content">
                            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'large')); ?>)"> <a href="<?php echo esc_url( $edubin_ld_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                            </div>
                          </div>  

                        <?php elseif ($embed_code && $ld_intro_video_position == 'intro_video_content') : ?>

                          <div class="intro-video-sidebar intro-video-content">
                            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'large')); ?>)"> <a href="<?php echo esc_url( $embed_code ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
                            </div>
                          </div>  

                        <!--   the video will be show on sidebar -->
                        <?php elseif( has_post_thumbnail() && $ld_intro_video_position == 'intro_video_content') : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>

                            <div class="post-wrapper">
                                <div class="entry-content">
                                    <?php
                                    /* translators: %s: Name of current post */
                                    the_content( sprintf(
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'edubin' ),
                                        get_the_title()
                                    ) );

                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'edubin' ),
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-number">',
                                        'link_after'  => '</span>',
                                    ) );
                                    ?>
                                </div><!-- .entry-content -->

                                <?php
                                    if ( is_single() ) {
                                        edubin_entry_footer();
                                    }
                                ?>

                            </div>
                        </article>
                        <?php 

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                         ?>
                    </div>
                <?php endwhile; // End of the loop. ?>
                

                    <div class="col-lg-1">
                        <?php  // get_template_part( 'learndash/tpl-part/single/single', 'sidebar');  ?>
                    </div>
     
                    <?php if ($ld_related_course_position == 'content') { ?>

                        <div class="related-post-wrap related_course">
                            <?php edubin_ld_related_course_content(); ?>
                        </div>

                    <?php } ?>

                </div> <!-- row -->


            </div> <!-- container -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();