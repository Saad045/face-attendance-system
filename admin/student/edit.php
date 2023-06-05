<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

<body>
<div class="container-fluid">
<div class="course_wrapper">
    <div class="row">
    <?php include '../sideBar.php'; ?>

    <div class="col-md-10">

        <div class="row">
        <div class="col-md-6">
            <div class="px-4">
            <h3 class="font-weight-bold my-4  pb-2">
                <i class="fas fa-user-graduate  mr-1"></i>
                Student Profiles</h3>
            </div>
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
            <a href='student.php' class="font-weight-bold btn btn-sm ">
                <i class="fas fa fa-arrow-left  text-primary"></i> Back
            </a>

            <div class="department p-2">
                <h5 class="font-weight-bold dept-heading mb-3">UPDATE PROFILE</h5>
                <?php
                $std_id = $_GET['id'];
                $sql = "SELECT * FROM student WHERE id = {$std_id}";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <form action="updatedata.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <span>
                                <img src="../<?php echo $row['picture']; ?>" alt="profilePicture" name="picture" class="pb-3" style="width:100px;object-fit:cover;">
                            <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" class="form-control-file border" name="image" id="image"/>

                            </span>
                        </div>
                     </div>
                     
                    
                     <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                            <input type="text" name="student_name" placeholder="Student Name" class="form-control session" value="<?php echo $row['name']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $row['roll_no']; ?>" name="roll_no" placeholder="Roll No" class="form-control session" required/>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input value="<?php echo $row['session']; ?>" type="text" name="session" id="myInput" placeholder="Session" class="form-control session" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <input value="<?php echo $row['department']; ?>" name="department" placeholder="Department" class="form-control session" required/>
                                </div>
                            </div>
                        </div>
                     </div>
                    </div>
                    

                    <div class="form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $row['degree']; ?>" type="text" name="degree" placeholder="Degree" class="form-control session" required/>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <select name="shift" class="form-control session" required>
                                <option value="" selected disabled>Shift</option>
                                <option value="morning" <?php if ($row['shift'] == 'morning') {echo "selected";} ?>>Morning</option>
                                <option value="afternoon" <?php if ($row['shift'] == 'afternoon') {echo "selected";} ?>>Afternoon</option>
                            </select>
                        </div>
                     </div>
                    </div>

                   

                    <div class="form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <input value="<?php echo $row['email']; ?>" type="email" name="email" placeholder="Email" class="form-control session" required/>
                        </div>
                     </div>
                    </div>

                    <!-- <div class="form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <input value="<?php echo $row['password']; ?>" type="password" name="password" placeholder="Password" class="form-control session" required />
                        </div>
                     </div>
                    </div> -->

                    <div class="form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $row['cnic']; ?>" type="text" name="cnic" id="cnic" placeholder="CNIC" class="form-control session" required/>
                            <span id="cnicError" style="color: red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $row['phone']; ?>" type="text" name="phone" id="phone" placeholder="Phone" class="form-control session" required/>
                            <span id="phoneError" style="color: red;"></span>
                        </div>
                     </div>
                    </div>

                    <div class="form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" value="<?php echo $row['address']; ?>" id="address" name="address" class="form-control session" placeholder="Address" required/>
                        </div>
                     </div>
                    </div>

                    

                    <div class="clearfix">
                        <input class="btn btn-primary float-right px-4" type="submit" value="Update"/>
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
        var roll_noInput = document.getElementsByName("roll_no")[0];
        var departmentInput = document.getElementsByName("department")[0];
        var degreeInput = document.getElementsByName("degree")[0];

        // Add an event listener to the input field
        roll_noInput.addEventListener("input", function () {
            // Convert the input value to uppercase
            this.value = this.value.toUpperCase();
        });
        // Add an event listener to the input field
        departmentInput.addEventListener("input", function () {
            // Convert the input value to uppercase
            this.value = this.value.toUpperCase();
        });

        degreeInput.addEventListener("input", function () {
            // Convert the input value to uppercase
            this.value = this.value.toUpperCase();
        });
    </script>
    <script>
        const input = document.getElementById('myInput');

        input.addEventListener('input', function (e) {
            const value = e.target.value;
            const length = value.length;

            // Insert a hyphen after the fourth digit
            if (length === 4) {
                e.target.value = value.slice(0, 4) + '-' + value.slice(4);
            }
            // Block input after eight digits
            else if (length >= 9) {
                e.target.value = value.slice(0, 9);
            }
        });
    </script>
    <script>
        const cnicInput = document.getElementById('cnic');
        const error = document.getElementById('cnicError');
        cnicInput.addEventListener('input', function (c) {
            const value = c.target.value;
            const length = value.length;

            // Insert a hyphen after the fifth digit
            if (length === 5) {
                c.target.value = value.slice(0, 5) + '-' + value.slice(5);
            }
            // Insert a hyphen after the seventh digit
            else if (length === 13) {
                c.target.value = value.slice(0, 13) + '-' + value.slice(13);
            }
            // Restrict the input to one digit after the second hyphen
            else if (length >= 15) {
                c.target.value = value.slice(0, 15);
            }
            // Remove the hyphen if the user deletes a digit
            else if (length === 6 && value.indexOf('-') === 5) {
                c.target.value = value.slice(0, 5) + value.slice(6);
            }
            // Remove the hyphen if the user deletes a digit
            else if (length === 14 && value.indexOf('-', 13) === 13) {
                c.target.value = value.slice(0, 13) + value.slice(14);
            }
            // Validate the input and show an error message
            if (length > 0 && !/^\d{5}-\d{7}-\d{1}$/.test(value)) {
                error.textContent = 'CNIC is invalid';
            } else {
                error.textContent = '';
            }
        });

        // Prevent form submission if the CNIC is invalid
        document.querySelector('form').addEventListener('submit', function (c) {
            const value = cnicInput.value;
            if (value.length > 0 && !/^\d{5}-\d{7}-\d{1}$/.test(value)) {
                c.preventDefault();
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
</body>
</html>