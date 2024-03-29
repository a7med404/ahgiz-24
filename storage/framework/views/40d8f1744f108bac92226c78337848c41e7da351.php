    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="modules/master/images/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo e(auth()->user()->name); ?></p>
              <a href="#">
                <i class="fa fa-circle text-success"></i> متصل الان
              </a><p>shahab</p>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="بحث...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="<?php echo e(route('cpanel')); ?>">
                <i class="fa fa-dashboard"></i>
                <span>الرئيسية</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">
                    <i class="fa fa-home"></i>
                  </small>
                </span>
              </a>
            </li>

            <li class="header">قسم الحجوزات و التذاكر</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar text-red"></i> <span><?php echo e(__('home/sidebar.reservations')); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('reservations.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> <?php echo e(__('home/sidebar.all_reservations')); ?></a></li>
                <li><a href="<?php echo e(route('reservations.pendding')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.pendding-reservations')); ?></a></li>
                <li><a href="<?php echo e(route('reservations.done')); ?>"><i class="fa fa-circle-o text-success"></i> <?php echo e(__('home/sidebar.done-reservations')); ?></a></li>
                <li><a href="<?php echo e(route('reservations.conceled')); ?>"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.conceled')); ?></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar text-red"></i> <span><?php echo e(__('home/sidebar.planeReservation')); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('planeReservations.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> <?php echo e(__('home/sidebar.all_reservations')); ?></a></li>
                <li><a href="<?php echo e(route('planeReservations.pendding')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.pendding-reservations')); ?></a></li>
                <li><a href="<?php echo e(route('planeReservations.done')); ?>"><i class="fa fa-circle-o text-success"></i> <?php echo e(__('home/sidebar.done-reservations')); ?></a></li>
                <li><a href="<?php echo e(route('planeReservations.conceled')); ?>"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.conceled')); ?></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-yellow"></i> <span><?php echo e(__('home/sidebar.trips')); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('trips.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> <?php echo e(__('home/sidebar.all_trips')); ?></a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.trips')); ?>

                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('trips.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_trips')); ?></a></li>
                    <li><a href="<?php echo e(route('trips.previous')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_previous_trips')); ?></a></li>
                    <li><a href="<?php echo e(route('trips.next')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_next_trip')); ?></a></li>
                    <li><a href="<?php echo e(route('trips.create')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.add_trip')); ?></a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-yellow"></i> <span><?php echo e(__('home/sidebar.customers')); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('customers.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> <?php echo e(__('home/sidebar.all_customers')); ?></a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.customers')); ?>

                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('customers.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_customers')); ?></a></li>
                    <li><a href="<?php echo e(route('customers.create')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.add_customer')); ?></a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
                          <a href="#">
                            <i class="fa fa-users text-yellow"></i> <span><?php echo e(__('home/sidebar.tickets')); ?></span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?php echo e(route('ticket.index')); ?>"><i class="fa fa-circle-o text-aqua"></i>
                                <?php echo e(__('home/sidebar.all_tickets')); ?></a></li>

                          </ul>
                        </li>

            
            <li class="header">قسم الشركات</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-industry text-aqua"></i> <span><?php echo e(__('home/sidebar.all_companies')); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('companies.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> كل الشركات</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.companies')); ?>

                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('companies.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_companies')); ?></a></li>
                    <li><a href="<?php echo e(route('companies.create')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('home/sidebar.add_company')); ?></a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-yellow"></i> <?php echo e(__('home/sidebar.contacts')); ?>

                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('permissions.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_contacts')); ?></a></li>
                    <li><a href="<?php echo e(route('permissions.create')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('home/sidebar.add_contact')); ?></a></li>
                  </ul>
                </li>
              </ul>
            </li>
            
            <li>
              <a href="#"><i class="fa fa-circle-o text-red"></i> <?php echo e(__('home/sidebar.stations')); ?>

                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('stations.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_stations')); ?></a></li>
                
              </ul>
            </li>
            
            <li class="header">قسم الادارة</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-aqua"></i> <span>المستخدمين</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> كل المستخدمين</a></li>
                <li><a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_roles')); ?></a></li>
                <li><a href="<?php echo e(route('permissions.index')); ?>"><i class="fa fa-circle-o"></i><?php echo e(__('home/sidebar.all_permissions')); ?></a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears text-aqua"></i> <span><?php echo e(__('home/sidebar.settings')); ?> </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('settings.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> <?php echo e(__('home/sidebar.settings')); ?></a></li>
                <li><a href="<?php echo e(route('testimonials.index')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(__('home/sidebar.all_testimonials')); ?></a></li>
              </ul>
            </li>

            <li class="header">قسم المــدن</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-aqua"></i> <span> المـــدن</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('cities.index')); ?>"><i class="fa fa-circle-o text-aqua"></i> كل المـــدن</a></li>

              </ul>
            </li>
            <li class="header m-b-20"></li>
          </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/resources/views/cpanel/partials/sidebar-menu.blade.php ENDPATH**/ ?>