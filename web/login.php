<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Đăng nhập</title>
</head>
<body>
<?php

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE student_id='$username' AND student_id='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Đăng nhập thành công
            // Chuyển hướng người dùng tới trang chủ
            header("Location: home_page.php");
            exit();
        } else {
            // Thông báo lỗi đăng nhập
            echo "<p style='color:red;'>Sai tài khoản hoặc mật khẩu</p>";
        }
    }
}
?>
    <header>
        <div class="logo">
            <img src="img/Logo-VNU.png" >
        </div>
        <div class="support">
            <p>Hỗ trợ sinh viên</p>
        </div>
        <div class="logo">
            <img src="img/Logo-UET.png" >
        </div>
    </header>
    
    <div class="login-box">
        <h2>Đăng nhập</h2>
        <form  method="post" action="">
            <div class="input-box">
                <label for="username">Tài khoản:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-box">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="forgot-password">
                <a href="#">Quên mật khẩu?</a>
            </div>
            <div class="submit-button">
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>;

