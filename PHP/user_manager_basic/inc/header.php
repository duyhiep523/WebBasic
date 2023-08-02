<?php ?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

        <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
        <!-- https://cdnjs.com/libraries/font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" href="public/css/style.css">
        <title>điều hướng</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=news">tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=product">sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=about">thêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">liên hệ</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-primary"><?php
if (isset($_SESSION['is_login'])) {
    echo ($_SESSION['user_login']);
}
?></button>
            </div>
        </nav>