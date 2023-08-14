<?php
class Conn
{

    protected function connect()
    {
        $connection = null;
        try {
            $connection = mysqli_connect("localhost", "root", "123456789", "student");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $connection;
    }
}
