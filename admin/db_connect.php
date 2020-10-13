<?php

$server = "localhost";
$user = "navneet";
$password = "!q&0T8slaVa[p{6y";
$db = "db_elearning";

$con = mysqli_connect($server,$user,$password,$db);

if($con)
{
	?>
		
	<?php
}else{
	?>
		<script>
			alert("Connection not Successful");
		</script>
	<?php
}

?>