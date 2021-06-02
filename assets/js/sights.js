(function ($) {
  new Splide("#sight-splide", {
    type  : 'fade',
    rewind: true,
    height: "80vh",
    cover: true,
    lazyLoad: 'nearby',
  }).mount();
})(jQuery);
