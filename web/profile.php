
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
</head>
<?php

session_start();
require_once 'connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT user_id, first_name, last_name, birthday, gender, student_class FROM profile WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user_info = $result->fetch_assoc();

        $user_id = $user_info['user_id'];
        $first_name = $user_info['first_name'];
        $last_name = $user_info['last_name'];
        $birthday = $user_info['birthday'];
        $gender = $user_info['gender'];
        $student_class = $user_info['student_class'];

    } else {
        echo "Không tìm thấy thông tin người dùng hoặc lỗi trong quá trình truy vấn cơ sở dữ liệu: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Bạn chưa đăng nhập.";
}
    ?>


<div class="header-right" style="text-align: right;">
    <div id="headerWelcome">
        Xin chào bạn: <strong>
        <?php echo $last_name . ' ' . $first_name; ?></strong> <?php echo '[' . $user_id . ']'; ?>
    </div>
</div>

<body>

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

        <style>
    .content {
        float: right;
        margin-right: 100px; /* Điều chỉnh khoảng cách nếu cần thiết */
    }
        </style>

    <hr>
    <div class="content">
        <img src="img/meow.png" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
        <p>Mã sinh viên: <span><?php echo $user_id; ?></span></p>
        <p>Họ và tên: <span><?php echo $last_name . ' ' . $first_name; ?></span></p>
        <p>Ngày sinh: <span><?php echo $birthday; ?></span></p>
        <p>Giới tính: <span><?php echo $gender; ?></span></p>
        <p>Lớp học: <span><?php echo $student_class; ?></span></p>
                                    <!-- Thêm nút chỉnh sửa -->
                                <button onclick="editUserInfo()">Chỉnh sửa thông tin</button>

                                <!-- JavaScript để điều hướng người dùng đến trang chỉnh sửa -->
                                <script>
                                    function editUserInfo() {
                                        window.location.href = 'edit_profile.php';
                                    }
                                </script>
                                
                                <!-- Thêm nút "Danh sách lớp" -->
                                <button onclick="showClassList()">Danh sách lớp</button>

                                <script>
                                    function showClassList() {
                                        // Chuyển hướng đến trang hiển thị danh sách lớp
                                        window.location.href = 'class_list.php';
                                    }
                                </script>
        </div>
    </div>
</body>

