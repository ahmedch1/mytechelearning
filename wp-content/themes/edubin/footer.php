<?php

/**
 * The template for displaying the footer
 * @package Edubin
 * Version: 1.0.0
 */
    $post_id = edubin_get_id();
    $prefix = '_edubin_';

    $defaults = edubin_generate_defaults();
    $copyright_show = get_theme_mod( 'copyright_show', $defaults['copyright_show']);
    $back_to_top_show = get_theme_mod( 'back_to_top_show', $defaults['back_to_top_show']); 
    $footer_widget_area_column = get_theme_mod( 'footer_widget_area_column', $defaults['footer_widget_area_column']); 
    $footer_variations = get_theme_mod( 'footer_variations', $defaults['footer_variations']); 
    $edubin_footer_type = get_theme_mod( 'edubin_footer_type', $defaults['edubin_footer_type']); 
    $edubin_get_elementor_footer = get_theme_mod( 'edubin_get_elementor_footer', $defaults['edubin_get_elementor_footer']); 

    $mb_customize_footer_layout = get_post_meta($post_id, $prefix . 'mb_customize_footer_layout', true);
    $mb_elementor_footer = get_post_meta($post_id, $prefix . 'mb_elementor_footer', true);

?>
        </div><!-- #content -->

            <?php 

                if ( $mb_customize_footer_layout == 'mb_elementor_footer' ) {
                    echo '<footer id="colophon">';
                    if ( $mb_elementor_footer ) {
                        $footer_page_select_id = intval($mb_elementor_footer);

                        if (did_action('elementor/loaded')) {
                            echo \Elementor\Plugin::$instance->frontend->get_builder_content($footer_page_select_id);
                        }
                    }
                    echo '</footer>';
                }
                elseif ( $edubin_footer_type == 'edubin_elementor_footer' ) {
                    echo '<footer id="colophon">';
                    if ( $edubin_get_elementor_footer ) {
                        $edubin_get_elementor_footer_id = intval($edubin_get_elementor_footer);

                        if (did_action('elementor/loaded')) {
                            echo \Elementor\Plugin::$instance->frontend->get_builder_content($edubin_get_elementor_footer_id);
                        }
                    }
                    echo '</footer>';
                } else { // Show theme footer ?>

                <footer id="colophon" class="site-footer footer-v<?php echo esc_attr( $footer_variations ); ?>">
                    <?php 
                        if ( is_active_sidebar( 'footer-1' ) ||
                             is_active_sidebar( 'footer-2' ) ||
                             is_active_sidebar( 'footer-3' ) ||
                             is_active_sidebar( 'footer-4' ) ) :
                             if ( $footer_widget_area_column == '12' ) :
                                get_template_part( 'template-parts/footer/widgets-1' );
                            elseif( $footer_widget_area_column == '6_6' ) :
                                get_template_part( 'template-parts/footer/widgets-2' );
                            elseif( $footer_widget_area_column == '4_4_4' ) :
                                get_template_part( 'template-parts/footer/widgets-3' );
                            elseif( $footer_widget_area_column == '3_3_3_3' ) :
                                get_template_part( 'template-parts/footer/widgets-4' );
                            elseif( $footer_widget_area_column == '3_6_3' ) :
                                get_template_part( 'template-parts/footer/widgets-5' );
                            elseif( $footer_widget_area_column == '4_3_2_3' ) :
                                get_template_part( 'template-parts/footer/widgets-6' );
                            elseif( $footer_widget_area_column == '4_2_2_4' ) :
                                get_template_part( 'template-parts/footer/widgets-7' );
                             endif; 
                        endif; 
                    ?>
                <?php if ( $copyright_show) : ?>
                    <div class="footer-bottom">
                        <div class="container">
                            <div class="row footer-cyperight-wrap">
                            <?php if ( is_active_sidebar( 'copyright' ) ) : ?>
                                <div class="<?php if(has_nav_menu( 'footer_menu' )):  echo 'col-md-6'; else: echo 'col-md-12 text-center'; endif;?>">
                                    <?php dynamic_sidebar( 'copyright' ); ?>
                                </div>
                            <?php else : ?>
                                <div class="<?php if(has_nav_menu( 'footer_menu' )):  echo 'col-md-6'; else: echo 'col-md-12 text-center'; endif;?>">
                                    <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
                                </div>
                            <?php endif; ?>

                             <?php if ( is_active_sidebar( 'copyright_2' ) ) : ?>
                                <div class="col-md-6 text-ml-left">
                                    <?php dynamic_sidebar( 'copyright_2' ); ?>
                                </div>
                            <?php else : ?>
                                <?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
                                    <div class="col-md-6 text-right text-ml-left">
            
                                            <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'edubin' ); ?>">
                                                <?php
                                                    wp_nav_menu( array(
                                                        'theme_location' => 'footer_menu',
                                                        'container_class'     => '',
                                                        'depth'          => 1,
                                                    ) );
                                                ?>
                                            </nav>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </footer><!-- #colophon -->

            <?php } //End elementor theme footer ?>

            </div><!-- #page -->

            <?php if( $back_to_top_show == '1' ) : ?>
            <a href="#page" class="back-to-top" id="back-to-top">
                <i class="flaticon-upload" aria-hidden="true"></i>
            </a>
            <?php endif; ?>

        <?php wp_footer(); ?>
    </body>
</html>
