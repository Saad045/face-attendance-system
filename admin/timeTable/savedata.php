<?php
    include 'config.php';
    $query = "SHOW TABLE STATUS LIKE 'time_table'";
    $result = mysqli_query($conn, $query);
    
    // Check if the query was executed successfully
    if ($result) {
        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);
    
        // Get the current maximum ID value
        $studentId = $row['Auto_increment'];
    
        // // Calculate the next ID
        // $nextId = $currentId + 1;
    
        // // Display or use the next ID
        // echo "The next ID will be: " . $nextId; 
        // echo "<br>";
        // echo "The cureent ID : " . $currentId;
    } else {
        // Handle the case when the query fails
        echo "Error executing query: " . mysqli_error($conn);
    }
   

    // $studentId = mysqli_insert_id($conn);
    
    $tt_course = $_POST['course'];
    $tt_slot = $_POST['slot'];
    $tt_day = $_POST['day'];
    $tt_teacher = $_POST['teacher'];

    // Query to check if the record already exists
$checkQuery = "SELECT * FROM time_table WHERE course_id = '{$tt_course}' AND slot_id = '{$tt_slot}' AND day = '{$tt_day}' AND teacher_id = '{$tt_teacher}'";
$checkResult = mysqli_query($conn, $checkQuery);

// If a row is found, display an error message and stop the script
if (mysqli_num_rows($checkResult) > 0) {
    echo "Error: This record already exists in the database.";
    exit();
}
   
   
    $sql = "INSERT INTO time_table(course_id,slot_id,day,teacher_id) VALUES ('{$tt_course}','{$tt_slot}','{$tt_day}','{$tt_teacher}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: timeTable.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>
