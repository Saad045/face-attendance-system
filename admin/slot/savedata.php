<?php
include 'config.php';

$s_no = $_POST['slot_no'];
$shift = $_POST['shift'];
$tstart = $_POST['tstart'];
$tend = $_POST['tend'];

// Check if the same data already exists
$sql_check = "SELECT * FROM slot WHERE slot_no = '$s_no' AND shift='$shift'";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");

if (mysqli_num_rows($result_check) > 0) {
    session_start();
    $_SESSION['alertMessage'] = "This Slot already exists.";
    header("Location: slot.php");
    exit();
}

$sql_check1 = "SELECT * FROM slot WHERE slot_time BETWEEN '$tstart' AND '$tend'";
$result_check1 = mysqli_query($conn, $sql_check1) or die("Query Unsuccessful.");

if (mysqli_num_rows($result_check1) > 0) {
    session_start();
    $_SESSION['alertMessage'] = "Time slot already exists.";
    header("Location: slot.php");
    exit();
}

$slot_time = $tstart . "-" . $tend;

$sql = "INSERT INTO slot (id, slot_no, slot_time, shift) VALUES (NULL, '$s_no', '$slot_time', '$shift')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: slot.php");
?>