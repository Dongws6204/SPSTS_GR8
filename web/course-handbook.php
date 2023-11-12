<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <title>Cẩm nang môn học</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/Logo-VNU.png">
        </div>
        <div class="support">
            <p>Hỗ trợ sinh viên</p>
        </div>
        <div class="logo">
            <img src="img/Logo-UET.png">
        </div>
    </header>
    <div class="container">
        <div class="menu">
            <div class="menu-items">
                <button onclick="window.location.href='schedule.php'">Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam-schedule.php'">Lịch thi</button>
                <button onclick="window.location.href='result.php'">Kết quả học tập</button>
                <button>Cẩm nang môn học</button>
                <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content1">
        <div class="course_handbook-box">
            <h2>Đề cương</h2>
            <div class="course_handbook">
                <div class="course_handbook-item">
                    <div class="course_handbook-header">
                        <span>STT</span>
                        <span>Môn học</span>
                        <span>Mã học phần</span>
                        <span>Số TC</span>
                        <span>Đề cương</span>
                        <span>Đề thi</span>
                        <span>Ghi chú</span>
                    </div>
                    <div class="course_handbook-row" id="course_handbook-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
