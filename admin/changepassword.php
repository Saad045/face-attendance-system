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

      $query = mysqli_query(
        $conn,
        "SELECT * FROM password_reset WHERE token='" . $token . "' and email='" . $email . "'"
      );
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
                  <div class="input-group">
                    <input type="password" class="form-control myborder px-3 py-1" name="password1" id="password1"
                      placeholder="New Password" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i id="eyeIcon" class="fa fa-eye-slash"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center pt-3">
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="password" class="form-control myborder px-3 py-1" name="password2" id="password2"
                      placeholder="Confirm Password" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center pt-3">
                <div class="col-md-4">
                  <input type="hidden" name="email" value="<?php echo $email; ?>">
                  <input type="hidden" name="token" value="<?php echo $token; ?>">
                  <button type="submit" class="btn btn-dark btn-lg form-control bgcolor py-0" name="submit">Submit</button>
                  |
                  <a href="http://localhost/face-attendance-system/teacher/forgotPassword.php" class="font-weight-bold font"
                    style="margin-left: 5px;">Back</a>
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
<script>
  const passwordInput = document.querySelector('input[name="password1"]');

  passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;

    // Check the length of the password
    if (password.length < 8) {
      passwordInput.setCustomValidity('Password must be at least 8 characters long');
    } else {
      passwordInput.setCustomValidity('');
    }

    // Check if the password contains at least one uppercase letter, one lowercase letter, and one number
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    if (!regex.test(password)) {
      passwordInput.setCustomValidity('Password must contain at least one uppercase letter, one lowercase letter, and one number');
    } else {
      passwordInput.setCustomValidity('');
    }
  });
</script>
<script>
  const togglePassword = document.getElementById('togglePassword');
  const password = document.getElementById('password1');
  const eyeIcon = document.getElementById('eyeIcon');

  togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    if (type === 'password') {
      eyeIcon.classList.add('fa-eye-slash');
      eyeIcon.classList.remove('fa-eye');
    } else {
      eyeIcon.classList.add('fa-eye');
      eyeIcon.classList.remove('fa-eye-slash');
    }
  });
</script>
<script>
  document.getElementById('togglePassword2').addEventListener('click', function () {
    var passwordInput = document.getElementById('password2');
    var eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  });
</script>