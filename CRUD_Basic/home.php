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


if (isset($_POST['btn_save'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    if (updateProduct($id, $name, $price)) {
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
if (isset($_POST['btn_dele'])) {
    $id = $_POST['product_id'];
    echo $id;
    if (deleProduct($id)) {
        header("Location: " . $_SERVER['PHP_SELF']);
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<style>
    body {
        position: relative;
    }

    #max_screen {
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        position: relative;
        position: absolute;
        background: rgba(0, 0, 0, 0.5);
    }

    .hiddden {
        visibility: hidden;
    }

    #form_control {
        top: 60px;
        left: 50%;
        transform: translateX(-50%);
        width: 500px;
        padding: 20px 40px;
        border: 2px solid black;
        background-color: #92b9e3;
        position: absolute;
    }
</style>

<body>

<div id="max_screen" class="hiddden">
    <form action="" method="POST" id="form_control">
        <div class="row">
            <label for="" class="col-4">Mã sản phẩm</label>
            <input type="" class="col-8 mb-2" value="adss" readonly name="product_id" id="product_id"/>
            <br/>
            <label for="" class="col-4">Tên</label>
            <input type="text" class="col-8 mb-2" value="" name="product_name" id="product_name"/>
            <br/>
            <label for="" class="col-4">Giá</label>
            <input type="text" class="col-8 mb-2" value="" name="price" id="price"/>
            <br/>
            <p class="alert alert-danger mt-2 d-none asdf" id="error-php">
                Không tồn tại người dùng
            </p>
            <input type="submit" class="col-6 btn btn-primary" value="Lưu" name="btn_save" id="btn_save"/>
            <input type="submit" class="col-6 btn btn-danger" value="Xóa" name="btn_dele" id="btn_dele"/>
        </div>
    </form>
</div>


<div class="container-fluid bg-dark text-light text-center">
    <div class="row">
        <p class="col-md-11">Chào mừng <strong> <?php echo $_SESSION['user_login']; ?></strong></p>
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
                <tr class="hidee selected-row">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value['product_id']; ?></td>
                    <td><?php echo $value['product_name']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "không có dữ liệu vui lòng thêm dữ liệu";
    }
    ?>

</div>
<script>
    $(document).ready(function () {
        $("#btn_save").click(function () {
            let product_name = $('#product_name');
            let price = $('#price');
            let alertError = $(".asdf");

            function alert_error(msg) {
                alertError.removeClass("d-none");
                alertError.text(msg);
                setTimeout(function () {
                    alertError.addClass("d-none");
                }, 3000);
            }

            if (product_name.val() == "") {
                alert_error("Tên bị trống");
                product_name.focus();
                return false;
            }
            if (price.val() == "" || isNaN(parseFloat(price.val()))) {
                alert_error("Giá bị trống hoặc sai định dạng");
                price.focus();
                return false;
            }
        })
        $(document).on("click", function (event) {
           if (
                !$("#form_control").is(event.target) &&
                $("#form_control").has(event.target).length === 0
            ) {
                $("#max_screen").addClass("hiddden");
            }
        });
        $(".hidee").click(function (event) {
            event.stopPropagation();
            $(".hidee").removeClass("selected-row");
            $(this).addClass("selected-row");
            let product_id = $(this).find("td:nth-child(2)").text();
            let product_name = $(this).find("td:nth-child(3)").text();
            let price = $(this).find("td:nth-child(4)").text();
            $("#product_id").val(product_id);
            $("#product_name").val(product_name);
            $("#price").val(price);
            $("#max_screen").removeClass("hiddden");
        });
        return true;
    });
</script>
</body>

</html>