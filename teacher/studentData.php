<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <div class="col-md-2 container bg-dark text-white text-center sticky-top sidebar">
          <div>
            <img src="../assets/images/teacher.jpg" class="img-fluid px-3 py-3">
            <p class="mb-0">Teacher Name</p>
            <div class="tab my-3"><a href="#" data-toggle="modal" data-target="#myModal">Add Class</a></div>
            <div class="tab my-3"><a href="class1.php">BSCS 7<sup>th</sup></a></div>
            <div class="tab my-3"><a href="class2.php">BSCS 5<sup>th</sup></a></div>
          </div>
        </div>

        <!-- The Modal for Adding Class -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-width my-5">
            <div class="modal-content p-3">
            
              <div class="modal-header border-0 px-3 py-2">
                <h5 class="modal-title font-weight-bolder">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <div class="modal-body pt-1 pb-0">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="classname" placeholder="Class Name">
                    </div>

                    <div class="col-md-6">
                      <input type="text" class="form-control" name="course" placeholder="Course">
                    </div>
                  </div>

                  <div class="row pt-3">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <input type="text" class="form-control" name="semester" placeholder="Semester">
                        </div>

                        <div class="col-md-6 pl-1">
                          <input type="text" class="form-control" name="department" placeholder="Department">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <input type="number" class="form-control" name="lectureslot" placeholder="Lecture Slot 1, 08:30-10:00">
                    </div>
                  </div>
                </form>
              </div>
              
              <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-dark px-4" data-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-primary px-4">Add</button>
              </div>
              
            </div>
          </div>
        </div> <!-- The Modal -->

        <div class="col-md-5 container">
          <div class="px-4">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="font-weight-bold my-4 py-1">BSCS 7<sup>th</sup></h5>
              <!-- <div class="my-4">
                <button class="btn btn-primary btn-sm px-3">Delete</button>
                <button class="btn btn-primary btn-sm px-3">Update</button>
              </div> -->
            </div>

            <div class="d-flex align-items-center py-3">
              <div><img src="../assets/images/student.jpg" class="rounded" style="width: 6vw;height: auto;"></div>
              <div class="p-3">
            	  <h6 class="mb-0 pb-2">BCS19-045</h6>
            	  <h5 class="mb-0">Bilal Ahmad</h5>
              </div>
            </div>

            <!-- <div class="bg-color rounded p-4">
              <h5 class="pb-3">Attendance Record</h5>
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

              <div class="">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
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

            <!-- Modal For Updating Marks -->
            <div class="modal fade" id="updateMarks">
              <div class="modal-dialog modal-width my-5">
                <div class="modal-content p-3">
                
                  <div class="modal-header border-0 px-3 py-2">
                    <h5 class="modal-title font-weight-bolder">Update Marks</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <div class="modal-body pt-1 pb-0">
                    <div class="my-2">
                      <form method="post" action="#">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex justify-content-between border rounded-lg px-3">
                              <h6 class="mb-0">
                                <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
                              </h6>
                              <h6 class="mb-0">
                                <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
                              </h6>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="d-flex justify-content-between border rounded-lg px-3">
                              <h6 class="mb-0">
                                <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
                              </h6>
                              <h6 class="mb-0">
                                <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
                              </h6>
                            </div>
                          </div>
                        </div>

                        <div>
                          <h6 class="mt-4"><b>Sessional</b></h6>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
                                </h6>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
                                </h6>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
                                </h6>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
                                </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <div class="modal-footer border-0">
                    <!-- <button type="button" class="btn btn-outline-dark px-4" data-dismiss="modal">Back</button> -->
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                  </div>
                  
                </div>
              </div>
            </div> <!-- The Modal -->

            <!-- Modal For Adding Marks -->
            <div class="modal fade" id="addMarks">
              <div class="modal-dialog modal-width my-5">
                <div class="modal-content p-3">
                
                  <div class="modal-header border-0 px-3 py-2">
                    <h5 class="modal-title font-weight-bolder">Add Marks</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <div class="modal-body pt-1 pb-0">
                    <div class="my-2">
                      <form method="post" action="#">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex justify-content-between border rounded-lg px-3">
                              <h6 class="mb-0">
                                <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
                              </h6>
                              <h6 class="mb-0">
                                <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
                              </h6>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="d-flex justify-content-between border rounded-lg px-3">
                              <h6 class="mb-0">
                                <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
                              </h6>
                              <h6 class="mb-0">
                                <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
                              </h6>
                            </div>
                          </div>
                        </div>

                        <div>
                          <h6 class="mt-4"><b>Sessional</b></h6>
                          <div class="row mb-3">
                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
                                </h6>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
                                </h6>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
                                </h6>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="d-flex justify-content-between border rounded-lg px-3">
                                <h6 class="mb-0">
                                  <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
                                </h6>
                                <h6 class="mb-0">
                                  <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
                                </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <div class="modal-footer border-0">
                    <!-- <button type="button" class="btn btn-outline-dark px-4" data-dismiss="modal">Back</button> -->
                    <button type="submit" class="btn btn-primary px-4">Add</button>
                  </div>
                  
                </div>
              </div>
            </div> <!-- The Modal -->

            <div class="bg-color rounded p-4 my-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Marks</h5>
                <div>
                  <button class="btn btn-sm px-2" data-toggle="modal" data-target="#addMarks"><i class="fas fa-plus"></i>  </button>
                  <button class="btn btn-sm px-2" data-toggle="modal" data-target="#updateMarks"><i class="fas fa-edit"></i>  </button>
                  <button class="btn btn-sm px-2" data-toggle="modal" data-target="#deleteMarks"><i class="fas fa-trash"></i>  </button>
                </div>
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

                <div class="d-flex flex-column">
                  <h6>Q1</h6>
                  <h6>5</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>Q2</h6>
                  <h6>5</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>A1</h6>
                  <h6>5</h6>
                </div>

                <div class="d-flex flex-column">
                  <h6>A2</h6>
                  <h6>5</h6>
                </div>
              </div>
            </div>

            <!-- <div class="my-5">
              <form method="post" action="#">
                <div class="row">
                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
                      </h6>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
                      </h6>
                    </div>
                  </div>
                </div>

                <div>
                  <h6 class="mt-4"><b>Sessional</b></h6>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="d-flex justify-content-between border rounded-lg px-3">
                        <h6 class="mb-0">
                          <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
                        </h6>
                        <h6 class="mb-0">
                          <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
                        </h6>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="d-flex justify-content-between border rounded-lg px-3">
                        <h6 class="mb-0">
                          <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
                        </h6>
                        <h6 class="mb-0">
                          <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
                        </h6>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="d-flex justify-content-between border rounded-lg px-3">
                        <h6 class="mb-0">
                          <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
                        </h6>
                        <h6 class="mb-0">
                          <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
                        </h6>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="d-flex justify-content-between border rounded-lg px-3">
                        <h6 class="mb-0">
                          <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
                        </h6>
                        <h6 class="mb-0">
                          <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div> -->
          </div>
        </div>

        <div class="col-md-5">
          <div class="px-4">
          	<div class="my-4">
          	  <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
            </div>
            <div class="pb-3"></div>

            <div class="py-4">
              <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                <h5 class="mb-0">Attendance</h5>
                <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
              </div>
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