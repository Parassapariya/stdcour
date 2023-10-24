<?php
ob_start();
ob_flush();
error_reporting(0);
session_start();
	$con=mysqli_connect("localhost","root","","study_course");
?>