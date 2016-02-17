(function( $ ) {
  'use strict';

  $('.projects__heading').append('<div class="accordian closed"></div>');
  $('.projects__heading .accordian').on( 'click', function() {
    $(this).toggleClass('opened');
    $(this).parent().next('ul').slideToggle();
  })

})( jQuery );