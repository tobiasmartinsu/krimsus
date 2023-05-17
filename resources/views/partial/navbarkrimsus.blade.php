<div class="d-flex align-items-center justify-content-between">
    <a href="admin-dashboard.html" class="logo d-flex align-items-center">
        <img src="{{ asset('/krimsus/img/krimsus.png')}}" alt="" />
        <span class="d-none d-lg-block text-danger">CYBERCON</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div>


<!-- Profile in Navbar -->
<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <img src="{{ asset('/krimsus/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle" /> -->
                @auth
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                @endauth

                @guest
                <span class="d-none d-md-block dropdown-toggle ps-2">Belum Login</span>
                @endguest
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">

                    @auth
                    <span>{{ Auth::user()->level }}</span>
                    @endauth

                    @guest
                    <span>Guest</span>
                    @endguest

                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>

                <li>
                    @auth
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                    </a>
                    @endauth

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @guest
                    <a class="dropdown-item d-flex align-items-center" href="/login">
                        <i class="bi bi-arrow-return-right"></i> <span>Login</span>
                    </a>
                    @endguest

                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="/editpassword">
                        <i class="bi bi-gear"></i> <span>Ganti Password</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>