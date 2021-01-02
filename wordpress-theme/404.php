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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/error.css">
    <link rel="stylesheet" href="node_modules/wowjs/css/libs/animate.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>

    <div class="body-container">
        <img class="error-image" src="images/error-image.jpeg" alt="">
        <main class="main-container">
            <div class="error-message">
                <h2 class="error-title">404 error</h2>
                <h3 class="error-subtitle">Page not found</h3>
            </div>
        </main>
    </div>


    <?php get_footer(); ?>
</body>
</html>