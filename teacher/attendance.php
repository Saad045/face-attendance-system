<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendance</title>
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
            <div class="tab my-3"><a href="class1.php">BSCS 7<sup>th</sup></a></div>
            <div class="tab my-3"><a href="class2.php">BSCS 5<sup>th</sup></a></div>
          </div>
        </div>

        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h4 class="font-weight-bold my-4 py-1">BSCS 7<sup>th</sup></h4>
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

          <form>
            <div class="d-flex justify-content-between px-4 mt-4 ">
              <div>
                <button class="btn btn-dark btn-sm px-3">Mark All Present</button>
                <button class="btn btn-dark btn-sm px-3">Mark All Absent</button>
              </div>
            </div>

            <div class="row my-2 px-4">
              <div class="col-md-9">
                <table class="table table-borderless table-sm">
                  <thead>
                    <tr class="my-border">
                      <th class="pt-4 pb-1 px-4">Roll Number</th>
                      <th class="pt-4 pb-1 px-4">Name</th>
                      <th></th>

                      <th class="text-center pt-4 pb-1">P</th>
                      <th class="text-center pt-4 pb-1">A</th>
                      <th class="text-center pt-4 pb-1">L</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td colspan="6" class="pt-3 pb-2"></td></tr>
                    <tr class="row-color">
                      <td class="round-left px-4"><a href="studentData.php">BCS19-001</a></td>
                      <td class="px-4">Name</td>
                      <td></td>

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
                      <td class="text-center round-right">
                        <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                          <input type="checkbox" class="custom-control-input" id="leave1" name="attendance">
                          <label class="custom-control-label" for="leave1"></label>
                        </div>
                      </td>
                    </tr>

                    <tr><td colspan="6" class="py-1"></td></tr>
                    <tr class="row-color">
                      <td class="round-left px-4">BCS19-002</td>
                      <td class="px-4">Name</td>
                      <td></td>

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
                      <td class="text-center round-right">
                        <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                          <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                          <label class="custom-control-label" for="leave2"></label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>
</html>