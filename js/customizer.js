/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
	wp.customize('blogname', function(value) {
		value.bind( function(blogname) {
			$( '.site-title a' ).html(blogname);
		} );
	} );
	wp.customize('www2_theme_options[showTitle]', function(value) {
		value.bind( function(isShown) {
			$('.site-title-text')[isShown? 'fadeIn': 'fadeOut']();
		} );
	} );
	wp.customize('blogdescription', function(value) {
		value.bind( function(blogdescription) {
			$( '.site-description' ).html(blogdescription);
		} );
	} );
	wp.customize('www2_theme_options[showDescription]', function(value) {
		value.bind( function(isShown) {
			$('.site-description')[isShown? 'fadeIn': 'fadeOut']();
		} );
	} );
	wp.customize('www2_theme_options[credits]', function(value) {
		value.bind( function(credits) {
			$('.site-credits').html(credits);
		} );
	} );
})(jQuery);