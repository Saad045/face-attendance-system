<?php
	session_start();
	include '../includes/connection.php';
	// if (isset($_POST['submit'])) {
	// 	// code...
	// } else {
	// 	die;
	// }

	date_default_timezone_set("Asia/Karachi");
	$student_id = $_POST['student_id'];
	$course_id = $_POST['course_id'];
	$teacher_id = $_POST['teacher_id'];
	$timetable_id = $_POST['timetable_id'];
	$curdate = date("Y-m-d");
	$curtime = date("H:i");
    $curday = strtolower(date("l"));
	$count = sizeof($student_id);
	for ($i=0; $i < $count; $i++) {

		$s_id = $student_id[$i];
		$attendance = $_POST['attendance'.$student_id[$i]];

		foreach ($attendance as $a) {
			$sql = "SELECT * FROM attendance_sheet WHERE student_id=$s_id && course_id=$course_id && teacher_id=$teacher_id && date='".$curdate."'";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				$attendance_error = true;
				$_SESSION['error'] = "Attendance already marked!"; //For specific student
				continue;
				// If the attendance of a student is marked, then his attendance will be skipped during whole class attendance.
			} else {
				// echo $a;echo $s_id;echo " ";
				$sql = "SELECT slot.slot_time, time_table.day FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN slot ON time_table.slot_id = slot.id WHERE student_timetable.student_id=$s_id && student_timetable.timetable_id=$timetable_id";
    			$result = mysqli_query($conn,$sql);
    			if (mysqli_num_rows($result) > 0) {
    				$row = mysqli_fetch_array($result);
    				$lecday = $row['day'];
					$lectime = explode('-', $row['slot_time']);
					$lecstarttime = reset($lectime);
					$lecendtime = end($lectime);

					if ($curday==$lecday && $curtime>=$lecstarttime && $curtime<=$lecendtime) {
        				$sql = "INSERT INTO attendance_sheet(id,student_id,course_id,teacher_id,date,attendance_status) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$curdate}','{$a}')"; //We have to insert current time also in database.
    					$result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
    					$_SESSION['success'] = "Record added successfully!";
    					header("Location: class.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
					} else {

						$_SESSION['error'] = "Invalid lecture time/day!";
						header("Location: class.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");

					}
    			}
			}
		}
	}

	if ($attendance_error == true) {
		header("Location: attendance.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
	}
	
	// if (isset($attendance_error)) {
	// 	header("Location: class.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id&attendance_error=$attendance_error");
	// } else {
	// 	header("Location: class.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
	// }
?>
