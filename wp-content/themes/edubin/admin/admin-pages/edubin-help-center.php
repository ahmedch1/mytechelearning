
    <?php 
        $allowed_html = [
            'a' => [ 'href' => true, 'target' => true ],
        ]; 
    ?>
    
    <h2 class="nav-tab-wrapper">
        <?php

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-admin-menu' ), esc_html__( 'Welcome', 'edubin' ) );

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-theme-active' ), esc_html__( 'Activate Theme', 'edubin' ) );

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'customize.php' ), esc_html__( 'Theme Options', 'edubin' ) );

        if (class_exists('OCDI_Plugin')):
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'themes.php?page=pt-one-click-demo-import' ), esc_html__( 'Demo Import', 'edubin' ) );
        endif;

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-requirements' ), esc_html__( 'Requirements', 'edubin' ) );
        
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-help-center' ), esc_html__( 'Help Center', 'edubin' ) );

        ?>
    </h2>

<div class="edubin-theme-helper">
    <div class="container-form">
        <h1 class="edubin-title">
            <?php echo esc_html__('Need Help? Pixelcurve Help Center Here', 'edubin');?>
        </h1>
        <div class="edubin-content">
            <p class="edubin-content_subtitle">
                <?php
                    echo wp_kses( __( 'Please read a <a target="_blank" href="https://themeforest.net/page/item_support_policy">Support Policy</a> before submitting a ticket and make sure that your question related to our theme issues.', 'edubin' ), $allowed_html);
                ?>
                <br/>
                    <?php
                    echo esc_html__('If you did not find an answer to your question, feel free to contact us.', 'edubin');
                    ?>
            </p>
        </div>
        <div class="edubin-row">
            <div class="edubin-col edubin-col-4">
                <div class="edubin-col_inner">
                    <div class="edubin-info-box_wrapper">
                        <div class="edubin-info-box">
                            <div class="edubin-info-box_icon-wrapper">
                                <div class="edubin-info-box_icon">
                                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/admin/assets/images/document_icon.png'?>">
                                </div>
                            </div>
                            <div class="edubin-info-box_content-wrapper">
                                <div class="edubin-info-box_title">
                                    <h3 class="edubin-info-box_icon-heading">
                                        <?php
                                            esc_html_e('Documentation', 'edubin');
                                        ?>
                                    </h3>
                                </div>
                                <div class="edubin-info-box_content">
                                    <p>
                                        <?php
                                        esc_html_e('Before submitting a ticket, please read the documentation. Probably, your issue already described.', 'edubin');
                                        ?>
                                    </p>
                                </div>
                                <div class="edubin-info-box_btn">
                                    <a target="_blank" href="https://thepixelcurve.com/support/docs/edubin/">
                                        <?php
                                            esc_html_e('Visit Documentation', 'edubin');
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edubin-col edubin-col-4">
                <div class="edubin-col_inner">
                    <div class="edubin-info-box_wrapper">
                        <div class="edubin-info-box">
                            <div class="edubin-info-box_icon-wrapper">
                                <div class="edubin-info-box_icon">
                                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/admin/assets/images/video_icon.png'?>">
                                </div>
                            </div>
                            <div class="edubin-info-box_content-wrapper">
                                <div class="edubin-info-box_title">
                                    <h3 class="edubin-info-box_icon-heading">
                                        <?php
                                            esc_html_e('Video Tutorials', 'edubin');
                                        ?>
                                    </h3>
                                </div>
                                <div class="edubin-info-box_content">
                                    <p>
                                        <?php
                                            esc_html_e('There you can watch tutorial for main issues. How to import demo content? How to create a course? etc..', 'edubin');
                                        ?>
                                    </p>
                                </div>
                                <div class="edubin-info-box_btn">
                                    <a target="_blank" href="https://www.youtube.com/channel/UCdUpcSa12dC7hj_op1fsojg">
                                        <?php
                                            esc_html_e('Watch Tutorials', 'edubin');
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edubin-col edubin-col-4">
                <div class="edubin-col_inner">
                    <div class="edubin-info-box_wrapper">
                        <div class="edubin-info-box">
                            <div class="edubin-info-box_icon-wrapper">
                                <div class="edubin-info-box_icon">
                                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/admin/assets/images/support_icon.png'?>">
                                </div>
                            </div>
                            <div class="edubin-info-box_content-wrapper">
                                <div class="edubin-info-box_title">
                                    <h3 class="edubin-info-box_icon-heading">
                                        <?php
                                            esc_html_e('Support forum', 'edubin');
                                        ?>
                                    </h3>
                                </div>
                                <div class="edubin-info-box_content">
                                    <p>
                                        <?php
                                            esc_html_e('If you did not find an answer to your question, submit a ticket with well describe your issue.', 'edubin');
                                        ?>
                                    </p>
                                </div>
                                <div class="edubin-info-box_btn">
                                    <a target="_blank" href="https://thepixelcurve.com/support/wp-admin/edit.php?post_type=ticket">
                                        <?php
                                            esc_html_e('Create a ticket', 'edubin');
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="theme-helper_desc">
            <?php
                echo wp_kses( __( 'Do You have some other questions? Need Customization? Pre-purchase questions? Ask it <a  target="_blank"  href="mailto:help.pixelcurve@gmail.com">there!</a>', 'edubin' ), $allowed_html);
            ?>
        </div>

    </div>
</div>

