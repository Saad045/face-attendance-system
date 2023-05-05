<?php
include 'header.php';
    // echo $filename = $_FILES["uploadfile"]["name"];die();
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Teacher_Name</label>
            <input type="text" name="teacher_name" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" />
        </div>
        <div class="form-group">
            <label>Mobile_No</label>
            <input type="text" name="mobile_no" />
        </div>
        <div class="form-group">
            <label>CNIC</label>
            <input type="text" name="cnic" />
        </div>
        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="qualification" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" />
        </div>
        <div class="form-group">
            <div class="input_field" >
                <label>Upload_Image</label>
                <input type="file" name="uploadfile" />
            </div>
        </div>
        <input class="submit" type="submit" name="submit" value="Save"  />
    </form>
    <?php
    // Display the uploaded image
    // if(isset($folder)) {
    //     echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
    // }
    ?>
</div>
</div>
</body>
</html>
