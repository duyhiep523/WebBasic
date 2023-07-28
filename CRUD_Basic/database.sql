drop database if exists crud_basic ;
create database crud_basic;
use crud_basic;
create table system_users(
user_id int AUTO_INCREMENT ,
primary key (user_id),
phone_number varchar(15),
account_name varchar(50),
account_password varchar(50)
);
INSERT INTO system_users (phone_number, account_name, account_password)
VALUES
('123123123','admin1','202cb962ac59075b964b07152d234b70'),
('123123123','admin2','202cb962ac59075b964b07152d234b70'),
('123123123','admin3','202cb962ac59075b964b07152d234b70'),
('123123123','admin4','202cb962ac59075b964b07152d234b70'),
('123123123','admin5','202cb962ac59075b964b07152d234b70');
create table product(
product_id int AUTO_INCREMENT ,
primary key (product_id),
product_name varchar(50),
price float,
create_by varchar(50) ,
update_by varchar(50) 
);
INSERT INTO product (product_name,price)
VALUES 
  ('Laptop', 1000),
  ('Smartphone', 800),
  ('Headphones', 100),
  ('Keyboard', 50),
  ('Mouse', 30),
  ('Monitor', 300),
  ('Printer', 200),
  ('Tablet', 600),
  ('Camera', 900),
  ('Speakers', 120);
