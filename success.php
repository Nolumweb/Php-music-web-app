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
    
        <form action="accept_upload.php" method="post">
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <p class="lead  fw-bold mt-2">Successfully uploaded</p><?php //echo $name?></p>  </h4></p>
        <p>
          <button class="btn btn-flat  bg-gradient-primary mx-2" type="upload" name="upload" value="upload">Upload</button>
          <button class="btn btn-flat bg-gradient-secondary mx-2" type="submit" name="submit" value="submit">Cancel</button>
        </p>
      </div>
    </div>
  </section>
</form>
      </div>
          <!-- /.content-wrapper -->
      </div>

  <!-- Main Footer -->
  
  <?php include('includes/a_footer.php'); ?>

</body>
</html>
