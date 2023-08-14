<?php
require "Conn.php";

class Student extends Conn
{
    private $connect;
    public function __construct()
    {
        $this->connect = $this->connect();
    }
    public function selectStudent()
    {
        $students = null;
        $sql = "SELECT * FROM `students`";
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        return $students;
    }
    public function insertStudent($data)
    {
        $student_code = $data['student_code'];
        $full_name =  $data['full_name'];
        $class = $data['class'];
        $mail = $data['mail'];
        $sql = "INSERT INTO `students` (student_code,full_name,class,mail) VALUES ('$student_code', '$full_name', '$class', '$mail')";
        $result = $this->connect->query($sql);
        return $result ? true : false;
    }
    public function updateStudent($data)
    {
        $student_code = $data['student_code'];
        $full_name =  $data['full_name'];
        $class = $data['class'];
        $mail = $data['mail'];
        $sql = "UPDATE `students` SET `student_code` = '$student_code', `full_name` = '$full_name', `class` = '$class', `mail` = '$mail' WHERE `student_code` = '$student_code'";
        $result = $this->connect->query($sql);
        return $result ? true : false;
    }
    public function deleteStudent($data)
    {
        $student_code = $data['student_code'];
        $sql = "DELETE FROM `students` WHERE `student_code` = '$student_code'";
        $result = $this->connect->query($sql);
        return $result ? true : false;
    }
    public function searchStudent($key)
    {
        $students = null;
        $sql = "SELECT * FROM `students` WHERE `student_code` like '%$key%' or `full_name` like '%$key%' or `class` like '%$key%' or `mail` like '%$key%'";
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        return $students;
    }
}

