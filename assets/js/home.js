(function ($) {
  new Splide("#home-slider", {
    type  : 'fade',
    rewind: true,
    height: "85vh",
    cover: true,
    lazyLoad: 'nearby',
  }).mount();
  new Splide("#room-splide", {
    perPage: 3,
    rewind : true,
  }).mount();
})(jQuery);
