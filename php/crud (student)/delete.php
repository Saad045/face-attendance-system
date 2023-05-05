<?php
include 'header.php';
include "config.php";

if(isset($_POST['deletebtn'])){
    $std_id = $_POST['id'];

    $sql = "DELETE FROM student WHERE id = {$std_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

}
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
