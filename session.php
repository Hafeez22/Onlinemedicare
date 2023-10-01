<?php
session_start();
include ('admin/db.php');
// Starting Session
$user_check=$_SESSION['name'];
$qual=$_SESSION['qualification'];
$ses_sql=mysqli_query($con,"select * from add_doctor where name='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$user_id =$row['id'];
$user_name =$row['name'];
$qual =$row['qualification'];
if(!isset($user_id)){
mysql_close($con); 
$root = $_SERVER['DOCUMENT_ROOT'];
header('Location: doctor/index.php');
}
?>