(function($){
	wp.customize("ttw_customize_colors_darktheme", function(value) {
		value.bind(function(newval) {
			$("#ttw_customize_colors_darktheme").html(newval);
		} );
	});

})(jQuery);