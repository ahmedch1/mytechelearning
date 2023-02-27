<?php

    $settings   = $this->get_settings_for_display();

    if (function_exists('tutor')) : // Check tutor lms active
        
?>

        <div <?php echo $this->get_render_attribute_string( 'edubin_posts_column' ); ?> >

            <?php if ($settings['course_style'] == '1') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_1.php'; 
                elseif ($settings['course_style'] == '2') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_2.php'; 
                elseif ($settings['course_style'] == '3') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_3.php'; 
                elseif ($settings['course_style'] == '4') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_4.php'; 
                elseif ($settings['course_style'] == '5') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_5.php'; 
                elseif ($settings['course_style'] == '6') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/layout_6.php'; 
            endif; ?>

        </div>
<?php endif; ?>