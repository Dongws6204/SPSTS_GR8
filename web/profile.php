
<head>
    <h2 class="mt-2 text-info">Hồ sơ cá nhân</h2>
</head>
<?php

   session_start();
   require_once 'connect.php';
   
   if (isset($_SESSION['username'])) {
       $username = $_SESSION['username'];
       $stmt = $conn->prepare("SELECT user_id,first_name, last_name, birthday, gender, student_class FROM profile WHERE user_id = ?");
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $result = $stmt->get_result();
   
       if ($result && $result->num_rows > 0) {
           $user_info = $result->fetch_assoc();
          
           $user_id = $user_info['user_id'];
           $first_name = $user_info['first_name'];
           $last_name = $user_info['last_name'];
           $birthday = $user_info['birthday'];
           $gender = $user_info['gender'];
           $student_class = $user_info['student_class'];
   
           // Sử dụng thông tin như cần
       } else {
           echo "Không tìm thấy thông tin người dùng hoặc lỗi trong quá trình truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
       }
   
       $stmt->close();
   } else {
       echo "Bạn chưa đăng nhập.";
   }
   
    ?>
<style>
    .gradient-custom {
    /* fallback for old browsers */
    background: #f6d365;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }
</style>

<div class="header-right" style="text-align: right;">
    <div id="headerWelcome">
        Xin chào bạn: <strong>
        <?php echo $last_name . ' ' . $first_name; ?></strong> <?php echo '[' . $user_id . ']'; ?>
    </div>
</div>

<body>
    <hr>
    <div class="container py-5 h-80">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <div style="display: flex; align-items: start;">
                                <div class="menu">
                                    <div class="menu-items">
                                        <button onclick="window.location.href='schedule.php'">Thời khóa biểu</button>
                                        <button>Lớp học</button>
                                        <button onclick="window.location.href='exam_schedule.php'">Lịch thi</button>
                                        <button onclick ="window.location.href = 'result.php'">Kết quả học tập</button>
                                        <button onclick="window.location.href='course-handbook.php'">Cẩm nang môn học</button>
                                        <button onclick="window.location.href='feed-back.php'">Góp ý</button>
                                        <button onclick = "window.location.href = 'profile.php'">Tài khoản</button>
                                        <button onclick = "window.location.href = 'logout.php'">Đăng xuất</button>
                                    </div>
                                </div>
                                <div class="info">
                                    <img src="img/meow.png" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <p>
                                        Mã sinh viên : 
                                        <span >
                                            <?php echo $user_id; ?>
                                        </span>
                                    </p>
                                    <p>
                                        Họ và tên: 
                                        <span>
                                            <?php echo $last_name . ' ' . $first_name; ?>
                                        </span>
                                    </p>
                                    <p>
                                        Ngày sinh: 
                                        <span><?php echo $birthday; ?></span>
                                    </p>
                                    <p>
                                        Giới tính: 
                                        <span><?php echo $gender; ?></span>
                                    </p>
                                    <p>
                                        Lớp học: 
                                        <span ><?php echo $student_class; ?></span>
                                    </p>
                                    <!-- Thêm nút chỉnh sửa -->
                                <button onclick="editUserInfo()">Chỉnh sửa thông tin</button>

                                <!-- JavaScript để điều hướng người dùng đến trang chỉnh sửa -->
                                <script>
                                    function editUserInfo() {
                                        window.location.href = 'edit_profile.php';
                                    }
                                </script>
                                
                                <!-- Thêm nút "Danh sách lớp" -->
                                <button onclick="showClassList()">Danh sách lớp</button>

                                <script>
                                    function showClassList() {
                                        // Chuyển hướng đến trang hiển thị danh sách lớp
                                        window.location.href = 'class_list.php';
                                    }
                                </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

