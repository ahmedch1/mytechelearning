<?php

// add_body_classes_for_tutor_lms
// edubin_tutor_course_category
// edubin_tutor_related_course_content
// edubin_tutor_related_course_sidebar

    /**
     * Tutor LMS Compatibility
     *
     * @package Edubin
     */

    function add_body_classes_for_tutor_lms( $classes ) {


        global $wp;
        $prefix = '_edubin_';
        $defaults = edubin_generate_defaults();
        $post_id = edubin_get_id();
        
        $mb_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        $tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        $tutor_hide_profile_page_header = get_theme_mod( 'tutor_hide_profile_page_header', $defaults['tutor_hide_profile_page_header']);

       if ( $mb_tutor_single_page_layout == '4' ) :
            $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        elseif ( $mb_tutor_single_page_layout == '3' ) :
            $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        elseif ( $mb_tutor_single_page_layout == '2' ) :
            $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        elseif ( $mb_tutor_single_page_layout == '1' ) :
            $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        elseif ( $tutor_single_page_layout == '4' ) :
            $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        elseif ( $tutor_single_page_layout == '3' ) :
            $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        elseif ( $tutor_single_page_layout == '2' ) :
            $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        elseif ( $tutor_single_page_layout == '1' ) :
            $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        endif; //End single page layout


        // Get body class for tutor lms profile page
        if (strpos( home_url($wp->request), '/profile/') !== false && function_exists('tutor') && $tutor_hide_profile_page_header == true ) {
            $classes[] = 'edubin_tutor_profile_page';
        } // End - Get body class for tutor lms profile page
        
        // Get body class for tutor lms profile page
        if ( function_exists('tutor') && $final_tutor_single_page_layout && is_singular( 'courses' )) {
            $classes[] = 'single-course-layout-0'.$final_tutor_single_page_layout.'';
        } // End - Get body class for tutor lms profile page
        
        // Finally $classes return 
    	return $classes;


    }
    add_filter( 'body_class', 'add_body_classes_for_tutor_lms' );


    /**
     * Display Course Category
     */
    
    if ( ! function_exists( 'edubin_tutor_course_category' ) ) {

        function edubin_tutor_course_category() {  

        global $post;
        $post_id    = $post->ID;

        ?>
       <!--  LearnDash Course Category -->
        <div class="tutor__widget">    
            <section class="widget edubin-course-widget">
                <h2 class="widget-title"><?php esc_html_e('Course Categories', 'edubin');?></h2> 
                <?php
                
                $args = array(
                   'taxonomy' => 'course-category',
                   'orderby' => 'name',
                   'order'   => 'ASC'
                );
               $terms = get_categories($args);

                if ($terms && ! is_wp_error($terms)): ?>
                    <ul>
                    <?php foreach($terms as $term): ?>
                        <li><a href="<?php echo get_term_link( $term->slug, 'course-category'); ?>" rel="tag" class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
             </section>
        </div>

    <?php
        }
    }

    /**
     * Display related courses Content
     */
    
    if ( ! function_exists( 'edubin_tutor_related_course_content' ) ) {

        function edubin_tutor_related_course_content( $postType = 'courses', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $tutor_related_course_title = get_theme_mod('tutor_related_course_title', $defaults['tutor_related_course_title']);
        $tutor_related_course_items = get_theme_mod('tutor_related_course_items', $defaults['tutor_related_course_items']);
        $tutor_related_course_by = get_theme_mod('tutor_related_course_by', $defaults['tutor_related_course_by']);

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $tutor_related_course_items;
        if (null === $relatedBy) $relatedBy = $tutor_related_course_by;
        if (null === $postType) $postType = 'courses';

        // Build our basic custom query arguments

        if ($relatedBy === 'category') {
            $categories = get_the_category( $post->ID );
            $catidlist = '';
            foreach( $categories as $category) {
                $catidlist .= $category->cat_ID . ",";
            }
            // Build our category based custom query arguments
            $related_posts_custom_query_args = array(
                'post_type' => $postType,
                'posts_per_page' => $totalPosts, // Number of related posts to display
                'post__not_in' => array($postID), // Ensure that the current post is not displayed
                'orderby' => 'rand', // Randomize the results
                'cat' => $catidlist, // Select posts in the same categories as the current post
            );
        }

        if ($relatedBy === 'tags') {

            // Get the tags for the current post
            $tags = wp_get_post_tags($postID);
            // If the post has tags, run the related post tag query
            if ($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                // Build our tag related custom query arguments
                $related_posts_custom_query_args = array(
                    'post_type' => $postType,
                    'tag__in' => $tag_ids, // Select posts with related tags
                    'posts_per_page' => $totalPosts, // Number of related posts to display
                    'post__not_in' => array($postID), // Ensure that the current post is not displayed
                    'orderby' => 'rand', // Randomize the results
                );
            } else {
                // If the post does not have tags, run the standard related posts query
                $related_posts_custom_query_args = array(
                    'post_type' => $postType,
                    'posts_per_page' => $totalPosts, // Number of related posts to display
                    'post__not_in' => array($postID), // Ensure that the current post is not displayed
                    'orderby' => 'rand', // Randomize the results
                );
            }

        }

        // Initiate the custom query
        $custom_query = new WP_Query( $related_posts_custom_query_args );


        // Run the loop and output data for the results
        if ( $custom_query->have_posts() ) : ?>
            <div class="row tpc_g_30">

                <h3 class="related-title text-center"><?php echo esc_html( $tutor_related_course_title ); ?></h3>

            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="course-item-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'course_thumb' ); ?></a>
                            </div>
                        <?php endif; ?>
                    <div class="entry-desc">
                        <?php get_template_part( 'tutor/tpl-part/price'); ?>
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                        <?php 

                          $lesson = tutor_utils()->get_lesson_count_by_course(get_the_ID());
                          $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin'); 

                          $students = (int) tutor_utils()->count_enrolled_users_by_course(); 
                         //$students_text = ('1' == $students) ? esc_html__('Enrolled', 'edubin') : esc_html__('Enrolled', 'edubin');
                        ?>

                        <div class="entry-date">
                          <span class="posted-on list-inline-item">
                            <i class="meta-icon flaticon-book-1"></i>
                              <span><?php echo esc_attr( $lesson ); ?>
                                 <?php echo esc_html( $lesson_text ); ?></span>
                          </span>
                          <span class="posted-on list-inline-item">
                            <i class="flaticon-user-4"></i>
                              <span><?php echo esc_attr( $students ); ?>
                                 <?php echo esc_html__('Enrolled', 'edubin'); ?></span>
                          </span>
                        </div>
                    </div>
                </div>
              </div>

            <?php endwhile; ?>
            </div>
        <?php endif;
        // Reset postdata
        wp_reset_postdata();
        }
    }

    /**
     * Display related courses sidebar
     */

    if ( ! function_exists( 'edubin_tutor_related_course_sidebar' ) ) {

        function edubin_tutor_related_course_sidebar( $postType = 'courses', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $tutor_related_course_title = get_theme_mod('tutor_related_course_title', $defaults['tutor_related_course_title']);
        $tutor_related_course_items = get_theme_mod('tutor_related_course_items', $defaults['tutor_related_course_items']);
        $tutor_related_course_by = get_theme_mod('tutor_related_course_by', $defaults['tutor_related_course_by']);
        $tutor_related_course_style = get_theme_mod('tutor_related_course_style', $defaults['tutor_related_course_style']);
        $final_tutor_related_course_style = ($tutor_related_course_style == 'square') ? 'square' : 'round';

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $tutor_related_course_items;
        if (null === $relatedBy) $relatedBy = $tutor_related_course_by;
        if (null === $postType) $postType = 'courses';

        // Build our basic custom query arguments

        if ($relatedBy === 'category') {
            $categories = get_the_category( $post->ID );
            $catidlist = '';
            foreach( $categories as $category) {
                $catidlist .= $category->cat_ID . ",";
            }
            // Build our category based custom query arguments
            $related_posts_custom_query_args = array(
                'post_type' => $postType,
                'posts_per_page' => $totalPosts, // Number of related posts to display
                'post__not_in' => array($postID), // Ensure that the current post is not displayed
                'orderby' => 'rand', // Randomize the results
                'cat' => $catidlist, // Select posts in the same categories as the current post
            );
        }

        if ($relatedBy === 'tags') {

            // Get the tags for the current post
            $tags = wp_get_post_tags($postID);
            // If the post has tags, run the related post tag query
            if ($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                // Build our tag related custom query arguments
                $related_posts_custom_query_args = array(
                    'post_type' => $postType,
                    'tag__in' => $tag_ids, // Select posts with related tags
                    'posts_per_page' => $totalPosts, // Number of related posts to display
                    'post__not_in' => array($postID), // Ensure that the current post is not displayed
                    'orderby' => 'rand', // Randomize the results
                );
            } else {
                // If the post does not have tags, run the standard related posts query
                $related_posts_custom_query_args = array(
                    'post_type' => $postType,
                    'posts_per_page' => $totalPosts, // Number of related posts to display
                    'post__not_in' => array($postID), // Ensure that the current post is not displayed
                    'orderby' => 'rand', // Randomize the results
                );
            }

        }

        // Initiate the custom query
        $custom_query = new WP_Query( $related_posts_custom_query_args );


        // Run the loop and output data for the results
        if ( $custom_query->have_posts() ) : ?>
     
              <section id="pxcv-learndash-course-2" class="widget edubin-course-widget widget_pxcv_posts style__<?php echo esc_attr($final_tutor_related_course_style); ?>">
                <h2 class="widget-title"><?php echo esc_html__('Related Courses', 'edubin'); ?></h2>
                <ul class="pxcv-rr-item-widget">

                  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <li class="clearfix has_image">

                     <?php if ( has_post_thumbnail() ) : ?>
                          
                          <a class="post__link"  href="<?php the_permalink(); ?>">
                            <div class="pxcv-rr-item-image_wrapper">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                            </div>
                          </a>
                          
                      <?php endif; ?>

                      <div class="pxcv-rr-item-content_wrapper">
                        <a class="post__link" href="<?php the_permalink(); ?>">
                          <h6 class="post__title"><?php the_title(); ?></h6>
                        </a>
                        <span class="course-price">

                          <span class="price">
                              <?php get_template_part( 'tutor/tpl-part/price'); ?>
                           </span>

                        </span>
                      </div>
                    </li>
                  <?php endwhile; ?>

                </ul>
              </section>

        <?php endif;
        // Reset postdata
        wp_reset_postdata();

        }
    }

