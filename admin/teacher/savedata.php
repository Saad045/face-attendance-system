<?php
session_start();
include '../includes/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

// Bilal's work
$query = "SHOW TABLE STATUS LIKE 'teacher'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $studentId = $row['Auto_increment'];
} else {
    echo "Error executing query: " . mysqli_error($conn);
} // Bilal's work

$s_name = $_POST['teacher_name'];
$s_cnic = $_POST['cnic'];
$s_phone = $_POST['phone'];
$s_qualification = $_POST['qualification'];
$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_address = $_POST['address'];

$image = $_FILES['image'];
$image_name = $image["name"];
$tempname = $image["tmp_name"];
$image_size = $image['size'];
$explode_name = explode('.', $image_name);
$image_ext = strtolower(end($explode_name));
$image_extstored = array('png', 'jpg', 'jpeg', 'gif');
$allowedFileSize = 5 * 1024 * 1024; // 5MB

$sqlforuniquerecord = "SELECT * FROM teacher WHERE cnic='" . $s_cnic . "' OR email='" . $s_email . "' OR mobile_no='" . $s_phone . "' ";
$resultforuniquerecord = mysqli_query($conn, $sqlforuniquerecord) or die("Query Unsuccessful.");
if (mysqli_num_rows($resultforuniquerecord) > 0) {
    $_SESSION['error'] = "Either Email, CNIC or Phone Number exists already!";
    header("Location: teacher.php");
} else {
    $pass = password_hash($s_password, PASSWORD_DEFAULT);
    $uniqid = uniqid();

    if (in_array($image_ext, $image_extstored)) {
        if ($image_size > $allowedFileSize) {
            $_SESSION['error'] = "File size exceeds the limit of " . ($allowedFileSize / (1024 * 1024)) . "MB";
            header("Location: teacher.php");
        } else {
            $image_dest = 'uploads/teacher/' . $s_name . "." . $image_ext;
            move_uploaded_file($tempname, "../" . $image_dest);

            $sql = "INSERT INTO teacher (id,name,cnic,mobile_no,qualification,email,password,address,image, activation_code)
            VALUES (Null,'{$s_name}','{$s_cnic}','{$s_phone}','{$s_qualification}','{$s_email}','{$pass}','{$s_address}','{$image_dest}','{$uniqid}')";
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
            $activate_link = "http://localhost/face-attendance-system/admin/teacher/activate.php?email='" . $s_email . "'&code='" . $uniqid . "'";
            $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            $mail->Body = $message;
            $mail->send();
            $_SESSION['success'] = "Confirmation email has been sent to the teacher!";
            header("Location: teacher.php");
        }
    }
}



// Check if a file was uploaded
// if (!empty($filename)) {
//     // Get the file extension
//     $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//     // Check if the file extension is allowed
//     if (!in_array($fileExtension, $allowedExtensions)) {
//         // Invalid file extension
//         session_start();
//         $_SESSION['alertMessage'] = "Invalid image file format. Allowed formats: " . implode(', ', $allowedExtensions);
//         header("Location: teacher.php");
//         exit();
//     }

//     // Check if the file size is within the allowed limit
//     if ($_FILES["image"]["size"] > $allowedFileSize) {
//         // File size exceeds the limit
//         session_start();
//         $_SESSION['alertMessage'] = "File size exceeds the limit of " . ($allowedFileSize / (1024 * 1024)) . "MB";
//         header("Location: teacher.php");
//         exit();
//     }

//     // Move the uploaded file to the desired location
//     $folder = "images/" . $studentId . ".jpg";
//     move_uploaded_file($_tempname, $folder);
// }

// // Check if the same data already exists
// $sql_check4 = "SELECT * FROM teacher WHERE cnic ='$s_cnic' ";
// $result_check4 = mysqli_query($conn, $sql_check4) or die("Query Unsuccessful.");
// $sql_check2 = "SELECT mobile_no FROM teacher WHERE mobile_no = '$s_phone'";
// $result_check2 = mysqli_query($conn, $sql_check2) or die("Query Unsuccessful.");
// $sql_check3 = "SELECT email FROM teacher WHERE email = '$s_email'";
// $result_check3 = mysqli_query($conn, $sql_check3) or die("Query Unsuccessful.");
// if (mysqli_num_rows($result_check) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This CNIC already exists.";
//     header("Location: teacher.php");
//     exit();
// } elseif (mysqli_num_rows($result_check4) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This CNIC already exists.";
//     header("Location: teacher.php");
//     exit();
// } elseif (mysqli_num_rows($result_check2) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Phone Number already exists.";
//     header("Location: teacher.php");
//     exit();
// } elseif (mysqli_num_rows($result_check3) > 0) {
//     session_start();
//     $_SESSION['alertMessage'] = "This Email already exists.";
//     header("Location: teacher.php");
//     exit();
// }


// $sql = "INSERT INTO teacher(name,cnic,mobile_no,qualification,email,password,address,image) VALUES ('{$s_name}','{$s_cnic}','{$s_phone}','{$s_qualification}','{$s_email}','{$s_password}','{$s_address}','{$folder}')";
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
// header("Location: teacher.php");
?>