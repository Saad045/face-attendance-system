<?php
  include '../includes/connection.php';

  $token = $_GET["token"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");

  $query = mysqli_query($conn,
  "SELECT * FROM password_reset WHERE token='".$token."' and email='".$email."'");
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $expDate = $row['expDate'];
  }

  if (!isset($_GET["token"]) && !isset($_GET["email"])) {
    echo "<div class='alert alert-danger alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the token.
      <p><a href='http://localhost/php/class_project/student/forgotPassword.php'>Click here</a> to reset password.</p>
    </div>";
  }

  if (isset($_POST["email"]) && isset($_POST['submit'])) {
    $pass1 = mysqli_real_escape_string($conn,$_POST["password1"]);
    $pass2 = mysqli_real_escape_string($conn,$_POST["password2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");

    if ($pass1!=$pass2) {
      echo "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Both password must be same.
      </div>";
    } else {
      $pass = password_hash($pass1, PASSWORD_DEFAULT);
      mysqli_query($conn,
        "UPDATE student SET password='".$pass."' WHERE email='".$email."';"
      );
      mysqli_query($conn,"DELETE FROM password_reset WHERE email='".$email."';");

      echo "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Your password has been updated successfully.
      </div>";
      header("Location: studentlogin.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Login</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container">
    <?php if ($expDate >= $curDate) { ?>
    <div class="login">
      <h2 class="font-weight-bold text-center py-2">Change Password</h2>
      <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <input type="password" class="form-control myborder px-3 py-1" name="password1" placeholder="New Password" required>
          </div>
        </div>
        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <input type="password" class="form-control myborder px-3 py-1" name="password2" placeholder="Confirm Password" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <!-- <a href="Login/StudentLogin/studentlogin.php">submit</a> -->
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="submit">Submit</button>
          </div>
        </div>
      </form>

      
      <!-- <div class="text-center font-weight-bold text-muted font pt-2 px-4">
        Have Already? 
        <a href="studentlogin.php" class="">Login</a>
      </div>
      <div class="text-center font-weight-bold text-muted font px-4">
        No Account? 
        <a href="studentsignup.php" class="">Create One</a>
      </div> -->
    </div>
    <?php
      } else {
        echo "<div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          The link is expired. You are trying to use the expired link which is valid within 24 hours (1 day after request).
        </div>";
      }
    ?>
  </div>

</body>
</html>