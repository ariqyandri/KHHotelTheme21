(function ($) {
  var qv_modal = $("#quick-view-modal"),
    qv_overlay = $(".quick-view-overlay"),
    qv_content = $("#quick-view-content"),
    qv_close =$("#quick-view-close"),
    qv_wrapper = $(".wcqv-wrapper"),
    qv_wrapper_w = qv_wrapper.width(),
    qv_wrapper_h = qv_wrapper.height(),
    center_modal = function () {
      var window_w = $(window).width(),
        window_h = $(window).height(),
        width = window_w - 60 > qv_wrapper_w ? qv_wrapper_w : window_w - 60,
        height = window_h - 120 > qv_wrapper_h ? qv_wrapper_h : window_h - 120;
      qv_wrapper.css({
        left: window_w / 2 - width / 2,
        top: window_h / 2 - height / 2,
      });
    };

  var close_modal_qv = function () {
    // Close box by click overlay
    qv_overlay.on("click", function (e) {
      close_qv();
    });
    // Close box with esc key
    $(document).keyup(function (e) {
      if (e.keyCode === 27) close_qv();
    });
    // Close box by click close button
    qv_close.on("click", function (e) {
      e.preventDefault();
      close_qv();
    });

    // Close after add to cart
    function runAfterElementExists(jquery_selector, callback) {
      var checker = window.setInterval(function () {
        if ($(jquery_selector).length) {
          clearInterval(checker);
          callback();
        }
      }, 250);
    }

    setInterval(() => {
      runAfterElementExists(
        "#quick-view-modal .added_to_cart.wc-forward",
        function () {
          close_qv();
        }
      );
    }, 200);
    //

    var close_qv = function () {
      qv_modal.removeClass("open");
      qv_content.html("");
      $("#quick-view-modal .wcqv-main").removeClass("show");
    };
  };

  close_modal_qv();

  center_modal();

  $(".modalOpen").click(function () {
    qv_modal.addClass("open");
    //Ajax Call
    var data = {
      action: "load_post_by_ajax",
      id: $(this).data("id"),
      security: blog.security,
    };

    $.post(blog.ajaxurl, data, function (response) {
      response = JSON.parse(response);
      var gallery = response.gallery.map((img, i) => {
        if (typeof img != "string") {
          return "";
        }
        return `<div class="carousel-item ${i === 0 ? "active" : ""}">
        <img src=${img} class="d-block w-100" alt="room-image" />
      </div>`;
      });
      var facilities = response.facilities.map(({ name, icon }) => {
        return `<div><img src=${icon} alt=${name}></img><p>${name}</p></div>`;
      });
      var policies = response.policies.map(({ title, description }) => {
        return `<div><h3>${title}</h3><p>${description}</p></div>`;
      });
      $("#room-content h1").empty();
      $("#room-content p").empty();
      $("#room-price").empty();
      $("#room-image").empty(); //add image
      $("#room-facilities").empty();
      $("#room-policies").empty();
      $("#room-offer p").empty();

      $("#room-content h1").html(response.title);
      $("#room-content p").html(response.content);
      $("#room-price").html(response.price);
      // $("#room-image").append(response.thumbnail);
      $("#room-image").append(...gallery); //add image
      $("#room-facilities").append(...facilities);
      $("#room-policies").append(...policies);
      $("#room-offer p").html(response.offer);
    });
  });
})(jQuery);
