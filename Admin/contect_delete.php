<?php
include "connection.php";
$id=$_GET['id'];
$sql="DELETE FROM `contect` WHERE id=$id";
$res=mysqli_query($con,$sql);
header("location:contect_us.php");
?>