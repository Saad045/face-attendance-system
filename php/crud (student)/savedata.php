<?php
    include 'config.php';

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

    $image = $_FILES['image'];
    $filename = $_FILES["image"]["name"];
    $_tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/" .$filename;
    move_uploaded_file($_tempname,$folder); 

    // Display the uploaded image
    // if(isset($folder)) {
    //     echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
    // }
 
// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");

    $sql = "INSERT INTO student(name,roll_no,department,degree,session,cnic,phone,email,password,shift,picture) VALUES ('{$s_name}','{$roll_no}','{$s_department}','{$s_degree}','{$s_session}','{$s_cnic}','{$s_phone}','{$s_email}','{$s_password}','{$s_shift}','{$folder}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>

