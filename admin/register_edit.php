<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location: adminLogin.php');
	exit();
}
include('sidebar/sidebar.php');?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Edit User</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit User</h1>
    </div>
  </div><!--/.row-->

  <?php

  $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
  if(isset($_POST['edit_btn']))
  {
	 $id = $_POST['edit_id'];
     $query = "SELECT * FROM registration where Id='$id'";
     $query_run = mysqli_query($connection, $query);

	foreach($query_run as $row)
	{

?>

      <form action="code.php" method="POST" >

        	<fieldset>
            <div class="form-group">
            <input class="form-control" value="<?php echo $row['id']?>" name="edit_id" type="hidden" autofocus="" required>
            </div>
        			<div class="form-group">
        			<input class="form-control" value="<?php echo $row['username']?>" name="edit_username" type="text" autofocus="" required>
        			</div>
        					<div class="form-group">
        								<input class="form-control" value="<?php echo $row['email']?>" name="edit_email" type="edit_email" autofocus="" required>
        					</div>
        					<div class="form-group">
        						    <input class="form-control" value="<?php echo $row['mobile']?>" name="edit_mobile" type="edit_mobile" autofocus="" required>
        					</div>
        					<div class="form-group">
        							<input class="form-control" value="<?php echo $row['affiliate']?>" name="edit_affiliate" type="text" autofocus="">
        					</div>

        							<input type="submit" name="" class="btn btn-primary" value="Cancel">
                      <input type="submit" name="updatebtn" class="btn btn-primary" value="Update">

                   </form>
<?php
  }
}?>
