<?php
include 'config.php';

$s_no = $_POST['slot_no'];
// $s_time = $_POST['slot_time'];
$shift = $_POST['shift'];
$tstart = $_POST['tstart'];
$tend = $_POST['tend'];
// print_r('start'.$tstart);
// print_r('end'.$tend);
// echo "$tstart";
// Check if the same data already exists
$sql_check = "SELECT * FROM slot WHERE slot_no = '$s_no'";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");
$sql_check1 = "SELECT * FROM slot WHERE slot_time = '$tstart'";
$result_check1 = mysqli_query($conn, $sql_check1) or die("Query Unsuccessful.");
$sql_check2 = "SELECT * FROM slot WHERE slot_time = '$tend'";
$result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
if (mysqli_num_rows($result_check) > 0) {
    session_start();
    $_SESSION['alertMessage'] = "This Slot Number already exists.";
    header("Location: slot.php");
    exit();
} elseif (mysqli_num_rows($result_check1) > 0) {
    // If data already exists, show error message and exit script
    session_start();
    $_SESSION['alertMessage'] = "This Start time already exists.";
    header("Location: slot.php");
    exit();
} elseif (mysqli_num_rows($result_check2) > 0) {
    // If data already exists, show error message and exit script
    session_start();
    $_SESSION['alertMessage'] = "This End time already exists.";
    header("Location: slot.php");
    exit();
}

$slot_time = $tstart . "-" . $tend;
// print_r($slot_time);
// die();
// $conn = mysqli_connect("localhost","root","","attendance_system") or die("Connection Failed");

$sql = "INSERT INTO slot (id,slot_no,slot_time,shift) VALUES (Null,'{$s_no}','{$slot_time}','{$shift}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: slot.php");

// header("Location: http://localhost/php/crud%20(slot)/");
// mysqli_close($conn);

?>