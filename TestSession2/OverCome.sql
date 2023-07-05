drop database if exists over_come;
CREATE DATABASE over_come;
USE over_come;
CREATE TABLE mon_hoc (
    mon_hoc_id INT PRIMARY KEY AUTO_INCREMENT,
    ten_mon_hoc CHAR(50) NOT NULL UNIQUE,
    so_tin_chi TINYINT,
    do_kho ENUM('de', 'trung binh', 'kho'),
    CHECK (so_tin_chi > 0 AND so_tin_chi < 5),
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);



CREATE TABLE nguoi_huong_dan (
    nguoi_huong_dan_id INT PRIMARY KEY AUTO_INCREMENT,
    ho_ten CHAR(50) NOT NULL,
    gioi_tinh BOOLEAN,
    so_dien_thoai CHAR(50) UNIQUE,
    mail CHAR(50) UNIQUE,
    nam_sinh DATE,
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);


CREATE TABLE quan_tri_vien (
    quan_tri_vien_id INT PRIMARY KEY AUTO_INCREMENT,
    ho_ten CHAR(50) NOT NULL,
    gioi_tinh BOOLEAN,
    so_dien_thoai CHAR(50) UNIQUE,
    nam_sinh DATE,
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);

CREATE TABLE sinh_vien (
    sinh_vien_id INT PRIMARY KEY AUTO_INCREMENT,
    ho_ten CHAR(50) NOT NULL,
    gioi_tinh BOOLEAN,
    so_dien_thoai CHAR(50) NOT NULL UNIQUE,
    lop_quan_ly CHAR(50) NOT NULL,
    nam_sinh DATE,
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);


CREATE TABLE lop_hoc (
    lop_hoc_id INT PRIMARY KEY AUTO_INCREMENT,
    quan_tri_vien_id INT NOT NULL,
    mon_hoc_id INT NOT NULL,
    nguoi_huong_dan_id INT NOT NULL,
    slot INT DEFAULT 45,
    slot_con_lai INT DEFAULT 45,
    CHECK (slot > 0),
    thoi_gian_bat_dau DATE NOT NULL,
    thoi_gian_ket_thuc DATE NOT NULL,
    FOREIGN KEY (quan_tri_vien_id)
        REFERENCES quan_tri_vien (quan_tri_vien_id),
    FOREIGN KEY (mon_hoc_id)
        REFERENCES mon_hoc (mon_hoc_id),
    FOREIGN KEY (nguoi_huong_dan_id)
        REFERENCES nguoi_huong_dan (nguoi_huong_dan_id),
    CHECK (thoi_gian_bat_dau < thoi_gian_ket_thuc),
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);



;
CREATE TABLE chi_tiet_lop_hoc (
    lop_hoc_id INT NOT NULL,
    sinh_vien_id INT NOT NULL,
    thoi_gian_dang_ky DATE NOT NULL,
    FOREIGN KEY (lop_hoc_id)
        REFERENCES lop_hoc (lop_hoc_id),
    FOREIGN KEY (sinh_vien_id)
        REFERENCES sinh_vien (sinh_vien_id),
    is_deleted BOOLEAN DEFAULT FALSE NOT NULL
);


DELIMITER $$
CREATE TRIGGER insert_nguoi_huong_dan_trigger -- check ngay sinh
BEFORE INSERT ON nguoi_huong_dan
FOR EACH ROW
BEGIN
    IF NEW.nam_sinh > CURDATE() then
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ngày sinh không hợp lệ!';
    END IF;
END$$
DELIMITER ;
delimiter $$
create trigger insert_chi_tiet_lop_hoc_exist before insert on chi_tiet_lop_hoc -- check ton tai record
for each row
begin
declare count int;
set count = 0 ;
	SELECT 
    COUNT(*)
INTO count FROM
    chi_tiet_lop_hoc
WHERE
    sinh_vien_id = new.sinh_vien_id
        AND lop_hoc_id = new.lop_hoc_id;
    if count > 0 then
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Bản ghi đã tồn tại';
    end if;
end $$
delimiter ;


DELIMITER $$
create trigger insert_chi_tiet_lop_hoc after insert on chi_tiet_lop_hoc -- them sinh vien thi slot tu dong tru
for each row
begin
update lop_hoc set slot_con_lai = slot_con_lai-1 where lop_hoc_id= new.lop_hoc_id;
end $$
DELIMITER ;


delimiter $$
create trigger update_chi_tiet_lop_hoc after update on chi_tiet_lop_hoc -- khi xoa thi cap nhat lai so slot
for each row
begin
declare count int;
set count = 45;
select count(*) into count from chi_tiet_lop_hoc where is_deleted = 0 and lop_hoc_id = new.lop_hoc_id ;
update lop_hoc set slot_con_lai=45-count where lop_hoc_id = new.lop_hoc_id;
end $$
delimiter ;

delimiter $$
create trigger insert_chi_tiet_lop_hoc_check_date before insert on chi_tiet_lop_hoc -- khi them kiem tra ngay them phai be hon thoi gian ket thuc cua lop hoc
for each row
begin
declare checker date;
select thoi_gian_ket_thuc into checker from lop_hoc where lop_hoc_id=new.lop_hoc_id;
    IF NEW.thoi_gian_dang_ky > checker then
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ngày đăng ký lớn hơn ngày kết thúc của lớp học';
    END IF;
end $$
delimiter ;


insert into mon_hoc(ten_mon_hoc,so_tin_chi,do_kho) 
values ('giai tich',3,'trung binh'),
('vi xu ly',3,'kho'),
('java',2,'de'),
('do an',1,'kho'),
('toeic',2,'trung binh'),
('csdl',2,'kho'),
('c++',1,'de');

