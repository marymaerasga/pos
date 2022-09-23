<div id="layoutSidenav_nav">
        <nav class="sb-sidenav  sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu ">
                <div class="nav">
                    <img src="{{ asset('assets/images/Avatar.png') }}" alt="" width="100" height="100" class="rounded mx-auto d-block mt-3">
                    <h6 class="text-center mt-2 "> </h6>
                        <!--digital clock start-->
                        <div class="d-flex justify-content-center mt-3">
            
                            <body onload="initClock()">
                            <div class="datetime text-center">
                                <div class="date text-light fs-6">
                                <span id="dayname">Day</span>,
                                <span id="month">Month</span>
                                <span id="daynum">00</span>,
                                <span id="year">Year</span>
                                </div>
                                <div class="time text-light">
                                <span id="hour">00</span>:
                                <span id="minutes">00</span>:
                                <span id="seconds">00</span>
                                <span id="period">AM</span>
                                </div>
                            </div>
                        </div>
                        <!--digital clock end-->
                        <hr class="dropdown-divider mt-2">
                    <ul class="list-unstyled">
                        <li>
                            <a class="nav-link {{ Request::is('home') ? 'active':'' }}" href="{{ route('home') }}">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-speedometer"></i></div>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('orders') ? 'active':'' }}" href="{{ route('orders.index') }}">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-calculator"></i></div>
                                <span>POS</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('customers') ? 'active':'' }}" href="{{ route('customers.index') }}">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-people"></i></div>
                                <span>Customers</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('products') ? 'active':'' }}" href="{{ route('products.index') }}">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-archive"></i></div>
                                <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-layers-fill"></i></div>
                                <span>Stocks</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-clipboard-data"></i></div>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-arrow-return-left"></i></div>
                                <span>Product Return</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" type = button href="#">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-graph-up"></i></div>
                                <span>Suppliers</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link {{ Request::is('users') ? 'active':'' }}" type = button href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon me-2"><i class="bi bi-sliders"></i></div>
                                <span>User Management</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear"></i></div>
                                <span>Setting</span>
                            </a>
                        </li>
                        </ul>
                   
                 
     
        </nav>
    </div>