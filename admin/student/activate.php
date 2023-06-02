<?php
session_start();
include '../includes/config.php';

$email = $_GET['email'];
$code = $_GET['code'];

// First we check if the email and code exists...
if (isset($email, $code)) {
	$sql = "SELECT * FROM student WHERE email='".$email."' AND activation_code='".$code."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$newcode = 'activated';
		$sql = "UPDATE student SET activation_code='".$newcode."' WHERE email=$email AND activation_code=$code";
		$result = mysqli_query($conn, $sql);
		$_SESSION['success'] = "Your account is now activated! You can now login!";
        header("Location: ../../student/login.php");
	} else {
		$_SESSION['error'] = "The account is already activated or doesn\'t exist!";
		header('Location: ../../student/login.php');
	}
}
?>