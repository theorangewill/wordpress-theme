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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/search.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>

    <div class="body-container">
        <main class="main-container">
            <div class="main-header">
                <div class="main-header-content">
                    <p class="main-header-subtitle">
                        <?php 
                            $archive_title = explode(':', get_the_archive_title());
                            echo $archive_title[0].': ';
                        ?>
                    </p>
                    <h2 class="main-header-title">
                        <?php echo $archive_title[1]; ?>
                    </h2>
                </div>
            </div>
            <div class="content">
                <div class="posts-catalog">
                    <?php 
                        $full = True;
                        if(have_posts()): 
                            while(have_posts()): the_post();
                                set_query_var('post_full', $full);
                                get_template_part('content', get_post_format());
                                $full = !$full;
                            endwhile;
                        else:?>
                        <p class="post-notfound">There is nothing here</p>
                    <?php endif; ?>
                </div>
                <?php include 'paginator.php' ?>
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

