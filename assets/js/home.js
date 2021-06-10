(function ($) {
  //Slider
  new Splide("#home-slider", {
    type: "loop",
    height: "85vh",
    cover: true,
    lazyLoad: "nearby",
  }).mount();
  new Splide("#room-slider", {
    perPage: 3,
    trimSpace: false,
    perMove: 1,
    gap: "1rem",
    breakpoints: {
      1100: {
        perPage: 2,
      },
      750: {
        perPage: 1,
      },
    },
  }).mount();
  new Splide("#guestbook-slider", {
    perMove: 1,
    perPage: 2,
    direction: "ttb",
    height: "50vh",
    gap: "1rem",
    autoplay: true,
    rewind: true,
  }).mount();
  //
  
  //Booking Form
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
    return $(`input[name^='${name}']`).attr("min", value).attr("value", value);
  };
  var today = new Date();
  editDate("start", dateToString(today));
  var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
  editDate("end", dateToString(tomorrow));

  $("input[name^='start']").change(function () {
    var startDate = stringToDate($(this).val());
    var endDate = new Date(startDate.getTime() + 24 * 60 * 60 * 1000);
    editDate("end", dateToString(endDate));
    console.log(editDate("end", dateToString(endDate)));
  });

  Mews.Distributor(
    { configurationIds: ["942d3e9f-2347-4bc6-a69f-ab8a00d6b06b"] },
    function (distributor) {
      $("#booking-page.booking-submit").click(function (e) {
        var start = new Date();
        var end = new Date();
        results = $("#booking-form").serializeArray();
        start = results.find(({ name }) => {
          return name == "start";
        })["value"];
        end = results.find(({ name }) => {
          return name == "end";
        })["value"];
        distributor.setStartDate(stringToDate(start));
        distributor.setEndDate(stringToDate(end));
        distributor.open();
        distributor.showRooms();
      });
    }
  );
  //
})(jQuery);
