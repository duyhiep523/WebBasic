<?php
require 'inc/header.php';
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';

$act = isset($_GET['act']) ? $_GET['act'] : 'main';
$file = 'modules/' . $mod . "/" . $act . '.php';
if (file_exists($file)) {
    require $file;
} else {
    require 'inc/404.php';
}
require 'inc/footer.php';
