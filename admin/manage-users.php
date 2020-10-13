<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location: adminLogin.php');
	exit();
}
include('sidebar/sidebar.php');





?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<!--<div class="large">120</div>-->
							<div class="large">
							<?php

							 $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
							 $sql = "SELECT * FROM payment_details";
							 $result = mysqli_prepare($connection, $sql);

							 mysqli_stmt_execute($result);

							 mysqli_stmt_store_result($result);

							 $total_row=mysqli_stmt_num_rows($result);
 						 	 echo $total_row;

							 mysqli_stmt_free_result($result);

							 mysqli_stmt_close($result);

							 mysqli_close($connection);
							?>
							</div>
							<div class="text-muted">Total User</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">
							<?php

							 $connection = mysqli_connect("localhost","navneet","!q&0T8slaVa[p{6y","db_elearning");
							 $sql = "SELECT * FROM affiliate_id";
							 $result = mysqli_prepare($connection, $sql);

							 mysqli_stmt_execute($result);

							 mysqli_stmt_store_result($result);

							 $total_id=mysqli_stmt_num_rows($result);
 						 	 echo $total_id;

							 mysqli_stmt_free_result($result);

							 mysqli_stmt_close($result);

							 mysqli_close($connection);
							?>
							</div>
							<div class="text-muted">Affliate</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
</body>
</html>
