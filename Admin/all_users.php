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
<?php include('includes/a_header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- /.navbar -->
  <?php include('includes/a_navbar.php'); ?>
  <!-- /.sidebar -->
  <?php include('includes/a_sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper  bg-dark">
                <h5 class="text-center">Edit user</h5>
                <style>
a{
    color: #fff;
}

    .btn1{
        background-color: purple;
        color: white;
        border-radius: 3px;
    }

    .btn2{
        background-color: red;
        color: white;
        border-radius: 3px;
    }
      
</style>               
<body style="background-color:grey">
<div class="container px-5">
<div class="row">
  <div class="col-lg-12">
  <div class="table-responsive" id="showUser">
  <table class="table table-striped table-sm table-bordered">

        <thead>
            <tr>
                <th>SN</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

<?php

if (isset($_SESSION['username'])){
    $username=$_SESSION['username'];
$select_sql= "SELECT * FROM `account` WHERE 1";
$query =mysqli_query($conn, $select_sql);
$num =1;
if($query){
   while($row= mysqli_fetch_assoc($query)){
    $fname = $row['fullname'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
   $date=$row['date'];
   
?>

<tr>
<?php for($i=1;$i<=100;$i++)?>
    <td><?php echo $num?></td>
    <td><?php echo $username?></td>
    <td><?php echo $fname?></td>
    <td><?php echo $email?></td>
    <td><?php echo $date?></td>
    <td class="btn1"> <a href="edit_user.php?edit_user=<?php echo $username?>">Edit</a></td>
    <td class="btn2"> <a href="del_user.php?del=<?php echo $username?>"> Delete</a></td>
</tr>
<?php

$num ++;}

}else{
    die;
}}
?>
</tbody>
            <tfoot>
                <tr>
                    <td colspan="10"> </td>
                </tr>
            </tfoot>

</table> 
            <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mx-3 my-3"type="submit text-center" name="update" value="Update"> <a href="add_user.php">Add new User</button>
					<button class="btn btn-secondary my-3 "  type="button"><a href="a_dasbord.php">Back</button>
		    </div>

        
</div>

            </div>
</div>
</div>
</div>


  <?php include('includes/a_footer.php'); ?>
</body>
</html>
