<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Edubin
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function edubin_body_classes( $classes ) {


	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'edubin-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'edubin-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors = edubin_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'light' ) );
	$classes[] = 'colors-' . $colors;

    // Finally $classes return 
	return $classes;


}
add_filter( 'body_class', 'edubin_body_classes' );

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function edubin_panel_count() {

	$panel_count = 0;

	/**
	 * Filter number of front page sections in Edubin.
	 *
	 * @since Edubin 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'edubin_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function edubin_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Change archive page title
 */
// function edubin_custom_archive_title( $title ){

//     if ( $title == "Archives: Events" ) $title = "Events";
//     if ( $title == "Archives: Courses" ) $title = "Courses";
//     return $title;
    
// }
// add_filter( "get_the_archive_title", "edubin_custom_archive_title" );


/**
 * Get post meta
 *
 * @param $key
 * @param $args
 * @param $post_id
 *
 * @return string
 * @return bool
 */
if ( ! function_exists( 'edubin_meta' ) ) {
	function edubin_meta( $key, $args = array(), $post_id = null ) {
		$post_id = empty( $post_id ) ? get_the_ID() : $post_id;

		$args = wp_parse_args( $args, array(
			'type' => 'text',
		) );

		// Image
		if ( in_array( $args['type'], array( 'image' ) ) ) {
			if ( isset( $args['single'] ) && $args['single'] == "false" ) {
				// Gallery
				$temp          = array();
				$data          = array();
				$attachment_id = get_post_meta( $post_id, $key, false );
				if ( ! $attachment_id ) {
					return $data;
				}

				if ( empty( $attachment_id ) ) {
					return $data;
				}
				foreach ( $attachment_id as $k => $v ) {
					$image_attributes = wp_get_attachment_image_src( $v, $args['size'] );
					$temp['url']      = $image_attributes[0];
					$data[]           = $temp;
				}

				return $data;
			} else {
				// Single Image
				$attachment_id    = get_post_meta( $post_id, $key, true );
				$image_attributes = wp_get_attachment_image_src( $attachment_id, $args['size'] );

				return $image_attributes;
			}
		}

		return get_post_meta( $post_id, $key, $args );
	}
}


if ( !function_exists( 'edubin_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function edubin_entry_meta() {

	    $defaults = edubin_generate_defaults();
	    $blog_author_show = get_theme_mod( 'blog_author_show', $defaults['blog_author_show']);
	    $blog_date_show = get_theme_mod( 'blog_date_show', $defaults['blog_date_show']);
	    $blog_category_show = get_theme_mod( 'blog_category_show', $defaults['blog_category_show']);
	    $blog_comment_show = get_theme_mod( 'blog_comment_show', $defaults['blog_comment_show']);
	    $blog_view_show = get_theme_mod( 'blog_view_show', $defaults['blog_view_show']);

         if ($blog_author_show || $blog_date_show || $blog_category_show || $blog_comment_show || $blog_view_show == true) : ?>
            <ul class="entry-meta list-inline">

                <?php if ($blog_author_show == true):  ?>
                    <?php if ( 'post' === get_post_type() ): edubin_posted_author(); endif; ?>
                 <?php endif; ?>

                <?php if ($blog_date_show == true):  ?>
                    <?php edubin_posted_date();  ?>
                 <?php endif; ?>

                <?php if( $blog_comment_show == true): ?>
                <li class="meta-comment list-inline-item">
                    <?php $cmt_link = get_comments_link(); 
                          $num_comments = get_comments_number();
                            if ( $num_comments == 0 ) {
                                $comments = esc_html__( 'No Comments', 'edubin' );
                            } elseif ( $num_comments > 1 ) {
                                $comments = $num_comments . esc_html__( ' Comments', 'edubin' );
                            } else {
                                $comments = esc_html__('1 Comment', 'edubin' );
                            }
                    ?>  
                    <i class="flaticon-chat-1"></i>
                    <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $comments );?></a>
                </li>
                <?php endif; ?>
                
                <?php if( has_category() && $blog_category_show == true):
                        echo '<li class="meta-categories list-inline-item"><i class="flaticon-folder-1"></i>';
                            the_category( ',' );
                        echo '</li>';
                endif; ?>

                <?php if ($blog_view_show == true):  ?>
                	<?php if(function_exists('edubinGetPostViews')){ ?>
                    <?php echo '<li class="post-views list-inline-item"><i class="flaticon-binoculars"></i>'; ?>
                    <span><?php echo esc_attr(edubinGetPostViews(get_the_ID())); ?> <?php esc_html_e( 'Views', 'edubin' ); ?></span>
                       <?php echo '</li>';?>
                   <?php } ?>
                 <?php endif; ?>
            </ul>
        <?php endif; ?>
		<?php
	}
endif;

/**
 * Display post thumbnail by default
 *
 * @param $size
 */


//Edubin comment form
add_filter('comment_form_default_fields','edubin_comments_form');
if(!function_exists('edubin_comments_form')){
    function edubin_comments_form($default){

    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option( 'require_name_email' );
    $aria_req      = ( $req ? " aria-required='true'" : '' );
    $html_req      = ( $req ? " required='required'" : '' );
    $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

    $fields = [
        'author' => '<p class="comment-form-author">' .
                    '<input placeholder='. esc_html__( 'Name', 'edubin'  ) . ( $req ? ' *' : '' ) . ' id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email">' .
                    '<input placeholder='. esc_html__( 'Email', 'edubin'  ) . ( $req ? ' *' : '' ) . ' id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
        'comment_field' => '<p class="comment-form-comment"> <textarea placeholder='. esc_html__( 'Comment', 'edubin'  ) . ( $req ? ' *' : '' ) . 'id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>',
    ];

    return $fields;
    }
}
add_filter('comment_form_defaults','edubin_form_default');

 if(!function_exists('edubin_form_default')){
    function edubin_form_default($default_info){
        if(!is_user_logged_in()){
            $default_info['comment_field'] = '';
        }else{
            $default_info['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="60" rows="6" placeholder='. esc_html__( 'Comment', 'edubin'  ) .' aria-required="true"></textarea></p>';
        }
         
        $default_info['submit_button'] = '<button class="edubin_btn" type="submit">'.esc_html__('Post Comment','edubin').'</button>';
        $default_info['submit_field'] = '%1$s %2$s';
        $default_info['comment_notes_before'] = ' ';
        $default_info['title_reply'] = esc_html__('Leave a Comment ','edubin');
        $default_info['title_reply_before'] = '<div class="commment_title"><h3> ';
        $default_info['title_reply_after'] = '</h3></div> ';
 
        return $default_info;
    }
 
 }

// Two coluumn menu option for widget
function edubin_add_menu_on_off_menu_two_clm_option( $widget, $return, $instance ) {
 
    // Are we dealing with a nav menu widget?
    if ( 'nav_menu' == $widget->id_base ) {
 
        // Display the on_off_menu_two_clm option.
        $on_off_menu_two_clm = isset( $instance['on_off_menu_two_clm'] ) ? $instance['on_off_menu_two_clm'] : '';
        ?>
            <p>
                <input class="checkbox" type="checkbox" id="<?php echo esc_attr($widget->get_field_id('on_off_menu_two_clm')); ?>" name="<?php echo esc_attr($widget->get_field_name('on_off_menu_two_clm')); ?>" <?php checked( true , $on_off_menu_two_clm ); ?> />
                <label for="<?php echo esc_attr($widget->get_field_id('on_off_menu_two_clm')); ?>">
                    <?php esc_html_e( 'Two Column Menu', 'edubin' ); ?>
                </label>
            </p>
        <?php
    }
}
add_filter('in_widget_form', 'edubin_add_menu_on_off_menu_two_clm_option', 10, 3 );

function edubin_save_menu_on_off_menu_two_clm_option( $instance, $new_instance ) {
 
    // Is the instance a nav menu and are on_off_menu_two_clms enabled?
    if ( isset( $new_instance['nav_menu'] ) && !empty( $new_instance['on_off_menu_two_clm'] ) ) {
        $new_instance['on_off_menu_two_clm'] = 1;
    }
 
    return $new_instance;
}
add_filter( 'widget_update_callback', 'edubin_save_menu_on_off_menu_two_clm_option', 10, 2 );


// Two column menu input save
function edubin_in_widget_form_update($instance, $new_instance, $old_instance){

    $instance['on_off_menu_two_clm'] = isset($new_instance['on_off_menu_two_clm']);

    return $instance;
}

// Two column menu class output
function edubin_dynamic_sidebar_params($params){
    global $wp_registered_widgets;
    $widget_id = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];

    if (isset($widget_opt[$widget_num]['on_off_menu_two_clm'])){
  
        $params[0]['before_widget'] = preg_replace('/class="/', 'class="two-column-menu ',  $params[0]['before_widget'], 1);
    }
    return $params;
}

//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'edubin_in_widget_form_update',5,3);
//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'edubin_dynamic_sidebar_params');



/**
* Edubin get tvf relented Function 
*/
add_filter('admin_body_class', 'edubin_admin_body_class');

function edubin_admin_body_class($classes)
{

    if (edubin_check_tvc()) {
        return "$classes no_edubin_unlock";
    } else {
        return "$classes edubin_unlock";
    }
}

function edubin_tvf_register_settings()
{
    add_option('edubin_tv_option', '');
    register_setting('edubin_tv_options_group', 'edubin_tv_option', 'edubin_tv_callback');
}
add_action('admin_init', 'edubin_tvf_register_settings');

function edubin_tvf_register_options_page()
{
    add_options_page('Theme Verify', 'Theme Verify', 'manage_options', 'edubin_tvf', 'edubin_tv_options_page');
}
add_action('admin_menu', 'edubin_tvf_register_options_page');

function edubin_tv_options_page()
{
    ?>
<div class="edubin-activation-theme_form">
    <div class="container-form">
<form method="post" action="options.php">
      <?php settings_fields('edubin_tv_options_group');?>

        <h1 class="edubin-title"><?php esc_html_e('Activate Your License', 'edubin');?></h1>
        <div class="edubin-content">
            <p class="edubin-content_subtitle">
                <?php echo sprintf(esc_html__('Welcome and thank you for Choosing %s Theme!', 'edubin'), esc_html(wp_get_theme()->get('Name'))); ?>
                <br/>
                <?php echo sprintf(esc_html__('The %s theme needs to be activated to enable demo import installation and customer support service.', 'edubin'), esc_html(wp_get_theme()->get('Name'))); ?>
            </p>
        </div>

        <?php if (edubin_check_tvc() == false): ?>
        <div class="help-description">
            <a href="https://www.youtube.com/watch?v=yTScONNFnZ8&feature=emb_title&ab_channel=Envato" target="_blank"><?php esc_html_e('How to find purchase code?', 'edubin');?></a>
        </div>

        <input type="text" placeholder="Enter Your Purchase Code"  id="edubin_tv_option" name="edubin_tv_option" value="<?php echo get_option('edubin_tv_option'); ?>" />

           <div class="licnese-active-button">
                <?php submit_button(__('Activate', 'edubin'), 'primary');?>
           </div>
        <?php endif;?>

        <div class="form-group hidden_group">
            <input type="hidden" name="deactivate_theme" value=" " class="form-control">
        </div>

        <?php
            $theme_fv_code = get_option('edubin_tv_option');
            if (!empty($theme_fv_code)) {
                ?>
                        <input type="hidden" name="edubin_tv_option" value=" " class="form-control">
                    <?php
            }
        ?>

        <?php wp_nonce_field('purchase-activation', 'security');?>

        <?php if (edubin_check_tvc()): ?>
            <button type="submit" class="button button-primary deactivate_theme-license" value="submit">
                <span class="text-btn"><?php esc_html_e('Deactivate', 'edubin');?></span>
                <span class="loading-icon"></span>
            </button>
        <?php endif;?>

      </form>


        <?php
            if (edubin_check_tvc()) {
        ?>

        <div class="edubin-activation-theme_congratulations">
            <h1 class="edubin-title">
                <?php esc_html_e('Thank you!', 'edubin');?>
            </h1>
            <span><?php esc_html_e('Your theme\'s license is activated successfully.', 'edubin');?></span>

        </div>
            <a href="<?php echo admin_url('themes.php?page=pt-one-click-demo-import'); ?>" class="button button-primary button-large button-next import-demo-next"><?php esc_html_e('Import Demo', 'edubin');?></a>
        <?php

    } else {

        $theme_fv_code = get_option('edubin_tv_option');?>

        <?php if (!empty($theme_fv_code)): ?>
             <div class="edubin-activation-theme_congratulations invalid">
                <h1 class="edubin-title">
                   <?php esc_html_e('Invalid Purchase Code', 'edubin');?>
                </h1>
            </div>
        <?php endif?>

        <?php }?>

    </div>
</div>
 <?php
}

/**
 * Related posts 
 */

function edubin_related_posts($postType = 'post', $postID = null, $totalPosts = null, $relatedBy = null) {

    $defaults = edubin_generate_defaults();
    $blog_related_title = get_theme_mod('blog_related_title', $defaults['blog_related_title']);
    $related_total_posts = get_theme_mod('related_total_posts', $defaults['related_total_posts']);
    $related_post_columns = get_theme_mod('related_post_columns', $defaults['related_post_columns']);
    $related_posts_by = get_theme_mod('related_posts_by', $defaults['related_posts_by']);

    global $post, $related_posts_custom_query_args;
    if (null === $postID) $postID = $post->ID;
    if (null === $totalPosts) $totalPosts = $related_total_posts;
    if (null === $relatedBy) $relatedBy = $related_posts_by;
    if (null === $postType) $postType = 'post';

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
        <div class="row">

            <h3 class="related-title"><?php echo esc_html( $blog_related_title ); ?></h3>

        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

            <div class="col-sm-6 col-md-6 col-lg-<?php echo esc_attr( $related_post_columns ); ?>">
                <div class="post-item-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'course_thumb' ); ?></a>
                            </div>
                        <?php endif; ?>
                    <div class="entry-desc">
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <span class="entry-date"><?php edubin_posted_date_only(); ?></span>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
        </div>
    <?php endif;
    // Reset postdata
    wp_reset_postdata();
}

/**
 * nav_page_links posts 
 */

    function nav_page_links() {

        ?>
        <div class="blog-nav-links">
            <div class="nav-list">
                <div class="nav-item prev">
                    <div class="inner">
                        <?php
                        $prev_post      = get_previous_post();
                        $prev_thumbnail = '';
                        $class          = 'hover-bg';

                        if ( ! empty( $prev_post ) ) {
                            $prev_thumbnail = get_the_post_thumbnail_url(get_previous_post(),'course_thumb'); 

                            if ( ! empty( $prev_thumbnail ) ) {
                                $class          .= ' has-thumbnail';
                                $prev_thumbnail = 'style="background-image: url(' . $prev_thumbnail . ');"';
                            }
                        }

                        previous_post_link( '%link', '<div class="' . esc_attr( $class ) . '" ' . $prev_thumbnail . '></div><h6>%title</h6>' );
                        ?>
                    </div>
                </div>

                <div class="nav-item next">
                    <div class="inner">
                        <?php
                        $next_post      = get_next_post();
                        $next_thumbnail = '';
                        $class          = 'hover-bg';

                        if ( ! empty( $next_post ) ) {
                            $next_thumbnail = get_the_post_thumbnail_url(get_next_post(),'course_thumb'); 

                            if ( ! empty( $next_thumbnail ) ) {
                                $class          .= ' has-thumbnail';
                                $next_thumbnail = 'style="background-image: url(' . $next_thumbnail . ');"';
                            }
                        }

                        next_post_link( '%link', '<div class="' . esc_attr( $class ) . '" ' . $next_thumbnail . '></div><h6>%title</h6>' );
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

/**
 * post_author posts 
 */

 function post_author() {
        ?>
        <div class="entry-author">
            <div class="author-info">
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'email' ), '100' ); ?>
                    <?php get_author_socials(); ?>
                </div>
                <div class="author-description">
                    <h5 class="author-name"><?php the_author(); ?></h5>

                    <div class="author-biographical-info">
                        <?php the_author_meta( 'description' ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

add_filter( 'user_contactmethods', 'add_extra_user_info' );

/**
 * add_extra_user_info
 */

function add_extra_user_info( $fields ) {
            $new_fields = array(
                array(
                    'name'  => 'phone_number',
                    'label' => esc_html__( 'Phone Number', 'edubin' ),
                ),
                array(
                    'name'  => 'career',
                    'label' => esc_html__( 'Career', 'edubin' ),
                ),
                array(
                    'name'  => 'email_address',
                    'label' => esc_html__( 'Email Address', 'edubin' ),
                ),
                array(
                    'name'  => 'facebook',
                    'label' => esc_html__( 'Facebook', 'edubin' ),
                ),
                array(
                    'name'  => 'twitter',
                    'label' => esc_html__( 'Twitter', 'edubin' ),
                ),
                array(
                    'name'  => 'instagram',
                    'label' => esc_html__( 'Instagram', 'edubin' ),
                ),
                array(
                    'name'  => 'linkedin',
                    'label' => esc_html__( 'Linkedin', 'edubin' ),
                ),
                array(
                    'name'  => 'pinterest',
                    'label' => esc_html__( 'Pinterest', 'edubin' ),
                ),
                array(
                    'name'  => 'youtube',
                    'label' => esc_html__( 'Youtube', 'edubin' ),
                ),
            );

            foreach ( $new_fields as $new_field ) {
                if ( ! isset( $fields[ $new_field['name'] ] ) ) {
                    $fields[ $new_field['name'] ] = $new_field['label'];
                }
            }

            return $fields;
        }

function get_author_socials( $user_id = false ) {
        $email_address = get_the_author_meta( 'email_address', $user_id );
        $facebook      = get_the_author_meta( 'facebook', $user_id );
        $twitter       = get_the_author_meta( 'twitter', $user_id );
        $instagram     = get_the_author_meta( 'instagram', $user_id );
        $linkedin      = get_the_author_meta( 'linkedin', $user_id );
        $pinterest     = get_the_author_meta( 'pinterest', $user_id );
        $youtube       = get_the_author_meta( 'youtube', $user_id );

        $link_classes = 'hint--bounce hint--top hint--primary';
        ?>
        <?php if ( $facebook || $twitter || $instagram || $linkedin || $email_address ) : ?>
            <div class="author-social-networks">
                <div class="inner">
                    <?php if ( $twitter ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Twitter', 'edubin' ); ?>"
                           href="<?php echo esc_url( $twitter ); ?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $facebook ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Facebook', 'edubin' ); ?>"
                           href="<?php echo esc_url( $facebook ); ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $instagram ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Instagram', 'edubin' ); ?>"
                           href="<?php echo esc_url( $instagram ); ?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $linkedin ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Linkedin', 'edubin' ) ?>"
                           href="<?php echo esc_url( $linkedin ); ?>" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $pinterest ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Pinterest', 'edubin' ); ?>"
                           href="<?php echo esc_url( $pinterest ); ?>" target="_blank">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $youtube ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Youtube', 'edubin' ); ?>"
                           href="<?php echo esc_url( $youtube ); ?>" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ( $email_address ) : ?>
                        <a class="<?php echo esc_attr( $link_classes ); ?>"
                           aria-label="<?php esc_attr_e( 'Email', 'edubin' ); ?>"
                           href="mailto:<?php echo esc_url( $email_address ); ?>" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif;
    }

/**
 * edubin_get_sharing_list
 */

function edubin_get_sharing_list( $args = array() ) {

    $defaults = edubin_generate_defaults();
    $social_shear_show = get_theme_mod('social_shear_show', $defaults['social_shear_show']);
    $social_shear_tooltip = get_theme_mod('social_shear_tooltip', $defaults['social_shear_tooltip']);
    $social_shear_facebook = get_theme_mod('social_shear_facebook', $defaults['social_shear_facebook']);
    $social_shear_twitter = get_theme_mod('social_shear_twitter', $defaults['social_shear_twitter']);
    $social_shear_linkedin = get_theme_mod('social_shear_linkedin', $defaults['social_shear_linkedin']);
    $social_shear_tumblr = get_theme_mod('social_shear_tumblr', $defaults['social_shear_tumblr']);
    $social_shear_email = get_theme_mod('social_shear_email', $defaults['social_shear_email']);

        $defaults       = array(
            'style'            => 'icons',
            'target'           => '_blank',
            'tooltip_enable'   => true,
            'tooltip_skin'     => 'primary',
            'tooltip_position' => 'top',
        );
        $args           = wp_parse_args( $args, $defaults );

        if ( $social_shear_show ) {
  
            $link_classes = '';

            if ( $social_shear_tooltip) {
                $link_classes .= "hint--bounce hint--{$args['tooltip_position']} hint--{$args['tooltip_skin']}";
            }

            if ( $social_shear_facebook ) {
                $facebook_url = 'https://m.facebook.com/sharer.php?u=' . rawurlencode( get_permalink() );
                ?>
                <a class="<?php echo esc_attr( $link_classes . ' facebook' ); ?>"
                   target="<?php echo esc_attr( $args['target'] ); ?>"
                   aria-label="<?php esc_attr_e( 'Facebook', 'edubin' ); ?>"
                   href="<?php echo esc_url( $facebook_url ); ?>">
                    <?php if ( $args['style'] === 'text' ) : ?>
                        <span><?php esc_html_e( 'Facebook', 'edubin' ); ?></span>
                    <?php else: ?>
                        <i class="fab fa-facebook-f"></i>
                    <?php endif; ?>
                </a>
                <?php
            } 
            if ( $social_shear_twitter ) {
                ?>
                <a class="<?php echo esc_attr( $link_classes . ' twitter' ); ?>"
                   target="<?php echo esc_attr( $args['target'] ); ?>"
                   aria-label="<?php esc_attr_e( 'Twitter', 'edubin' ); ?>"
                   href="https://twitter.com/share?text=<?php echo rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>">
                    <?php if ( $args['style'] === 'text' ) : ?>
                        <span><?php esc_html_e( 'Twitter', 'edubin' ); ?></span>
                    <?php else: ?>
                        <i class="fab fa-twitter"></i>
                    <?php endif; ?>
                </a>
                <?php
            } 
            if ( $social_shear_tumblr ) {
                ?>
                <a class="<?php echo esc_attr( $link_classes . ' tumblr' ); ?>"
                   target="<?php echo esc_attr( $args['target'] ); ?>"
                   aria-label="<?php esc_attr_e( 'Tumblr', 'edubin' ); ?>"
                   href="https://www.tumblr.com/share/link?url=<?php echo rawurlencode( get_permalink() ); ?>&amp;name=<?php echo rawurlencode( get_the_title() ); ?>">
                    <?php if ( $args['style'] === 'text' ) : ?>
                        <span><?php esc_html_e( 'Tumblr', 'edubin' ); ?></span>
                    <?php else: ?>
                        <i class="fab fa-tumblr-square"></i>
                    <?php endif; ?>
                </a>
                <?php

            } 
            if ( $social_shear_linkedin ) {
                ?>
                <a class="<?php echo esc_attr( $link_classes . ' linkedin' ); ?>"
                   target="<?php echo esc_attr( $args['target'] ); ?>"
                   aria-label="<?php esc_attr_e( 'Linkedin', 'edubin' ); ?>"
                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode( get_permalink() ); ?>&amp;title=<?php echo rawurlencode( get_the_title() ); ?>">
                    <?php if ( $args['style'] === 'text' ) : ?>
                        <span><?php esc_html_e( 'Linkedin', 'edubin' ); ?></span>
                    <?php else: ?>
                        <i class="fab fa-linkedin"></i>
                    <?php endif; ?>
                </a>
                <?php
            } 
            if ( $social_shear_email ) {
                ?>
                <a class="<?php echo esc_attr( $link_classes . ' email' ); ?>"
                   target="<?php echo esc_attr( $args['target'] ); ?>"
                   aria-label="<?php esc_attr_e( 'Email', 'edubin' ); ?>"
                   href="mailto:?subject=<?php echo rawurlencode( get_the_title() ); ?>&amp;body=<?php echo rawurlencode( get_permalink() ); ?>">
                    <?php if ( $args['style'] === 'text' ) : ?>
                        <span><?php esc_html_e( 'Email', 'edubin' ); ?></span>
                    <?php else: ?>
                        <i class="fas fa-envelope"></i>
                    <?php endif; ?>
                </a>
                <?php
            }
        
        }
}


