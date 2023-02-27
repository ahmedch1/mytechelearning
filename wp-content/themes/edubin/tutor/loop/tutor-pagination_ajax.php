<?php
/**
 * A single course loop pagination
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php

	global $wp_query;

function course_listing_pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	$paged = $_POST['page'];
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		/* $wp_query = '';
		$pages    = is_object( $wp_query ) ? $wp_query->max_num_pages : null; */
		$pages = $_POST['page'];
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		?>
<nav class="tutor-course-list-pagination navigation pagination">

	<?php //echo $paged; ?>
	<ul class="tutor-pagination-numbers course-archive-page nav-links">
		<?php

		if ( $paged > 1 ) {
			echo "<a data-pagenumber='" .( $paged - 1 )."' href='javascript:void(0)' class='prev page-numbers'>

					<i class='flaticon-back' aria-hidden='true'></i>
				</a>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<span class='page-numbers current'>" . $i . '</span>' : "<a data-pagenumber='$i' href='javascript:void(0)' class='page-numbers'>" . $i . '</a>';
			}
		}

		if ( $paged < $pages ) {
			echo '<a data-pagenumber="' . ($paged + 1).'" href="javascript:void(0)" class="next page-numbers">
					<i class="flaticon-next" aria-hidden="true"></i>
				</a>';
		}
		?>
	</ul>
</nav>
	<?php } } ?>

<?php do_action( 'tutor_course/archive/pagination/before' ); ?>

	<?php
	if ( function_exists( 'course_listing_pagination' ) && is_object( $wp_query ) ) {
		course_listing_pagination( $wp_query->max_num_pages );
	}
	?>

<?php do_action( 'tutor_course/archive/pagination/after' ); ?>
