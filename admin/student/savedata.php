<?php
session_start();
include '../includes/config.php';
require "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';


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

$s_name = $_POST['student_name'];
$roll_no = $_POST['roll_no'];
$s_session = $_POST['session'];
$s_shift = $_POST['shift'];
$s_department = $_POST['department'];
$s_degree = $_POST['degree'];
$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_cnic = $_POST['cnic'];
$s_phone = $_POST['phone'];
$s_address = $_POST['address'];

$image = $_FILES['image'];
$image_name = $image["name"];
$tempname = $image["tmp_name"];
$image_size = $image['size'];
$explode_name = explode('.', $image_name);
$image_ext = strtolower(end($explode_name));
$image_extstored = array('png', 'jpg', 'jpeg', 'gif');

$sqlforuniquerecord = "SELECT * FROM student WHERE roll_no='" . $roll_no . "' OR email='" . $s_email . "' OR cnic='" . $s_cnic . "'";
$resultforuniquerecord = mysqli_query($conn, $sqlforuniquerecord);
if (mysqli_num_rows($resultforuniquerecord) > 0) {
    $_SESSION['error'] = "Either Roll No, Email or CNIC exists already!";
    header('Location: student.php');
} else {
    $pass = password_hash($s_password, PASSWORD_DEFAULT);
    $uniqid = uniqid();

    if (in_array($image_ext, $image_extstored)) {
        $image_dest = 'uploads/student/' . $roll_no . "." . $image_ext;
        move_uploaded_file($tempname, "../" . $image_dest);
        $sql = "INSERT INTO student(id, name, roll_no, department, degree, session, cnic, phone ,email, password, shift, address, picture, activation_code)
        VALUES (Null,'{$s_name}','{$roll_no}','{$s_department}','{$s_degree}','{$s_session}','{$s_cnic}','{$s_phone}','{$s_email}','{$pass}','{$s_shift}','{$s_address}','{$image_dest}','{$uniqid}')";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'saadkhawaja045@gmail.com';
        // $mail->Password = 'nhyuojivefnuikoy'; ApexLogistics
        $mail->Password = 'yaqpxefgykbrjage'; //FaceAttendanceSystem
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //Recipients
        $mail->setfrom('saadkhawaja045@gmail.com', 'Khawaja Saad');

        $mail->addaddress($s_email); // Add a recipient
        $mail->isHTML(true);
        $mail->Subject = 'Account Activation Required';
        $activate_link = 'http://localhost/face-attendance-system/admin/student/activate.php?email=' . $s_email . '&code=' . $uniqid;
        $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
        $mail->Body = $message;
        $mail->send();
        $_SESSION['success'] = "Email has been sent to the student!";
        header('Location: student.php');
    }
}



// // Validate the image file
// $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Add more if needed
// $allowedFileSize = 5 * 1024 * 1024; // 5MB

// // Check if a file was uploaded
// if (!empty($filename)) {
//     // Get the file extension
//     $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//     // Check if the file extension is allowed
//     if (!in_array($fileExtension, $allowedExtensions)) {
//         // Invalid file extension
//         session_start();
//         $_SESSION['alertMessage'] = "Invalid image file format. Allowed formats: " . implode(', ', $allowedExtensions);
//         header("Location: student.php");
//         exit();
//     }

//     // Check if the file size is within the allowed limit
//     if ($_FILES["image"]["size"] > $allowedFileSize) {
//         // File size exceeds the limit
//         session_start();
//         $_SESSION['alertMessage'] = "File size exceeds the limit of " . ($allowedFileSize / (1024 * 1024)) . "MB";
//         header("Location: student.php");
//         exit();
//     }

//     // Move the uploaded file to the desired location
//     $folder = "images/" . $studentId . ".jpg";
//     move_uploaded_file($_tempname, $folder);
// }

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
// ----------------------------------------- Start---QRCODE--------------------
$qr_code = QrCode::create($studentId)
    ->setSize(200)
    ->setMargin(20);

$label = Label::create($roll_no);

$logo = Logo::create("../assets/images/pu_qrcode.png")
    ->setResizeToWidth(50);

$writer = new PngWriter;

$result = $writer->write($qr_code, logo: $logo, label: $label);

// Output the QR code image to the browser
// ------------
// header("Content-Type: " . $result->getMimeType());
// echo $result->getString();
// ------------

// Save the image to a file
$qr_folder = "qrcode/" . $studentId . ".png";
$result->saveToFile($qr_folder);

// --------------------------------------------END QRCODE--------------------

// Check if the same data already exists
// $sql_check = "SELECT * FROM student WHERE roll_no = '$roll_no' AND cnic ='$s_cnic' AND phone = '$s_phone' AND email = '$s_email' ";
// $result_check = mysqli_query($conn, $sql_check) or die("Query Unsuccessful.");
// $sql_check0 = "SELECT roll_no FROM student WHERE roll_no ='$roll_no'";
// $result_check0 = mysqli_query($conn, $sql_check0) or die("Query Unsuccessful.");
// $sql_check1 = "SELECT cnic FROM student WHERE cnic ='$s_cnic'";
// $result_check1 = mysqli_query($conn, $sql_check1) or die("Query Unsuccessful.");
// $sql_check2 = "SELECT phone FROM student WHERE phone = '$s_phone'";
// $result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
// $sql_check3 = "SELECT email FROM student WHERE email = '$s_email'";
// $result_check3 = mysqli_query($conn, $sql_check3) or die("Query Unsuccessful.");
// if (mysqli_num_rows($result_check) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Roll Number already exists.";
//     header("Location: student.php");
//     exit();
// }
// if (mysqli_num_rows($result_check0) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Roll Number already exists.";
//     header("Location: student.php");
//     exit();
// } elseif (mysqli_num_rows($result_check1) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This CNIC already exists.";
//     header("Location: student.php");
//     exit();
// } elseif (mysqli_num_rows($result_check2) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Phone Number already exists.";
//     header("Location: student.php");
//     exit();
// } elseif (mysqli_num_rows($result_check3) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Email already exists.";
//     header("Location: student.php");
//     exit();
// }


// $sql = "INSERT INTO student(name,roll_no,department,degree,session,cnic,phone,email,password,shift,address,picture) VALUES ('{$s_name}','{$roll_no}','{$s_department}','{$s_degree}','{$s_session}','{$s_cnic}','{$s_phone}','{$s_email}','{$s_password}','{$s_shift}','{$s_address}','{$folder}')";
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
// header("Location: student.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>