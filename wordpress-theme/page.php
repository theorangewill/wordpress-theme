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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/about.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>

    <div class="body-container">
        <main class="main-container">
            <div class="about-content">
                <h2 class="about-name"><?php the_title(); ?></h2>
                <p class="about-text"><?php the_content(); ?></p>
            </div>
        </main>
    </div>

    <?php get_footer(); ?>
</body>
</html>