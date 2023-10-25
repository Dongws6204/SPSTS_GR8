<h2 class="mt-2 text-info">Hồ sơ cá nhân</h2>

<?php

   session_start();
   require_once 'connect.php';
   
   if (isset($_SESSION['username'])) {
       $username = $_SESSION['username'];
       $stmt = $conn->prepare("SELECT first_name, last_name, birthday, gender, student_class FROM profile WHERE user_id = ?");
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $result = $stmt->get_result();
   
       if ($result && $result->num_rows > 0) {
           $user_info = $result->fetch_assoc();
   
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

<hr>
<div class="container py-5 h-80">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="image/meow.png" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
            </div>

            <p>Họ và tên: <?php echo $last_name . ' ' . $first_name; ?></p>
            <p>Ngày sinh: <?php echo $birthday; ?></p>
            <p>Giới tính: <?php echo $gender; ?></p>
            <p>Lớp học: <?php echo $student_class; ?></p>


            <div class="col-md-8">
              <div class="card-body p-20">
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                    <div class="col-4 mb-2">
                    </div>
                    <div class="col-8 mb-3">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>