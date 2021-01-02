<footer class="footer-container">
    <img class="logo" src="<?php echo get_theme_mod("ttw_customize_footer_image"); ?>" alt="">
    <nav class="menu">
        <ul class="menu-list">
            <?php
                if ( has_nav_menu('footer_menu') ) {
                    wp_nav_menu(
                        array(
                            'menu' => 'footer_menu',
                            'container' => '',
                            'theme_location' => 'footer_menu',
                            'items_wrap' => '<ul id="" class="menu-list">%3$s</ul>'
                        )
                    );
                }
            ?>
        </ul>
    </nav>
    <p class="footer-rights">
        2020 Direitos Reservados
    </p>
</footer>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js" ></script>
<script>

    <?php if(get_theme_mod('background_image')): ?>
        $('.body-container').css('background-image', 
                                    'url(<?php background_image(); ?>');
        $('.body-container').css('background-size', 
                                '<?php echo get_theme_mod('background_size', 
                                    get_theme_support('custom-background', 'default-size')); ?>');
        $('.body-container').css('background-repeat', 
                                '<?php echo get_theme_mod('background_repeat', 
                                    get_theme_support('custom-background', 'default-repeat')); ?>');
        $('.body-container').css('background-position-x', 
                                '<?php echo get_theme_mod('background_position_x', 
                                    get_theme_support('custom-background', 'default-position-x')); ?>');
        $('.body-container').css('background-position-y', 
                                '<?php echo get_theme_mod('background_position_y', 
                                    get_theme_support('custom-background', 'default-position-y')); ?>');
        $('.body-container').css('background-attachment', 
                                '<?php echo get_theme_mod('background_attachment', 
                                    get_theme_support('custom-background', 'default-attachment')); ?>');
    <?php endif; ?>
    $('.body-container').css('background-color', 
                                '<?php echo '#'.get_theme_mod('background_color', 
                                get_theme_support('custom-background', 'default-color')); ?>');
    
</script> 
<?php wp_footer(); ?>