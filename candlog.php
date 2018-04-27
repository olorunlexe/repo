<?php 
session_start();
?>
<?php
require("mysqlconnect.php");
$alert = " ";
if(isset($_SESSION['username']) && ($_SESSION['password']))
{
	$user=$_SESSION['username'];
	$pass=$_SESSION['password'];
	$sql = "SELECT * FROM candidate WHERE username = '$user'&& password = '$pass'";
	$query = mysqli_query($dbcon,$sql);
	$num = mysqli_num_rows($query);
	if ($num==1){
		header("location:candidate.php");
	}
	else{
		$alert = "Incorrect user details";
	}
}
if (isset($_POST['submit'])){
	$user = $_POST['name'];
	$pass = sha1($_POST['password']);
	$sql = "SELECT * FROM candidate WHERE username = '$user'&& password = '$pass'";
	$query = mysqli_query($dbcon,$sql);
	$num = mysqli_num_rows($query);
	if ($num==1){
	$_SESSION['username']=$user;
	$_SESSION['password']=$pass;
	setcookie("username","$user",time() + 3600 * 24 * 365);
	setcookie("password","$pass",time() + 3600 * 24 * 365);
		header("location:candidate.php");
	}
	else{
		$alert = "Incorrect user details";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

<body style="background-color: #003366">
<?php
require("header.php");
?>
<div class="container-fluid">
<div class="col-md-4 col-md-offset-4" style="margin-top:200px; margin-bottom:200px; background-color:#006699">
<?php
echo '<p style="color:#FFF">'.$alert.'</p>';
?>
<form action="candlog.php" method="post">
<label for="Name" style="color: #FFF">Username</label>
<input type="text" class="form-control input-sm" name="name" required/>
<label for="password" style="color: #FFF">Password</label>
<input type="password" class="form-control input-sm" name="password" required/>
<legend></legend>
<button type="submit" class="btn btn-sm btn-success" name="submit">Login</button>
</form>
</div>
</div>
<footer class="footer">
<div class="container-fluid" style="border-color:#FFFFFF; margin-top:0px; border-top-style:groove">

</div> 
</footer>
</body>
</html>