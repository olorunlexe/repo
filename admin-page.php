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
$p = mysqli_query($dbcon,"select * from sign_up where username='$u' && password='$p'");
$f=mysqli_fetch_array($result);
if($f[5]<1){ 
  header("location:error.html");
   exit();
  }
	  
	  ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"
<meta charset="utf-8">
<title>Admin page</title>
</head>

<body>
<p>Hello admin,You are welcome</p>
<h2>Gist Lounges</h2><br/>
<?php
$q = "SELECT * FROM forum_sections ORDER BY orders ASC LIMIT 10"; 
$sql = @mysqli_query($dbcon,$q);
$display = "";
while ($row = mysqli_fetch_array($sql,MYSQL_NUM)){//while makes it to display all the colums instead of one
	$sectionID = $row[0];
	$sectionTitle = $row[1];
$r=sha1($row[0]);
//The ?post stores that id in the get method so that it can be accessed directly in the address bar
?><a href="section.php?id=<?php echo $row[0];?>"> <?php echo $row[1]; ?></a><br/>
<?php
}
?>
<form action="new-topic.php" method="post">

<a href="index.php" id="ex">Back to the home page</a>
<br/>
<a href="logout.php" id="ex">Logout</a>
</body>
</html>