<?php
// Register Taxonomy for Lesson
function create_lesson_tax(){
	$labels = array(
		'name'              => _x('Subjects', 'taxonomy general name', 'textdomain'),
		'singular_name'     => _x('Subject', 'taxonomy singular name', 'textdomain'),
		'search_items'      => __('Search Subjects', 'textdomain'),
		'all_items'         => __('All Subjects', 'textdomain'),
		'parent_item'       => __('Parent Subject', 'textdomain'),
		'parent_item_colon' => __('Parent Subject:', 'textdomain'),
		'edit_item'         => __('Edit Subject', 'textdomain'),
		'update_item'       => __('Update Subject', 'textdomain'),
		'add_new_item'      => __('Add New Subject', 'textdomain'),
		'new_item_name'     => __('New Subject Name', 'textdomain'),
		'menu_name'         => __('Subject', 'textdomain'),
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Subject of the lesson', 'textdomain'),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => false,
	);
	register_taxonomy('subject', 'lesson', $args);

}

add_action('init', 'create_lesson_tax');


?>