<?php 
include ('../config.php');
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nolum music app</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
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
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->


                <h5 class="text-center">MY UPLOAD HISTORY</h5>
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



    .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        table,th{
            border-style : solid;
            border-width : 1;
            text-align :center;
        }   
        td{
            text-align :center;
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
                <th>Id</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Audio</th>
                <th>Cove image</th>
                
                
            </tr>
        </thead>
    <tbody>
<?php
                     $select_sql = " SELECT * FROM `uploads` WHERE 1 ORDER BY `id` DESC";
                     $query = mysqli_query($conn, $select_sql);
                     if($query){
                         while($row = mysqli_fetch_assoc($query)){
                             $sn = $row['sn'];
                             $id = $row['id'];
                             $title=$row['title'];
                             $artist=$row['artist'];
                             $audio=$row['upath'];
                             $image=$row['cover'];
                                     
                             
?>
       
            <tr>
            
            <td><?php echo $sn ?></td>
            <td><?php echo $id ?></td>
            <td><?php echo $title ?></td>
            <td><?php echo $artist ?></td>
            <td><?php echo $audio ?></td>
            <td><?php echo  $image?></td>
            
           
            <td class="btn green"><a href="semi_accept.php?sn=<?php echo$sn?>">Accept</a></td>
            <td class="btn red"><a href="reject.php?sn=<?php echo$sn?>">Reject</a></td>
    
    </tr>
  
    <?php
    $num ++;           }
                }else{
                    die;
                }
            ?>
</div>
        </div> 
        </div>

    </table> 

    </div>
        </div> 
        </div>
  <!-- /.content-wrapper -->
</div>
<?php include('includes/b_footer.php'); ?>
</body>
</html>