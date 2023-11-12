<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <title>Kết quả học tập</title>
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
                <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                <button> Kết quả học tập</button>
                <button onclick="window.location.href='course-handbook.php'">Cẩm nang môn học</button>
                <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Thanh lựa chọn học kỳ -->
    <div class="semester-select2">
        <label for="semester">Chọn học kỳ:</label>
        <select id="semester">
            <option value="hoc-ky-2-1">Học kỳ 2 năm học 2022-2023</option>
            <option value="hoc-ky-1">Học kỳ 1 năm học 2023-2024</option>
            <option value="hoc-ky-2">Học kỳ 2 năm học 2023-2024</option>
        </select>
        <button id="view-result-button">Xem Kết Quả Học Tập</button>
    </div>

    <!-- Bảng kết quả học tập -->
    <div class="content">
        <div class="result-box">
            <h2>Kết quả</h2>
            <div class="result">
                <div class="result-item">
                    <div class="result-header">
                        <span>STT</span>
                        <span>Tên môn học</span>
                        <span>Mã học phần</span>
                        <span>Số TC</span>
                        <span>Điểm TK</span>
                        <span>Điểm quy đổi</span>
                    </div>
                     <div id="result-content">    
            </div>
        </div>
    </div>

    <script>
       
        const viewResultButton = document.getElementById('view-result-button');
        const resultBox = document.querySelector('.result-box');
        const semesterSelect = document.getElementById('semester');
   

        viewResultButton.addEventListener('click', () => {
            const selectedSemester = semesterSelect.value;

            // Xem kết quả học tập cho học kỳ 2 năm học 2022-2023
            if (selectedSemester === 'hoc-ky-2-1') {
                // Hiển thị bảng kết quả học tập và thông báo khi cần
                resultBox.style.display = 'block';

                // Thêm logic lấy dữ liệu kết quả học tập từ server
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('result-content').innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "get_result.php?semester=hoc-ky-2-1", true);
                xhttp.send();
            } else {
                // Hiển thị thông báo khi dữ liệu chưa được cập nhật
                resultBox.style.display = 'none';
                alert('Dữ liệu chưa được cập nhật');
            }
        });
    </script>

    <script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
    <script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>   
</body>
</html>
