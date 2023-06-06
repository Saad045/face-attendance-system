<?php
session_start();
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$studentIds = $_POST['student_id'] ?? [];
	$newSemester = $_POST['new_semester'] ?? '';

	if (!empty($studentIds) && !empty($newSemester)) {
		$studentIds = array_map('intval', $studentIds); // Convert student IDs to integers

		// Update the semester of selected students in the database
		$studentIdsStr = implode(',', $studentIds);
		$sql = "UPDATE student SET semester = '$newSemester' WHERE id IN ($studentIdsStr)";
		$result = mysqli_query($conn, $sql);

		// Delete records from related tables
		$deleteQuery = "DELETE FROM student_timetable WHERE student_id IN ($studentIdsStr)";
		mysqli_query($conn, $deleteQuery);

		$deleteQuery = "DELETE FROM attendance_sheet WHERE student_id IN ($studentIdsStr)";
		mysqli_query($conn, $deleteQuery);

		$deleteQuery = "DELETE FROM mark_sheet WHERE student_id IN ($studentIdsStr)";
		mysqli_query($conn, $deleteQuery);



		if ($result) {
			$_SESSION['success'] = 'Semester changed successfully for selected students. Related records deleted.';
		} else {
			$_SESSION['error'] = 'Failed to change semester for selected students.';
		}
	}
}
header('Location: promotion.php');
exit;
?>