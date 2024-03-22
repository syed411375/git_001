<?php
include "connection.php";

if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$price=$_POST["price"];
	$category=$_POST["category_id"];
	
	$fname=$_FILES["pic"]["name"];
	$ftmp=$_FILES["pic"]["tmp_name"];
	$fsize=$_FILES["pic"]["size"];
	$ftype=$_FILES["pic"]["type"];
	
	if($ftype=="image/jpeg" || $ftype=="image/jpg" || $ftype=="image/png" || $ftype=="")
	{
		$fkb=$fsize/1024;
		if($fkb>=5 || $fkb=="")
		{
			move_uploaded_file($ftmp,"uploads/$fname");
			$ins="insert into products (name,image,price,category_id) values('$name','$fname','$price','$category')";
			$res=mysqli_query($conn,$ins);
			if($res==true)
			{
				header("location:aindex.php");
			}
			else
			{
				header("location:form.php?err");
			}
		}
		else
		{
			header("location:form.php?err");
		}
	}
	else
	{
		echo "Invalid Image Type";
	}
}
?>