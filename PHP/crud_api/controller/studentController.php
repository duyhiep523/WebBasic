<?php
require 'model/Student.php';
class studentController
{

    public function getStudentAll()
    {
        $stu = new Student();
        $data = $stu->selectStudent();
        echo json_encode($data);
    }
    public function insert()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            $student = new Student();
            $result = $student->insertStudent($data);
            if ($result) {
                echo json_encode([
                    "status" => true,
                    "message" => "inserted successfully"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "error in inserting"
                ]);
            }
        }
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            $student = new Student();
            $result = $student->updateStudent($data);
            if ($result) {
                echo json_encode([
                    "status" => true,
                    "message" => "inserted successfully"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "error in inserting"
                ]);
            }
        }
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            $student = new Student();
            $result = $student->deleteStudent($data);
            if ($result) {
                echo json_encode([
                    "status" => true,
                    "message" => "inserted successfully"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "error in inserting"
                ]);
            }
        }
    }
    public function search()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            $student = new Student();
            $result = $student->searchStudent($data['key']);
            // $result = $student->searchStudent('Nguyễn Duy Hiệp');

            echo json_encode($result);
        }
    }
}
// $a = new studentController();
// $a->search();