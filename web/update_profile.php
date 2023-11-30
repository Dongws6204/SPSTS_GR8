<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form chỉnh sửa
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $student_class = $_POST['student_class'];

    // Cập nhật thông tin trong cơ sở dữ liệu
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("UPDATE profile SET first_name=?, last_name=?, birthday=?, gender=?, student_class=? WHERE user_id=?");
    $stmt->bind_param("ssssss", $first_name, $last_name, $birthday, $gender, $student_class, $username);
    
    if ($stmt->execute()) {
        echo "Cập nhật thông tin thành công";
    } else {
        echo "Lỗi cập nhật thông tin: " . mysqli_error($conn);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <!-- Thêm nút "Trở về trang chủ" -->
    <button onclick="goToHomepage()">Trở về trang chủ</button>

    <script>
        function goToHomepage() {
            window.location.href = 'home_page.php'; // Thay đổi 'homepage.php' thành URL thực tế của trang chủ
        }
    </script>
</body>
</html>