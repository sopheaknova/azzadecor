<?php
add_action('init', 'sp_catalog_category_init', 0);
function sp_catalog_category_init() {
	register_taxonomy(
		'sp_catalog_category',
		array( 'sp_catalog' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Catalog Category', 'sptheme_admin' ),
				'singular_name' => __( 'Catalog Category', 'sptheme_admin' ),
				'search_items' =>  __( 'Search Catalog Category', 'sptheme_admin' ),
				'all_items' => __( 'All Catalog Category', 'sptheme_admin' ),
				'parent_item' => __( 'Parent Catalog Category', 'sptheme_admin' ),
				'parent_item_colon' => __( 'Parent Catalog Category:', 'sptheme_admin' ),
				'edit_item' => __( 'Edit Catalog Category', 'sptheme_admin' ),
				'update_item' => __( 'Update Catalog Category', 'sptheme_admin' ),
				'add_new_item' => __( 'Add New Catalog Category', 'sptheme_admin' ),
				'new_item_name' => __( 'Catalog Category', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'catalog_category' )
		)
	);
}