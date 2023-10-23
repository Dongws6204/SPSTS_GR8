CREATE DATABASE stsdatabase;
USE stsdatabase;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `student_class` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `users`(`id`,`birthday`,`email`,`name`,`gender`,`phone`,`student_class`,`student_id`,`address`) VALUES
(1,'2004-02-06','22026532@vnu.edu.vn','Nguyễn Hữu Cứ','Nam','0372665472','QH-2022-I/CQ-J','22026532',NULL),
(2,'2004-03-11','22026558@vnu.edu.vn','Cao Vân Anh','Nữ','0422670461','QH-2022-I/CQ-J','2202658',NULL),
(3,'2004-02-16','22026564@vnu.edu.vn','Trần Linh Chi','Nữ','0228481929','QH-2022-I/CQ-J','2206564',NULL);

CREATE TABLE thoi_khoa_bieu (
    id int AUTO_INCREMENT PRIMARY KEY,
    thu varchar(255),
    mon_hoc varchar(255),
    thoi_gian varchar(255),
    dia_diem varchar(255),
    lop varchar(255),
    ten_giao_vien varchar(255),
    ghi_chu varchar(255),
    hoc_ky varchar(50)
);

INSERT INTO thoi_khoa_bieu (thu, mon_hoc, thoi_gian, dia_diem, lop, ten_giao_vien, ghi_chu, hoc_ky)
VALUES 
    ('Thứ 2', 'Toán học', '8:00 - 10:00', 'Phòng A101', 'Lớp 10A1', 'Nguyễn Văn A', 'Ghi chú 1', 'hoc-ky-1'),
    ('Thứ 3', 'Văn học', '10:00 - 12:00', 'Phòng B202', 'Lớp 10A2', 'Nguyễn Thị B', 'Ghi chú 2', 'hoc-ky-1'),
    ('Thứ 4', 'Lý học', '8:00 - 10:00', 'Phòng C303', 'Lớp 10A3', 'Trần Văn C', 'Ghi chú 3', 'hoc-ky-1'),
    ('Thứ 5', 'Hóa học', '10:00 - 12:00', 'Phòng D404', 'Lớp 10A4', 'Phạm Thị D', 'Ghi chú 4', 'hoc-ky-2'),
    ('Thứ 6', 'Sinh học', '8:00 - 10:00', 'Phòng E505', 'Lớp 10A5', 'Lê Văn E', 'Ghi chú 5', 'hoc-ky-2');


CREATE TABLE ket_qua_hoc_tap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_mon_hoc VARCHAR(255),
    ma_hoc_phan VARCHAR(50),
    so_TC INT,
    diem_TK FLOAT,
    diem_quy_doi FLOAT
);


INSERT INTO ket_qua_hoc_tap (ten_mon_hoc, ma_hoc_phan, so_TC, diem_TK, diem_quy_doi)
VALUES 
    ('Môn 1', 'MH001', 3, 8.5, 3.5),
    ('Môn 2', 'MH002', 4, 7.2, 3.0),
    ('Môn 3', 'MH003', 2, 9.0, 4.0);
