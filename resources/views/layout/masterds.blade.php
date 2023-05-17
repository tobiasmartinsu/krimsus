<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cyberconvenient</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">

  {{-- Tables --}}
  <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <link href="{{asset('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"/>
  <link href="{{asset('/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
  <link href="{{asset('/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
  <link href="{{asset('/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
  <link href="{{asset('/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
  <link href="{{asset('/vendor/simple-datatables/style.css')}}" rel="stylesheet" />
  


  @stack('styles')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <!-- Right navbar links -->
    @include('partial.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title') </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <div class="content">@yield('isi') </div>
    <section class="content">

      <!-- Default box -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Cyberconvenient</b>
    </div>
    <strong>Ditkrimsus Polda Jateng
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('/vendor/php-email-form/validate.js')}}"></script>

@stack('scripts')

</body>
</html>
