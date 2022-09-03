<?php 
include "config.php";
$msg = "";
$success_msg['success']='';
$warning_msg['success']='';
if (isset($_SESSION['username'])){
$username=$_SESSION['username'];

if (isset($_POST['update'])) {

  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $artist = mysqli_real_escape_string($conn,$_POST['artist']);
  $audio_file = $_FILES['upath']['name']; 
  if(isset($_FILES['upath'])){
      $audio_type = $_FILES['upath']['type'];
      $audio_name = $_FILES['upath']['name']; 
      $audio_tmp = $_FILES['upath']['tmp_name']; 
      $audioSize=$_FILES['upath']['size'];
      $audioError=$_FILES['upath']['error'];
      if($audioSize> 1000000){
        if($audioError===0){
          //$audio= date("dmy") . time() . $_FILES["upath"]["name"];
        //$audioNewName= uniqid('audio-', true). ".".$audioActualExt;
        move_uploaded_file($audio_tmp, "uploads/audio/".$audio_name);
        }
  $image = $_FILES["cover"]["name"];
  $image_tmp = $_FILES["cover"]["tmp_name"]; 
  move_uploaded_file($image_tmp, "uploads/cover/$image");
  $pend='PEND';
  $date=date('D_m_y');
       
    $sql= "INSERT INTO `uploads`(`sn`, `username`, `title`, `artist`, `upath`, `cover`, `date`, `status`)
    VALUES ('', '$username', '$title', '$artist', '$audio_file', '$image', '$date', '$pend' )";
    $query = mysqli_query($conn, $sql);
    header("Refresh:1; url=view_all.php");


    if ($query){
      $success_msg['success'] = 'Uploaded successfully, </b>Kindly wait for an approval.';
      
    }else{
      $warning_msg['success'] = 'Your file is too big.';
       
    }
  }else{
    $warning_msg['success'] = 'There was an error uploading your file.';
   
    }
  }else{
      $warning_msg['success'] = 'You cannot upload files of this type.';
    }
  }
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
<?php include('includes/b_header.php'); ?>
<body class="content-wrapper">

  <!-- /.navbar -->
  <?php include('includes/b_navbar.php'); ?>
  <!-- /.sidebar -->
  <?php include('includes/b_sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper  bg-dark">



    <h5 class="text-center">UPLOAD SECTION</h5>
    <p class= "text-center text-success fw-bold"><?php echo $success_msg['success'] ?></p>
    <p class= "text-center text-warning fw-bold"><?php echo $warning_msg['success'] ?></p>
<style>
.b{
        background-color:purple;
        color: white;
        border-radius: 3px;
    }
</style>

    
    <form action="add_audio.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid">

        <div class="mx-5">
        <div class="col-md-8 col-lg-9">
				<div class="form-group text-center">
				<label for="" class="control-label">Title</label>
				<input type="text" class="form-control form-control-sm" name="title" value="">
				</div>
				</div></div>


        <div class="mx-5">
        <div class="col-md-8 col-lg-9">
        <div class="form-group text-center">
        <label for="" class="control-label">Artist</label>
        <input type="text" class="form-control form-control-sm" name="artist" value="">
        </div>
        </div></div>

      <div class="mx-5">
      <div class="col-md-8 col-lg-9">
      <div class="form-group text-center"> 
      <label for="formFile" class="form-label"><i class="fa fa-music text-gradient-primary mr-4"></i>Your audio</label>
      <input class="form-control" type="file" id="formFile" name="upath" accept="audio/*">
      </div>
      </div></div>

      <div class=" mx-5">
      <div class="col-md-8 col-lg-9">
      <div class="form-group text-center"> 
      <label for="formFile" class="form-label">Cover image</label>
      <input class="form-control" type="file" id="formFile" name="cover" accept="image/*">
      </div>
      </div>
      </div>
      

      <div class="mx-5">
      <div class="col-md-8 col-lg-9">
      <div class="form-group text-center">
      <input class="btn btn-primary" type="submit" name="update" value="upload" >
    </div>
    </div>
    </div>

</form>
</div>
  <!-- /.content-wrapper -->
</div>
  <?php include('includes/b_footer.php'); ?>
</body>
</html>