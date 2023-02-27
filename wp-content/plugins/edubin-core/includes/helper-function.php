<?php

/*
 * Elementor category
 */
function edubin_elementor_init()
{
    \Elementor\Plugin::instance()->elements_manager->add_category(
        'edubin-core',
        [
            'title' => 'Edubin Addons',
            'icon'  => 'font',
        ],
        1
    );
}
add_action('elementor/init', 'edubin_elementor_init');

/*
 * Plugisn Options value
 * return on/off
 */
function edubin_core_get_option($option, $section, $default = '')
{

    $options = get_option($section);
    if (isset($options[$option])) {
        return $options[$option];
    }
    return $default;
}

/*
 * Elementor Templates List
 * return array
 */
function edubin_elementor_template()
{
    $templates = \Elementor\Plugin::instance()->templates_manager->get_source('local')->get_items();
    $types     = array();
    if (empty($templates)) {
        $template_lists = ['0' => __('Do not Saved Templates.', 'edubin-core')];
    } else {
        $template_lists = ['0' => __('Select Template', 'edubin-core')];
        foreach ($templates as $template) {
            $template_lists[$template['template_id']] = $template['title'] . ' (' . $template['type'] . ')';
        }
    }
    return $template_lists;
}

/*
 * Sidebar Widgets List
 * return array
 */
function edubin_sidebar_options()
{
    global $wp_registered_sidebars;
    $sidebar_options = array();

    if (!$wp_registered_sidebars) {
        $sidebar_options['0'] = __('No sidebars were found', 'edubin-core');
    } else {
        $sidebar_options['0'] = __('Select Sidebar', 'edubin-core');
        foreach ($wp_registered_sidebars as $sidebar_id => $sidebar) {
            $sidebar_options[$sidebar_id] = $sidebar['name'];
        }
    }
    return $sidebar_options;
}

/*
 * Get Taxonomy
 * return array
 */
function edubin_get_taxonomies($edubin_texonomy = 'category')
{
    $terms = get_terms(array(
        'taxonomy'   => $edubin_texonomy,
        'hide_empty' => true,
    ));
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $options[$term->slug] = $term->name;
        }
        return $options;
    }
}

/*
 * Get Post Type
 * return array
 */
function edubin_get_post_types($args = [])
{

    $post_type_args = [
        'show_in_nav_menus' => true,
    ];
    if (!empty($args['post_type'])) {
        $post_type_args['name'] = $args['post_type'];
    }
    $_post_types = get_post_types($post_type_args, 'objects');

    $post_types = [];
    foreach ($_post_types as $post_type => $object) {
        $post_types[$post_type] = $object->label;
    }
    return $post_types;
}

/*
 * HTML Tag list
 * return array
 */
function edubin_html_tag_lists()
{
    $html_tag_list = [
        'h1'   => __('H1', 'edubin-core'),
        'h2'   => __('H2', 'edubin-core'),
        'h3'   => __('H3', 'edubin-core'),
        'h4'   => __('H4', 'edubin-core'),
        'h5'   => __('H5', 'edubin-core'),
        'h6'   => __('H6', 'edubin-core'),
        'p'    => __('p', 'edubin-core'),
        'div'  => __('div', 'edubin-core'),
        'span' => __('span', 'edubin-core'),
    ];
    return $html_tag_list;
}

/*
 * Contact form list
 * return array
 */
function edubin_contact_form_seven()
{
    $countactform      = array();
    $edubin_forms_args = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
    $edubin_forms      = get_posts($edubin_forms_args);

    if ($edubin_forms) {
        foreach ($edubin_forms as $edubin_form) {
            $countactform[$edubin_form->ID] = $edubin_form->post_title;
        }
    } else {
        $countactform[esc_html__('No contact form found', 'edubin-core')] = 0;
    }
    return $countactform;
}

/*
 * All Post Name
 * return array
 */
