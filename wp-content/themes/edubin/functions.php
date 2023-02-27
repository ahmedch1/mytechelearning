<?php
/**
 *
 * Edubin functions and definitions
 * @package Edubin
 *
 */

define('EDUBIN_DIR', trailingslashit(get_template_directory()));
define('EDUBIN_URI', trailingslashit(get_template_directory_uri()));
define('EDUBIN_THEME_VERSION', '8.13.27');

/**
 * Edubin only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
    require get_template_directory() . '/include/back-compat.php';
    return;
}

/**
 * Load Theme Dependencies
 */
require_once get_theme_file_path('/include/theme-dependencies.php');

add_action('wp_head','mytechelearning_add_googleanalytics');
function mytechelearning_add_googleanalytics(){?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z841MBMWGZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z841MBMWGZ');
</script>
<?php }


