<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch thi</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="user-info">
        <div class="user-name" onclick="toggleDropdown()">Tên người dùng</div>
        <div class="dropdown" id="dropdown">
            <button onclick="navigateTo('account')">Tài khoản</button>
            <button onclick="navigateTo('password')">Đổi mật khẩu</button>
        </div>
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
    <div class="semester-select">
        <select id="semester">
            <option value="hoc-ky-1">Học kỳ 1 năm học 2023-2024</option>
            <option value="hoc-ky-2">Học kỳ 2 năm học 2023-2024</option>
        </select>
        <button id="view-schedule-button">Xem lịch thi</button>
    </div>

<div class="content">
    <div class="schedule-box">
           <h2>Lịch thi</h2>
        <div class="schedule">
            <div class="schedule-item">
                <div class="schedule-header">
                    <span>STT</span>
                    <span>Giờ</span>
                    <span>Ngày thi</span>
                    <span>Môn học</span>
                    <span>Số TC</span>
                    <span>Địa điểm</span>
                    <span>Hình thức thi</span>
                </div>
                <div class="schedule-row" id="schedule-content">
                    
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        function navigateTo(page) {
            // Thực hiện chuyển hướng tùy theo page được chọn
            if (page === 'account') {
                window.location.href = 'account.php';
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
            }
        }
        const viewScheduleButton = document.getElementById('view-schedule-button');
        const scheduleBox = document.querySelector('.schedule-box');
        const semesterSelect = document.getElementById('semester');
    
        viewScheduleButton.addEventListener('click', () => {
            const selectedSemester = semesterSelect.value;
            if (selectedSemester === 'hoc-ky-1') {
                scheduleBox.style.display = 'block';
                // Thêm logic lấy dữ liệu lịch thi cho học kỳ 1 và cập nhật nội dung ở đây (nếu cần)
            } else if (selectedSemester === 'hoc-ky-2') {
                scheduleBox.style.display = 'none';
                alert('Dữ liệu chưa được cập nhật');
            }
        });

        var viewScheduleButton1 = document.getElementById('view-schedule-button');

        // Thêm sự kiện "click" vào nút
        viewScheduleButton.addEventListener('click', function() {
        // Mở liên kết trong một tab mới
        window.open('https://daotaodaihoc.uet.vnu.edu.vn/congdaotao/module/dsthi/', '_blank');
            });
    </script>
</body>
</html>
