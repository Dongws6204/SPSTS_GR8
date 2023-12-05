<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời khóa biểu</title>
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
    <div class="semester-select1">
        <select id="semester">
            
            <option value="hoc-ky-1">Học kỳ 1 năm học 2023-2024</option>
            <option value="hoc-ky-2">Học kỳ 2 năm học 2023-2024</option>
        </select>
        <button id="view-schedule-button">Xem TKB</button>
        <button id ="create-schedule-button">Tạo TKB</button>

        <!-- Form nhập thông tin thời khóa biểu -->
    <form id="schedule-form" style="display: none;">
        <div class="form-group">
            <label for="subject-name-input">Môn học:</label>
            <input type="text" id="subject-name-input" name="subjectName">
        </div>
        <div class="form-group">
            <label for="start-time-input">Thời gian bắt đầu:</label>
            <input type="text" id="start-time-input" name="startTime">
        </div>
        <div class="form-group">
            <label for="end-time-input">Thời gian kết thúc:</label>
            <input type="text" id="end-time-input" name="endTime">
        </div>
        <div class="form-group">
            <label for="day-input">Thứ:</label>
            <input type="text" id="day-input" name="day">
        </div>
        <button type="button" id="submit-button">Gửi</button>
    </form>
        
        
    </div>
    <div class="content">
        <div class="schedule-box">
            <h2>Thời khóa biểu</h2>
            <div class="schedule">
                <div class="schedule-item">
                    <div class="schedule-header">
                        <span>Thứ</span>
                        <span>Môn học</span>
                        <span>Thời gian</span>
                        <span>Địa điểm</span>
                        <span>Lớp</span>
                        <span>Tên giáo viên</span>
                        <span>Ghi chú</span>
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
    } else if (selectedSemester === 'hoc-ky-2') {
        scheduleBox.style.display = 'none';
        alert('Dữ liệu chưa được cập nhật');
    }
    });

    document.getElementById('create-schedule-button').addEventListener('click', function () {
            const form = document.getElementById('schedule-form');
            form.style.display = 'block';
        });

        document.getElementById('submit-button').addEventListener('click', function () {
            const subjectName = document.getElementById('subject-name-input').value;
            const startTime = document.getElementById('start-time-input').value;
            const endTime = document.getElementById('end-time-input').value;
            const day = document.getElementById('day-input').value;

            if (!subjectName || !startTime || !endTime || !day) {
                alert('Vui lòng nhập đủ thông tin.');
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'create_schedule.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            const data = `subjectName=${subjectName}&startTime=${startTime}&endTime=${endTime}&day=${day}`;

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const response = xhr.responseText;
                    alert(response);
                }
            };

            xhr.send(data);
            // Tắt form sau khi gửi thành công
            const form = document.getElementById('schedule-form');
                form.style.display = 'none';
        });
    </script>
</body>
</html>
