<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Course_Name</label>
            <input type="text" name="course_name" />
        </div>
        <div class="form-group">
            <label>Course_Code</label>
            <input type="text" name="course_code" />
        </div>
        <div class="form-group">
            <label>Credit_Hours</label>
            <input type="text" name="credit_hours" />
        </div>
        <div class="form-group">
            <label>Lecture_Hours</label>
            <input type="text" name="lecture_hours" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
