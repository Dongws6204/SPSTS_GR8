<?php
include 'connect.php';

// Lấy thông tin từ trang web
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Người dùng chưa đăng nhập.";
    exit();
}

$studentId = $_SESSION['user_id'];

// Lấy mật khẩu hiện tại từ cơ sở dữ liệu
$sqlCurrentPassword = "SELECT password FROM users WHERE student_id = '$studentId'";
$resultCurrentPassword = $conn->query($sqlCurrentPassword);

if ($resultCurrentPassword->num_rows > 0) {
    $row = $resultCurrentPassword->fetch_assoc();
    $dbCurrentPassword = $row['password'];

    // Kiểm tra xác nhận mật khẩu
    if ($currentPassword !== $dbCurrentPassword) {
        echo "Mật khẩu hiện tại không đúng.";
    } elseif ($newPassword !== $confirmPassword) {
        echo "Mật khẩu xác nhận không khớp!";
    } else {
        // Update mật khẩu trong cơ sở dữ liệu
        $sqlUpdatePassword = "UPDATE users SET password = '$newPassword' WHERE student_id = '$studentId'";
        
        if ($conn->query($sqlUpdatePassword) === TRUE) {
            echo "Thay đổi mật khẩu thành công!";
        } else {
            echo "Lỗi: " . $sqlUpdatePassword . "<br>" . $conn->error;
        }
    }
} else {
    echo "Không tìm thấy người dùng.";
}

// Đóng kết nối
$conn->close();
?>
