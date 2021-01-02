<div class="wrap">
	<h1>Categories Menu</h1>
	<p class="description">To work well, you need to put 3 or 6 categories</p>
    <?php settings_errors();?>
    <?php 
        $categories = array();
        foreach (array(1,2,3,4,5,6) as $i){
            if(!empty(get_option('ttw_category_image_'.$i))){
                if(empty($categories['ttw_category_'.$i])){
                    $categories['ttw_category_'.$i] = array();
                    $categories['ttw_category_'.$i]['n'] = $i;
                    $categories['ttw_category_'.$i]['id'] = esc_attr(get_option('ttw_category_id_'.$i));
                }
                $categories['ttw_category_'.$i]['image'] = esc_attr(get_option('ttw_category_image_'.$i));
            }
            if(!empty(get_option('ttw_category_name_'.$i))){
                if(empty($categories['ttw_category_'.$i])){
                    $categories['ttw_category_'.$i] = array();
                    $categories['ttw_category_'.$i]['n'] = $i;
                    $categories['ttw_category_'.$i]['id'] = esc_attr(get_option('ttw_category_id_'.$i));
                }
                $categories['ttw_category_'.$i]['name'] = esc_attr(get_option('ttw_category_name_'.$i));
			}
			if(empty($categories['ttw_category_'.$i]['n'])){
				$categories['ttw_category_'.$i]['n'] = $i;
			}
        }
    ?>
	<div class="container">
        <div class="form-container">
            <form method="post" action="options.php">
                <?php settings_fields('ttw-settings-category') ?>
                <?php do_settings_sections('ttw_theme_custom_categories') ?>
				<input type="button" class="button button-clear" value="Clear" id="clear_menu">
                <?php submit_button(); ?>
            </form>
        </div>
        <div class="preview-container">
			<input type="button" class="button" value="Update Preview" id="preview_update">
            <nav class="category-menu">
                <?php foreach($categories as $key => $value) : ?>
                    <a href="<?php echo get_category_link($value['id']); ?>" class="category-item" id="ttw_category_id_<?php echo $value['n']; ?>_preview">
                        <img id="ttw_category_image_<?php echo $value['n']; ?>_preview" src="<?php echo $value['image']; ?>" alt="" class="category-img">
						<h2 id="ttw_category_name_<?php echo $value['n']; ?>_preview" 
						<?php if(!empty($value['name'])): ?>
							class="category-name"
						<?php endif; ?>
						><?php echo $value['name']; ?></h2>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
	</div>
</div>