function edubin_post_name($post_type = 'post')
{
    $options       = array();
    $options       = ['0' => esc_html__('None', 'edubin-core')];
    $wh_post       = array('posts_per_page' => -1, 'post_type' => $post_type);
    $wh_post_terms = get_posts($wh_post);
    if (!empty($wh_post_terms) && !is_wp_error($wh_post_terms)) {
        foreach ($wh_post_terms as $term) {
            $options[$term->ID] = $term->post_title;
        }
        return $options;
    }
}
/*
 * All elementor header
 * return array
 */
function edubin_get_elementor_header($post_type = 'eb_header')
{
    $options       = array();
    $options       = ['0' => esc_html__('None', 'edubin-core')];
    $wh_post       = array('posts_per_page' => -1, 'post_type' => $post_type);
    $wh_post_terms = get_posts($wh_post);
    if (!empty($wh_post_terms) && !is_wp_error($wh_post_terms)) {
        foreach ($wh_post_terms as $term) {
            $options[$term->ID] = $term->post_title;
        }
        return $options;
    }
}
/*
 * All elementor footer
 * return array
 */
function edubin_get_elementor_footer($post_type = 'eb_footer')
{
    $options       = array();
    $options       = ['0' => esc_html__('None', 'edubin-core')];
    $wh_post       = array('posts_per_page' => -1, 'post_type' => $post_type);
    $wh_post_terms = get_posts($wh_post);
    if (!empty($wh_post_terms) && !is_wp_error($wh_post_terms)) {
        foreach ($wh_post_terms as $term) {
            $options[$term->ID] = $term->post_title;
        }
        return $options;
    }
}

/*
 * Caldera Form
 * @return array
 */
function edubin_caldera_forms_options()
{
    if (class_exists('Caldera_Forms')) {
        $caldera_forms = Caldera_Forms_Forms::get_forms(true, true);
        $form_options  = ['0' => esc_html__('Select Form', 'edubin-core')];
        $form          = array();
        if (!empty($caldera_forms) && !is_wp_error($caldera_forms)) {
            foreach ($caldera_forms as $form) {
                if (isset($form['ID']) and isset($form['name'])) {
                    $form_options[$form['ID']] = $form['name'];
                }
            }
        }
    } else {
        $form_options = ['0' => esc_html__('Form Not Found!', 'edubin-core')];
    }
    return $form_options;
}

/*
 * Check user Login and call this function
 */
global $user;
if (empty($user->ID)) {
    add_action('elementor/init', 'edubin_ajax_login_init');
}

/*
 * wp_ajax_nopriv Function
 */
function edubin_ajax_login_init()
{
    add_action('wp_ajax_nopriv_edubin_ajax_login', 'edubin_ajax_login');
}

/*
 * ajax login
 */
function edubin_ajax_login()
{
    check_ajax_referer('ajax-login-nonce', 'security');
    $user_data                  = array();
    $user_data['user_login']    = !empty($_POST['username']) ? $_POST['username'] : "";
    $user_data['user_password'] = !empty($_POST['password']) ? $_POST['password'] : "";
    $user_data['remember']      = true;
    $user_signon                = wp_signon($user_data, false);

    if (is_wp_error($user_signon)) {
        echo json_encode(['loggeauth' => false, 'message' => esc_html__('Invalid username or password!', 'edubin-core')]);
    } else {
        echo json_encode(['loggeauth' => true, 'message' => esc_html__('Login successfully, Redirecting...', 'edubin-core')]);
    }
    die();
}

/*
 * Redirect 404 page select from plugins options
 */
function edubin_redirect_404()
{
    $errorpage_id = edubin_core_get_option('errorpage', 'edubin_general_tabs');
    if (is_404() && !empty($errorpage_id)) {
        wp_redirect(esc_url(get_page_link($errorpage_id)));die();
    }
}
add_action('template_redirect', 'edubin_redirect_404');

/*=============================================
Post views
=============================================*/
// function to display number of posts.
function edubinGetPostViews($postID)
{
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        esc_html_e('0', 'edubin');
    }
    echo esc_html($count . '');
}

