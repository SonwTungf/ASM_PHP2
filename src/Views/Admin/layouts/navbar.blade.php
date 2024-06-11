<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="img/logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class='mm-active'>
            <a href="{{ url('admin/') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class='mm-active'>
            <a href="{{ url('admin/users') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Users</span>
            </a>
        </li>
        <li class='mm-active'>
            <a href="{{ url('admin/products') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Products</span>
            </a>
        </li>
        <li class='mm-active'>
            <a href="{{ url('admin/categories') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/7.svg') }}" alt>
                </div>
                <span>Categories</span>
            </a> 
        </li>
        <li class='mm-active'>
            <a href="{{ url('') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/7.svg') }}" alt>
                </div>
                <span>Trang Chu</span>
            </a> 
        </li>
    </ul>
</nav>
