<?php
include "config.php";
include 'header.php';

if(isset($_POST['deletebtn'])){
    $ms_id = $_POST['ms_id'];

    $sql = "DELETE FROM mark_sheet WHERE id = {$ms_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");
    }
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="ms_id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
