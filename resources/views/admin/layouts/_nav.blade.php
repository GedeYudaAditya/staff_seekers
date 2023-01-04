<header class="header body-pd" id="header">
    <div class="header_toggle"> <i class="fa-solid fa-bars" id="header-toggle"></i> </div>
    {{-- Notif --}}
    <div class="action d-flex justify-content-between align-itmes-center">
        <div class="notif text-center d-flex align-items-center"> <a href="#"><i
                    class="fa-solid fa-bell text-danger"></i></a> </div>
        <div class="header_img">
            <img src="https://i.imgur.com/hczKIze.jpg" alt="">
        </div>
    </div>
</header>
<div class="l-navbar show-nav" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class="fa-solid fa-gauge-max"></i> <span class="nav_logo-name">Staff Seekers</span>
            </a>
            <div class="nav_list">
                <a href="{{ route('admin.home') }}" class="nav_link {{ Route::is('admin.home') ? 'active' : '' }}">
                    <i class="fa-solid fa-layer-group nav_icon"></i> <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ route('admin.user') }}" class="nav_link {{ Route::is('admin.user') ? 'active' : '' }}">
                    <i class='fa-solid fa-users nav_icon'></i> <span class="nav_name">Users</span>
                </a>
                <a href="{{route('admin.transaction')}}" class="nav_link">
                    <i class='fa-solid fa-money-bill-transfer nav_icon'></i> <span class="nav_name">Transaction</span>
                </a>
                <a href="{{ route('admin.bug') }}" class="nav_link">
                    <i class="fa-solid fa-bullhorn nav_icon"></i><span class="nav_name">Bug Report</span>
                </a>
                <a href="{{ route('admin.userReports') }}" class="nav_link">
                    <i class='fa-solid fa-bullhorn nav_icon'></i> <span class="nav_name">User Report</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='fa-solid fa-file nav_icon'></i> <span class="nav_name">Export data</span>
                </a>
            </div>
        </div>
        <form action="{{ route('signout') }}" method="POST">
            @csrf
            <button type="submit" class="nav_link border-0 bg-red">
                <i class='fa-solid fa-arrow-right-from-bracket nav_icon'></i> <span class="nav_name">SignOut</span>
            </button>
        </form>
    </nav>
</div>
