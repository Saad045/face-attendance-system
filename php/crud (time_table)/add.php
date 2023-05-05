<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Course</label>
            <select name="course">
                <option value="" selected disabled>Select Course</option>
                <?php
                $sql = "SELECT * FROM course";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

              <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Slot</label>
            <select name="slot">
                <option value="" selected disabled>Select Slot</option>
                <?php
                $sql = "SELECT * FROM slot";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['slot_time']; ?></option>

              <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Day</label>
            <input type="text" name="day" />
        </div>

        <div class="form-group">
            <label>Teacher</label>
            <select name="teacher">
                <option value="" selected disabled>Select Teacher</option>
                <?php
                $sql = "SELECT * FROM teacher";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

              <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
