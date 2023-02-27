<?php

if (!function_exists('edubin_customizer_theme_style')):
    function edubin_customizer_theme_style()
{

        $defaults = edubin_generate_defaults();
        $post_id = edubin_get_id();
        $prefix = '_edubin_';
        
        $page_header_enable = get_post_meta($post_id, $prefix . 'page_header_enable', true);

        $primary_color               = get_theme_mod('primary_color', $defaults['primary_color']);
        $secondary_color             = get_theme_mod('secondary_color', $defaults['secondary_color']);
        $content_color             = get_theme_mod('content_color', $defaults['content_color']);
        $tertiary_color              = get_theme_mod('tertiary_color', $defaults['tertiary_color']);
        $link_color                  = get_theme_mod('link_color', $defaults['link_color']);
        $link_hover_color            = get_theme_mod('link_hover_color', $defaults['link_hover_color']);
        $btn_color                   = get_theme_mod('btn_color', $defaults['btn_color']);
        $btn_hover_color             = get_theme_mod('btn_hover_color', $defaults['btn_hover_color']);
        $menu_text_color             = get_theme_mod('menu_text_color', $defaults['menu_text_color']);
        $menu_hover_color            = get_theme_mod('menu_hover_color', $defaults['menu_hover_color']);
        $menu_active_color            = get_theme_mod('menu_active_color', $defaults['menu_active_color']);
        $sub_menu_text_color         = get_theme_mod('sub_menu_text_color', $defaults['sub_menu_text_color']);
        $sub_menu_arrow_color        = get_theme_mod('sub_menu_arrow_color', $defaults['sub_menu_arrow_color']);
        $sub_menu_border_color       = get_theme_mod('sub_menu_border_color', $defaults['sub_menu_border_color']);
        $sub_menu_bg_color           = get_theme_mod('sub_menu_bg_color', $defaults['sub_menu_bg_color']);
        $mobile_menu_icon_color      = get_theme_mod('mobile_menu_icon_color', $defaults['mobile_menu_icon_color']);
        $preloader_show              = get_theme_mod('preloader_show', $defaults['preloader_show']);
        $preloader_image_url         = get_theme_mod('preloader_image_url', $defaults['preloader_image_url']);
        $preloader_color_primary     = get_theme_mod('preloader_color_primary', $defaults['preloader_color_primary']);
        $preloader_color_secondary   = get_theme_mod('preloader_color_secondary', $defaults['preloader_color_secondary']);
        $preloader_bg_color          = get_theme_mod('preloader_bg_color', $defaults['preloader_bg_color']);
        $bakc_to_top_icon_color      = get_theme_mod('bakc_to_top_icon_color', $defaults['bakc_to_top_icon_color']);
        $bakc_to_top_bg_color        = get_theme_mod('bakc_to_top_bg_color', $defaults['bakc_to_top_bg_color']);
        $header_banner_overlay_color = get_theme_mod('header_banner_overlay_color', $defaults['header_banner_overlay_color']);
        $header_title_color = get_theme_mod('header_title_color', $defaults['header_title_color']);
        $breadcrumb_text_color = get_theme_mod('breadcrumb_text_color', $defaults['breadcrumb_text_color']);
        $header_menu_bg_color        = get_theme_mod('header_menu_bg_color', $defaults['header_menu_bg_color']);
        $header_menu_sticky_bg_color = get_theme_mod('header_menu_sticky_bg_color', $defaults['header_menu_sticky_bg_color']);
        $edubin_header_type = get_theme_mod('edubin_header_type', $defaults['edubin_header_type']);
        $sticky_header_enable = get_theme_mod('sticky_header_enable', $defaults['sticky_header_enable']);
        $btn_text_color              = get_theme_mod('btn_text_color', $defaults['btn_text_color']);
        $btn_text_hover_color        = get_theme_mod('btn_text_hover_color', $defaults['btn_text_hover_color']);
        $search_popup_bg_color       = get_theme_mod('search_popup_bg_color', $defaults['search_popup_bg_color']);
        $placeholder_color           = get_theme_mod('placeholder_color', $defaults['placeholder_color']);

        $edubin_body_font_size                                 = get_theme_mod('edubin_body_font_size', $defaults['edubin_body_font_size']);
        $edubin_body_line_height                                 = get_theme_mod('edubin_body_line_height', $defaults['edubin_body_line_height']);
        $page_top_bottom_space_small                                 = get_theme_mod('page_top_bottom_space_small', $defaults['page_top_bottom_space_small']);

        $logo_size                                 = get_theme_mod('logo_size', $defaults['logo_size']);
        $mobile_logo                               = get_theme_mod('mobile_logo', $defaults['mobile_logo']);
        $mobile_logo_size                          = get_theme_mod('mobile_logo_size', $defaults['mobile_logo_size']);
        $mobile_logo_screen_width                  = get_theme_mod('mobile_logo_screen_width', $defaults['mobile_logo_screen_width']);
        $top_massage_area_width                    = get_theme_mod('top_massage_area_width', $defaults['top_massage_area_width']);
        $sub_menu_right_align                      = get_theme_mod('sub_menu_right_align', $defaults['sub_menu_right_align']);
        $sub_menu_width                            = get_theme_mod('sub_menu_width', $defaults['sub_menu_width']);
        $show_copyright_menu                       = get_theme_mod('show_copyright_menu', $defaults['show_copyright_menu']);
        $header_page_title_align                   = get_theme_mod('header_page_title_align', $defaults['header_page_title_align']);
        $page_header_height                        = get_theme_mod('page_header_height', $defaults['page_header_height']);
        $page_header_height_small_screen           = get_theme_mod('page_header_height_small_screen', $defaults['page_header_height_small_screen']);
        $page_header_height_small_screen_width     = get_theme_mod('page_header_height_small_screen_width', $defaults['page_header_height_small_screen_width']);
        $header_title_font_size                    = get_theme_mod('header_title_font_size', $defaults['header_title_font_size']);
        $header_title_font_size_small_device       = get_theme_mod('header_title_font_size_small_device', $defaults['header_title_font_size_small_device']);
        $header_title_font_size_small_device_width = get_theme_mod('header_title_font_size_small_device_width', $defaults['header_title_font_size_small_device_width']);
        $page_top_bottom_space = get_theme_mod('page_top_bottom_space', $defaults['page_top_bottom_space']);
        $page_top_bottom_space_screen_width = get_theme_mod('page_top_bottom_space_screen_width', $defaults['page_top_bottom_space_screen_width']);

        // Tutor
        $tutor_login_form_widget_align = get_theme_mod('tutor_login_form_widget_align', $defaults['tutor_login_form_widget_align']);
        $rtl_header_logo_align = get_theme_mod('rtl_header_logo_align', $defaults['rtl_header_logo_align']);
        $rtl_header_menu_align = get_theme_mod('rtl_header_menu_align', $defaults['rtl_header_menu_align']);
        $rtl_header_cart_align = get_theme_mod('rtl_header_cart_align', $defaults['rtl_header_cart_align']);
        $tutor_settings_color = get_theme_mod('tutor_settings_color', $defaults['tutor_settings_color']);
        $tutor_archive_pagi_aligment = get_theme_mod('tutor_archive_pagi_aligment', $defaults['tutor_archive_pagi_aligment']);

        $tutor_single_page_layout = get_theme_mod('tutor_single_page_layout', $defaults['tutor_single_page_layout']);

        $mb_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
        $tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
        $final_tutor_single_layout = ( !$mb_tutor_single_page_layout == 'default') ? $tutor_single_page_layout : $mb_tutor_single_page_layout;

        // LearnPress
        $lp_archive_image_height = get_theme_mod('lp_archive_image_height', $defaults['lp_archive_image_height']);

        $mb_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
        $lp_single_page_layout = get_theme_mod('lp_single_page_layout', $defaults['lp_single_page_layout']); 
        $final_lp_single_layout = ( !$mb_lp_single_page_layout == 'default') ? $lp_single_page_layout : $mb_lp_single_page_layout;
        
        // LearnDash
        $mb_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
        $ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);
        $final_ld_single_layout = ( !$mb_ld_single_page_layout == 'default') ? $ld_single_page_layout : $mb_ld_single_page_layout;

        
        // Hide custom post type archive: text
        $tutor_hide_archive_text = get_theme_mod('tutor_hide_archive_text', $defaults['tutor_hide_archive_text']);

        $email_small_device = get_theme_mod('email_small_device', $defaults['email_small_device']);
        $phone_small_device = get_theme_mod('phone_small_device', $defaults['phone_small_device']);
        $message_small_device = get_theme_mod('message_small_device', $defaults['message_small_device']);

        $edubin_menu_top_space = get_theme_mod('edubin_menu_top_space', $defaults['edubin_menu_top_space']);
        $edubin_menu_button_space = get_theme_mod('edubin_menu_button_space', $defaults['edubin_menu_button_space']);
        $edubin_menu_left_space = get_theme_mod('edubin_menu_left_space', $defaults['edubin_menu_left_space']);
        $edubin_menu_right_space = get_theme_mod('edubin_menu_right_space', $defaults['edubin_menu_right_space']);
        $edubin_submenu_space = get_theme_mod('edubin_submenu_space', $defaults['edubin_submenu_space']);
        $logo_top_space = get_theme_mod('logo_top_space', $defaults['logo_top_space']);
        $logo_top_space_mobile = get_theme_mod('logo_top_space_mobile', $defaults['logo_top_space_mobile']);
        $logo_bottom_space = get_theme_mod('logo_bottom_space', $defaults['logo_bottom_space']);
        $logo_bottom_space_mobile = get_theme_mod('logo_bottom_space_mobile', $defaults['logo_bottom_space_mobile']);
        $cart_serach_top_space = get_theme_mod('cart_serach_top_space', $defaults['cart_serach_top_space']);
        $cart_serach_bottom_space = get_theme_mod('cart_serach_bottom_space', $defaults['cart_serach_bottom_space']);

        $sensei_layout_override = get_theme_mod('sensei_layout_override', $defaults['sensei_layout_override']);
        $sensei_archive_pagi_aligment = get_theme_mod('sensei_archive_pagi_aligment', $defaults['sensei_archive_pagi_aligment']);
        $ld_course_title_height = get_theme_mod('ld_course_title_height', $defaults['ld_course_title_height']);
        $lp_course_title_height = get_theme_mod('lp_course_title_height', $defaults['lp_course_title_height']);

        $mb_customize_header_layout = get_post_meta($post_id, $prefix . 'mb_customize_header_layout', true);
        $mb_elementor_header = get_post_meta($post_id, $prefix . 'mb_elementor_header', true);

        ?>

      <style type="text/css">
      :root {
        <?php if ( get_theme_mod('primary_color')): ?>
            --edubin-primary-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('secondary_color')): ?>
            --edubin-secondary-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('content_color')): ?>
            --edubin-content-color: <?php echo esc_attr(get_theme_mod('content_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('tertiary_color')): ?>
             --edubin-tertiary-color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
        <?php endif ?>
       
        <?php if ( get_theme_mod('btn_text_color')): ?>
             --edubin-btn-color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('btn_color')): ?>
             --edubin-btn-bg-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('btn_color')): ?>
              --edubin-btn-border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
        <?php endif ?>
 
        <?php if ( get_theme_mod('btn_text_hover_color')): ?>
             --edubin-btn-hover-color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('btn_hover_color')): ?>
             --edubin-btn-bg-hover-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
        <?php endif ?>
        <?php if ( get_theme_mod('btn_hover_color')): ?>
              --edubin-btn-border-hover-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
        <?php endif ?>

      }
    <?php if ( $edubin_menu_top_space): ?>
        .main-navigation a{
           padding-top: <?php echo esc_attr($edubin_menu_top_space . 'px'); ?>;
        }
    <?php endif;?>

    <?php if ( $edubin_menu_button_space): ?>
        .main-navigation a{
           padding-bottom: <?php echo esc_attr($edubin_menu_button_space . 'px'); ?>;
        }
    <?php endif;?>
    <?php if ( $edubin_menu_left_space): ?>
        .main-navigation a{
           padding-left: <?php echo esc_attr($edubin_menu_left_space . 'px'); ?>;
        }
    <?php endif;?>
    <?php if ( $edubin_menu_right_space): ?>
        .main-navigation a{
           padding-right: <?php echo esc_attr($edubin_menu_right_space . 'px'); ?>;
        }
    <?php endif;?>

    <?php if ( $edubin_submenu_space): ?>
       .main-navigation ul ul a{
           padding-top: <?php echo esc_attr($edubin_submenu_space . 'px'); ?>;
           padding-bottom: <?php echo esc_attr($edubin_submenu_space . 'px'); ?>;
        }
    <?php endif;?>

    <?php if ( $cart_serach_top_space): ?>
       .header-right-icon ul li{
           padding-top: <?php echo esc_attr($cart_serach_top_space . 'px'); ?>;
        }
    <?php endif;?>

    <?php if ( $cart_serach_bottom_space): ?>
       .header-right-icon ul li{
           padding-bottom: <?php echo esc_attr($cart_serach_bottom_space . 'px'); ?>;
        }
    <?php endif;?>


    <?php if ( $logo_top_space): ?>
       .site-branding{
           padding-top: <?php echo esc_attr($logo_top_space . 'px'); ?>;
        }
    <?php endif;?>

    <?php if ( $logo_bottom_space): ?>
       .site-branding{
           padding-bottom: <?php echo esc_attr($logo_bottom_space . 'px'); ?>;
        }
    <?php endif;?>


    <?php if ( $email_small_device ||  $phone_small_device || $message_small_device): ?>

        @media (max-width: 767.98px) {
                .header-left {
                  display: block;
                  float: none;
                  text-align: center;
                }

            <?php if ( $email_small_device): ?>
                .header-top .contact-info .email{
                  display: inline-block;
                }
            <?php else: ?>
                .header-top .contact-info .email{
                  display: none;
                }
            <?php endif;?>

            <?php if ( $phone_small_device): ?>
                .header-top .contact-info .phone{
                  display: inline-block;
                      margin-right: 0;
                }
            <?php else: ?>
                 .header-top .contact-info .phone{
                  display: none;
                }
            <?php endif;?>
        }/* end small media query*/

    <?php if ( $message_small_device): ?>
      @media (max-width: 991.98px) {
          .header-top .contact-info li.massage .top-marquee {
              display: inline-block;
          }
      }
    <?php endif;?>

    <?php endif;?>


      <?php if(!is_user_logged_in()) { ?>
        .page.woocommerce-account.woocommerce-page .ld-profile-page .page-inner-wrap>.entry-content>.woocommerce {
            background: #fff;
            padding: 40px;
        }
      <?php } ?>

      <?php if ( $page_top_bottom_space || $page_top_bottom_space == 0): ?>
        .site__content {
            padding: <?php echo esc_attr($page_top_bottom_space . 'px'); ?> 0;
        }
      <?php endif;?>

      <?php if ( $page_top_bottom_space_small || $page_top_bottom_space_small == 0): ?>
        @media screen and (max-width: <?php echo esc_attr($page_top_bottom_space_screen_width . 'px'); ?>) {
            .site__content {
                padding: <?php echo esc_attr($page_top_bottom_space_small . 'px'); ?> 0;
            }
        }
      <?php endif;?>

      <?php if ( $page_header_enable == 'disable'): ?>
          .elementor-page .site__content {
              padding: 0;
          }
      <?php endif;?>

      <?php if ( $edubin_body_font_size): ?>
        body{
          font-size: <?php echo esc_attr($edubin_body_font_size . 'px'); ?>;
        }
      <?php endif;?>

      <?php if ( $edubin_body_line_height): ?>
        body{
          line-height: <?php echo esc_attr($edubin_body_line_height . 'px'); ?>;
        }
      <?php endif;?>

      <?php if ( $preloader_image_url && $preloader_show == true): ?>
        .edubin_image_preloader {
          background: url(<?php echo esc_url($preloader_image_url); ?>) center no-repeat <?php echo esc_attr($preloader_bg_color); ?>;
        }
      <?php endif;?>

      <?php if ( $sub_menu_width): ?>
        /* Menu area top padding */
        .main-navigation ul ul a {
          width: <?php echo esc_attr($sub_menu_width . 'px'); ?>;
        }
      <?php endif;?>

      <?php if ( $top_massage_area_width): ?>
        /* Top marque message are width */
        .header-top .contact-info li.massage .top-marquee {
          width: <?php echo esc_attr($top_massage_area_width . 'px'); ?>;
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
          .header-top .contact-info li.massage .top-marquee {
            width: 250px;
          }
        }
      <?php endif;?>

      <?php if ( $logo_size): ?>
        /* For logo only */
        body.home.title-tagline-hidden.has-header-image .custom-logo-link img,
        body.home.title-tagline-hidden.has-header-video .custom-logo-link img,
        .header-wrapper .header-menu .site-branding img,
        .site-branding img.custom-logo {
          max-width: <?php echo esc_attr($logo_size . 'px'); ?>;
        }
      <?php endif;?>

      @media (max-width: <?php echo esc_attr($mobile_logo_screen_width . 'px'); ?>) {

       <?php if ( $mobile_logo): ?>
        .header-sections .custom-logo-link img{
          display: none;
        }
      <?php endif;?>

      .header-sections .mobile-logo-active.edubin-mobile-logo {
        display: block;
      }
      .header-sections .edubin-mobile-logo {
        display: block;
      }
      .header-sections .edubin-mobile-logo img{
        max-width: <?php echo esc_attr($mobile_logo_size . 'px'); ?>;
      }
        <?php if ( $logo_top_space_mobile): ?>
            .site-branding{
               padding-top: <?php echo esc_attr($logo_top_space_mobile . 'px'); ?>;
            }
        <?php endif;?>

        <?php if ( $logo_bottom_space_mobile): ?>
           .site-branding{
               padding-bottom: <?php echo esc_attr($logo_bottom_space_mobile . 'px'); ?>;
            }
        <?php endif;?>
    }

    <?php if (get_theme_mod('home_menu_acive_color') == false): ?>
      <?php if (get_theme_mod('home_menu_acive_color') == false && get_theme_mod('menu_text_color')): ?>
      .main-navigation li.menu-item-home.current-menu-item.current-menu-parent>a{
        color: <?php echo esc_attr($menu_text_color); ?>;
      }
      <?php elseif (get_theme_mod('home_menu_acive_color') == false): ?>
       .main-navigation li.menu-item-home.current-menu-item.current-menu-parent>a{
        color: #07294d;
      }
    <?php endif;?>

  <?php endif;?>
  <?php if ( $sub_menu_right_align): ?>
    .main-navigation ul>li ul li:hover>ul {
      left: 100%;
      right: auto;
    }
  <?php endif;?>
