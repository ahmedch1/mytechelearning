<?php
    /**
     * Displays header variations 
     *
     * @package Edubin
     * Version: 1.0.0
     */
?>
    <?php 
        $post_id = edubin_get_id();
        $prefix = '_edubin_';
        $defaults = edubin_generate_defaults();
        $header_variations = get_theme_mod( 'header_variations', $defaults['header_variations'] );
        $sticky_header_enable = get_theme_mod( 'sticky_header_enable', $defaults['sticky_header_enable'] );
        $top_cart_enable = get_theme_mod( 'top_cart_enable', $defaults['top_cart_enable'] );
        $top_search_enable = get_theme_mod( 'top_search_enable', $defaults['top_search_enable'] );
        // CMB2
        $page_header_enable = get_post_meta($post_id, $prefix . 'page_header_enable', true);
        $page_header_img = get_post_meta($post_id, $prefix . 'header_img', true);
    ?>    

    <div class="header-menu <?php if('1' == $sticky_header_enable): echo esc_attr( 'sticky-active' ); endif; ?> <?php if($header_variations == 'header_v2'): echo esc_attr( 'menu-effect-2' ); endif; ?>">
        <div class="header-area">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

        <?php if ($top_search_enable or $top_cart_enable) :?>
            <div class="header-right-icon d-inline-block pull-right ">
                <ul>
                    <?php if ($top_search_enable) :?>
                        <li class="top-search"><a href="javascript:void(0)" id="search"><i class="flaticon-zoom"></i></a>
                        </li>
                    <?php endif; ?>

                    <?php if(class_exists('WooCommerce')){
                        if(!WC()->cart ){
                            return;
                        }
                    ?>
                    <?php if ($top_cart_enable) :?>
                 
                        <li class="top-shopping-cart">
                            <a class="edubin-ajax-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="flaticon-shopping-cart-1"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            </div>
        <?php endif; ?>

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="navigation-section d-inline-block pull-right ">
                    <div class="mobile-menu-wrapper">
                        <span class="mobile-menu-icon"><i class="fas fa-bars"></i></span>
                    </div>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'main-menu',
                        ) ); 
                        ?>
                    </nav>
                </div><!-- .navigation-section -->
            <?php endif; ?>
        </div> 
    </div>

    <div class="edubin-search-box">
        <div class="edubin-search-form">
            <div class="edubin-closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="<?php echo esc_html(home_url( '/' )); ?>" method="get">
                <input placeholder="<?php esc_attr_e( 'Search Here..', 'edubin' ) ?>" type="text" name="s" id="popup-search" value="<?php the_search_query(); ?>" />
                <button><i class="flaticon-zoom"></i></button>
            </form>
        </div> 
    </div>