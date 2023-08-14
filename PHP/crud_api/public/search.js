$(document).ready(() => {
  $(document).on("keyup", "#text_search", function () {
    console.log($("#text_search").val());
    dataa = {
      key: $("#text_search").val(),
    };
    console.log(dataa);
    $.ajax({
      url: "http://localhost/WebBasic/PHP/crud_api/index.php?controller=student&action=search",
      method: "post",
      data: dataa,
      dataType: "json",
      success: function (response) {
        console.log(response);
        // let data = JSON.parse(response);
        console.log(response.mail);
        if (response != null) {
          if (response.length > 0) {
            let dataResult = "";
            response.forEach((element) => {
              dataResult += "<tr>";
              dataResult += "<td>" + element.student_code + "</td>";
              dataResult += "<td>" + element.full_name + "</td>";
              dataResult += "<td>" + element.class + "</td>";
              dataResult += "<td>" + element.mail + "</td>";
              dataResult += "<td>";
              dataResult +=
                '<button class="btn btn-warning update" data-bs-toggle="modal" ';
              dataResult += 'data-bs-target="#modal-update">Sửa</button>';
              dataResult += '<button class="btn btn-danger dele">Xóa</button>';
              dataResult += "</td>";
              dataResult += "</tr>";
            });

            $("#main").html(dataResult);
          } else {
            $("#main").text("No data");
          }
        } else {
          $("#main").text("No data");
        }
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
