<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <title>Cẩm nang môn học</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/Logo-VNU.png">
        </div>
        <div class="support">
            <p>Hỗ trợ sinh viên</p>
        </div>
        <div class="logo">
            <img src="img/Logo-UET.png">
        </div>
    </header>
    <div class="container">
        <div class="menu">
            <div class="menu-items">
                <button onclick="window.location.href='schedule.php'">Thời khóa biểu</button>
                <button>Lớp học</button>
                <button onclick="window.location.href='exam-schedule.php'">Lịch thi</button>
                <button onclick="window.location.href='result.php'">Kết quả học tập</button>
                <button>Cẩm nang môn học</button>
                <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="content1">
        <div class="course_handbook-box">
            <h2>Tài liệu</h2>
            <div class="course_handbook">
                <div class="course_handbook-item">
                    <div class="course_handbook-header">
                        <span>STT</span>
                        <span>Môn học</span>
                        <span>Mã học phần</span>
                        <span>Số TC</span>
                        <span>Loại tài liệu</span>
                        <span>Ghi chú</span>
                    </div>
                    <div class="course_handbook-row" id="course_handbook-content">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <style>
    .course_handbook {
        width: 100%;
        border-collapse: collapse;
    }
    .course_handbook th, .course_handbook td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .course_handbook tr:nth-child(even){background-color: #f2f2f2;}
    .course_handbook th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<div class="content1">
    <div class="course_handbook-box">
        <h2>Tài liệu</h2>
        <table class="course_handbook">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Môn học</th>
                    <th>Mã học phần</th>
                    <th>Số TC</th>
                    <th>Tên tài liệu</th>
                    <th>Loại tài liệu</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody id="course_handbook-content">
            </tbody>
        </table>
    </div>
</div>
<script>
    // Gọi hàm để lấy dữ liệu và hiển thị trong bảng
    fetchDataAndDisplay();
    
    function fetchDataAndDisplay() {
        // Sử dụng AJAX để gửi yêu cầu đến server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_documents.php', true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Xử lý và hiển thị dữ liệu
                var documents = JSON.parse(xhr.responseText);
                displayDocuments(documents);
            }
        };

        xhr.send();
    }

    function displayDocuments(documents) {
        var tableBody = document.getElementById('course_handbook-content');
        
        // Xóa nội dung cũ của bảng
        tableBody.innerHTML = '';

        // Hiển thị dữ liệu mới
        for (var i = 0; i < documents.length; i++) {
            var row = tableBody.insertRow(i);
            var cellIndex = row.insertCell(0);
            var cellSubject = row.insertCell(1);
            var cellCourseCode = row.insertCell(2);
            var cellCredit = row.insertCell(3);
            var cellDocumentName = row.insertCell(4);
            var cellDocumentType = row.insertCell(5);
            var cellUrl = row.insertCell(6);

            cellIndex.innerHTML = documents[i].document_id;
            cellSubject.innerHTML = documents[i].subject_name; // Dữ liệu từ bảng subject
            cellCourseCode.innerHTML = documents[i].course_code;
            cellCredit.innerHTML = 4; // Giả sử mặc định số TC là 4
            cellDocumentName.innerHTML = documents[i].document_name;
            cellDocumentType.innerHTML = documents[i].document_type;
            cellUrl.innerHTML = documents[i].Url;

            // Hiển thị URL là một liên kết
        cellUrl.innerHTML = "<a href='" + documents[i].Url + "' target='_blank'>" + documents[i].Url + "</a>";
        }
    }
</script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
