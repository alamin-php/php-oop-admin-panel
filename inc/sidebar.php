  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
                  <?php 
                    if($userImage){?>
                        <img src="<?php echo $userImage; ?>" class="img-circle" alt="User Image">
                    <?php    
                    }else{
                        ?>
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        
                        <?php
                    }
                  ?>
              </div>
              <div class="pull-left info">
                  <p><?php echo $userName; ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i>                  
                  <?php 
                    if($userRole == '0'){
                      echo "Admin";
                    }elseif($userRole == '1'){
                      echo "Editor";
                    }elseif($userRole == '2'){
                      echo "Author";
                    }elseif($userRole == '3'){
                      echo "General User";
                    }
                  ?></a>
              </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li class="<?php if($fm->activeLink() == 'index' ){echo 'active';} ?>">
                  <a href="index.php">
                      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                      <span class="pull-right-container">
                      </span>
                  </a>
              </li>
              <?php 
                if($userRole == '0'){
              ?>
              <li
                  class="treeview <?php if($fm->activeLink() == 'userlist' || $fm->activeLink() == 'useradd' ){echo 'active menu-open';} ?>">
                  <a href="#">
                      <i class="fa fa-users"></i> <span>Users</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?php if($fm->activeLink() == 'useradd' ){echo 'active';} ?>">
                          <a href="useradd.php"><i class="fa fa-circle-o"></i>Add User</a>
                      </li>
                      <li class="<?php if($fm->activeLink() == 'userlist' ){echo 'active';} ?>">
                          <a href="userlist.php"><i class="fa fa-circle-o"></i> View User</a>
                        </li>
                  </ul>
              </li>
              <?php } ?>
              <li
                  class="<?php if($fm->activeLink() == 'brandlist' || $fm->activeLink() == 'brandadd' ){echo 'active';} ?>">
                  <a href="brandlist.php">
                      <i class="fa fa-tags"></i> <span>Brand</span>
                  </a>
              </li>
              <li
                  class="<?php if($fm->activeLink() == 'categorylist' || $fm->activeLink() == 'categoryadd' ){echo 'active';} ?>">
                  <a href="categorylist.php">
                      <i class="fa fa-files-o"></i> <span>Category</span>
                  </a>
              </li>
              <li
                  class="<?php if($fm->activeLink() == 'devicelist' || $fm->activeLink() == 'deviceadd' ){echo 'active';} ?>">
                  <a href="devicelist.php">
                      <i class="fa fa-files-o"></i> <span>Device</span>
                  </a>
              </li>
              <li
                  class="<?php if($fm->activeLink() == 'productlist' || $fm->activeLink() == 'productadd' ){echo 'active';} ?>">
                  <a href="productlist.php">
                      <i class="fa fa- fa-cube"></i> <span>Products</span>
                  </a>
              </li>
              <li class="<?php if($fm->activeLink() == 'companyadd' ){echo 'active';} ?>">
                  <a href="companyadd.php">
                      <i class="fa fa-files-o"></i> <span>Company</span>

                  </a>
              </li>
              <li class="<?php if($fm->activeLink() == 'profile' ){echo 'active';} ?>">
                  <a href="profile.php">
                      <i class="fa fa-user"></i> <span>Profile</span>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <i class="fa fa-wrench"></i> <span>Setting</span>
                  </a>
              </li>
              <li>
                  <a onclick="return confirm('Are you sure to LOGOUT?')" href="?action=logout">
                      <i class="fa fa-sign-out"></i> <span>Logout</span>
                  </a>
              </li>
          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>