select *from lop_hoc;
update chi_tiet_lop_hoc set is_deleted = 1 where  lop_hoc_id =  3 and sinh_vien_id = 13;-- kiểm tra 
select *from lop_hoc;
select *from chi_tiet_lop_hoc;
