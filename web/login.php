<?php
session_start();

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT user_id FROM profile WHERE user_id = '$username' AND user_id = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Đăng nhập thành công
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: home_page.php"); 
    } else {
        // Đăng nhập thất bại
        echo "Sai tài khoản hoặc mật khẩu";
    }
}

mysqli_close($conn);
?>
