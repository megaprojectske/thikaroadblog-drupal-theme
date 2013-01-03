(function($) {

  $(document).ready(function(){
    $('#nodes .thumbnail').preloader();
    $('#nodes .content').css('top', '-56px').find('h2').css('line-height','40px');
    $('#nodes').masonry({
      itemSelector: '.entry',
      isAnimated: true,
      isFitWidth: true
    });
    $('#nodes .entry').hoverIntent({
      over: makeLarge,
      timeout: 100, out:
      makeSmall
    });
  });

  function makeLarge() {
    $(this).addClass('active').css('z-index','2');
    $(this).find('.content').animate({top: '-231px'}, 200);
    $(this).find('h2').css('line-height','1em');
  }

  function makeSmall() {
    $(this).css('z-index','1');
    $(this).find('.content').animate({top: '-56px'}, 200);
    $(this).find('h2').css('line-height','40px');
  }

})(jQuery)
