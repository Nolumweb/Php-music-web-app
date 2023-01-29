<aside class="main-sidebar sidebar-dark-navy bg-black elevation-4">
    <div class="dropdown">
   	<a class="brand-link bg-black" data-toggle="dropdown" aria-expanded="true">
        <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" 
        style="width: 38px;height:50px;font-size: 2rem"><b><i class="fa fa-headphones-alt text-gradient-primary"></i></b></span>
        <span class="brand-text font-weight-light  text-gradient-primary"><i>
        <?php echo ucwords($_SESSION['ROLE'])?>
        </i></span>
      </a>
    </div>  


    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item dropdown">
            <a href="./a_dasbord.php" class="nav-link nav-home">
              <i class="nav-icon fas fa-home text-gradient-primary"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>    
          <?php if($_SESSION['ROLE'] == 'admin'){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_music nav-view_music">
            <i class="fas fa-users nav-icon  text-gradient-primary"></i>
              <p>
              Manage Staff & User 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="all_users.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Manage All Users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="all_staffs.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Manage ALL Staffs</p>
                </a>
              </li>
            </ul>
            <?php } ?>
            <?php if ($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'moderator') { ?> 
           
              <li class="nav-item">
            <a href="" class="nav-link nav-is-tree nav-edit_music nav-view_music">
              <i class="nav-icon fa fa-music text-gradient-primary"></i>
              <p>
                Music Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="accept.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Manage Uploads</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="all_approved_audio.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Approved History</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="all_pend_audio.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Pend History</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="ad_add_audio.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Upload music</p>
                </a>
              </li>
          </ul>      
        </ul>
        <?php } ?>
      </nav>
    </div>
  </aside>
  <?php
            if ($_SESSION['ROLE'] == "admin") {
            $query = "SELECT * FROM admins";
             }else{
            $role = $_SESSION['ROLE'];
            $query = "SELECT * FROM admins WHERE role = '$role'";
             }
  ?>   
          