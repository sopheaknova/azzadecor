<?php
/**
 * The main template file.
 */
?>

<?php get_header(); ?>
<div id="slide">
	<div class="backstretch-caption"></div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){

      	var items = [
      		<?php
      		$args = array(
					'post_type'			=> 'sp_slideshow',
					'posts_per_page'	=>	-1,
					'order'				=> 'ASC'
				);
			$custom_query = new WP_Query( $args );

			if( $custom_query->have_posts() ) :
				while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                { img: "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'slideshow-thumbnails' ) ); ?>", 
                  caption: "<h1><?php echo get_the_title(); ?></h1><p><?php echo get_the_content(); ?></p>", 
                  link: "#"
                },
            
            <?php 
			endwhile; wp_reset_postdata();
			endif; ?>	
        ];

        var options = {
            fade: 1000,
            duration: 2000
        };

        var images = $.map(items, function(i) { return i.img; });
        var slideshow = $("#slide").backstretch(images,options);

        $(window).on("backstretch.show", function(e, instance) {
            var theCaption = items[instance.index].caption;
            var theLink = items[instance.index].link;
            if (theLink) {
              $(".backstretch-caption").html('<a href="'+theLink+'">'+theCaption+'</a>').show().addClass('animated fadeInUp');
            } else {
              $(".backstretch-caption").text(theCaption).show().addClass('animated fadeInUp');
            }
        });
        $(window).on("backstretch.before", function(e, instance) {
          $(".backstretch-caption").hide();
        });
	});
</script>
<?php get_footer(); ?>