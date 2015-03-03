<?php
/**
 * The template for displaying all catalog.
 */
?>

<?php get_header(); ?>

<?php do_action( 'sp_start_content_wrap_html' ); ?>

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); 
		?>
			<h1><?php the_title(); ?></h1>

		<?php if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile; 	
		?>
	
<?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>