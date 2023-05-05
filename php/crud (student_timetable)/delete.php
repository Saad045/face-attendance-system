<?php
include "config.php";
include 'header.php';

if(isset($_POST['deletebtn'])){
    $st_id = $_POST['st_id'];

    $sql = "DELETE FROM student_timetable WHERE id = {$st_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

    // header("Location: http://localhost/php/crud%20(student_timetable)/index.php");
    // mysqli_close($conn);
}
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="st_id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
