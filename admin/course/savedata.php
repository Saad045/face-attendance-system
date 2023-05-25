<?php
include 'config.php';
$c_name = $_POST['course_name'];
$c_code = $_POST['course_code'];
$c_hours = $_POST['credit_hour'];
$l_hours = $_POST['hours'];

// Check if the same data already exists
$sql_check = "SELECT * FROM course WHERE name = '$c_name' OR course_code ='$c_code'";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");

if (mysqli_num_rows($result_check) > 0) {
    // If data already exists, show error message and exit script
    $existingData = mysqli_fetch_assoc($result_check);
    if ($existingData['name'] == $c_name && $existingData['course_code'] == $c_code) {
        // Both course name and course code already exist
        session_start();
        $_SESSION['alertMessage'] = "This Course Name and Course Code already exist.";
    } elseif ($existingData['name'] == $c_name) {
        // Only course name already exists
        session_start();
        $_SESSION['alertMessage'] = "This Course Name already exists.";
    } elseif ($existingData['course_code'] == $c_code) {
        // Only course code already exists
        session_start();
        $_SESSION['alertMessage'] = "The Course of this Code already exists.";
    }
    header("Location: course.php");
    exit();
}

$sql = "INSERT INTO course (id, name, course_code, credit_hour, hours) VALUES (NULL, '$c_name', '$c_code', '$c_hours', '$l_hours')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: course.php");
?>