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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/author.css">
    <?php wp_head(); ?>
<body>
    <?php get_header(); ?>
    <div class="body-container">
        <main class="main-container">
            <div class="author-content">
                <div class="author-header">
                    <h2 class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name');  ?></h2>
                    <div class="author-container">
                        <div class="author-box">
                            <img class="author-pic" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>">
                            <div class="author-links">
                                <?php if(get_field('ttw_author_site', 'user_'.$author)): ?>
                                    <a href="<?php echo get_field('ttw_author_site', 'user_'.$author); ?>"><i class="fa fa-link"></i></a>
                                <?php endif; ?>
                                <?php if(get_field('ttw_author_curriculum', 'user_'.$author)): ?>
                                    <a href="<?php echo get_field('ttw_author_curriculum', 'user_'.$author); ?>"><i class="fa fa-sticky-note-o"></i></a>
                                <?php endif; ?>
                                <?php if(get_field('ttw_author_linkedin', 'user_'.$author)): ?>
                                    <a href="https://www.linkedin.com/in/<?php echo get_field('ttw_author_linkedin', 'user_'.$author); ?>"><i class="fa fa-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if(get_field('ttw_author_twitter', 'user_'.$author)): ?>
                                    <a href="https://www.twitter.com/<?php echo get_field('ttw_author_twitter', 'user_'.$author); ?>"><i class="fa fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if(get_field('ttw_author_instagram', 'user_'.$author)): ?>
                                    <a href="https://www.instagram.com/<?php echo get_field('ttw_author_instagram', 'user_'.$author); ?>"><i class="fa fa-instagram"></i></a>
                                <?php endif; ?>
                            </div>
                            <img class="author-email" src="<?php echo get_field('ttw_author_email_image', 'user_'.$author)['url'];?>">
                        </div>
    
                        <p class="author-decription"><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                </div>
                <div class="author-body">
                    <?php
                        $author_fields = get_posts( array(
                            'author'      => $id,
                            'order'          => 'ASC',
                            'orderby'     => 'menu_order',
                            'numberposts' => -1,
                            'post_type'      => 'authorfield'
                        ));
                        $author_interests = array();
                        $author_experiences = array();
                        foreach($author_fields as $field){
                            if(get_field('ttw_author_field_type', $field->ID) == 'interest')
                                array_push($author_interests, $field);
                            if(get_field('ttw_author_field_type', $field->ID) == 'experience')
                                array_push($author_experiences, $field);
                        }
                    ?>
                    <?php if($author_interests): ?>
                    <div class="author-interests">
                        <div class="author-thing-header">
                            <div class="author-thing-title">
                                <h3 class="author-thing-name">
                                <?php 
                                    if(get_option('ttw_interests_name'))
                                        echo get_option('ttw_interests_name');
                                    else
                                        echo 'Interests';
                                ?>
                                </h3>
                                <?php if(get_option('ttw_interests_info')): ?>
                                <div class="author-thing-question" 
                                    data-toggle="question-interests-popover"
                                    data-content="<?php echo get_option('ttw_interests_info'); ?>"
                                    id="question-interests-id">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="author-thing-list">
                            <?php foreach($author_interests as $key => $interest):?>
                            <div class="author-thing-item">
                            
                                <img src="<?php echo get_the_post_thumbnail_url($interest->ID); ?>" 
                                    class="author-thing-item-icon" 
                                    data-toggle="tooltip" 
                                    data-placement="top" 
                                    title="<?php echo $interest->post_title; ?>">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($author_experiences): ?>
                    <div class="author-technicalknowledgement">
                        <div class="author-thing-header">
                            <div class="author-thing-decorated-left"></div>
                            <div class="author-thing-title">
                                <h3 class="author-thing-name">
                                <?php 
                                    if(get_option('ttw_experiences_name'))
                                        echo get_option('ttw_experiences_name');
                                    else
                                        echo 'Experiences';
                                ?>
                                </h3>
                                <?php if(get_option('ttw_experiences_info')): ?>
                                <div class="author-thing-question" 
                                    data-toggle="question-technicalknowledgement-popover" 
                                    data-content="<?php echo get_option('ttw_experiences_info'); ?>"
                                    id="question-technicalknowledgement-id">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="author-thing-decorated-right"></div>
                        </div>
                        <div class="author-thing-set">
                            <?php foreach($author_experiences as $key => $experience):?>
                            <div class="author-thing-element">
                                <img src="<?php echo get_the_post_thumbnail_url($experience->ID); ?>" 
                                    class="author-thing-element-icon"
                                    data-toggle="technicalknowledgement-popover-<?php echo $experience->ID; ?>"
                                    data-title="<?php echo $experience->post_title; ?>"
                                    data-content="<?php echo get_field('ttw_author_field_description', $experience->ID); ?>">
                                <div class="author-thing-element-progress progress">
                                    <div class="progress-bar 
                                                progress-bar-striped 
                                                progress-bar-animated" 
                                        style="width: <?php echo get_field('ttw_author_field_progress', $experience->ID); ?>%"
                                        role="progressbar"></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="author-publications">
                        <div class="author-thing-header">
                            <div class="author-thing-decorated-left"></div>
                            <div class="author-thing-title">
                                <h3 class="author-thing-name">
                                <?php 
                                    if(get_option('ttw_publications_name'))
                                        echo get_option('ttw_publications_name');
                                    else
                                        echo 'Lastest Content';
                                ?>
                                </h3>
                                <?php if(get_option('ttw_publications_info')): ?>
                                <div class="author-thing-question" 
                                    data-toggle="question-publications-popover" 
                                    data-content="<?php echo get_option('ttw_publications_info'); ?>"
                                    id="question-publications-id">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="author-thing-decorated-right"></div>
                        </div>
                        <?php
                        $latest_posts = get_posts( array(
                            'author'      => $id,
                            'orderby'     => 'date',
                            'post_type'      => 'any',
                            'numberposts' => -1
                        ));
                        $author_categories = array();
                        foreach($latest_posts as $latest_post){
                            $post_subjects = get_the_terms($latest_post, 'subject');
                            foreach($post_subjects as $subject){
                                if(!in_array($subject->term_id.'-'.$subject->taxonomy, $author_categories, true)){
                                    $author_categories[$subject->term_id.'-'.$subject->taxonomy] = $subject ;
                                }
                            }
                            $post_categories = get_the_terms($latest_post, 'category');
                            foreach($post_categories as $category){
                                if(!in_array($category->term_id.'-'.$category->taxonomy, $author_categories, true)){
                                    $author_categories[$category->term_id.'-'.$category->taxonomy] = $category ;
                                }
                            }
                        }
                        ?>
                        <div class="author-categories">
                            <?php foreach($author_categories as $category): ?>
                                <a class="author-category" href="<?php echo get_term_link($category->term_id, $category->taxonomy); ?>"><?php echo $category->name;?></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="author-posts">
                            <?php
                            $latest_posts = get_posts( array(
                                'author'      => $id,
                                'orderby'     => 'date',
                                'numberposts' => 7,
                                'post_type'      => 'any'
                            ));
                            foreach($latest_posts as $latest_post):
                            ?>
                                <a class="author-post" href="<?php echo get_permalink($latest_post->ID); ?>"><?php echo $latest_post->post_title; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo get_home_url(); ?>?s=william" class="custom-button">More</a>
                    </div>
                </div>
            </div>
        </main>
    </div>


    
    <?php get_footer(); ?>
    
    <script src="<?php bloginfo('template_url'); ?>/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    
    <script>
        $(function(){            
            $('.toggle').click(function(){
                $('.menu-toggle').toggleClass('ativo');
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $('[data-toggle="question-interests-popover"]').popover({
                title: '',
                placement: 'top'
            });
            $('[data-toggle="question-technicalknowledgement-popover"]').popover({
                title: '',
                placement: 'top'
            });
            $('[data-toggle="question-publications-popover"]').popover({
                title: '',
                placement: 'top'
            });
            <?php foreach($author_experiences as $key => $experience):?>
            $('[data-toggle="technicalknowledgement-popover-<?php echo $experience->ID; ?>"]').popover({
                placement: 'bottom',
                trigger: 'hover'
            });
            <?php endforeach; ?>
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