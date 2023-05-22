<?php
  include '../includes/teacherHeader.php';

  $student_id = $_GET['student_id'];
  $course_id = $_GET['course_id'];
  $timetable_id = $_GET['timetable_id'];
  $marks_id = $_GET['marks_id'];

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

$sqlformarks = "SELECT mark_sheet.id, student.roll_no, student.name AS student_name, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional FROM mark_sheet INNER JOIN student ON mark_sheet.student_id = student.id WHERE mark_sheet.id = $marks_id";
$resultformarks = mysqli_query($conn,$sqlformarks);
if (mysqli_num_rows($resultformarks) > 0) {
  $marks = mysqli_fetch_array($resultformarks);
}

if (isset($_POST['update_marks'])) {
	$id = $marks['id'];
	$mid = $_POST['mid'];
	$final = $_POST['final'];
	$sessional = $_POST['sessional'];

	$sql = "UPDATE mark_sheet SET mid = '{$mid}', final = '{$final}',sessional = '{$sessional}' WHERE id = $id";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
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
			        <div class="d-flex justify-content-between align-items-center px-4">
			          <h5 class="font-weight-bold my-4 py-1"><?php echo $course['name']; ?></h5>
			        </div>
			    </div>

			    <div class="col-md-6">
			        <div class="my-4 px-4">
			          <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
			        </div>
			    </div>
			</div>

	    <div class="row justify-content-center">
      	<div class="col-md-10">
      		<div class="row align-items-center justify-content-between mb-3">
      			<h5 class="font-weight-bolder">Marks</h5>
      			<button type="submit" class="btn btn-primary" name="update_marks" form="marks">Update</button>
      		</div>

      		<form method="post" class="pl-4" id="marks">
			    <div class="form-group">
			    	<label><h6>Roll No:</h6></label>
			    	<input type="text" class="form-control" name="roll_no" value="<?php echo $marks['roll_no']; ?>" readonly>
			    </div>
			    <div class="form-group">
			    	<label><h6>Name:</h6></label>
			    	<input type="text" class="form-control" name="name" value="<?php echo $marks['student_name']; ?>" readonly>
			    </div>
			    <div class="form-group">
			    	<label><h6>Mid-term:</h6></label>
			    	<input type="text" class="form-control" name="mid" value="<?php echo $marks['mid']; ?>">
			    </div>
			    <div class="form-group">
			    	<label><h6>Final-term:</h6></label>
			    	<input type="text" class="form-control" name="final" value="<?php echo $marks['final']; ?>">
			    </div>
			    <div class="form-group">
			    	<label><h6>Sessional:</h6></label>
			    	<input type="text" class="form-control" name="sessional" value="<?php echo $marks['sessional']; ?>">
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