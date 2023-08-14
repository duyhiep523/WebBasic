$(document).ready(function () {
  $(document).on("click", ".dele", function () {
    const row = $(this).closest("tr");
    const id = row.find("td").eq(0).text();
    dataa = { student_code: id };
    $.ajax({
      url: "http://localhost/WebBasic/PHP/crud_api/index.php?controller=student&action=delete",
      method: "post",
      data: dataa,
      dataType: "json",
      success: function (response) {
        // loaddata();
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
