<?php
// Kết nối đến cơ sở dữ liệu
require_once 'connect.php';
session_start();

// Lấy dữ liệu từ yêu cầu AJAX
$user_id = $_SESSION['user_id'];

// Tạo truy vấn SQL
$sql = "SELECT profile_id FROM profile WHERE user_id = ?";

// Chuẩn bị và thực thi truy vấn
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Lấy kết quả
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$profile_id = $row['profile_id'];


//
$subjectName = $_POST['subjectName'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$day = $_POST['day'];

// Thực hiện truy vấn để thêm dữ liệu vào bảng timetable
$sql = "INSERT INTO timetable (class_name, subject_name, teacher_name, start_time, end_time, semester_id, day, profile_id) 
        VALUES (NULL, '$subjectName', NULL, '$startTime', '$endTime', 1, '$day', $profile_id)";

if ($conn->query($sql) === TRUE) {
    echo "Thêm thời khóa biểu thành công>";
} else {
    echo "Lỗi: " . $conn->error . " - " . $sql;
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
