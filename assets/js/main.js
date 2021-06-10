(function ($) {
  //Mews
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
  //

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

  // Navbar
  const menu = document.querySelector(".menu-icon");
  const mobileNav = document.querySelector("#menu");
  menu.addEventListener("click", function () {
    mobileNav.classList.toggle("open");
  });
  $(".parent").hover(
    function () {
      $(`#${this.id} > .sub-menu`).css({
        width: $(`#${this.id} > a`).outerWidth(),
      });
      $(`#${this.id} > .sub-menu`).show();
    },
    function () {
      $(".sub-menu").hide();
    }
  );
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      $(".header").css({ top: 0 });
    } else {
      $(".header").css({ top: "-100px" });
    }
    prevScrollpos = currentScrollPos;
  };
  //

  // Gallery
  $(".wp-block-gallery").hide();
  //

  // Slider
  new Splide("#post-slider", {
    type: "fade",
    rewind: true,
    height: "50vh",
    autoWidth: true,
    focus: "center",
    perPage: 1,
  }).mount();
  //
})(jQuery);
