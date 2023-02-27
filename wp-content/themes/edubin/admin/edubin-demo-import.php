<?php

class EdubinEnvatoApi
{
    // Bearer, no need for OAUTH token, change this to your bearer string
    // https://build.envato.com/api/#token

    private static $bearer = "uYJt07Y0Wz9Eum0mX3hsUJtTotYhU"."v"."e"."y"; //

    public static function getPurchaseData($code)
    {

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . self::$bearer;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' .$bearer;

        $verify_url = 'https://api.envato.com/v3/market/author/sale/';
        $ch_verify  = curl_init($verify_url . '?code=' . $code);

        curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec($ch_verify);
        curl_close($ch_verify);

        if ( $cinit_verify_data != "" ) {
            return json_decode($cinit_verify_data);
        } else {
            return false;
        }

    }

    public static function verifyPurchase($code)
    {
        $verify_obj = self::getPurchaseData($code);

        // Check for correct verify code
        if (
            (false === $verify_obj) ||
            !is_object($verify_obj) ||
            isset($verify_obj->error) ||
            !isset($verify_obj->sold_at)
        ) {
            return -1;
        }

        // If empty or date present, then it's valid
        if (
            $verify_obj->supported_until == "" ||
            $verify_obj->supported_until != null
        ) {
            return $verify_obj;
        }

        // Null or something non-string value, thus support period over
        return 0;

    }
}

function edubin_check_tvc()
{
    return true;
    
    $theme_fv_code = get_option('edubin_tv_option');
    $obj_get_id = EdubinEnvatoApi::verifyPurchase($theme_fv_code);
    
    if (is_object($obj_get_id)) {
        $tid = $obj_get_id->item->id;
    }
     else{
        $tid = '';
    }
    if (isset($theme_fv_code) && strlen($theme_fv_code) == '36' && $tid == '24037792') {
        $purchase_code = htmlspecialchars($theme_fv_code);
        $obj = EdubinEnvatoApi::verifyPurchase($theme_fv_code);
        if (is_object($obj)) {
            return true;
        }
    }
}

