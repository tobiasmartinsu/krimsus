<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CYBERCON</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/dark/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/dark/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/dark/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('img/krimsus.png')}}" />
  </head>
  <body>
    <div class=" container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      @include("partial.sidebardark")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        @include("partial.navbardark")
        <!-- partial -->
        @yield('content')
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Ditkrimsus Polda Jateng</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Cyberconvenient</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="{{asset('/dark/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('/dark/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('/dark/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('/dark/assets/js/misc.js')}}"></script>
    <script src="{{asset('/dark/assets/js/settings.js')}}"></script>
    <script src="{{asset('/dark/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
