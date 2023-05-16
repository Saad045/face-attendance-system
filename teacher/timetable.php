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
          } //For unknown teacher entry!
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex justify-content-between align-items-center px-4">
                <h5 class="font-weight-bold my-4 py-1">Time-Table</h5>
              </div>
            </div>

            <div class="col-md-6">
              <div class="my-4 px-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
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