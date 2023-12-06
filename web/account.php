<?php
session_start();
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="stylesheet" href="style1.css">
    <style>
      .account-details {
    max-width: 800px;
    height:400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10%; /* Đặt border-radius thành 50% để tạo khung hình tròn */
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* Đảm bảo nội dung bên trong không bị tràn ra ngoài khung hình tròn */
   margin-left:620px;
}


.account-details h1 {
    font-size: 24px;
    margin-bottom: 20px;
    margin-left:50px;
}

.info {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid black;
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
    background-color: lightskyblue;
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
    <div class="account-details">
        <h1>Thông tin Tài Khoản</h1>
        <div class="info">
            <div class="form-group">
                <label for="username">Tên tài khoản:</label>
                <input type="text" id="username" value="<?php echo $_SESSION['user_name']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="student-id">Mã sinh viên:</label>
                <input type="text" id="student-id" value="<?php echo $_SESSION['user_id']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" value="<?php echo $_SESSION['user_email']; ?>" disabled>
            </div>
            <button onclick="toggleEdit()">Chỉnh sửa</button>
            <button id="save-btn" style="display: none;" onclick="saveChanges()">Lưu</button>
            <button id="cancel-btn" style="display: none;" onclick="cancelEdit()">Hủy</button>
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
        function toggleEdit() {
    var usernameInput = document.getElementById("username");
    var studentIdInput = document.getElementById("student-id");
    var emailInput = document.getElementById("email");

    emailInput.disabled = false;

    var editButton = document.querySelector('.info button');
    editButton.style.display = 'none';

    var saveButton = document.getElementById('save-btn');
    var cancelButton = document.getElementById('cancel-btn');

    saveButton.style.display = 'block';
    cancelButton.style.display = 'block';
}

function saveChanges() {

    var emailInput = document.getElementById("email");
    var updatedEmail = emailInput.value;

    // Send an AJAX request to update_info.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_info.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update successful, you can handle the response here if needed
            console.log(xhr.responseText);
        }
    };

    // Send the data to the server
    xhr.send("updatedEmail=" + encodeURIComponent(updatedEmail));

    // Sau khi lưu, chuyển trở lại trạng thái chỉ đọc
    emailInput.value = updatedEmail;

    emailInput.disabled = true;

    var editButton = document.querySelector('.info button');
    editButton.style.display = 'block';

    var saveButton = document.getElementById('save-btn');
    var cancelButton = document.getElementById('cancel-btn');

    saveButton.style.display = 'none';
    cancelButton.style.display = 'none';
}

function cancelEdit() {
    var emailInput = document.getElementById("email");

    emailInput.disabled = true;

    var editButton = document.querySelector('.info button');
    editButton.style.display = 'block';

    var saveButton = document.getElementById('save-btn');
    var cancelButton = document.getElementById('cancel-btn');

    saveButton.style.display = 'none';
    cancelButton.style.display = 'none';
}


    </script>
</body>
</html>
