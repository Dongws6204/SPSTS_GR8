<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <title>Liên hệ</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/Logo-VNU.png" alt="Logo VNU">
        </div>
        <div class="support">
            <p>Hỗ trợ sinh viên</p>
        </div>
        <div class="logo">
            <img src="img/Logo-UET.png" alt="Logo UET">
        </div>
    </header>

    <div class="container">
        <div class="menu">
            <div class="menu-items">
                <button onclick="window.location.href='schedule.php'">Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                <button onclick="window.location.href='result.php'">Kết quả học tập</button>
                <button onclick="window.location.href='course-handbook.php'">Cẩm nang môn học</button>
                <button>Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>

    <div class="feedback-container">
        <h1>Liên hệ</h1>
        <h2>Liên hệ với Người quản trị để giải quyết các vấn đề</h2>
        <form>
            <div class="form-group">
                <label for="issue-type">Chọn loại vấn đề:</label>
                <select id="issue-type" name="issue-type">
                    <option value="admin-support">Liên hệ với Người quản trị</option>
                    <option value="report-mistake">Báo cáo lỗi</option>
                    <option value="incorrect-information">Sai thông tin</option>
                    <option value="other-issues">Các vấn đề khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="feedback">Nội dung:</label>
                <textarea id="feedback" name="feedback" rows="4"></textarea>
            </div>
            <button type="submit">Gửi liên hệ</button>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
