<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-treeview nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- Admin --}}
            @if(Session::has('adminloggedin'))
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.customerlist') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Customer List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            @endif

            {{-- Customer --}}
            @if(Session::has('customerloggedin'))
                {{-- Display customer menu --}}
                <li class="nav-item">
                    <a href="{{route('customer.dashboard')}}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('customer.profile')}}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Customer Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('customer.logout')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            @endif

            </ul>
        </nav>
    </div>
</aside>
