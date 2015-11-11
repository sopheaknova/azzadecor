<?php
/**
 * The template for displaying all catalog.
 */
?>

<?php get_header(); ?>
<?php $catalog_meta = get_post_meta( $post->ID ); ?>
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
	?>
	<section id="content">
		<div class="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta"><p><?php echo esc_html( get_the_date() ); ?></p></div>               
			<div class="entry-content">
			<p><?php echo get_the_post_thumbnail( $post->ID, 'logo-brand' ); ?></p>
			<p><?php the_content(); ?></p>
			</div>
		</div><!-- .main -->
		<div class="sidebar">
			<div class="brand-product">
            </div>
		</div><!-- .sidebar -->
	</section><!-- #content -->

<?php if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; 	
	?>
<?php get_footer(); ?>