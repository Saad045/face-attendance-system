<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Slot_No</label>
            <input type="text" name="slot_no" />
        </div>
        <div class="form-group">
            <label>Slot_Time</label>
            <input type="text" name="slot_time" />
        </div>
        <div class="form-group">
            <label>Shift</label>
            <input type="text" name="shift" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
