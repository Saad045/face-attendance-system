<?php
session_start();
include '../includes/config.php';

$s_id = $_POST['id'];
$s_no = $_POST['slot_no'];
$s_time = $_POST['slot_time'];
$shift = $_POST['shift'];

// Check if a record with the same roll_no, cnic, email or phone already exists
$sql = "SELECT id FROM slot WHERE (slot_no = '{$s_no}' OR slot_time = '{$s_time}')AND id != {$s_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "A slot record with the same slot_number or slot_time already exists.";
    header("Location: edit.php?id={$s_id}");
    exit();
}

$sql = "UPDATE slot SET slot_no = '{$s_no}', slot_time = '{$s_time}',shift = '{$shift}' WHERE id = {$s_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$_SESSION['success'] = "Record updated successfully!";
header("Location: slot.php");
?>