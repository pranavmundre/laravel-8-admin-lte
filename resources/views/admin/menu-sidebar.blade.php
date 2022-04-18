        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user_list') }}" class="nav-link {{ Request::routeIs('admin.user_list') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user_add') }}" class="nav-link {{ Request::routeIs('admin.user_add') ? 'active' : '' }}">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Extra
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('admin.my_profile') }}" class="nav-link {{ Request::routeIs('admin.my_profile') ? 'active' : '' }}">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.change_password') }}" class="nav-link {{ Request::routeIs('admin.change_password') ? 'active' : '' }}">
                  <i class="fa fa-key nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <a href="javascript:{}" class="nav-link" >
              <form id="logout-form" method="POST" action="{{ route('admin.logout') }}" onclick="this.submit();">
                @csrf
                  <i class="nav-icon fas fa-lock"></i>
                  <p>
                    Logout
                        {{-- <button type="submit" class=" " style="color: inherit;">Logout</button>    --}}
                  </p>
              </form>
            </a>
          </li>
        </ul>
