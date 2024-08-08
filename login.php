<?php 
session_start();
echo $fac=$_POST['faculty'];
$_SESSION['username'] = $fac;
header("location: fac_dashboard.php");