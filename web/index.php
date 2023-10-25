<?php
    session_start();
    $_SESSION['check'] = false;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Đăng nhập</title>
</head>

<body  class = "text-center">

<?php

require_once 'connect.php'; // Kết nối đến cơ sở dữ liệu
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Thực hiện truy vấn kiểm tra đăng nhập
        $sql = "SELECT * FROM users WHERE student_id = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công

            $_SESSION['username'] = $username; // Lưu thông tin đăng nhập vào phiên làm việc
            header("Location: home_page.php"); // Chuyển hướng người dùng tới trang chủ
            exit();
        } else {
          // Lưu thông báo lỗi vào biến
            $error_message = "<p style='color: red;'>Thông tin tài khoản hoặc mật khẩu không chính xác</p>";

            $_SESSION['check'] = true;
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
            <?php if (!$_SESSION['check']) : ?>
                <a href="#">Quên mật khẩu?</a>
            <?php endif; ?>
            </div>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) : ?>
                <p style="color: red;"><?= $error_message ?></p>
            <?php endif; ?>

            <div class="submit-button">
                <button type="submit">Đăng nhập</button>
            </div>

        </form>

    </div>

</body>
</html>;