function edubin_import_files()
{
    return array(
        array(
            'import_file_name'             => 'Home v1 to 6 (LearnPress)',
            'categories'                   => array('LearnPress', 'University'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-home-v1-6.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style="color:#ec5761">LearnPress</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home v1 to 6 (Tutor)',
            'categories'                   => array('Tutor', 'University'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-home-v1-6.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/tutor/',
            'import_notice'                => __("- Don't activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style='color:#ec5761'>Tutor</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>", 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home v1 to 6 (LearnDash)',
            'categories'                   => array('LearnDash', 'University'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-home-v1-6.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/learndash/',
            'import_notice'                => __('<a target="_blank" class="button edubin-ld-video-link" href="https://youtu.be/_qg0igPtPF8">LearnDash Installation Guide</a> <br> <br> - Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">LearnDash</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),

        array(
            'import_file_name'             => 'Home v1 to 6 (Sensei)',
            'categories'                   => array('Sensei', 'University'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/sensei-home-v1-6.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/sensei/',
            'import_notice'                => __('Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">Sensei</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),

        array(
            'import_file_name'             => 'Home v7 (LearnPress)',
            'categories'                   => array('LearnPress'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-red/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-red/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-red/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-home-v7.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/learnpress-red/home-v7/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style="color:#ec5761">LearnPress</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home v7 (Tutor)',
            'categories'                   => array('Tutor'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-red/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-red/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-red/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-home-v7.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/tutor-red/home-v7/',
            'import_notice'                => __("- Don't activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style='color:#ec5761'>Tutor</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>", 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home v7 (LearnDash)',
            'categories'                   => array('LearnDash'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-red/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-red/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-red/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-home-v7.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/learndash-red/home-v7/',
            'import_notice'                => __('<a target="_blank" class="button edubin-ld-video-link" href="https://youtu.be/_qg0igPtPF8">LearnDash Installation Guide</a> <br> <br>- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">LearnDash</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),

        array(
            'import_file_name'             => 'Home v7 (Sensei)',
            'categories'                   => array('Sensei'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei-red/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei-red/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/sensei-red/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/sensei-home-v7.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/sensei-red/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">Sensei</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),

        array(
            'import_file_name'             => 'Cooking/Recipe (LearnPress)',
            'categories'                   => array('LearnPress', 'Cooking/Recipe'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-green/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-green/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp-green/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-cooking-recipe.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/lp-green/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style="color:#ec5761">LearnPress</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Cooking/Recipe (Tutor)',
            'categories'                   => array('Tutor' ,'Cooking/Recipe'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-green/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-green/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor-green/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-cooking-recipe.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/tutor-green/',
            'import_notice'                => __("- Don't activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style='color:#ec5761'>Tutor</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>", 'edubin'),
        ),
        array(
            'import_file_name'             => 'Cooking/Recipe (LearnDash)',
            'categories'                   => array('LearnDash', 'Cooking/Recipe'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-green/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-green/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld-green/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-cooking-recipe.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/ld-green/',
            'import_notice'                => __('<a target="_blank" class="button edubin-ld-video-link" href="https://youtu.be/_qg0igPtPF8">LearnDash Installation Guide</a> <br> <br>- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">LearnDash</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Classic LMS (LearnPress)',
            'categories'                   => array('LearnPress'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-classic-lms.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/lp-home-classic-lms/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style="color:#ec5761">LearnPress</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Classic LMS (Tutor)',
            'categories'                   => array('Tutor'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-classic-lms.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/tutor',
            'import_notice'                => __("- Don't activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style='color:#ec5761'>Tutor</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>", 'edubin'),
        ),
        array(
            'import_file_name'             => 'Classic LMS (LearnDash)',
            'categories'                   => array('LearnDash'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-classic-lms.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/learndash/',
            'import_notice'                => __('<a target="_blank" class="button edubin-ld-video-link" href="https://youtu.be/_qg0igPtPF8">LearnDash Installation Guide</a> <br> <br> - Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">LearnDash</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home - Coach/Instructor (LearnPress)',
            'categories'                   => array('LearnPress', 'Coach/Instructor'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/lp/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-instructor.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/home-coach-instructor-learnpress/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style="color:#ec5761">LearnPress</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home - Coach/Instructor (Tutor)',
            'categories'                   => array('Tutor', 'Coach/Instructor'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/tutor/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-instructor.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/tutor/home-coach-instructor-tutor/',
            'import_notice'                => __("- Don't activate more than one LMS plugin at the same site. By importing it you will get the site dummy with <span style='color:#ec5761'>Tutor</span> LMS content. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>", 'edubin'),
        ),
        array(
            'import_file_name'             => 'Home – Coach/Instructor (LearnDash)',
            'categories'                   => array('LearnDash', 'Coach/Instructor'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/ld/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-instructor.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/learndash/home-coach-instructor-learndash/',
            'import_notice'                => __('<a target="_blank" class="button edubin-ld-video-link" href="https://youtu.be/_qg0igPtPF8">LearnDash Installation Guide</a> <br> <br> - Don\'t activate more than one LMS plugin at the same site. By importing it you will get the <span style="color:#ec5761">LearnDash</span> LMS dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'Kids/School',
            'categories'                   => array('Kids/School'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/school/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/school/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/school/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/school.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/school/',
            'import_notice'                => __('- By importing it you will get the <span style="color:#ec5761">Kids/School</span> dummy. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),
        array(
            'import_file_name'             => 'RTL Language',
            'categories'                   => array('RTL Language'),
            'import_file_url'            => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/rtl/content.xml',
            'import_widget_file_url'     => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/rtl/widget_data.wie',
            'import_customizer_file_url' => 'https://thepixelcurve.com/envato/tf/edubin/demo_data/rtl/customizer.dat',
            'import_preview_image_url'     => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/rtl.jpg',
            'preview_url'                  => 'https://thepixelcurve.com/wp/edubin/rtl/',
            'import_notice'                => __('- Don\'t activate more than one LMS plugin at the same site. By importing it you will get <span style="color:#ec5761">RTL ready with LearnPress LMS</span> dummy. If you want to use RTL with LearnDash or Tutor LMS plugin. Please deactivate all other LMS plugins on your site, reset your site permalink then activate your LearnDash or Tutor LMS plugin. <br> <p>- Images do not include in demo import. If you want to use images from demo content, you should check the license for every image.</p>', 'edubin'),
        ),

    );
}

function edubin_import_flies()
{
    return array(
        array(
            'import_file_name'         => 'Home v1 to 6 (LearnPress)',
            'categories'               => array('LearnPress'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-home-v1-6.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/',
        ),
        array(
            'import_file_name'         => 'Home v1 to 6 (Tutor)',
            'categories'               => array('Tutor'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-home-v1-6.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/tutor',
        ),
        array(
            'import_file_name'         => 'Home v1 to 6 (LearnDash)',
            'categories'               => array('LearnDash'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-home-v1-6.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/learndash/',

        ),
        array(
            'import_file_name'         => 'Home v1 to 6 (Sensei)',
            'categories'               => array('Sensei'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/sensei-home-v1-6.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/sensei/',

        ),
        array(
            'import_file_name'         => 'Home v7 (LearnPress)',
            'categories'               => array('LearnPress'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-home-v7.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/learnpress-red/home-v7/',

        ),
        array(
            'import_file_name'         => 'Home v7 (Tutor)',
            'categories'               => array('Tutor'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-home-v7.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/tutor-red/home-v7/',
        ),
        array(
            'import_file_name'         => 'Home v7 (LearnDash)',
            'categories'               => array('LearnDash'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-home-v7.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/learndash-red/home-v7/',
        ),

        array(
            'import_file_name'         => 'Home v7 (Sensei)',
            'categories'               => array('Sensei'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/sensei-home-v7.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/sensei-red/home-v7/',
        ),

        array(
            'import_file_name'         => 'Cooking/Recipe (LearnPress)',
            'categories'               => array('LearnPress'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-cooking-recipe.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/lp-green/',

        ),
        array(
            'import_file_name'         => 'Cooking/Recipe (Tutor)',
            'categories'               => array('Tutor'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-cooking-recipe.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/tutor-green/',
        ),
        array(
            'import_file_name'         => 'Cooking/Recipe (LearnDash)',
            'categories'               => array('LearnDash'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-cooking-recipe.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/ld-green',
        ),

        array(
            'import_file_name'         => 'Classic LMS (LearnPress)',
            'categories'               => array('LearnPress'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-classic-lms.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/lp-home-classic-lms/',

        ),
        array(
            'import_file_name'         => 'Classic LMS (Tutor)',
            'categories'               => array('Tutor'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-classic-lms.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/tutor/tutor-home-classic-lms/',
        ),
        array(
            'import_file_name'         => 'Classic LMS (LearnDash)',
            'categories'               => array('LearnDash'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-classic-lms.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/learndash/ld-home-classic-lms/',
        ),

        array(
            'import_file_name'         => 'Home - Coach/Instructor (LearnPress)',
            'categories'               => array('LearnPress'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/lp-instructor.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/lp-home-classic-lms/',

        ),
        array(
            'import_file_name'         => 'Home - Coach/Instructor (Tutor)',
            'categories'               => array('Tutor'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/tutor-instructor.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/tutor/home-coach-instructor-tutor/',
        ),
        array(
            'import_file_name'         => 'Home – Coach/Instructor (LearnDash)',
            'categories'               => array('LearnDash'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/ld-instructor.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/learndash/home-coach-instructor-learndash/',
        ),

        array(
            'import_file_name'         => 'Kids/School',
            'categories'               => array('Kids/School'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/school.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/school/',
        ),
        array(
            'import_file_name'         => 'RTL Language',
            'categories'               => array('RTL Language'),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'admin/demo/images/rtl.jpg',
            'preview_url'              => 'https://thepixelcurve.com/wp/edubin/rtl/',
        ),

    );
}

function edubin_dialog_options($options)
{
    return array_merge($options, array(
        'width'       => 300,
        'dialogClass' => 'wp-dialog',
        'resizable'   => false,
        'height'      => 'auto',
        'modal'       => true,
    ));
}
add_filter('pt-ocdi/confirmation_dialog_options', 'edubin_dialog_options', 10, 1);
add_filter('pt-ocdi/disable_pt_branding', '__return_true');

function edubin_after_import_setup($selected_import)
{
    // Assign menus to their locations.
    $main_menu   = get_term_by('name', 'Primary', 'nav_menu');
    $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'primary'     => $main_menu->term_id,
        'footer_menu' => $footer_menu->term_id,
    )
    );
    // LearnPress LMS
    if ('Home v1 to 6 (LearnPress)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home v7 (LearnPress)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home v7');
    } elseif ('Cooking/Recipe (LearnPress)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Cooking/Recipe');
    } elseif ('Classic LMS (LearnPress)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('lp-home-classic-lms');
    } elseif ('Home - Coach/Instructor (LearnPress)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('home-coach-instructor-learnpress');
    }
    // Tutor LMS
    elseif ('Home v1 to 6 (Tutor)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home v7 (Tutor)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home v7');
    } elseif ('Cooking/Recipe (Tutor)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Cooking/Recipe');
    }elseif ('Classic LMS (Tutor)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('tutor-home-classic-lms');
    }elseif ('Home - Coach/Instructor (Tutor)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('home-coach-instructor-tutor');
    }
    // LearnDash LMS
    elseif ('Home v1 to 6 (LearnDash)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home v7 (LearnDash)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home v7');
    } elseif ('Cooking/Recipe (LearnDash)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Cooking/Recipe');
    }elseif ('Classic LMS (LearnDash)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('ld-home-classic-lms');
    }elseif ('Home – Coach/Instructor (LearnDash)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('home-coach-instructor-learndash');
    }
    // Sensei LMS
    elseif ('Home v1 to 6 (Sensei)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home v7 (Sensei)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home v7');
    } elseif ('Cooking/Recipe (Sensei)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Cooking/Recipe');
    }elseif ('Classic LMS (Sensei)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('sensei-home-classic-lms');
    }elseif ('Home – Coach/Instructor (Sensei)' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_path('home-coach-instructor-sensei');
    }
    // RTL Languages
    elseif ('Kids/School' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('School');
    }
    // RTL Languages
    elseif ('RTL Language' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    }

    $blog_page_id = get_page_by_title('Blog');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

    // Reset site permalink
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');

}
add_action('pt-ocdi/after_import', 'edubin_after_import_setup');

if (edubin_check_tvc()) {
    $edubin_tvfi = "edubin_import_files";
} else {
    $edubin_tvfi = "edubin_import_flies";
}

add_filter('pt-ocdi/import_files', $edubin_tvfi);

function ocdi_before_content_import($selected_import)
{
    // Customizer reset
    delete_option('theme_mods_' . get_option('stylesheet'));
    // Old style.
    $theme_name = get_option('current_theme');
    if (false === $theme_name) {
        $theme_name = wp_get_theme()->get('edubin');
    }
    delete_option('mods_' . $theme_name);

    // Activate/Deactivate plugins
    // Check LearnPress LMS
    if ('Home v1 to 6 (LearnPress)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress/learnpress.php')) {
            activate_plugin('/learnpress/learnpress.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress-course-review/learnpress-course-review.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress-course-review/learnpress-course-review.php')) {
            activate_plugin('/learnpress-course-review/learnpress-course-review.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');

    } elseif ('Home v7 (LearnPress)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress/learnpress.php')) {
            activate_plugin('/learnpress/learnpress.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress-course-review/learnpress-course-review.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress-course-review/learnpress-course-review.php')) {
            activate_plugin('/learnpress-course-review/learnpress-course-review.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }
    elseif ('Cooking/Recipe (LearnPress)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress/learnpress.php')) {
            activate_plugin('/learnpress/learnpress.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress-course-review/learnpress-course-review.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress-course-review/learnpress-course-review.php')) {
            activate_plugin('/learnpress-course-review/learnpress-course-review.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    elseif ('Classic LMS (LearnPress)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress/learnpress.php')) {
            activate_plugin('/learnpress/learnpress.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress-course-review/learnpress-course-review.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress-course-review/learnpress-course-review.php')) {
            activate_plugin('/learnpress-course-review/learnpress-course-review.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    elseif ('Home - Coach/Instructor (LearnPress)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress/learnpress.php')) {
            activate_plugin('/learnpress/learnpress.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/learnpress-course-review/learnpress-course-review.php';
        if (file_exists($plugin_file) && !is_plugin_active('learnpress-course-review/learnpress-course-review.php')) {
            activate_plugin('/learnpress-course-review/learnpress-course-review.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    // Check Tutor LMS
    elseif ('Home v1 to 6 (Tutor)' === $selected_import['import_file_name']) {
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor/tutor.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor/tutor.php')) {
            activate_plugin('/tutor/tutor.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor-pro/tutor-pro.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor-pro/tutor-pro.php')) {
            activate_plugin('/tutor-pro/tutor-pro.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');

    } elseif ('Home v7 (Tutor)' === $selected_import['import_file_name']) {
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor/tutor.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor/tutor.php')) {
            activate_plugin('/tutor/tutor.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor-pro/tutor-pro.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor-pro/tutor-pro.php')) {
            activate_plugin('/tutor-pro/tutor-pro.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }
    elseif ('Cooking/Recipe (Tutor)' === $selected_import['import_file_name']) {
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor/tutor.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor/tutor.php')) {
            activate_plugin('/tutor/tutor.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor-pro/tutor-pro.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor-pro/tutor-pro.php')) {
            activate_plugin('/tutor-pro/tutor-pro.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    elseif ('Classic LMS (Tutor)' === $selected_import['import_file_name']) {
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor/tutor.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor/tutor.php')) {
            activate_plugin('/tutor/tutor.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor-pro/tutor-pro.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor-pro/tutor-pro.php')) {
            activate_plugin('/tutor-pro/tutor-pro.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    elseif ('Home - Coach/Instructor (Tutor)' === $selected_import['import_file_name']) {
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor/tutor.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor/tutor.php')) {
            activate_plugin('/tutor/tutor.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/tutor-pro/tutor-pro.php';
        if (file_exists($plugin_file) && !is_plugin_active('tutor-pro/tutor-pro.php')) {
            activate_plugin('/tutor-pro/tutor-pro.php');
        }
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    // Check LearnDash LMS
    elseif ('Home v1 to 6 (LearnDash)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sfwd-lms/sfwd_lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sfwd-lms/sfwd_lms.php')) {
            activate_plugin('/sfwd-lms/sfwd_lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    } 
    elseif ('Home v7 (LearnDash)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sfwd-lms/sfwd_lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sfwd-lms/sfwd_lms.php')) {
            activate_plugin('/sfwd-lms/sfwd_lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }
    // Check LearnDash LMS
    elseif ('Home v1 to 6 (Sensei)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sensei-lms/sensei-lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sensei-lms/sensei-lms.php')) {
            activate_plugin('/sensei-lms/sensei-lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    } 
    elseif ('Home v7 (Sensei)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sensei-lms/sensei-lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sensei-lms/sensei-lms.php')) {
            activate_plugin('/sensei-lms/sensei-lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }
    elseif ('Cooking/Recipe (LearnDash)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sfwd-lms/sfwd_lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sfwd-lms/sfwd_lms.php')) {
            activate_plugin('/sfwd-lms/sfwd_lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }
    elseif ('Classic LMS (LearnDash)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sfwd-lms/sfwd_lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sfwd-lms/sfwd_lms.php')) {
            activate_plugin('/sfwd-lms/sfwd_lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    elseif ('Home – Coach/Instructor (LearnDash)' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }
        $plugin_file = WP_PLUGIN_DIR . '/sfwd-lms/sfwd_lms.php';
        if (file_exists($plugin_file) && !is_plugin_active('sfwd-lms/sfwd_lms.php')) {
            activate_plugin('/sfwd-lms/sfwd_lms.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

    // Check Kids/School
    elseif ('Kids/School' === $selected_import['import_file_name']) {
        if (function_exists('tutor')) {
            deactivate_plugins('/tutor/tutor.php');
        }
        if (function_exists('tutor_pro')) {
            deactivate_plugins('/tutor-pro/tutor-pro.php');
        }
        if (class_exists('SFWD_LMS')) {
            deactivate_plugins('/sfwd-lms/sfwd_lms.php');
        }
        if (class_exists('Sensei_Main' )) {
            deactivate_plugins('/sensei-lms/sensei-lms.php');
        }
        if (class_exists('LearnPress')) {
            deactivate_plugins('/learnpress/learnpress.php');
        }
        if (class_exists('LP_Addon_Course_Review_Preload')) {
            deactivate_plugins('/learnpress-course-review/learnpress-course-review.php');
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
    }

}
add_action('pt-ocdi/before_content_import', 'ocdi_before_content_import');

