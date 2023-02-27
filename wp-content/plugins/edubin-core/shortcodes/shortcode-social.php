<?php
/**
 *
 * Social Shortcode
 *
 */


class Edubin_Shortcode_Social {


    /**
     *
     * Shortcode Name
     * @var string
     */

    private $name = 'edubin-social';


    /**
     * Instance of class
     */
    private static $instance;

    /**
     * Initialization
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    private function __construct() {

        add_shortcode( $this->name, array( $this, 'create_social_box_shortcode' ) );
    }


    /**
     * Shortcode Function
     *
     * @param $atts
     * @return string

      Example: [edubin-social facebook-link="https://fb.com" twitter-link="http://twittter.com/" youtube-link="https://www.youtube.com/" instagram-link="https://www.instagram.com/"]
      
     */


    public function create_social_box_shortcode( $atts ) {

        ob_start();

        $default = array(
            'facebook-link' => '',
            'twitter-link' => '',
            'youtube-link' => '',
            'instagram-link' => '',
            'linkedin-link' => '',
            'behance-link' => '',
            'bitbucket-link' => '',
            'dribbble-link' => '',
            'github-link' => '',
            'medium-link' => '',
            'slack-link' => '',
            'snapchat-link' => '',
            'soundcloud-link' => '',
            'overflowing-link' => '',
            'tumblr-link' => '',
            'vimeo-link' => '',
            'whatsapp-link' => '',
            'telegram-link' => '',
        );

        $social = shortcode_atts( $default, $atts );


        ?>
            <div class="edubin-social">
            <?php if ($social['facebook-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['facebook-link']); ?>" title="Facebook" target="_blank">
                    <i class="glyph-icon flaticon-facebook"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['twitter-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['twitter-link']); ?>" title="Twitter" target="_blank">
                    <i class="glyph-icon flaticon-twitter"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['youtube-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['youtube-link']); ?>" title="Youtube" target="_blank">
                    <i class="glyph-icon flaticon-youtube-logotype"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['instagram-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['instagram-link']); ?>" title="Instagram" target="_blank">
                    <i class="glyph-icon flaticon-instagram-1"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['linkedin-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['linkedin-link']); ?>" title="Linkedin" target="_blank">
                    <i class="glyph-icon flaticon-linkedin"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['behance-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['behance-link']); ?>" title="Behance" target="_blank">
                    <i class="glyph-icon flaticon-behance"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['bitbucket-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['bitbucket-link']); ?>" title="Bitbucket" target="_blank">
                    <i class="glyph-icon flaticon-bitbucket"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['dribbble-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['dribbble-link']); ?>" title="dribbble" target="_blank">
                    <i class="glyph-icon flaticon-dribbble-logo"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['github-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['github-link']); ?>" title="github" target="_blank">
                    <i class="glyph-icon flaticon-github"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['medium-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['medium-link']); ?>" title="medium" target="_blank">
                    <i class="glyph-icon flaticon-medium-size"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['slack-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['slack-link']); ?>" title="slack" target="_blank">
                    <i class="glyph-icon flaticon-slack"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['snapchat-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['snapchat-link']); ?>" title="snapchat" target="_blank">
                    <i class="glyph-icon flaticon-snapchat"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['soundcloud-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['soundcloud-link']); ?>" title="soundcloud" target="_blank">
                    <i class="glyph-icon flaticon-soundcloud"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['overflowing-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['overflowing-link']); ?>" title="overflowing" target="_blank">
                    <i class="glyph-icon flaticon-stack-overflow"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['tumblr-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['tumblr-link']); ?>" title="tumblr" target="_blank">
                    <i class="glyph-icon flaticon-tumblr"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['vimeo-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['vimeo-link']); ?>" title="vimeo" target="_blank">
                    <i class="glyph-icon flaticon-vimeo"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['whatsapp-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['whatsapp-link']); ?>" title="whatsapp" target="_blank">
                    <i class="glyph-icon flaticon-whatsapp"></i>
                </a>
            <?php endif; ?>
            <?php if ($social['telegram-link']) : ?>
                <a class="edubin-social-icon" href="<?php echo esc_url($social['telegram-link']); ?>" title="Telegram" target="_blank">
                    <i class="glyph-icon flaticon-send"></i>
                </a>
            <?php endif; ?>
            </div>


    <?php
        $output = ob_get_clean();

        return $output;

    }


}