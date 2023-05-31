<?php
  session_start();
  include 'includes/header.php';

  $error = $_SESSION['error'] ?? '';
  unset($_SESSION['error']);
?>

<body>
  <div class="container">
    <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $error; ?>
    </div>

    <?php
    if (!isset($_GET["token"]) && !isset($_GET["email"])) {
      $_SESSION['error'] = "The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the token!Hey:";
      header("Location: forgotpassword.php");
    } else {

      date_default_timezone_set("Asia/Karachi");
      $token = $_GET["token"];
      $email = $_GET["email"];
      $curDate = date("Y-m-d H:i:s");

      $query = mysqli_query($conn,
        "SELECT * FROM password_reset WHERE token='".$token."' and email='".$email."'");
      if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
      
        if ($expDate >= $curDate) {
    ?>
    <div class="login">
      <h2 class="font-weight-bold text-center py-2">Change Password</h2>
      <form action="savepassword.php" method="post">
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
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="token" value="<?php echo $token;?>">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <?php
        } else {
          $_SESSION['error'] = "The link is expired. You are trying to use the expired link which is valid within 24 hours (1 day after request)!";
          header("Location: forgotpassword.php");
        }

      } else {
        $_SESSION['error'] = "The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the token!";
        header("Location: forgotpassword.php");
      }

    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>