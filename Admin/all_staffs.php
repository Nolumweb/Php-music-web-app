

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
    <link rel="stylesheet" href="style/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
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
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    
	  </div>
  
    
    <style>
    table{
        background-color:black;
        color:#000;
        box-shadow: 2px 2px 2px 2px black;
        margin: auto;
       
    }
    th, td{
        border:1px solid blue;
        padding: 10px;
        color:white;
    }
    .btn1{
        background-color:orange;
        color: white;
        border-radius: 3px;
    }
    .btn2{
        background-color:purple;
        color: white;
        border-radius: 3px;
    }
    a{
        color: #fff;
    }
</style>

    
     
     <div class="content-wrapper  bg-dark">
     <body style="background-color:grey">
<div class="container px-5">
<div class="row">
  <div class="col-lg-12">
  <div class="table-responsive" id="showUser">
  <table class="table table-striped table-sm table-bordered">
 
      <div class="pb-2 mb-3 text-center">
          <h1">Dashboard</h1>
      </div>
     
          <thead>
             <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
          </thead>
          <tbody>
         <?php
                 if ($_SESSION['ROLE'] == "admin") {
            $query = "SELECT * FROM admins";
             }else{
            $role = $_SESSION['ROLE'];
            $query = "SELECT * FROM admins WHERE role = '$role'";
             }
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
             ?>      
             <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['fullname']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['role']?></td>
                 <td><?php echo date('d-M-Y', strtotime($row['created']))?></td>
                 <td class="btn1"> <a href="edit_staff.php?edit_staff=<?php echo $row ['id']?>">Edit</a></td>
                 <td class="btn2"> <a href="del_staff.php?del=<?php echo $row ['id']?>"> Delete</a></td>
             </tr>
              <?php   }
         }else{
             echo "<h2>No record found!</h2>";
         } ?>                           
         </tbody>
          </table>

          <div class="col-lg-12 text-right justify-content-center d-flex">
					
					<a href="create_staff.php" class="btn btn-primary" type="button">Add new staff</a>
                    <button class="btn btn-secondary mx-3 "  type="button"><a href="a_dasbord.php">Back</button>
		    </div>

      </div>
     

      </div>
</div>
</div>
		
</div>
  <?php include('includes/a_footer.php'); ?>

</body>
</html>

