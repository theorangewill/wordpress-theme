<?php foreach($items as $item):?>
    <?php if($left): ?>
    <a href="<?php echo get_category_link($item->term_id); ?>" class="category-card category-card-left wow slideInLeft" data-wow-duration="1s">
    <?php else: ?>
    <a href="<?php echo get_category_link($item->term_id); ?>" class="category-card category-card-right wow slideInRight" data-wow-duration="1s">
    <?php endif; ?>
        <div class="category-card-body">
            <?php if(get_field('ttw_category_image', 'subject_'.$item->term_id)): ?>
            <div class="category-card-img">
                <img src="<?php echo get_field('ttw_category_image', 'subject_'.$item->term_id);?>" alt="">
            </div>
            <?php endif; ?>
            <div class="category-card-content">
                <h3 class="category-card-title"><?php echo $item->name; ?></h3>
                <h6 class="category-card-date"><?php ?></h6>
                <p class="category-card-text"><?php echo $item->description; ?></p>
            </div>
        </div>
    </a>
<?php
    $left = !$left;
endforeach;
?>