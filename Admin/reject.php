<?php

 include ('../config.php');

	if (isset($_GET['d_id'])){
		$delete=$_GET['d_id'];
	
		$sql="DELETE FROM uploads WHERE `uploads`.`upload_id`='$delete'";
		$query = mysqli_query($conn, $sql);
	}
	header('location: accept.php');
// ?>




