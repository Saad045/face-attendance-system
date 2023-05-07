<?php

$tt_id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM attendance WHERE id = {$tt_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/php/crud%20(attendence)/index.php");

mysqli_close($conn);

?>
