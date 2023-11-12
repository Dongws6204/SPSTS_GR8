<?php
require_once 'connect.php';

$semester = $_GET['semester'];
$sql = "SELECT * FROM lich_thi WHERE hoc_ky = '$semester'" ;
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='schedule-row'>";
        echo "<span>" . $row["STT"] . "</span>";
        echo "<span>" . $row["gio"] . "</span>";
        echo "<span>" . $row["ngay_thi"] . "</span>";
        echo "<span>" . $row["mon_hoc"] . "</span>";
        echo "<span>" . $row["so_tc"] . "</span>";
        echo "<span>" . $row["dia_diem"] . "</span>";
        echo "<span>" . $row["hinh_thuc_thi"] . "</span>";
        echo "</div>";
    }
} else {
    echo "0 kết quả";
}


$conn->close();
?>
