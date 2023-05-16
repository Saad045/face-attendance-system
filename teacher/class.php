<?php
  include '../includes/teacherHeader.php';
?>
<body>
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/teacherSidebar.php'; ?>
        
        <div class="col-md-10">
          <?php
          if (isset($info)) {
            echo $info;
          }
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="font-weight-bold my-4 py-1">
                    <!-- BSCS 7<sup>th</sup> -->Course Name
                  </h5>
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

          <div class="d-flex justify-content-between px-4 mt-4 ">
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
                    
                      <td class="text-center round-left"><a href="studentData.php">BCS19-001</a></td>
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>