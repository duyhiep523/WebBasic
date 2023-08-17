DROP DATABASE IF EXISTS `student` ;
create database student;
use student;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_code VARCHAR(10) UNIQUE,
    full_name VARCHAR(50),
    class VARCHAR(50),
    mail VARCHAR(50)
);
insert into students(student_code,full_name,class,mail) values 
('SV1','Nguyễn Duy Hiệp','66PM4','hiep@huce.edu.vn'),
('SV2','Nguyễn Thị Nhàn','66PM4','nhan@huce.edu.vn'),
('SV3','Hoàng Thanh Tú','66PM4','tu@huce.edu.vn'),
('SV4','Nguyễn Đức Tâm','66PM4','tam@huce.edu.vn');
SELECT * FROM `students` WHERE `student_code` like '%SV1%' or `full_name` like '%SV1%' or `class` like '%SV1%' or `mail` like '%SV1%'
