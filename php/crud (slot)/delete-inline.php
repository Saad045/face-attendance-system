<?php
include 'config.php';

$s_id = $_GET['id'];
$sql = "DELETE FROM slot WHERE id = {$s_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(slot)/");
// mysqli_close($conn);

?>
