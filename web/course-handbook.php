<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
          h1 {
    text-align: center; 
    margin-top: -300px; 
    margin-left:230px;
}
    </style>
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
    <h1>Đề cương môn học</h1>
    <div class="container">
        <div class="menu">
            <div class="menu-items">
                <button onclick = "window.location.href='schedule'">Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                <button onclick="window.location.href='result.php'">Kết quả học tập</button>
                <button>Cẩm nang môn học</button>
                <button>Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    <table id="course-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên môn học</th>
                <th>Mã môn học</th>
                <th>Số TC</th>
                <th>Đề cương</th>
                <th>Đề thi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu kết quả học tập sẽ được thêm ở đây -->
        </tbody>
    </table>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
