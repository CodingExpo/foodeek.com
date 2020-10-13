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
				<li class="active">Affliate</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Affliate</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container" style="padding:30px;">
			<div class="row">
				<table class="table" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th>Name</th>
		          <th>refer id</th>
				  <th>Mobile No.</th>
				  <th>Total referals</th>
		        </tr>
		      </thead>
							<?php
							 $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
							 $query = "SELECT name,phone_number,refer_id FROM affiliate_id";
							 $query_run = mysqli_query($connection, $query);
							 
              ?>

    <tbody>
      <?php
      if(mysqli_num_rows($query_run)>0)
      {
        while($row = mysqli_fetch_assoc($query_run) )
        {
					?>
					<tr>
						<td> <?php echo $row['name']; ?></td>
						<td> <?php echo $row['refer_id']; ?></td>
						<td> <?php echo $row['phone_number']; ?></td>
						<?php
							$ref_id = $row["refer_id"];
							$connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
							$query1 = "SELECT COUNT(id) as count FROM registration where affiliate='$ref_id'";
							$query_run1 = mysqli_query($connection, $query1);
							if(mysqli_num_rows($query_run1)>0)
							{
								while($row1 = mysqli_fetch_assoc($query_run1) )
								{
							
						?>
						<td> <?php echo $row1['count']; ?></td>
						
						<td>
								<button type="submit"class="btn btn-success">EDIT</button>
						</td>
						<td>
								<form action="delete_affiliate.php" method="post">
										<input type="hidden" name="delete_id" value="<?php echo $row["refer_id"]; ?>">
										<button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
								</form>
						</td>						
					<tr>
					<?php
							}}
					?>
        <?php
			   }
      }
			else{
					echo 'No Record found';
				}
				?>
    </tbody>
  	</table>
	</div>
</div>
</div>

</body>
</html>
