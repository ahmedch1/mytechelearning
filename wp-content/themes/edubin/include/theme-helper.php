<?php
// =============
// edubin_admin_notice_old_core_plugin 
// ==============

if (class_exists('Edubin_Shortcode_Social')):
        $get_lp_plugin_dir = WP_PLUGIN_DIR . '/edubin-core/edubin-core.php';
        $lp_plugin_version_number = get_plugin_data($get_lp_plugin_dir);

        if ( $lp_plugin_version_number['Version'] < '8.13.27'):

        function edubin_admin_notice_old_core_plugin() {
            ?>
            <div class="notice notice notice-error is-dismissible">
                <h2 style=" color: #d63638;"><?php _e( "New version is available. Please update edubin core plugin to get the latest theme features.", 'edubin' ); ?> <a href="<?php echo admin_url( 'admin.php?page=edubin-required-plugins&plugin_status=update' ); ?>"><?php _e( 'Click here to update', 'edubin' ); ?></a></h2>
               
            </div>
            <?php
        }
        add_action( 'admin_notices', 'edubin_admin_notice_old_core_plugin' );

        endif;

endif;


// =============
// Edubin_Theme_Helper 
// ==============

if (!class_exists('Edubin_Theme_Helper')) {
    /**
     * Edubin Theme Helper
     *
     */
    class Edubin_Theme_Helper
    {
        private static $instance;

        public static function get_instance()
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * @link https://github.com/opensolutions/smarty/blob/master/plugins/modifier.truncate.php
         */
        public static function modifier_character(
            $string,
            $length = 80,
            $etc = '... ',
            $break_words = false
        ) {
            if (0 == $length) {
                return '';
            }

            if (mb_strlen($string, 'utf8') > $length) {
                if (!$break_words) {
                    $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
                }

                return mb_substr($string, 0, $length, 'utf8') . $etc;
            } else {
                return $string;
            }
        }

        public static function render_html($args)
        {
            return $args ?? '';
        }

    }

    new Edubin_Theme_Helper();
}
