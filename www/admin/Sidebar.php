<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['Name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
       
        <li>
          <a href="Dashboard.php">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Officer Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Roles.php"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li><a href="Users.php"><i class="fa fa-circle-o"></i> Officer</a></li>
          </ul>
        </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Organizations Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Organizations.php"><i class="fa fa-circle-o"></i> Organizations</a></li>
            <li><a href="Categories.php"><i class="fa fa-circle-o"></i> Categories</a></li>
            
		
          </ul>
        </li>
		
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Polling Station Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="PollingStation.php"><i class="fa fa-circle-o"></i> Polling Station</a></li>
			  
            
		
          </ul>
        </li>
		  
		
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>City Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Cities.php"><i class="fa fa-circle-o"></i> Cities</a></li>
            
		
          </ul>
        </li>
          <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Companies Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Company.php"><i class="fa fa-circle-o"></i> Companies</a></li>
           
          </ul>
        </li>
		    <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Job Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="jobcategories.php"><i class="fa fa-circle-o"></i> JobCategory</a></li>
              <li><a href="Jobs.php"><i class="fa fa-circle-o"></i> Jobs</a></li>
          </ul>
        </li>-->
        <li><a href="Logout.php"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
