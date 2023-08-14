$(document).ready(() => {
  loaddata();

  $("#add-form").submit(function (event) {
    event.preventDefault();
    dataa = {
      student_code: $("#ID").val(),
      full_name: $("#hoTen").val(),
      class: $("#lop").val(),
      mail: $("#mail").val(),
    };
    console.log(dataa);
    $.ajax({
      url: "http://localhost/WebBasic/PHP/crud_api/index.php?controller=student&action=insert",
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
function loaddata() {
  $.ajax({
    url: "http://localhost/WebBasic/PHP/crud_api/index.php?controller=student&action=getStudentAll",
    method: "GET",
    data: {},
    success: function (res) {
      let data = JSON.parse(res);
      if (data != null) {
        if (data.length > 0) {
          let dataResult = "";
          data.forEach((element) => {
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
      }else{
        $("#main").text("No data");
      }
    },
    error: function (err) {
      alert("Error");
    },
  });
}
