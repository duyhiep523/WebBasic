<?php
require 'function_login.php';
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

        form input[type="text"] {
            height: 50px;
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
    <div id="form-login" method="post" class="border border-primary">
        <form action="index.php" class="d-flex justify-content-center align-items-center">
            <div class="row">
                <h1 class="text-center text-primary fw-bold">Đăng nhập</h1>
                <input type="text" class="mt-2" placeholder="User" name="userName" /><br />
                <input type="text" class="mt-3" placeholder="Password" name="password" /><br />
                <input type="submit" class="btn btn-primary mt-3" value="Đăng nhập" name="btn-login" />
                <div class="mt-2 text-center">
                    <div class="alert alert-danger mt-2 d-none"></div>
                    <a href="" class="text-decoration-none">Quên mật khẩu?</a>
                </div>
                <div class="border border-Secondary mt-2"></div>
                <input type="button" class="btn btn-warning mt-3" value="Tạo tài khoản" />
            </div>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>

</html>