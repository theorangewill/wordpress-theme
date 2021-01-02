<?php

// Require plugins
require get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'ttw__register_required_plugins');

function ttw__register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'theorangewill',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theorangewill' ),
			'menu_title'                      => __( 'Install Plugins', 'theorangewill' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'theorangewill' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'theorangewill' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theorangewill' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theorangewill'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theorangewill'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theorangewill'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theorangewill'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theorangewill'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theorangewill'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theorangewill'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theorangewill'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theorangewill'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theorangewill' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theorangewill' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theorangewill' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theorangewill' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theorangewill' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theorangewill' ),
			'dismiss'                         => __( 'Dismiss this notice', 'theorangewill' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'theorangewill' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'theorangewill' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);
	tgmpa( $plugins, $config );
}

// Initial functions
function ttw_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('editor-color-palette');
    //add_theme_support('dark-editor-style');
    //add_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'ttw_theme_support');

// Modify Howdy of admins bar
function goodbye_howdy( $wp_admin_bar ) {
    $avatar = get_avatar( get_current_user_id(), 16 );
    if ( ! $wp_admin_bar->get_node( 'my-account' ) )
        return;
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => sprintf( 'Oi, %s', wp_get_current_user()->display_name ) . $avatar,
    ) );
}
add_action('admin_bar_menu', 'goodbye_howdy');

// Add menu locations
function ttw_menu( ) {
    $locations = array(
        'header_menu' => "Header Menu",
        'footer_menu' => "Footer Menu",
        'toggle_menu' => "Mobile Menu"
    );

    register_nav_menus($locations);
}
add_action('init', 'ttw_menu');

// Add posts thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1280, 720, true);

// Define excerpt size
function ttw_custom_excerpt_length( $length ) {
    return 30;
}
add_filter('excerpt_length', 'ttw_custom_excerpt_length', 999);

