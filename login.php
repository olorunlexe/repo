<?php 
session_start();
?>
<!doctype html>
<?php
	require('mysqli_connect.php');//Connect to the database
if(isset($_SESSION['username']) && ($_SESSION['password']))
{
	$u=$_SESSION['username'];
	$p=$_SESSION['password'];
	$result=mysqli_query($dbcon,"select * from sign_up where username='$u' && password='$p'");
$f=mysqli_fetch_array($result);

    if($f[5]==1){ 
        header("location:admin-page.php");
      exit();
     }
    else if($f[5]==0){
	header("location:member-page.php");
      }
}
else{

if(isset($_POST['loin'])){
$u=$_POST['username'];	 
$p=$_POST['password'];	 
$result=mysqli_query($dbcon,"select email,sex,user_level from sign_up where username='$u' && password='$p'");
$f=mysqli_fetch_array($result);
$c=mysqli_query($dbcon,"select count(*) from sign_up where username='$u' && password='$p'");
$x=mysqli_fetch_array($c);
if($x[0]==1){
	$_SESSION['username']=$u;
	$_SESSION['password']=$p;
	setcookie("username","$u",time() + 3600 * 24 * 365);
	setcookie("password","$p",time() + 3600 * 24 * 365);
    if($f[2]==1){
		 header('location:admin-page.php');
		 exit();
	   }
	 else{if($f[2]==0){
		 header('location:member-page.php');
		 
	 exit();}
	 
	 }
	 }else{echo "<h1><p>Your user details are incorrect</p></h1>";
	 }
}
else{
	}}
 mysqli_close($dbcon);
	 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="formdes.css">
<h1>Log into your account</h1>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post" id="login">
<fieldset>
<legend>Enter the details below</legend>
<p>
<label for="username" id="s">Username</label>
<input type="text" name="username" id="username"/>
</p>
<p>
<label for="password" id="s">Password</label>
<input type="password" name="password" id="password"/>
</p>
<li><input type="submit" value="Log in" name="loin" id="loin"></li>
<p><a href="forgot.php">Forgot password?</a>
</p>
</fieldset>
</form>
<a href="index.php">Back to the home page</a>
</body>
</html>

