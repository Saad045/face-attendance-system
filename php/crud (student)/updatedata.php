<?php
include 'config.php';

$std_id = $_POST['id'];
$s_name = $_POST['student_name'];
$roll_no = $_POST['roll_no'];
$s_department = $_POST['department'];
$s_degree = $_POST['degree'];
$s_session = $_POST['session'];
$s_cnic = $_POST['cnic'];
$s_phone = $_POST['phone'];
$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_shift = $_POST['shift'];
$sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}',department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}', picture = '{$image_path}'WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");
// Check if an image was uploaded
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Get the image file name and path
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    // $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_check = explode('.', $image_name);
    $image_ext = strtolower(end($image_check));
    $image_path = 'images/' . $image_name;
    
    // Check if the uploaded file is an image
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($image_ext, $allowed_exts)) {                                       //Error!
        // Move the uploaded file to the images directory
        move_uploaded_file($image_tmp, $image_path);


    $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}',department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}', picture = '{$image_path}'WHERE id = {$std_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG and GIF types are allowed.";
    }
}

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>
