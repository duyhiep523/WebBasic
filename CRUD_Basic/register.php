<?php
require 'connection.php';
if (isset($_POST['register'])) {
    $phone = $_POST['phone_number'];
    $user = $_POST['account_name'];
    $pass = $_POST['account_password'];
    $passRe = $_POST['account_password_Re'];
    if (!empty($phone) && !empty($user) && !empty($pass) && !empty($passRe)) {
        if ($pass == $passRe) {
            if (addUser($phone, $user, md5($pass))) {
                $create_success = "thanh cong";
                header('Location: index.php');
            } else {
                $create_failed = "<p id='php_failed' class='d-none'></p>123123</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <title>Document</title>
    </head>
    <style>
        #register {
            margin: auto;
            margin-top: 30px;
            width: 600px;
            padding: 20px 40px;
            border: 2px solid #333;
        }
    </style>


    <body>
        <form action="" method="post" id="register">
            <div class="row">
                <h1 class="text-center">Đăng ký</h1>
                <label for="" class="col-4">Số điện thoại</label>
                <input type="text" class="col-8 my-1" name="phone_number" placeholder="Enter your phone number" id="phone_number" />
                <label for="" class="col-4">Tên người dùng</label>
                <input type="text" class="col-8 my-1" name="account_name" placeholder="Enter username" id="username" />
                <label for="" class="col-4">Mật khẩu</label>
                <input type="password" class="col-8 my-1" name="account_password" id="password" />
                <label for="" class="col-4">Nhập lại mật khẩu</label>
                <input type="password" class="col-8 my-1" name="account_password_Re" id="password-re" />
                <p class="alert alert-danger my-2 d-none" id="error"></p>
                <?php
                if (!empty($create_failed)) {
                    echo $create_failed;
                }
                ?>
                <input type="submit" name="register" value="Đăng ký" class="btn btn-info my-1" id="btn-register" />
            </div>
        </form>
        <script>
            $(document).ready(function () {
                console.log("hìad");
                $("#btn-register").click(function () {
                    let phone_number = $("#phone_number");
                    let username = $("#username");
                    let password = $("#password");
                    let passwordRe = $("#password-re");
                    let error = $("#error");

                    function arlertError(msg) {
                        error.toggleClass("d-none");
                        error.text(msg);
                        setTimeout(() => {
                            error.toggleClass("d-none");
                        }, 3000);
                    }
                    if (phone_number.val() == "") {
                        arlertError("Không được để trống số điện thoại");
                        phone_number.focus();
                        return false;
                    }
                    if (Number.isInteger(phone_number.val())) {
                        arlertError("Số điện thoại sai");
                        phone_number.focus();
                        return false;
                    }
                    if (username.val() == "") {
                        arlertError("Không được để trống username");
                        username.focus();
                        return false;
                    }
                    if (password.val() == "") {
                        arlertError("Không được để trống mật khẩu");
                        password.focus();
                        return false;
                    }
                    if (passwordRe.val() == "") {
                        arlertError("Phải nhập lại mật khẩu");
                        passwordRe.focus();
                        return false;
                    }
                    if (passwordRe.val() != password.val()) {
                        arlertError("Mật khẩu nhập lại không khớp");
                        passwordRe.focus();
                        return false;
                    }
                    if ($("#php_failed").length > 0) {
                        arlertError("Thêm thất bại");
                        return false;
                    }
                    return true;
                });
            });
        </script>
    </body>

</html>