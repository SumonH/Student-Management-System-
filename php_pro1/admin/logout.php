<?php
// require_once'./dbcon.php';
session_start();
session_destroy();
header('location: login.php')
?>
