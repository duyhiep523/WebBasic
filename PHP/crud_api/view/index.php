<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


  <title>Crud API</title>
</head>

<body>
  <div class="container mt-3">
    <h2 class="text-center">Quản lý sinh viên</h2>
    <button class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#modal-add">
      Thêm
    </button>
    <form class="d-flex mb-3" id="search" method="post">
      <input class="form-control me-2" id="text_search" type="text" placeholder="Search">
    </form>
    <div class="modal" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm sinh viên</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="" id="add-form" method="post">
              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="ID" name="text" placeholder="" />
                <label for="ID">ID</label>
              </div>
              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="hoTen" name="text" placeholder="" id="name" />
                <label for="hoTen">Họ tên</label>
              </div>
              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="lop" name="text" placeholder="" />
                <label for="lop">Lớp</label>
              </div>
              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="mail" name="text" placeholder="" />
                <label for="mail">Email</label>
              </div>
              <input type="submit" class="btn btn-success mt-3" value="Thêm" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Họ tên</th>
          <th>Lớp</th>
          <th>Email</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody id="main">
      </tbody>
    </table>
  </div>
  <div class="modal" id="modal-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sửa sinh viên</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" id="up">
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="ID-up" name="text" readonly />
              <label for="ID">ID</label>
            </div>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="hoTen-up" name="text" />
              <label for="hoTen">Họ tên</label>
            </div>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="lop-up" name="text" />
              <label for="lop">Lớp</label>
            </div>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="mail-up" name="text" />
              <label for="mail">Email</label>
            </div>
            <input type="submit" class="btn btn-success mt-3" value="Cập nhật" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../public/load.js">
  </script>
  <script src="../public/update.js">
  </script>
  <script src="../public/dele.js">
  </script>
  <script src="../public/search.js">
  </script>
</body>



</html>