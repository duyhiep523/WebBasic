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

function updateProduct($product_id, $product_name, $price)
{
    global $conn;
    $sql = "update product set product_name=? , price=? where product_id = ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $product_name, $price, $product_id);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function deleProduct($product_id)
{
    global $conn;
    $sql = "delete from product where product_id = ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        echo $sql;
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function addUser($phone_number, $account_name, $account_password)
{
    global $conn;
    $sql = "INSERT INTO system_users (phone_number, account_name, account_password) VALUES(?,?,?)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $phone_number, $account_name, $account_password);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
