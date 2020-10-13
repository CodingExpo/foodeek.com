<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location: adminLogin.php');
	exit();
}
include('sidebar/sidebar.php');?>


<?php
session_start();

$connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $course_name = $_POST['course_name'];
    $price = $_POST['price'];


    $query = "UPDATE courses SET course_name='$course_name', price='$price' WHERE Id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header("Location: course_details.php");
    }
    else {
      $_SESSION['success'] = "Your Data is NOT Updated";
      header("Location: course_details.php");
    }
}
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Edit Course Details</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Course Details</h1>
    </div>
  </div><!--/.row-->

  <?php

  $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
  if(isset($_POST['edit_btn']))
  {
	 $id = $_POST['edit_id'];
     $query = "SELECT * FROM courses where id='$id'";
     $query_run = mysqli_query($connection, $query);

	foreach($query_run as $row)
	{

?>

      <form action="" method="POST" >

        	<fieldset>
            <div class="form-group">
            <input class="form-control" value="<?php echo $row['id']?>" name="edit_id" type="hidden" autofocus="" required>
            </div>
        			<div class="form-group">
        			<input class="form-control" value="<?php echo $row['course_name']?>" name="course_name" type="text" autofocus="" required>
        			</div>
        					<div class="form-group">
        								<input class="form-control" value="<?php echo $row['price']?>" name="price" type="text" autofocus="" required>
        					</div>

        							<input type="submit" name="" class="btn btn-primary" value="Cancel">
                      <input type="submit" name="updatebtn" class="btn btn-primary" value="Update">

                   </form>
<?php
  }
}?>
