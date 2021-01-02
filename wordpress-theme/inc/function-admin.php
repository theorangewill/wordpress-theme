<?php
function ttw_adminpage(){
    add_menu_page('Theme Custom', 'Theme Custom', 
                  'manage_options', 'ttw_theme_custom', 
                  'ttw_adminpage_options_function', 
                  'dashicons-admin-generic', 61);
    add_submenu_page('ttw_theme_custom', 'Theme Options', 'Options', 
                      'manage_options', 'ttw_theme_custom', 'ttw_adminpage_options_function');
    add_submenu_page('ttw_theme_custom', 'Theme Categories Menu', 'Categories', 
                     'manage_options', 'ttw_theme_custom_categories', 'ttw_adminpage_categories_function');
}
add_action('admin_menu', 'ttw_adminpage');
add_action('admin_init', 'ttw_adminpage_settings');

function ttw_adminpage_settings(){
    add_settings_section('ttw-options', 'Author Fields', 
                         'ttw_adminpage_options', 'ttw_theme_custom');
    register_setting('ttw-settings-author', 'ttw_interests_name');
    register_setting('ttw-settings-author', 'ttw_interests_info');
    add_settings_field('ttw-interests', 'Interests', 
                       'ttw_adminpage_option', 'ttw_theme_custom', 
                       'ttw-options', array('interests'));
    register_setting('ttw-settings-author', 'ttw_experiences_name');
    register_setting('ttw-settings-author', 'ttw_experiences_info');
    add_settings_field('ttw-experiences', 'Experiences', 
                      'ttw_adminpage_option', 'ttw_theme_custom', 
                      'ttw-options', array('experiences'));
    register_setting('ttw-settings-author', 'ttw_publications_name', 'Name');
    register_setting('ttw-settings-author', 'ttw_publications_info', 'Info Box');
    add_settings_field('ttw-publications', 'Latest Content', 
                        'ttw_adminpage_option', 'ttw_theme_custom', 
                        'ttw-options', array('publications'));



    add_settings_section('ttw-categories', '', 
                         'ttw_adminpage_categories', 'ttw_theme_custom_categories');
    foreach (array(1,2,3,4,5,6) as $i){
        register_setting('ttw-settings-category', 'ttw_category_image_'.$i);
        register_setting('ttw-settings-category', 'ttw_category_name_'.$i);
        register_setting('ttw-settings-category', 'ttw_category_id_'.$i);
        
        
        add_settings_field('ttw-category-'.$i, 'Category '.$i, 
                           'ttw_adminpage_category', 'ttw_theme_custom_categories', 
                           'ttw-categories', array($i));
    }
}


function ttw_adminpage_options(){
  echo "Here you can set names and info boxes for Interests, Experiences and Latest Content for each author";
}

function ttw_adminpage_option($args){
	$name = esc_attr(get_option('ttw_'.$args[0].'_name'));
  $info = esc_attr(get_option('ttw_'.$args[0].'_info'));
  echo 'Name: ';
  echo '<input type="text" id="ttw_'.$args[0].'_name" name="ttw_'.$args[0].'_name" 
          value="'.$name.'" placeholder="" class="form-item"/>';
  echo 'Info Box: ';
  echo '<textarea type="text" id="ttw_'.$args[0].'_info" name="ttw_'.$args[0].'_info" 
          placeholder="" class="form-item" cols="40" rows="5"/>'.$info.'</textarea>';
  

}
function ttw_adminpage_options_function(){
  require_once(get_template_directory() . '/inc/templates/ttw-admin-page-options.php');
}


function ttw_adminpage_category($args){
	$id = esc_attr(get_option('ttw_category_id_'.$args[0]));
	$image = esc_attr(get_option('ttw_category_image_'.$args[0]));
  $name = esc_attr(get_option('ttw_category_name_'.$args[0]));
  $terms = get_terms(array('orderby'=>'taxonomy', 'order'=>'ASC'));

  echo '<select name="ttw_category_id_'.$args[0].'" id="ttw_category_id_'.$args[0].'" class="form-item">';
  echo '<option value=""';
  if(empty($id)) echo ' selected';
  echo '>Select category:</option>';
  foreach($terms as $term){
      if($term->taxonomy == 'nav_menu') continue;
      echo '<option value="'.$term->term_id.'"';
      if($id==$term->term_id)
          echo ' selected';
      echo '>'.$term->name.' ('.$term->taxonomy.')</option>';
  }
  echo '</select>';
  echo '<input type="text" id="ttw_category_name_'.$args[0].'" name="ttw_category_name_'.$args[0].'" 
          value="'.$name.'" placeholder="First Name" class="form-item"/>';
  echo '<div class="form-item">
        <input type="button" class="button button-secondary" 
          value="Upload Image" id="ttw_category_image_'.$args[0].'_upload">
        <input type="hidden" id="ttw_category_image_'.$args[0].'_id" 
          name="ttw_category_image_'.$args[0].'" value="'.$image.'" />
        <input type="button" class="button" value="X" 
          id="ttw_category_image_'.$args[0].'_cancel">
        </div>
        <p id="ttw_category_image_'.$args[0].'_name" class="description">'.end(explode("/", $image)).'</p>';

}

function ttw_adminpage_categories_function(){
	require_once(get_template_directory() . '/inc/templates/ttw-admin-page-categories.php');
}
