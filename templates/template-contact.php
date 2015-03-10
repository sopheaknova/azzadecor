<?php
/*
Template Name: Contact page
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
			<div class="pic-profile">
				<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
			</div>
			<?php the_content(); ?>
		</div><!-- .main -->
		<div class="sidebar">
			<div id="map-canvas"></div>
		</div><!-- .sidebar -->
	</section><!-- #content -->
<?php endwhile; ?>

	<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
	        var map_styles = [
	            {
	                // Style the map with the custom hue
	                stylers: [
	                    { "hue":'gray' }
	                ]
	            },
	            {
	                // Remove road labels
	                featureType:"road",
	                elementType:"labels",
	                stylers: [
	                    { "visibility":"off" }
	                ]
	            },
	            {
	                // Style the road
	                featureType:"road",
	                elementType:"geometry",
	                stylers: [
	                    { "lightness":100 },
	                    { "visibility":"simplified" }
	                ]
	            }
	        ];
	        
	        var mapOptions = {  
	            center: new google.maps.LatLng(11.543209,104.913082),
	            zoomControlOptions: {
	                style: google.maps.ZoomControlStyle.LARGE,
	                position: google.maps.ControlPosition.RIGHT_CENTER
	            },
	            panControlOptions: {
	                position: google.maps.ControlPosition.RIGHT_CENTER
	            },
	            streetViewControl:false,
	            zoom:15,
	            mapTypeControlOptions: {
	                mapTypeIds:[]
	            }
	        }
	        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	        var styledMap = new google.maps.StyledMapType(map_styles, { name:"Contact Map" });

	        map.mapTypes.set('Contact Map', styledMap);
	        map.setMapTypeId('Contact Map');
	        
	        
	        var image = '<?php echo SP_ASSETS; ?>/images/google-map-marker.png'; // Marker image

	        var marker = new google.maps.Marker({
	            position: new google.maps.LatLng(11.543685, 104.914767), 
	            map: map,
	            icon:image,
	            animation: google.maps.Animation.DROP
	        });

	       google.maps.event.addDomListener(window, "resize", function() {
			    var center = map.getCenter();
			    google.maps.event.trigger(map, "resize");
			    map.setCenter(center); 
			});

	    });
	</script>
<?php get_footer(); ?>