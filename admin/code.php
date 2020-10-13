<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location: adminLogin.php');
	exit();
}

$connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $mobile = $_POST['edit_mobile'];
    $affiliate = $_POST['edit_affiliate'];


    $query = "UPDATE registration SET username='$username', email='$email', mobile='$mobile', affiliate='$affiliate' WHERE Id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header("Location: total_user.php");
    }
    else {
      $_SESSION['success'] = "Your Data is NOT Updated";
      header("Location: total_user.php");
    }
}
?>
