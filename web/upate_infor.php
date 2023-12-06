<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['user_id'];  // Assuming user_id is the primary key

    $updatedEmail = mysqli_real_escape_string($conn, $_POST['updatedEmail']);

    $sql = "UPDATE users SET email = '$updatedEmail' WHERE student_id = '$username'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['user_email'] = $updatedEmail;
        echo "Update successful!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
