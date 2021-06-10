(function ($) {
  var qv_modal = $("#qv_modal"),
    qv_overlay = $(".qv_overlay"),
    qv_content = $("#qv_content"),
    qv_close = $("#qv_close"),
    qv_wrapper = $(".qv_wrapper"),
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
    //

    var close_qv = function () {
      qv_modal.removeClass("open");
      qv_content.html("");
      $("#qv_modal .qv_main").removeClass("show");
    };
  };

  close_modal_qv();

  $(".modalOpen").click(function () {
    qv_modal.addClass("open");
    //Ajax Call
    var data = {
      action: "load_post_by_ajax",
      id: $(this).data("id"),
      security: blog.security,
    };

    $.post(blog.ajaxurl, data, function (response) {
      qv_content.html(response);
      if (qv_content.html(response)) {
        $("#qv_modal .qv_main").addClass("show");
        
        //Booking Room
        var dateToString = (date) => {
          var dd = date.getDate();
          var mm = date.getMonth() + 1; //January is 0!
          var yyyy = date.getFullYear();
          if (dd < 10) {
            dd = "0" + dd;
          }
          if (mm < 10) {
            mm = "0" + mm;
          }
          return yyyy + "-" + mm + "-" + dd;
        };
        
        var stringToDate = (string) => {
          var value = string.split("-");
          return new Date(value[0], value[1] - 1, value[2]);
        };
        
        var editDate = (name, value) => {
          return $(`#room_modal input[name^='${name}']`)
            .attr("min", value)
            .attr("value", value);
        };
        
        var today = new Date();
        editDate("start", dateToString(today));
        
        var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
        editDate("end", dateToString(tomorrow));

        $("input[name^='start']").change(function () {
          var startDate = stringToDate($(this).val());
          var endDate = new Date(startDate.getTime() + 24 * 60 * 60 * 1000);
          editDate("end", dateToString(endDate));
          console.log(endDate)
        });

        Mews.Distributor(
          { configurationIds: ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"] },
          function (distributor) {
            $("#booking-rooms.booking-submit").click(function (e) {
              var start = new Date();
              var end = new Date();
              results = $("#room_modal #booking-form").serializeArray();
              start = results.find(({ name }) => {
                return name == "start";
              })["value"];
              end = results.find(({ name }) => {
                return name == "end";
              })["value"];
              distributor.setStartDate(stringToDate(start));
              distributor.setEndDate(stringToDate(end));
              distributor.open();
              distributor.showRates($("#room_modal").attr('room-id'));
            });
          }
        );
      }
    });
  });
})(jQuery);
