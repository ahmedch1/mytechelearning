<?php
/**
 * LearnDash compatibility
 *
 * @package Edubin
 */

// add_body_classes_for_ld_lms
// edubin_ld_course_info
// edubin_ld_course_category
// edubin_ld_related_course_content
// edubin_ld_related_course_sidebar


  //** ==== LearnDash add body class ** ====
  function add_body_classes_for_ld_lms( $classes ) {

    $prefix = '_edubin_';
    $defaults = edubin_generate_defaults();
    $post_id = edubin_get_id();
    
    $mb_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    $ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);

   if ( $mb_ld_single_page_layout == '4' ) :
        $final_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    elseif ( $mb_ld_single_page_layout == '3' ) :
        $final_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    elseif ( $mb_ld_single_page_layout == '2' ) :
        $final_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    elseif ( $mb_ld_single_page_layout == '1' ) :
        $final_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    elseif ( $ld_single_page_layout == '4' ) :
        $final_ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);
    elseif ( $ld_single_page_layout == '3' ) :
        $final_ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);
    elseif ( $ld_single_page_layout == '2' ) :
        $final_ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);
    elseif ( $ld_single_page_layout == '1' ) :
        $final_ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);
    endif; //End single page layout


      // Get body class for learndash lms profile page
      if ( class_exists('SFWD_LMS') && $final_ld_single_page_layout && is_singular( 'sfwd-courses' )) {
          $classes[] = 'single-course-layout-0'.$final_ld_single_page_layout.'';
      } // End - Get body class for learndash lms profile page
      
      // Finally $classes return 
    return $classes;

  }
  add_filter( 'body_class', 'add_body_classes_for_ld_lms' );

    /**
     * Display Course Info
     */
    
    if ( ! function_exists( 'edubin_ld_course_info' ) ) {

        function edubin_ld_course_info() {  


    global $post;
    $post_id    = $post->ID;
    $course_id  = $post_id;
    $user_id    = get_current_user_id();
    $current_id = $post->ID;

    $defaults = edubin_generate_defaults();
    $intro_video = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true ); 
    $ld_intro_video_position = get_theme_mod( 'ld_intro_video_position', $defaults['ld_intro_video_position']); 
    $ld_single_created_by = get_theme_mod( 'ld_single_created_by', $defaults['ld_single_created_by']); 
    $ld_single_duration = get_theme_mod( 'ld_single_duration', $defaults['ld_single_duration']); 
    $ld_single_lessons = get_theme_mod( 'ld_single_lessons', $defaults['ld_single_lessons']); 
    $ld_single_topic = get_theme_mod( 'ld_single_topic', $defaults['ld_single_topic']); 
    $ld_single_cat = get_theme_mod( 'ld_single_cat', $defaults['ld_single_cat']); 
    $ld_single_language = get_theme_mod( 'ld_single_language', $defaults['ld_single_language']); 
    $ld_single_social_shear = get_theme_mod( 'ld_single_social_shear', $defaults['ld_single_social_shear']); 
    $ld_single_info_heading = get_theme_mod( 'ld_single_info_heading', $defaults['ld_single_info_heading']); 
    $free_custom_text = get_theme_mod( 'free_custom_text', $defaults['free_custom_text']); 
    $completed_custom_text = get_theme_mod( 'completed_custom_text', $defaults['completed_custom_text']); 
    $enrolled_custom_text = get_theme_mod( 'enrolled_custom_text', $defaults['enrolled_custom_text']); 

    $tf_duration_h_text   = esc_html__('h', 'edubin');
    $tf_duration_m_text   = esc_html__('m', 'edubin');


    $ld_free_text      = $free_custom_text;
    $ld_enrolled_text  = $enrolled_custom_text;
    $ld_completed_text = $completed_custom_text;

  
    $cg_short_description = get_post_meta( $post->ID, '_learndash_course_grid_short_description', true );
    $enable_video = get_post_meta( $post->ID, '_learndash_course_grid_enable_video_preview', true );
    $embed_code   = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );

    $duration      = get_post_meta( $post_id, '_learndash_course_grid_duration', true );
    $duration_h = is_numeric( $duration ) ? floor( $duration / HOUR_IN_SECONDS ) : null;
    $duration_m = is_numeric( $duration ) ? floor( ( $duration % HOUR_IN_SECONDS ) / MINUTE_IN_SECONDS ) : null;

    $options = get_option('sfwd_cpt_options');

    $currency = null;

    if (!is_null($options)) {
        if (isset($options['modules']) && isset($options['modules']['sfwd-courses_options']) && isset($options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'])) {
            $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
        }

    }

    if (is_null($currency)) {
        $currency = 'USD';
    }

    $course_options = get_post_meta($post_id, "_sfwd-courses", true);

    $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $ld_free_text;

    $has_access   = sfwd_lms_has_access($course_id, $user_id);
    $is_completed = learndash_course_completed($user_id, $course_id);

    if ($price == '') {
        $price .= $ld_free_text;
    }

    if (is_numeric($price)) {
        if ($currency == "USD") {
            $price = '$' . $price;
        } else {
            $price .= ' ' . $currency;
        }

    }

    $class       = '';
    $ribbon_text = '';

    if ($has_access && !$is_completed) {
        $class       = 'ld_course_grid_price ribbon-enrolled';
        $ribbon_text = $ld_enrolled_text;
    } elseif ($has_access && $is_completed) {
        $class       = 'ld_course_grid_price';
        $ribbon_text = $learndash_completed_text;
    } else {
        $class       = !empty($course_options['sfwd-courses_course_price']) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
        $ribbon_text = $price;
    }

         ?>

      <div class="intro-video-sidebar intro-video-content is__sidebar">

        <?php 
            $edubin_ld_video = get_post_meta($post_id, 'edubin_ld_video', true);
            $embed_code = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true ); 
        ?>

        <?php if ( $embed_code && $ld_intro_video_position == 'intro_video_sidebar' ) : ?>

          <div class="intro-video-sidebar intro-video-sidebar">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>)"> <a href="<?php echo esc_url( $embed_code ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
          </div>  

        <?php elseif ($edubin_ld_video && $ld_intro_video_position == 'intro_video_sidebar') : ?>

          <div class="intro-video-sidebar intro-video-sidebar">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>)"> <a href="<?php echo esc_url( $edubin_ld_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
          </div>  

        <!--   the video will be show on sidebar -->
        <?php elseif( has_post_thumbnail() && $ld_intro_video_position == 'intro_video_sidebar') : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php endif; ?>

      </div>

      <div class="edubin-course-info">
            <?php if ($ld_single_info_heading) { ?>
                <h4 class="ld-segment-title tpc_mt_30"><?php echo esc_html( $ld_single_info_heading );?></h4>
            <?php } ?>
        <ul class="course-info-list">

            <?php if ( $ld_single_created_by ) { ?> 
              <li>
               <i class="meta-icon flaticon-user-1"></i>
                <span class="label"><?php esc_html_e('Created by :', 'edubin');?></span>
                <span class="value"><?php echo get_the_author(); ?></span>
              </li>
            <?php } ?>

          <?php if ( !empty($ld_single_duration) && !empty($duration_h) && !empty($duration_m) ) { ?>
          <li>
            <i class="far fa-clock"></i>
            <span class="label"><?php esc_html_e('Duration :', 'edubin');?></span>
            <span class="value">
            <?php if ($duration_h): ?>
                <?php echo esc_attr($duration_h); ?><?php echo esc_html($tf_duration_h_text); ?>   
            <?php endif ?>

            <?php if ($duration_m): ?>
                <?php echo esc_attr($duration_m); ?><?php echo esc_html($tf_duration_m_text); ?>   
            <?php endif ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $ld_single_lessons ) {

          $lesson      = learndash_get_course_steps(get_the_ID(), array('sfwd-lessons'));
          $lesson      = $lesson ? count($lesson) : 0;
          $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

          ?>
          <li>
            <i class="meta-icon flaticon-book-1"></i>
            <span class="label"><?php esc_html_e('Lessons :', 'edubin');?></span>
            <span class="value">
                 <?php echo esc_attr($lesson); ?>
                 <?php echo esc_html($lesson_text); ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $ld_single_topic ) {

            $topic      = learndash_get_course_steps(get_the_ID(), array('sfwd-topic'));
            $topic      = $topic ? count($topic) : 0;
            $topic_text = ('1' == $topic) ? esc_html__('Topic', 'edubin') : esc_html__('Topics', 'edubin');
          ?>
          <li>
            <i class="meta-icon flaticon-open-book"></i>
            <span class="label"><?php esc_html_e('Topic :', 'edubin');?></span>
            <span class="value">
                <?php echo esc_attr($topic); ?>
                <?php echo esc_html($topic_text); ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $ld_single_cat ) { ?>
          <li>
            <i class="flaticon-folder-1"></i>
            <span class="label"><?php esc_html_e('Category :', 'edubin');?></span>
            <span class="ld_course_cat value">
                <?php
                if (!get_the_terms(get_the_ID(), 'ld_course_category')) {
                        esc_html_e('Uncategorized', 'edubin');
                    } else {
                        echo get_the_term_list(get_the_ID(), 'ld_course_category', '');
                    }
                ?>
            </span>
          </li>
          <?php } ?>

          <?php if ( $ld_single_language && !empty(get_the_terms(get_the_ID(), 'ld_course_language')) ) { ?>  
          <li>
            <i class="flaticon-worldwide"></i>
            <span class="label"><?php esc_html_e('Language :', 'edubin');?></span>
            <span class="language-tag value">
                <?php
                      //if (!get_the_terms(get_the_ID(), 'ld_course_language')) {
                           echo get_the_term_list(get_the_ID(), 'ld_course_language', '');
                   //   }
                ?>
            </span>
          </li>
          <?php } ?>
          <!-- Custom course features cmb2 reparable meta display (bottom area) -->
        </ul>

      </div>

    <?php
        }
    }

    /**
     * Display Course Category
     */
    
    if ( ! function_exists( 'edubin_ld_course_category' ) ) {

        function edubin_ld_course_category() {  

        global $post;
        $post_id    = $post->ID;

        ?>
       <!--  LearnDash Course Category -->
        <div class="ld__widget">    
            <section class="widget edubin-course-widget edubin-ld-widget">
                <h2 class="widget-title"><?php esc_html_e('Course Categories', 'edubin');?></h2> 
                <?php
                
                $args = array(
                   'taxonomy' => 'ld_course_category',
                   'orderby' => 'name',
                   'order'   => 'ASC'
                );
               $terms = get_categories($args);
               
                if ($terms && ! is_wp_error($terms)): ?>
                    <ul>
                    <?php foreach($terms as $term): ?>
                        <li><a href="<?php echo get_term_link( $term->slug, 'ld_course_category'); ?>" rel="tag" class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
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
    
    if ( ! function_exists( 'edubin_ld_related_course_content' ) ) {

        function edubin_ld_related_course_content( $postType = 'sfwd-courses', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $ld_related_course_title = get_theme_mod('ld_related_course_title', $defaults['ld_related_course_title']);
        $ld_related_course_items = get_theme_mod('ld_related_course_items', $defaults['ld_related_course_items']);
        $ld_related_course_by = get_theme_mod('ld_related_course_by', $defaults['ld_related_course_by']);

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $ld_related_course_items;
        if (null === $relatedBy) $relatedBy = $ld_related_course_by;
        if (null === $postType) $postType = 'sfwd-courses';

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

                <h3 class="related-title text-center"><?php echo esc_html( $ld_related_course_title ); ?></h3>

            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="course-item-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'course_thumb' ); ?></a>
                            </div>
                        <?php endif; ?>
                    <div class="entry-desc">

                        <?php


                        $ld_free_text = 'Free';
                        $ld_enrolled_text = 'Enrolled';
                        $ld_completed_text = 'Completed';


                           global $post; $post_id = $post->ID;
                           $course_id = $post_id;
                           $user_id   = get_current_user_id();
                           $current_id = $post->ID;

                           $options = get_option('sfwd_cpt_options');


                           $currency = null;

                           if ( ! is_null( $options ) ) {
                              if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                                 $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];

                           }

                           if( is_null( $currency ) )
                              $currency = 'USD';

                           $course_options = get_post_meta($post_id, "_sfwd-courses", true);


                           $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $ld_free_text;

                           $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                           $is_completed = learndash_course_completed( $user_id, $course_id );

                           if( $price == '' )
                              $price .= $ld_free_text;

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
                              $ribbon_text = $ld_enrolled_text;
                           } elseif ( $has_access && $is_completed ) {
                              $class = 'ld_course_grid_price';
                              $ribbon_text = $learndash_completed_text;
                           } else {
                              $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                              $ribbon_text = $price;
                           }

                            // Show price
                            if ( $price) :
                                 echo '<span class="price">', esc_html($price), '</span>';
                            endif;

                        ?>

                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                          <?php //if (!$ld_single_hide_enrolled) {

                          $lesson      = learndash_get_course_steps(get_the_ID(), array('sfwd-lessons'));
                          $lesson      = $lesson ? count($lesson) : 0;
                          $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

                          ?>

                        <?php //if (!$ld_single_hide_enrolled) {

                          $topic      = learndash_get_course_steps(get_the_ID(), array('sfwd-topic'));
                          $topic      = $topic ? count($topic) : 0;
                          $topic_text = ('1' == $topic) ? esc_html__('Topic', 'edubin') : esc_html__('Topics', 'edubin');
                        ?>
                        <div class="entry-date">
                          <span class="posted-on list-inline-item">
                            <i class="meta-icon flaticon-book-1"></i>
                              <span><?php echo esc_attr($lesson); ?>
                                 <?php echo esc_html($lesson_text); ?></span>
                          </span>
                          <span class="posted-on list-inline-item">
                            <i class="flaticon-open-book"></i>
                              <span><?php echo esc_attr($topic); ?>
                                 <?php echo esc_html($topic_text); ?></span>
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

    if ( ! function_exists( 'edubin_ld_related_course_sidebar' ) ) {

        function edubin_ld_related_course_sidebar( $postType = 'sfwd-courses', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $ld_related_course_title = get_theme_mod('ld_related_course_title', $defaults['ld_related_course_title']);
        $ld_related_course_items = get_theme_mod('ld_related_course_items', $defaults['ld_related_course_items']);
        $ld_related_course_by = get_theme_mod('ld_related_course_by', $defaults['ld_related_course_by']);
        $ld_related_course_style = get_theme_mod('ld_related_course_style', $defaults['ld_related_course_style']);
        $final_ld_related_course_style = ($ld_related_course_style == 'square') ? 'square' : 'round';

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $ld_related_course_items;
        if (null === $relatedBy) $relatedBy = $ld_related_course_by;
        if (null === $postType) $postType = 'sfwd-courses';

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
     
              <section id="pxcv-learndash-course-2" class="widget edubin-course-widget edubin-ld-widget widget_pxcv_posts style__<?php echo esc_attr($final_ld_related_course_style); ?>">
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
                        <?php


                        $ld_free_text = 'Free';
                        $ld_enrolled_text = 'Enrolled';
                        $ld_completed_text = 'Completed';


                           global $post; $post_id = $post->ID;
                           $course_id = $post_id;
                           $user_id   = get_current_user_id();
                           $current_id = $post->ID;

                           $options = get_option('sfwd_cpt_options');


                           $currency = null;

                           if ( ! is_null( $options ) ) {
                              if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                                 $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];

                           }

                           if( is_null( $currency ) )
                              $currency = 'USD';

                           $course_options = get_post_meta($post_id, "_sfwd-courses", true);


                           $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $ld_free_text;

                           $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                           $is_completed = learndash_course_completed( $user_id, $course_id );

                           if( $price == '' )
                              $price .= $ld_free_text;

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
                              $ribbon_text = $ld_enrolled_text;
                           } elseif ( $has_access && $is_completed ) {
                              $class = 'ld_course_grid_price';
                              $ribbon_text = $learndash_completed_text;
                           } else {
                              $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                              $ribbon_text = $price;
                           }

                            // Show price
                            if ( $price) : ?>
                              <span class="price">
                                <?php echo esc_html($price); ?>
                               </span>
                           <?php endif;

                        ?>

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

