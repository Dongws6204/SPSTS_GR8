<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Profile</title>
</head>
<body>
    <!-- Thêm nút "Trở về trang chủ" -->
    <button onclick="goToHomepage()">Trở về trang chủ</button>

    <script>
        function goToHomepage() {
            window.location.href = 'home_page.php'; // Thay đổi 'homepage.php' thành URL thực tế của trang chủ
        }
    </script>
</body>
</html>

<?php
session_start();
require_once 'connect.php';


// Lấy thông tin người dùng từ cơ sở dữ liệu
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT user_id, first_name, last_name, student_class FROM profile WHERE user_id = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user_info = $result->fetch_assoc();
    $class = $user_info['student_class'];

    // Lấy danh sách người dùng cùng lớp
    $stmt = $conn->prepare("SELECT first_name, last_name FROM profile WHERE student_class = ?");
    $stmt->bind_param("s", $class);
    $stmt->execute();
    $classmates = $stmt->get_result();

    echo "<style>
    .class-list {
        font-family: Arial, sans-serif;
        list-style-type: none;
        padding: 0;
    }
    .class-list li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .class-list li:last-child {
        border-bottom: none;
    }
    .class-list li:hover {
        background-color: #f6f6f6;
    }
</style>";

        echo "<h2>Danh sách lớp $class</h2>";
        echo "<ul class='class-list'>";
        while ($classmate = $classmates->fetch_assoc()) {
            echo "<li>{$classmate['last_name']} {$classmate['first_name']}</li>";
        }
        echo "</ul>";

} else {
    echo "Không tìm thấy thông tin người dùng hoặc lỗi trong quá trình truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
}
?>
