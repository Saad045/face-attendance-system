<?php
    include 'config.php';
    $c_name = $_POST['course_name'];
    $c_code = $_POST['course_code'];
    $c_hours = $_POST['credit_hour'];
    $l_hours = $_POST['hours'];

// Check if the same data already exists
$sql_check = "SELECT * FROM course WHERE name = '$c_name' ";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");
$sql_check1 = "SELECT * FROM course WHERE course_code ='$c_code'";
$result_check1 = mysqli_query($conn, $sql_check1) or die("Query Unsuccessful.");
$sql_check2 = "SELECT * FROM course WHERE name = '$c_name' AND course_code ='$c_code'";
$result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
if (mysqli_num_rows($result_check) > 0) {
    // If data already exists, show error message and exit script
    echo "This Course_name already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check1) > 0) {
    // If data already exists, show error message and exit script
    echo "This Course_Code already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check2) > 0) {
    // If data already exists, show error message and exit script
    echo "This Course_name and Course_code already exists.";
    exit();
}
   
// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");
    $sql = "INSERT INTO course(id,name,course_code,credit_hour,hours) VALUES (Null,'{$c_name}','{$c_code}','{$c_hours}','{$l_hours}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

// header("Location: http://localhost/php/crud%20(course)/");
    header("Location: course.php");

// mysqli_close($conn);

?>