
<?php
      $rating  = tutor_utils()->get_course_rating( get_the_ID() );
?>

<span class="course-reviews">
   <?php tutor_utils()->star_rating_generator_v2( $rating->rating_avg, null, false, '', 'lg' ); ?>
</span>

