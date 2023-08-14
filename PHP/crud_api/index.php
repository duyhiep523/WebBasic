<?php
if (isset($_GET['controller']) && isset($_GET['action'])) {

    $controller = $_GET['controller'] . "Controller";

    $action = $_GET['action'];

    $path = "./controller/$controller.php";
    if (file_exists($path)) {
        include $path;
        $object = new $controller();
        $object->$action();
    } else {
        echo json_encode(array(
            "status" => false,
            "message" => "controller not found"
        ));
    }
}else{
    header("Location:view/index.php");
}
