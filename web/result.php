<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <title>Kết quả học tập</title>
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
                <button>Thời khóa biểu</button>
                <button>Lớp học</button>
                <button>Lịch thi</button>
                <button>Kết quả học tập</button>
                <button>Cẩm nang môn học</button>
                <button>Góp ý</button>
                <div class="account-button">
                    <ion-icon name="person-circle-outline" class="account-icon"></ion-icon>
                    <span class="account-text">Tài khoản</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Thanh lựa chọn học kỳ -->
    <div class="semester-select2">
        <label for="semester">Chọn học kỳ:</label>
        <select id="semester">
            <option value="hoc-ky-2-1">Học kỳ 2 năm học 2022-2023</option>
            <option value="hoc-ky-1">Học kỳ 1 năm học 2023-2024</option>
            <option value="hoc-ky-2">Học kỳ 2 năm học 2023-2024</option>
        </select>
        <button id="view-result-button">Xem Kết Quả Học Tập</button>
    </div>

    <!-- Bảng kết quả học tập -->
    <div id="result-container">
        <table id="result-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên môn học</th>
                    <th>Mã học phần</th>
                    <th>Số TC</th>
                    <th>Điểm TK</th>
                    <th>Điểm quy đổi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                // Kết nối vào cơ sở dữ liệu của bạn ở đây
                require_once 'connect.php';
                // Lấy kết quả thi từ cơ sở dữ liệu
                $sql = "SELECT * FROM ket_qua_hoc_tap";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    $data = [];
                }
                $conn->close();
                ?>
            </tbody>
        </table>

       <!-- Thông báo khi dữ liệu chưa được cập nhật -->
       <p id="not-updated-message">Dữ liệu chưa được cập nhật.</p>
    </div>

    <script>
        const semesterSelect = document.getElementById('semester');
        const viewResultButton = document.getElementById('view-result-button');
        const resultContainer = document.getElementById('result-container');
        const resultTable = document.getElementById('result-table');
        const notUpdatedMessage = document.getElementById('not-updated-message');

       
        viewResultButton.addEventListener('click', () => {
            const selectedSemester = semesterSelect.value;

            // Xem kết quả học tập cho học kỳ 2 năm học 2022-2023
            if (selectedSemester === 'hoc-ky-2-1') {
                // Hiển thị bảng kết quả học tập và thông báo khi cần
                resultTable.style.display = 'block';

                // Thêm dữ liệu kết quả học tập ở đây (có thể lấy từ server)
                // Ví dụ:
                const sampleData = <?php echo json_encode($data); ?>;

                // Xóa dữ liệu cũ trong bảng
                const tbody = resultTable.querySelector('tbody');
                tbody.innerHTML = '';

                // Thêm dữ liệu mới vào bảng
                sampleData.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${item.ten_mon_hoc}</td>
                        <td>${item.ma_hoc_phan}</td>
                        <td>${item.so_TC}</td>
                        <td>${item.diem_TK}</td>
                        <td>${item.diem_quy_doi}</td>
                    `;
                    tbody.appendChild(row);
                });

                // Ẩn thông báo khi có dữ liệu
                notUpdatedMessage.style.display = 'none';
            } else {
                // Hiển thị thông báo khi dữ liệu chưa được cập nhật
                resultTable.style.display = 'none';
                notUpdatedMessage.style.display = 'block';
            }
        });
    </script>

    <script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
    <script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>   
</body>
</html>
