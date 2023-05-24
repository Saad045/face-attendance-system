<?php
    include 'config.php';
    $query = "SHOW TABLE STATUS LIKE 'teacher'";
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
    
    $s_name = $_POST['teacher_name'];
    $s_cnic = $_POST['cnic'];
    $s_phone = $_POST['phone'];
    $s_qualification = $_POST['qualification'];
    $s_email = $_POST['email'];
    $s_password = $_POST['password'];
    $s_address = $_POST['address'];

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
$sql_check = "SELECT * FROM teacher WHERE cnic ='$s_cnic' AND mobile_no = '$s_phone' AND email = '$s_email' ";
$result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");
$sql_check4 = "SELECT * FROM teacher WHERE cnic ='$s_cnic' ";
$result_check4 = mysqli_query($conn, $sql_check4) or die("Query Unsuccessful.");
$sql_check2 = "SELECT mobile_no FROM teacher WHERE mobile_no = '$s_phone'";
$result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
$sql_check3 = "SELECT email FROM teacher WHERE email = '$s_email'";
$result_check3 = mysqli_query($conn, $sql_check3) or die("Query Unsuccessful.");
if (mysqli_num_rows($result_check) > 0) {
    // If data already exists, show error message and exit script
    echo "This CNIC already exists.";
    exit();
}
elseif (mysqli_num_rows($result_check4) > 0) {
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

    $sql = "INSERT INTO teacher(name,cnic,mobile_no,qualification,email,password,address,image) VALUES ('{$s_name}','{$s_cnic}','{$s_phone}','{$s_qualification}','{$s_email}','{$s_password}','{$s_address}','{$folder}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: teacher.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>

