<?php
/**
 * The template for displaying all pages
 * @package Edubin
 * Version: 1.0.0
 */

get_header(); 

	// Some container class for spesific pages
	$tutor_student_reg_page = 'tutor-student-page';
	$tutor_instructor_page = 'tutor-instructor-page';
	$ld_profile = 'ld-profile-page';

?>
<div class="container <?php if (is_page( 'ld-profile' ) ): echo esc_attr( $ld_profile ); endif; ?> <?php if (is_page( 'instructor-registration' ) ): echo esc_attr( $tutor_instructor_page ); endif; ?> <?php if (is_page( 'student-registration' ) ): echo esc_attr( $tutor_student_reg_page ); endif; ?>">
    <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/page/content', 'page' );
 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
    ?>
</div>
<?php get_footer();
