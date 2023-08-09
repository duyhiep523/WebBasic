$(document).ready(function () {
  $("#number_order").change(() => {
    let number_order = $("#number_order").val();
    let price = $("#price").text();
    let data = { number_order: number_order, price: price };
    $.ajax({
      type: "POST",
      url: "process.php",
      data: data,
      dataType: "text",
      success: function (response) {
        $("#total").text(response);
      },
    });
  });
});
