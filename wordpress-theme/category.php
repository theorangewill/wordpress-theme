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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/category.css">
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header(); ?>
    <?php $category = get_queried_object(); ?>
    <div class="body-container">
        <div class="main-header-container">
            <div class="main-header">
                <div class="main-header-content">
                    <h2 class="main-header-title">
                       <?php echo $category->name; ?>
                    </h2>
                    <p class="main-header-subtitle">
                        <?php echo $category->description; ?>    
                    </p>
                    <?php if($category->parent): ?>
                    <div class="main-header-categories">
                        <a href="<?php echo get_category_link($category->parent); ?>">
                        <h3 class="main-header-category" >
                            <?php echo get_cat_name($category->parent);  ?>
                        </h3></a>
                    </div>
                    <?php 
                        $category_children = get_categories(array('parent' => $category->term_id));
                        if($category_children): 
                    ?>
                    <div class="main-header-children">
                    <?php foreach($category_children as $category_child): ?>
                        <a href="<?php echo get_category_link($category_child->term_id); ?>">
                        <h3 class="main-header-child" >
                    <?php echo $category_child->name;  ?>
                        </h3></a>
                    <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
            </div>
        </div>
        <main class="main-container">
            <?php if(!$category->parent): ?>
            <div class="category-cards-catalog">
                <?php 
                    $items = get_terms( $category->taxonomy, array(
                        'parent'    => $category->term_id,
                        'hide_empty' => false
                    ) );
                    $left = True;
                    if($items): 
                        include 'catalog.php';
                    else:?>
                    <p class="post-notfound">There is nothing here</p>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="posts-catalog">
                <?php 
                    if(have_posts()): 
                        while(have_posts()): the_post();
                            set_query_var('post_full', $full);
                            set_query_var('post_type_conf', 'subcategory');
                            get_template_part('content', get_post_format());
                            $full = !$full;
                        endwhile;
                    else:?>
                    <p class="post-notfound">There is nothing here</p>
                <?php endif; 
                    wp_reset_query();
                ?>
            </div>
            <?php include 'paginator.php' ?>

                
            <?php endif; ?>

        </main>
    </div>

    
    <?php get_footer(); ?>

    <?php if(!$category->parent): ?>
    <script src="<?php bloginfo('template_url'); ?>/js/wow.min.js" ></script>
    <script>
        $(function(){
            new WOW().init();
        });
    </script>
    <?php else: ?>
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
    <?php endif; ?>
</body>
</html>