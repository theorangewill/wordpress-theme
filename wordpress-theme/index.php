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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>
    <div class="t1">
    </div>
    <div class="t2">

    </div>
    <div class="t3">
    
    </div>
    <?php 
        $categories = array();
        foreach (array(1,2,3,4,5,6) as $i){
            if(!empty(get_option('ttw_category_image_'.$i))){
                if(empty($categories['ttw_category_'.$i])){
                    $categories['ttw_category_'.$i] = array();
                    $categories['ttw_category_'.$i]['n'] = $i;
                    $categories['ttw_category_'.$i]['id'] = esc_attr(get_option('ttw_category_id_'.$i));
                }
                $categories['ttw_category_'.$i]['image'] = esc_attr(get_option('ttw_category_image_'.$i));
            }
            if(!empty(get_option('ttw_category_name_'.$i))){
                if(empty($categories['ttw_category_'.$i])){
                    $categories['ttw_category_'.$i] = array();
                    $categories['ttw_category_'.$i]['n'] = $i;
                    $categories['ttw_category_'.$i]['id'] = esc_attr(get_option('ttw_category_id_'.$i));
                }
                $categories['ttw_category_'.$i]['name'] = esc_attr(get_option('ttw_category_name_'.$i));
			}
        }
    ?>

    <nav class="category-menu">
        <?php foreach($categories as $key => $value) : ?>
            <a href="<?php echo get_term_link(get_term($value['id'])); ?>" class="category-item" id="ttw_category_id_<?php echo $value['n']; ?>_preview">
                <img id="ttw_category_image_<?php echo $value['n']; ?>_preview" src="<?php echo $value['image']; ?>" alt="" class="category-img">
                <h2 id="ttw_category_name_<?php echo $value['n']; ?>_preview" 
                <?php if(!empty($value['name'])): ?>
                    class="category-name"
                <?php endif; ?>
                ><?php echo $value['name']; ?></h2>
            </a>
        <?php endforeach; ?>
    </nav>
    <div class="body-container">
        <main class="main-container">
            <div class="content">
                <div class="posts-catalog">
                    <?php 
                        global $wp_query;
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

