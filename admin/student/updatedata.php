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

// Check if a record with the same roll_no, cnic, email or phone already exists
$sql = "SELECT id FROM student WHERE (roll_no = '{$roll_no}' OR cnic = '{$s_cnic}' OR email = '{$s_email}' OR phone = '{$s_phone}') AND id != {$std_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    die("A student record with the same roll number, CNIC, email, or phone number already exists. Please check your input.");
}

$sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}',department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}' WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: student.php");
// $image_path = $_POST['picture']; 

// Check if an image was uploaded
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Get the image file name and path
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    // $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_check = explode('.', $image_name);
    $image_ext = strtolower(end($image_check));
    $image_path = "images/" .$std_id.".jpg";
    
    // Check if the uploaded file is an image
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($image_ext, $allowed_exts)) {                                       //Error!
        // Move the uploaded file to the images directory
        move_uploaded_file($image_tmp, $image_path);

        
            

    $sql = "UPDATE student SET name = '{$s_name}', roll_no = '{$roll_no}',department = '{$s_department}', degree = '{$s_degree}', session = '{$s_session}', cnic = '{$s_cnic}', phone = '{$s_phone}', email = '{$s_email}', password = '{$s_password}', shift = '{$s_shift}', picture = '{$image_path}'WHERE id = {$std_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: student.php");

    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG and GIF types are allowed.";
    }

}

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>
