<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <x-application-logo class="" style="max-height: 60px !important;
        margin: auto;
        background: white" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         {{--  <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
       {{--  <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div> --}}
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.sub-category.index') }}" class="nav-link {{ (request()->is('admin/sub-category')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link {{ (request()->is('admin/product/*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>
             Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.points.index') }}" class="nav-link {{ (request()->is('admin/points/*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
             Points
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/user/*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
              <p>
             User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/user/*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
              <p>
             Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
