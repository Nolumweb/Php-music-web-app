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
                <h5 class="text-center">All UPLOAD HISTORY</h5>
                <style>
a{
    color: #fff;
}

    .green{
        background-color: purple;
        color: white;
        border-radius: 3px;
    }

    .red{
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
                <th>Sn</th>
      <th>Username</th>
                <th>Audio</th>
                <th>Date</th>
                <th>Status</th>
                <th>Accept/Delete</th>
                <th></th>
                
                
            </tr>
        </thead>
    <tbody>

    
    <?php
    if (isset($_SESSION['username'])){
        $username=$_SESSION['username'];
                $select_sql = " SELECT * FROM `uploads` WHERE 1 ";
                $query = mysqli_query($conn, $select_sql);
                $num =1;
                if($query){
                    while($row = mysqli_fetch_assoc($query)){

                        $upload_id = $row['upload_id'];
                        $username=$row['username'];
                        $audio=$row['upath'];
                        $date= $row['date'];
                        $accept= $row['status'];             
                        
    ?>  
            <tr>
          
            <td><?php echo $num ?></td>
            <td><?php echo $username ?></td>
            <td><?php echo $audio ?></td>
            <td><?php echo $date ?></td>
            <td><?php echo $accept ?></td>
           
            <td class="btn green"><a href="semi_accept.php?u_id=<?php echo$upload_id?>">Accept</a></td>
            <td class="btn red"><a href="reject.php?d_id=<?php echo$upload_id?>">Reject</a></td>
           
    </tr>
 
           <?php
              $num ++;  }}}
                
           ?>
</div> 
        </div> 
        </div>

    </table> 
    <div class="col-lg-12 text-right justify-content-center d-flex">
	        <button class="btn btn-secondary my-3 "  type="button"><a href="a_dasbord.php">Back</button></div>

    
    </div>
        </div> 
        </div>
  <!-- /.content-wrapper -->
</div>


<?php include('includes/a_footer.php'); ?>
</body>
</html>