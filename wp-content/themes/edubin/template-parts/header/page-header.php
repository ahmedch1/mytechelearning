<?php
    $post_id = edubin_get_id();
    $prefix = '_edubin_';
    $defaults = edubin_generate_defaults();
    $page_header_enable = get_post_meta($post_id, $prefix . 'page_header_enable', true);
    $page_header_img = get_post_meta($post_id, $prefix . 'header_img', true);
    $breadcrumb_show = get_theme_mod( 'breadcrumb_show', $defaults['breadcrumb_show']); 
    $shortcode_breadcrumb = get_theme_mod( 'shortcode_breadcrumb', $defaults['shortcode_breadcrumb']); 
    $header_variations = get_theme_mod( 'header_variations', $defaults['header_variations'] );
    $header_title_tag = get_theme_mod( 'header_title_tag', $defaults['header_title_tag'] );
    $lp_archive_page_title = get_theme_mod( 'lp_archive_page_title', $defaults['lp_archive_page_title'] );
    $tutor_archive_page_title = get_theme_mod( 'tutor_archive_page_title', $defaults['tutor_archive_page_title'] );
    $ld_archive_page_title = get_theme_mod( 'ld_archive_page_title', $defaults['ld_archive_page_title'] );
    $ld_groups_archive_page_title = get_theme_mod( 'ld_groups_archive_page_title', $defaults['ld_groups_archive_page_title'] );
    $sensei_archive_page_title = get_theme_mod( 'sensei_archive_page_title', $defaults['sensei_archive_page_title'] );
    $tribe_events_archive_page_title = get_theme_mod( 'tribe_events_archive_page_title', $defaults['tribe_events_archive_page_title'] );

?>

    <?php if( function_exists( 'is_woocommerce' ) && is_woocommerce() ){ ?>

        <?php echo '<'.$header_title_tag.' class="page-title">'; ?>
            <?php woocommerce_page_title(); ?>
        <?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif( class_exists('LearnPress') && is_archive() && 'lp_course' == get_post_type()){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( $lp_archive_page_title ); ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif(function_exists("tutor")  && is_archive() && 'courses' == get_post_type() && is_post_type_archive( 'courses') ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( $tutor_archive_page_title ); ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif(class_exists( 'Sensei_Main' )  && is_archive() && 'course' == get_post_type() && is_post_type_archive( 'course') ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( $sensei_archive_page_title ); ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif( class_exists('SFWD_LMS') && is_archive() && 'sfwd-courses' == get_post_type()){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( $ld_archive_page_title ); ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif( class_exists('SFWD_LMS') && is_archive() && 'groups' == get_post_type()){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( $ld_groups_archive_page_title ); ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif(function_exists( 'tribe_events' ) && is_archive() && 'tribe_events' == get_post_type() && is_post_type_archive( 'tribe_events') ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo $tribe_events_archive_page_title; ?><?php echo '</'.$header_title_tag.'>' ?>

       <?php } elseif(function_exists( 'tribe_events' ) && is_single() && is_singular( 'tribe_events' )){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php single_post_title(); ?><?php echo '</'.$header_title_tag.'>' ?>

    <?php } elseif(is_page() || is_single()){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php echo esc_html( get_the_title() ); ?><?php echo '</'.$header_title_tag.'>' ?>

    <?php } elseif( is_search() ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php printf( __( 'Search Results for: %s', 'edubin' ), '<span>' . get_search_query() . '</span>' ); ?><?php echo '</'.$header_title_tag.'>' ?>

    <?php }elseif( is_404() ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php esc_html_e( 'Page Not Found: 404', 'edubin'); ?><?php echo '</'.$header_title_tag.'>' ?>

    <?php }elseif( is_home() ){ ?>

         <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php single_post_title(); ?><?php echo '</'.$header_title_tag.'>' ?>
        
    <?php } 

    else {
        if(is_archive()) {
            the_archive_title( '<'.$header_title_tag.' class="page-title">', '</'.$header_title_tag.'>' ); 
        }
        ?>

        <?php if ( is_single() ) { ?>
             <?php echo '<'.$header_title_tag.' class="page-title">'; ?><?php single_post_title(); ?><?php echo '</'.$header_title_tag.'>' ?>
        <?php  }
        
    }
    ?>
    <?php if($breadcrumb_show == '1'): ?>
        <div class="header-breadcrumb">
            <?php if($shortcode_breadcrumb) : ?>
                <?php echo do_shortcode( $shortcode_breadcrumb ); ?>
            <?php else : ?>
                <?php edubin_breadcrumb_trail(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>



