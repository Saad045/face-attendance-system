<?php
include 'config.php';

$ms_id = $_GET['id'];
$sql = "DELETE FROM mark_sheet WHERE id = {$ms_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: index.php");
?>
