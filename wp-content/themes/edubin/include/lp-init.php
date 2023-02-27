<?php

/**
 * LearnPress compatibility
 *
 * @package Edubin
 */

// add_body_classes_for_lp_lms
// edubin_lp_course_info
// edubin_lp_course_category
// edubin_lp_related_course_content
// edubin_lp_related_course_sidebar

	/// Enable LearnPress template override
	add_filter( 'learn-press/override-templates', '__return_true' );

	if (class_exists('LearnPress')):
		remove_action( 'learn-press/before-main-content', LearnPress::instance()->template( 'general' )->func( 'breadcrumb' ) );
	endif;

	//** ==== LearnPress add body class ** ====
	function add_body_classes_for_lp_lms( $classes ) {

	    $prefix = '_edubin_';
	    $defaults = edubin_generate_defaults();
	    $post_id = edubin_get_id();
		    
	    $mb_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
	    $lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);

	   if ( $mb_lp_single_page_layout == '4' ) :
	        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
	    elseif ( $mb_lp_single_page_layout == '3' ) :
	        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
	    elseif ( $mb_lp_single_page_layout == '2' ) :
	        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
	    elseif ( $mb_lp_single_page_layout == '1' ) :
	        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
	    elseif ( $lp_single_page_layout == '4' ) :
	        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
	    elseif ( $lp_single_page_layout == '3' ) :
	        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
	    elseif ( $lp_single_page_layout == '2' ) :
	        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
	    elseif ( $lp_single_page_layout == '1' ) :
	        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
	    endif; //End single page layout


	    // Get body class for LearnPress lms profile page
	    if ( class_exists('LearnPress') && $final_lp_single_page_layout && is_singular( 'lp_course' )) {
	        $classes[] = 'single-course-layout-0'.$final_lp_single_page_layout.'';
	    } // End - Get body class for LearnPress lms profile page
	    
	    // Finally $classes return 
		return $classes;

	}
	add_filter( 'body_class', 'add_body_classes_for_lp_lms' );

	/// Admin notice for old version plugin
	if (class_exists('LearnPress')):
	        $get_lp_plugin_dir = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
	        $lp_plugin_version_number = get_plugin_data($get_lp_plugin_dir);

	        if ( $lp_plugin_version_number['Version'] < '3.9.9.9'):

	        function edubin_admin_notice_olp_lp() {
	            ?>
	            <div class="notice notice notice-error is-dismissible">
	                <h2 style=" color: #d63638;"><?php _e( "Your site LearnPress LMS plugin is an old version. Please update it to get LearnPress V4+ features.", 'edubin' ); ?> <a href="<?php echo admin_url( 'plugins.php' ); ?>"><?php _e( 'Update Now', 'edubin' ); ?></a></h2>
	               
	            </div>
	            <?php
	        }
	        add_action( 'admin_notices', 'edubin_admin_notice_olp_lp' );

	        endif;

	endif;

	/// TP Class for archive
	if ( ! class_exists( 'TP' ) ) {
		class TP {

			protected static $_instance = null;

			static function instance() {
				if ( ! self::$_instance ) {
					self::$_instance = new self();
				}

				return self::$_instance;
			}
		}
		TP::instance();
	}// End if().


/**
 * Learnpress course info
 */

