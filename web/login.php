<?php
session_start();

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE student_id = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Đăng nhập thành công
        $row = mysqli_fetch_assoc($result);

        // Lưu thông tin vào biến session
        $_SESSION['user_id'] = $row['student_id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];

        // Chuyển hướng đến trang chính
        header("Location: home_page.php");
        exit(); // Dừng thực thi của script sau khi chuyển hướng
    } else {
        // Đăng nhập thất bại
        echo "Sai tài khoản hoặc mật khẩu";
    }
}

mysqli_close($conn);
?>
