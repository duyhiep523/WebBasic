<?php
if (isset($_POST['submit'])) {
    $error = array();
    if (empty($_POST['user'])) {
        $error['username'] = "khong duoc bo trong user";
    } 
    if (empty($_POST['pass'])) {
        $error['pass'] = "khong duoc bo trong user";
    } 
 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Hello, world!</title>
</head>

<body>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="user" /><br />
        <p><?php if(!empty($error['username'])) {echo "khong duoc bo trong user"; }?></p>
        <label for="">password</label>
        <input type="password" name="pass" /><br />
        <p><?php if(!empty($error['pass'])) {echo "khong duoc bo trong pass"; }?></p>
        <input type="submit" name="submit" />
    </form>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>

</html>