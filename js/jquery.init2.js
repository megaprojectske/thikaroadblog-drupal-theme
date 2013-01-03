(function($) {

  $(document).ready(function(){
    $('.thumbnail .field-name-field-blog-image').preloader();
    $('.share').hide();
  });

  $(window).load(function(){
    $('.share').fadeIn('slow');
  });

})(jQuery)

