
<?php while ( have_posts() ) : the_post(); 

    global $post; 
    $post_id = $post->ID;
    $course_id = $post_id;
    $user_id   = get_current_user_id();
    $current_id = $post->ID;
    $prefix = '_edubin_';

    $description   = get_post_meta( $post_id, '_learndash_course_grid_short_description', true );

    $defaults = edubin_generate_defaults();

    $mb_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    $ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);

    $final_ld_single_layout = ( !$mb_ld_single_page_layout == 'default') ? $ld_single_page_layout : $mb_ld_single_page_layout;

    $ld_single_review = get_theme_mod( 'ld_single_review', $defaults['ld_single_review']); 
    $ld_single_last_update = get_theme_mod( 'ld_single_last_update', $defaults['ld_single_last_update']); 
    $ld_single_short_text = get_theme_mod( 'ld_single_short_text', $defaults['ld_single_short_text']); 
    $ld_single_duration = get_theme_mod( 'ld_single_duration', $defaults['ld_single_duration']); 
    $ld_single_lessons = get_theme_mod( 'ld_single_lessons', $defaults['ld_single_lessons']); 
    $ld_single_topic = get_theme_mod( 'ld_single_topic', $defaults['ld_single_topic']); 

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

    $top_header_type = ($final_ld_single_page_layout == '4') ? 'light' : 'dark';
    $header_content_col = ($final_ld_single_page_layout == '3') ? '12' : '8';
    $header_top_meta_center = ($final_ld_single_page_layout == '3') ? 'text-center' : '';
    $header_meta_center = ($final_ld_single_page_layout == '3') ? 'justify-content-center' : '';
    $header_bg_class = ($final_ld_single_page_layout == '3') ? 'course-page-header' : '';

    $breadcrumb_show = get_theme_mod( 'breadcrumb_show', $defaults['breadcrumb_show']); 
    $shortcode_breadcrumb = get_theme_mod( 'shortcode_breadcrumb', $defaults['shortcode_breadcrumb']); 
    $ld_single_breadcrumb = get_theme_mod( 'ld_single_breadcrumb', $defaults['ld_single_breadcrumb']); 

    $page_header_img = get_post_meta($post_id, $prefix . 'header_img', true);

?>

<?php if ($final_ld_single_page_layout == '3'): ?>
<div class="edubin-course-top-info <?php echo esc_attr($top_header_type); ?> <?php echo esc_attr($header_bg_class); ?>" style="background-image: url('<?php if ( $page_header_img ): ?><?php echo esc_url( $page_header_img ); ?><?php else : ?><?php echo esc_url( get_header_image() ); ?><?php endif ?>');">

