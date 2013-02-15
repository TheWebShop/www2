(function($) {
  $(function() {
    var $subNav = $('.current-menu-item, .current-menu-ancestor')
      .first()
      .find('ul')
      .addClass('nav  nav--stacked')
      .first()
      .appendTo('#sub-nav');

    if(Modernizr.retinadisplay) {
      $('img[data-retina]').each(function() {

        $(this).on('load', function() {
          var $image = $(this);
          var height = $image.height();
          var width = $image.width();
          var src= $image.data('retina');

          $image.prop({
            src: src,
            height: height,
            width: width
          });
        });
      });
    }
  });
})(jQuery);

//Detect high res displays (Retina, HiDPI, etc...)
Modernizr.addTest('retinadisplay', function(){ 

  if (window.matchMedia) { 
    var mq = window.matchMedia("only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2), only screen and (-webkit-min-device-pixel-ratio: 2), only screen  and (min-device-pixel-ratio: 2), only screen and (min-resolution: 2dppx)");

    if(mq && mq.matches) {
      return true;
    } else {
      return false;
    }  

  } else {
    return false;
  }
});
