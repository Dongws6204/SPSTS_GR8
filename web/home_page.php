<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cẩm nang môn học</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">

</head>
<body>
    <div class="user-info">
        <div class="user-avatar" onclick="toggleDropdown()">
            <img src="img\ava.png" alt="Avatar">
            </div>
        <div class="user-name" onclick="toggleDropdown()"><?php echo $_SESSION['user_name']; ?></div>
        <div class="dropdown" id="dropdown">
            <button onclick="navigateTo('account')">Tài khoản</button>

            <button onclick="navigateTo('password')">Đổi mật khẩu</button>
        </div>
    
    </div>
    
    <style>
    .button-container {
        position: absolute;
        right: 35px;
        bottom: 20px;
    }
    </style>

    <div class="button-container">
        <button onclick="navigateTo('chatbot')">
            <img src="img/icons8-chat-50.png" alt="Icon 2">
            <span>Chat</span>
        </button>
    </div>

    <div class="menu">
        <div class="logo">
            <img src="img/Asset 4.png" alt="Logo Hỗ trợ sinh viên">
        </div>
        <div class="menu-items">
            <button onclick="navigateTo('schedule')">
                <img src="img/icons8-timetable-48 (1).png" alt="Icon 1">
                <span>Thời khóa biểu</span>
            </button>
            <button onclick="navigateTo('exams')">
                <img src="img/icons8-exam-48 (1).png" alt="Icon 2">
                <span>Lịch thi</span>
            </button>
            <button onclick="navigateTo('results')">
                <img src="img/icons8-exam-48.png" alt="Icon 2">
                <span>Kết quả học tập</span>
            </button>
            <button onclick="navigateTo('handbook')">
                <img src="img/icons8-handbook-90.png" alt="Icon 2">
                <span>Cẩm nang môn học</span>
            </button>
            <button onclick="navigateTo('feedback')">
                <img src="img/icons8-feedback-96.png" alt="Icon 2">
                <span>Góp ý</span>
            </button>
            <button onclick="navigateTo('logout')">
                <img src="img/icons8-logout-96 (2).png" alt="Icon 2">
                <span>Logout</span>
            </button>
        </div>
    </div>
    <!-- <div class="content1">
        <div class="course_handbook-box">
            <h2>Tài liệu</h2>
            <div class="course_handbook">
                <div class="course_handbook-item">
                    <div class="course_handbook-header">
                        <span>STT</span>
                        <span>Môn học</span>
                        <span>Mã học phần</span>
                        <span>Số TC</span>
                        <span>Tên tài liệu</span>
                        <span>Loại tài liệu</span>
                        <span>Ghi chú</span>
                    </div>
                    <div class="course_handbook-row" id="course_handbook-content">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        function navigateTo(page) {
            // Thực hiện chuyển hướng tùy theo page được chọn
            if (page === 'account') {
                window.location.href = 'profile.php';
            } else if (page === 'password') {
                window.location.href = 'password.php';
            } else if (page === 'schedule') {
                window.location.href = 'schedule.php';
            } else if (page === 'exams') {
                window.location.href = 'exam_schedule.php';
            } else if (page === 'results') {
                window.location.href = 'results.php';
            } else if (page === 'handbook') {
                window.location.href = 'course-handbook.php';
            } else if (page === 'feedback') {
                window.location.href = 'feedback.php';
            } else if (page === 'logout') {
                window.location.href = 'index.php';
            } else if (page === 'chatbot') {
                window.location.href = 'https://automatic-yodel-v6v6p5x4ppw6hxgxq-8501.app.github.dev/';
            }
        }
    </script>
       <?php
        // Ngắt kết nối database
        $connect = null;
    ?>
</body>
</html>