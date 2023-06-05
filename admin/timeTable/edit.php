<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<style>
  .course_wrapper a {
    color: rgb(0, 0, 0);
    text-decoration: none;
  }

  .course {
    background-color: #d9d9d9;
    border-radius: 10px;

  }

  .teacherName {
    font-weight: 500;
  }

  .course .span {
    font-weight: 500;
    line-height: 1.3;
  }

  .department-wrapper {
    padding-left: 2.5rem;
    padding-right: 1rem;
  }

  .dept-name {
    padding: 0px 1.5rem;
  }

  .dept-heading {
    font-size: 1.5rem;
  }

  .department {
    background-color: #d9d9d9;
    border-radius: 10px;
    min-height: 245.5px;
  }

  .session {
    font-weight: 500 !important;
    border: 1px solid black;
    border-radius: 5px;

    display: block;
    width: 100%;
    height: calc(1.5em + 0.7rem + 2px);
    padding: 3px 6px;
    line-height: 1;
    background-color: #fff;
    background-clip: padding-box;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .shift label {
    font-weight: 500;
    font-size: 18px;
  }
</style>

<body>
  <div class="container-fluid">
    <div class="course_wrapper">
      <div class="row">
        <?php include '../includes/sideBar.php'; ?>

        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                  <h3 class="font-weight-bold my-4 pb-2">
                    Teacher Time-Table
                  </h3>
              </div>
            </div>
          </div>

          <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
          <div class="row px-4 ">

            <div class="col-md-5 pb-4 ">
              <!-- Add this HTML code where you want to display the alert message -->
              <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $error; ?>
              </div>

              <div class="course p-3">
                <div class="px-0">
                  <a href='timeTable.php' class="font-weight-bold btn btn-sm "><i
                      class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                  <div class="department p-2">
                    <h5 class="font-weight-bold dept-heading mb-3">
                      UPDATE Record
                    </h5>
                    <?php
                    $tt_id = $_GET['id'];
                    $sql = "SELECT * FROM time_table WHERE id = {$tt_id}";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <form action="updatedata.php" method="post" enctype="multipart/form-data">
                          <div class="row pb-2">
                            <div class="col-md-12">

                              <div class="form-group">
                                <input type="hidden" name="t_id" value="<?php echo $row['id']; ?>" />

                              </div>
                              <div class="form-group">
                                <label>Course</label>
                                <?php
                                $sql1 = "SELECT * FROM course";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="course" placeholder="Course_Name" class="form-control session" required/>';
                                  while ($row1 = mysqli_fetch_array($result1)) {
                                    if ($row['course_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Teacher</label>
                                <?php
                                $sql1 = "SELECT * FROM teacher";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="teacher" placeholder="Teacher Name" class="form-control session" required/>';
                                  while ($row1 = mysqli_fetch_array($result1)) {
                                    if ($row['teacher_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Slot</label>
                                <?php
                                $sql1 = "SELECT * FROM slot";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="slot" placeholder="Slot_No" class="form-control session" required/>';
                                  while ($row1 = mysqli_fetch_array($result1)) {
                                    if ($row['slot_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['slot_no']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Day</label>
                                <input type="text" name="day" placeholder="Day" value="<?php echo $row['day']; ?>"
                                  class="form-control session" required />
                              </div>
                              <div class="clearfix">
                                <input class="btn btn-primary float-right px-4" type="submit" value="Update" />
                              </div>

                        </form>

                        <?php
                      }
                    }
                    ?>


                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>