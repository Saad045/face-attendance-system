<?php
  // include '../includes/studentHeader.php';
  include '../includes/connection.php';
  require '../vendor/autoload.php';

  $course_id = $_GET['course_id'];
  $teacher_id = $_GET['teacher_id'];
  $timetable_id = $_GET['timetable_id'];

  $sqlforcourse = "SELECT * FROM course WHERE course.id = $course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $sqlforteacher = "SELECT * FROM teacher WHERE teacher.id = $teacher_id";
  $resultforteacher = mysqli_query($conn,$sqlforteacher);
  if (mysqli_num_rows($resultforteacher) > 0) {
    $teacher = mysqli_fetch_array($resultforteacher);
  }

  $sqlforstudent = "SELECT student.degree, student.shift, student.session FROM student_timetable INNER JOIN student ON student.id = student_timetable.student_id WHERE student_timetable.timetable_id=$timetable_id GROUP BY student.degree && student.shift && student.session";
  $resultforstudent = mysqli_query($conn,$sqlforstudent);
  if (mysqli_num_rows($resultforstudent) > 0) {
    $student = mysqli_fetch_array($resultforstudent);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <style>
    .my-border{
      border-bottom: 5px solid navy;
    }
  </style>
</head>
<body>
  <div class="container border px-0" style="height:100vh">
    <div class="text-center my-border p-2">
      <img src="../admin/assets/images/pugc.png" alt="Institute Logo" class="img-fluid"/>
      <div>
        <h2>University Of The Punjab, Gujranwala Campus</h2>
        <h5>Near Ali Pur Chowk Rawalpindi Bypass Gujranwala, Pakistan</h5>
      </div>
    </div>

    <div class="px-4 py-3">
      <h3 class="text-center my-3">Class Report</h3>
      <div class="d-flex justify-content-between">
        <div>
          <div><label>Course:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $course['name']; ?></span></div>
          <div><label>Code:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $course['course_code']; ?></span></div>
          <div><label>Teacher:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $teacher['name']; ?></span></div>
          
        </div>

        <div>
          <div><label>Degree:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['degree']; ?></span></div>
          <div><label>Shift:&nbsp;&nbsp;</label><span class="font-weight-bold text-capitalize"><?php echo $student['shift']; ?></span></div>
          <div><label>Session:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['session']; ?></span></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th rowspan="2" class="text-center align-middle">Sr.</th>
              <th rowspan="2" class="align-middle">Roll No</th>
              <th rowspan="2" class="align-middle">Name</th>
              <th rowspan="2" class="align-middle text-center">Total <br>Marks</th>
              <th class="align-middle text-center" colspan="4">Marks Obtained</th>
              <th rowspan="2" class="align-middle text-center">Attendance</th>
            </tr>
            <tr>
              <th class="align-middle text-center">Mid</th>
              <th class="align-middle text-center">Final</th>
              <th class="align-middle text-center">Sessional</th>
              <th class="align-middle text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td class="">BCS19-001</td>
              <td class="">Hafiz</td>
              <td class="text-center">100</td>
              <td class="text-center">30</td>
              <td class="text-center">38</td>
              <td class="text-center">23</td>
              <td class="text-center">87</td>
              <td class="text-center">90%</td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td class="">BCS19-002</td>
              <td class="">Na-Maloom</td>
              <td class="text-center">100</td>
              <td class="text-center">30</td>
              <td class="text-center">38</td>
              <td class="text-center">23</td>
              <td class="text-center">87</td>
              <td class="text-center">90%</td>
            </tr>
            <tr>
              <td class="text-center">3</td>
              <td class="">BCS19-003</td>
              <td class="">Sameer</td>
              <td class="text-center">100</td>
              <td class="text-center">30</td>
              <td class="text-center">38</td>
              <td class="text-center">23</td>
              <td class="text-center">87</td>
              <td class="text-center">80%</td>
            </tr>
            <!-- Add more subjects and their marks and attendance details here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
