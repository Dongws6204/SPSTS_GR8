<?php
require_once 'connect.php';

$semester = $_GET['semester'];
$sql = "SELECT * FROM ket_qua_hoc_tap WHERE hoc_ky = '$semester'" ;
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='result-row'>";
        echo "<span>" . $row["STT"] . "</span>";
        echo "<span>" . $row["ten_mon_hoc"] . "</span>";
        echo "<span>" . $row["ma_hoc_phan"] . "</span>";
        echo "<span>" . $row["so_tc"] . "</span>";
        echo "<span>" . $row["diem_tk"] . "</span>";
        echo "<span>" . $row["diem_quy_doi"] . "</span>";
        echo "</div>";
    }
} else {
    echo "0 kết quả";
}


$conn->close();
?>