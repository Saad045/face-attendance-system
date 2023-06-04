<?php
  // Extra Page!
  include '../includes/studentHeader.php';

  $success = $_SESSION['success'] ?? '';
  $error = $_SESSION['error'] ?? '';
  unset($_SESSION['success']);
  unset($_SESSION['error']);

  // We have to make logout button to use this feature!
  if(isset($_SESSION['loggedin'])){
    // header("Location: home.php");
  }

  if (isset($_POST['submit'])) {
    $reset_code = $_POST['reset_code'];
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
            <input type="text" class="form-control myborder px-3 py-1" name="reset_code" placeholder="6-digit code" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>