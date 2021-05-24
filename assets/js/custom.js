(function ($) {
  $(".view-post").click(function () {
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
