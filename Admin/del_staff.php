
 <?php 
 include ('../config.php');
 if(isset($_GET['del'])){
 $delete_id = $_GET['del'];

 $del_sql ="DELETE FROM `admins` WHERE `id` = $delete_id";
 $query = mysqli_query($conn, $del_sql);
 if($query)
 echo "<script>alert('Staff Deleted')</script>";
 echo "<script>window.open('all_staffs.php', '_self')</script>";
  header('location:all_staffs.php');
}

?>