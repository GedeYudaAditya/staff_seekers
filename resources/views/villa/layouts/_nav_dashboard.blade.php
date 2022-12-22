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
                <a href="{{ route('villa.profile') }}"
                    class="nav_link {{ Route::is('villa.profile') ? 'active' : '' }}">
                    <i class="fa-solid fa-user nav_icon"></i> <span class="nav_name">Profile</span>
                </a>
                <a href="{{ route('villa.lowongan') }}"
                    class="nav_link {{ Route::is('villa.lowongan') ? 'active' : '' }}">
                    <i class='fa-solid fa-plus nav_icon'></i> <span class="nav_name">Pasang Lowongan</span>
                </a>
                <a href="{{ route('villa.pendaftar') }}"
                    class="nav_link {{ Route::is('villa.pendaftar') ? 'active' : '' }}">
                    <i class='fa-solid fa-users nav_icon'></i> <span class="nav_name">Kelola Pendaftar</span>
                </a>
                {{-- <a href="#" class="nav_link">
                    <i class="fa-solid fa-file-contract nav_icon"></i><span class="nav_name">Contract</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='fa-solid fa-bullhorn nav_icon'></i> <span class="nav_name">User Report</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='fa-solid fa-file nav_icon'></i> <span class="nav_name">Export data</span>
                </a> --}}
            </div>
        </div>
        {{-- <form action="{{ route('signout') }}" method="POST">
            @csrf
            <button type="submit" class="nav_link border-0 bg-red">
                <i class='fa-solid fa-arrow-right-from-bracket nav_icon'></i> <span class="nav_name">SignOut</span>
            </button>
        </form> --}}
    </nav>
</div>