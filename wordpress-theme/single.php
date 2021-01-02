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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/post.css">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>
        <?php 
            if(have_posts()){
                while(have_posts()): the_post();
                    get_template_part('content', get_post_format());
                endwhile;
            }
            else{
                get_404_template();
            }
        ?>
            
        
    <?php get_footer(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/ttw.js" ></script>
    <script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $(document).ready(function(){
                $('[data-toggle="author-popover"]').popover({
                    container: '#post-author-id',
                    html: true,
                    content: function () { return '<div class="post-author-popover">'
                        + '<img class="post-author-popover-image" src="' 
                        + $(this).data('img') + '" />'
                        + '<p class="post-author-popover-text"">' + $(this).data('text') + '</p>'
                        + '</div>'; }
                });
                $('[data-toggle="share-popover"]').popover({
                    container: '#post-share-id',
                    html: true,
                    content: function () { return '<div class="post-share-popover">'
                        + '<a href="#"><i class="fa fa-envelope"></i></a>' 
                        + '<a href="#"><i class="fa fa-twitter"></i></a>'
                        + '<a href="#"><i class="fa fa-whatsapp"></i></a>'
                        + '<a href="#"><i class="fa fa-facebook-f"></i></a>'
                        + '<a href="#"><i class="fa fa-print"></i></a>'
                        + '<a href="#"><i class="fa fa-copy"></i></a>'
                        + '</div>'; }
                });
                
            });
            $('.toggle').click(function(){
                $('.menu-toggle').toggleClass('ativo');
            });
            $('#post-sidebar-circle-left-id').click(function(){
                $('#post-sidebar-left-id').toggleClass('ativo');
                $(this).toggleClass('ativo');
                $(this).find('i').toggleClass('fa-chevron-right fa-chevron-left');
            });
            $('#post-sidebar-circle-right-id').click(function(){
                $('#post-sidebar-right-id').toggleClass('ativo');
                $(this).toggleClass('ativo');
                $(this).find('i').toggleClass('fa-chevron-left fa-chevron-right');
            });
            $('.post-references-title').click(function(){
                $('.post-references-text').toggleClass('ativo');
                $(this).toggleClass('ativo');
                $(this).find('i').toggleClass('fa-chevron-right fa-chevron-down');
            });
            $('.post-comments-header').click(function(){
                $('.post-comments-body').toggleClass('ativo');
                $('.post-comment-add').toggleClass('ativo');
                $(this).toggleClass('ativo');
                $(this).find('i').toggleClass('fa-chevron-right fa-chevron-down');
            });
            $('.post-comment-add').click(function(){
                $('.post-comment-new').toggleClass('ativo-new');
                $(this).toggleClass('ativo-new');
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
            $('.post-comment-reply-icon').click(function(){
                $('.post-comment-reply-new').toggleClass('ativo');
                $(this).toggleClass('ativo');
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
            $("html").on("mouseup", function (e) {
                var l = $(e.target);
                if (l[0].className.indexOf("popover") == -1) {
                    $(".popover").each(function () {
                        $(this).popover("hide");
                    });
                }
            });
        });
    </script>
</body>
</html>