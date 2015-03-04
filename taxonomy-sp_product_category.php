<?php
/**
 * The template for displaying Archive pages
 */
?>

<?php get_header(); ?>
	<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

		<?php $term_meta = get_option( 'taxonomy_' . $term->term_id ); ?>
		<section id="content">
			<div class="main">
				<h1 class="entry-title"><a href="#"><?php echo $term->name; ?></a></h1>
				<div class="entry-content">
					<?php if ( category_description() != '' ) : ?>
						<p><?php echo category_description(); ?></p>
					<?php endif; ?>
				</div>
			</div><!-- .main -->
			<div class="sidebar">
				<div class="brand-product">
				<?php
			        $args = array(
			                'post_type'         => 'sp_product',
			                'posts_per_page'    =>  -1,
			                'tax_query' => array(
			                    array(
			                        'taxonomy' => 'sp_product_category',
			                        'field'    => 'id',
			                        'terms'    => array( $term->term_id ),
			                    ),
			                ),
			                'order'             =>  'ASC',
			            );
			        $custom_query = new WP_Query( $args );

			        if( $custom_query->have_posts() ) :
			            while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			        	<a href="<?php echo get_post_meta( $post->ID, 'sp_product_website', true ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'logo-brand' ); ?></a>

			        <?php
			            endwhile; wp_reset_postdata();
			        endif; ?>
				</div><!-- .brand-product -->
			</div><!-- .sidebar -->
		
		</section><!-- #content -->

<?php get_footer(); ?>