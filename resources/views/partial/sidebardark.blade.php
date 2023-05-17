<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="../../index.html"><img src="{{ asset('/img/logorev.png') }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img
                src="{{ asset('/img/logo.png') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if(auth()->user())
            @if(auth()->user()->level == 'Admin')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/manajemen_akun">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-edit"></i>
                    </span>
                    <span class="menu-title">Manajemen Akun</span>
                </a>
            </li>
            @endif
        @endif

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open"></i>
                </span>
                <span class="menu-title">Pelaporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 1 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                            <li class="nav-item"> <a class="nav-link" href="/pelaporan">Unit 1</a></li>
                        @endif
                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 2 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                            <li class="nav-item"> <a class="nav-link" href="/pelaporan2">Unit 2</a></li>
                        @endif

                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 3 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                            <li class="nav-item"> <a class="nav-link" href="/pelaporan3">Unit 3</a></li>
                        @endif

                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 4 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                            <li class="nav-item"> <a class="nav-link" href="/pelaporan4">Unit 4</a></li>
                        @endif

                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-notebook"></i>
                </span>
                <span class="menu-title">Kegiatan Harian</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 1 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                        <li class="nav-item"> <a class="nav-link" href="/kegiatanharian"> Unit 1 </a></li>
                        @endif
                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 2 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                        <li class="nav-item"> <a class="nav-link" href="/kegiatanharian2"> Unit 2 </a></li>
                        @endif
                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 3 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                        <li class="nav-item"> <a class="nav-link" href="/kegiatanharian3"> Unit 3 </a></li>
                        @endif
                    @endif
                    @if (auth()->user())
                        @if (auth()->user()->unit_id == 4 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                        <li class="nav-item"> <a class="nav-link" href="/kegiatanharian4"> Unit 4 </a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </li>
    </ul>
</nav>
