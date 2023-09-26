;(function ($, root, undefined) {
  "use strict"

  Array.from(document.querySelectorAll("a")).forEach((a) => {
    a.classList.add(
      location.hostname === a.hostname || !a.hostname.length
        ? "local"
        : "external"
    )
  })

  $(function () {
    // DOM ready, take it away
    // detectBrowser()
    // Browser detection.
    function detectBrowser() {
      var isChrome =
          /Chrome/.test(navigator.userAgent) &&
          /Google Inc/.test(navigator.vendor),
        isSafari =
          /Safari/.test(navigator.userAgent) &&
          /Apple Computer/.test(navigator.vendor),
        isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1,
        isIE =
          /MSIE/.test(navigator.userAgent) ||
          /Trident/.test(navigator.userAgent),
        isEdge = /Edge/.test(navigator.userAgent),
        isOpera =
          /OPR/.test(navigator.userAgent) && /Opera/.test(navigator.vendor),
        hoolite_body = jQuery("body")

      if (isChrome) {
        hoolite_body.addClass("is-chrome")
      }
      if (isSafari) {
        hoolite_body.addClass("is-safari")
      }
      if (isFirefox) {
        hoolite_body.addClass("is-firefox")
      }
      if (isIE) {
        hoolite_body.addClass("is-ms-explorer")
      }
      if (isEdge) {
        hoolite_body.addClass("is-edge")
      }
      if (isOpera) {
        hoolite_body.addClass("is-opera")
      }
    }
    //passive event listeners for pagespeed
    // Passive event listeners for IE
    jQuery.event.special.touchstart = {
      setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {
          passive: !ns.includes("noPreventDefault"),
        })
      },
    }
    jQuery.event.special.touchmove = {
      setup: function (_, ns, handle) {
        this.addEventListener("touchmove", handle, {
          passive: !ns.includes("noPreventDefault"),
        })
      },
    }
    //*********************** */
    //** => ELEMENTS
    //*********************** */
    $( ".slide-link, .slide-link-close" ).click(function() {
      console.log('click')
      $( ".slide-copy" ).slideToggle( "slow" );
          var $this = $(this);
            $this.toggleClass("open");
    });
    $('.image-container.owl-carousel').owlCarousel({
      loop: true,
      nav: false,
      autoplay: true,
      autoplayHoverPause: true,
      items: 1,
    })
  }) //END JQUERY
})(jQuery, this)
