<?php

// Edubin course features metabox
add_action('cmb2_admin_init', 'edubin_sensei_course_features_metabox');
function edubin_sensei_course_features_metabox()
{
    $prefix                = '_edubin_';
    $cmb_sensei_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'edubin_sensei_course_metabox',
        'title'        => __('<span>Course Options</span>', 'edubin-core'),
        'object_types' => array('course'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));
    $cmb_sensei_course_metabox->add_field(array(
        'name'    => 'Course Single Page',
        'id'      => 'mb_sensei_single_page_layout',
        'type'    => 'select',
        'options' => array(
            'default' => __('Default', 'edubin-core'),
            '1' => __('Style 01', 'edubin-core'),
            '2' => __('Style 02', 'edubin-core'),
            '3' => __('Style 03', 'edubin-core'),
            '4' => __('Style 04', 'edubin-core'),
        ),
        'default' => 'default',
    ));

}


// Sensei course custom features metxbox
add_action('cmb2_admin_init', 'edubin_sensei_course_feature_metaboxes');
function edubin_sensei_course_feature_metaboxes()
{

    $cmb = new_cmb2_box(array(
        'id'           => 'edubin_sensei_course_feature_repeater', // Belgrove Bouncing Castles
        'title'        => 'Custom Course Features',
        'object_types' => array('course'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));

    $sensei_custom_feature_group_id = $cmb->add_field(array(
        'id'         => 'sensei_custom_feature_group',
        'type'       => 'group',
        'repeatable' => true,
        'options'    => array(
            'group_title'   => 'Course Features {#}',
            'add_button'    => 'Add Another Feature',
            'remove_button' => 'Remove Feature',
            'closed'        => true, // Repeater fields closed by default - neat & compact.
            'sortable'      => true, // Allow changing the order of repeated groups.
        ),
    ));
    $cmb->add_group_field($sensei_custom_feature_group_id, array(
        'name' => __('Add Icon', 'edubin-core'),
        'desc' => __('Add your icon class here. Or find fontawesome icon from the url: https://fontawesome.com/v4.7.0/icons/', 'edubin-core'),
        'id'   => 'sensei_custom_feature_group_icon',
        'type' => 'fontawesome_icon', // This field type
    ));
    $cmb->add_group_field($sensei_custom_feature_group_id, array(
        'name' => __('Label', 'edubin-core'),
        'desc' => __('Add your custom course feature label', 'edubin-core'),
        'id'   => 'sensei_custom_feature_group_label',
        'type' => 'text',
    ));
    $cmb->add_group_field($sensei_custom_feature_group_id, array(
        'name' => __('Value', 'edubin-core'),
        'desc' => __('Add your custom course feature label value', 'edubin-core'),
        'id'   => 'sensei_custom_feature_group_value',
        'type' => 'text',
    ));
}
// Edubin sensei course features metabox
add_action('cmb2_admin_init', 'edubin_sensei_course_video');

function edubin_sensei_course_video()
{
    $prefix                = '_edubin_';
    $cmb_ld_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'edubin_sensei_course_video_metabox',
        'title'        => __('Course Intro Video', 'edubin-core'),
        'object_types' => array('course'), // Post type
        'context'      => 'side', //  'normal', 'advanced', or 'side'
        'priority'     => 'core', //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ));

    $cmb_ld_course_metabox->add_field(array(
        'name' => 'Add Intro Video URL',
        'id'   => 'edubin_sensei_video',
        'type' => 'oembed',
    ));
}

// Edubin sensei course features metabox
add_action('cmb2_admin_init', 'edubin_sensei_course_levels');

function edubin_sensei_course_levels()
{
    $prefix                = '_edubin_';
    $cmb_sensei_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'sensei_course_levels_metabox',
        'title'        => __('Course Levels', 'edubin-core'),
        'object_types' => array('course'), // Post type
        'context'      => 'side', //  'normal', 'advanced', or 'side'
        'priority'     => 'core', //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ));

    $cmb_sensei_course_metabox->add_field( array(
        'name'             => 'Course Levels',
        'id'               => 'edubin_sensei_course_level_key',
        'type'             => 'radio',
        // 'show_option_none' => true,
        'options'          => array(
            'all_levels' => __( 'All Levels', 'edubin-core' ),
            'beginner' => __( 'Beginner', 'edubin-core' ),
            'intermediate'   => __( 'Intermediate', 'edubin-core' ),
            'expert'     => __( 'Expert', 'edubin-core' ),
        ),
    ) );
}

// Edubin course features metabox
add_action('cmb2_admin_init', 'edubin_lp_course_features_metabox');
function edubin_lp_course_features_metabox()
{
    $prefix                = '_edubin_';
    $cmb_lp_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'edubin_lp_course_metabox',
        'title'        => __('<span>Course Options</span>', 'edubin-core'),
        'object_types' => array('lp_course'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));
    $cmb_lp_course_metabox->add_field(array(
        'name'    => 'Course Single Page',
        'id'      => 'mb_lp_single_page_layout',
        'type'    => 'select',
        'options' => array(
            'default' => __('Default', 'edubin-core'),
            '1' => __('Style 01', 'edubin-core'),
            '2' => __('Style 02', 'edubin-core'),
            '3' => __('Style 03', 'edubin-core'),
            '4' => __('Style 04', 'edubin-core'),
        ),
        'default' => 'default',
    ));
    $cmb_lp_course_metabox->add_field(array(
        'name' => 'Add Intro Video URL',
        'id'   => 'edubin_lp_video',
        'type' => 'oembed',
    ));

}