// Make the numeric pagination
function posts_link_attributes() {
    return 'class="page-link"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function ttw_numeric_posts_nav() {
    //if(is_singular())
     //   return;
    global $wp_query;

    // Don't make pagination if there is only one page
    if($wp_query->max_num_pages <= 1)
        return;
 
    $paged = get_query_var('paged') ? absint(get_query_var('paged')):1;
    $max = intval($wp_query->max_num_pages);
 
    // Add current page to the array
    if ($paged >= 1)
        $links[] = $paged;
 
    // Add the pages around the current page to the array
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged+2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul class="pagination">' . "\n";
 
    if (get_previous_posts_link()){
        $previous_posts_link = get_previous_posts_link( __( 'text', 'name' ) );
        preg_match( '/href="([^"]*)"/', $previous_posts_link, $matches );
        printf( '<li class="page-item"><a class="page-link" href="%s">&laquo;</a></li>' . "\n", $matches[1] );
    }

    // Link to first page, plus ellipses if necessary
    if (!in_array(1, $links)){
        $class = 1 == $paged ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item"><span class="page-link page-ellipsis">…</span></li>' . "\n";
    }
 
    // Link to current page, plus 2 pages in either direction if necessary
    sort($links);
    foreach((array) $links as $link){
        $class = $paged == $link ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
 
    // Link to last page, plus ellipses if necessary
    if(!in_array($max, $links)){
        if(!in_array($max-1, $links))
            echo '<li class="page-item"><span class="page-link page-ellipsis">…</span></li>' . "\n";
        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
 
    // Next Post Link
    if(get_next_posts_link()){
        $next_posts_link = get_next_posts_link( __( 'text', 'name' ) );
        preg_match( '/href="([^"]*)"/', $next_posts_link, $matches );
        printf( '<li class="page-item"><a class="page-link" href="%s">&raquo;</a></li>' . "\n", $matches[1] );
    }
    echo '</ul>' . "\n";
}

// Add the custom admin page
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/function-customize.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/shortcode.php';
require get_template_directory() . '/inc/post-type.php';
require get_template_directory() . '/inc/taxonomy.php';


// Populate the choice field of lessons based on tags
function ttw_acf_load_ttw_post_lessons_field_choices( $field ) {
    $field['choices'] = array();
    $tags = get_tags();
    $choices = array();
    foreach($tags as $tag){
        array_push($choices,array(
            'id' => $tag->term_id,
            'name' => $tag->name
        ));
    }
    if( is_array($choices) ) {
        foreach( $choices as $choice ) {
            $field['choices'][ $choice['id'] ] = $choice['name'];
        }
    }
    return $field;
}

add_filter('acf/load_field/name=ttw_post_lessons', 'ttw_acf_load_ttw_post_lessons_field_choices');


// Alter query to get all post types
//add_action('pre_get_posts','ttw_alter_query');

function ttw_alter_query($query) {
	global $wp_query;
	print_r("***!".$query->get('post_type')."***");

	if($query->get('post_type') == 'post' or $query->get('post_type') == 'page')
		if(is_search())
			$query-> set('post_type' ,array('post', 'page', 'lesson'));
		elseif(!is_author())
				$query-> set('post_type' ,array('post', 'lesson'));

}

// Filter query to get author posts
//add_filter('posts_where','ttw_query_filter');
function ttw_query_filter($where){
	global $wpdb;
	if(is_search()){
		$search= get_query_var('s');
		$query=$wpdb->prepare("SELECT user_id  FROM $wpdb->usermeta WHERE ( meta_key='first_name' AND meta_value LIKE '%%%s%%' ) or ( meta_key='last_name' AND meta_value LIKE '%%%s%%' )", $search ,$search);
		$authorID= $wpdb->get_var( $query );

		if($authorID){
			$where = "  AND  ( wp_posts.post_author = {$authorID} ) ";
			$where = $where . "  AND  (wp_posts.post_type IN ('post', 'page', 'lesson')) ";
		}
	 }
	 return $where;
}


function ttw_comment_fields ($fields) {
	//add placeholders and remove labels                            
    $fields['author'] = '<div class="form-row">
	<div class="col">
	<input class="form-control form-control-sm" id="author" name="author" value="" placeholder="Name" required="required" type="text">
	</div>';

	$fields['email'] = '<div class="col">
	<input class="form-control form-control-sm" id="email" name="email" type="email" value="" placeholder="Email" aria-describedby="email-notes" required="required">
	</div>
    </div>';	

    //unset comment so we can recreate it at the bottom
    unset($fields['comment']);

	$fields['comment'] = '<div class="form-group">
	<textarea class="form-control form-control-sm" id="comment" name="comment" cols="45" rows="3" maxlength="65525" placeholder="Comment" required="required"></textarea>
	</div>';

    //remove website
	unset($fields['url']);
	return $fields;
}

add_filter('comment_form_fields', 'ttw_comment_fields');

function ttw_comment_custom($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<?php if($comment->comment_parent == 0): ?>
	<li class="post-comment" id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
	   		<div class="post-comment-name"> <?php echo get_comment_author(); ?> </div>
       		<div class="post-comment-date"><?php echo get_comment_date(); ?></div>
			<?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.') ?></em><br/><?php endif; ?>
	   		<div class="comment-meta commentmetadata"><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	   		<div class="post-comment-text"><?php echo get_comment_text(); ?></div>
	   <div class="post-comment-reply-icon">
		  <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-reply"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	   </div>
		</div>
	<?php else: ?>
	<li class="post-comment-reply" id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
	   		<div class="post-comment-reply-name"> <?php echo get_comment_author(); ?> </div>
       		<div class="post-comment-reply-date"><?php echo get_comment_date(); ?></div>
			<?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.') ?></em><br/><?php endif; ?>
	   		<div class="comment-meta commentmetadata"><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	   		<div class="post-comment-reply-text"><?php echo get_comment_text(); ?></div>
		</div>
	<?php endif; ?>
	  
 <?php
}
?>