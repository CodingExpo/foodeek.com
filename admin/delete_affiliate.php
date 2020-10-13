<?php

session_start();
if(!isset($_SESSION['username']))
{
	header('location: adminLogin.php');
	exit();
}
include_once('db_connect.php');

if(isset($_POST['delete_btn']))
  {
	 $refer_id = $_POST['delete_id'];
     $query = "UPDATE registration SET affiliate='' WHERE affiliate = '$refer_id' ";;
     $query_run = mysqli_query($con, $query);
	 echo "<meta http-equiv='refresh' content='0;url=affliate.php'>";
  }
?>