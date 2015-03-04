<?php
/**
 * The template for displaying all catalog.
 */
?>

<?php get_header(); ?>

<?php do_action( 'sp_start_content_wrap_html' ); ?>
		<?php $catalog_meta = get_post_meta( $post->ID ); ?>
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); 
		?>
			<h1><?php the_title(); ?></h1>
			<?php
				$catalogs = unserialize($catalog_meta['sp_add_catalogs'][0]); 
				if ( !empty($catalogs) ) : ?>
				<?php foreach ($catalogs as $catalog ) { 
					$catalog_term = get_term( $catalog, 'sp_catalog' ); ?>
					<a href="<?php echo $catalog['sp_catalog_pdf']; ?>"><img src="<?php echo aq_resize( $catalog['sp_catalog_cover'], 200, 120, true ); ?>"></a>
				<?php } ?>
			<?php endif; ?>
			
		<?php if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile; 	
		?>
	
<?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>