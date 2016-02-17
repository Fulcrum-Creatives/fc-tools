(function( $ ) {
  'use strict';

  $('.projects__heading').append('<div class="accordian closed"></div>');
  $('.projects__heading').on( 'click', function() {
    $(this).find('.accordian').toggleClass('opened');
    $(this).next('ul').slideToggle();
  })

})( jQuery );