<?php else: ?>
<div class="edubin-course-top-info <?php echo esc_attr($top_header_type); ?>">
<?php endif ?>

  <div class="container">
    <div class="row <?php echo esc_attr($header_top_meta_center); ?>">
      <div class="col-lg-<?php echo esc_attr($header_content_col); ?>">

        <div class="edubin-single-course-lead-info ld">

          <?php if( $breadcrumb_show && $ld_single_breadcrumb ): ?>
              <div class="header-breadcrumb">
                  <?php if($shortcode_breadcrumb) : ?>
                      <?php echo do_shortcode( $shortcode_breadcrumb ); ?>
                  <?php else : ?>
                      <?php edubin_breadcrumb_trail(); ?>
                  <?php endif; ?>
              </div>
          <?php endif; ?>

          <h1 class="course-title"><?php the_title(); ?></h1>

        <?php if ( $ld_single_short_text ) { ?> 
            <div class="course-short-text"> <p><?php echo $description; ?></p></div>
        <?php } ?>

        <?php if ( $final_ld_single_page_layout == '2' || $final_ld_single_page_layout == '4' ) : ?>

        <?php if ( $ld_single_review || $ld_single_last_update) { ?>
          <div class="edubin-single-course-lead-meta <?php echo esc_attr($header_meta_center); ?>">

              <?php if ( $ld_single_review && function_exists( 'ldcr_course_rating_stars' ) ) { ?>

                  <div class="lead-meta-item meta-last-review">
                      <?php ldcr_course_rating_stars(); ?>
                  </div>

              <?php } ?>

              <?php if ($ld_single_last_update) { ?>

                <div class="lead-meta-item meta-last-update">
                  <span class="lead-meta-value"><?php echo esc_html__('Last Updated :', 'edubin'); ?> <?php echo get_the_modified_date('d-m-Y'); ?></span>
                </div>         
                    
              <?php } ?>

            </div>
          <?php } ?>
        <?php endif; ?>

        <?php if ( $final_ld_single_page_layout == '3' ) : ?>
          <div class="edubin-single-course-lead-meta <?php echo esc_attr($header_meta_center); ?>">
            <div class="page-title-bar-meta">

              <?php //if ($ld_instructor_single) { ?> 
              <div class="course-instructor post-author">
                <span class="meta-icon meta-image">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                </span>
                <span class="meta-value">
                  <?php the_author() ?>
                </span>
              </div>
              <?php// } ?>

              <?php 

              $duration      = get_post_meta( $post_id, '_learndash_course_grid_duration', true );
              $duration_h = is_numeric( $duration ) ? floor( $duration / HOUR_IN_SECONDS ) : null;
              $duration_m = is_numeric( $duration ) ? floor( ( $duration % HOUR_IN_SECONDS ) / MINUTE_IN_SECONDS ) : null;

              $tf_duration_h_text   = esc_html__('h', 'edubin');
              $tf_duration_m_text   = esc_html__('m', 'edubin');

              if ( $ld_single_duration && !empty($duration_h) && !empty($duration_m) ) : ?>
              <div class="course-lesson">
                <span class="meta-icon far fa-clock"></span>
                <span class="meta-value">
                <?php echo esc_html__('Duration :', 'edubin'); ?>            
                  <?php if ($duration_h): ?>
                      <?php echo esc_attr($duration_h); ?><?php echo esc_html($tf_duration_h_text); ?>   
                  <?php endif ?>

                  <?php if ($duration_m): ?>
                      <?php echo esc_attr($duration_m); ?><?php echo esc_html($tf_duration_m_text); ?>   
                  <?php endif ?>
                </span>
              </div>
              <?php endif; ?>

              <?php if ( $ld_single_lessons ) :

                $lesson      = learndash_get_course_steps(get_the_ID(), array('sfwd-lessons'));
                $lesson      = $lesson ? count($lesson) : 0;
                $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

              ?>
              <div class="course-lesson">
                <span class="meta-icon far fa-file-alt"></span>
                <span class="meta-value">
                    <?php echo esc_attr($lesson); ?>
                    <?php echo esc_html($lesson_text); ?>
                 </span>
              </div>
              <?php endif; ?>

              <?php if ( $ld_single_topic ) :

                $topic      = learndash_get_course_steps(get_the_ID(), array('sfwd-topic'));
                $topic      = $topic ? count($topic) : 0;
                $topic_text = ('1' == $topic) ? esc_html__('Topic', 'edubin') : esc_html__('Topics', 'edubin');
              ?>
                <div class="course-duration">
                  <span class="meta-icon far fa-file-video"></span>
                  <span class="meta-value">
                    <?php echo esc_attr($topic); ?>
                    <?php echo esc_html($topic_text); ?>
                  </span>
                </div>
              <?php endif; ?>

              <?php if ($ld_single_last_update) : ?>

                <div class="course-duration">
                  <span class="meta-icon fas fa-history"></span>
                  <span class="meta-value">
                   <?php echo esc_html__('Last Updated :', 'edubin'); ?> <?php echo get_the_modified_date('d-m-Y'); ?>
                  </span>
                </div>
              <?php endif; ?>

            </div>
          </div>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; // End of the loop. ?>