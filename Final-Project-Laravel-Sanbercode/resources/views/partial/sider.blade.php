<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      @auth
      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      @endauth

      @guest
      <a href="#" class="d-block">Belum Login</a>
      @endguest
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="{{ route('/') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      @auth
      <li class="nav-item">
        <a href="{{ route('category') }}" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      @endauth

      <li class="nav-item">
        <a href="{{ route('book.index') }}" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Buku
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th "></i>
          <p>
            Table
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('table') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Table</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('data-table') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Table</p>
            </a>
          </li>
        </ul>
      </li>


      @auth
      <li class="nav-item bg-danger">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
      @endauth

      @guest
      <li class="nav-item bg-info">
        <a href="{{ route('login') }}" class="nav-link">
          <p>
            Login
          </p>
        </a>
      </li>
      @endguest


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>