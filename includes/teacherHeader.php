<?php
  // session_start();
  include '../includes/connection.php';

  // We have to make logout button to use this feature! Differentiate b/w student & teacher login session variable.
  // if (!isset($_SESSION['loggedin'])) {
  //   header('Location: signin.php');
  // }

  if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];
    $sqlforteacher = "SELECT * FROM teacher WHERE teacher.id = $teacher_id";
    $resultforteacher = mysqli_query($conn,$sqlforteacher);
    if (mysqli_num_rows($resultforteacher) > 0) {
      $teacher = mysqli_fetch_array($resultforteacher);
    }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>