"use strict";

;
(function ($, root, undefined) {
  "use strict";

  Array.from(document.querySelectorAll("a")).forEach(function (a) {
    a.classList.add(location.hostname === a.hostname || !a.hostname.length ? "local" : "external");
  });
  $(function () {
    // DOM ready, take it away
    // detectBrowser()
    // Browser detection.
    function detectBrowser() {
      var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor),
        isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor),
        isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1,
        isIE = /MSIE/.test(navigator.userAgent) || /Trident/.test(navigator.userAgent),
        isEdge = /Edge/.test(navigator.userAgent),
        isOpera = /OPR/.test(navigator.userAgent) && /Opera/.test(navigator.vendor),
        hoolite_body = jQuery("body");
      if (isChrome) {
        hoolite_body.addClass("is-chrome");
      }
      if (isSafari) {
        hoolite_body.addClass("is-safari");
      }
      if (isFirefox) {
        hoolite_body.addClass("is-firefox");
      }
      if (isIE) {
        hoolite_body.addClass("is-ms-explorer");
      }
      if (isEdge) {
        hoolite_body.addClass("is-edge");
      }
      if (isOpera) {
        hoolite_body.addClass("is-opera");
      }
    }
    //passive event listeners for pagespeed
    // Passive event listeners for IE
    jQuery.event.special.touchstart = {
      setup: function setup(_, ns, handle) {
        this.addEventListener("touchstart", handle, {
          passive: !ns.includes("noPreventDefault")
        });
      }
    };
    jQuery.event.special.touchmove = {
      setup: function setup(_, ns, handle) {
        this.addEventListener("touchmove", handle, {
          passive: !ns.includes("noPreventDefault")
        });
      }
    };

    //nav bar scroll
    //nav bar scroll
    $(window).on("scroll", function () {
      var $nav = $("header");
      var $hero = $(".hero");
      $nav.toggleClass('hero-scrolled', $(this).scrollTop() > $hero.height());
    });
    //*********************** */
    //** => ELEMENTS
    //*********************** */
    $(".slide-link, .slide-link-close").click(function () {
      console.log('click');
      $(".slide-copy").slideToggle("slow");
      var $this = $(this);
      $this.toggleClass("open");
    });
    $('.image-container.owl-carousel').owlCarousel({
      loop: true,
      nav: false,
      autoplay: true,
      autoplayHoverPause: true,
      items: 1
    });

    //counting graph
    $(".counter").countUp({
      time: 2000,
      delay: 10
    });

    //video modal home page
    $(".video-modal-button").simpleLightbox();

    // Window listeners
    $(window).resize(function () {
      check();
      AOS.refresh();
    });
    setTimeout(function () {
      AOS.refresh();
    }, 500);

    //AOS animation
    AOS.init({
      offset: 200,
      duration: 500,
      delay: 250
    });

    //menu toggle btn 
    $('#menuToggle').on("click", function () {
      console.log('click');
      $(this).toggleClass("active");
      $('.mobile-menu-container').toggleClass('active');
      $('body').toggleClass("mobile-menu-active");
    });
  }); //END JQUERY
})(jQuery, void 0);