<?php
session_start(); // Start the session

include 'config.php';

$std_id = $_POST['id'];
$s_name = $_POST['teacher_name'];
$s_cnic = $_POST['cnic'];
$s_phone = $_POST['phone'];
$s_qualification = $_POST['qualification'];
$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_address = $_POST['address'];

// Check if a record with the same roll_no, cnic, email or phone already exists
$sql = "SELECT id FROM teacher WHERE (cnic = '{$s_cnic}' OR email = '{$s_email}' OR mobile_no = '{$s_phone}') AND id != {$std_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['alertMessage'] = "A teacher record with the same CNIC, email, or phone number already exists. Please check your input.";
    header("Location: edit.php?id={$std_id}");
    exit();

}


$sql = "UPDATE teacher SET name = '{$s_name}', cnic = '{$s_cnic}', mobile_no = '{$s_phone}', qualification = '{$s_qualification}', email = '{$s_email}', password = '{$s_password}', address = '{$s_address}' WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: teacher.php");
// $image_path = $_POST['picture']; 

// Check if an image was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Get the image file name and path
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    // $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_check = explode('.', $image_name);
    $image_ext = strtolower(end($image_check));
    $image_path = "images/" . $std_id . ".jpg";

    // Check if the uploaded file is an image
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($image_ext, $allowed_exts)) { //Error!
        // Move the uploaded file to the images directory
        move_uploaded_file($image_tmp, $image_path);


        $sql = "UPDATE teacher SET name = '{$s_name}', cnic = '{$s_cnic}', mobile_no = '{$s_phone}', qualification = '{$s_qualification}', email = '{$s_email}', password = '{$s_password}', address = '{$s_address}', picture = '{$image_path}'WHERE id = {$std_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        header("Location: teacher.php");

    } else {
        $_SESSION['alertMessage'] = "Invalid file type. Only JPG, JPEG, PNG and GIF types are allowed.";
        header("Location: edit.php?id={$std_id}");
        exit();
    }

}

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>