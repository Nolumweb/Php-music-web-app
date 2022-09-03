
 <?php 
 include ('../config.php');
 if(isset($_GET['del'])){
 $delete_id = $_GET['del'];

 $del_sql ="DELETE FROM `account` WHERE username = '$delete_id'";
 $query = mysqli_query($conn, $del_sql);
 if($query)
 echo "<script>alert('User Deleted')</script>";
 echo "<script>window.open('admin_dashboard.php', '_self')</script>";
  header('location:all_users.php');
}

?>