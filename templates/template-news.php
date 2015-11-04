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

		    <?php
		    	$args = array(
						'post_type'			=> 'sp_news',
						'posts_per_page'	=>	-1,
						'post_status'		=>	array('publish'),
						'order'				=> 	'ASC',
					);
				$custom_query = new WP_Query( $args );

				if( $custom_query->have_posts() ) :
					while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

				<h1><?php the_title(); ?></h1>

			<?php 	
				endwhile; wp_reset_postdata();
				endif; ?>
		</div><!-- .main -->
		<div class="sidebar">
			
            
		</div><!-- .sidebar -->
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>