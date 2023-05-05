<?php
include "config.php";
include 'header.php';

if(isset($_POST['deletebtn'])){
    $t_id = $_POST['id'];
    $sql = "DELETE FROM teacher WHERE id = {$t_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");

// header("Location: http://localhost/php/crud%20(teacher)/");
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
