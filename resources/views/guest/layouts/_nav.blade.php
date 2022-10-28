<nav class="navbar navbar-expand-lg  bg-light shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand me-costum" href="#">
            <img src="{{ asset('/img/logo.png') }}" alt="logo" width="70" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="#">Staff</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
            @auth
                <div class="btn-lg">
                    <form action="{{ route('signout') }}" method="POST">
                        <a href="/dashboard" class="btn btn-outline-danger me-2">Manage</a>
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            @else
                <div class="btn-lg">
                    <a href="{{ route('Auth') }}" class="btn btn-outline-danger me-2">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-danger">Sign Up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
