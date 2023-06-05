<?php
session_start();
include '../includes/studentHeader.php';

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success']);
unset($_SESSION['error']);

if (isset($_SESSION['id'])) {
  $student_id = $_SESSION['id'];
}

// We have to make logout button to use this feature!
  if(isset($_SESSION['student_login'])){
    header("Location: timetable.php?student_id=$student_id");
  }
  

if (isset($_POST['login'])) {
  $email = $_POST['email'];

  //Also we can use *Roll-No* for login
  $sql = "SELECT id, password FROM student WHERE email='" . $email . "' ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $password = $row['password'];

    if (password_verify($_POST['password'], $password)) {
      session_regenerate_id();
      $_SESSION['student_login'] = TRUE;
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['id'] = $id;

      header("Location: timetable.php?student_id=$id");
    } else {
      $_SESSION['error'] = "Incorrect email and/or password!";
      header("Location: login.php");
    }

  } else {
    $_SESSION['error'] = "User does not exist!";
    header("Location: login.php");
  }
}
?>

<style>
  .password-container {
    position: relative;
  }

  .password-toggle {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }

  .password-toggle i {
    font-size: 18px;
  }
</style>

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
      <h2 class="font-weight-bold text-center py-2">Student</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row justify-content-center pt-2">
          <div class="col-md-4">
            <input type="email" class="form-control myborder px-3 py-1" name="email" placeholder="Email" required>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <div class="password-container">
              <input type="password" class="form-control myborder px-3 py-1" name="password" id="password-input"
                placeholder="Password" required>
              <span class="password-toggle" onclick="togglePasswordVisibility()"><i class="far fa-eye"></i></span>
            </div>
          </div>
        </div>


        <div class="row justify-content-center pt-3">
          <div class="col-md-4">
            <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="login">Login</button>
          </div>
        </div>
      </form>

      <div class="text-center px-4 pt-3">
        <a href="forgotPassword.php" class="font-weight-bold font">Forgot Password ?</a>|
        <a href="http://localhost/face-attendance-system/" class="font-weight-bold font"
          style="margin-left: 5px;">Back</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password-input");
    var passwordToggle = document.querySelector(".password-toggle");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
      passwordInput.type = "password";
      passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
    }
  }
  </script>
</body>
</html>
