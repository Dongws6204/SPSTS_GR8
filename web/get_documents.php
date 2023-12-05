<?php
require_once 'connect.php';

$sql = "SELECT d.document_id, s.subject_name, d.course_code, d.document_name, d.document_type, d.Url
        FROM document d
        LEFT JOIN subject s ON d.subject_id = s.subject_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $documents = array();
    while ($row = $result->fetch_assoc()) {
        $documents[] = $row;
    }

    // Trả về dữ liệu dưới dạng mảng JSON
    echo json_encode($documents);
} else {
    echo "Không có dữ liệu hoặc có lỗi truy vấn cơ sở dữ liệu: " . $conn->error;
}

$conn->close();
?>
