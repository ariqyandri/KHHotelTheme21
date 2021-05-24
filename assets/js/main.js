(function ($) {
  (function (m, e, w, s) {
    c = m.createElement(e);
    c.onload = function () {
      Mews.D.apply(null, s);
    };
    c.async = 1;
    c.src = w;
    t = m.getElementsByTagName(e)[0];
    t.parentNode.insertBefore(c, t);
  })(document, "script", "https://www.mews.li/distributor/distributor.min.js", [
    ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"],
  ]);

  $(document).ready(function () {
    window.setTimeout(function () {
      if (window.localStorage) {
        // Get the expiration date of the previous popup.
        var nextPopup = localStorage.getItem("PopUpp");
        var now = new Date();
        now = now.setHours(now.getHours());
        if (nextPopup > now) {
          return;
        }
        // Store the expiration date of the current popup in localStorage.
        var expires = new Date();
        expires = expires.setHours(expires.getHours() + 2);
        localStorage.setItem("PopUpp", expires);
      }
      $("#offerModal").modal("show");
    }, 2000);
  });

  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  var myCarousel = document.querySelector("#myCarousel");
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 100,
    wrap: true,
  });
})(jQuery);
