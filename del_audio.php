<?php

 include ('config.php');

	if (isset($_GET['dd'])){
		$del_audio=$_GET['dd'];
	
		$sql="DELETE FROM uploads WHERE `uploads`.`upload_id`= '$del_audio'";
		mysqli_query($conn,$sql);
	}
	header('location: view_all.php');
// ?>
