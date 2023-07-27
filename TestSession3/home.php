<?php
session_start();
if (empty($_SESSION['is_login'])) {
    header('Location: index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>đây là trang chủ</h1>
    <h2>Chào <strong style="color:brown"><?php echo  $_SESSION['username'] ?></strong></h2>
    <form action="" method="get">
        <input type="submit" value="đăng xuất" name="logout">
    </form>
</body>

</html>