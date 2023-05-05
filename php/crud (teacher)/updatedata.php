<?php
include 'config.php';

$t_id = $_POST['id'];
$t_name = $_POST['teacher_name'];
$t_email = $_POST['email'];
$t_password = $_POST['password'];
$mobile_no = $_POST['mobile_no'];
$t_cnic = $_POST['cnic'];
$t_qualification = $_POST['qualification'];
$t_address = $_POST['address'];

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
    
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($image_ext, $allowed_exts)) {
        move_uploaded_file($image_tmp, $image_path);
        
        $sql = "UPDATE teacher SET name = '{$t_name}', email = '{$t_email}',password = '{$t_password}', mobile_no = '{$mobile_no}', cnic = '{$t_cnic}', qualification = '{$t_qualification}', address = '{$t_address}', image = '{$image_path}' WHERE id = {$t_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        header("Location: index.php");
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG and GIF types are allowed.";
    }
}

// header("Location: http://localhost/php/crud%20(teacher)/");
// mysqli_close($conn);

?>
