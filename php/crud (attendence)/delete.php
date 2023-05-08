<?php
include "config.php";
include 'header.php';

if(isset($_POST['deletebtn'])){
    $as_id = $_POST['as_id'];
    $sql = "DELETE FROM attendance_sheet WHERE id = {$as_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    header("Location: index.php");
}
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>AttendanceSheet Id</label>
            <input type="text" name="as_id" required />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
