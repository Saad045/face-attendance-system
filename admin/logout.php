<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the signin page after logout
header("http://localhost/face-attendance-system/");
exit();
?>