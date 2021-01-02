jQuery(document).ready( function($){
	var categories = [1, 2, 3, 4, 5, 6];

	categories.forEach(cat => {
		var id = $('#ttw_category_id_'.concat(cat)).val();
		$('#ttw_category_id_'.concat(cat).concat('_preview')).attr('href');
		if(id == ''){
			$('#ttw_category_id_'.concat(cat).concat('_preview')).css('display', 'none');
		}
		else{
			$('#ttw_category_id_'.concat(cat).concat('_preview')).css('display', 'inline');
		}

		var mediaUploader_i;
		$('#ttw_category_image_'.concat(cat).concat('_upload')).on('click',function(e) {
			e.preventDefault();
			if( mediaUploader_i ){
				mediaUploader_i.open();
				return;
			}
			
			mediaUploader_i = wp.media.frames.file_frame = wp.media({
				title: 'Choose an Image',
				button: {
					text: 'Ok'
				},
				multiple: false
			});
			
			mediaUploader_i.on('select', function(){
				attachment = mediaUploader_i.state().get('selection').first().toJSON();
				$('#ttw_category_image_'.concat(cat).concat('_id')).val(attachment.url);
				$('#ttw_category_image_'.concat(cat).concat('_name')).text(attachment.url.split('/').pop());
			});
			mediaUploader_i.open();
		});
		$('#ttw_category_image_'.concat(cat).concat('_cancel')).on('click',function(e){
			$('#ttw_category_image_'.concat(cat).concat('_id')).val('');
			$('#ttw_category_image_'.concat(cat).concat('_name')).text('');
		});
	});


	$('#clear_menu').on('click',function(e){
		categories.forEach(cat => {
			$('#ttw_category_id_'.concat(cat)).val('');
			$('#ttw_category_id_'.concat(cat).concat('_preview')).css('display', 'none');
			$('#ttw_category_name_'.concat(cat)).val('');
			$('#ttw_category_image_'.concat(cat).concat('_id')).val('');
			$('#ttw_category_name_'.concat(cat).concat('_preview')).removeClass('category-name');
			$('#ttw_category_name_'.concat(cat).concat('_preview')).text('');
			$('#ttw_category_image_'.concat(cat).concat('_preview')).attr('src', '');;
		});
	})

	$('#preview_update').on('click',function(e){
		categories.forEach(cat => {
			var id = $('#ttw_category_id_'.concat(cat)).val();
			$('#ttw_category_id_'.concat(cat).concat('_preview')).attr('href', '');
			if(id == ''){
				$('#ttw_category_id_'.concat(cat).concat('_preview')).css('display', 'none');
			}
			else{
				$('#ttw_category_id_'.concat(cat).concat('_preview')).css('display', 'inline');
			}

			var name = $('#ttw_category_name_'.concat(cat)).val();
			if(name == '')
				$('#ttw_category_name_'.concat(cat).concat('_preview')).removeClass('category-name');
			else if($('#ttw_category_name_'.concat(cat).concat('_preview')).text() == '')
				$('#ttw_category_name_'.concat(cat).concat('_preview')).addClass('category-name');
			$('#ttw_category_name_'.concat(cat).concat('_preview')).text(name);

			var image = $('#ttw_category_image_'.concat(cat).concat('_id')).val();
			$('#ttw_category_image_'.concat(cat).concat('_preview')).attr('src', image);
		});
	})
});