/*  Header title align*/
  <?php if ( $header_page_title_align): ?>
    .page-header{
      text-align: <?php echo esc_attr($header_page_title_align); ?>;
    }
  <?php endif;?>
  /*  Header title height*/
  <?php if ( $page_header_height): ?>
    .page-header{
      min-height: <?php echo esc_attr($page_header_height . 'px'); ?>;
    }
  <?php endif;?>
  /*  Header title height small device*/
     @media (max-width: <?php echo esc_attr($page_header_height_small_screen_width . 'px'); ?>) {

       <?php if ( $page_header_height_small_screen): ?>
        .page-header{
          min-height: <?php echo esc_attr($page_header_height_small_screen . 'px'); ?>;
        }
      <?php endif;?>
      }
  /* Header title font size*/
  <?php if ( $header_title_font_size): ?>
    .page-header .page-title {
        font-size: <?php echo esc_attr($header_title_font_size . 'px'); ?>;
    }
  <?php endif;?>

  /* Header title font size for mobile device */
  @media (max-width: <?php echo esc_attr($header_title_font_size_small_device_width . 'px'); ?>) {
    <?php if ( $header_title_font_size_small_device): ?>
      .page-header .page-title {
          font-size: <?php echo esc_attr($header_title_font_size_small_device . 'px'); ?>;
      }
    <?php endif;?>
  }
  <?php if ( $rtl_header_logo_align): ?>
      .header-menu .site-branding {
          float: left;
      }
    .custom-logo-link {
        padding-left: 0;
    }
  <?php endif;?>

  <?php if ( $rtl_header_menu_align): ?>
      .header-menu .navigation-section {
          float: right;
      }
  <?php endif;?>

  <?php if ( $rtl_header_cart_align): ?>
      .header-right-icon.pull-right {
          float: right;
      }
  <?php endif;?>
  <?php if ( $header_menu_bg_color) : ?>
    .is-header-sticky{
      background: <?php echo esc_attr(get_theme_mod('header_menu_bg_color')); ?>;
    }
  <?php endif;?>
  <?php if ( $header_menu_sticky_bg_color) : ?>
    .is-header-sticky.sticky-active{
      background: <?php echo esc_attr(get_theme_mod('header_menu_sticky_bg_color')); ?>;
    }
  <?php endif;?>

  <?php if ( $edubin_header_type == 'edubin_elementor_header' && $sticky_header_enable || $mb_customize_header_layout == 'mb_elementor_header') : ?>
    .is-header-sticky {
        position: sticky;
    }
    .is-header-top-main .page-header {
        margin-top: 0;
    }
    .page-header {
        margin-top: 0;
    }
    .site__content.page-header-disable {
        margin-top: 0;
    }
    .is-header-top-main .site__content.page-header-disable{
        margin-top: 0;
    }
    .admin-bar .is-header-sticky {
        top: 0;
    }
  <?php endif;?>

  
  /* ==== Global Courses ====== */

  /* ===== Core ===== */

  .site-title, .site-title a{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  h1, h2, h3, h4, h5, h6{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .edubin-entry-footer .cat-links, .edubin-entry-footer .tags-links{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .widget .widget-title{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  button, input[type="button"], input[type="submit"]{
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  }
  .learnpress .price-button button:hover,
  .learnpress .price-button input[type="button"]:hover,
  .learnpress input[type="submit"]:hover{
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .learnpress a.checkout-form-login-toggle, .learnpress a.checkout-form-register-toggle{
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  }
<?php if (get_theme_mod('primary_color') || get_theme_mod('secondary_color')): ?>
    .learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active>a, .learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover>a{
        color: #fff;
    }
.learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active>a i, .learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active>a:after, .learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover>a i, .learnpress-profile #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover>a:after{
        color: #fff;
}
<?php endif; ?>
  button, input[type="button"],
  input[type="submit"]{
    color:<?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  }
  button:hover, button:focus, input[type="button"]:hover,
  input[type="button"]:focus, input[type="submit"]:hover,
  input[type="submit"]:focus{
    background-color:<?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  }
  button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus{
   color:<?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
 }

 .edubin-main-btn a{
   color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
 }
 .edubin-main-btn:hover {
  border-color:<?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  background-color:<?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;

}
.edubin-main-btn:hover a{
 color:<?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.edubin-main-btn{
 background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .colors-light .pagination .nav-links .page-numbers.current{
   background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
   color: #fff;
 }
 .nav-links .page-numbers.dots{
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color: #fff;
 }
<?php endif?>

.colors-light .pagination .nav-links .page-numbers.current:hover{
 background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.back-to-top{
 background: <?php echo esc_attr(get_theme_mod('bakc_to_top_bg_color')); ?>;
}
.back-to-top{
 color: <?php echo esc_attr(get_theme_mod('bakc_to_top_icon_color')); ?>;
}
.back-to-top > i{
  color: <?php echo esc_attr(get_theme_mod('bakc_to_top_icon_color')); ?>;
}
.preloader .color-1{
 background-color: <?php echo esc_attr(get_theme_mod('preloader_color_primary')); ?> !important;
}
.preloader .rubix-cube .layer{
  background-color: <?php echo esc_attr(get_theme_mod('preloader_color_secondary')); ?>;
}
.preloader{
  background-color: <?php echo esc_attr(get_theme_mod('preloader_bg_color')); ?>;
}
#preloader_two {
  background-color: <?php echo esc_attr(get_theme_mod('preloader_bg_color')); ?>;
}

#preloader_two .preloader_two span {
  background-color: <?php echo esc_attr(get_theme_mod('preloader_color_primary')); ?>;
}
::-webkit-input-placeholder {
  color: <?php echo esc_attr(get_theme_mod('placeholder_color')); ?>;
}
:-moz-placeholder {
  color: <?php echo esc_attr(get_theme_mod('placeholder_color')); ?>;
}
::-moz-placeholder {
  color: <?php echo esc_attr(get_theme_mod('placeholder_color')); ?>;
}
:-ms-input-placeholder {
  color: <?php echo esc_attr(get_theme_mod('placeholder_color')); ?>;
}
.edubin-social a.edubin-social-icon{
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .site-footer .widget .edubin-social a:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
   background: transparent;
   border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
  .header-right-icon ul li a span{
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color: #fff;
  }
<?php endif;?>
.header-right-icon ul li a{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.lp-pmpro-membership-list .lp-price {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
/*Blog*/
.post .entry-meta li{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.post .entry-title a:hover, .post .entry-title a:focus, .post .entry-title a:active{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.navigation .nav-links .nav-title:hover{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
ul.entry-meta li i{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#comments .logged-in-as>a:last-child{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.edubin_recent_post .edubin_recent_post_title a:hover{
 color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}


/*Sidebar*/
.widget .widget-title:before{
 background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.edubin_recent_post .edubin_recent_post_title a{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
table#wp-calendar td#today{
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}

/*Core*/

.rubix-cube .layer{
    background-color:<?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.page-header:before{
    background-color:<?php echo esc_attr(get_theme_mod('header_banner_overlay_color')); ?>;
}
.edubin-course-top-info.course-page-header.dark:before{
    background-color:<?php echo esc_attr(get_theme_mod('header_banner_overlay_color')); ?>;
}
.page-header .page-title{
    color:<?php echo esc_attr(get_theme_mod('header_title_color')); ?>;
}
.page-header .header-breadcrumb span{
    color:<?php echo esc_attr(get_theme_mod('breadcrumb_text_color')); ?>;
}
.trail-items li::after{
    color:<?php echo esc_attr(get_theme_mod('breadcrumb_text_color')); ?>;
}
.edubin-search-box{
    background-color:<?php echo esc_attr(get_theme_mod('search_popup_bg_color')); ?>70;
}
.edubin-search-box .edubin-search-form input{
 color:<?php echo esc_attr(get_theme_mod('search_popup_bg_color')); ?>;
 border-color:<?php echo esc_attr(get_theme_mod('search_popup_bg_color')); ?>;
}
.edubin-search-box .edubin-search-form input[type="text"]:focus{
 border-color:<?php echo esc_attr(get_theme_mod('search_popup_bg_color')); ?>;
}
.edubin-search-box .edubin-search-form button{
 color:<?php echo esc_attr(get_theme_mod('search_popup_bg_color')); ?>;
}
.error-404 .error-404-heading{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.error-404 a{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.error-404 a:hover{
  color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}
<?php if (get_theme_mod('primary_color') || get_theme_mod('secondary_color')): ?>

    .edubin-course .price__2 span{
        color: #fff;
    }
    .edubin-course .price__3  span{
        color: #fff;
    }
    .edubin-course .price__4  span{
        color: #fff;
    }
    .edubin-course .course__categories a{
        color: #fff;
    }
    .edubin-course .course__level span{
        color: #fff;
    }
    .edubin-course .course__categories a:hover {
         color: #fff; 
    }
<?php endif ?>

/*blog*/

<?php if ( get_theme_mod('primary_color') or get_theme_mod('secondary_color')): ?>

    [class*="hint--"]:after {
      color: #fff;
    }
<?php endif; ?>

.entry-title a{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}

.comment-reply-link{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.comment-author-link{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>
}
a.comment-reply-link:hover{
 color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}
.comments-area .comment-meta b.fn{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
article.post.sticky{
 border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
body a{
 color: <?php echo esc_attr(get_theme_mod('link_color')); ?>;
}
body a:hover, body a:active{
  color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>
}
.widget a{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus{
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.widget .tagcloud a:hover, .widget .tagcloud a:focus, .widget.widget_tag_cloud a:hover, .widget.widget_tag_cloud a:focus, .wp_widget_tag_cloud a:hover, .wp_widget_tag_cloud a:focus{
 background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .widget .tagcloud a:hover{
    color: #fff;
  }
<?php endif;?>
.widget .tag-cloud-link{
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}

/*menu*/
.header-menu .mobile-menu-icon i{
  color: <?php echo esc_attr(get_theme_mod('mobile_menu_icon_color')); ?>;
}
.header-menu span.zmm-dropdown-toggle{
  color: <?php echo esc_attr(get_theme_mod('mobile_menu_icon_color')); ?>;
}
.main-navigation a{
 color: <?php echo esc_attr(get_theme_mod('menu_text_color')); ?>;
}
.mobile-menu>ul li a{
 color: <?php echo esc_attr(get_theme_mod('menu_text_color')); ?>;
}
.mobile-menu>ul li a:hover{
   color: <?php echo esc_attr(get_theme_mod('menu_hover_color')); ?>;
}
.menu-effect-2 .main-navigation .current-menu-item.menu-item-home>a{
  color: <?php echo esc_attr(get_theme_mod('menu_text_color')); ?>;
}
 .main-navigation .current-menu-item.menu-item-home>a{
  color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation .current-menu-item.menu-item-home>a{
  color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation ul ul{
  border-top-color: <?php echo esc_attr(get_theme_mod('sub_menu_border_color')); ?>;
}
.main-navigation li.current-menu-ancestor>a{
  color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation ul > li.current-menu-ancestor>a{
  color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation li.current-menu-item>a{
 color: <?php echo esc_attr(get_theme_mod('menu_hover_color')); ?>;
}
.main-navigation li >ul >.current-menu-item> a{
 color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation ul >li >ul .current-menu-item >a{
 color: <?php echo esc_attr(get_theme_mod('menu_active_color')); ?>;
}
.menu-effect-2 .main-navigation a:hover{
 color: <?php echo esc_attr(get_theme_mod('menu_hover_color')); ?>;
}
.menu-effect-2 .main-navigation ul ul a{
  color: <?php echo esc_attr(get_theme_mod('sub_menu_text_color')); ?>;
}
.menu-effect-2 .main-navigation ul ul a:hover{
 color: <?php echo esc_attr(get_theme_mod('sub_menu_text_color')); ?>;
}
.main-navigation ul ul{
 background: <?php echo esc_attr(get_theme_mod('sub_menu_bg_color')); ?>;
}
.menu-effect-2 .main-navigation ul ul{
 background: <?php echo esc_attr(get_theme_mod('sub_menu_bg_color')); ?>;
}
.main-navigation li.current-menu-ancestor>a{
 color: <?php echo esc_attr(get_theme_mod('menu_hover_color')); ?>;
}
.main-navigation ul ul a::before{
 background: <?php echo esc_attr(get_theme_mod('sub_menu_arrow_color')); ?>;
}
.main-navigation ul ul a:hover{
 color: <?php echo esc_attr(get_theme_mod('menu_hover_color')); ?>;
}


<?php if (class_exists('WPForms')): //  exists for wpfroms ?>
  div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button{
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  }
  div.wpforms-container-full .wpforms-form input[type=date]:focus, div.wpforms-container-full .wpforms-form input[type=datetime]:focus, div.wpforms-container-full .wpforms-form input[type=datetime-local]:focus, div.wpforms-container-full .wpforms-form input[type=email]:focus, div.wpforms-container-full .wpforms-form input[type=month]:focus, div.wpforms-container-full .wpforms-form input[type=number]:focus, div.wpforms-container-full .wpforms-form input[type=password]:focus, div.wpforms-container-full .wpforms-form input[type=range]:focus, div.wpforms-container-full .wpforms-form input[type=search]:focus, div.wpforms-container-full .wpforms-form input[type=tel]:focus, div.wpforms-container-full .wpforms-form input[type=text]:focus, div.wpforms-container-full .wpforms-form input[type=time]:focus, div.wpforms-container-full .wpforms-form input[type=url]:focus, div.wpforms-container-full .wpforms-form input[type=week]:focus, div.wpforms-container-full .wpforms-form select:focus, div.wpforms-container-full .wpforms-form textarea:focus{
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  div.wpforms-container-full .wpforms-form input:focus, div.wpforms-container-full .wpforms-form textarea:focus, div.wpforms-container-full .wpforms-form select:focus{
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
  div.wpforms-container-full .wpforms-form input[type=submit]:hover, div.wpforms-container-full .wpforms-form button[type=submit]:hover, div.wpforms-container-full .wpforms-form .wpforms-page-button:hover{
    border: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
 }
 div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button{
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
}
<?php endif;?>

/*Header top*/
.header-top ul li{
  color: <?php echo esc_attr(get_theme_mod('header_top_text_color')); ?>;
}
.header-top ul li a{
  color: <?php echo esc_attr(get_theme_mod('header_top_text_color')); ?>;
}
.header-top{
  background-color: <?php echo esc_attr(get_theme_mod('header_top_bg_color')); ?>;
}
.header-top ul li a:hover{
  color: <?php echo esc_attr(get_theme_mod('header_top_link_color')); ?>;
}
.header-top ul li a:hover i{
  color: <?php echo esc_attr(get_theme_mod('header_top_link_color')); ?>;
}
.header-top .header-right .login-register ul li a{
  color: <?php echo esc_attr(get_theme_mod('header_top_link_color')); ?>;
}

/*Footer*/
<?php if ( $show_copyright_menu == true): ?>
  .text-right.text-ml-left {
    display: block;
  }
<?php endif;?>

.site-footer .footer-top{
  background-color: <?php echo esc_attr(get_theme_mod('footer_bg_color')); ?>;
}
.site-footer .widget ul li a{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget a{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget p{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget .widget-title{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .edubin-quickinfo{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget ul li{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget_rss .rss-date, .site-footer .widget_rss li cite{
  color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget_calendar th, .site-footer .widget_calendar td{
 color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .calendar_wrap table#wp-calendar caption{
 color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .calendar_wrap table#wp-calendar caption{
 color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer tr{
  border-color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .calendar_wrap table#wp-calendar{
  border-color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .calendar_wrap table#wp-calendar caption{
 border-color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer thead th{
 border-color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>;
}
.site-footer .widget.widget_nav_menu ul li a:hover{
  color: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>;
}
.site-footer .widget a:hover{
 color: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>;
}
.site-footer .widget ul.menu li:before{
  color: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>;
}
.colors-light .widget .tag-cloud-link{
 background-color: <?php echo esc_attr(get_theme_mod('footer_btn_submit_color')); ?>;
}
.site-footer button,
.site-footer input[type="button"],
.site-footer input[type="submit"]{
  background-color: <?php echo esc_attr(get_theme_mod('footer_btn_submit_color')); ?>;
}

/*Copyright*/
.site-footer .site-info a{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .site-info p{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-bottom{
  background-color: <?php echo esc_attr(get_theme_mod('copyright_bg_color')); ?>;
}
.site-footer .site-info a:hover{
  color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget ul li a:hover{
   color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget a:hover{
   color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget ul li a{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .comment-author-link{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget ul li:before{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget a{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget p{
   color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .social-navigation a{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .social-navigation a:hover, 
.site-footer .footer-cyperight-wrap .social-navigation a:focus{
  color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget ul li{
   color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget .widget-title{
   color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget_rss .rss-date, 
.site-footer .footer-cyperight-wrap .widget_rss li cite{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget #wp-calendar caption{
    color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap table#wp-calendar th{
    color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget table#wp-calendar th{
    color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap table#wp-calendar td#today{
    color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
     background-color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget table#wp-calendar td{
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('copyright_text_color')); ?>;
}
.site-footer .footer-cyperight-wrap .widget .tagcloud a:hover, 
.site-footer .footer-cyperight-wrap .widget.widget_tag_cloud a:hover{

}
.site-footer .footer-cyperight-wra table#wp-calendar td#today{
   background-color: <?php echo esc_attr(get_theme_mod('copyright_link_color')); ?>;
}
<?php if (class_exists('WooCommerce')): //  exists for wpfroms ?>
    /*Woocommerce*/
    .woocommerce .woocommerce-error .button,
    .woocommerce .woocommerce-info .button,
    .woocommerce .woocommerce-message .button {
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
    }
    .woocommerce .woocommerce-error .button:hover,
    .woocommerce .woocommerce-info .button:hover,
    .woocommerce .woocommerce-message .button:hover {
      border: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
    }
    .woocommerce #respond input#submit,
    .woocommerce input.button{
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
    }
    .woocommerce #respond input#submit:hover,
    .woocommerce input.button:hover{
      border: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
    }
    .wc-proceed-to-checkout{
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
    }
    .wc-proceed-to-checkout:hover{
      border: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
    }
    .wc-proceed-to-checkout:hover a.checkout-button{
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
    }
    .woocommerce a.shipping-calculator-button{
      color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
    }
    .woocommerce a.showcoupon{
     color: <?php echo esc_attr(get_theme_mod('link_color')); ?>;
    }
    <?php if (get_theme_mod('primary_color')): ?>
    .woocommerce span.onsale{
      color: #fff;
      background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    }
    <?php endif;?>
.woocommerce a.added_to_cart.wc-forward{
 background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.woocommerce a.add_to_cart_button{
 color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .woocommerce a.add_to_cart_button:hover {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color:#fff;
  }
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
.woocommerce a.edubin-cart-link{
  border: 1px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: #fff;
}
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
  .woocommerce a.edubin-cart-link:hover{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
   color: #fff;
   border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
 }
<?php endif;?>
<?php if (get_theme_mod('secondary_color') || get_theme_mod('primary_color')): ?>
  .woocommerce ul.products li.product .overlay{
     background-color: rgba(0,0,0,.3);
  }
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
.woocommerce .edubin-cart-button-list>a.button {
  border: 1px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: #fff;
}
<?php endif;?>
.woocommerce .edubin-cart-button-list>a.button:hover {
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
}
<?php if (get_theme_mod('primary_color')): ?>
.woocommerce a.button.added:after, .woocommerce button.button.added:after{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
   color: #fff;
}
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
.woocommerce #respond input#submit.loading:after, .woocommerce a.button.loading:after, .woocommerce button.button.loading:after, .woocommerce input.button.loading:after {
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
   color: #fff;
}
<?php endif;?>
.woocommerce h2.woocommerce-loop-product__title:hover{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.woocommerce h2.woocommerce-loop-product__title{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li a{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a:before{
  background: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}

.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover{
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.woocommerce-cart table.cart td a, .woocommerce-cart table.cart th a {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
a.button.wc-backward {
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
a.button.wc-backward:hover {
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
.woocommerce .product_meta a:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php endif; //End WooCommerce ?>

<?php if (class_exists('Tribe__Events__Main')): // The events calender ?>

  .tribe-events-event-cost span{
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tribe-events-event-cost span{
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .events-address ul li .single-address .icon i{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tribe-events-list-event-title a.tribe-event-url{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
 }
 .tribe_events-template-default .edubin-event-register-from #rtec button:hover{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
 }
 <?php if (get_theme_mod('primary_color')): ?>
 .tribe_events-template-default .edubin-event-register-from #rtec span.rtec-already-registered-reveal a{
  color: #fff;
}
<?php endif;?>
#tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], .tribe-events-button, .tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a{
 background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
.edubin-events-countdown .count-down-time .single-count .number{
 color: #fff;
}
.edubin-single-event-addon .edubin-event-price-1 span{
 color: #fff;
}
<?php endif;?>
#tribe-events .tribe-events-button, .tribe-events-button{
 color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
#tribe-events .tribe-events-button:hover, #tribe-events .tribe-events-button:hover:hover, #tribe_events_filters_wrapper input[type=submit]:hover, .tribe-events-button:hover, .tribe-events-button.tribe-active:hover:hover, .tribe-events-button.tribe-inactive:hover, .tribe-events-button:hover:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a:hover{
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tribe-events-event-cost span{
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
#tribe-events-content a:hover, .tribe-events-adv-list-widget .tribe-events-widget-link a:hover, .tribe-events-adv-list-widget .tribe-events-widget-link a:hover:hover, .tribe-events-back a:hover, .tribe-events-back a:hover:hover, .tribe-events-event-meta a:hover, .tribe-events-list-widget .tribe-events-widget-link a:hover, .tribe-events-list-widget .tribe-events-widget-link a:hover:hover, ul.tribe-events-sub-nav a:hover, ul.tribe-events-sub-nav a:hover:hover{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#tribe-events td.tribe-events-present div[id*="tribe-events-daynum-"], #tribe-events td.tribe-events-present div[id*="tribe-events-daynum-"] > a{
 background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
.tribe_events-template-default .edubin-event-register-from #rtec .rtec-register-button{
 background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
 color: #fff;
 border: 2px solid;
}
<?php endif;?>

.events-right [data-overlay]::before{
  background: linear-gradient(190deg,<?php echo esc_attr(get_theme_mod('primary_color')) ?> 50%,transparent 100%);
}
.edubin-events-countdown.edubin-events-countdown-2:before{
  background: linear-gradient(190deg,<?php echo esc_attr(get_theme_mod('primary_color')) ?> 20%,transparent 100%);
}
<?php if (get_theme_mod('primary_color')): ?>
.events-left span{
  color: #fff;
}
<?php endif;?>
.tribe-events-calendar thead th{
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"], .tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a{
 background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tribe-events-calendar div[id*="tribe-events-daynum-"], .tribe-events-calendar div[id*="tribe-events-daynum-"] a{
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.events-address ul li .single-address .cont h6{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-events .tribe-events-calendar-list__event-date-tag-datetime{
  background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .post-type-archive-tribe_events span.tribe-events-c-small-cta__price{
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color: #fff;
  }
<?php endif;?>
.tribe-common--breakpoint-medium.tribe-common .tribe-common-b2 i{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tribe-common a, .tribe-common a:active, .tribe-common a:focus, .tribe-common a:hover, .tribe-common a:visited{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-common--breakpoint-medium.tribe-common .tribe-common-b2{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-common--breakpoint-medium.tribe-common .tribe-common-h6--min-medium{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-common--breakpoint-full.tribe-events .tribe-events-c-top-bar__datepicker-desktop{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-common--breakpoint-full.tribe-events .tribe-events-c-top-bar__datepicker-desktop{
 color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}
.tribe-events .datepicker .datepicker-switch{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe_events-template-default .tribe-events-notices{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tribe-events .datepicker .day.active, .tribe-events .datepicker .day.active.focused, .tribe-events .datepicker .day.active:focus, .tribe-events .datepicker .day.active:hover, .tribe-events .datepicker .month.active, .tribe-events .datepicker .month.active.focused, .tribe-events .datepicker .month.active:focus, .tribe-events .datepicker .month.active:hover, .tribe-events .datepicker .year.active, .tribe-events .datepicker .year.active.focused, .tribe-events .datepicker .year.active:focus, .tribe-events .datepicker .year.active:hover{
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tribe-common .tribe-common-anchor-thin:active, .tribe-common .tribe-common-anchor-thin:focus, .tribe-common .tribe-common-anchor-thin:hover{
  color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}

.tribe-common--breakpoint-medium.tribe-events .tribe-events-c-ical__link{
 background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
 border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
 color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.tribe-common--breakpoint-medium.tribe-events .tribe-events-c-ical__link:hover{
  background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.tribe-common .tribe-common-c-btn, .tribe-common a.tribe-common-c-btn{
  background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.tribe-common .tribe-common-c-btn:focus, .tribe-common .tribe-common-c-btn:hover, .tribe-common a.tribe-common-c-btn:focus, .tribe-common a.tribe-common-c-btn:hover{
  background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.single-tribe_events a.tribe-events-gcal, .single-tribe_events a.tribe-events-ical{
 background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
 border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
 color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.single-tribe_events a.tribe-events-gcal:hover, .single-tribe_events a.tribe-events-ical:hover{
  background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.tribe-events .datepicker .datepicker-switch:active{
  color: <?php echo esc_attr(get_theme_mod('link_hover_color')); ?>;
}
<?php endif;?>

<?php if (class_exists('LearnPress')): // LeanPress ?>

      <?php if ( $lp_single_page_layout == '1' ): ?>

        @media (max-width:1024px) {
            .single-course-layout-01 .page-header{
              text-align: center;
            }
        }
      <?php endif; //End learnpress header for layout 1  ?>

      <?php if ( $lp_single_page_layout == '3' ): ?>
         .single-course-layout-03 .page-header{
          text-align: center;
        }
      <?php endif; //End learnpress header for layout 3  ?>
      
      <?php if ( $lp_single_page_layout == '1' || $lp_single_page_layout == '3') : // The section visible only for layout 2 ?>
        .course-detail-info {
            display: none;
        }
      <?php endif; //End // The section visible only for layout 2  ?>

     <?php if ( get_theme_mod('primary_color')): ?>
        .single-lp_course #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item.item-preview .course-item-preview {
            background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        }
        .single-lp_course .course-curriculum .section-content .course-item-preview:before{
             background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        }
        .single-lp_course #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .course-item-meta .count-questions {
            background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        }
        .single-lp_course #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .course-item-meta .duration {
            background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        }
        .edubin-single-course-1 .thum .edubin-course-price-1 span, .edubin-single-course-1 .thum .edubin-course-price-2 span, .edubin-single-course-1 .thum .edubin-course-price-3 span, .edubin-single-course-2>.thum .edubin-course-price-4 span{
            color: #fff;
        }
        .course-tab-panel .lp-course-author .author-socials>a:hover{
            border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
            color: #fff;
            background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
        }
    <?php endif; ?>

    <?php if ( get_theme_mod('primary_color') or get_theme_mod('secondary_color')): ?>

        #edubin-lp-courses-addons .course__categories > a{
            color: #fff;
        }
    <?php endif; ?>
    
<?php endif; //End learnpress ?>

<?php if (class_exists('SFWD_LMS')): // LearnDash ?>

 <?php if ( $final_ld_single_layout == '1' ): ?>

    @media (max-width:1024px) {
        .single-course-layout-01 .page-header{
          text-align: center;
        }
    }
  <?php endif; //End learnpress header for layout 1  ?>

  <?php if ( $final_ld_single_layout == '3' ): ?>
     .single-course-layout-03 .page-header{
      text-align: center;
    }
  <?php endif; //End learnpress header for layout 3  ?>
      
/*Show only nth-child(1)d category */
 div.edubin-course-cat > span > a:not(:nth-child(1)){
     display: none;
  }
 div.caption > div > span > a:not(:nth-child(1)){
  display: none;
}
.edubin-course-cat>i{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
div.edubin-course-cat > span > a{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#ld_course_list .ld-course-list-items .ld_course_grid .btn-primary{
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
#ld_course_list .ld-course-list-items .ld_course_grid .btn-primary:hover, #ld_course_list .ld-course-list-items .ld_course_grid .btn-primary:focus, #ld_course_list .ld-course-list-items .ld_course_grid .btn-primary:active, #ld_course_list .ld-course-list-items .ld_course_grid .btn-primary.active, #ld_course_list .ld-course-list-items .ld_course_grid .open .dropdown-toggle.btn-primary{
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
#ld_course_list .ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price.ribbon-enrolled{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#ld_course_list .ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price.ribbon-enrolled:before {
    border-top: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    border-right: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.edubin-single-course-1.ld-course .course-bottom .see-more-btn a{
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}

.edubin-single-course-1.ld-course .course-bottom .see-more-btn:hover a{
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
  .learndash-wrapper .ld-item-list .ld-item-list-item.ld-is-next, .learndash-wrapper .wpProQuiz_content .wpProQuiz_questionListItem label:focus-within {
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .single .learndash-wrapper .ld-breadcrumbs a,
  .single .learndash-wrapper .ld-lesson-item.ld-is-current-lesson .ld-lesson-item-preview-heading,
  .single .learndash-wrapper .ld-lesson-item.ld-is-current-lesson .ld-lesson-title,
  .single .learndash-wrapper .ld-primary-color-hover:hover,
  .single .learndash-wrapper .ld-primary-color,
  .single .learndash-wrapper .ld-primary-color-hover:hover,
  .single .learndash-wrapper .ld-primary-color,
  .single .learndash-wrapper .ld-tabs .ld-tabs-navigation .ld-tab.ld-active,
  .single .learndash-wrapper .ld-button.ld-button-transparent,
  .single .learndash-wrapper .ld-button.ld-button-reverse,
  .single .learndash-wrapper .ld-icon-certificate,
  .single .learndash-wrapper .ld-login-modal .ld-login-modal-login .ld-modal-heading,
  .single #wpProQuiz_user_content a,
  .single .learndash-wrapper .ld-item-list .ld-item-list-item a.ld-item-name:hover {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
.learndash-wrapper .ld-course-navigation .ld-lesson-item-preview a.ld-lesson-item-preview-heading:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
}
  .learndash-wrapper .ld-primary-background,
  .learndash-wrapper .ld-tabs .ld-tabs-navigation .ld-tab.ld-active:after {
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }

  .learndash-wrapper .ld-course-navigation .ld-lesson-item.ld-is-current-lesson .ld-status-incomplete {
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
  .learndash-wrapper .ld-loading::before {
    border-top:3px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }

  .learndash-wrapper .wpProQuiz_reviewDiv .wpProQuiz_reviewQuestion li.wpProQuiz_reviewQuestionTarget,
  .learndash-wrapper .ld-button:hover:not(.learndash-link-previous-incomplete):not(.ld-button-transparent),
  #learndash-tooltips .ld-tooltip:after,
  #learndash-tooltips .ld-tooltip,
  .learndash-wrapper .ld-primary-background,
  .learndash-wrapper .btn-join,
  .learndash-wrapper #btn-join,
  .learndash-wrapper .ld-button:not(.ld-js-register-account):not(.learndash-link-previous-incomplete):not(.ld-button-transparent),
  .learndash-wrapper .ld-expand-button,
  .learndash-wrapper .wpProQuiz_content .wpProQuiz_button,
  .learndash-wrapper .wpProQuiz_content .wpProQuiz_button2,
  .learndash-wrapper .wpProQuiz_content a#quiz_continue_link,
  .learndash-wrapper .ld-focus .ld-focus-sidebar .ld-course-navigation-heading,
  .learndash-wrapper .ld-focus .ld-focus-sidebar .ld-focus-sidebar-trigger,
  .learndash-wrapper .ld-focus-comments .form-submit #submit,
  .learndash-wrapper .ld-login-modal input[type='submit'],
  .learndash-wrapper .ld-login-modal .ld-login-modal-register,
  .learndash-wrapper .wpProQuiz_content .wpProQuiz_certificate a.btn-blue,
  .learndash-wrapper .ld-focus .ld-focus-header .ld-user-menu .ld-user-menu-items a,
  #wpProQuiz_user_content table.wp-list-table thead th,
  #wpProQuiz_overlay_close,
  .learndash-wrapper .ld-expand-button.ld-button-alternate .ld-icon {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
  .learndash-wrapper .ld-focus .ld-focus-header .ld-user-menu .ld-user-menu-items:before {
    border-bottom-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
  .learndash-wrapper .ld-button.ld-button-transparent:hover {
    background: transparent !important;
  }
  .learndash-wrapper .ld-focus .ld-focus-header .sfwd-mark-complete .learndash_mark_complete_button,
  .learndash-wrapper .ld-focus .ld-focus-header #sfwd-mark-complete #learndash_mark_complete_button,
  .learndash-wrapper .ld-button.ld-button-transparent,
  .learndash-wrapper .ld-button.ld-button-alternate,
  .learndash-wrapper .ld-expand-button.ld-button-alternate {
    background-color:transparent !important;
  }
  .learndash-wrapper .ld-focus-header .ld-user-menu .ld-user-menu-items a,
  .learndash-wrapper .ld-button.ld-button-reverse:hover,
  .learndash-wrapper .ld-alert-success .ld-alert-icon.ld-icon-certificate,
  .learndash-wrapper .ld-alert-warning .ld-button:not(.learndash-link-previous-incomplete),
  .learndash-wrapper .ld-primary-background.ld-status {
    color:white !important;
  }
  .learndash-wrapper .ld-status.ld-status-unlocked {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>20!important;
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  }
  .edubin-related-course.ld-related-course .widget-title:before{
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .edubin-related-course .single-maylike .cont h4:hover{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .edubin-related-course .single-maylike .cont ul li{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-single-course-1 .thum .edubin-course-price-1 span{
      background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      color: #fff;
    }
  <?php endif;?>
  .edubin-single-course-1 .course-content ul li>i{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .learndash-wrapper .ld-focus .ld-focus-sidebar .ld-course-navigation .ld-topic-list.ld-table-list .ld-table-list-item .ld-table-list-item-preview.ld-is-current-item{
       color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .ldx-plugin .learndash .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_questionList[data-type=single] .wpProQuiz_questionListItem label:focus-within, .ldx-plugin .learndash .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_questionList[data-type=single] .wpProQuiz_questionListItem label.is-selected, .ldx-plugin .learndash .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_questionList[data-type=multiple] .wpProQuiz_questionListItem label:focus-within, .ldx-plugin .learndash .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_questionList[data-type=multiple] .wpProQuiz_questionListItem label.is-selected{
    box-shadow: inset 0 0 0 2px <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .edubin-single-course-1 .course-content ul li> a:hover{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .edubin-single-course-1 .course-content .course-title a:hover{
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }

  <?php if ( get_theme_mod('primary_color') or get_theme_mod('secondary_color') ): ?>
        .single .learndash-wrapper .ld-expand-button:hover {
            color: #fff;
        }
  <?php endif;?>

  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-single-course-1 .thum .edubin-course-price-2 span{
      background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      color: #fff;
    }
  <?php endif;?>
    <?php if (get_theme_mod('primary_color')): ?>
        .single .learndash-wrapper .learndash_mark_complete_button, .learndash-wrapper #learndash_mark_complete_button{
          color: #fff;
    }
    .single .learndash-wrapper .sfwd-mark-complete::after, .single .learndash-wrapper #sfwd-mark-complete::after{
         color: #fff;
    }
    .single .learndash-wrapper .ld-login-modal .login-submit>input[type='submit']:hover{
         color: #fff;
    }
    <?php endif;?>
  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-single-course-1 .thum .edubin-course-price-3 span{
      background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      color: #fff;
    }
  <?php endif;?>
  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-single-course-2>.thum .edubin-course-price-4 span{
     background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
     color: #fff;
   }
 <?php endif;?>
 .edubin-single-course-2.ld-course .course-meta ul li a:hover{
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')) {?>
  .edubin-single-course-2.ld-course .see-more-btn a{
    color: #fff;
  }
  .edubin-single-course-2.ld-course .course-meta ul li{
    color: #fff;
  }
  .edubin-single-course-2.ld-course .course-meta ul li a{
    color: #fff;
  }
<?php }?>
.learndash-wrapper #quiz_continue_link,
.learndash-wrapper .ld-secondary-background,
.learndash-wrapper .learndash_mark_complete_button,
.learndash-wrapper #learndash_mark_complete_button,
.learndash-wrapper .ld-status-complete,
.learndash-wrapper .ld-alert-success .ld-button,
.learndash-wrapper .ld-alert-success .ld-alert-icon {
  background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
}

.learndash-wrapper .ld-secondary-color-hover:hover,
.learndash-wrapper .ld-secondary-color,
.learndash-wrapper .ld-focus .ld-focus-header .sfwd-mark-complete .learndash_mark_complete_button,
.learndash-wrapper .ld-focus .ld-focus-header #sfwd-mark-complete #learndash_mark_complete_button,
.learndash-wrapper .ld-focus .ld-focus-header .sfwd-mark-complete:after {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
}

.learndash-wrapper .ld-secondary-in-progress-icon {
  border-left-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  border-top-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
}

.learndash-wrapper .ld-alert-success {
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?> !important;
  background-color: transparent !important;
  color: #fff;
}
.edubin-related-course .single-maylike .image::before{
  background: linear-gradient(0deg, <?php echo esc_attr(get_theme_mod('tertiary_color')); ?> 0%, transparent 100%);
}

.edubin-related-course.ld-related-course .widget-title{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>
}
.widget.edubin-ld-widget span.learndash-profile-course-title a{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.edubin-single-course-1 .course-content .course-title a{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.learndash-wrapper .learndash_mark_complete_button, .learndash-wrapper #learndash_mark_complete_button{
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.learndash-wrapper .sfwd-mark-complete::after, .learndash-wrapper #sfwd-mark-complete::after{
   color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.checkout.learnpress.learnpress-page .learnpress>a{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.learndash-wrapper .ld-status-waiting {
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
<?php if (get_theme_mod('primary_color')) : ?>
.learndash-wrapper .ld-course-status.ld-course-status-not-enrolled .ld-status{
   color: #fff !important;
}
<?php endif;?>
.learndash-wrapper .ld-login-modal .login-submit>input[type='submit']:hover{
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?> !important;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.edubin-ld-course-list-items .ld_course_grid .btn-primary{
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.edubin-ld-course-list-items .ld_course_grid .btn-primary:hover, .edubin-ld-course-list-items .ld_course_grid .btn-primary:focus, .edubin-ld-course-list-items .ld_course_grid .btn-primary:active, .edubin-ld-course-list-items .ld_course_grid .btn-primary.active, .edubin-ld-course-list-items .ld_course_grid .open .dropdown-toggle.btn-primary{
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}

  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price.ribbon-enrolled{
      background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      color: #fff;
    }
  <?php endif;?>
    <?php if (get_theme_mod('primary_color')): ?>
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price.ribbon-enrolled:before{
      border-top: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      border-right: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    }
  <?php endif;?>
  <?php if (get_theme_mod('primary_color')): ?>
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price{
       background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
       color: #fff;
    }
  <?php endif;?>
    <?php if (get_theme_mod('primary_color')): ?>
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price:before {
      border-top: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      border-right: 4px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    } 
  <?php endif;?>
    .ld_course_grid .entry-title {
      color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
    }
    .ld_course_grid a:hover .entry-title {
      color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    }
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course a.btn-primary{
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
    }
    .edubin-ld-course-list-items .ld_course_grid .thumbnail.course a.btn-primary{
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
    }
<?php endif;?> /*// End learndash*/

<?php if (class_exists('Sensei_Main')): // Sensei ?>

    <?php if ( $sensei_layout_override): ?>

        .wp-block-sensei-lms-course-outline-lesson:not(.has-text-color), .entry-content .wp-block-sensei-lms-course-outline-lesson:not(.has-text-color), .sensei .entry-content .wp-block-sensei-lms-course-outline-lesson:not(.button):not(.has-text-color) {
            border-bottom: 1px solid #ededed;
        }
        .wp-block-sensei-lms-course-outline-lesson>span {
            padding: 15px 16px;
        }
    <?php endif;?>

 <?php if ( $sensei_archive_pagi_aligment): ?>
    body.sensei.page nav.sensei-pagination{
      text-align: <?php echo esc_attr($sensei_archive_pagi_aligment); ?>;
    }
  <?php endif;?>

    <?php if ( get_theme_mod('primary_color') or get_theme_mod('secondary_color')): ?>

        .sensei-pagination .page-numbers li .page-numbers.current{
            color: #fff;
        }
    <?php endif; ?>
<?php endif;?> /*// End Sensei*/

<?php if (function_exists('tutor')): // Tutor ?>

      <?php if ( $final_tutor_single_layout == '3' ): ?>
       .single-course-layout-03 .page-header{
          text-align: center;
        }
      <?php endif; //End learnpress header for layout 3  ?>


     <?php if ( $tutor_archive_pagi_aligment): ?>
        body.archive.post-type-archive-courses .tutor-pagination{
          justify-content: <?php echo esc_attr($tutor_archive_pagi_aligment); ?>;
        }
      <?php endif;?>

  <?php if ( $tutor_login_form_widget_align): ?>
    .edubin-tutor-login-form-after-widget-wrapper{
      text-align: <?php echo esc_attr($tutor_login_form_widget_align); ?>;
    }
  <?php endif;?>

  <?php if ( $tutor_hide_archive_text == false ): //hide archive: text?>
    .post-type-archive-courses .breadcrumbs .trail-items li:nth-child(2){
      display: none;
    }
    .tutor-course-hidden-archive-text{
        display: none;
    }
  <?php endif;?>

    <?php if ( get_theme_mod('primary_color') or get_theme_mod('secondary_color')): // ========= if enable tutor default theme color ============ ?>

    .tutor-dashboard .tutor-dashboard-left-menu .tutor-dashboard-permalinks li.active a{
        color: #fff;
    }
    .tutor-btn-outline-primary:hover, .tutor-btn-outline-primary:focus, .tutor-btn-outline-primary:active{
        color: #fff; 
    }
  <?php endif;?>

  <?php if (!$tutor_settings_color): // ========= enable for use tutor default color ============ ?>
  .tutor-quiz-header h2{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-quiz-header h5 a{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-quiz-header h5{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-quiz-single-wrap .question-text{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-quiz-header .tutor-quiz-meta li strong{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-course-filter-wrapper>div:first-child h4{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-price-preview-box .price {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tutor-sidebar-course-author span a > strong{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>!important;
  }
  .tutor-certificate-sidebar-course > h3{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>!important;
  }
  .tutor-sidebar-course-title{
     color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>!important;
  }
  .tutor-segment-title, .tutor-single-course-segment .tutor-segment-title {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-course-topics-contents .tutor-course-title h4 {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-course-lesson h5 a:hover {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tutor-full-width-course-top h4, .tutor-full-width-course-top h5, .tutor-full-width-course-top h6 {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-custom-list-style li:before {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tutor-option-field textarea:focus, .tutor-option-field input:not([type="submit"]):focus, .tutor-form-group textarea:focus, .tutor-form-group input:not([type="submit"]):focus {
    border-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .single_add_to_cart_button, a.tutor-button, .tutor-button {
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  a.tutor-button:hover, .tutor-button:hover{
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-lead-info-btn-group a.tutor-button, .tutor-lead-info-btn-group .tutor-course-complete-form-wrap button {
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  .single_add_to_cart_button.tutor-button-primary, .tutor-button.tutor-button-primary, .tutor-btn.tutor-button-primary{
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  .single_add_to_cart_button.tutor-button-primary:hover, .tutor-button.tutor-button-primary:hover, .tutor-btn.tutor-button-primary:hover{
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-button.tutor-success {
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
  }
  .tutor-button.tutor-success:hover {
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-lead-info-btn-group .tutor-button.tutor-success {
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  }
  .tutor-lead-info-btn-group .tutor-button.tutor-success:hover {
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-lead-info-btn-group .tutor-course-complete-form-wrap button:hover {
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-course-enrolled-review-wrap .write-course-review-link-btn {
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  .tutor-course-enrolled-review-wrap .write-course-review-link-btn:hover {
    background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  #tutor-lesson-sidebar-qa-tab-content .tutor-add-question-wrap button.tutor_ask_question_btn {
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  #tutor-lesson-sidebar-qa-tab-content .tutor-add-question-wrap button.tutor_ask_question_btn:hover {
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-button.tutor-danger {
    background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  }
  .tutor-button.tutor-danger:hover {
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  }
  .tutor-progress-bar .tutor-progress-filled {
    background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .tutor-progress-bar .tutor-progress-filled:after {
    border-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .tutor-course-tags a {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  <?php if (get_theme_mod('primary_color')): ?>
    .tutor-course-tags a:hover {
      color: #fff;
      border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    }
  <?php endif;?>
  .tutor-single-course-segment .course-benefits-title {
    color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .tutor-single-course-segment .course-benefits-title:before {
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tutor-single-course-sidebar .tutor-single-course-segment .tutor-segment-title {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-single-course-sidebar .tutor-single-course-segment .tutor-segment-title:before {
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  }
  .tutor-wrap nav.course-enrolled-nav ul li.active a {
    background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .tutor-wrap nav.course-enrolled-nav ul {
    background: #edf0f2;
  }
  .tutor-wrap nav.course-enrolled-nav ul li a {
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-announcement-title-wrap h3 {
    color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  }
  .tutor-single-course-meta ul li{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .tutor-single-course-meta ul li a{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
  }
  .single-instructor-wrap .instructor-name h3 a{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
 }
 .tutor-single-course-rating .tutor-single-rating-count{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-single-course-meta ul li.tutor-social-share button {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-single-course-meta ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-single-course-meta ul li.tutor-social-share button:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-single-course-meta.tutor-lead-meta ul li a {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-single-course-meta.tutor-lead-meta ul li a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-single-page-top-bar {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-single-page-top-bar .tutor-single-lesson-segment button.course-complete-button:hover {
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
  background: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
}
.tutor-tabs-btn-group a i {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-topics-in-single-lesson .tutor-topics-title h3 {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-topics-in-single-lesson .tutor-single-lesson-items a>i.tutor-icon-doubt {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-tabs-btn-group a {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-tabs-btn-group a:hover, .tutor-tabs-btn-group a:active {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
#tutor-lesson-sidebar-qa-tab-content .tutor-add-question-wrap h3 {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-next-previous-pagination-wrap a {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}

.tutor-topics-in-single-lesson .tutor-topics-title button{
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.edubin-tutor-col-8 .woocommerce-message a.button.wc-forward {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.edubin-tutor-col-8 .woocommerce-message a.button.wc-forward:hover {
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-price-preview-box .tutor-course-purchase-box button {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
.tutor-price-preview-box .tutor-course-purchase-box button:hover {
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: #fff;
}
<?php endif;?>
.tutor-course-enrolled-wrap p i, .tutor-course-enrolled-wrap p span {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
/*== Archive page*/
.tutor-course-loop-title h2 a {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-course-loop-title h2 a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-loop-price{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a::before {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-loop-header-meta .tutor-course-wishlist a {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-course-loop-header-meta .tutor-course-wishlist:hover {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-loop-author>div a{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-loop-author>div a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}

.tutor-course-loop-price>.price .tutor-loop-cart-btn-wrap a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color') || get_theme_mod('secondary_color')): ?>
    .tutor-pagination ul.tutor-pagination-numbers .page-numbers.current{
        color: #fff;
    }
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
  .tutor-pagination-wrap span.page-numbers.current {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color: #fff;
  }
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
  .tutor-pagination-wrap a:hover, .tutor-pagination a:hover {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    color: #fff;
  }
<?php endif;?>
.tutor-login-form-wrap input[type="password"]:focus, .tutor-login-form-wrap input[type="text"]:focus {
  border-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-login-form-wrap input[type="submit"] {
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
}
.tutor-login-form-wrap input[type="submit"]:hover {
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.tutor-form-group.tutor-reg-form-btn-wrap .tutor-button {
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
}
.tutor-form-group.tutor-reg-form-btn-wrap .tutor-button:hover {
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
/*== dashboard */
a.tutor-button.bordered-button, .tutor-button.bordered-button, a.tutor-btn.bordered-btn, .tutor-btn.bordered-btn {
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?> !important;;
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?> !important;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?> !important;
}
a.tutor-button.bordered-button:hover, .tutor-button.bordered-button:hover, a.tutor-btn.bordered-btn:hover, .tutor-btn.bordered-btn:hover {
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?> !important;;
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?> !important;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?> !important;
}
.tutor-dashboard-permalinks li.active a {
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
.tutor-dashboard-permalinks li a:hover{
  color: #fff;
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php endif;?>
<?php if (get_theme_mod('primary_color')): ?>
.tutor-dashboard-permalinks li.active a:hover{
  color: #fff;
  background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('secondary_color')): ?>
  .tutor-dashboard-permalinks li.tutor-dashboard-menu-index.active a:hover{
    color: #fff;
  }
<?php endif;?>
.tutor-dashboard-content-inner .tutor-course-metadata li span{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-view-certificate a{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-dashboard-content>h3 {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
body .tutor-dashboard-permalinks a {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-dashboard-info-table-wrap table.tutor-dashboard-info-table a{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
.tutor-dashboard-permalinks a:hover:before {
  color: #fff;
}
<?php endif;?>
.tutor-dashboard-permalinks a:before {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}

.tutor-dashboard-header .tutor-btn.bordered-btn{
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
#tutor-ask-question-form .tutor-form-group .tutor-button.tutor-success{
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
#tutor-ask-question-form .tutor-form-group .tutor-button.tutor-success:hover{
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.tutor-dashboard-info-cards .tutor-dashboard-info-card p {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-dashboard-inline-links ul li a:hover, .tutor-dashboard-inline-links ul li.active a {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  border-bottom-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-dashboard-inline-links ul li a {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-dashboard-content-inner h3 a {
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.tutor-mycourse-content h3 a:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-dashboard-review-title a {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-mycourse-edit i, .tutor-mycourse-delete i {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-modal-button-group button.tutor-danger {
  background: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-modal-button-group button.tutor-danger:hover {
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-modal-button-group button:hover {
  background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
button.tm-close.tutor-icon-line-cross:hover {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.tutor-mycourse-edit:hover, .tutor-mycourse-delete:hover {
  color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-dashboard-item-group>h4 {
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.report-top-sub-menu a.active {
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
  border-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.date-range-input button {
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
a.tutor-profile-photo-upload-btn, button.tutor-profile-photo-upload-btn {
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
a.tutor-profile-photo-upload-btn:hover, button.tutor-profile-photo-upload-btn:hover {
  background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.label-course-publish {
  background-color: <?php echo esc_attr(get_theme_mod('secondary_color')); ?>;
}
.quiz-attempts-title, .tutor-quiz-attempt-history-title{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.quiz-modal-btn-next, .quiz-modal-btn-next:focus, .quiz-modal-btn-first-step, .quiz-modal-btn-first-step:focus, .quiz-modal-question-save-btn, .quiz-modal-question-save-btn:focus, .quiz-modal-settings-save-btn, .quiz-modal-settings-save-btn:focus{
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.quiz-modal-btn-cancel, .quiz-modal-btn-back {
  border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
.quiz-modal-btn-cancel:hover, .quiz-modal-btn-back:hover {
  border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
  color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}

.tutor-course-builder-section-title h3::after{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-builder-section-title h3 i {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-builder-upload-tips .tutor-course-builder-tips-title i {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-builder-upload-tips .tutor-course-builder-tips-title{
    color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
.settings-tabs-navs-wrap .settings-tabs-navs li.active a {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-sidebar-filter .single-filter label:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-col .tutor-course-body h3 a:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-course-col .tutor-course .tutor-course-loop-level{
   background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-sidebar-filter .single-filter label input:checked+.filter-checkbox{
    border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.tutor-sidebar-filter .single-filter label:hover input+.filter-checkbox{
   border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php if (get_theme_mod('primary_color')): ?>
  .page-numbers.current{
      border-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
      color: #fff;
  }
<?php endif;?>
.tutor-certificate-sidebar-btn-container>div .bordered-btn{
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}

<?php endif; // End enable for use tutor default color ============ ?> 

<?php endif;?> /*// End Tutor*/

 <?php  if (class_exists('Video_Conferencing_With_Zoom') ) : ?>
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-tile{
        background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-timer .dpn-zvc-timer-cell{
       background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-box .join-links .btn-join-link{
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-box .join-links .btn-join-link:hover{
      border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-box .join-links .btn-start-link{
      border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-box .join-links .btn-start-link:hover{
      border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
      color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-content .dpn-zvc-sidebar-content-list>span>strong{
        color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .deepn-zvc-single-description h3{
      color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
     .dpn-zvc-display-or-hide-localtimezone-notice>strong{
      color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
     .dpn-zvc-single-content-wrapper .dpn-zvc-sidebar-wrapper .dpn-zvc-sidebar-state > a.vczapi-meeting-state-change{
      color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
     .edubin-meeting-single-title a{
       color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
     .edubin-meeting-single-content .vczapi-list-zoom-meetings--item__details__meta .meta>strong{
       color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
     }
<?php endif; ?>

<?php if (class_exists('bbPress')): //bbPress ?>
#bbpress-forums li.bbp-header {
    background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#bbpress-forums li.bbp-footer {
     background: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
div.bbp-template-notice a {
    color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#bbpress-forums fieldset.bbp-form legend {
    border: 1px solid <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#bbp-search-form input#bbp_search_submit {
    background-color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#bbp-search-form input#bbp_search_submit {
    border-color: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    background: <?php echo esc_attr(get_theme_mod('btn_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_color')); ?>;
}
#bbp-search-form:hover input#bbp_search_submit {
    background-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('btn_hover_color')); ?>;
    color: <?php echo esc_attr(get_theme_mod('btn_text_hover_color')); ?>;
}
.bbp-topic-permalink{
  color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#bbpress-forums p.bbp-topic-meta span{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#bbpress-forums p.bbp-topic-meta a:hover span{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
.bbp-topic-freshness a{
 color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#bbpress-forums #bbp-single-user-details #bbp-user-navigation a{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
#bbpress-forums div.bbp-reply-author .bbp-author-name{
   color: <?php echo esc_attr(get_theme_mod('tertiary_color')); ?>;
}
#bbpress-forums div.bbp-reply-author .bbp-author-name:hover{
   color: <?php echo esc_attr(get_theme_mod('primary_color')); ?>;
}
<?php endif; ?>
</style>

<?php }

add_action('wp_head', 'edubin_customizer_theme_style');

endif;