<?php $args = get_query_var('post_type_conf'); ?>

<?php if($args == 'lesson'): 
    $args = get_query_var('post_full'); ?>
    <?php if($args): ?>
        <a href="<?php the_permalink(); ?>" class="post-card post-card-top">
    <?php else: ?>
        <a href="<?php the_permalink(); ?>"  class="post-card post-card-full">
    <?php endif; ?>
            <div class="post-card-img-container">
                <?php the_post_thumbnail('post-thumbnail', array('class'=>'post-card-img')); ?>
            </div>
            <div class="post-card-body">
                <h3 class="post-card-title"><?php the_title(); ?></h3>
                <p class="post-card-text"><?php echo get_the_excerpt(); ?></p>
            </div>
        </a>
<?php elseif(is_single()): ?>

<div class="body-container">
    <main class="main-container">
        
        <div class="main-header">
            <div class="main-header-content">
                <div class="main-header-categories">
                <?php 
                    $categories = get_the_category();
                    foreach($categories as $category): 
                ?>
                        <a href="<?php echo get_category_link($category->term_id); ?>">
                        <h3 class="main-header-category" ><?php echo $category->name; ?></h3></a>
                <?php endforeach; 
                    $subjects = get_the_terms($post->ID, 'subject');
                    foreach($subjects as $subject): 
                ?>
                        <a href="<?php echo get_category_link($subject->term_id); ?>">
                        <h3 class="main-header-category" ><?php echo $subject->name; ?></h3></a>
                <?php endforeach; ?>
                </div>
                    
                <h2 class="main-header-title"><?php the_title(); ?></h2>
                <?php
                    $description = get_field('ttw_post_description');
                    if($description):
                ?>
                    <p class="main-header-subtitle"><?php echo $description; ?></p>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <?php
            $post_content = get_field('ttw_post_content');
            $post_content = preg_replace('<br />','&',$post_content);
            $post_content = preg_replace('/<&>\s+/', '&', $post_content);
            if($post_content):
        ?>
                <div class="sidebar-left">
                    <div class="post-sidebar-left">
                        <div class="post-sidebar-content" id="post-sidebar-left-id">
                            <div class="post-sidebar-contents-title">Contents</div>
                            <ul class="post-sidebar-contents-list">
                            <?php
                                parse_str($post_content, $post_content);
                                foreach($post_content as $key => $value):
                                    if(!(strpos($key, 'subitem') === False)):
                            ?>
                                <li><a class="post-sidebar-contents-subitem" href="#<?php echo $key; ?>"><?php echo $value; ?></a></li>
                            <?php
                                    elseif(!(strpos($key, 'item') === False)):
                            ?>          
                                <li><a class="post-sidebar-contents-item" href="#<?php echo $key; ?>"><?php echo $value; ?></a></li>
                            <?php 
                                    endif;
                                endforeach; 
                            ?>   
                            </ul>          
                            <span class="post-sidebar-circle" id="post-sidebar-circle-left-id"><i class="fa fa-chevron-right"></i></span>  
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php  
            global $post;
            if(get_post_type() == 'lesson' and $post->post_parent): 
        ?>
        <div class="sidebar-right">
            <div class="post-sidebar-right">
                <div class="post-sidebar-content" id="post-sidebar-right-id">
                    <div class="post-sidebar-contents-title">Other lessons</div>
                    <div class="post-sidebar-contents-list">
                    <?php
                        $current_post = $post->ID;
                        $direct_parent = $post->post_parent;
                        if(get_post_ancestors($direct_parent))
                            $direct_parent = get_post_ancestors($direct_parent)[0];
                        $args = array(
                            'post_type'      => 'lesson',
                            'posts_per_page' => -1,
                            'post_parent'    => $direct_parent,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order'
                        );
                        $lesson_children = new WP_Query($args);
                        $prev_flag = False;
                        $next_flag = False;
                        $current_flag = False;
                        $post_previous = '';
                        $post_next = '';
                        if($lesson_children->have_posts()): 
                            while($lesson_children->have_posts()):
                                $lesson_children->the_post();
                                if($current_flag && !$next_flag){
                                    $post_next = get_the_ID();
                                    $next_flag = True;
                                }
                                $current_flag = False;
                                if(get_the_ID() == $current_post){  
                                    echo '<span class="post-sidebar-contents-item current">
                                              '.get_the_title(get_the_ID()).'</span>';
                                    $prev_flag = True;
                                    $current_flag = True;
                                }
                                else{
                                    echo '<a class="post-sidebar-contents-item" 
                                             href="'.get_post_permalink(get_the_ID()).'">
                                         '.get_the_title(get_the_ID()).'</a>';
                                }
                                if(!$prev_flag){
                                    $post_previous = get_the_ID();
                                }
                            
                                $args2 = array(
                                    'post_type'      => 'lesson',
                                    'posts_per_page' => -1,
                                    'post_parent'    => get_the_ID(),
                                    'order'          => 'ASC',
                                    'orderby'        => 'menu_order'
                                );
                                $lesson_grandchildren = new WP_Query($args2);
                                if($lesson_grandchildren->have_posts()): 
                                    while($lesson_grandchildren->have_posts()): $lesson_grandchildren->the_post();
                                        if($current_flag && !$next_flag){
                                            $post_next = get_the_ID();
                                            $next_flag = True;
                                        }
                                        if(get_the_ID() == $current_post){  
                                            echo '<span class="post-sidebar-contents-subitem current">
                                                    '.get_the_title(get_the_ID()).'</span>';
                                            $prev_flag = True;
                                            $current_flag = True;
                                        }
                                        else{
                                            echo '<a class="post-sidebar-contents-subitem" 
                                            href="'.get_post_permalink(get_the_ID()).'">
                                            '.get_the_title(get_the_ID()).'</a>';
                                        }
                                        if(!$prev_flag){
                                            $post_previous = get_the_ID();
                                        }
                                    endwhile;
                                endif;
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                    <span class="post-sidebar-circle" id="post-sidebar-circle-right-id"><i class="fa fa-chevron-left"></i></span>  
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="post-content">
        <div class="post-body">
            <div class="post-text">
                <?php 
                the_content(); 
                ?>
            </div>
            <div class="post-actions">
                <div class="post-action-report" data-toggle="modal" data-target="#modal-report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                <div class="post-action-share" id="post-share-id" data-toggle="share-popover" data-placement="right" data-trigger="click"><i class="fa fa-share-alt"></i></div>
            </div>
            <?php
                if(get_post_type() == 'lesson'){
                    $previous_post = '';
                    if($post_previous)
                        $previous_post = get_post($post_previous);
                    $next_post = '';
                    if($post_next)
                        $next_post = get_post($post_next);
                }
            ?>
            <?php if($next_post): ?>
            <div class="post-next">
                <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <i class="fa fa-arrow-circle-right post-next-icon"></i>
                </a>
            </div>
            <?php endif; ?>
            <?php if($previous_post): ?>
            <div class="post-prev">
                <a href="<?php echo get_permalink($previous_post->ID); ?>">
                    <i class="fa fa-arrow-circle-left post-prev-icon"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <div class="post-footer-content">
            <?php   $post_references =  get_field('ttw_post_references');
                if($post_references): ?>
            <div class="post-references">
                <div class="post-references-title">References <i class="fa fa-chevron-right"></i></div>
                <div class="post-references-text">
                    <?php echo $post_references; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="post-footer">
                <div class="post-tags">
                    <?php
                        $post_lessons = get_field('ttw_post_lessons');
                        $lessons_tag = get_tag($post_lessons);

                        $lessons_in_tags = false; 
                        $post_tags = get_the_tags();
                        if($post_tags):
                            foreach($post_tags as $tag):
                                if($post_lessons == $tag->term_id)
                                    $lessons_in_tags = true;
                    ?>
                                <a class="post-tag" 
                                    href="<?php echo get_tag_link($tag->term_id); ?>">
                                        <?php echo $tag->name; ?></a>
                    <?php 
                            endforeach;
                        endif; 
                        if($post_lessons && !$lessons_in_tags): ?>
                            <a class="post-tag" 
                                href="<?php echo get_tag_link($lessons_tag->term_id); ?>">
                                    <?php echo $lessons_tag->name; ?></a>
                    <?php
                        endif;
                    ?>
                </div>
                <div class="post-footer-content">
                    <div class="post-date">
                        <div class="post-date-publication">
                            <span>Publicado em: </span><?php the_date(); ?>
                        </div>
                        <?php if(get_the_date() != get_the_modified_date()): ?>
                            <div class="post-date-update">
                                <span>Atualizado em: </span><?php the_modified_date(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="post-author" id="post-author-id"><span>Autor: </span>
                        <?php 
                            $author_display_name = get_the_author_meta('display_name');
                            $author_bio = get_the_author_meta('user_description');
                            if(strlen($author_bio) >= 125)
                                $author_bio = substr(get_the_author_meta('user_description'), 0, 120).'[..]';
                            $author_avatar = get_avatar_url(get_the_author_meta('ID'));
                            $author_url = get_author_posts_url(get_the_author_meta('ID'));
                        ?>
                        <a data-toggle="author-popover" data-placement="bottom" data-trigger="hover"
                            data-img="<?php echo $author_avatar; ?>"
                            data-text="<?php echo $author_bio; ?>"
                            href="<?php echo $author_url; ?>"><?php echo $author_display_name; ?></a></div>
                    </div>
                </div>
                <?php
                    if (comments_open()){
                        comments_template();
                    }
                    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
                        wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
                    }
                ?>
            </div>

        </main>
    </div>
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="post-report">
            <div class="post-report-header">
              <h5 class="post-report-title">Report Error</h5>
              <button class="post-report-close" type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>
            <div class="post-report-body">
            <div class="wpforms-container wpforms-container-full form-custom" id="wpforms-227">
                <form id="wpforms-form-227" 
                    class="form-custom" 
                    data-formid="227" method="post" 
                    enctype="multipart/form-data" 
                    action="/theme/?p=273" data-token="1c6f2fe299a88cda4925dddd07fd91e3">
                    <noscript class="wpforms-error-noscript">
                    Please enable JavaScript in your browser to complete this form.</noscript>
                

                    <div class="form-row">
                        <div id="wpforms-227-field_0-container" class="col" data-field-id="0">
                            <input type="text" id="wpforms-227-field_0" 
                            class="form-control form-control-sm" 
                            name="wpforms[fields][0]" placeholder="Nome" required>
                        </div>
                        <div id="wpforms-227-field_1-container" class="col" data-field-id="1">
                            <input type="email" id="wpforms-227-field_1" 
                            class="form-control form-control-sm" 
                            name="wpforms[fields][1]" placeholder="Email" required>
                        </div>
                    </div>
                    <div id="wpforms-227-field_2-container" class="form-group" data-field-id="2">
                        <textarea rows="3" id="wpforms-227-field_2" 
                        class="form-control form-control-sm" 
                        name="wpforms[fields][2]" required></textarea>
                    </div>
                    <input type="hidden" name="wpforms[id]" value="227">
                    <input type="hidden" name="wpforms[author]" value="1">
                    <input type="hidden" name="wpforms[post_id]" value="273">
                    <button type="submit" name="wpforms[submit]" 
                    class="form-custom-button" 
                    id="wpforms-submit-227" 
                    value="wpforms-submit" aria-live="assertive">Submit</button>
                </form>
            </div>



                <form class="form-custom">
                <div class="form-row">
                    <div class="col">
                      <input type="text" class="form-control form-control-sm" id="post-report-nome" placeholder="Nome" required>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control form-control-sm" id="post-report-email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <textarea rows="3" class="form-control form-control-sm" id="post-report-text" placeholder="Mensagem" required></textarea>
                </div>
                <button type="submit" class="form-custom-button">Enviar</button>
                </form>
            </div>
          </div>
        </div>
    </div>




<?php else:
    $args = get_query_var('post_full'); ?>
    <?php if($args): ?>
        <a href="<?php the_permalink(); ?>" class="post-card post-card-top">
    <?php else: ?>
        <a href="<?php the_permalink(); ?>"  class="post-card post-card-full">
    <?php endif; ?>
            <div class="post-card-img-container">
                <?php the_post_thumbnail('post-thumbnail', array('class'=>'post-card-img')); ?>
            </div>
            
            <?php 
                $categories = get_the_category();
                if($categories)
                    echo '<h5 class="post-card-category">'.$categories[0]->name.'</h5>';
            ?>
        
            <div class="post-card-body">
                <h3 class="post-card-title"><?php the_title(); ?></h3>
                <h6 class="post-card-date"><?php echo get_the_date(); ?></h6>
                <p class="post-card-text"><?php echo get_the_excerpt(); ?></p>
            </div>
        </a>
<?php endif;?>


