<?php
// Khởi tạo session và kết nối cơ sở dữ liệu
session_start();
require_once 'connect.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

// Lấy thông tin người dùng từ cơ sở dữ liệu
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT user_id,first_name, last_name, birthday, gender, student_class FROM profile WHERE user_id = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user_info = $result->fetch_assoc();

    // Gọi hàm chỉnh sửa với thông tin người dùng
    editUserProfile($user_info);
} else {
    echo "Không tìm thấy thông tin người dùng hoặc lỗi trong quá trình truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
}
?>

<?php
function editUserProfile($user_info) {
    // Trang chỉnh sửa thông tin
    // Hiển thị các trường nhập liệu cho thông tin cần chỉnh sửa, ví dụ:
?>
    <form action="update_profile.php" method="post">
        <label for="first_name">Tên:</label>
        <input type="text" name="first_name" value="<?php echo $user_info['first_name']; ?>">

        <label for="last_name">Họ:</label>
        <input type="text" name="last_name" value="<?php echo $user_info['last_name']; ?>">

        <label for="birthday">Ngày sinh:</label>
        <input type="date" name="birthday" value="<?php echo $user_info['birthday']; ?>">

        <label for="gender">Giới tính:</label>
        <select name="gender">
            <option value="Nam" <?php echo ($user_info['gender'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo ($user_info['gender'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
        </select>

        <label for="student_class">Lớp học:</label>
        <input type="text" name="student_class" value="<?php echo $user_info['student_class']; ?>">

        <input type="submit" value="Lưu">
    </form>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
