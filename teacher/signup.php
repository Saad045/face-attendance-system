<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Form | Teacher</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="form-wrapper">
      <h3 class="font-weight-bold text-center my-5">Create Profile</h3>
    
      <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="drop-zone m-auto">
              <span class="drop-zone__prompt">Drop file here or click to upload</span>
              <input accept="image/png, image/jpg, image/jpeg, image/gif" type="file" name="myFile" class="drop-zone__input" required>
            </div>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="FullName" name="fullname" required>
              </div>
              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="CNIC" name="cnic" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <input type="email" class="form-control myborder" placeholder="Email" name="email" required>
              </div>
              <div class="col-md-6 form-group">
                <input type="password" class="form-control myborder" placeholder="Password" name="password" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="Qualification" name="qualification" required>
              </div>

              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="Experience" name="experience" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="Cell No" name="phone_number" required>
              </div>

              <div class="col-md-6 form-group">
                <input type="text" class="form-control myborder" placeholder="Address" name="address" required>
              </div>
            </div>

            <!-- <div class="row mb-3">
              <div class="col-md-12 form-group py-2">
                <div class="form-check-inline">
                  <label class="form-check-label" for="morning">
                    <input type="radio" class="form-check-input" id="morning" name="timing" value="morning" checked>Morning
                  </label>
                </div>

                <div class="form-check-inline">
                  <label class="form-check-label" for="self-support">
                    <input type="radio" class="form-check-input" id="self-support" name="timing" value="self-support">Self-Supporting
                  </label>
                </div>
              </div>
            </div> -->
          </div>
        </div>

        <div class="text-right pb-3">
          <button type="reset" class="btn btn-outline-dark  px-4">Back</button>
          <button type="submit" class="btn btn-primary  px-4 ml-2" name="register">Register</button>
        </div>
        
      </form>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
</body>
</html>