<?php
session_start();
require 'connection.php';
if (empty($_SESSION['is_login'])) {
    header('Location: index.php');
}
if (isset($_POST['btn_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid bg-dark text-light text-center">
        <div class="row">
            <p class="col-md-11">Chào mừng <strong> <?php echo  $_SESSION['user_login']; ?></strong></p>
            <div class="col-md-1">
                <form action="" method="post">
                    <input type="submit" name="btn_logout" value="Đăng xuất" class="btn btn-secondary">
                </form>
            </div>
        </div>

    </div>

    <div class="container mt-3">
        <?php if (is_array(getProduct())) { ?>
            <table class="table table-success table-hover table-striped text-center ">
                <h1 class="text-center mb-3">Bảng danh sách sản phẩm</h1>
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arr = getProduct();
                    $count = 0;
                    foreach ($arr as $value) {
                        $count++;
                    ?>
                        <tr>
                            <td><?php echo  $count; ?></td>
                            <td><?php echo  $value['product_id']; ?></td>
                            <td><?php echo  $value['product_name']; ?></td>
                            <td><?php echo  $value['price']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
            echo "không có dữ liệu vui lòng thêm dữ liệu";
        } ?>

    </div>
</body>

</html>