<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="login-form">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <input type="text" id="username" name="username" placeholder="Tài khoản">
                    <input type="password" id="password" name="password" placeholder="Mật khẩu">
                    <button type="submit" name="login">Đăng nhập</button>
                    <a href="forgot-password.php">Quên mật khẩu?</a>
                </form>
            </div>
        </div>
        <div class="right-panel">
            <div class="welcome-back">
                <img src="img/Asset 3.png" alt="Welcome Back Image">
            </div>
            <div class="logo1">
                <img src="img/Asset 2.png" alt="Hỗ Trợ Sinh Viên">
            </div>
        </div>
    </div>
</body>
</html>
