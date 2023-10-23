<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Lịch thi</title>
</head>
<body>
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
                <button>Lịch thi</button>
                <button onclick="window.location.href='result.php'">Kết quả học tập</button>
                <button onclick="window.location.href='course.handbook.php'">Cẩm nang môn học</button>
                <button>Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
        <div class="semester-select">
            <label for="semester">Chọn học kỳ:</label>
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
    </script>    
    <script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
    <script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>   
</body>
</html>