// function to count views.
function edubinSetPostViews($postID)
{
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*=============================================
Post views custom
=============================================*/
// function to display number of posts.
function edubinGetPostViewsCustom($postID)
{
    $count_key = 'custom_views_number';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        esc_html_e('0', 'edubin');
    }
    echo esc_html($count . '');
}

// function to count views.
function edubinSetPostViewsCustom($postID)
{
    $count_key = 'custom_views_number';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*=============================================
=  Disable Tribe Select2 on non-tribe admin pages   =
=============================================*/
if (is_admin()) {
    if (!function_exists('edubin_theme_disable_tribe_select2')) {
        function edubin_theme_disable_tribe_select2()
        {
            $screen = get_current_screen();
            if ('tribe_events' === $screen->id) {
                return;
            }
            $tribe_post_types = array(
                'tribe_events',
                'tribe_venue',
            );
            if (in_array($screen->post_type, $tribe_post_types)) {
                return;
            }
            wp_deregister_script('tribe-select2');
        }
        add_action('admin_enqueue_scripts', 'edubin_theme_disable_tribe_select2', 99);
    }
}

/*=============================================
=  * Get Taxonomy for posts * return array   =
=============================================*/
if (!function_exists('edubin_posts_get_taxonomies')) {
    function edubin_posts_get_taxonomies($posts_category = 'category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $posts_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for woocommerce shop * return array   =
=============================================*/
if (!function_exists('edubin_wooocommerce_shop_get_taxonomies')) {
    function edubin_wooocommerce_shop_get_taxonomies($woo_shop_category = 'product_cat')
    {
        $terms = get_terms(array(
            'taxonomy'   => $woo_shop_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for the events calender * return array   =
=============================================*/
if (!function_exists('edubin_tribe_events_get_taxonomies')) {
    function edubin_tribe_events_get_taxonomies($tribe_events_category = 'tribe_events_cat')
    {
        $terms = get_terms(array(
            'taxonomy'   => $tribe_events_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for learnpress lms * return array   =
=============================================*/
if (!function_exists('edubin_learpress_get_taxonomies')) {
    function edubin_learpress_get_taxonomies($lp_course_category = 'course_category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $lp_course_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for learndash lms * return array   =
=============================================*/
if (!function_exists('edubin_learndash_get_taxonomies')) {

    function edubin_learndash_get_taxonomies($ld_course_category = 'ld_course_category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $ld_course_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for learndash croups lms * return array   =
=============================================*/
if (!function_exists('edubin_learndash_group_get_taxonomies')) {

    function edubin_learndash_group_get_taxonomies($ld_group_category = 'ld_group_category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $ld_group_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Tag for Learndash groups lms * return array   =
=============================================*/
if (!function_exists('edubin_learndash_groups_get_tag')) {
    function edubin_learndash_groups_get_tag($learndash_groups_course_tag = 'ld_groups_tag')
    {
        $terms = get_terms(array(
            'taxonomy'   => $learndash_groups_course_tag,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Tag for learndash lms * return array   =
=============================================*/
if (!function_exists('edubin_learndash_get_tag')) {
    function edubin_learndash_get_tag($learndash_course_tag = 'ld_course_tag')
    {
        $terms = get_terms(array(
            'taxonomy'   => $learndash_course_tag,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for tutor lms * return array   =
=============================================*/
if (!function_exists('edubin_tutor_get_taxonomies')) {
    function edubin_tutor_get_taxonomies($tutor_course_category = 'course-category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $tutor_course_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Tag for tutor lms * return array   =
=============================================*/
if (!function_exists('edubin_tutor_get_tag')) {
    function edubin_tutor_get_tag($tutor_course_tag = 'course-tag')
    {
        $terms = get_terms(array(
            'taxonomy'   => $tutor_course_tag,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Taxonomy for sensei lms * return array   =
=============================================*/
if (!function_exists('edubin_sensei_get_taxonomies')) {
    function edubin_sensei_get_taxonomies($sensei_course_category = 'course-category')
    {
        $terms = get_terms(array(
            'taxonomy'   => $sensei_course_category,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Get Tag for sensei lms * return array   =
=============================================*/
if (!function_exists('edubin_sensei_get_tag')) {
    function edubin_sensei_get_tag($sensei_course_tag = 'course-tag')
    {
        $terms = get_terms(array(
            'taxonomy'   => $sensei_course_tag,
            'hide_empty' => false,
        ));
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }
}
/*=============================================
=  * Count user post in filter addon   =
=============================================*/
function edubin_sensei_course_level( $level = null ) {

        $levels = apply_filters(
            'edubin_sensei_course_level_key',
            array(
                'all_levels'   => __( 'All Levels', 'edubin-core' ),
                'beginner'     => __( 'Beginner', 'edubin-core' ),
                'intermediate' => __( 'Intermediate', 'edubin-core' ),
                'expert'       => __( 'Expert', 'edubin-core' ),
            )
        );

        if ( $level ) {
            if ( isset( $levels[ $level ] ) ) {
                return $levels[ $level ];
            } else {
                return '';
            }
        }

        return $levels;
    }
/*=============================================
=  * Count user post in filter addon   =
=============================================*/
function edubin_count_user_posts_by_type($userid, $post_type = 'lp_course')
{
    global $wpdb;
    $where = get_posts_by_author_sql($post_type, true, $userid);
    $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts $where");
    return apply_filters('get_usernumposts', $count, $userid);
}
/*=============================================
Register language tax for LearnPress LMS
=============================================*/
if (!class_exists('LearnPress')) {
    function edubin_register_lp_tax_language()
    {
        $course_post_type = 'lp_course';

        $labels = array(
            'name'                       => _x('Course Language', 'taxonomy general name', 'edubin-core'),
            'singular_name'              => _x('Language', 'taxonomy singular name', 'edubin-core'),
            'search_items'               => esc_html__('Search Languages', 'edubin-core'),
            'popular_items'              => esc_html__('Popular Languages', 'edubin-core'),
            'all_items'                  => esc_html__('All Languages', 'edubin-core'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__('Edit Language', 'edubin-core'),
            'update_item'                => esc_html__('Update Language', 'edubin-core'),
            'add_new_item'               => esc_html__('Add New Language', 'edubin-core'),
            'new_item_name'              => esc_html__('New Language Name', 'edubin-core'),
            'separate_items_with_commas' => esc_html__('Separate languages with commas', 'edubin-core'),
            'add_or_remove_items'        => esc_html__('Add or remove languages', 'edubin-core'),
            'choose_from_most_used'      => esc_html__('Choose from the most used languages', 'edubin-core'),
            'not_found'                  => esc_html__('No languages found.', 'edubin-core'),
            'menu_name'                  => esc_html__('Course Languages', 'edubin-core'),
            'back_to_items'              => esc_html__('Back to Languages', 'edubin-core'),
        );

        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => apply_filters('edubin_course_language_slug', 'course_language')),
        );

        register_taxonomy('course_language', $course_post_type, $args);
    }
    add_action('init', 'edubin_register_lp_tax_language', 1);

/*=============================================
Add language tax submenu for LearnPress LMS
=============================================*/
function edubin_register_lp_language_submenu()
{
    $course_post_type = 'lp_course';
    add_submenu_page(
        'learn_press',
        esc_html__('Languages', 'edubin-core'),
        esc_html__('Languages', 'edubin-core'),
        'edit_published_lp_courses',
        'edit-tags.php?taxonomy=course_language&post_type=' . $course_post_type,
        null,
        3
    );
}

add_action('admin_menu', 'edubin_register_lp_language_submenu');
}

/*=============================================
Register language tax for LearnDash LMS
=============================================*/
if (!class_exists('SFWD_LMS')) {
    function edubin_register_ld_tax_language()
    {
        $course_post_type = 'sfwd-courses';

        $labels = array(
            'name'                       => _x('Course Language', 'taxonomy general name', 'edubin-core'),
            'singular_name'              => _x('Language', 'taxonomy singular name', 'edubin-core'),
            'search_items'               => esc_html__('Search Languages', 'edubin-core'),
            'popular_items'              => esc_html__('Popular Languages', 'edubin-core'),
            'all_items'                  => esc_html__('All Languages', 'edubin-core'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__('Edit Language', 'edubin-core'),
            'update_item'                => esc_html__('Update Language', 'edubin-core'),
            'add_new_item'               => esc_html__('Add New Language', 'edubin-core'),
            'new_item_name'              => esc_html__('New Language Name', 'edubin-core'),
            'separate_items_with_commas' => esc_html__('Separate languages with commas', 'edubin-core'),
            'add_or_remove_items'        => esc_html__('Add or remove languages', 'edubin-core'),
            'choose_from_most_used'      => esc_html__('Choose from the most used languages', 'edubin-core'),
            'not_found'                  => esc_html__('No languages found.', 'edubin-core'),
            'menu_name'                  => esc_html__('Course Languages', 'edubin-core'),
            'back_to_items'              => esc_html__('Back to Languages', 'edubin-core'),
        );

        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => apply_filters('edubin_ld_course_language_slug', 'ld_course_language')),
        );

        register_taxonomy('ld_course_language', $course_post_type, $args);
    }
    add_action('init', 'edubin_register_ld_tax_language', 1);

}

/*=============================================
Register language tax for Tutor LMS
=============================================*/
if (!function_exists('tutor')) {
    function edubin_register_tutor_tax_language()
    {
        $course_post_type = 'courses';

        $labels = array(
            'name'                       => _x('Course Language', 'taxonomy general name', 'edubin-core'),
            'singular_name'              => _x('Language', 'taxonomy singular name', 'edubin-core'),
            'search_items'               => esc_html__('Search Languages', 'edubin-core'),
            'popular_items'              => esc_html__('Popular Languages', 'edubin-core'),
            'all_items'                  => esc_html__('All Languages', 'edubin-core'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__('Edit Language', 'edubin-core'),
            'update_item'                => esc_html__('Update Language', 'edubin-core'),
            'add_new_item'               => esc_html__('Add New Language', 'edubin-core'),
            'new_item_name'              => esc_html__('New Language Name', 'edubin-core'),
            'separate_items_with_commas' => esc_html__('Separate languages with commas', 'edubin-core'),
            'add_or_remove_items'        => esc_html__('Add or remove languages', 'edubin-core'),
            'choose_from_most_used'      => esc_html__('Choose from the most used languages', 'edubin-core'),
            'not_found'                  => esc_html__('No languages found.', 'edubin-core'),
            'menu_name'                  => esc_html__('Course Languages', 'edubin-core'),
            'back_to_items'              => esc_html__('Back to Languages', 'edubin-core'),
        );

        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => apply_filters('edubin_tutor_course_language_slug', 'tutor_course_language')),
        );

        register_taxonomy('tutor_course_language', $course_post_type, $args);
    }
    add_action('init', 'edubin_register_tutor_tax_language', 1);

/*=============================================
Add language tax submenu for Tutor LMS
=============================================*/
function edubin_register_tutor_language_submenu()
{
    $course_post_type = 'courses';
    add_submenu_page(
        'tutor',
        esc_html__('Languages', 'edubin-core'),
        esc_html__('Languages', 'edubin-core'),
        'manage_tutor',
        'edit-tags.php?taxonomy=tutor_course_language&post_type=' . $course_post_type,
        null,
        3
    );
}

add_action('admin_menu', 'edubin_register_tutor_language_submenu', 100);

}

/*=============================================
 Register language tax for Sensei LMS
 =============================================*/
 if (!class_exists('Sensei_Main')) {
    function edubin_register_sensei_tax_language()
    {
        $course_post_type = 'course';

        $labels = array(
            'name'                       => _x('Course Language', 'taxonomy general name', 'edubin-core'),
            'singular_name'              => _x('Language', 'taxonomy singular name', 'edubin-core'),
            'search_items'               => esc_html__('Search Languages', 'edubin-core'),
            'popular_items'              => esc_html__('Popular Languages', 'edubin-core'),
            'all_items'                  => esc_html__('All Languages', 'edubin-core'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__('Edit Language', 'edubin-core'),
            'update_item'                => esc_html__('Update Language', 'edubin-core'),
            'add_new_item'               => esc_html__('Add New Language', 'edubin-core'),
            'new_item_name'              => esc_html__('New Language Name', 'edubin-core'),
            'separate_items_with_commas' => esc_html__('Separate languages with commas', 'edubin-core'),
            'add_or_remove_items'        => esc_html__('Add or remove languages', 'edubin-core'),
            'choose_from_most_used'      => esc_html__('Choose from the most used languages', 'edubin-core'),
            'not_found'                  => esc_html__('No languages found.', 'edubin-core'),
            'menu_name'                  => esc_html__('Languages', 'edubin-core'),
            'back_to_items'              => esc_html__('Back to Languages', 'edubin-core'),
        );

        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => apply_filters('edubin_sensei_course_language_slug', 'sensei_course_language')),
        );

        register_taxonomy('sensei_course_language', $course_post_type, $args);
    }
    add_action('init', 'edubin_register_sensei_tax_language', 1);

/*=============================================
Add language tax submenu for Sensei LMS
=============================================*/
function edubin_register_sensei_language_submenu()
{
    $course_post_type = 'course';
    add_submenu_page(
        'sensei',
        esc_html__('Languages', 'edubin-core'),
        esc_html__('Languages', 'edubin-core'),
        'manage_tutor',
        'edit-tags.php?taxonomy=sensei_course_language&post_type=' . $course_post_type,
        null,
        3
    );
}

add_action('admin_menu', 'edubin_register_sensei_language_submenu', 100);

}

/*=============================================
Retrieves all registered navigation menu.
=============================================*/
if (!function_exists('edubin_get_custom_menu')) {

    function edubin_get_custom_menu()
    {
        $nav_menus = [];
        $terms     = wp_get_nav_menus();
        foreach ($terms as $term) {
            $nav_menus[$term->name] = $term->name;
        }

        return $nav_menus;
    }
}
/*=============================================
Course filter for LearnPress LMS
=============================================*/
if (!class_exists('LearnPress')) {

    class LP_Course_filter_Nasted_Cat
    {
        //private $category = 'course-category';
        //private $tag = 'course-tag';
        private $current_term_id = null;

        private function get_current_term_id()
        {

            if ($this->current_term_id === null) {
                $queried               = get_queried_object();
                $this->current_term_id = (is_object($queried) && property_exists($queried, 'term_id')) ? $queried->term_id : false;
            }

            return $this->current_term_id;
        }

        private function sort_terms_hierarchically($terms, $parent_id = 0)
        {
            $term_array = array();

            foreach ($terms as $term) {
                if ($term->parent == $parent_id) {
                    $term->children = $this->sort_terms_hierarchically($terms, $term->term_id);
                    $term_array[]   = $term;
                }
            }

            return $term_array;
        }

        private function render_terms_hierarchically($terms, $taxonomy)
        {

            $term_id = $this->get_current_term_id();

            $selected_cat = !empty($_GET['course_category']) ? (array) $_GET['course_category'] : array();
            $selected_cat = array_map('sanitize_text_field', $selected_cat);
            $selected_cat = array_map('intval', $selected_cat);

            $is_queried_object = false;
            if (isset($wp_query->queried_object->term_id)) {
                $is_queried_object = true;
                $selected_cat      = array($wp_query->queried_object->term_id);
            }

            foreach ($terms as $term) {
            ?><div class="filter-content">
                <div class="filter-content edubin-archive-single-cat">
                    <label>
                        <input type="checkbox" name="course_category[]" value="<?php echo $term->term_id; ?>" <?php echo in_array($term->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>/>&nbsp;
                        <?php echo $term->name; ?>

                        <span class="filter-checkbox-count"><?php echo esc_attr('(' . $term->count . ')'); ?></span>
                    </label>

                    <div class="edubin-archive-childern">
                        <?php isset($term->children) ? $this->render_terms_hierarchically($term->children, $taxonomy) : 0;?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function render_terms($taxonomy)
    {
        $terms = get_terms(array('taxonomy' => 'course_category', 'hide_empty' => true));
        $this->render_terms_hierarchically($this->sort_terms_hierarchically($terms), $taxonomy);
    }
}
}
/*=============================================
Course filter for Tutor LMS
=============================================*/
if (!function_exists('tutor')) {

    class Tutor_Course_filter_Nasted_Cat
    {
        //private $category = 'course-category';
        //private $tag = 'course-tag';
        private $current_term_id = null;

        private function get_current_term_id()
        {

            if ($this->current_term_id === null) {
                $queried               = get_queried_object();
                $this->current_term_id = (is_object($queried) && property_exists($queried, 'term_id')) ? $queried->term_id : false;
            }

            return $this->current_term_id;
        }

        private function sort_terms_hierarchically($terms, $parent_id = 0)
        {
            $term_array = array();

            foreach ($terms as $term) {
                if ($term->parent == $parent_id) {
                    $term->children = $this->sort_terms_hierarchically($terms, $term->term_id);
                    $term_array[]   = $term;
                }
            }

            return $term_array;
        }

        private function render_terms_hierarchically($terms, $taxonomy)
        {

            $term_id = $this->get_current_term_id();

            $selected_cat = !empty($_GET['course-category']) ? (array) $_GET['course-category'] : array();
            $selected_cat = array_map('sanitize_text_field', $selected_cat);
            $selected_cat = array_map('intval', $selected_cat);

            $is_queried_object = false;
            if (isset($wp_query->queried_object->term_id)) {
                $is_queried_object = true;
                $selected_cat      = array($wp_query->queried_object->term_id);
            }

            foreach ($terms as $term) {
            ?><div class="filter-content">
                <div class="filter-content edubin-archive-single-cat">
                    <label>
                        <input type="checkbox" name="course-category[]" value="<?php echo $term->term_id; ?>" <?php echo in_array($term->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>/>&nbsp;
                        <?php echo $term->name; ?>
                        <span class="filter-checkbox-count"><?php echo esc_attr('(' . $term->count . ')'); ?></span>
                    </label>

                    <div class="edubin-archive-childern">
                        <?php isset($term->children) ? $this->render_terms_hierarchically($term->children, $taxonomy) : 0;?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function render_terms($taxonomy)
    {
        $terms = get_terms(array('taxonomy' => 'course-category', 'hide_empty' => true));
        $this->render_terms_hierarchically($this->sort_terms_hierarchically($terms), $taxonomy);
    }
}
}
/*=============================================
Course filter for Sensei LMS
=============================================*/
if (!class_exists('Sensei_Main')) {

    class Sensei_Course_filter_Nasted_Cat
    {
        //private $category = 'course-category';
        //private $tag = 'course-tag';
        private $current_term_id = null;

        private function get_current_term_id()
        {

            if ($this->current_term_id === null) {
                $queried               = get_queried_object();
                $this->current_term_id = (is_object($queried) && property_exists($queried, 'term_id')) ? $queried->term_id : false;
            }

            return $this->current_term_id;
        }

        private function sort_terms_hierarchically($terms, $parent_id = 0)
        {
            $term_array = array();

            foreach ($terms as $term) {
                if ($term->parent == $parent_id) {
                    $term->children = $this->sort_terms_hierarchically($terms, $term->term_id);
                    $term_array[]   = $term;
                }
            }

            return $term_array;
        }

        private function render_terms_hierarchically($terms, $taxonomy)
        {

            $term_id = $this->get_current_term_id();

            $selected_cat = !empty($_GET['course-category']) ? (array) $_GET['course-category'] : array();
            $selected_cat = array_map('sanitize_text_field', $selected_cat);
            $selected_cat = array_map('intval', $selected_cat);

            $is_queried_object = false;
            if (isset($wp_query->queried_object->term_id)) {
                $is_queried_object = true;
                $selected_cat      = array($wp_query->queried_object->term_id);
            }

            foreach ($terms as $term) {
            ?><div class="filter-content">
                <div class="filter-content edubin-archive-single-cat">
                    <label>
                        <input type="checkbox" name="course-category[]" value="<?php echo $term->term_id; ?>" <?php echo in_array($term->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>/>&nbsp;
                        <?php echo $term->name; ?>
                        <span class="filter-checkbox-count"><?php echo esc_attr('(' . $term->count . ')'); ?></span>
                    </label>

                    <div class="edubin-archive-childern">
                        <?php isset($term->children) ? $this->render_terms_hierarchically($term->children, $taxonomy) : 0;?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function render_terms($taxonomy)
    {
        $terms = get_terms(array('taxonomy' => 'course-category', 'hide_empty' => true));
        $this->render_terms_hierarchically($this->sort_terms_hierarchically($terms), $taxonomy);
    }
}
}

/*=============================================
Course filter for LearnDash LMS
=============================================*/
if (!class_exists('SFWD_LMS')) {

    class LD_Course_filter_Nasted_Cat
    {
        //private $category = 'course-category';
        //private $tag = 'course-tag';
        private $current_term_id = null;

        private function get_current_term_id()
        {

            if ($this->current_term_id === null) {
                $queried               = get_queried_object();
                $this->current_term_id = (is_object($queried) && property_exists($queried, 'term_id')) ? $queried->term_id : false;
            }

            return $this->current_term_id;
        }

        private function sort_terms_hierarchically($terms, $parent_id = 0)
        {
            $term_array = array();

            foreach ($terms as $term) {
                if ($term->parent == $parent_id) {
                    $term->children = $this->sort_terms_hierarchically($terms, $term->term_id);
                    $term_array[]   = $term;
                }
            }

            return $term_array;
        }

        private function render_terms_hierarchically($terms, $taxonomy)
        {

            $term_id = $this->get_current_term_id();

            $selected_cat = !empty($_GET['ld_course_category']) ? (array) $_GET['ld_course_category'] : array();
            $selected_cat = array_map('sanitize_text_field', $selected_cat);
            $selected_cat = array_map('intval', $selected_cat);

            $is_queried_object = false;
            if (isset($wp_query->queried_object->term_id)) {
                $is_queried_object = true;
                $selected_cat      = array($wp_query->queried_object->term_id);
            }

            foreach ($terms as $term) {
            ?><div class="filter-content">
                <div class="filter-content edubin-archive-single-cat">
                    <label>
                        <input type="checkbox" name="ld_course_category[]" value="<?php echo $term->term_id; ?>" <?php echo in_array($term->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>/>&nbsp;
                        <?php echo $term->name; ?>
                        <span class="filter-checkbox-count"><?php echo esc_attr('(' . $term->count . ')'); ?></span>

                    </label>

                    <div class="edubin-archive-childern">
                        <?php isset($term->children) ? $this->render_terms_hierarchically($term->children, $taxonomy) : 0;?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function render_terms($taxonomy)
    {
        $terms = get_terms(array('taxonomy' => 'ld_course_category', 'hide_empty' => true));
        $this->render_terms_hierarchically($this->sort_terms_hierarchically($terms), $taxonomy);
    }
}
}
