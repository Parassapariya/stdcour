<?php
include "connection.php";
$id=$_GET['id'];
$sql="DELETE FROM `pdf` WHERE id=$id";
$res=mysqli_query($con,$sql);
header("location:Matirials.php");
?>