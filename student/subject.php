<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Subject</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <div class="col-md-2 container bg-dark text-white text-center sticky-top sidebar">
          <div>
            <img src="../assets/images/student.jpg" class="img-fluid px-3 py-3">
            <p class="mb-0">Student Name</p>
            <div class="tab my-3"><a href="student.php" class="">Profile</a></div>
            <div class="tab my-3"><a href="subject.php" class="">Subject 1</a></div>
            <div class="tab my-3"><a href="subject.php" class="">Subject 2</a></div>
            <div class="tab my-3"><a href="subject.php" class="">Subject 3</a></div>
          </div>
        </div>

        <div class="col-md-5 container">
          <div class="px-4">
            <h5 class="font-weight-bold my-4">Subject 1</h5>
            <div class="d-flex align-items-center py-3">
              <div><img src="../assets/images/teacher.jpg" class="rounded" style="width: 6vw;height: auto"></div>
              <div class="p-3">
            	  <h5 class="mb-0 pb-2">Teacher Name</h5>
            	  <h6 class="mb-0">Subject Name</h6>
              </div>
            </div>

            <!-- <div class="bg-color rounded p-4">
              <h5 class="text-center pb-3">Attendance</h5>
              <div class="d-flex justify-content-around">
                <h6>Present</h6>
                <h6>32/32</h6>
              </div>

              <div class="d-flex justify-content-around">
                <h6>Absent</h6>
                <h6>32/32</h6>
              </div>

              <div class="d-flex justify-content-around">
                <h6>Leave</h6>
                <h6>32/32</h6>
              </div>
            </div> -->
            <div class="bg-color rounded p-4">
              <h5>Attendance Record</h5>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6>Present</h6>
                  <h6>Absent</h6>
                  <h6>Leave</h6>
                </div>

                <div>
                  <h6>32/32</h6>
                  <h6>32/32</h6>
                  <h6>32/32</h6>
                </div>

                <div class="pt-2">
                  <canvas id="myChart" style="width:100%;max-width:600px;height: 104px;width: 208px;"></canvas>
                </div>
              </div>
            </div>

            <div class="bg-color rounded p-4 my-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Marks</h5>
                <!-- <div><button class="btn btn-outline-dark btn-sm px-3">Update</button></div> -->
              </div>

              <div class="d-flex justify-content-between text-center">
                <div class="d-flex flex-column">
                  <h6>Total</h6>
                  <h6>100</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Final</h6>
                  <h6>40</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Mid</h6>
                  <h6>35</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Sessional</h6>
                  <h6>25</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="px-4">
          	<div class="my-4">
          	  <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
            </div>

            <div class="d-flex justify-content-between pt-5 pb-4">
              <div>
              	<a href="#" class="btn btn-dark btn-sm px-3">Date</a>
              </div>
              <div>
              	<a href="#" class="btn btn-dark btn-sm px-3">All</a>
              </div>
              <div>
              	<a href="#" class="btn btn-dark btn-sm px-3">Present</a>
              </div>
              <div>
              	<a href="#" class="btn btn-dark btn-sm px-3">Absent</a>
              </div>
              <div>
              	<a href="#" class="btn btn-dark btn-sm px-3">Leave</a>
              </div>
            </div>

            <div>
              <div class="d-flex justify-content-between bg-color rounded px-3 py-1 mb-2">
                <div><h6 class="d-inline-block mb-0">Lecture 1:</h6></div>

                <div class="text-center">
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day1-present" name="attendance">
                    <label class="custom-control-label" for="day1-present">P</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day1-absent" name="attendance">
                    <label class="custom-control-label" for="day1-absent">A</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day1-leave" name="attendance">
                    <label class="custom-control-label" for="day1-leave">L</label>
                  </div>
                </div>

                <div><h6 class="d-inline-block mb-0">10 Dec 2022</h6></div>
              </div>

              <div class="d-flex justify-content-between bg-color rounded px-3 py-1 mb-2">
                <div><h6 class="d-inline-block mb-0">Lecture 2:</h6></div>

                <div class="text-center">
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day2-present" name="attendance">
                    <label class="custom-control-label" for="day2-present">P</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day2-absent" name="attendance">
                    <label class="custom-control-label" for="day2-absent">A</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day2-leave" name="attendance">
                    <label class="custom-control-label" for="day2-leave">L</label>
                  </div>
                </div>

                <div><h6 class="d-inline-block mb-0">11 Dec 2022</h6></div>
              </div>

              <div class="d-flex justify-content-between bg-color rounded px-3 py-1 mb-2">
                <div><h6 class="d-inline-block mb-0">Lecture 3:</h6></div>

                <div class="text-center">
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day3-present" name="attendance">
                    <label class="custom-control-label" for="day3-present">P</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day3-absent" name="attendance">
                    <label class="custom-control-label" for="day3-absent">A</label>
                  </div>

                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" id="day3-leave" name="attendance">
                    <label class="custom-control-label" for="day3-leave">L</label>
                  </div>
                </div>

                <div><h6 class="d-inline-block mb-0">12 Dec 2022</h6></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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