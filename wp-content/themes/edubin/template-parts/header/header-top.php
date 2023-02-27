<?php
/**
 * Displays header site branding
 *
 * @package Edubin
 * Version: 1.0.0
 */

?>
<?php
    $defaults = edubin_generate_defaults();
    $top_email   = get_theme_mod('top_email', $defaults["top_email"]);
    $top_phone   = get_theme_mod('top_phone', $defaults["top_phone"]);
    $top_phone_link   = get_theme_mod('top_phone_link', $defaults["top_phone_link"]);
    $top_massage   = get_theme_mod('top_massage', $defaults["top_massage"]);
    $top_login_button_text   = get_theme_mod('top_login_button_text', $defaults["top_login_button_text"]);
    $top_register_button_text   = get_theme_mod('top_register_button_text', $defaults["top_register_button_text"]);
    $top_logout_button_text   = get_theme_mod('top_logout_button_text', $defaults["top_logout_button_text"]);
    $top_profile_button_text   = get_theme_mod('top_profile_button_text', $defaults["top_profile_button_text"]);
    $top_massage_animation_show   = get_theme_mod('top_massage_animation_show', $defaults["top_massage_animation_show"]);
    $top_widget_position   = get_theme_mod('top_widget_position', $defaults["top_widget_position"]);
    $follow_us_show   = get_theme_mod('follow_us_show', $defaults["follow_us_show"]);
    $follow_us_text   = get_theme_mod('follow_us_text', $defaults["follow_us_text"]);
    $login_reg_show   = get_theme_mod('login_reg_show', $defaults["login_reg_show"]);
    $profile_show   = get_theme_mod('profile_show', $defaults["profile_show"]);
    $custom_profile_page_link   = get_theme_mod('custom_profile_page_link', $defaults["custom_profile_page_link"]);
    $custom_logout_link    = get_theme_mod('custom_logout_link', $defaults["custom_logout_link"]);
    $custom_login_link    = get_theme_mod('custom_login_link', $defaults["custom_login_link"]);
    $custom_register_link    = get_theme_mod('custom_register_link', $defaults["custom_register_link"]);

