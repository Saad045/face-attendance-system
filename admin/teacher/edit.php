<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

<style>
    .course_wrapper a {
        color: rgb(0, 0, 0);
        text-decoration: none;
    }

    .course {
        background-color: #d9d9d9;
        border-radius: 10px;

    }

    .teacherName {
        font-weight: 500;
    }

    .course .span {
        font-weight: 500;
        line-height: 1.3;
    }

    .department-wrapper {
        padding-left: 2.5rem;
        padding-right: 1rem;
    }

    .dept-name {
        padding: 0px 1.5rem;
    }

    .dept-heading {
        font-size: 1.5rem;
    }

    .department {
        background-color: #d9d9d9;
        border-radius: 10px;
        min-height: 245.5px;
    }

    .session {
        font-weight: 500 !important;
        border: 1px solid black;
        border-radius: 5px;

        display: block;
        width: 100%;
        height: calc(1.5em + 0.7rem + 2px);
        padding: 3px 6px;
        line-height: 1;
        background-color: #fff;
        background-clip: padding-box;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .shift label {
        font-weight: 500;
        font-size: 18px;
    }
</style>

<body>
<div class="container-fluid">
<div class="course_wrapper">
    <div class="row">
    <?php include '../includes/sideBar.php'; ?>

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <h3 class="font-weight-bold my-4 px-4 pb-2">
                    <i class="fas fa-chalkboard-teacher  mr-1"></i>
                    Teachers Profiles
                </h3>
            </div>
        </div>

        <div class="row px-4">
        <div class="col-md-8 pb-4">

            <!-- Add this HTML code where you want to display the alert message -->
            <div class="alert alert-success alert-dismissible <?php echo !empty($success) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $success; ?>
            </div>
            <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $error; ?>
            </div>

            <div class="course p-3">
            <a href='teacher.php' class="font-weight-bold btn btn-sm "><i class="fas fa fa-arrow-left  text-primary"></i> Back</a>

            <div class="department p-2">
                <h5 class="font-weight-bold dept-heading mb-3">UPDATE PROFILE</h5>
                <?php
                $std_id = $_GET['id'];
                $sql = "SELECT * FROM teacher WHERE id = {$std_id}";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <form action="updatedata.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <span>
                                    <img src="../<?php echo $row['image']; ?>" alt="profilePicture" class="pb-3" style="width:100px;object-fit: cover;">
                                </span>
                                <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" class="form-control-file border " name="image" id="image"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                                <input type="text" name="teacher_name" placeholder="Teacher Name" class="form-control session" value="<?php echo $row['name']; ?>" required/>
                            </div>
                            <div class="form-group">
                                <input value="<?php echo $row['qualification']; ?>" type="text" name="qualification" placeholder="Qualification" class="form-control session" required/>
                            </div>
                            <div class="form-group">
                                <input value="<?php echo $row['email']; ?>" type="email" id="email-input" name="email" placeholder="Email" class="form-control session" required/>
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $row['cnic']; ?>" type="text" id="cnic" name="cnic" placeholder="CNIC" class="form-control session" required/>
                            <span id="cnicError" style="color: red;"></span>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $row['mobile_no']; ?>" type="text" id="phone" name="phone" placeholder="Phone" class="form-control session" required/>
                            <span id="phoneError" style="color: red;"></span>
                        </div>
                     </div>
                    </div>

                    

                    <!-- <div class="form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <input value="<?php //echo $row['password']; ?>" type="password"name="password" placeholder="Password"class="form-control session" required/>
                        </div>
                     </div>
                    </div> -->

                    <div class="form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <input value="<?php echo $row['address']; ?>" type="text" name="address"placeholder="Address" class="form-control session" required/>
                        </div>
                     </div>
                    </div>

                  
                    <div class="clearfix">
                        <input class="btn btn-primary float-right px-4" type="submit" value="Update" />
                    </div>
                </form>
                <?php
                    }
                }
                ?>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

    <script>
    // Get the input element
    var qualificationInput = document.getElementsByName("qualification")[0];

    qualificationInput.addEventListener("input", function () {
        // Convert the input value to uppercase
        this.value = this.value.toUpperCase();
    });
    </script>
    <script>
    const input = document.getElementById('cnic');
    const error = document.getElementById('cnicError');
    input.addEventListener('input', function (e) {
        const value = e.target.value;
        const length = value.length;

        // Insert a hyphen after the fifth digit
        if (length === 5) {
            e.target.value = value.slice(0, 5) + '-' + value.slice(5);
        }
        // Insert a hyphen after the seventh digit
        else if (length === 13) {
            e.target.value = value.slice(0, 13) + '-' + value.slice(13);
        }
        // Restrict the input to one digit after the second hyphen
        else if (length >= 15) {
            e.target.value = value.slice(0, 15);
        }
        // Remove the hyphen if the user deletes a digit
        else if (length === 6 && value.indexOf('-') === 5) {
            e.target.value = value.slice(0, 5) + value.slice(6);
        }
        // Remove the hyphen if the user deletes a digit
        else if (length === 14 && value.indexOf('-', 13) === 13) {
            e.target.value = value.slice(0, 13) + value.slice(14);
        }
        // Validate the input and show an error message
        if (length > 0 && !/^\d{5}-\d{7}-\d{1}$/.test(value)) {
            error.textContent = 'CNIC is invalid';
        } else {
            error.textContent = '';
        }
    });

    // Prevent form submission if the CNIC is invalid
    document.querySelector('form').addEventListener('submit', function (e) {
        const value = input.value;
        if (value.length > 0 && !/^\d{5}-\d{7}-\d{1}$/.test(value)) {
            e.preventDefault();
            error.textContent = 'CNIC is invalid';
        }
    });
    </script>
    <script>
    const phoneInput = document.getElementById('phone');
    const error1 = document.getElementById('phoneError');

    phoneInput.addEventListener('input', function (p) {
        const value = p.target.value;
        const length = value.length;

        // Insert a hyphen after the fourth digit
        if (length === 4) {
            p.target.value = value.slice(0, 4) + '-' + value.slice(4);
        }
        // Block input after eight digits
        else if (length >= 12) {
            p.target.value = value.slice(0, 12);
        }

        // Validate the input and show an error message
        if (length > 0 && !/^\d{4}-\d{7}$/.test(value)) {
            error1.textContent = 'Mobile Number is invalid';
        } else {
            error1.textContent = '';
        }
    });

    // Remove hyphen when a digit is deleted
    phoneInput.addEventListener('keydown', function (e) {
        const value = e.target.value;
        const length = value.length;
        const keyCode = e.keyCode || e.charCode;

        // Backspace or Delete key
        if (keyCode === 8 || keyCode === 46) {
            // Remove hyphen if it's the fifth character or the eleventh character
            if (length === 5 || length === 11) {
                e.target.value = value.slice(0, length - 1);
                e.preventDefault();
            }
        }
    });

    // Prevent form submission if the Phone # is invalid
    document.querySelector('form').addEventListener('submit', function (p) {
        const value = phoneInput.value;
        if (value.length > 0 && !/^\d{4}-\d{7}$/.test(value)) {
            p.preventDefault();
            error1.textContent = 'Mobile Number is invalid';
        }
    });
    </script>
    <script>
    const emailInput = document.getElementById('email-input');

    emailInput.addEventListener('input', function () {
        const email = emailInput.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Valid email address
            emailInput.setCustomValidity('');
        } else {
            // Invalid email address
            emailInput.setCustomValidity('Please enter a valid email address');
        }
    });
    </script>
    <script>
    const passwordInput = document.querySelector('input[name="password"]');

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
</body>

</html>