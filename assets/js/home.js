(function ($) {
  $(document).ready(function () {
    var owl = $(".guestbook-slider");
    owl.owlCarousel({
      autoHeight: true,
      nav: false,
      loop: true,
      touchDrag: false,
      mouseDrag: false,
      freeDrag: false,
      pullDrag: false,
      autoplay: true,
      animateOut: "fadeOut",
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
  });

  $(document).ready(function () {
    var owl = $(".room-slider");
    owl.owlCarousel({
      margin: 10,
      nav: true,
      loop: true,
      navClass: [
        "<div class='nav-btn prev-slide'></div>",
        "<div class='nav-btn next-slide'></div>",
      ],
      autoplayTimeout: 5000,
      responsive: {
        0: {
          items: 1,
        },
        800: {
          items: 1,
        },
        1200: {
          items: 2,
        },
      },
    });
  });

  $(document).ready(function () {
    var owl = $(".home-slider");
    owl.owlCarousel({
      autoHeight: true,
      nav: false,
      loop: true,
      touchDrag: false,
      mouseDrag: false,
      freeDrag: false,
      pullDrag: false,
      autoplay: true,
      animateOut: "fadeOut",
      autoplayTimeout: 10000,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
  });

  function viewportToPixels(value) {
    var parts = value.match(/([0-9\.]+)(vh|vw)/);
    var q = Number(parts[1]);
    var side =
      window[["innerHeight", "innerWidth"][["vh", "vw"].indexOf(parts[2])]];
    return side * (q / 100);
  }

  center_modal = function () {
    var window_w = $(window).width(),
      window_h = $(window).height(),
      width_px = viewportToPixels(window_w),
      height_px = viewportToPixels(window_h),
      width = width_px ,
      height = height_px- 70;
    qv_wrapper.css({
      left: window_w / 2 - width / 2,
      top: window_h / 2 - height / 2,
    });
    console.log(height)
  };

  center_modal();
})(jQuery);
