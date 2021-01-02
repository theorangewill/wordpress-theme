<?php
function ttw_adminpage_scripts($hook){
	
	
	if('widgets.php' == $hook){
		wp_register_style('ttw_admin', get_template_directory_uri() . '/css/ttw.admin.css', 
						  array(), '1.0', 'all');
		wp_enqueue_style('ttw_admin');
		
		wp_enqueue_media();
		
		wp_register_script('ttw-admin-script', get_template_directory_uri() . '/js/ttw.admin.js', 
						   array('jquery'), '1.0', true);
		wp_enqueue_script('ttw-admin-script');
	}
	elseif('toplevel_page_ttw_theme_custom' == $hook){
		wp_register_style('ttw_admin', get_template_directory_uri() . '/css/ttw-options.admin.css', 
						  array(), '1.0', 'all');
		wp_enqueue_style('ttw_admin');
	}
	elseif('theme-custom_page_ttw_theme_custom_categories' == $hook){
	
		wp_register_style('ttw_admin', get_template_directory_uri() . '/css/ttw-categories.admin.css', 
						  array(), '1.0', 'all');
		wp_enqueue_style('ttw_admin');
		
		wp_enqueue_media();
		
		wp_register_script('ttw-admin-script', get_template_directory_uri() . '/js/ttw-categories.admin.js', 
						   array('jquery'), '1.0', true);
		wp_enqueue_script('ttw-admin-script');

	}
	
}
add_action('admin_enqueue_scripts', 'ttw_adminpage_scripts');
