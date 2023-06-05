<?php
	session_start();
  include '../includes/teacherHeader.php';

  $student_id = $_GET['student_id'];
  $course_id = $_GET['course_id'];
  $timetable_id = $_GET['timetable_id'];
  $attendance_id = $_GET['attendance_id'];

  $sqlforcourse = "SELECT * FROM course WHERE id=$course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $sqlforstudent = "SELECT * FROM student WHERE id=$student_id";
  $resultforstudent = mysqli_query($conn,$sqlforstudent);
  if (mysqli_num_rows($resultforstudent) > 0) {
    $student = mysqli_fetch_array($resultforstudent);
  }

$sqlforattendance = "SELECT attendance_sheet.id, student.roll_no, student.name AS student_name, course.name AS course_name, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.id = {$attendance_id}";
$resultforattendance = mysqli_query($conn,$sqlforattendance);
if (mysqli_num_rows($resultforattendance) > 0) {
    $attendance = mysqli_fetch_array($resultforattendance);
}

if (isset($_POST['update_attendance'])) {
	$id = $attendance['id'];
	$attendance_status = $_POST['attendance_status'];

	$sql = "UPDATE attendance_sheet SET attendance_status = '{$attendance_status}' WHERE id = $id";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	$_SESSION['success'] = "Record updated successfully!";
	header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
}
?>

<body>
  
<div class="container-fluid">
<div class="subject_wrapper">
	<div class="row">
	<?php include '../includes/teacherSidebar.php'; ?>

		<div class="col-md-10">
			<div class="row">
			    <div class="col-md-6">
			        <div class="d-flex  align-items-center px-4">
					
			          <h5 class="font-weight-bold text-uppercase my-4 py-1"><i class="fas fa-book  mr-2"></i><?php echo $course['name']; ?></h5>
					  <button  id="sidebar-toggle" onclick="toggleSidebar()" class=" btn btn-outline-dark  btn-sm  float-right" >
                      <i class="fas fa-chevron-right   mr-1"></i>
                  	</button>
			        </div>
			    </div>

			    <!-- <div class="col-md-6">
			        <div class="my-4 px-4">
			          <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
			        </div>
			    </div> -->
			</div>

	    <div class="row justify-content-center">
      	<div class="col-md-10">
      		<div class="row align-items-center justify-content-between mb-3">
      			<h5 class="font-weight-bolder">Attendance</h5>
      			<button type="submit" class="btn btn-outline-dark btn-sm" name="update_attendance" form="attendance"><i class="fas fa-user-pen  mr-2"></i>Update</button>
      		</div>

      		<form method="post" class="pl-4" id="attendance">
					<div class="form-group">
						<label for="attendance_status" class=" pr-5"><h6>Status:</h6></label>
						<label class="px-4"><input type="radio" name="attendance_status" value="P" <?php if($attendance['attendance_status']=='P') echo "checked"; ?> required> Present</label>
						<label class="px-4"><input type="radio" name="attendance_status" value="A" <?php if($attendance['attendance_status']=='A') echo "checked"; ?> required> Absent</label>
					</div>
				    <div class="form-group">
				    	<label><h6>Roll No:</h6></label>
				    	<input type="text" class="form-control" name="roll_no" value="<?php if (isset($attendance['roll_no'])) {echo $attendance['roll_no'];} ?>" readonly>
				    </div>
				    <div class="form-group">
				    	<label><h6>Name:</h6></label>
				    	<input type="text" class="form-control" name="name" value="<?php if (isset($attendance['student_name'])) {echo $attendance['student_name'];} ?>" readonly>
				    </div>
				    <div class="form-group">
				    	<label><h6>Date:</h6></label>
				    	<input type="text" class="form-control" name="date" value="<?php if (isset($attendance['date'])) {echo $attendance['date'];} ?>" readonly>
				    </div>
				    
      		</form>
      	</div>
	    </div>
		</div>
	     
	</div>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</body>
</html>