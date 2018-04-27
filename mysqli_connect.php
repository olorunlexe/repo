<?php
DEFINE('DB_USER','Dimeji');
DEFINE('DB_PASSWORD','wdbaba');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','lahd');
$dbcon = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$dbcon) die ('Could not connect to MySQL: ' . mysqli_connect_error () );
mysqli_set_charset($dbcon, 'utf8'); 
//mysql_select_db(DB_NAME,$dbcon);
?>