if (!function_exists('edubin_lp_course_info')) {

    function edubin_lp_course_info()
    {

        global $post;
        $post_id    = $post->ID;
        // Prefix
        $prefix = '_edubin_';

        $course_id = get_the_ID();
        $course    = learn_press_get_the_course();

        $lp_duration     = get_post_meta(get_the_ID(), '_lp_duration');
        
        $lp_students     = get_post_meta(get_the_ID(), '_lp_students');
        $lp_retake_count = get_post_meta(get_the_ID(), '_lp_retake_count');
        $lp_curriculum   = get_post_meta(get_the_ID(), '_lp_curriculum');
        $lp_quizzes      = $course->get_curriculum_items('lp_quiz');


        $defaults                       = edubin_generate_defaults();
        //$lp_course_feature_title        = get_theme_mod('lp_course_feature_title', $defaults['lp_course_feature_title']);
        $lp_custom_features_position        = get_theme_mod('lp_custom_features_position', $defaults['lp_custom_features_position']);
        $lp_course_feature_quizzes      = get_theme_mod('lp_course_feature_quizzes', $defaults['lp_course_feature_quizzes']);
        $lp_course_feature_duration     = get_theme_mod('lp_course_feature_duration', $defaults['lp_course_feature_duration']);
        $lp_course_feature_lessons     = get_theme_mod('lp_course_feature_lessons', $defaults['lp_course_feature_lessons']);
        $lp_course_feature_max_tudents  = get_theme_mod('lp_course_feature_max_tudents', $defaults['lp_course_feature_max_tudents']);
        $lp_course_feature_enroll       = get_theme_mod('lp_course_feature_enroll', $defaults['lp_course_feature_enroll']);
        $lp_course_feature_retake_count = get_theme_mod('lp_course_feature_retake_count', $defaults['lp_course_feature_retake_count']);
        $lp_course_feature_skill_level  = get_theme_mod('lp_course_feature_skill_level', $defaults['lp_course_feature_skill_level']);
        $lp_course_feature_language     = get_theme_mod('lp_course_feature_language', $defaults['lp_course_feature_language']);
        $lp_course_feature_assessments  = get_theme_mod('lp_course_feature_assessments', $defaults['lp_course_feature_assessments']);
        $lp_course_feature_cat  = get_theme_mod('lp_course_feature_cat', $defaults['lp_course_feature_cat']);
        $lp_single_header_meta  = get_theme_mod('lp_single_header_meta', $defaults['lp_single_header_meta']);

        $lp_course_feature_quizzes_show      = get_theme_mod('lp_course_feature_quizzes_show', $defaults['lp_course_feature_quizzes_show']);
        $lp_course_feature_duration_show     = get_theme_mod('lp_course_feature_duration_show', $defaults['lp_course_feature_duration_show']);
        $lp_course_feature_lessons_show     = get_theme_mod('lp_course_feature_lessons_show', $defaults['lp_course_feature_lessons_show']);
        $lp_course_feature_max_students_show = get_theme_mod('lp_course_feature_max_students_show', $defaults['lp_course_feature_max_students_show']);
        $lp_course_feature_enroll_show       = get_theme_mod('lp_course_feature_enroll_show', $defaults['lp_course_feature_enroll_show']);
        $lp_course_feature_retake_count_show = get_theme_mod('lp_course_feature_retake_count_show', $defaults['lp_course_feature_retake_count_show']);
        $lp_course_feature_skill_level_show  = get_theme_mod('lp_course_feature_skill_level_show', $defaults['lp_course_feature_skill_level_show']);
        $lp_course_feature_language_show     = get_theme_mod('lp_course_feature_language_show', $defaults['lp_course_feature_language_show']);
        $lp_course_feature_assessments_show  = get_theme_mod('lp_course_feature_assessments_show', $defaults['lp_course_feature_assessments_show']);
        $lp_course_feature_cat_show  = get_theme_mod('lp_course_feature_cat_show', $defaults['lp_course_feature_cat_show']);
        $lp_intro_video_position  = get_theme_mod('lp_intro_video_position', $defaults['lp_intro_video_position']);
		$lp_single_page_layout = get_theme_mod('lp_single_page_layout', $defaults['lp_single_page_layout']);  
		$lp_single_info_heading = get_theme_mod('lp_single_info_heading', $defaults['lp_single_info_heading']);  
		$lp_instructor_single = get_theme_mod('lp_instructor_single', $defaults['lp_instructor_single']);  

		$edubin_lp_video = get_post_meta( get_the_ID(), 'edubin_lp_video', 1 ); 

		?>

	<?php

	//if ( $lp_single_page_layout == '1') : // The section visible only for layout 2 ?>
		<div class="edubin-course-info">
			<?php if ($lp_single_info_heading) { ?>
	 			<h4 class="ld-segment-title tpc_mt_30"><?php echo esc_html( $lp_single_info_heading );?></h4>
	 		<?php } ?>
			<ul class="course-info-list">

			<?php if ( $lp_custom_features_position == 'top' ) : ?>
			<!-- Custom course features cmb2 reparable meta display for top area-->
	            <?php
					$lp_custom_feature_group = get_post_meta(get_the_ID(), 'lp_custom_feature_group', true);
	        		if ( $lp_custom_feature_group): ?>
	                    <?php
						foreach ((array) $lp_custom_feature_group as $key => $entry) {?>

								<li>
	                       			<?php if (isset($entry['lp_custom_feature_group_icon'])): ?>
										<i class="fa <?php echo esc_html($entry['lp_custom_feature_group_icon']); ?>"></i>
									<?php else: ?>
										<i class="fas fa-play-circle"></i>
	                        		<?php endif;?>

	                       			<?php if (isset($entry['lp_custom_feature_group_label'])): ?>
										<span class="label"><?php echo esc_html($entry['lp_custom_feature_group_label']); ?> <?php echo esc_attr( ':' ); ?></span>
	                        		<?php endif;?>
	                        		<?php if (isset($entry['lp_custom_feature_group_value'])): ?>
										<span class="value"><?php echo esc_html($entry['lp_custom_feature_group_value']); ?></span>
									<?php endif;?>
								</li>

	                       	<?php
								}
				        endif;
				        ?>
			<?php endif; ?>


				<?php if ( !$lp_single_header_meta && $lp_students && $lp_course_feature_enroll_show ): ?>
					<li>
						<i class="flaticon-user-4"></i>
					<?php if ( $lp_course_feature_enroll): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_enroll); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Enrolled :', 'edubin');?></span>
					<?php endif;?>
						<?php $user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0; ?>
						<span class="value"><?php echo esc_html($user_count); ?></span>
					</li>
				<?php endif?>

				<?php if ( $lp_duration && $lp_course_feature_duration_show ): ?>
					<li>
						<i class="far fa-clock"></i>
					<?php if ( $lp_course_feature_duration): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_duration); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Duration :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo esc_html($lp_duration[0]); ?></span>
					</li>
				<?php endif?>

	            <?php
	                $lessons = $course->get_items('lp_lesson', false) ? count($course->get_items('lp_lesson', false)) : 0;
	                $lessons_text = ('1' == $lessons) ? esc_html__(' Lesson', 'edubin') : esc_html__(' Lessons', 'edubin');
	            ?>  
				<?php if ( !$lp_single_header_meta && $lessons  && $lp_course_feature_lessons_show ): ?>
					<li>
						<i class="flaticon-book-1"></i>
					<?php if ( $lp_course_feature_lessons): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_lessons); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Lessons :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo esc_attr( $lessons ) . $lessons_text; ?></span>
					</li>
				<?php endif; ?>

	            <?php
	                $quiz = $course->get_items('lp_quiz', false) ? count($course->get_items('lp_quiz', false)) : 0;
	                $quiz_text = ('1' == $quiz) ? esc_html__(' Quiz', 'edubin') : esc_html__(' Quizzes', 'edubin');
	            ?>  

				<?php if ( !$lp_single_header_meta &&  $quiz && $lp_course_feature_quizzes_show ): ?>
				<li>
					<i class="far fa-question-circle"></i>
					<?php if ( !$lp_single_header_meta &&  $lp_course_feature_quizzes): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_quizzes); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Quizzes :', 'edubin');?></span>
					<?php endif;?>
					<span class="value"><?php echo esc_attr( $quiz ) . $quiz_text; ?></span>
				</li>
				<?php endif; ?>
				<?php 

					$lp_max_students = get_post_meta(get_the_ID(), '_lp_max_students');

					if ( $lp_max_students[0] && $lp_course_feature_max_students_show): 
				?>
					<li>
						<i class="fas fa-users"></i>
					<?php if ( $lp_course_feature_max_tudents): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_max_tudents); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Max Students :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo esc_html($lp_max_students[0]); ?></span>
					</li>
				<?php endif; ?>
				<?php if ( $lp_retake_count[0] && $lp_course_feature_retake_count_show == '1'): ?>
					<li>
						<i class="fas fa-redo-alt"></i>
					<?php if ( $lp_course_feature_retake_count): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_retake_count); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Re-take Course :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo esc_html($lp_retake_count[0]); ?></span>
					</li>
				<?php endif; ?>
		
				<?php if ( $course_id && $lp_course_feature_assessments_show == '1'): ?>
					<li>
						<i class="flaticon-refresh"></i>
					<?php if ( $lp_course_feature_assessments): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_assessments); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Assessments :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo (get_post_meta($course_id, '_lpr_course_final', true) == 'yes') ? esc_html_e('Yes', 'edubin') : esc_html_e('Self', 'edubin'); ?></span>
					</li>
				<?php endif; ?>
				<?php
				$course_levels =  learn_press_get_post_level( get_the_ID() );
				if ( $course_levels && $lp_course_feature_skill_level_show ): ?>
					<li>
						<i class="fas fa-signal"></i>
					<?php if ( $lp_course_feature_skill_level): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_skill_level); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Skill Level :', 'edubin');?></span>
					<?php endif;?>
						<span class="value"><?php echo esc_html( $course_levels ); ?></span>
					</li>
				<?php endif?>
				<?php
				$edubin_course_cat = get_the_terms( get_the_ID(), 'course_language' );;
	        	if ( $edubin_course_cat && $lp_course_feature_cat_show == '1'): ?>
					<li>
						<i class="flaticon-folder-1"></i>
					<?php if ( $lp_course_feature_cat): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_cat); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Category :', 'edubin');?></span>
					<?php endif;?>
						<span class="lp_course_cat value">
							<?php 
								echo get_the_term_list(get_the_ID(), 'course_category', '', ' ', '');
							?>
							</span>
					</li>
				<?php endif?>

				<?php
				$edubin_course_language = get_the_terms( get_the_ID(), 'course_language' );;
	        	if ( $edubin_course_language && $lp_course_feature_language_show == '1'): ?>
					<li>
						<i class="flaticon-worldwide"></i>
					<?php if ( $lp_course_feature_language): ?>
						<span class="label"><?php echo esc_html($lp_course_feature_language); ?></span>
					<?php else: ?>
						<span class="label"><?php esc_html_e('Language :', 'edubin');?></span>
					<?php endif;?>
						<span class="language-tag value">
							<?php 
								foreach ( $edubin_course_language as $tax ) {
								   	echo '<span>'. esc_html($tax->name).'</span> ';
								} 
							?>
							</span>
					</li>
				<?php endif?>

			<?php if ( $lp_custom_features_position == 'bottom') : ?>
				<!-- Custom course features cmb2 reparable meta display (bottom area) -->
	            <?php
					$lp_custom_feature_group = get_post_meta(get_the_ID(), 'lp_custom_feature_group', true);
	        		if ( $lp_custom_feature_group): ?>
	                    <?php
						foreach ((array) $lp_custom_feature_group as $key => $entry) {?>

								<li>
	                       			<?php if (isset($entry['lp_custom_feature_group_icon'])): ?>
										<i class="fa <?php echo esc_html($entry['lp_custom_feature_group_icon']); ?>"></i>
									<?php else: ?>
										<i class="fas fa-play-circle"></i>
	                        		<?php endif;?>

	                       			<?php if (isset($entry['lp_custom_feature_group_label'])): ?>
										<span class="label"><?php echo esc_html($entry['lp_custom_feature_group_label']); ?> <?php echo esc_attr( ':' ); ?></span>
	                        		<?php endif;?>
	                        		<?php if (isset($entry['lp_custom_feature_group_value'])): ?>
										<span class="value"><?php echo esc_html($entry['lp_custom_feature_group_value']); ?></span>
									<?php endif;?>
								</li>

	                       	<?php
								}
				        endif;
				        ?>
				    <?php endif; ?>
			</ul>
		</div>
	<?php //endif; ?>
		<?php

	    }
	}

    /**
     * Display Course Category
     */
    
    if ( ! function_exists( 'edubin_lp_course_category' ) ) {

        function edubin_lp_course_category() {  

        global $post;
        $post_id    = $post->ID;

        ?>
       <!--  LearnDash Course Category -->
        <div class="lp__widget">    
            <section class="widget edubin-course-widget">
                <h2 class="widget-title"><?php esc_html_e('Course Categories', 'edubin');?></h2> 
                <?php
                
                $args = array(
                   'taxonomy' => 'course_category',
                   'orderby' => 'name',
                   'order'   => 'ASC'
                );
               $terms = get_categories($args);
               
                if ($terms && ! is_wp_error($terms)): ?>
                    <ul>
                    <?php foreach($terms as $term): ?>
                        <li><a href="<?php echo get_term_link( $term->slug, 'course_category'); ?>" rel="tag" class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
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
    
    if ( ! function_exists( 'edubin_lp_related_course_content' ) ) {

        function edubin_lp_related_course_content( $postType = 'lp_course', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $lp_related_course_title = get_theme_mod('lp_related_course_title', $defaults['lp_related_course_title']);
        $lp_related_course_items = get_theme_mod('lp_related_course_items', $defaults['lp_related_course_items']);
        $lp_related_course_by = get_theme_mod('lp_related_course_by', $defaults['lp_related_course_by']);

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $lp_related_course_items;
        if (null === $relatedBy) $relatedBy = $lp_related_course_by;
        if (null === $postType) $postType = 'lp_course';

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

                <h3 class="related-title text-center"><?php echo esc_html( $lp_related_course_title ); ?></h3>

            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="course-item-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'course_thumb' ); ?></a>
                            </div>
                        <?php endif; ?>
                    <div class="entry-desc">
								<?php get_template_part( 'learnpress/tpl-part/price'); ?>
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                          <?php //if (!$lp_single_hide_enrolled) {

							  $course = \LP_Global::course();
							  $lessons = $course->get_items('lp_lesson', false) ? count($course->get_items('lp_lesson', false)) : 0;
				
							// }

							   $students = (int)learn_press_get_course()->count_students(); 

                          ?>

                        <div class="entry-date">
                          <span class="posted-on list-inline-item">
                            <i class="meta-icon flaticon-book-1"></i>
                              <span><?php echo esc_attr($lessons); ?>
                                 <?php //echo esc_html($lesson_text); ?></span>
                          </span>
                          <span class="posted-on list-inline-item">
                            <i class="flaticon-user-4"></i>
                              <span><?php echo esc_attr($students); ?>
                                 <?php //echo esc_html($students_text); ?></span>
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

    if ( ! function_exists( 'edubin_lp_related_course_sidebar' ) ) {

        function edubin_lp_related_course_sidebar( $postType = 'lp_course', $postID = null, $totalPosts = null, $relatedBy = null) { 

        $defaults = edubin_generate_defaults();
        $lp_related_course_title = get_theme_mod('lp_related_course_title', $defaults['lp_related_course_title']);
        $lp_related_course_items = get_theme_mod('lp_related_course_items', $defaults['lp_related_course_items']);
        $lp_related_course_by = get_theme_mod('lp_related_course_by', $defaults['lp_related_course_by']);
        $lp_related_course_style = get_theme_mod('lp_related_course_style', $defaults['lp_related_course_style']);
        $final_lp_related_course_style = ($lp_related_course_style == 'square') ? 'square' : 'round';

        global $post, $related_posts_custom_query_args;
        if (null === $postID) $postID = $post->ID;
        if (null === $totalPosts) $totalPosts = $lp_related_course_items;
        if (null === $relatedBy) $relatedBy = $lp_related_course_by;
        if (null === $postType) $postType = 'lp_course';

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
     
              <section id="pxcv-learndash-course-2" class="widget edubin-course-widget widget_pxcv_posts style__<?php echo esc_attr($final_lp_related_course_style); ?>">
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



                            // Show price
                            //if ( $price) : ?>
                              <span class="price">
                                <?php //echo esc_html($price); ?>
                               </span>
                           <?php //endif;

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

// ========================================================================================================================
	/**
	 * Display related courses sidebar
	 */
	if (!function_exists('edubin_related_courses')) {
	    function edubin_related_courses()
	    {
	        $related_courses = edubin_get_related_courses(null, array('posts_per_page' => 3));
	        if ( $related_courses) {
	            $ids = wp_list_pluck($related_courses, 'ID');
	            ?>
				<div class="col-lg-12 col-md-6">
					<div class="edubin-related-course">
						<h2 class="widget-title"><?php esc_html_e('You May Like', 'edubin');?></h2>
						<?php foreach ($related_courses as $course_item): ?>
						<?php
						$course      = LP_Course::get_course($course_item->ID);
						$is_required = $course->is_required_enroll();
						$count       = $course->get_users_enrolled();
						?>

							<div class="single-maylike">
								<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($course_item->ID), 'thumbnail', false, '');?>
								<div class="image">
									<img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_attr($course_item->post_title); ?>">
								</div>
								<div class="cont">
									<a href="<?php echo get_the_permalink($course_item->ID); ?>"><h4><?php echo esc_html($course_item->post_title); ?></h4></a>
									<ul>
										<li class="enroll-student"><i class="flaticon-user-4"></i><?php echo esc_html($count); ?></li>

										<?php if ( $price = $course->get_price_html()) {

						                $origin_price = $course->get_origin_price_html();
						                $sale_price   = $course->get_sale_price();
						                $sale_price   = isset($sale_price) ? $sale_price : '';
						                $class        = '';
						                if ( $course->is_free() || !$is_required) {
						                    $class .= ' free-course';
						                    $price = __('Free', 'edubin');
						                }
	                					?>
											<li><?php
											if ( $sale_price !== '') {
							                    echo '<span class="course-origin-price">' . $origin_price . '</span>';
							                }
							                ?>
											<?php echo esc_html($price);
	            } ?>
									</li>
								</ul>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			</div>

		<?php
	}
	    }
	}

if (!function_exists('edubin_get_related_courses')) {
    function edubin_get_related_courses($limit)
    {
        if (!$limit) {
            $limit = 3;
        }
        $course_id = get_the_ID();

        $tag_ids = array();
        $tags    = get_the_terms($course_id, 'course_tag');

        if ( $tags) {
            foreach ($tags as $individual_tag) {
                $tag_ids[] = $individual_tag->slug;
            }
        }

        $args = array(
            'posts_per_page'      => $limit,
            'paged'               => 1,
            'ignore_sticky_posts' => 1,
            'post__not_in'        => array($course_id),
            'post_type'           => 'lp_course',
        );

        if ( $tag_ids) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'course_tag',
                    'field'    => 'slug',
                    'terms'    => $tag_ids,
                ),
            );
        }

        $related = array();
        if ( $posts = new WP_Query($args)) {
            global $post;
            while ($posts->have_posts()) {
                $posts->the_post();
                $related[] = $post;
            }
        }
        wp_reset_postdata();

        return $related;
    }
}

/**
 * @edubin_extra_user_profile_fields
 */
if (!function_exists('edubin_extra_user_profile_fields')) {
    function edubin_extra_user_profile_fields($user)
    {
        $user_info = get_the_author_meta('lp_info', $user->ID);
        ?>
		<h3><?php esc_html_e('LearnPress Profile', 'edubin');?></h3>

		<table class="form-table">
			<tbody>
				<tr>
					<th>
						<label for="lp_major"><?php esc_html_e('Major', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_major" class="regular-text" type="text"
						value="<?php echo isset($user_info['major']) ? $user_info['major'] : ''; ?>"
						name="lp_info[major]">
					</td>
				</tr>
				<tr>
					<th>
						<label for="lp_facebook"><?php esc_html_e('Facebook Account', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_facebook" class="regular-text" type="text"
						value="<?php echo isset($user_info['facebook']) ? $user_info['facebook'] : ''; ?>"
						name="lp_info[facebook]">
					</td>
				</tr>
				<tr>
					<th>
						<label for="lp_twitter"><?php esc_html_e('Twitter Account', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_twitter" class="regular-text" type="text"
						value="<?php echo isset($user_info['twitter']) ? $user_info['twitter'] : ''; ?>"
						name="lp_info[twitter]">
					</td>
				</tr>
				<tr>
					<th>
						<label for="lp_instagram"><?php esc_html_e('Instagram Account', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_instagram" class="regular-text" type="text"
						value="<?php echo isset($user_info['instagram']) ? $user_info['instagram'] : ''; ?>"
						name="lp_info[instagram]">
					</td>
				</tr>
				<tr>
					<th>
						<label for="lp_linkedin"><?php esc_html_e('LinkedIn Plus Account', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_linkedin" class="regular-text" type="text"
						value="<?php echo isset($user_info['linkedin']) ? $user_info['linkedin'] : ''; ?>"
						name="lp_info[linkedin]">
					</td>
				</tr>
				<tr>
					<th>
						<label for="lp_youtube"><?php esc_html_e('Youtube Account', 'edubin');?></label>
					</th>
					<td>
						<input id="lp_youtube" class="regular-text" type="text"
						value="<?php echo isset($user_info['youtube']) ? $user_info['youtube'] : ''; ?>"
						name="lp_info[youtube]">
					</td>
				</tr>
			</tbody>
		</table>
		<?php
}
}

add_action('show_user_profile', 'edubin_extra_user_profile_fields');
add_action('edit_user_profile', 'edubin_extra_user_profile_fields');

function edubin_save_extra_user_profile_fields($user_id)
{

    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'lp_info', $_POST['lp_info']);
}

add_action('personal_options_update', 'edubin_save_extra_user_profile_fields');
add_action('edit_user_profile_update', 'edubin_save_extra_user_profile_fields');

/**
 * Display co instructors
 *
 * @param $course_id
 */
if (!function_exists('edubin_co_instructors')) {
    function edubin_co_instructors($course_id, $author_id)
    {
        if (!$course_id) {
            return;
        }

        if (class_exists('LP_Co_Instructor_Preload') or class_exists('LP_Multiple_Instructor_Preload')) {
            $instructors = get_post_meta($course_id, '_lp_co_teacher');
            $instructors = array_diff($instructors, array($author_id));
            if ( $instructors) {
                foreach ($instructors as $instructor) {
                    //Check if instructor not exist
                    $user = get_userdata($instructor);
                    if ( $user === false) {
                        break;
                    }
                    $lp_info = get_the_author_meta('lp_info', $instructor);
                    $link    = learn_press_user_profile_link($instructor);
                    ?>
						<div class="edubin-about-author edubin-co-instructor">
						<div class="author-wrapper">
							<div class="author-avatar">
								<?php echo get_avatar($instructor, 110); ?>
							</div>
							<div class="author-bio">
								<div class="author-top">
									<a itemprop="url" class="name" href="<?php echo esc_url($link); ?>">
										<span itemprop="name"><?php echo get_the_author_meta('display_name', $instructor); ?></span>
									</a>
									<?php if (isset($lp_info['major']) && $lp_info['major']): ?>
										<p class="job"
										itemprop="jobTitle"><?php echo esc_html($lp_info['major']); ?></p>
									<?php endif;?>
								</div>
								<ul class="edubin-author-social">
								<?php if (isset($lp_info['facebook']) && $lp_info['facebook']): ?>
								<li>
								<a href="<?php echo esc_url($lp_info['facebook']); ?>" class="facebook"><i
									class="fab fa-facebook-f"></i></a>
								</li>
								<?php endif;?>

								<?php if (isset($lp_info['twitter']) && $lp_info['twitter']): ?>
								<li>
									<a href="<?php echo esc_url($lp_info['twitter']); ?>" class="twitter"><i
										class="fab fa-twitter"></i></a>
									</li>
								<?php endif;?>

								<?php if (isset($lp_info['instagram']) && $lp_info['instagram']): ?>
									<li>
										<a href="<?php echo esc_url($lp_info['instagram']); ?>" class="instagram"><i
											class="fab fa-instagram"></i></a>
										</li>
									<?php endif;?>

									<?php if (isset($lp_info['linkedin']) && $lp_info['linkedin']): ?>
										<li>
											<a href="<?php echo esc_url($lp_info['linkedin']); ?>" class="linkedin"><i
												class="fab fa-linkedin-in"></i></a>
											</li>
										<?php endif;?>

										<?php if (isset($lp_info['youtube']) && $lp_info['youtube']): ?>
											<li>
												<a href="<?php echo esc_url($lp_info['youtube']); ?>" class="youtube"><i
													class="fab fa-youtube"></i></a>
												</li>
											<?php endif;?>
										</ul>

									</div>
									<div class="author-description" itemprop="description">
										<?php echo get_the_author_meta('description', $instructor); ?>
									</div>
								</div>
							</div>
					<?php
}
            }
        }
    }
}
/**
 * About the author/ default instructor only
 */
if (!function_exists('edubin_about_author')) {
    function edubin_about_author()
    {
        $lp_info = get_the_author_meta('lp_info');
        ?>
		<div class="edubin-about-author">

			<div class="author-top">
				<?php if (isset($lp_info['major']) && $lp_info['major']): ?>
					<p class="job"><?php echo esc_html($lp_info['major']); ?></p>
				<?php endif;?>
			</div>

			<ul class="edubin-author-social">
				<?php if (isset($lp_info['facebook']) && $lp_info['facebook']): ?>
					<li>
						<a href="<?php echo esc_url($lp_info['facebook']); ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
					</li>
				<?php endif;?>

				<?php if (isset($lp_info['twitter']) && $lp_info['twitter']): ?>
					<li>
						<a href="<?php echo esc_url($lp_info['twitter']); ?>" class="twitter"><i class="fab fa-twitter"></i></a>
					</li>
				<?php endif;?>

				<?php if (isset($lp_info['instagram']) && $lp_info['instagram']): ?>
					<li>
						<a href="<?php echo esc_url($lp_info['instagram']); ?>" class="instagram"><i
							class="fab fa-instagram"></i></a>
						</li>
					<?php endif;?>

					<?php if (isset($lp_info['linkedin']) && $lp_info['linkedin']): ?>
						<li>
							<a href="<?php echo esc_url($lp_info['linkedin']); ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
						</li>
					<?php endif;?>

					<?php if (isset($lp_info['youtube']) && $lp_info['youtube']): ?>
						<li>
							<a href="<?php echo esc_url($lp_info['youtube']); ?>" class="youtube"><i class="fab fa-youtube"></i></a>
						</li>
					<?php endif;?>
				</ul>
			</div>
			<?php

    }
}

