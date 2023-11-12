
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Thời khóa biểu</title>
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
                <button>Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                <button onclick="window.location.href='result.php'" >Kết quả học tập</button>
                <button onclick="window.location.href='course-handbook.php'">Cẩm nang môn học</button>
                <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    <div class="semester-select1">
        <label for="semester">Chọn học kỳ:</label>
        <select id="semester">
            <option value="hoc-ky-1">Học kỳ 1 năm học 2023-2024</option>
            <option value="hoc-ky-2">Học kỳ 2 năm học 2023-2024</option>
        </select>
        <button id="view-schedule-button">Xem TKB</button>
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
                    <div id="schedule-content">

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
            
                // Thêm logic lấy dữ liệu thời khóa biểu cho học kỳ 1 và cập nhật nội dung ở đây (nếu cần)
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('schedule-content').innerHTML = this.responseText;
                    }

                };
                xhttp.open("GET", "get_schedule.php?semester=hoc-ky-1", true);
                xhttp.send();
                //


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