// LearnPress course custom features metxbox
add_action('cmb2_admin_init', 'edubin_lp_course_feature_metaboxes');
function edubin_lp_course_feature_metaboxes()
{
    $prefix                = '_edubin_';
    
    $cmb = new_cmb2_box(array(
        'id'           => 'edubin_lp_course_feature_repeater', // Belgrove Bouncing Castles
        'title'        => 'Custom Course Features',
        'object_types' => array('lp_course'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));

    $lp_custom_feature_group_id = $cmb->add_field(array(
        'id'         => 'lp_custom_feature_group',
        'type'       => 'group',
        'repeatable' => true,
        'options'    => array(
            'group_title'   => 'Course Features {#}',
            'add_button'    => 'Add Another Feature',
            'remove_button' => 'Remove Feature',
            'closed'        => true, // Repeater fields closed by default - neat & compact.
            'sortable'      => true, // Allow changing the order of repeated groups.
        ),
    ));
    $cmb->add_group_field($lp_custom_feature_group_id, array(
        'name' => __('Add Icon', 'edubin-core'),
        'desc' => __('Add your icon class here. Or find fontawesome icon from the url: https://fontawesome.com/v4.7.0/icons/', 'edubin-core'),
        'id'   => 'lp_custom_feature_group_icon',
        'type' => 'fontawesome_icon', // This field type
    ));
    $cmb->add_group_field($lp_custom_feature_group_id, array(
        'name' => __('Label', 'edubin-core'),
        'desc' => __('Add your custom course feature label', 'edubin-core'),
        'id'   => 'lp_custom_feature_group_label',
        'type' => 'text',
    ));
    $cmb->add_group_field($lp_custom_feature_group_id, array(
        'name' => __('Value', 'edubin-core'),
        'desc' => __('Add your custom course feature label value', 'edubin-core'),
        'id'   => 'lp_custom_feature_group_value',
        'type' => 'text',
    ));
}

// The events calender metabox
add_action('cmb2_admin_init', 'edubin_tribe_events_map_metabox');
function edubin_tribe_events_map_metabox()
{
    $prefix               = '_edubin_';
    $cmb_tribe_events_map = new_cmb2_box(array(
        'id'           => $prefix . 'tribe_events_metabox',
        'title'        => __('Location Maps', 'edubin-core'),
        'object_types' => array('tribe_events'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));
   $cmb_tribe_events_map->add_field(array(
        'name' => 'Add Intro Video URL',
        'id'   => 'edubin_tribe_events_video',
        'type' => 'oembed',
    ));
    $cmb_tribe_events_map->add_field(array(
        'name' => __('Google Maps HTML Code', 'edubin-core'),
        'desc' => 'Add your google maps HTML code', 'edubin-core',
        'id'   => 'edubin_cmb2_tribe_events_map_html_code',
        'type' => 'textarea_code',
    ));
}

// Edubin course features metabox
add_action('cmb2_admin_init', 'edubin_ld_course_features_metabox');
function edubin_ld_course_features_metabox()
{
    $prefix                = '_edubin_';
    $cmb_ld_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'edubin_ld_course_metabox',
        'title'        => __('<span>Course Options</span>', 'edubin-core'),
        'object_types' => array('sfwd-courses', 'groups'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));
    $cmb_ld_course_metabox->add_field(array(
        'name'    => 'Course Single Page',
        'id'      => 'mb_ld_single_page_layout',
        'type'    => 'select',
        'options' => array(
            'default' => __('Default', 'edubin-core'),
            '1' => __('Style 01', 'edubin-core'),
            '2' => __('Style 02', 'edubin-core'),
            '3' => __('Style 03', 'edubin-core'),
            '4' => __('Style 04', 'edubin-core'),
        ),
        'default' => 'default',
    ));
   $cmb_ld_course_metabox->add_field(array(
        'name' => 'Add Intro Video URL',
        'id'   => 'edubin_ld_video',
        'type' => 'oembed',
    ));
    $cmb_ld_course_metabox->add_field(array(
        'name' => __('Custom Views Number', 'edubin-core'),
        'desc' => __('Add your course custom views number', 'edubin-core'),
        'id'   => 'custom_views_number',
        'type' => 'text',
    ));
    $cmb_ld_course_metabox->add_field(array(
        'name' => __('Batch Timing', 'edubin-core'),
        'desc' => __('Add your course custom Batch Timing', 'edubin-core'),
        'id'   => 'batch_timing',
        'type' => 'text',
    ));

}

// Edubin course features metabox
add_action('cmb2_admin_init', 'edubin_tutor_course_features_metabox');
function edubin_tutor_course_features_metabox()
{
    $prefix                = '_edubin_';
    $cmb_tutor_course_metabox = new_cmb2_box(array(
        'id'           => $prefix . 'edubin_tutor_course_metabox',
        'title'        => __('<span>Course Options</span>', 'edubin-core'),
        'object_types' => array('courses'), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
    ));
    $cmb_tutor_course_metabox->add_field(array(
        'name'    => 'Course Single Page',
        'id'      => 'mb_tutor_single_page_layout',
        'type'    => 'select',
        'options' => array(
            'default' => __('Default', 'edubin-core'),
            '1' => __('Style 01', 'edubin-core'),
            '2' => __('Style 02', 'edubin-core'),
            '3' => __('Style 03', 'edubin-core'),
            '4' => __('Style 04', 'edubin-core'),
        ),
        'default' => 'default',
    ));

}


// Page meta
add_action('cmb2_admin_init', 'edubin_page_metabox');
function edubin_page_metabox()
{

    $prefix = '_edubin_';
    
    // Page Options
    $page_options = new_cmb2_box(
        array(
            'id'           => 'page_options',
            'title'        => __('<span>Page Options</span>', 'edubin-core'),
            'object_types' => get_post_types(),
            'context'      => 'normal',
            'priority'     => 'core',
            'show_names'   => true,
            'fields'       => array(

                 array(
                    'name'    => __('Page Background', 'edubin-core'),
                    'id'      => $prefix . 'page_bg_color',
                    'type'    => 'colorpicker',
                    'default' => ''
                ),

            ),
        )
    );
 
    // Header Options
    $page_header_options = new_cmb2_box(
        array(
            'id'           => 'page_header_options',
            'title'        => __('<span>Header Options</span>', 'edubin-core'),
            'object_types' => get_post_types(),
            'context'      => 'normal',
            'priority'     => 'core',
            'show_names'   => true,
            'fields'       => array(

                array(
                    'name'    => __('Page Header', 'edubin-core'),
                    'id'      => $prefix . 'page_header_enable',
                    'type'    => 'radio_inline',
                    'default' => 'enable',
                    'options' => array(
                        'enable'  => __('Enable', 'edubin-core'),
                        'disable' => __('Disable', 'edubin-core'),
                    ),
                ),

                  array(
                    'name'       => __('Header Background Image', 'edubin-core'),
                    'id'         => $prefix . 'header_img',
                    'type'       => 'file',
                    'default'    => ''
                ),

                array(
                    'name'       => __('Header Type', 'edubin-core'),
                    'id'         => $prefix . 'mb_customize_header_layout',
                    'type'       => 'select',
                    'default'    => 'enable',
                    'options'    => array(
                        'mb_theme_header'     => __('Default Theme Header', 'edubin-core'),
                        'mb_elementor_header' => __('Elementor Header', 'edubin-core'),
                    )
                ),

                array(
                    'name'       => __('Select Header', 'edubin-core'),
                    'id'         => $prefix . 'mb_elementor_header',
                    'type'       => 'select',
                    'default'    => 'enable',
                    'options'    => edubin_get_elementor_header()
                ),               

            ),
        )
    );

    // Sidebar Options
    $page_sidebar_options = new_cmb2_box(
        array(
            'id'           => 'page_sidebar_options',
            'title'        => __('<span>Sidebar Options</span>', 'edubin-core'),
            'object_types' => array('page'), // Post type,
            'context'      => 'normal',
            'priority'     => 'core',
            'show_names'   => true,
            'fields'       => array(
 
                array(
                    'name'    => 'Sidebar Align',
                    'id'      => $prefix . 'sidebar_align',
                    'type'    => 'radio_inline',
                    'options' => array(
                        'none' => __('None', 'edubin-core'),
                        'left' => __('Left Sidebar', 'edubin-core'),
                        'right' => __('Right Sidebar', 'edubin-core'),
                    ),
                    'default' => 'none',
                ), 
                array(
                    'name'    => __('Sidebar Sticky', 'edubin-core'),
                    'id'      => $prefix . 'sidebar_sticky',
                    'type'    => 'radio_inline',
                    'default' => 'disable',
                    'options' => array(
                        'enable'  => __('Enable', 'edubin-core'),
                        'disable' => __('Disable', 'edubin-core'),
                    ),
                ), 
                array(
                    'name'    => 'Sidebar Width',
                    'id'      => $prefix . 'sidebar_width',
                    'type'    => 'radio_inline',
                    'options' => array(
                        '3' => __('25%', 'edubin-core'),
                        '4' => __('33%', 'edubin-core'),
                    ),
                    'default' => '3',
                ),                
                array(
                    'name'    => 'Sidebar Side Gap',
                    'id'      => $prefix . 'sidebar_side_gap',
                    'type'    => 'radio_inline',
                    'options' => array(
                        '5' => __('05px', 'edubin-core'),
                        '10' => __('10px', 'edubin-core'),
                        '15' => __('15px', 'edubin-core'),
                        '20' => __('20px', 'edubin-core'),
                        '25' => __('25px', 'edubin-core'),
                        '30' => __('30px', 'edubin-core'),
                        '35' => __('35px', 'edubin-core'),
                        '40' => __('40px', 'edubin-core'),
                        '45' => __('45px', 'edubin-core'),
                        '50' => __('50px', 'edubin-core'),
                    ),
                    'default' => '30',
                ),

            ),
        )
    );

    // Footer Options
    $page_footer_options = new_cmb2_box(
        array(
            'id'           => 'page_footer_options',
            'title'        => __('<span>Footer Options</span>', 'edubin-core'),
            'object_types' => get_post_types(),
            'context'      => 'normal',
            'priority'     => 'core',
            'show_names'   => true,
            'fields'       => array(
 
                array(
                    'name'       => __('Footer Type', 'edubin-core'),
                    'id'         => $prefix . 'mb_customize_footer_layout',
                    'type'       => 'radio_inline',
                    'default'    => 'enable',
                    'options'    => array(
                        'mb_theme_footer'     => __('Default Theme Footer', 'edubin-core'),
                        'mb_elementor_footer' => __('Elementor Footer', 'edubin-core'),
                    )
                ),

                array(
                    'name'       => __('Select Footer', 'edubin-core'),
                    'id'         => $prefix . 'mb_elementor_footer',
                    'type'       => 'select',
                    'default'    => 'enable',
                    'options'    => edubin_get_elementor_footer()
                ),

            ),
        )
    );


}