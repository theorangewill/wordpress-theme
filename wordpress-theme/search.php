<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/geral.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/plugins.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/search.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>
    <div class="body-container" id="body-container">
        <main class="main-container">
            <div class="main-header">
                <div class="main-header-content">
                    <p class="main-header-subtitle">
                        <?php 
                            $total_results = $wp_query->found_posts;
                            echo sprintf('%s', $total_results) . ' search results for: ';
                        ?>
                    </p>
                    <h2 class="main-header-title">
                        <?php the_search_query(); ?>
                    </h2>
                </div>
            </div>
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
                    <div class="search-container">
                        <div class="search-bar">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php include 'paginator.php' ?>
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