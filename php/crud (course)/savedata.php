<?php
    include 'config.php';
    $c_name = $_POST['course_name'];
    $c_code = $_POST['course_code'];
    $c_hours = $_POST['credit_hours'];
    $l_hours = $_POST['lecture_hours'];

// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");
    $sql = "INSERT INTO course(id,name,course_code,credit_hour,hours) VALUES (Null,'{$c_name}','{$c_code}','{$c_hours}','{$l_hours}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

// header("Location: http://localhost/php/crud%20(course)/");
    header("Location: index.php");

// mysqli_close($conn);

?>
