<?php
/**
 * The template for displaying archive of meetings
 *
 * This template can be overridden by copying it to yourtheme/video-conferencing-zoom/archive-meetings.php.
 *
 * @author Deepen
 * @since 3.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

$defaults = edubin_generate_defaults();
$edubin_zm_archive_hotted = get_theme_mod( 'edubin_zm_archive_hotted', $defaults['edubin_zm_archive_hotted']  );
$edubin_zm_archive_start_date = get_theme_mod( 'edubin_zm_archive_start_date', $defaults['edubin_zm_archive_start_date']  );
$edubin_zm_archive_time_zone = get_theme_mod( 'edubin_zm_archive_time_zone', $defaults['edubin_zm_archive_time_zone']  );
$edubin_zm_excerpt = get_theme_mod( 'edubin_zm_excerpt', $defaults['edubin_zm_excerpt']  );
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <div id="dpn-zvc-primary" class="dpn-zvc-primary container">
			<?php if ( have_posts() ) { ?>
				<div class="row">
						<?php
						// Start the Loop.
						while ( have_posts() ) {
							the_post(); ?>

							<?php $meeting_details = get_post_meta( get_the_id(), '_meeting_fields', true ); ?>
								<div class="col-md-4">
									<div id="dpn-zvc-<?php the_ID(); ?>" class="edubin-zm-single dpn-zvc-<?php the_ID(); ?>">

										<div class="edubin-zm-single-thumb">
											<?php if ( has_post_thumbnail() ) : ?>
											    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											        <?php the_post_thumbnail(); ?>
											    </a>
											<?php endif; ?>
										</div>

										<div class="edubin-zm-single-content">

 										<h3 class="edubin-zm-single-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<?php if ($edubin_zm_archive_hotted || $edubin_zm_archive_start_date || $edubin_zm_archive_time_zone ) : ?>

											<div class="vczapi-list-zoom-meetings--item__details__meta">
											<?php if ($edubin_zm_archive_hotted) : ?>
											    <div class="hosted-by meta">
											        <strong><?php _e( 'Hosted By:', 'edubin' ); ?></strong> <span><?php echo get_the_author(); ?></span>
											    </div>
											<?php endif; ?>
											<?php if ($edubin_zm_archive_start_date) : ?>
											    <div class="start-date meta">
											        <strong><?php _e( 'Start', 'edubin' ); ?>:</strong>
											        <span><?php echo date( 'F j, Y @ g:i a', strtotime( $meeting_details['start_date'] ) ); ?></span>
											    </div>
											<?php endif; ?>
											<?php if ($edubin_zm_archive_time_zone) : ?>
											    <div class="timezone meta">
											        <strong><?php _e( 'Timezone', 'edubin' ); ?>:</strong>
											        <span><?php echo $meeting_details['timezone']; ?></span>
											    </div>
											<?php endif; ?>
											</div>
										<?php endif; ?>

										<?php if ($edubin_zm_excerpt) : ?>
											<div class="edubin-metting-excerpt">
												<?php the_excerpt(); ?>
											</div>
										<?php endif; ?>

										</div>
									</div>

								</div>

					<?php	}

					} else {
						echo "<p>" . __( 'No Meetings found.', 'edubin' ) . "</p>"; ?>

				</div>
		<?php	}
			?>
    </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
