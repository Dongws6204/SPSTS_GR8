<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Trang chính</title>
</head>

<body>
    <?php 
    require_once 'connect.php';
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
    
    <div class="container">
        <div class="menu">
            <div class="menu-items">

                <button onclick="window.location.href='schedule.php'">Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                <button onclick ="window.location.href='result.php'">Kết quả học tập</button>
                <button onclick="window.location.href='course-handbook.php'">Cẩm nang môn học</button>
                <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                <button onclick = "window.location.href = 'profile.php'">Tài khoản</button>
                <button onclick = "window.location.href = 'logout.php'">Đăng xuất</button>

            </div>
        </div>
    </div>
    <?php
        // Ngắt kết nối database
        $connect = null;
    ?>
</body>
</html>
