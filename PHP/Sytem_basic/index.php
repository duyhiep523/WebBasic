<?php
require 'inc/header.php';
$path = isset($_GET['page']) ? $_GET['page'] : 'home';
$file= 'page/' . $path . '.php';
if(file_exists($file)){
    require $file;
}else{
    require 'inc/404.php';
}
require 'inc/footer.php';
