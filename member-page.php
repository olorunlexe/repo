<?php 
session_start();
	
	require('mysqli_connect.php');
	
if(isset($_SESSION['username']) && ($_SESSION['password']))
{
	$u=$_SESSION['username'];
	$p=$_SESSION['password'];
	$result=mysqli_query($dbcon,"select count(*) from sign_up where username='$u' && password='$p'");
$f=mysqli_fetch_array($result);

    if($f[0]<1){ 
        header("location:error.html");
      exit();
     }

}
else{  header("location:error.html");
      exit();}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css">
<meta charset="utf-8">
<title>member page</title>
</head>

<body>
<P>Hello <?php echo $u; ?>,You are welcome to Lahdgist</P>
<h2>Gist Lounges</h2><br/>
<?php
$q = "SELECT * FROM forum_sections ORDER BY orders ASC LIMIT 10"; 
$sql = @mysqli_query($dbcon,$q);
$display = "";
while ($row = mysqli_fetch_array($sql,MYSQL_NUM)){
	$sectionID = $row[0];
	$sectionTitle = $row[1];
$r=sha1($row[0]);

?><a href="section.php?id=<?php echo $row[0];?>&food=rpiojorihoy"> <?php echo $row[1]; ?></a><br/>
<?php }
?>
<a href="index.php" id="ex">Back to the home page</a><br/>
<a href="chpassword.php" id="ex">Change Password</a>
<br/>
<a href="logout.php" id="ex">Logout</a>
<div>
<form enctype="multipart/form-data" method="post" action="imgupscript.php">
<p>Change your profile picture</p>
<input name="upload_file" type="file"/><br/><br/>
<input type="submit" value="upload the picture"/>
</form>
</div>
</body> 
</html>