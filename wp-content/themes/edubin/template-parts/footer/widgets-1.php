
<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Edubin
 * Version: 1.0.0
 */

?>

<div class="footer-top">
    <div class="container">
        <div class="row footer-wrap">
            <div class="col-lg-12 col-md-12 <?php if ( is_active_sidebar( 'footer-1' ) ) : echo esc_attr( 'sidebar-yes' ); else : echo esc_attr( 'sidebar-no' ); endif; ?>">
                <div class="footer-column">
                    <?php dynamic_sidebar( 'footer-1' ); ?>     
                </div>
             </div>
        </div>
    </div>
</div>