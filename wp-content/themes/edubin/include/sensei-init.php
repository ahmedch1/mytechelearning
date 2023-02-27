<?php

/**
 * Sensei compatibility
 *
 * @package Edubin
 */

	// edubin_declare_sensei_support
    // add_body_classes_for_sensei_lms
	// edubin_sensei_course_info
	// edubin_sensei_course_category
	// edubin_sensei_related_course_content
	// edubin_sensei_related_course_sidebar

    add_action( 'after_setup_theme', 'edubin_declare_sensei_support' );

    function edubin_declare_sensei_support() {
        add_theme_support( 'sensei' );
    }

	//** ==== Sensei add body class ** ====
	function add_body_classes_for_sensei_lms( $classes ) {

	    $prefix = '_edubin_';
	    $defaults = edubin_generate_defaults();
	    $post_id = edubin_get_id();
		    
	    $mb_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
	    $sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);

	   if ( $mb_sensei_single_page_layout == '4' ) :
	        $final_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
	    elseif ( $mb_sensei_single_page_layout == '3' ) :
	        $final_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
	    elseif ( $mb_sensei_single_page_layout == '2' ) :
	        $final_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
	    elseif ( $mb_sensei_single_page_layout == '1' ) :
	        $final_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
	    elseif ( $sensei_single_page_layout == '4' ) :
	        $final_sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);
	    elseif ( $sensei_single_page_layout == '3' ) :
	        $final_sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);
	    elseif ( $sensei_single_page_layout == '2' ) :
	        $final_sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);
	    elseif ( $sensei_single_page_layout == '1' ) :
	        $final_sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);
	    endif; //End single page layout


	    // Get body class for Sensei lms profile page
	    if ( class_exists('Sensei_Main') && $final_sensei_single_page_layout && is_singular( 'course' )) {
	        $classes[] = 'single-course-layout-0'.$final_sensei_single_page_layout.'';
	    } // End - Get body class for Sensei lms profile page
	    
	    // Finally $classes return 
		return $classes;

	}
	add_filter( 'body_class', 'add_body_classes_for_sensei_lms' );

    /**
     * Display Course Info
     */
    
    if ( ! function_exists( 'edubin_sensei_course_info' ) ) {

        function edubin_sensei_course_info() {  


    global $post;
    $post_id    = $post->ID;
    $course_id  = $post_id;
    $user_id    = get_current_user_id();
    $current_id = $post->ID;

    $defaults = edubin_generate_defaults();
    $sensei_intro_video_position = get_theme_mod( 'sensei_intro_video_position', $defaults['sensei_intro_video_position']); 
    $sensei_single_created_by = get_theme_mod( 'sensei_single_created_by', $defaults['sensei_single_created_by']); 
    $sensei_single_lessons = get_theme_mod( 'sensei_single_lessons', $defaults['sensei_single_lessons']); 
    $sensei_single_course_cat = get_theme_mod( 'sensei_single_course_cat', $defaults['sensei_single_course_cat']); 
    $sensei_single_language = get_theme_mod( 'sensei_single_language', $defaults['sensei_single_language']); 
    $sensei_single_social_shear = get_theme_mod( 'sensei_single_social_shear', $defaults['sensei_single_social_shear']); 
    $sensei_single_info_heading = get_theme_mod( 'sensei_single_info_heading', $defaults['sensei_single_info_heading']); 
    $free_custom_text = get_theme_mod( 'free_custom_text', $defaults['free_custom_text']); 
    $completed_custom_text = get_theme_mod( 'completed_custom_text', $defaults['completed_custom_text']); 
    $enrolled_custom_text = get_theme_mod( 'enrolled_custom_text', $defaults['enrolled_custom_text']); 

    $sensei_custom_features_position = get_theme_mod( 'sensei_custom_features_position', $defaults['sensei_custom_features_position']); 


    ?>

      <div class="intro-video-sidebar intro-video-content is__sidebar">

        <?php 
            $edubin_sensei_video = get_post_meta($post_id, 'edubin_sensei_video', true);
          if ($edubin_sensei_video && $sensei_intro_video_position == 'intro_video_sidebar') : ?>

          <div class="intro-video-sidebar intro-video-sidebar">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>)"> <a href="<?php echo esc_url( $edubin_sensei_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
          </div>  

        <!--   the video will be show on sidebar -->
        <?php elseif( has_post_thumbnail() && $sensei_intro_video_position == 'intro_video_sidebar') : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php endif; ?>

      </div>

      <div class="edubin-course-info">
            <?php if ($sensei_single_info_heading) { ?>
                <h4 class="ld-segment-title tpc_mt_30"><?php echo esc_html( $sensei_single_info_heading );?></h4>
            <?php } ?>
        <ul class="course-info-list">


			<?php if ( $sensei_custom_features_position == 'top' ) : ?>
			<!-- Custom course features cmb2 reparable meta display for top area-->
	            <?php
					$sensei_custom_feature_group = get_post_meta(get_the_ID(), 'sensei_custom_feature_group', true);
	        		if ( $sensei_custom_feature_group): ?>
	                    <?php
						foreach ((array) $sensei_custom_feature_group as $key => $entry) {?>

								<li>
	                       			<?php if (isset($entry['sensei_custom_feature_group_icon'])): ?>
										<i class="fa <?php echo esc_html($entry['sensei_custom_feature_group_icon']); ?>"></i>
									<?php else: ?>
										<i class="fas fa-play-circle"></i>
	                        		<?php endif;?>

	                       			<?php if (isset($entry['sensei_custom_feature_group_label'])): ?>
										<span class="label"><?php echo esc_html($entry['sensei_custom_feature_group_label']); ?> <?php echo esc_attr( ':' ); ?></span>
	                        		<?php endif;?>
	                        		<?php if (isset($entry['sensei_custom_feature_group_value'])): ?>
										<span class="value"><?php echo esc_html($entry['sensei_custom_feature_group_value']); ?></span>
									<?php endif;?>
								</li>

	                       	<?php
								}
				        endif;
				        ?>
			<?php endif; ?>

			<?php if ( $sensei_single_created_by ) { ?> 
			  <li>
			   <i class="meta-icon flaticon-user-1"></i>
			    <span class="label"><?php esc_html_e('Created by :', 'edubin');?></span>
			    <span class="value"><?php echo get_the_author(); ?></span>
			  </li>
			<?php } ?>
          <?php if ( $sensei_single_lessons ) {

			$course              = get_post( get_the_ID() );
			$lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );
            $lesson_text = ('1' == $lesson_count) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

          ?>
          <li>
            <i class="meta-icon flaticon-book-1"></i>
            <span class="label"><?php esc_html_e('Lessons :', 'edubin');?></span>
            <span class="value">
                 <?php echo esc_attr($lesson_count); ?>
                 <?php echo esc_html($lesson_text); ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $sensei_single_course_cat && get_the_terms(get_the_ID(), 'course-category') ) { ?>
          <li>
            <i class="flaticon-folder-1"></i>
            <span class="label"><?php esc_html_e('Category :', 'edubin');?></span>
            <span class="sensei_course_cat value">
                <?php
                    echo get_the_term_list(get_the_ID(), 'course-category', '');
                ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $sensei_single_language && !empty(get_the_terms(get_the_ID(), 'sensei_course_language')) ) { ?>  
          <li>
            <i class="flaticon-worldwide"></i>
            <span class="label"><?php esc_html_e('Language :', 'edubin');?></span>
            <span class="language-tag value">
                <?php
                   echo get_the_term_list(get_the_ID(), 'sensei_course_language', '');
                ?>
            </span>
          </li>
          <?php } ?>

          <!-- Custom course features cmb2 reparable meta display (bottom area) -->

			<?php if ( $sensei_custom_features_position == 'bottom') : ?>
			<!-- Custom course features cmb2 reparable meta display (bottom area) -->
			<?php
			$sensei_custom_feature_group = get_post_meta(get_the_ID(), 'sensei_custom_feature_group', true);
			if ( $sensei_custom_feature_group): ?>
			    <?php
				foreach ((array) $sensei_custom_feature_group as $key => $entry) {?>

						<li>
			       			<?php if (isset($entry['sensei_custom_feature_group_icon'])): ?>
								<i class="fa <?php echo esc_html($entry['sensei_custom_feature_group_icon']); ?>"></i>
							<?php else: ?>
								<i class="fas fa-play-circle"></i>
			        		<?php endif;?>

			       			<?php if (isset($entry['sensei_custom_feature_group_label'])): ?>
								<span class="label"><?php echo esc_html($entry['sensei_custom_feature_group_label']); ?> <?php echo esc_attr( ':' ); ?></span>
			        		<?php endif;?>
			        		<?php if (isset($entry['sensei_custom_feature_group_value'])): ?>
								<span class="value"><?php echo esc_html($entry['sensei_custom_feature_group_value']); ?></span>
							<?php endif;?>
						</li>

			       	<?php
						}
			    endif;
			    ?>
			<?php endif; ?>

        </ul>

      </div>

    <?php
        }
    }

    /**
     * Display Course Category
     */
    
    if ( ! function_exists( 'edubin_sensei_course_category' ) ) {

        function edubin_sensei_course_category() {  

        ?>
       <!--  Sensei Course Category -->
        <div class="sensei__widget">    
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
    
    if ( ! function_exists( 'edubin_sensei_related_course_content' ) ) {

        function edubin_sensei_related_course_content( $postType = 'course', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $sensei_related_course_title = get_theme_mod('sensei_related_course_title', $defaults['sensei_related_course_title']);
        $sensei_related_course_items = get_theme_mod('sensei_related_course_items', $defaults['sensei_related_course_items']);
        $sensei_related_course_by = get_theme_mod('sensei_related_course_by', $defaults['sensei_related_course_by']);

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $sensei_related_course_items;
        if (null === $relatedBy) $relatedBy = $sensei_related_course_by;
        if (null === $postType) $postType = 'course';

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

                <h3 class="related-title text-center"><?php echo esc_html( $sensei_related_course_title ); ?></h3>

            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="course-item-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'course_thumb' ); ?></a>
                            </div>
                        <?php endif; ?>
                    <div class="entry-desc">
							<?php get_template_part( 'sensei/tpl-part/price'); ?>
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                          <?php //if (!$sensei_single_hide_enrolled) {

                            $course              = get_post( get_the_ID() );
                            $lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );
                            $lesson_text = ('1' == $lesson_count) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

                          ?>

                        <div class="entry-date">

                          <span class="posted-on list-inline-item">
                            <i class="meta-icon flaticon-book-1"></i>
                              <span><?php echo esc_attr($lesson_count); ?>
                                 <?php echo esc_html($lesson_text); ?></span>
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

    if ( ! function_exists( 'edubin_sensei_related_course_sidebar' ) ) {

        function edubin_sensei_related_course_sidebar( $postType = 'course', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $sensei_related_course_title = get_theme_mod('sensei_related_course_title', $defaults['sensei_related_course_title']);
        $sensei_related_course_items = get_theme_mod('sensei_related_course_items', $defaults['sensei_related_course_items']);
        $sensei_related_course_by = get_theme_mod('sensei_related_course_by', $defaults['sensei_related_course_by']);
        $sensei_related_course_style = get_theme_mod('sensei_related_course_style', $defaults['sensei_related_course_style']);
        $final_sensei_related_course_style = ($sensei_related_course_style == 'square') ? 'square' : 'round';

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $sensei_related_course_items;
        if (null === $relatedBy) $relatedBy = $sensei_related_course_by;
        if (null === $postType) $postType = 'course';

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
     
              <section id="pxcv-sensei-course-2" class="widget edubin-course-widget widget_pxcv_posts style__<?php echo esc_attr($final_sensei_related_course_style); ?>">
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
                        <?php get_template_part( 'sensei/tpl-part/price'); ?>
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
