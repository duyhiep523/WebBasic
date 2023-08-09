<?php include_once('admin/layout/header.php'); ?>
<h1>Trang đăng nhập!</h1>
<form method="post" action="">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login-btn" value="Đăng nhập" /></td>
        </tr>
    </table>
</form>
<?php include_once('admin/layout/footer.php'); ?>