<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../header_files.php';?>

<body>
    <div class="container-fluid">
        <div class="course_wrapper">
            <div class="row">
                <?php include '../sideBar.php';?>

                <div class="col-md-10">
                    <!-- Add this HTML code where you want to display the alert message -->
                    <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
                        <?php echo $alertMessage; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4">
                                <h3 class="font-weight-bold my-4 pb-2">
                                 Profiles
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 ">


                        <div class="col-md-7 pb-2 ">
                            <div class="course list p-3">
                                                    <?php
                                    $sql = "SELECT * FROM student";
                                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                    if(mysqli_num_rows($result) > 0)  {
                                    ?>
                                        <table class="table table-borderless ">
                                            <thead>
                                                <tr class="my-border">
                                                    
                                                    
                                                    <th class="text-start pl-3">Profile</th>
                                                    
                                                    <th class="text-start">Info</th>

                                                    <th class="text-start">Contact</th>
                                                    <!-- <th class="text-center">Roll No</th> -->
                                                    <!-- <th class="text-center">Department</th>
                                                    <th class="text-center">Degree</th>
                                                    <th class="text-center">Session</th> -->
                                                </tr>
                                            </thead>

                                            <tbody >
                                            <?php
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                                <tr>
                                                    <td colspan="15" class="pt-1 "></td>
                                                </tr>
                                                <tr class="row-color">
                                                    

                                                    <td class="round-left">
                                                        <span class="badge  badge-primary sticky-top"><?php echo $row['id']; ?></span><br>
                                                        <img src="<?php echo $row['picture']; ?>" alt="img..." style="" class="profile_pic mt-n4  ">
                                                        
                                                    </td>
                                                    <td>
                                                        <span class="text-capitalize font-weight-bold">
                                                        <?php echo $row['name']; ?>
                                                        </span>
                                                        <br>
                                                        <span class="text-capitalize font-weight-bold">
                                                        <?php echo $row['roll_no']; ?><br>
                                                        </span>
                                                        <span class="badge badge-primary" data-toggle="tooltip" data-html="true" title="Department"><?php echo $row['department']; ?></span>
                                                        <span class="badge badge-success" data-toggle="tooltip" data-html="true" title="Degree Enrolled"><?php echo $row['degree']; ?></span>
                                                        <span class="badge badge-info" data-toggle="tooltip" data-html="true" title="Shift"><?php echo $row['shift']; ?></span>
                                                        <span class="badge badge-dark" data-toggle="tooltip" data-html="true" title="Session"><?php echo $row['session']; ?></span>
                                                        
                                                        
                                                         
                                                       

                                                        
                                                    </td>
                                                    

                                                    <td>
                                                    <a href="mailto:<?php echo $row['email']; ?>" data-toggle="tooltip" data-html="true" title="Send mail to <?php echo $row['email']; ?>">
                                                            <span class="d-inline-block text-truncate "  style="max-width: 150px;">
                                                                <?php echo $row['email']; ?>
                                                            </span>
                                                    </a>
                                                    <br>
                                                    
                                                    <a href="tel:<?php echo $row['phone']; ?>" data-toggle="tooltip" data-html="true" title="Make Call <?php echo $row['phone']; ?>">
                                                            
                                                        <?php echo $row['phone']; ?>
                                                           
                                                    </a>
                                                    <br>
                                                    
                                                    
                                                    <?php echo $row['cnic']; ?><br>
                                                    </td>
                                                    

                                                    
                                                    <td class="text-center round-right">
                                                        <a href='edit.php?id=<?php echo $row['id']; ?>'><i
                                                                class="fas fa-edit text-primary"></i></a>
                                                                <br>
                                                        <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()"><i
                                                                class="fas fa-trash text-danger"></i></a>
                                                                    <script>
                                                                    function checkdelete()
                                                                    {
                                                                        return confirm('Are you sure you want to delete this record ?It will delete record of that student from other tables as well !');
                                                                    }
                                                                    </script>
                                                    </td>
                                                </tr>



                                                <?php } ?>
                                                </tbody>
                                        </table>
                                                    <?php }else{
                                            echo "<h2>No Record Found</h2>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                            </div>
                        </div>
     
                        <div class="col-md-5 pb-2 ">
                            <div class="course p-3">
                                <div class="px-0">
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            ADD PROFILE
                                        </h5>
                                        <form action="savedata.php" method="post" enctype="multipart/form-data">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <input placeholder="Student Name" type="text" name="student_name"
                                                            class="form-control session" required/>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <input placeholder="Roll No" type="text" name="roll_no"
                                                                class="form-control session"required />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input placeholder="Department" type="text" name="department"
                                                                class="form-control session" required/>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <input placeholder="Degree" type="text" name="degree"
                                                                class="form-control session" required/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input placeholder="Session" type="text" id="myInput" name="session"
                                                                class="form-control session" required/>
                                                        </div>
                                                        <script>
                                                            const input = document.getElementById('myInput');

                                                            input.addEventListener('input', function(e) {
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
                                                            // Get the input element
                                                            var roll_noInput = document.getElementsByName("roll_no")[0];
                                                            var departmentInput = document.getElementsByName("department")[0];
                                                            var degreeInput = document.getElementsByName("degree")[0];

                                                            // Add an event listener to the input field
                                                            roll_noInput.addEventListener("input", function() {
                                                            // Convert the input value to uppercase
                                                            this.value = this.value.toUpperCase();
                                                            });
                                                            // Add an event listener to the input field
                                                            departmentInput.addEventListener("input", function() {
                                                            // Convert the input value to uppercase
                                                            this.value = this.value.toUpperCase();
                                                            });

                                                            degreeInput.addEventListener("input", function() {
                                                            // Convert the input value to uppercase
                                                            this.value = this.value.toUpperCase();
                                                            });
                                                        </script>                                                       
                                                    </div>

                                                    <div class="form-row ">
                                                        <div class="form-group col-md-6">
                                                            <input type="text" id="cnic" name="cnic" placeholder="CNIC"
                                                            class="form-control session" required/> 
                                                            <span id="cnicError" style="color: red;"></span>                     
                                                        </div>
                                                        <script>
                                                        const cnicInput = document.getElementById('cnic');
                                                        const error = document.getElementById('cnicError');
                                                        cnicInput.addEventListener('input', function(c) {
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
                                                        document.querySelector('form').addEventListener('submit', function(c) {
                                                        const value = cnicInput.value;
                                                        if (value.length > 0 && !/^\d{5}-\d{7}-\d{1}$/.test(value)) {
                                                            c.preventDefault();
                                                            error.textContent = 'CNIC is invalid';
                                                        }
                                                        });
                                                        </script>
                                                        <div class="form-group col-md-6">
                                                            <input placeholder="Phone No" type="text" id="phone" name="phone"
                                                            class="form-control session" required/>
                                                            <span id="phoneError" style="color: red;"></span>
                                                        </div>
                                                        <script>
                                                            const phoneInput = document.getElementById('phone');
                                                            const error1 = document.getElementById('phoneError');

                                                            phoneInput.addEventListener('input', function(p) {
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
                                                            phoneInput.addEventListener('keydown', function(e) {
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
                                                            document.querySelector('form').addEventListener('submit', function(p) {
                                                                const value = phoneInput.value;
                                                                if (value.length > 0 && !/^\d{4}-\d{7}$/.test(value)) {
                                                                    p.preventDefault();
                                                                    error1.textContent = 'Mobile Number is invalid';
                                                                }
                                                            });
                                                        </script>
                                                    </div>

                                                    
                                                    
                                                     <div class="form-group">
                                                     <select name="shift" class="session" required>
                                                        <option value="" selected disabled>
                                                            Shift
                                                        </option>

                                                        <option value="Morning">Morning</option>
                                                        <option value="Evening">Evening</option>
                                                        
                                                    </select>
                                                     </div>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input placeholder="Email" type="email" name="email" id="email-input"
                                                        class="form-control session" required/>
                                                </div>
                                                <script>
                                                    const emailInput = document.getElementById('email-input');

                                                    emailInput.addEventListener('input', function() {
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
                                                <div class="form-group col-md-6">
                                                    <input placeholder="Password" type="password" name="password"
                                                        class="form-control session" required/>
                                                </div>
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
                                            </div>
                                            <div class="form-group ">
                                                    <!-- <input placeholder="Picture" type="file" name="image"/> -->
                                                    <input type="file" name="image" required/>
                                            </div>

                                            <div class="clearfix">
                                                <input class="btn btn-primary float-right px-4" type="submit"
                                                    value="Save" />
                                            </div>

                                        </form>
                                        <?php
                                        // Display the uploaded image
                                        if(isset($folder)) {
                                            echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
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
    </div>
</body>

</html>