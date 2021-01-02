
<div class="post-comments">
	<div class="post-comments-body">
</div>
    <div class="post-comments-header">
        <?php 
            $num_comments = get_comments_number(); 
            if($num_comments == 0) $header_comments = 'No comments';
            elseif($num_comments == 1) $header_comments = '1 comment';
            else $header_comments = $num_comments.' comments';
        ?> <?php echo $header_comments; ?> <i class="fa fa-chevron-right"></i>
    </div>
    <div class="post-comments-body">
        <?php wp_list_comments('type=comment&callback=ttw_comment_custom'); ?>
        <?php
      $pages = paginate_comments_links(['echo' => false, 'type' => 'array', 'prev_text' => '&laquo;',
                                        'next_text' => '&raquo;']);

      if( is_array( $pages ) ):
        
        $output = '';
        foreach ($pages as $page) {
          $page = "\n".'<li class="page-item">'.$page.'</li>'."\n";
          if (strpos($page, ' current') !== false) 
            $page = str_replace([' current', "<li class='page-item'>"], ['', '<li class="page-item active">'], $page);
          $output .= $page;
        }
        ?>
        <nav>
            <ul class="pagination">
                <?=$output?>
            </ul>
        </nav>
    <?php
      endif;
    ?>
    </div>
    <div class="post-comment-add"><i class="fa fa-plus"></i></div>
        <div class="post-comment-new">
            <?php 
                $args = array(
                    'title_reply' => '',
                    'comment_notes_before' => '',
                    'class_form' => 'form-custom',
                    'class_submit' => 'form-custom-button',
                    'label_submit' => 'Send'
                );
            
            comment_form($args);?>
        </div>
    </div>
</div>
