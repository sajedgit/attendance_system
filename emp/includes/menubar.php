<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-bottom: 25px;">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">View</li>
        
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <li><a href="employee.php"><i class="fa fa-calendar"></i> <span>Employee List</span></a></li>
       
        <li class="treeview">
            <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Leave</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="leave_apply_page.php"><i class="fa fa-circle-o"></i> Apply For Leave</a></li>
                <li><a href="leave_request_list_applicant.php"><i class="fa fa-circle-o"></i> Your Applications</a></li>
                <li><a href="leave_request_list.php"><i class="fa fa-circle-o"></i> Pending For Your Approval</a></li>
            </ul>
        </li>       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>