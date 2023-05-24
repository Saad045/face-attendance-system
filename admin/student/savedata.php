<?php
    include 'config.php';
    $query = "SHOW TABLE STATUS LIKE 'student'";
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
    
    $s_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $s_department = $_POST['department'];
    $s_degree = $_POST['degree'];
    $s_session = $_POST['session'];
    $s_cnic = $_POST['cnic'];
    $s_phone = $_POST['phone'];
    $s_email = $_POST['email'];
    $s_password = $_POST['password'];
    $s_shift = $_POST['shift'];

    $image = $_FILES['image'];
    $filename = $_FILES["image"]["name"];
    $_tempname = $_FILES["image"]["tmp_name"];

    // $folder = "*uploading....";
    $folder = "images/" .$studentId.".jpg";
    move_uploaded_file($_tempname,$folder); 
    // echo "<pre>";
    // print_r($folder);
    // echo "<br>";
    // print_r($filename);
    // echo "<br>";
    // <!-- print_r($studentId);
    // die(); -->
    
    // Display the uploaded image
    // if(isset($folder)) {
    //     echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
    // }
 
// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");
    // Check if the same data already exists
$sql_check = "SELECT * FROM student WHERE roll_no = '$roll_no' AND cnic ='$s_cnic' AND phone = '$s_phone' AND email = '$s_email' ";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");
$sql_check0 = "SELECT roll_no FROM student WHERE roll_no ='$roll_no'";
$result_check0 = mysqli_query($conn, $sql_check0) or die("Query Unsuccessful.");
$sql_check1 = "SELECT cnic FROM student WHERE cnic ='$s_cnic'";
$result_check1 = mysqli_query($conn, $sql_check1) or die("Query Unsuccessful.");
$sql_check2 = "SELECT phone FROM student WHERE phone = '$s_phone'";
$result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
$sql_check3 = "SELECT email FROM student WHERE email = '$s_email'";
$result_check3 = mysqli_query($conn, $sql_check3) or die("Query Unsuccessful.");
if (mysqli_num_rows($result_check) > 0) {
    // If data already exists, show error message and exit script
    echo "This Roll_no already exists.";
    exit();
}
if (mysqli_num_rows($result_check0) > 0) {
    // If data already exists, show error message and exit script
    echo "This Roll_no already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check1) > 0) {
    // If data already exists, show error message and exit script
    echo "This CNIC already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check2) > 0) {
    // If data already exists, show error message and exit script
    echo "This Phone Number already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check3) > 0) {
    // If data already exists, show error message and exit script
    echo "This email already exists.";
    exit();
}

    $sql = "INSERT INTO student(name,roll_no,department,degree,session,cnic,phone,email,password,shift,picture) VALUES ('{$s_name}','{$roll_no}','{$s_department}','{$s_degree}','{$s_session}','{$s_cnic}','{$s_phone}','{$s_email}','{$s_password}','{$s_shift}','{$folder}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: student.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>

