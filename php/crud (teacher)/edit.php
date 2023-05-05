<?php
include 'config.php';
include 'header.php';
?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $t_id = $_GET['id'];
    $sql = "SELECT * FROM teacher WHERE id = {$t_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Teacher_Name</label>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
            <input type="text" name="teacher_name" value="<?php echo $row['name']; ?>"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $row['password']; ?>"/>
        </div>
        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"/>
        </div>
        <div class="form-group">
            <label>Mobile_No</label>
            <input type="text" name="mobile_no" value="<?php echo $row['mobile_no']; ?>"/>
        </div>
        <div class="form-group">
            <label>CNIC</label>
            <input type="text" name="cnic" value="<?php echo $row['cnic']; ?>"/>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>"/>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image"/>
        </div>
        <div>
            <label for=""></label>
            <span>
                <img src="<?php echo $row['image']; ?>" alt="" style="height: 80px;width:80px">
            </span>
            
        </div>
        <input class="submit" type="submit" value="Update"/>
    </form>
    <?php
        }
    }
    ?>
</div>