?>

        <div class="header-left">
            <?php
                if ((!empty($top_phone) || !empty($top_email) || !empty($top_massage))) {?>

                <ul class="contact-info list-inline">

                    <?php if (!empty($top_email)) {?>
                        <li class="email list-inline-item">
                            <i class="glyph-icon flaticon-message-closed-envelope"></i>
                                <a href="mailto:<?php echo sanitize_email($top_email); ?>">
                                    <?php echo sanitize_email($top_email); ?>
                                </a>
                        </li>
                    <?php }?>

                    <?php if (!empty($top_phone)) {?>
                        <li class="phone list-inline-item">
                           <i class="glyph-icon flaticon-telephone-handle-silhouette"></i>
                         <?php if (!empty($top_phone_link)) {?>
                            <a href="<?php echo esc_html($top_phone_link); ?>">
                          <?php }?>
                            <?php echo esc_html($top_phone); ?>
                         <?php if (!empty($top_phone_link)) {?>
                            </a>
                          <?php }?>
                        </li>
                    <?php }?>
                     
                   
                    <?php if (!empty($top_massage)) {?>
                        <li class="massage list-inline-item">
                            <?php if ($top_massage_animation_show) : ?><marquee class="top-marquee"><?php endif; ?><?php echo esc_html($top_massage); ?><?php if ($top_massage_animation_show) : ?></marquee><?php endif; ?>
                        </li>
                    <?php }?>

                </ul>
                <?php
            }?>

        </div><!-- .header-left -->

        <div class="header-right">

            <?php if ($top_widget_position == 'before_social'): ?>
            <ul>
                <?php if ( is_active_sidebar( 'header-top' ) ) { ?>
                    <li class="header-top-widget-area list-inline-item align-right">
                        <?php dynamic_sidebar( 'header-top' ); ?>
                    </li>
                <?php } ?>
            </ul><!-- .Top widget -->
            <?php endif ?>


            <div class="social">
               <?php $edubin_social = edubin_get_social_media(); ?>
               <?php if (!empty($edubin_social)) : ?>
                    <?php if ($follow_us_show): ?>
                        <span class="follow-us"><?php if($follow_us_text) : echo $follow_us_text; else : echo esc_html__( 'Follow Us :', 'edubin' ); endif; ?></span>
                    <?php endif ?>

                <?php echo edubin_get_social_media(); ?>
                 <?php endif; ?>
            </div>  <!-- .Social -->  
            
            <?php if ($top_widget_position == 'after_social'): ?>
            <ul>
                <?php if ( is_active_sidebar( 'header-top' ) ) { ?>
                    <li class="header-top-widget-area list-inline-item align-right">
                        <?php dynamic_sidebar( 'header-top' ); ?>
                    </li>
                <?php } ?>
            </ul><!-- .Top widget -->
            <?php endif ?>

            <?php if ($profile_show == '1') : ?>
                <?php
                    if ( is_user_logged_in() ) : ?>

                    <div class="edubin-custom-user-profile">
                      <ul> 
                        <?php if (!empty($custom_profile_page_link)) : ?>
                            <li class="profile">
                                <a href="<?php echo esc_url($custom_profile_page_link); ?>"><?php if($top_profile_button_text) : echo $top_profile_button_text; else : echo esc_html__( 'Profile', 'edubin' ); endif; ?></a>
                        <?php else : ?>
                                <a href="<?php echo esc_url(get_edit_user_link()); ?>"><?php if($top_profile_button_text) : echo $top_profile_button_text; else : echo esc_html__( 'Profile', 'edubin' ); endif; ?></a>
                            <li>
                        <?php endif; ?>
                        <?php if ($login_reg_show == '1') : ?>
                          <li class="top-seperator"><?php echo esc_attr('/'); ?></li>
                        <?php endif; ?>
                      </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?> 

            <?php if ($login_reg_show == '1') : ?>
                <?php
                    if ( is_user_logged_in() ) : ?>
                        
                    <div class="login-register logout">
                      <ul> 
                        <li class="logouthide">
                            <?php if (!empty($custom_logout_link)) : ?>
                                <a href="<?php echo esc_url($custom_logout_link); ?>"><?php if($top_logout_button_text) : echo $top_logout_button_text; else : echo esc_html__( 'Logout', 'edubin' ); endif; ?></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(wp_logout_url( home_url('/') )); ?>"><?php if($top_logout_button_text) : echo $top_logout_button_text; else : echo esc_html__( 'Logout', 'edubin' ); endif; ?></a>
                            <?php endif; ?>
                        <li>
                      </ul>
                    </div>
                    <?php else : ?>
                    <div class="login-register">
                      <ul>
                        <?php if (!empty($custom_login_link)) : ?>
                            <li> <a href="<?php echo esc_url($custom_login_link); ?>"><?php if($top_login_button_text) : echo $top_login_button_text; else : echo esc_html__( 'Login', 'edubin' ); endif; ?></a></li>
                        <?php else : ?>
                            <li><a href="<?php echo esc_url(wp_login_url( home_url('/') )); ?>"><?php if($top_login_button_text) : echo $top_login_button_text; else : echo esc_html__( 'Login', 'edubin' ); endif; ?></a></li>
                        <?php endif; ?>
                            <li class="top-seperator"><?php echo esc_attr('/'); ?></li>
                        <?php if (!empty($custom_register_link)) : ?>
                            <li> <a href="<?php echo esc_url($custom_register_link); ?>"><?php if($top_register_button_text) : echo $top_register_button_text; else : echo esc_html__( 'Register', 'edubin' ); endif; ?></a></li>
                        <?php else : ?>
                            <li> <a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php if($top_register_button_text) : echo $top_register_button_text; else : echo esc_html__( 'Register', 'edubin' ); endif; ?></a></li>
                        <?php endif; ?>

                      </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?> 
        </div><!-- .header-right -->

