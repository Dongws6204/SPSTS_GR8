<?php
require_once 'connect.php';

$semester = $_GET['semester'];
$sql = "SELECT * FROM thoi_khoa_bieu WHERE hoc_ky = '$semester'" ;
$result = $conn->query($sql);

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
