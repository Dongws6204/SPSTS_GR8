
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cẩm nang môn học</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="user-info">
        <div class="user-name" onclick="toggleDropdown()">Tên người dùng</div>
        <div class="dropdown" id="dropdown">
            <button onclick="navigateTo('account')">Tài khoản</button>
            <button onclick="navigateTo('password')">Đổi mật khẩu</button>
        </div>
    </div>
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
        
    </div>

<div class="content1">

    <div class="course_handbook-box">
        <h2>Tài liệu</h2>
        <div class="course_handbook">
            <div class="course_handbook-item">
                <table class="course_handbook-table">
                    <thead>
                        <tr class="course_handbook-header">
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
                        <!-- Dữ liệu sẽ được chèn động từ JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function () {
            // Gọi hàm để lấy dữ liệu và hiển thị trong bảng
            fetchDataAndDisplay();

            function fetchDataAndDisplay() {
                // Sử dụng AJAX để gửi yêu cầu đến server
                $.ajax({
                    url: 'get_documents.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (documents) {
                        // Xử lý và hiển thị dữ liệu
                        displayDocuments(documents);
                    },
                    error: function () {
                        console.log('Lỗi khi gọi get_documents.php');
                    }
                });
            }

            function displayDocuments(documents) {
                var tableBody = $('#course_handbook-content');

                // Xóa nội dung cũ của bảng
                tableBody.empty();

                // Hiển thị dữ liệu mới
                for (var i = 0; i < documents.length; i++) {
                    var row = '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + documents[i].subject_name + '</td>' +
                        '<td>' + documents[i].course_code + '</td>' +
                        '<td>4</td>' + // Giả sử mặc định số TC là 4
                        '<td>' + documents[i].document_name + '</td>' +
                        '<td>' + documents[i].document_type + '</td>' +
                        '<td><a href="' + documents[i].Url + '" target="_blank">' + documents[i].Url + '</a></td>' +
                        '</tr>';

                    tableBody.append(row);
                }
            }
        });
    </script>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        function navigateTo(page) {
            // Thực hiện chuyển hướng tùy theo page được chọn
            if (page === 'account') {
                window.location.href = 'profile.php';
            } else if (page === 'password') {
                window.location.href = 'password.php';
            } else if (page === 'schedule') {
                window.location.href = 'schedule.php';
            } else if (page === 'exams') {
                window.location.href = 'exam_schedule.php';
            } else if (page === 'results') {
                window.location.href = 'results.php';
            } else if (page === 'handbook') {
                window.location.href = 'course-handbook.php';
            } else if (page === 'feedback') {
                window.location.href = 'feedback.php';
            } else if (page === 'logout') {
                window.location.href = 'index.php';
            }
        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
