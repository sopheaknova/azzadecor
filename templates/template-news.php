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
						'order'				=> 	'DESC',
					);
				$custom_query = new WP_Query( $args );

				if( $custom_query->have_posts() ) :
					while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				<section class="news-press clearfix">
					<div class="one-fourth">
						<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
					</div>
					<div class="three-fourth last">
						<a href=""><?php the_title(); ?></a>
						<?php the_content(); ?>
					</div>
				</section>
			<?php 	
				endwhile; wp_reset_postdata();
				endif; ?>
		</div><!-- .main -->
		<div class="sidebar">
			
            
		</div><!-- .sidebar -->
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>