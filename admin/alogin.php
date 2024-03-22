<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="logreg.css">
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
		  <?php
		  	if(isset($_GET["err"]))
	{
		echo "<p id=err>Invalid Username/Password</p>";
	}
		  ?>
		  </form>
		  </body>
		  <?php

if(isset($_POST['submit']))
{
	include"connection.php";
	$mail=$_POST['mail'];
	$pass=$_POST['password'];
	$sql="select name,password from admin";
	$r=mysqli_query($conn,$sql);
	$ans=mysqli_fetch_assoc($r);
	$c_mail=$ans['name'];
	$c_pass=$ans['password'];
	if(($c_mail==$mail)&&($c_pass==$pass))
	{
		header("location:aindex.php");	
	}
	else{
		header("location:alogin.php?err");
	}
	
	}?>
		  </html>