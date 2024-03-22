<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="admin/logreg.css">
</head>
<body>
  <div class="wrapper">
    <div class="title">
     LOGIN
	 </div>
        <form method="post">
           <div class="field">
            <input type="text"  name="mail" id="mail"  required>
			<label >User Name</label>
          </div>
          <div class="field">
            <input type="password" id="password" name="password"  required>
			<label >Password</label>
          </div>
		  <div class="field">
            <input type="submit"  name="submit"  value="Login">
          </div>
		   <div class="content">
		  <a href="register.php">New User?</a>
		  <a href="admin/alogin.php">admin?</a>
		  </div>
		  <?php
		  	if(isset($_GET["err"]))
	{
		echo "<p id=err>Invalid Username/Password</p>";
	}
		  ?>
		  </form>
		  </body>
		 <?php
include "admin/connection.php";

if(isset($_POST["submit"]))
{
	$user=$_POST["mail"];
	$pwd=$_POST["password"];
	
	$sel="select *from register where email='$user' and password='$pwd'";
	$res=mysqli_query($conn,$sel);
	$cnt=mysqli_num_rows($res);
	if($cnt>0)
	{
		header("location:index.php");
	}
	else
	{
		header("location:login.php?err");
	}
}
?>
		  </html>