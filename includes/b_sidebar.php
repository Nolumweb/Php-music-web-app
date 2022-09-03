<aside class="main-sidebar sidebar-dark-navy bg-black elevation-4">
    <div class="dropdown">
   	<a class="brand-link bg-black" data-toggle="dropdown" aria-expanded="true">
        <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" 
        style="width: 38px;height:50px;font-size: 2rem"><b><i class="fa fa-headphones-alt text-gradient-primary"></i></b></span>
        <span class="brand-text font-weight-light  text-gradient-primary"><i>User</i></span>
      </a>
    </div>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./index.php" class="nav-link nav-home">
              <i class="nav-icon fas fa-home text-gradient-primary"></i>
              <p>
                Home
              </p>
            </a>
          </li> 
          
          <li class="nav-item">
               <a href="dashboard.php" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-users nav-icon  text-gradient-primary"></i>
                  <p>My dashboard</p>
                </a>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_music nav-view_music">
              <i class="nav-icon fa fa-music text-gradient-primary"></i>
              <p>
                Musics
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="add_audio.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">Upload music</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="view_all.php" class=" ml-1 nav-link nav-music_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p class="">All upload</p>
                </a>
              </li>
            </ul>
          
          
        </ul>
      </nav>
    </div>
  </aside>