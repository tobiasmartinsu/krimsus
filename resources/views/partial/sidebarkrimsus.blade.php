<ul class="sidebar-nav" id="sidebar-nav">
    <!-- Dashboard Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <!-- Manajemen Akun Nav -->
    @if(auth()->user())
        @if(auth()->user()->level == 'Admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/manajemen_akun">
                    <i class="bi bi-person-fill-gear"></i>
                    <span>Manajemen Akun</span>
                </a>
            </li>
        @endif
    @endif

    <!-- Pelaporan Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-exclamation-octagon"></i><span>Pelaporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @if (auth()->user())
            @if (auth()->user()->unit_id == 1 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                <li>
                    <a href="/pelaporan">
                        <i class="bi bi-circle"></i><span>Unit 1</span>
                    </a>
                 </li>
            @endif
        @endif

        @if (auth()->user())
            @if (auth()->user()->unit_id == 2 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                <li>
                    <a href="/pelaporan2">
                        <i class="bi bi-circle"></i><span>Unit 2</span>
                    </a>
                </li>
            @endif
        @endif

        @if (auth()->user())
            @if (auth()->user()->unit_id == 3 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                <li>
                    <a href="/pelaporan3">
                        <i class="bi bi-circle"></i><span>Unit 3</span>
                    </a>
                </li>
            @endif
        @endif

        @if (auth()->user())
            @if (auth()->user()->unit_id == 4 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                <li>
                    <a href="/pelaporan4">
                        <i class="bi bi-circle"></i><span>Unit 4</span>
                    </a>
                </li>
            @endif
        @endif
        </ul>
    </li>



    <!-- Kegiatan Harian Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-bookmark"></i><span>Kegiatan Harian</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

            @if(auth()->user())
                @if(auth()->user()->unit_id == 1 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                    <li>
                        <a href="/kegiatanharian">
                            <i class="bi bi-circle"></i><span>Unit 1</span>
                        </a>
                    </li>
                @endif
            @endif

            @if (auth()->user())
                @if (auth()->user()->unit_id == 2 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                    <li>
                        <a href="/kegiatanharian2">
                            <i class="bi bi-circle"></i><span>Unit 2</span>
                        </a>
                    </li>
                @endif
            @endif

            @if (auth()->user())
                @if (auth()->user()->unit_id == 3 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                    <li>
                        <a href="/kegiatanharian3">
                            <i class="bi bi-circle"></i><span>Unit 3</span>
                        </a>
                    </li>
                @endif
            @endif

            @if (auth()->user())
                @if (auth()->user()->unit_id == 4 || auth()->user()->level == 'Admin' || auth()->user()->jabatan == 'Kasubdit')
                    <li>
                        <a href="/kegiatanharian4">
                            <i class="bi bi-circle"></i><span>Unit 4</span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </li>
    <!-- Prestasi Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/prestasi">
            <i class="bi bi-grid-fill"></i>
            <span>Prestasi Anggota</span>
        </a>
    </li>
</ul>
