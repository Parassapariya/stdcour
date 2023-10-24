<?php
include "connection.php";
$id=$_GET['id'];
$sql="DELETE FROM `course` WHERE id=$id";
$res=mysqli_query($con,$sql);
if($res)
{  
    header("location:Course.php");
}

	
?>