insert into nguoi_huong_dan (ho_ten,gioi_tinh,so_dien_thoai,mail,nam_sinh) values 
('Nguoi huong dan 1',1,'012312234141','nguoi1@gmail.com','2002-01-01'),
('Nguoi huong dan 2',0,'12312543','nguoi2@gmail.com','2003-12-01'),
('Nguoi huong dan 3',0,'13241234','nguoi3@gmail.com','2001-07-11'),
('Nguoi huong dan 4',1,'512433','nguoi4@gmail4.com','2004-02-12'),
('Nguoi huong dan 5',1,'234235','nguoi5@gmail5.com','2002-01-23'),
('Nguoi huong dan 6',1,'15232234234','nguoi6@gmail.com','2003-05-15'),
('Nguoi huong dan 7',0,'012321234141','nguoi7@gmail.com','2001-07-24'),
('Nguoi huong dan 8',0,'23461223','nguoi8@gmail.com','2002-09-27'),
('Nguoi huong dan 9',1,'623452345','nguoi9@gmail.com','2003-08-09'),
('Nguoi huong dan 10',1,'2342523','nguoi10@gmail.com','2004-11-07'),
('Nguoi huong dan 11',0,'123412334141','nguoi11@gmail.com','2002-12-11'),
('Nguoi huong dan 12',1,'0111234234141','nguoi12@gmail.com','2000-10-12');

insert into quan_tri_vien(ho_ten,gioi_tinh,so_dien_thoai,nam_sinh) values
('Quan tri vien 1',1,'12312321213','2003-01-11'),
('Quan tri vien 2',0,'121423123123','2001-10-12'),
('Quan tri vien 3',0,'123112423123','2000-12-09'),
('Quan tri vien 4',1,'12315232123','2003-03-03'),
('Quan tri vien 5',0,'123122531123','2004-04-04'),
('Quan tri vien 6',1,'1231253123','2001-11-08'),
('Quan tri vien 7',1,'12312531223','2002-12-12'),
('Quan tri vien 8',0,'12312231253','2005-03-11'),
('Quan tri vien 9',1,'12312312543','2004-02-22'),
('Quan tri vien 10',0,'1231232123','2001-06-30'),
('Quan tri vien 11',0,'12231231123','2000-08-11');

insert into lop_hoc (quan_tri_vien_id,mon_hoc_id,nguoi_huong_dan_id,thoi_gian_bat_dau,thoi_gian_ket_thuc) 
values 
(1,1,1,'2021-11-11','2021-12-12'),
(1,5,4,'2022-11-20','2022-12-12'),
(2,3,3,'2021-05-12','2021-06-11'),
(2,1,6,'2023-01-12','2023-03-12'),
(4,4,3,'2022-10-07','2022-11-12'),
(5,4,6,'2020-11-05','2020-12-12'),
(1,7,7,'2021-08-24','2021-09-01'),
(3,3,11,'2021-11-12','2021-12-12'),
(2,1,2,'2021-11-15','2021-12-12'),
(6,2,5,'2021-11-18','2021-12-12');


insert into sinh_vien(ho_ten,gioi_tinh,so_dien_thoai,lop_quan_ly,nam_sinh) values
('sinh vien 1',1,'2231723','lop 1','2003-01-11'),
('sinh vien 2',0,'21233123','lop 1','2002-02-23'),
('sinh vien 3',1,'412312523','lop 1','2004-01-14'),
('sinh vien 4',0,'11231723','lop 2','2001-12-06'),
('sinh vien 5',0,'57123123','lop 2','2005-12-03'),
('sinh vien 6',1,'612311723','lop 1','2006-08-12'),
('sinh vien 7',0,'21237123','lop 5','2001-07-10'),
('sinh vien 8',1,'61234123','lop 2','2002-02-08'),
('sinh vien 9',1,'71231213','lop 5','2004-12-12'),
('sinh vien 10',0,'11273123','lop 2','2002-02-12'),
('sinh vien 11',1,'15223123','lop 2','2001-11-14'),
('sinh vien 12',1,'12131263','lop 1','2000-08-12'),
('sinh vien 15',0,'12351623','lop 11','2001-02-26'),
('sinh vien 13',1,'1237123','lop 51','2006-03-11'),
('sinh vien 17',1,'12238123','lop 21','2005-12-12'),
('sinh vien 18',0,'12312123','lop 11','2001-10-11'),
('sinh vien 19',1,'121312123','lop 1','2003-03-16'),
('sinh vien 20',1,'123112423','lop 61','2002-06-16'),
('sinh vien 21',0,'12311221233','lop 51','2003-08-14'),
('sinh vien 22',0,'1231123','lop 41','2003-01-19'),
('sinh vien 23',1,'123612334123','lop 12','2002-11-15'),
('sinh vien 24',0,'12337123','lop 11','2003-11-05'),
('sinh vien 25',1,'12373123','lop 10','2001-12-11');

insert into chi_tiet_lop_hoc(lop_hoc_id,sinh_vien_id,thoi_gian_dang_ky) values
(1,1,'2021-11-11'),(1,3,'2021-11-12'),(1,11,'2021-11-13'),(1,14,'2021-11-14'),
 (2,1,'2022-11-20'),(1,4,'2021-11-20'),(2,2,'2022-12-11'),(2,20,'2022-11-22'),(2,15,'2022-11-11'),
(3,1,'2021-05-11'),(3,4,'2021-06-07'),(3,2,'2021-05-19'),(3,18,'2021-05-15'),
(3,5,'2021-05-11'),(3,10,'2021-05-11'),(3,13,'2021-05-10');