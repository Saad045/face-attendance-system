<?php
include '../includes/config.php';

$email = $_GET['email'];
$code = $_GET['code'];

// First we check if the email and code exists...
if (isset($email, $code)) {
	$sql = "SELECT * FROM student WHERE email=$email AND activation_code=$code";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$newcode = 'activated';
		$sql = "UPDATE student SET activation_code='".$newcode."' WHERE email=$email AND activation_code=$code";
		$result = mysqli_query($conn, $sql);
        header("Location: ../../student/login.php?success=Your account is now activated! You can now login!");
	} else {
		header('Location: ../../student/login.php?error=The account is already activated or doesn\'t exist!');
	}
}
?>