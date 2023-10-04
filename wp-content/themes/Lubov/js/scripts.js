"use strict";

;
(function ($, root, undefined) {
  "use strict";

  Array.from(document.querySelectorAll("a")).forEach(function (a) {
    a.classList.add(location.hostname === a.hostname || !a.hostname.length ? "local" : "external");
  });
  $(function () {
    // DOM ready, take it away
    detectBrowser();
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
      $nav.toggleClass("hero-scrolled", $(this).scrollTop() > $hero.height());
    });
    //*********************** */
    //** => PARALLAX
    //*********************** */
    var parallax = function parallax(elements, direction, amount) {
      if ("undefined" !== elements && elements.length > 0) {
        elements.forEach(function (element) {
          var y = window.innerHeight - element.getBoundingClientRect().top;
          if (y > 0) {
            element.style.transform = "translate3d(0, " + direction + amount * y + "px ,0)";
          }
        });
      }
    };
    var parallaxHorizontal = function parallaxHorizontal(elements, direction, amount) {
      if ("undefined" !== elements && elements.length > 0) {
        elements.forEach(function (element) {
          var y = window.innerHeight - element.getBoundingClientRect().top;
          if (y > 0) {
            element.style.transform = "translate3d(" + direction + amount * y + "px ,0 ,0)";
          }
        });
      }
    };
    var parallaxElements = document.querySelectorAll(".parallax");
    var parallaxReverse = document.querySelectorAll(".parallax-reverse");
    var parallaxHorizontalElems = document.querySelectorAll(".parallax-horizontal");
    console.log("parallax elems below");
    console.log(parallaxElements);
    if (window.innerWidth > 901) {
      parallax(parallaxElements, "-", 0.1);
      parallax(parallaxReverse, "", 0.15);
      parallaxHorizontal(parallaxHorizontalElems, "", 0.1);
      window.onscroll = function () {
        parallax(parallaxElements, "-", 0.1);
        parallax(parallaxReverse, "", 0.15);
        parallaxHorizontal(parallaxHorizontalElems, "", 0.1);
      };
    }
    $(".slide-link-container, .slide-link-close-container").click(function () {
      console.log("click");
      $(".slide-copy").slideToggle("slow");
      var $this = $(this);
      $this.toggleClass("open");
    });
    function addDotButtonText() {
      // loop through each dot element
      $(".owl-dot").each(function () {
        // remove old text nodes
        // $(this).find('.offscreen').remove();
        // grab its (zero-based) order in the series
        var idx = $(this).index() + 1;
        $(this).attr("aria-label", "dot ".concat(idx));

        // append a span to the button containing descriptive text
        $(this).append('<span class="sr-only offscreen">Go to slide ' + idx + "</span>");
      });

      // loop through each owl-prev element
      $(".owl-prev").each(function () {
        // remove old text nodes
        $(this).attr("aria-label", "previous");
        $(this).removeAttr("role");
      });
      // loop through each owl-prev element
      $(".owl-next").each(function () {
        // remove old text nodes
        $(this).attr("aria-label", "next");
        $(this).removeAttr("role");
      });
    }
    setTimeout(function () {
      $(".image-container.owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayHoverPause: true,
        items: 1,
        //events
        onInitialized: addDotButtonText,
        onResized: addDotButtonText
      });
    }, 500);

    //counting graph
    $(".counter").countUp({
      time: 2000,
      delay: 10
    });

    //video modal home page
    $(".video-modal-button").simpleLightbox();

    // Window listeners
    $(window).resize(function () {
      AOS.refresh();
    });
    setTimeout(function () {
      AOS.refresh();
    }, 500);

    //AOS animation
    //TODO: Increase (maybe 750ish) the duration and leave delay as is
    AOS.init({
      offset: 200,
      duration: 500,
      delay: 250
    });

    //menu toggle btn
    $(".burger-container").on("click", function () {
      $(".burger-container ul").toggleClass("active");
      $("body").toggleClass("active-nav");
      $(".mobile-menu-container").toggleClass("active-nav");
    });
  }); //END JQUERY
})(jQuery, void 0);