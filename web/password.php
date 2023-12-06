<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        .change-password {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left:580px;
}

.change-password h1 {
    font-size: 24px;
    margin-bottom: 20px;
    margin-left:120px;
}

.password-form .form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: royalblue;
}
/* CSS cho phần thông báo */
#change-status {
    color: green; /* Màu cho thông báo thành công */
    font-weight: bold;
    display: none; /* Khởi đầu ẩn thông báo */
}

    </style>
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
    <div class="change-password">
        <h1>Đổi mật khẩu</h1>
        <div class="password-form">
            <div class="form-group">
                <label for="current-password">Mật khẩu cũ:</label>
                <input type="password" id="current-password">
            </div>
            <div class="form-group">
                <label for="new-password">Mật khẩu mới:</label>
                <input type="password" id="new-password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Xác nhận mật khẩu mới:</label>
                <input type="password" id="confirm-password">
            </div>
            <button onclick="changePassword()">Lưu</button>
            <p id="change-status" style="display: none;"></p>
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
        function changePassword() {
            var currentPassword = document.getElementById("current-password").value;
            var newPassword = document.getElementById("new-password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var changeStatus = document.getElementById("change-status");

            if (newPassword !== confirmPassword) {
                changeStatus.style.display = "block";
                changeStatus.textContent = "Mật khẩu xác nhận không khớp!";
            } else {
                // Sử dụng AJAX để gửi yêu cầu đến file PHP
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        changeStatus.style.display = "block";
                        changeStatus.textContent = xhr.responseText;
                    }
                };
                xhr.open("POST", "changePassword.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("currentPassword=" + currentPassword + "&newPassword=" + newPassword + "&confirmPassword=" + confirmPassword);
            }
         }

function passwordChangeSuccess(statusElement) {
    statusElement.style.display = "block";
    statusElement.textContent = "Thay đổi mật khẩu thành công!";
}


    </script>
</body>
</html>
