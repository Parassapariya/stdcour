<?php
include "connection.php";
if(isset($_POST['sub']))
{
	$id=$_POST['id'];
	$cat_name=$_POST['cat_name'];
	$file_name=$_FILES['updImg']['name'];
	if($file_name != "")
	{
		$file_temp=$_FILES['updImg']['tmp_name'];
		$nm=rand().$cat_name;
		$ext=end(explode(".",$file_name));
		$nfile=$nm.".".$ext;
		$file_destination="images/Cat_img/".$nfile;
		move_uploaded_file($file_temp,$file_destination);
	}
	
	
		$sql="UPDATE `categories` SET `Cat_name`='$cat_name',`Cat_img`='$file_destination' where `id`='$id'";
		
		$res1=mysqli_query($con,$sql);
		if($res1)
		{
			header("location:catagaris.php");
		}
	
}
?>  