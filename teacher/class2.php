<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Class</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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

        <!-- The Modal -->
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

        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="font-weight-bold my-4 py-1">BSCS 5<sup>th</sup></h5>
                  <!-- <div class="my-4">
                    <button class="btn btn-primary btn-sm px-3">Delete</button>
                    <button class="btn btn-primary btn-sm px-3">Update</button>
                  </div> -->
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="px-4">
                <div class="my-4">
                  <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-between px-4 mt-4">
            <div>
              <button type="" class="btn btn-dark btn-sm px-3">Date</button>
              <button type="" class="btn btn-dark btn-sm px-3">All</button>
              <button type="" class="btn btn-dark btn-sm px-3">Present</button>
              <button type="" class="btn btn-dark btn-sm px-3">Absent</button>
              <button type="" class="btn btn-dark btn-sm px-3">Leave</button>
            </div>

            <div>
              <button type="" class="btn btn-dark btn-sm px-3">Mark All Present</button>
              <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
            </div>
          </div>

          <div class="row justify-content-around my-2 px-4">
            <div class="col-md-12 ">
              <table class="table table-borderless table-sm">
                <thead>
                  <tr class="my-border">
                    <th class="text-center pt-4 pb-1">Roll Number</th>
                    <th class="text-center pt-4 pb-1">Name</th>
                    <th class="px-4"></th>

                    <th class="text-center pt-4 pb-1">P</th>
                    <th class="text-center pt-4 pb-1">A</th>
                    <th class="text-center pt-4 pb-1">L</th>
                    <td class="px-2"></td>

                    <th class="text-center pt-4 pb-1">Total</th>
                    <th class="text-center pt-4 pb-1">Final</th>
                    <th class="text-center pt-4 pb-1">Mid</th>
                    <th class="text-center pt-4 pb-1">Sessional</th>
                    <th class="text-center pt-4 pb-1">Q1</th>
                    <th class="text-center pt-4 pb-1">Q2</th>
                    <th class="text-center pt-4 pb-1">A1</th>
                    <th class="text-center pt-4 pb-1">A2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td colspan="15" class="pt-3 pb-2"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-001</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present1" name="attendance">
                        <label class="custom-control-label" for="present1"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent1" name="attendance">
                        <label class="custom-control-label" for="absent1"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave1" name="attendance">
                        <label class="custom-control-label" for="leave1"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>

                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>

                  <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>