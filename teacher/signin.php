<?php
  include '../includes/connection.php';

  if (isset($_POST['login'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM teacher WHERE email='".$email."' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      header("Location: class1.php?id=$id");
    } else {
      echo "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        User does not exist!
      </div>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Login</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container">
    <div class="login">
      <h2 class="font-weight-bold text-center py-2">Teacher</h2>
      <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row justify-content-center pt-2">
          <div class="col-md-4">
            <input type="email" class="form-control myborder px-3 py-1" name="email" placeholder="Email" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <input type="password" class="form-control myborder px-3 py-1" name="password" placeholder="Password" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="login">Login</button>
          </div>
        </div>
      </form>

      <div class="text-center px-4 pt-3">
        <a href="#" class="font-weight-bold font">Forgot Password ?</a>
      </div>
      <div class="text-center font-weight-bold text-muted font px-4">
        No Account? 
        <a href="signup.php">Create One</a>
      </div>
    </div>
  </div>

</body>
</html>