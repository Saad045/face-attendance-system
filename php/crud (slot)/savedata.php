<?php
    include 'config.php';
    
    $s_no = $_POST['slot_no'];
    $s_time = $_POST['slot_time'];
    $shift = $_POST['shift'];
 
// $conn = mysqli_connect("localhost","root","","attendance_system") or die("Connection Failed");

    $sql = "INSERT INTO slot (id,slot_no,slot_time,shift) VALUES (Null,'{$s_no}','{$s_time}','{$shift}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

// header("Location: http://localhost/php/crud%20(slot)/");
// mysqli_close($conn);

?>
