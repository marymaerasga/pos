<nav class="sb-topnav navbar navbar-expand navbar-dark ">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">LJ MOTORGEAR POS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i class="bi bi-list"></i></button>
    
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav no-arrow ms-auto ms-md-0 me-3 me-lg-4">
        <li>
            <a class="btn btn-secondary rounded-pill me-2 text-end" style="background: #252836;" href="{{ route('orders.index') }}" role="button">POS</a>
        </li>
         <!-- Nav Item - Alerts -->
         <li>
            <a type="button" class="nav-link text-white position-relative me-2">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                  1
                </span>
              </a>
         </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i>
                 </a>
            
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#!"><i class="bi bi-card-list"></i> Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>