<header class="header-container">
    <div class="logo-container">
        <a href="<?php echo get_home_url();?>">
            <?php 
                $ttw_custom_logo = get_theme_mod('custom_logo');
                $ttw_logo = wp_get_attachment_image_src($ttw_custom_logo, 'full');
                if(has_custom_logo()){
                    echo '<img src="'. esc_url($ttw_logo[0]) .'" class="logo" alt="'. get_bloginfo('name') .'-logo">';
                }
                else{
                    echo '<h1 class="logo-title">'. get_bloginfo('name') .'</h1>';
                }
            ?>
        </a>
    </div>
    <div class="menu-container">
        <?php 
            //
        ?>
        <nav class="menu">
            <?php
                if ( has_nav_menu('header_menu') ) {
                    wp_nav_menu(
                        array(
                            'menu' => 'header_menu',
                            'container' => '',
                            'theme_location' => 'header_menu',
                            'items_wrap' => '<ul id="" class="menu-list">%3$s</ul>'
                        )
                    );
                }
            ?>

        </nav>
        <div class="search-container">
            <div class="search-bar">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
    <div class="menu-toggle-container">
        <button class="menu-toggle-button"><i class="fa fa-bars"></i></buttona>
        <nav class="menu-toggle">
            <?php
                if ( has_nav_menu('toggle_menu') ) {
                    wp_nav_menu(
                        array(
                            'menu' => 'toggle_menu',
                            'container' => '',
                            'theme_location' => 'toggle_menu',
                            'items_wrap' => '<ul id="" class="menu-list">%3$s</ul>'
                        )
                    );
                }
            ?>
        </nav>
    </div>
</header>