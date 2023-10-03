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
