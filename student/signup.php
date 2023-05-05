<?php
  include '../includes/connection.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer-master/src/Exception.php';
  require '../PHPMailer-master/src/PHPMailer.php';
  require '../PHPMailer-master/src/SMTP.php';

  if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $roll_no = strtolower($_POST['roll_no']);
    $department = $_POST['department'];
    $degree = $_POST['degree'];
    $session = $_POST['session'];
    $cnic = $_POST['cnic'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $shift = $_POST['shift'];

  // Image
    $image = $_FILES['myFile'];
    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];
    $image_size = $image['size'];
    $explode_name = explode('.', $image_name);
    $image_ext = strtolower(end($explode_name));
    $image_extstored = array('png', 'jpg', 'jpeg', 'gif'); // Image

    // We need to check if the account with that roll_no exists.
    $sql = "SELECT id, password FROM student WHERE roll_no='".strtolower($roll_no)."' OR email='".$email."' ";  // We have to make sure that roll no and email does not duplicate. For login we have to use unique attribute. I'm unable to decide what should we use in current scenario. I have an idea that when a user register himself/herself, he will enter both roll no and email and we will alot him a unique username by combining/merging roll no & email along with password he/she entered during registration.
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Roll number exists, please choose another!
      </div>";
    } else {
      $pass = password_hash($password, PASSWORD_DEFAULT);
      $uniqid = uniqid();

      if (in_array($image_ext, $image_extstored)) {
        $image_dest = 'uploads/' . $image_name;
        move_uploaded_file($image_tmp, $image_dest);
      }

      $sql = "INSERT INTO student (id, name, roll_no, department, degree, session, cnic, phone, email, password, shift, picture, activation_code)
      VALUES (Null, '$fullname', '$roll_no', '$department', '$degree', '$session', '$cnic', '$phone_number', '$email', '$pass', '$shift', '$image_dest', '$uniqid')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'saadkhawaja045@gmail.com';
        $mail->Password = 'nhyuojivefnuikoy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //Recipients
        $mail->setfrom('saadkhawaja045@gmail.com', 'Khawaja Saad');
        $mail->addaddress($email);     // Add a recipient
        $mail->addreplyto('saadkhawaja045@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Account Activation Required' ;
        $activate_link = 'http://localhost/php/class_project/student/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
        $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
        $mail->Body    = $message ;
        $mail->send();

        echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          Please check your email to activate your account!
        </div>";
        // Redirect to page to enter code to activate account
        // header("Location: studentlogin.php");
      } else {
        // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
        // header("Location: studentlogin.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body style="background-color:rgba(0, 0, 0, 0.05);">
  <div class="container-fluid">
    <div class="">
      <div class="row m-5">
        <div class="col-md-12">
          <div class="card border-0 rounded-lg">
            <h5 class="card-header bg-white" style="border-bottom: 1px solid #eee;">Add Profile</h5>
            <div class="card-body">
              <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">
                <div class="row m-5">
                  <div class="col-md-4">
                    <div class="drop-zone m-auto">
                      <span class="drop-zone__prompt">Drop file here or click to upload</span>
                      <input accept="image/png, image/jpg, image/jpeg, image/gif" type="file" name="myFile" class="drop-zone__input" required>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" placeholder="FullName" name="fullname" required>
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" placeholder="Roll No" name="roll_no" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <select class="form-control" name="department" required>
                          <option value="">Department</option>
                          <option value="IT">IT</option>
                          <option value="BBA">BBA</option>
                          <option value="BBF">BBF</option>
                          <option value="Law">Law</option>
                          <option value="Commerce">Commerce</option>
                          <option value="English">English</option>
                        </select>
                      </div>
                      <div class="col-md-6 form-group">
                        <select class="form-control" name="degree" required>
                          <option value="">Degree</option>
                          <option value="BSCS">BSCS</option>
                          <option value="BSIT">BSIT</option>
                          <option value="BSSE">BSSE</option>
                          <option value="BBA Banking&Finance">BBA Banking&Finance</option>
                          <option value="Law">Law</option>
                          <option value="BS Acounting">BS Acounting</option>
                          <option value="English">English</option>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" placeholder="Session" name="session" required>
                      </div>

                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" placeholder="CNIC" name="cnic" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" placeholder="Mobile No" name="phone_number" required>
                      </div>

                      <div class="col-md-6 form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                      </div>

                      <div class="col-md-6 form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 form-group py-2">
                        <div class="form-check-inline">
                          <label class="form-check-label" for="morning">
                            <input type="radio" class="form-check-input" id="morning" name="shift" value="morning" checked>Morning
                          </label>
                        </div>

                        <div class="form-check-inline">
                          <label class="form-check-label" for="self-support">
                            <input type="radio" class="form-check-input" id="self-support" name="shift" value="self-support">Self-Supporting
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="float-right px-4 pb-4">
                  <button type="reset" class="btn btn-outline-dark btn-sm px-4">Reset</button>

                  <button type="submit" class="btn btn-primary btn-sm px-3 ml-2" name="register">Register</button>
                </div>
              </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
</body>
</html>