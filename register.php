<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <title>Signup Page</title>
  <link rel="stylesheet" href="admin/logreg.css">
  <style>
.wrapper .title{
	line-height:70px;
}

.wrapper form .field{
	height:40px;
}
.wrapper form{
	padding:15px 30px 20px 30px;
}
.wrapper form .field{
	margin-top:15px;
}
.file{
	margin:20px;
}
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="title">
     Sign Up
	 </div>
        <form method="post" enctype="multipart/form-data">
           <div class="field">
            <input type="text"  name="name" id="name"  required>
			<label >Name</label>
          </div>
		  <div class="field">
            <input type="email"  name="email" id="email"  required>
			<label >Email</label>
          </div><div class="field">
            <input type="number"  name="number" id="number"  required>
			<label >Mobile Number</label>
          </div>
          <div class="field">
            <input type="password" id="password" name="password"  required>
			<label >Password</label>
          </div> 
		  <div class="field">
            <input type='text' id="add" name="add"  required>
			<label >Address</label>
          </div>
		   <div class="file">
            <input type='file' id="pic" name="pic">
          </div>
		  <div class="field">
            <input type="submit"  name="submit"  value="Login">
          </div>
		   <div class="content">
		  <a href="login.php">Already Register?</a>
		  </div>
		  </form>
		  </body>
		  <?php
include "admin/connection.php";

if(isset($_POST["submit"]))
{
	$un=$_POST["name"];
	$em=$_POST["email"];
	$pwd=$_POST["password"];
	$ph=$_POST["number"];
	$add=$_POST['add'];
	
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
			$ins="insert into register (name,email,password,number,address,image) values('$un','$em','$pwd',$ph,'$add','$fname')";
			$res=mysqli_query($conn,$ins);
			if($res==true)
			{
				header("location:login.php");
			}
			else
			{
				header("location:register.php?err");
			}
		}
		else
		{
			echo "File size too small";
		}
	}
	else
	{
		echo "Invalid Image Type";
	}
}
?>
		  </html>