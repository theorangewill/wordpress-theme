<?php 
    if(have_posts()):
        echo '<nav>';
        ttw_numeric_posts_nav();
        echo '</nav>';
    endif; 
?>