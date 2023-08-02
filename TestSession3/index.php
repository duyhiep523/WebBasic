<?php
session_start();
if (isset($_POST['btn-submit'])) {
    if ($_POST['user'] != "" && $_POST['pass'] != "") {
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $_POST['user'];
        header('Location: home.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>session 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    .text_f {
        margin: 15px 10px;
        padding: 5px;
        width: 300px;
        border-radius: 10px;

    }

    input[type="submit"] {
        border-radius: 10px;
        font-weight: bold;
        width: 396px;

    }

    .container {
        height: 100vh;
    }

    form {
        border: 2px solid #316096;
        border-radius: 10px;
        width: 460px;
    }

    label {
        width: 80px;
    }

    .alert {
        display: none;
    }
</style>

<body>
    <div class="container d-flex content justify-content-center align-items-center">
        <form action="" class="p-4" method="post">
            <h1 class="text-center text-primary">Login User</h1>
            <label for="">Username:</label>
            <input type="text" placeholder="Enter user" name="user" class="user text_f">
            <br>
            <label for="">Password:</label>
            <input type="password" placeholder="Enter password" name="pass" class="pass text_f">
            <br>
            <input type="submit" class="btn btn btn-primary" name="btn-submit" value="Login">
            <div class="alert alert-danger mt-3"></div>
        </form>
    </div>

    <script>
        let user = $(".user");
        let pass = $(".pass");
        let alert_dom = $(".alert")

        function alert_erorr(msg) {
            alert_dom.css("display", "block");
            alert_dom.text(msg);
            setTimeout(function() {
                alert_dom.css("display", "none");
            }, 3000)
        }
        $(document).ready(function() {
            $("form").submit(function(e) {

                if (user.val() == "") {
                    alert_erorr("User empty!!!");
                    user.focus();
                    return false;
                }
                if (pass.val() == "") {
                    alert_erorr("Pass empty!!!");
                    pass.focus();
                    return false;
                }
                return true;
            })
        })
    </script>
</body>

</html>