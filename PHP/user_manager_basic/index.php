<?php

session_start();
require 'lib/user.php';
require 'data/users.php';
$path = isset($_GET['page']) ? $_GET['page'] : 'home';
$file = 'page/' . $path . '.php';
if (file_exists($file)) {
    require $file;
} else {
    require 'inc/404.php';
}
