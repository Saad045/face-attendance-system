<?php
include '../includes/connection.php';

$email = $_GET['email'];
$code = $_GET['code'];

// First we check if the email and code exists...
if (isset($email, $code)) {
	$sql = "SELECT * FROM student WHERE email='".$email."' " ." AND activation_code='".$code."' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$newcode = 'activated';
		$sql = "UPDATE student SET activation_code='".$newcode."'" . " WHERE email='".$email."'" ." AND activation_code='".$code."'";
		$result = mysqli_query($conn, $sql);
		echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          Your account is now activated! You can now <a href='login.php'>login</a>!
        </div>";
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert">&times;</button>
	      The account is already activated or doesn\'t exist!
	    </div>';
	}
}
?>