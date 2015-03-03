<?php
/*
*****************************************************
* catalog custom post
*
* CONTENT:
* - 1) Actions and filters
* - 2) Creating a custom post
* - 3) Custom post list in admin
*****************************************************
*/





/*
*****************************************************
*      1) ACTIONS AND FILTERS
*****************************************************
*/
	//ACTIONS
		//Registering CP
		add_action( 'init', 'sp_catalog_cp_init' );
		
		//CP list table columns
		add_action( 'manage_posts_custom_column', 'sp_catalog_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-sp_catalog_columns', 'sp_catalog_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_catalog_cp_init' ) ) {
		function sp_catalog_cp_init() {
			global $cp_menu_position;

			
			$labels = array(
				'name'               => __( 'Catalogs', 'sptheme_admin' ),
				'singular_name'      => __( 'Catalog', 'sptheme_admin' ),
				'add_new'            => __( 'Add New', 'sptheme_admin' ),
				'all_items'          => __( 'All Catalogs', 'sptheme_admin' ),
				'add_new_item'       => __( 'Add New Catalog', 'sptheme_admin' ),
				'new_item'           => __( 'Add New Catalog', 'sptheme_admin' ),
				'edit_item'          => __( 'Edit Catalog', 'sptheme_admin' ),
				'view_item'          => __( 'View Catalog', 'sptheme_admin' ),
				'search_items'       => __( 'Search Catalog', 'sptheme_admin' ),
				'not_found'          => __( 'No Catalog found', 'sptheme_admin' ),
				'not_found_in_trash' => __( 'No Catalog found in trash', 'sptheme_admin' ),
				'parent_item_colon'  => __( 'Parent Catalog', 'sptheme_admin' ),
			);	

			$role     = 'post'; // page
			$slug     = 'catalog';
			$supports = array('title', 'editor', 'thumbnail'); // 'title', 'editor', 'thumbnail'

			$args = array(
				'labels' 				=> $labels,
				'rewrite'               => array( 'slug' => $slug ),
				'menu_position'         => $cp_menu_position['menu_catalog'],
				'menu_icon'           	=> 'dashicons-category',
				'supports'              => $supports,
				'capability_type'     	=> $role,
				'query_var'           	=> true,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'	    => false,
				'publicly_queryable'	=> true,
				'exclude_from_search'   => false,
				'has_archive'			=> true,
				'can_export'			=> true
			);
			register_post_type( 'sp_catalog' , $args );
		}
	} 


/*
*****************************************************
*      3) CUSTOM POST LIST IN ADMIN
*****************************************************
*/
	/*
	* Registration of the table columns
	*
	* $Cols = ARRAY [array of columns]
	*/
	if ( ! function_exists( 'sp_catalog_cp_columns' ) ) {
		function sp_catalog_cp_columns( $columns ) {
			
			$columns['cb']                   	= '<input type="checkbox" />';
			$columns['catalog_thumbnail']       = __( 'Cover', 'sptheme_admin' );
			$columns['title']                	= __( 'Title', 'sptheme_admin' );
			$columns['catalog_category']        = __( 'Category', 'sptheme_admin' );
			$columns['date']		 			= __( 'Date', 'sptheme_admin' );

			return $columns;
		}
	}

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'sp_catalog_cp_custom_column' ) ) {
		function sp_catalog_cp_custom_column( $column ) {
			global $post;

			switch ( $column ) {

				case "catalog_thumbnail":
					echo get_the_post_thumbnail( $post->ID, array(70, 70) );
					break;

				case "catalog_category":
					the_terms( $post->ID, 'sp_catalog_category' );
					break;

				default:
				break;
			}
		}
	} // /sp_catalog_cp_custom_column