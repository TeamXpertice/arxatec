
  (function ($) {
  
  "use strict";

    // PRE LOADER
    $(window).load(function(){
      $('.preloader').delay(500).slideUp('slow'); // set duration in brackets    
    });

    // NAVBAR
    $(".navbar").headroom();

    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });

    $('.slick-slideshow').slick({
      autoplay: true,
      infinite: true,
      arrows: false,
      fade: true,
      dots: true,
    });

    $('.slick-testimonial').slick({
      arrows: false,
      dots: true,
    });
    
  })(window.jQuery);


    function showPopup() {
        document.getElementById('ad-popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('ad-popup').style.display = 'none';
    }

    // Muestra el pop-up después de que la página ha cargado
    window.onload = function() {
        setTimeout(showPopup, 1000); // Ajusta el tiempo según sea necesario
    };
