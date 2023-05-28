<?php
session_start(); // Start the session
include 'config.php';

$std_id = $_POST['id'];
$s_name = $_POST['student_name'];
$roll_no = $_POST['roll_no'];
$s_session = $_POST['session'];
$s_department = $_POST['department'];
$s_degree = $_POST['degree'];
$s_shift = $_POST['shift'];
$s_email = $_POST['email'];
// $s_password = $_POST['password'];
$s_cnic = $_POST['cnic'];
$s_phone = $_POST['phone'];
$s_address = $_POST['address'];
$image = $_FILES['image'];

// Check if a record with the same roll_no, cnic, email or phone already exists
$sql = "SELECT id FROM student WHERE (roll_no = '{$roll_no}' OR cnic = '{$s_cnic}' OR email = '{$s_email}') AND id != {$std_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['alertMessage'] = "A student record with the same roll number, CNIC, email, or phone number already exists. Please check your input.";
    header("Location: edit.php?id={$std_id}");
} else {

    if (isset($image) && $image['error'] == 0) {
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_check = explode('.', $image_name);
        $image_ext = strtolower(end($image_check));
        $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($image_ext, $allowed_exts)) {
            $image_path = "uploads/student/" . $roll_no . "." . $image_ext;
            move_uploaded_file($image_tmp, "../".$image_path);
            $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}', department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', shift = '{$s_shift}', address = '{$s_address}', picture = '{$image_path}' WHERE id = {$std_id}";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
            header("Location: student.php?success=Record updated successfully with image!");
        } else {
            header("Location: edit.php?id={$std_id}&error=File extension must be jpg, jpeg, png or gif!");
        }
        
    } else {
        $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}', department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}', address = '{$s_address}' WHERE id = {$std_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        header("Location: student.php?success=Record updated successfully without image!");
    }
    
}

// $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}', department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}' WHERE id = {$std_id}";
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
// header("Location: student.php");

// // Check if an image was uploaded
// if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
//     // Get the image file name and path
//     $image_name = $_FILES['image']['name'];
//     $image_tmp = $_FILES['image']['tmp_name'];
//     $image_size = $_FILES['image']['size'];
//     $image_check = explode('.', $image_name);
//     $image_ext = strtolower(end($image_check));
//     $image_path = "images/" . $std_id . ".jpg";

//     // Check if the uploaded file is an image
//     $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
//     if (in_array($image_ext, $allowed_exts)) {
//         // Move the uploaded file to the images directory
//         move_uploaded_file($image_tmp, $image_path);

//         $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}', department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}', picture = '{$image_path}' WHERE id = {$std_id}";
//         $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
//         header("Location: student.php");
//     } else {
//         $_SESSION['alertMessage'] = "Invalid file type. Only JPG, JPEG, PNG and GIF types are allowed.";
//         header("Location: edit.php?id={$std_id}");
//         exit();
//     }
// }
?>