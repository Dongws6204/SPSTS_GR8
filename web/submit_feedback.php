<?php
require_once 'connect.php'; // Kết nối đến cơ sở dữ liệu
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem đã đăng nhập hay chưa
    if (!isset($_SESSION['user_id'])) {
        die("Bạn chưa đăng nhập.");
    }

    // Lấy dữ liệu từ form
    $student_id = $_SESSION['user_id'];
    $request_type = $_POST['issue-type'];
    $request_content = $_POST['feedback'];
    $request_status = 'Chưa duyệt';
    $request_date = date('Y-m-d'); // Ngày hiện tại

    // Thực hiện truy vấn để thêm dữ liệu vào bảng request
    $sql = "INSERT INTO request (student_id, request_type, request_content, request_status, request_date) 
            VALUES ('$student_id', '$request_type', '$request_content', '$request_status', '$request_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Gửi góp ý thành công.');</script>";
        header("Location: feedback.php"); // Chuyển hướng đến trang feedback.php
        exit(); 
    } else {
        echo "Lỗi: " . $conn->error;
    }


    $conn->close();
} else {
    // Nếu không phải là phương thức POST, chuyển hướng hoặc xử lý theo cách khác tùy thuộc vào yêu cầu của bạn.
    // Ví dụ: header("Location: index.php");
    echo "Invalid request method.";
}
?>
