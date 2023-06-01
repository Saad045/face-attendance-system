<?php
  include '../includes/studentHeader.php';
  date_default_timezone_set("Asia/Karachi");

  $success = $_SESSION['success'] ?? '';
  $error = $_SESSION['error'] ?? '';
  unset($_SESSION['success']);
  unset($_SESSION['error']);

  // We have to make logout button to use this feature!
  if(isset($_SESSION['loggedin'])){
    // header("Location: home.php");
  }

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer-master/src/Exception.php';
  require '../PHPMailer-master/src/PHPMailer.php';
  require '../PHPMailer-master/src/SMTP.php';

  if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);  //Formality!
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);  //Formality!

    $sql = "SELECT * FROM student WHERE email='".$email."'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
      );
      $expDate = date("Y-m-d H:i:s",$expFormat);
      // $token = rand(100000, 999999); //For 6-digit code
      $token = uniqid();

      // Insert Temp Table
      $sql = mysqli_query($conn, "INSERT INTO password_reset (id, email, token, expDate)
      VALUES (Null, '".$email."', '".$token."', '".$expDate."')");

      $output='<p>Dear user,</p>';  // Display user name from database!
      $output.='<p>Please click on the following link to reset your password.</p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output.='<p><a href="http://localhost/face-attendance-system/student/changePassword.php?token='.$token.'&email='.$email.'">
      http://localhost/face-attendance-system/student/changePassword.php?token='.$token.'&email='.$email.'</a></p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output.='<p>Please be sure to copy the entire link into your browser.
      The link will expire after 1 day for security reason.</p>';
      $output.='<p>If you did not request this forgotten password email, no action 
      is needed, your password will not be reset. However, you may want to log into 
      your account and change your security password as someone may have guessed it.</p>';    
      $output.='<p>Regards</p>';
      $output.='<p>BAUS Team</p>';
      $body = $output;
      $email_to = $email;

      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = "saadkhawaja045@gmail.com";
      $mail->Password = "nhyuojivefnuikoy";
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setfrom('saadkhawaja045@gmail.com', 'Khawaja Saad');
      $mail->addaddress($email_to);    // Add a recipient
      $mail->addreplyto('saadkhawaja045@gmail.com');
      $mail->IsHTML(true);
      $mail->Subject = 'Password Recovery';
      $mail->Body = $body ;

      if($mail->send()){
        $_SESSION['success'] = "Check your email. Some information regarding the reset password has been sent!";
        header("Location: forgotPassword.php");
      } else {
        $_SESSION['error'] = "Mailer Error: " . $mail->ErrorInfo;
        header("Location: forgotPassword.php");
      }

    } else {
      $_SESSION['error'] = "User does not exist!";
      header("Location: forgotPassword.php");
    }
  }
?>


<body>
  
  <div class="container">
    <div class="alert alert-success alert-dismissible <?php echo !empty($success) ? 'd-block' : 'd-none'; ?>">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $success; ?>
    </div>
    <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $error; ?>
    </div>

    <div class="login">
      <h2 class="font-weight-bold text-center py-2">Reset Password</h2>
      <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row justify-content-center pt-2">
          <div class="col-md-4">
            <input type="email" class="form-control myborder px-3 py-1" name="email" placeholder="Email" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="submit">Next</button>
          </div>
        </div>
      </form>

      
      <div class="text-center font-weight-bold text-muted font pt-2 px-4">
        Have Already? 
        <a href="login.php">Login</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>