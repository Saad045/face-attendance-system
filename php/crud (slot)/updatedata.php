<?php
include 'config.php';

$s_id = $_POST['id'];
$s_no = $_POST['slot_no'];
$s_time = $_POST['slot_time'];
$shift = $_POST['shift'];

$sql = "UPDATE slot SET slot_no = '{$s_no}', slot_time = '{$s_time}',shift = '{$shift}' WHERE id = {$s_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(slot)/");
// mysqli_close($conn);

?>
