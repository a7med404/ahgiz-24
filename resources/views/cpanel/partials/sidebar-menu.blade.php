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
              <p>{{ auth()->user()->name }}</p>
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
              <a href="{{route('cpanel')}}">
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
                <i class="fa fa-calendar text-red"></i> <span>{{ __('home/sidebar.reservations') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('reservations.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.all_reservations') }}</a></li>
                <li><a href="{{ route('reservations.pendding') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.pendding-reservations') }}</a></li>
                <li><a href="{{ route('reservations.done') }}"><i class="fa fa-circle-o text-success"></i> {{ __('home/sidebar.done-reservations') }}</a></li>
                <li><a href="{{ route('reservations.conceled') }}"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.conceled') }}</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar text-red"></i> <span>{{ __('home/sidebar.planeReservation') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('planeReservations.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.all_reservations') }}</a></li>
                <li><a href="{{ route('planeReservations.pendding') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.pendding-reservations') }}</a></li>
                <li><a href="{{ route('planeReservations.done') }}"><i class="fa fa-circle-o text-success"></i> {{ __('home/sidebar.done-reservations') }}</a></li>
                <li><a href="{{ route('planeReservations.conceled') }}"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.conceled') }}</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-yellow"></i> <span>{{ __('home/sidebar.trips') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('trips.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.all_trips') }}</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.trips') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('trips.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_trips') }}</a></li>
                    <li><a href="{{ route('trips.previous') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_previous_trips') }}</a></li>
                    <li><a href="{{ route('trips.next') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_next_trip') }}</a></li>
                    <li><a href="{{ route('trips.create') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.add_trip') }}</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-yellow"></i> <span>{{ __('home/sidebar.customers') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('customers.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.all_customers') }}</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.customers') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('customers.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_customers') }}</a></li>
                    <li><a href="{{ route('customers.create') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.add_customer') }}</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
                          <a href="#">
                            <i class="fa fa-users text-yellow"></i> <span>{{ __('home/sidebar.tickets') }}</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="display: none;">
                            <li><a href="{{ route('ticket.index') }}"><i class="fa fa-circle-o text-aqua"></i>
                                {{ __('home/sidebar.all_tickets') }}</a></li>
                           
                          </ul>
                        </li>

            {{-- @if (auth()->user()->hasRole('admin')) --}}
            <li class="header">قسم الشركات</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-industry text-aqua"></i> <span>{{ __('home/sidebar.all_companies') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('companies.index') }}"><i class="fa fa-circle-o text-aqua"></i> كل الشركات</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.companies') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('companies.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_companies') }}</a></li>
                    <li><a href="{{ route('companies.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_company') }}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-yellow"></i> {{ __('home/sidebar.contacts') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_contacts') }}</a></li>
                    <li><a href="{{ route('permissions.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_contact') }}</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            {{-- @endif --}}
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bus text-red"></i> <span>{{ __('home/sidebar.vehicles') }}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.all_vehicles') }}</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.vehicles') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_vehicles') }}</a></li>
                    <li><a href="{{ route('vehicles.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_vehicle') }}</a></li>
                    </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.stations') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('stations.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_stations') }}</a></li>
                    <li><a href="{{ route('stations.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_station') }}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.cities') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('cities.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.cities') }}</a></li>
                    <li><a href="{{ route('cities.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_') }}</a></li>
                    <li><a href="{{ route('cities.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_cities') }}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-yellow"></i> {{ __('home/sidebar.routes') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('routes.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_routes') }}</a></li>
                    <li><a href="{{ route('routes.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_route') }}</a></li>
                  </ul>
                </li>
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
                <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o text-aqua"></i> كل المستخدمين</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.roles') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_roles') }}</a></li>
                    <li><a href="{{ route('roles.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_role') }}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-yellow"></i> {{ __('home/sidebar.permissions') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_permissions') }}</a></li>
                    <li><a href="{{ route('permissions.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_permission') }}</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears text-aqua"></i> <span>{{ __('home/sidebar.settings') }} </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="{{ route('settings.index') }}"><i class="fa fa-circle-o text-aqua"></i> {{ __('home/sidebar.settings') }}</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o text-red"></i> {{ __('home/sidebar.testimonials') }} 
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('testimonials.index') }}"><i class="fa fa-circle-o"></i> {{ __('home/sidebar.all_testimonials') }}</a></li>
                    <li><a href="{{ route('testimonials.create') }}"><i class="fa fa-circle-o"></i>{{ __('home/sidebar.add_testimonial') }}</a></li>
                  </ul>
                </li>
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
                <li><a href="{{ route('cities.index') }}"><i class="fa fa-circle-o text-aqua"></i> كل المـــدن</a></li>
  
              </ul>
            </li>
            <li class="header m-b-20"></li>
          </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
