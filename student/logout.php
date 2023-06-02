<?php
session_start();
session_unset();
session_destroy();
header("http://localhost/face-attendance-system/");
?>