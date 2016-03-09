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
						<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?></a>
					</div>
					<div class="three-fourth last">
						<h6 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
                        <div class="entry-meta"><i><?php echo esc_html( get_the_date() ); ?></i></div>
                        <div class="sp-excerpt"><?php the_excerpt(); ?></div>
					</div>
				</section>
			<?php 	
				endwhile; wp_reset_postdata();
				// Pagination
                    if(function_exists('wp_pagenavi'))
                        wp_pagenavi();
                    else 
                        echo sp_pagination();
				endif; ?>
		</div><!-- .main -->
		<div class="sidebar">
			<div class="brand-product">
            </div>
		</div><!-- .sidebar -->
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>