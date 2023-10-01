<?php
$servername = "localhost";
$username = "root";
$password = "1616lclc";
$dbname = "quan_ly_dao_tao";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM thoi_khoa_bieu";
$result = $conn->query($sql);
?>

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
                <button>Lịch thi</button>
                <button>Kết quả học tập</button>
                <button>Cẩm nang môn học</button>
                <button>Góp ý</button>
                <button>Tài khoản</button>
                <button>Đăng xuất</button>
            </div>
        </div>
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
                       <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='schedule-row'>";
                                echo "<span>" . $row["thu"] . "</span>";
                                echo "<span>" . $row["mon_hoc"] . "</span>";
                                echo "<span>" . $row["thoi_gian"] . "</span>";
                                echo "<span>" . $row["dia_diem"] . "</span>";
                                echo "<span>" . $row["lop"] . "</span>";
                                echo "<span>" . $row["ten_giao_vien"] . "</span>";
                                echo "<span>" . $row["ghi_chu"] . "</span>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 kết quả";
                        }

                        $conn->close();
                       ?>
                    <!-- Thêm các hàng thời khóa biểu khác tại đây -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
