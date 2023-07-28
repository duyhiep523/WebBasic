<?php
session_start();
require 'connection.php';
if (isset($_POST['btn-login'])) {
    if (!empty($_POST['userName']) && !empty($_POST['password'])) {
        $error_no_user = "";
        $username = $_POST['userName'];
        $password = $_POST['password'];
        if (getUser(trim($username), md5($password))) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            header('Location: home.php');
        } else {
            $error_no_user = "<p class='alert alert-danger mt-2 d-none' id='error-php'>ádf</p>";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <style>
        #form-login {
            margin: auto;
            max-width: 500px;
            border-radius: 5px;
            padding: 10px 30px 30px 30px;
        }

        form input[type="text"],
        form input[type="password"] {
            height: 50px;
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
    <div id="form-login" class="border border-primary">
        <form action="" method="post" class="d-flex justify-content-center align-items-center">
            <div class="row">
                <h1 class="text-center text-primary fw-bold">Đăng nhập</h1>
                <input type="text" class="mt-2" placeholder="User" name="userName" id="user" /><br />
                <input type="password" class="mt-3" placeholder="Password" name="password" id="pass" /><br />
                <input type="submit" class="btn btn-primary mt-3" value="Đăng nhập" name="btn-login" />
                <div class="mt-2 text-center">
                    <p class="alert alert-danger mt-2 d-none" id="alert"></p>
                    <?php if (!empty($error_no_user)) {
                        echo $error_no_user;
                    } ?>
                    <a href="" class="text-decoration-none">Quên mật khẩu?</a>
                </div>
                <div class="border border-Secondary mt-2"></div>

                <p class="btn btn-warning mt-3 "><a href="register.php" class="text-decoration-none text-dark">Tạo tài khoản</a></p>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                let user_name = $('#user');
                let pass = $('#pass');
                let alertError = $("#alert");

                function alert_error(msg) {
                    alertError.removeClass("d-none");
                    alertError.text(msg);
                    setTimeout(function() {
                        alertError.addClass("d-none");
                    }, 3000);
                }
                if (user_name.val() == "") {
                    alert_error("Tên đăng nhập bị trống");
                    user_name.focus();
                    return false;
                }
                if (pass.val() == "") {
                    alert_error("Mật khẩu bị trống");
                    pass.focus();
                    return false;
                }
                let check_php = $("#error-php");
                if (check_php.length > 0) {
                    alert_error("Sai thông tin đăng nhập");
                    return false;
                }
                return true;
            })
        })
    </script>
</body>

</html>