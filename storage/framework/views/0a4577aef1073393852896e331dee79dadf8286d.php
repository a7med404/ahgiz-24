

<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(route('adminCpanel')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>24</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>24</b> ahjez</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="modules/master/images/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo e(auth()->user()->username); ?></span>
            </a>
            <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="<?php echo e(asset('modules/master/images/user.png')); ?>" class="img-circle" alt="User Image">
                <p>
                    <?php echo e(auth()->user()->name); ?> - مدير
                    <small>عضو منذ. <?php echo e(auth()->user()->created_at->diffForHumans()); ?></small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
                </div>
                <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat"> الصفحة الشخصية </a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat"> تسجيل خروج </a>
                </div>
            </li>
            </ul>
        </li>
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <li><!-- start message -->
                    <a href="#">
                    <div class="pull-left">
                        <img src="modules/master/images/user.png" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <!-- end message -->
                <li>
                    <a href="#">
                    <div class="pull-left">
                        <img src="modules/master/images/user3-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="pull-left">
                        <img src="modules/master/images/user4-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="pull-left">
                        <img src="modules/master/images/user3-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="pull-left">
                        <img src="modules/master/images/user4-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <li>
                    <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                    page and may cause design problems
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                </li>
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
            </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                    <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                        </div>
                    </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                    <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% Complete</span>
                        </div>
                    </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                    <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                    <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">80% Complete</span>
                        </div>
                    </div>
                    </a>
                </li>
                <!-- end task item -->
                </ul>
            </li>
            <li class="footer">
                <a href="#">View all tasks</a>
            </li>
            </ul>
        </li>
        
        
        </ul>
    </div>

    </nav>
</header><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/resources/views/adminCpanel/partials/header.blade.php ENDPATH**/ ?>