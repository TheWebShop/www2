(function($) {
	$(function() {
		var $subNav = $('.current-menu-item, .current-menu-ancestor')
			.first()
			.find('ul')
			.addClass('nav  nav--stacked')
			.first()
			.appendTo('#sub-nav');
	});
})(jQuery);