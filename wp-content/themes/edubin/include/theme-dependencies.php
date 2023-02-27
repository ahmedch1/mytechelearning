<?php

defined("ABSPATH") || exit();

if (!class_exists("Edubin_Theme_Dependencies")) {
    /**
     * Require all the theme necessary files.
     */
    class Edubin_Theme_Dependencies
    {
        public function __construct()
        {
            self::include_theme_essential_files();
            self::include_plugins_configurations();
        }

        public static function include_theme_essential_files()
        {
            

            /** Theme Globals Functions */
            require_once get_theme_file_path(
                "/include/theme-global-functions.php"
            );

            /** Theme helper functions */
            require_once get_template_directory() . "/include/theme-helper.php";

            /** Multiple LMS error warning  */
            require_once get_template_directory() . "/include/multiple-lms-error.php";

            /** Custom template tags for this theme. */
            require_once get_parent_theme_file_path(
                "/include/template-tags.php"
            );

            /** Additional features to allow styling of the templates */
            require_once get_template_directory() .
                "/include/template-functions.php";

            /** Image Class */
            require_once get_parent_theme_file_path("/include/class-image.php");

            /** SVG icons functions and filters */
            require_once get_parent_theme_file_path(
                "/include/icon-functions.php"
            );

            /** Widgets */
            require_once get_parent_theme_file_path(
                "/include/theme-widgets.php"
            );

            /** Breadcrumb */
            require_once get_parent_theme_file_path(
                "/template-parts/header/breadcrumb.php"
            );

            /** Edubin customizer options */
            require_once get_theme_file_path("admin/customizer.php");

            /** Custom theme Style */
            if (
                file_exists(
                    get_template_directory() . "/admin/custom-styles.php"
                )
            ) {
                require_once get_template_directory() .
                    "/admin/custom-styles.php";
            }
            /** One click demo import */
            require_once get_theme_file_path("admin/edubin-demo-import.php");

            /** Dynamic styles */
            require_once get_theme_file_path("/include/dynamic-styles.php");

            /** Styles override */
            require_once get_theme_file_path("/include/styles-override.php");
        }

        public static function include_plugins_configurations()
        {
            /**
             * WooCommerce.
             */

            if (class_exists("WooCommerce")) {
                require_once get_parent_theme_file_path(
                    "/include/wc-init.php"
                );
            }
            /**
             * LearnPress.
             */
            if (class_exists("LearnPress")) {
                require_once get_parent_theme_file_path(
                    "/include/lp-init.php"
                );
            }
            /**
             * LearnDash.
             */
            if (class_exists("SFWD_LMS")) {
                require_once get_parent_theme_file_path(
                    "/include/ld-init.php"
                );
            }
            /**
             * Tutor.
             */
            if (function_exists("tutor")) {
                require_once get_parent_theme_file_path("/include/tutor-init.php");
            }
            /**
             * Sensei.
             */
            if (function_exists("Sensei")) {
                require_once get_parent_theme_file_path("/include/sensei-init.php");
            }
            /**
             * The Events Calendar.
             */
            if (class_exists("Tribe__Events__Main")) {
                require_once get_parent_theme_file_path(
                    "/include/events-calendar.php"
                );
            }
        }
    }

    new Edubin_Theme_Dependencies();
}
