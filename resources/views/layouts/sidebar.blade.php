
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Test</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
        Table List
    </div>
    
    <li class="nav-item {{ Request::is('coa*') ? 'active' : '' }}">
        <a class="nav-link" href="/coa">
            <i class="fa-solid fa-user"></i>
            <span>Chart Of Accounts</span></a>
    </li>

    <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}">
        <a class="nav-link" href="/category">
            <i class="fa-solid fa-tag"></i>
            <span>Categories</span></a>
    </li>

    <li class="nav-item {{ Request::is('transaction*') ? 'active' : '' }}">
        <a class="nav-link" href="/transaction">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Transactions</span></a>
    </li>

    <li class="nav-item {{ Request::is('report') ? 'active' : '' }}">
        <a class="nav-link" href="/report">
            <i class="fa-solid fa-box-archive"></i>
            <span>Reports</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
