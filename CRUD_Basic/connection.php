<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "crud_basic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getUser($user_text, $pass_text)
{
    global $conn;
    $sql = "select account_name,account_password from system_users where account_name='" . $user_text . "' and account_password='" . $pass_text . "'";
    try {
        $result = $conn->query($sql);
    } catch (Exception $e) {
        return false;
    }
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($user_text == $user['account_name'] && $pass_text == $user['account_password']) {
            return true;
        }
        return false;
    }
    return false;
}
function getProduct()
{
    global $conn;
    $sql = "select * from product";
    try {
        $result = $conn->query($sql);
    } catch (Exception $e) {
        return null;
    }
    if ($result->num_rows > 0) {
        $arr = array();
        while ($product = $result->fetch_assoc()) {
            $arr[] = array(
                'product_id' => $product['product_id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                'create_by' => $product['create_by'],
                'update_by' => $product['update_by']
            );
        }
        return $arr;
    }
    return null;
}
