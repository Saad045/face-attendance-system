<?php
    include 'config.php';

    $t_name = $_POST['teacher_name'];
    $t_email = $_POST['email'];
    $t_password = $_POST['password'];
    $mobile_no = $_POST['mobile_no'];
    $t_cnic = $_POST['cnic'];
    $t_qualification = $_POST['qualification'];
    $t_address = $_POST['address'];

    $image = $_FILES["uploadfile"];
    $filename = $_FILES["uploadfile"]["name"];
    $_tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($_tempname,$folder); 

    // Display the uploaded image
    // if(isset($folder)) {
    //     echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
    // }
    
 
// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");

    $sql = "INSERT INTO teacher(name,email,password,mobile_no,cnic,qualification,address,image) VALUES ('{$t_name}','{$t_email}','{$t_password}','{$mobile_no}','{$t_cnic}','{$t_qualification}','{$t_address}','{$folder}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

// header("Location: http://localhost/php/crud%20(teacher)/");
// mysqli_close($conn);
?>

