<!-- Navbar -->

<?php



if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['id']);
	header("location: login.php");
}
?>


    <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark bg-dark border-primary">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="index.php" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li  class="nav-link">
       <a ></a>
      </li>
      <li>
      <a class="nav-link text-gradient-primary"  href="./" role="button"> <large><b>Hi, welcome  <?php echo ucwords($_SESSION['fullname']); ?></b> </large></a>
      </li>
    </ul>



  <ul class="navbar-nav ml-auto">
   
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="index.php" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
          <a class="nav-link"  data-toggle="dropdown" aria-expanded="true">
            <span>
              <div class="d-flex badge-pill align-items-center bg-gradient-primary p-1" style="background: #337cca47 linear-gradient(180deg,#268fff17,#007bff66) repeat-x!important;bprder:50px">
                  <div class="rounded-circle mr-1" style="width: 25px;height: 25px;top:-5px;left: -40px">
                    <img src="assets/uploads/" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);">
                  </div>
               
                <span class="fa fa-user mr-2" ></span><span ><b></b></span>
                <span class="fa fa-angle-down ml-2"></span>
              </div>
            </span>
          </a>

          <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
              <a href="profilee.php" class="dropdown-item" type="button" class="btn12"><i class="fa fa-id-card"></i>&nbsp;&nbsp; Profile</a>
              <button class="dropdown-item" type="button" id="m_profile" data-toggle="modal" data-target="#addModal"><i class="fa fa-cog"></i>&nbsp;&nbsp; Manage account</button>
              <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i>&nbsp;&nbsp; Logout</a>
            </div>

  </ul>
</nav>
	






