$(document).ready(function () {
  $(document).on("click", ".update", function () {
    const row = $(this).closest("tr");
    const cells = row.find("td");
    const id = cells.eq(0).text();
    const hoTen = cells.eq(1).text();
    const lop = cells.eq(2).text();
    const mail = cells.eq(3).text();
    $("#ID-up").val(id);
    $("#hoTen-up").val(hoTen);
    $("#lop-up").val(lop);
    $("#mail-up").val(mail);
  });
  $("#up").submit(function () {
    dataa = {
      student_code: $("#ID-up").val(),
      full_name: $("#hoTen-up").val(),
      class: $("#lop-up").val(),
      mail: $("#mail-up").val(),
    };

    $.ajax({
      url: "http://localhost/WebBasic/PHP/crud_api/index.php?controller=student&action=update",
      method: "post",
      data: dataa,
      dataType: "json",
      success: function (response) {
        loaddata();
        $("#msg").html(response.message);
      },
      error: function (xhr) {
        alert(
          "ER: Hệ thống gặp sự cố, vui lòng thử lại sau ít phút. Chi tiết lỗi: " +
            xhr.responseText +
            ", " +
            xhr.status +
            ", " +
            xhr.error
        );
      },
    });
  });
});
