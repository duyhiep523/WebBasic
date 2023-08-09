<?php
if (!defined('IN_SITE')) die ('The request not found');

$conn;

// Hàm kết nối
function db_connect()
{
    global $conn;
    if (!$conn) {
        $conn = new mysqli('localhost', 'root', '123456789', 'php_example');
    } else {
        die('Không thể kết nối CSDL');
    }
}

// Hàm ngắt kết nối
function db_close()
{
    global $conn;
    if ($conn) {
        $conn->close();
    }
}

// Hàm lấy danh sách, kết quả trả về danh sách các record trong một mảng
function db_get_list($sql)
{
    db_connect();
    global $conn;
    $data = array();
    $result =  $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

// Hàm lấy chi tiết, dùng select theo ID vì nó trả về 1 record
function db_get_row($sql)
{
    db_connect();
    global $conn;
    $result =  $conn->query($sql);
    $row = array();
    if ($result->num_rows() > 0) {
        $row = $result->fetch_assoc();
    }
    return $row;
}

// Hàm thực thi câu truy vấn insert, update, delete
function db_execute($sql)
{
    db_connect();
    global $conn;
    return  $conn->query($sql);
}
