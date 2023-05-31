<?php
	session_start();
	include '../includes/connection.php';
	date_default_timezone_set("Asia/Karachi");

	$pass1 = mysqli_real_escape_string($conn,$_POST["password1"]);
	$pass2 = mysqli_real_escape_string($conn,$_POST["password2"]);
	$email = $_POST["email"];
	$token = $_POST["token"];

	if ($pass1!=$pass2) {
		$_SESSION['error'] = "Both passwords must be same!";
		header("Location: changePassword.php?token=$token&email=$email");
	} else {

		$pass = password_hash($pass1, PASSWORD_DEFAULT);
		mysqli_query($conn,
			"UPDATE student SET password='".$pass."' WHERE email='".$email."';"
		);
		mysqli_query($conn,"DELETE FROM password_reset WHERE email='".$email."';");
		$_SESSION['success'] = "Your password has been updated successfully!";
		header("Location: login.php");

	}
?>



// if (isset($_POST["email"]) && isset($_POST['submit'])) {
  //   $pass1 = mysqli_real_escape_string($conn,$_POST["password1"]);
  //   $pass2 = mysqli_real_escape_string($conn,$_POST["password2"]);
  //   $email = $_POST["email"];

  //   if ($pass1!=$pass2) {
  //     $_SESSION['error'] = "Both passwords must be same!";
  //     header("Location: changePassword.php");
  //   } else {

  //     $pass = password_hash($pass1, PASSWORD_DEFAULT);
  //     mysqli_query($conn,
  //       "UPDATE student SET password='".$pass."' WHERE email='".$email."';"
  //     );
  //     mysqli_query($conn,"DELETE FROM password_reset WHERE email='".$email."';");
  //     $_SESSION['success'] = "Your password has been updated successfully!";
  //     header("Location: login.php");

  //   }
  // }