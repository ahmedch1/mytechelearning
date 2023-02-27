<?php

    $settings   = $this->get_settings_for_display();

    if (class_exists('Sensei_Main')) : // Check sensei lms active
 
?>

        <div <?php echo $this->get_render_attribute_string( 'edubin_posts_column' ); ?> >

            <?php if ($settings['course_style'] == '1') : 
                echo '<div class="edubin-sensei-courses-column-area">';
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/sensei_course_layout_1.php'; 
                echo '</div>';
                elseif ($settings['course_style'] == '2') : 
                echo '<div class="edubin-sensei-courses-column-area">';
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/sensei_course_layout_2.php';
                echo '</div>';
                elseif ($settings['course_style'] == '3') :
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/sensei_course_layout_3.php';
                elseif ($settings['course_style'] == '4') :
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/sensei_course_layout_4.php';
            endif; ?>

        </div>
<?php endif; ?>