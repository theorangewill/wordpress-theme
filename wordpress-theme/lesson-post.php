<?php
/*
 * Template Name: Subject Page
 * Template Post Type: lesson
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="<?php
            if(get_theme_mod("ttw_customize_colors_darktheme"))
                echo 'dark';
		?>" data-color="<?php echo get_theme_mod("ttw_customize_colors_primary"); ?>">
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/geral.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/plugins.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lesson.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>
    <div class="body-container" id="body-container">
        <main class="main-container">
        <div class="main-header">
            <div class="main-header-content">
                <div class="main-header-categories">
                <?php 
                    $categories = get_the_category();
                    if(!empty($categories)):
                        foreach($categories as $category):
                ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>">
                            <h3 class="main-header-category" >
                <?php 
                            echo esc_html( $category->name ); 
                ?>
                            </h3></a>
                <?php
                        endforeach; 
                    endif;
                ?>
                </div>
                    
                <h2 class="main-header-title"><?php the_title(); ?></h2>
                <?php
                    $description = get_field('ttw_post_description');
                    if($description):
                ?>
                    <p class="main-header-subtitle"><?php echo $description; ?></p>
                <?php
                    endif;
                ?>
            </div>
        </div>
            <div class="posts-catalog">
                <?php 
                    $args = array(
                        'post_type'      => 'lesson',
                        'posts_per_page' => -1,
                        'post_parent'    => $post->ID,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order'
                     );
                    $children = new WP_Query($args);
                    $full = True;
                    if($children->have_posts()): 
                        while($children->have_posts()): $children->the_post();
                            set_query_var('post_full', $full);
                            set_query_var('post_type_conf', 'lesson');
                            get_template_part('content', get_post_format());
                            $full = !$full;
                            $args2 = array(
                                'post_type'      => 'lesson',
                                'posts_per_page' => -1,
                                'post_parent'    => get_the_ID(),
                                'order'          => 'ASC',
                                'orderby'        => 'menu_order'
                            );
                            $grandchildren = new WP_Query($args2);
                            if($grandchildren->have_posts()): 
                                while($grandchildren->have_posts()): $grandchildren->the_post();
                                    set_query_var('post_full', $full);
                                    set_query_var('post_type_conf', 'lesson');
                                    get_template_part('content', get_post_format());
                                    $full = !$full;
                                endwhile;
                            endif;
                        endwhile;
                    else:?>
                    <p class="post-notfound">There is nothing here</p>
                <?php endif; 
                    wp_reset_query();
                ?>
            </div>
        </main>
    </div>
    
    <?php get_footer(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/imagesloaded.pkgd.min.js"></script>
    <script>
        var $grid = $('.posts-catalog').masonry({
            itemSelector: '.post-card',
            gutter: 40,
            horizontalOrder: true,
            fitWidth: true,
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    </script>    
</body>
</html>