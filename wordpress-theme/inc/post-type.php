<?php
// Register Custom Post Type Lesson
function create_lesson_post_type() {
	$labels = array(
		'name' => _x( 'Lessons', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Lesson', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Lessons', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Lesson', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Lesson Archives', 'textdomain' ),
		'attributes' => __( 'Lesson Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Lesson:', 'textdomain' ),
		'all_items' => __( 'All Lessons', 'textdomain' ),
		'add_new_item' => __( 'Add New Lesson', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Lesson', 'textdomain' ),
		'edit_item' => __( 'Edit Lesson', 'textdomain' ),
		'update_item' => __( 'Update Lesson', 'textdomain' ),
		'view_item' => __( 'View Lesson', 'textdomain' ),
		'view_items' => __( 'View Lessons', 'textdomain' ),
		'search_items' => __( 'Search Lesson', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Lesson', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Lesson', 'textdomain' ),
		'items_list' => __( 'Lessons list', 'textdomain' ),
		'items_list_navigation' => __( 'Lessons list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Lessons list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Lesson', 'textdomain' ),
		'description' => __( 'This is a post type for lessons', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'lesson', $args );
}
add_action( 'init', 'create_lesson_post_type', 0 );

function reg_tag() {
	register_taxonomy_for_object_type('post_tag', 'lesson');
}
add_action('init', 'reg_tag');

// Register Custom Post Type for Authors
// Register Custom Post Type Author Field
function create_authorfield_post_type() {

	$labels = array(
		'name' => _x( 'Author Fields', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Author Field', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Author Fields', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Author Field', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Author Field Archives', 'textdomain' ),
		'attributes' => __( 'Author Field Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Author Field:', 'textdomain' ),
		'all_items' => __( 'All Author Fields', 'textdomain' ),
		'add_new_item' => __( 'Add New Author Field', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Author Field', 'textdomain' ),
		'edit_item' => __( 'Edit Author Field', 'textdomain' ),
		'update_item' => __( 'Update Author Field', 'textdomain' ),
		'view_item' => __( 'View Author Field', 'textdomain' ),
		'view_items' => __( 'View Author Fields', 'textdomain' ),
		'search_items' => __( 'Search Author Field', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Author Field', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Author Field', 'textdomain' ),
		'items_list' => __( 'Author Fields list', 'textdomain' ),
		'items_list_navigation' => __( 'Author Fields list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Author Fields list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Author Field', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title', 'thumbnail', 'author', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 70,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => false,
		'publicly_queryable' => false,
		'capability_type' => 'post',
		'rewrite' => false,
	);
	register_post_type( 'authorfield', $args );

}
add_action( 'init', 'create_authorfield_post_type', 0 );

?>