<?php

/**
 * ----------------------------------------------------------------------------------------
 * Load Post type and Toxonomy
 * ----------------------------------------------------------------------------------------
 */

//Custom post WordPress admin menu position - 30, 33, 39, 42, 45, 48
if ( ! isset( $cp_menu_position ) )
	$cp_menu_position = array(
			'menu_slideshow'	=> 30,
			'menu_product'		=> 33,
			'menu_catalog'		=> 39,
		);

//All custom posts
load_template( SP_BASE_DIR . '/library/custom-posts/cp-slideshow.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/cp-product.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/cp-catalog.php' );

//Taxonomies
load_template( SP_BASE_DIR . '/library/custom-posts/taxonomy-catalog.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/taxonomy-product.php' );