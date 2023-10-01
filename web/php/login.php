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
    // Kiểm tra xem biểu mẫu đã được gửi đi và trường login_success có giá trị là 1 hay không
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_success"]) && $_POST["login_success"] == 1) {
        // Nhận thông tin đăng nhập từ biểu mẫu
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Thực hiện xác thực đăng nhập ở đây (ví dụ: kiểm tra tên người dùng và mật khẩu)
        $correct_username = "22026532"; // Thay thế bằng tên người dùng đúng
        $correct_password = "22026532";      // Thay thế bằng mật khẩu đúng

        if ($username == $correct_username && $password == $correct_password) {
            // Xác thực thành công, bạn có thể chuyển hướng người dùng đến trang chính
            header("Location: home_page.php");
            exit;
        } else {
            // Xác thực không thành công, bạn có thể hiển thị thông báo lỗi hoặc xử lý khác
            echo "Tên người dùng hoặc mật khẩu không đúng.";
        }
        
    }
    ?>
</body>
</html>
