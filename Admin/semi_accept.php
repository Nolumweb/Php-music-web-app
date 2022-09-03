

<?php 
include ('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nolum music app</title>
    <link rel="stylesheet" href="assests/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
</head>
<body>
<style>
.b{
        background-color:purple;
        color: white;
        border-radius: 3px;
    }
</style>

<?php 
	if (isset($_GET['u_id'])){
		$upload_id=$_GET['u_id']; 
    
$accept='APPROVED'; 


		$sql="UPDATE `uploads` SET `status`='$accept' WHERE `uploads`.`upload_id` ='$upload_id'";
		mysqli_query($conn,$sql);
    $_SESSION['status'] = $accept;
	}

  header('location: accept.php');



  
?>

  </body>
</html>



