<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>LMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Swin</b>LMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/admin.ico" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span>
            </a>
          </li>
          
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><!--read from database--></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Message</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">All Messages</a></li>
            </ul>
          </li>
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
            </a>
            <ul class="dropdown-menu">
              <li class="header">Announcements</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                      
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="all_announcements.php">All Announcements</a></li>
            </ul>
          </li>
          
          <!-- Control Sidebar Toggle Button -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-sort-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">More Setting</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                      <a href="setting.php"><i class="fa fa-gears"> Setting</i></a>
                  </li>
                  <li>
                      <a href="../logout.php"><i class="fa fa-sign-out"> Sign Out</i></a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>