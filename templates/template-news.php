<?php
/*
Template Name: New & Press page
*/
/**
 * The template for displaying Archive pages
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<section id="content" class="clearfix">
		<div class="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div><!-- .main -->
		<div class="sidebar">
			<?php
			$gallerys = get_post_meta( $post->ID, 'sp_about_gallery', true );
	        $gallery_array = explode( ',', $gallerys );
	        foreach ($gallery_array as $gallery) { 
	          $image_url = wp_get_attachment_image_src($gallery, 'large');
	        ?>
			<div class="image-about">
				<img src="<?php echo $image_url[0]; ?>" alt="pic-about">
			</div>
			      
            <?php } // end foeach ?>
            
		</div><!-- .sidebar -->
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>