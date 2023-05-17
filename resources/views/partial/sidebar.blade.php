<aside class="main-sidebar sidebar sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cybercon</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hendro</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="bi bi-grid-fill"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen_akun" class="nav-link">
                  <i class="bi bi-person-fill-gear"></i>
                  <p>
                    Manajemen Akun
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="bi bi-exclamation-octagon"></i>
                  <p>
                    Pelaporan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/pelaporan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit 1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pelaporan2" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit 2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pelaporan3" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pelaporan4" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit 4</p>
                    </a>
                  </li>
                </ul>
              </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="bi bi-journal-bookmark"></i>
              <p>
                Kegiatan Harian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kegiatanharian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kegiatanharian2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kegiatanharian3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kegiatanharian4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit 4</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>