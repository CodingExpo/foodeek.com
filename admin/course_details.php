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
				<li class="active">Course Details</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Course Details</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container" style="padding:25px;">
			<div class="row">
				<table class="table" id="dataTable" width="100%" cellspacing="0">
		      <thread>
		        <tr>
							<!--<th>Id</th>-->
							<th>Course Name</th>
							<th>Course published</th>
							<th>Price</th>
							<th>Edit Price</th>

		        </tr>
		      </thread>
							<?php
							 $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
							 $query = "SELECT id,course_name,published_date,price FROM courses";
							 $query_run = mysqli_query($connection, $query);
              ?>

    <tbody>
      <?php
      if(mysqli_num_rows($query_run)>0)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
					?>
					<tr>
						<!--<td> <?php #echo $row['id']; ?></td>-->
						<td> <?php echo $row['course_name']; ?></td>
						<td> <?php echo $row['published_date']; ?></td>
						<td> <?php echo $row['price']; ?></td>
						<td>
								<form action="edit_course_details.php" method="post">
										<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
										<button type="submit" name="edit_btn" class="btn btn-success">Edit Price</button>
								</form>
						</td>
					<tr>
        <?php
			   }
      }
			else{
					echo 'No Record found';
				}
				?>
				<?php
				if(isset($_SESSION['success']) && $_SESSION['success'] !='')
				{
					echo '<h2> ' .$_SESSION['success'].' </h2>';
					unset($_SESSION['success']);
				}
				if(isset($_SESSION['status']) && $_SESSION['status'] !='')
				{
					echo '<h2> ' .$_SESSION['status'].' </h2>';
					unset($_SESSION['status']);
				}
				?>
    </tbody>
  	</table>
	</div>
</div>
</div>

</body>
</html>