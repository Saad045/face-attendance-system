<?php
  include '../includes/studentHeader.php';

  $student_id = $_GET['student_id'];
  $course_id = $_GET['course_id'];

  $sqlformarks = "SELECT * FROM mark_sheet WHERE mark_sheet.student_id=$student_id && mark_sheet.course_id=$course_id";
  $resultformarks = mysqli_query($conn,$sqlformarks);
  if (mysqli_num_rows($resultformarks) > 0) {
    $marks = mysqli_fetch_array($resultformarks);
    $mid = $marks['mid'];
    $final = $marks['final'];
    $sessional = $marks['sessional'];
    $totalmarks = $mid + $final + $sessional;
  }
?>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/studentSidebar.php'; ?>
        
        <div class="col-md-5 container">
          <div class="px-4">
            
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="font-weight-bold my-4 text-uppercase"><i class="fas fa-book   mr-2"></i><?php echo $course['course_name']; ?></h5>
                <button href="#" id="sidebar-toggle" onclick="toggleSidebar()" class=" btn btn-outline-dark  btn-sm  float-right" >
                        <i class="fas fa-chevron-left   mr-1"></i>
                </button>
            </div>
            
            <div class="d-flex align-items-center py-3">
              <div><img src="../admin/<?php echo $course['teacher_image']; ?>" class="rounded" style="width: 8vw;height: 8vw"></div><!-- 77*77 -->
              <div class="p-3">
            	  <h4 class="mb-0 pb-2"><?php echo $course['teacher_name']; ?></h4>
            	  <h5 class="mb-0"><?php echo $course['course_name']; ?></h5>
              </div>
            </div>

            <div class="bg-color rounded p-4 my-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0"><i class="fas fa-trophy   mr-2"></i>MARKS</h5>
              </div>

              <div class="d-flex justify-content-between text-center">
                <div class="d-flex flex-column">
                  <h6>Total</h6>
                  <h6><b><?php if (isset($totalmarks)) { echo $totalmarks; } ?></b>/100</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Mid</h6>
                  <h6><?php if (isset($mid)) { echo $mid; }else{echo "Null";} ?></h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Final</h6>
                  <h6><?php if (isset($final)) { echo $final; }else{echo "Null";} ?></h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Sessional</h6>
                  <h6><?php if (isset($sessional)) { echo $sessional; }else{echo "Null";} ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="px-4">
          	<div class="my-4">
          	  <!-- <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;"> -->
            </div>

            <div>
              <?php
              $sqlforattendance = "SELECT * FROM attendance_sheet WHERE attendance_sheet.student_id=$student_id && attendance_sheet.course_id=$course_id ORDER BY attendance_sheet.date ASC";
              $resultforattendance = mysqli_query($conn,$sqlforattendance);
              if (mysqli_num_rows($resultforattendance) > 0) {
              ?>
              <!-- <div class="d-flex justify-content-between pt-5 pb-4">
                <h5 class="mb-0 text-uppercase"><i class="fas fa-clipboard-user  mr-2"></i>Attendance</h5>
              </div> -->
              <div class="course list p-3">
              <h5 class="py-2"><i class="fas fa-clipboard-user mr-2"></i>LECTURES</h5>
              <?php
                $lecture_no = 0;
                foreach ($resultforattendance as $attendance) {
                  $lecture_no++;
              ?>
              <div class="d-flex justify-content-between bg-color rounded px-3 py-2 mb-2">
                <div><h6 class="d-inline-block mb-0">Lecture <?php echo $lecture_no; ?>:</h6></div>

                <div class="text-center">
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" name="" <?php if ($attendance['attendance_status']=='P') {echo "checked";}else{ echo "disabled";} ?>>
                    <label class="custom-control-label">Present</label>
                  </div>
                
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" name="" <?php if ($attendance['attendance_status']=='A') {echo "checked";}else{ echo "disabled";} ?>>
                    <label class="custom-control-label">Absent</label>
                  </div>
                </div>

                <div><h6 class="d-inline-block mb-0"><?php echo $attendance['date']; ?></h6></div>
              </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script>
  var xValues = ["P", "A", "L"];
  var yValues = [80, 15, 5];
  var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797"
  ];

  new Chart("myChart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      // title: {
      //   // display: true,
      //   text: "attendace Rec"
      // }
    }
  });
  </script>
</body>
</html>