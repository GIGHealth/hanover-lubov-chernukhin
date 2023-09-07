<?php 

//** INVESTORS CONTENT CPT */
// add_action( 'init', 'wp_register_post_type_investors_content' );
// function wp_register_post_type_investors_content() {
// 	$args = [
// 		'label'  => esc_html__( 'Investors Content', 'text-domain' ),
// 		'labels' => [
// 			'menu_name'          => esc_html__( 'Investors Content', 'investors' ),
// 			'name_admin_bar'     => esc_html__( 'Investors Content', 'investors' ),
// 			'add_new'            => esc_html__( 'Add Investors Content', 'investors' ),
// 			'add_new_item'       => esc_html__( 'Add new Investors Content', 'investors' ),
// 			'new_item'           => esc_html__( 'New Investors Content', 'investors' ),
// 			'edit_item'          => esc_html__( 'Edit Investors Content', 'investors' ),
// 			'view_item'          => esc_html__( 'View Investors Content', 'investors' ),
// 			'update_item'        => esc_html__( 'View Investors Content', 'investors' ),
// 			'all_items'          => esc_html__( 'All Investors Content', 'investors' ),
// 			'search_items'       => esc_html__( 'Search Investors Content', 'investors' ),
// 			'parent_item_colon'  => esc_html__( 'Parent Investors Content', 'investors' ),
// 			'not_found'          => esc_html__( 'No Investors Content found', 'investors' ),
// 			'not_found_in_trash' => esc_html__( 'No Investors Content found in Trash', 'investors' ),
// 			'name'               => esc_html__( 'Investors Content', 'investors' ),
// 			'singular_name'      => esc_html__( 'Investors Content', 'investors' ),
// 		],
// 		'public'              => true,
// 		'exclude_from_search' => false,
// 		'publicly_queryable'  => true,
// 		'show_ui'             => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'show_in_rest'        => true,
// 		'capability_type'     => 'post',
// 		'hierarchical'        => true,
// 		'has_archive'         => true,
// 		'query_var'           => true,
// 		'can_export'          => true,
// 		'rewrite_no_front'    => false,
// 		'show_in_menu'        => true,
// 		'menu_position'       => 5,
// 		'menu_icon'           => 'dashicons-businessman',
// 		'supports' => [
// 			'title',
// 			'editor',
// 			'thumbnail',
// 		],
//     "facetwp" => true,
// 		'rewrite' => [ 'slug' => 'investors-content' ]
// 	];

// 	register_post_type( 'investors-content', $args );
// }

//** INVESTORS CONTENT CATEGORIES */
// function my_investors_content_taxonomy() {
//   $labels = array(
//     'name'              => _x( 'Investor Content Categories', 'taxonomy general name' ),
//     'singular_name'     => _x( 'Investor Content Category', 'taxonomy singular name' ),
//     'search_items'      => __( 'Search Investor Content Categories' ),
//     'all_items'         => __( 'All Investor Content Categories' ),
//     'parent_item'       => __( 'Parent Investor Content Category' ),
//     'parent_item_colon' => __( 'Parent Investor Content Category:' ),
//     'edit_item'         => __( 'Edit Investor Content Category' ), 
//     'update_item'       => __( 'Update Investor Content Category' ),
//     'add_new_item'      => __( 'Add New Investor Content Category' ),
//     'new_item_name'     => __( 'New Investor Content Category' ),
//     'menu_name'         => __( 'Investor Content Categories' ),
//   );
//   $args = array(
//     'labels' => $labels,
//     'hierarchical' => true,
//   );
//   register_taxonomy( 'investors_content_category', 'investors-content', $args );
// }
// add_action( 'init', 'my_investors_content_taxonomy', 0 );