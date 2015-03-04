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
			<h1 class="entry-title">CATALOG</h1>
			<div class="entry-content">
			<p><?php the_title(); ?></p>
			<p><?php echo get_the_post_thumbnail( $post->ID, 'logo-brand' ); ?></p>
			<p><?php the_content(); ?></p>
			</div>
		</div><!-- .main -->
		<div class="sidebar">
			<div class="image-catalog">
			<?php
			$catalogs = unserialize($catalog_meta['sp_add_catalogs'][0]); 
				if ( !empty($catalogs) ) : ?>
				<?php foreach ($catalogs as $catalog ) { 
					$catalog_term = get_term( $catalog, 'sp_catalog' ); ?>
					<div class="two-fourth">
						<a class="effect" href="<?php echo $catalog['sp_catalog_pdf']; ?>">
		                  <img src="<?php echo aq_resize( $catalog['sp_catalog_cover'], 800, 500, true ); ?>">
		                  <div class="text">
		                      <h2><?php echo $catalog['title']; ?></h2>
		                  </div>
		                </a>
					</div>
				<?php } ?>
			<?php endif; ?>
			</div><!-- .image-catalog -->
		</div><!-- .sidebar -->
	</section><!-- #content -->

<?php if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; 	
	?>
<?php get_footer(); ?>