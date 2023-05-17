

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>CYBERCON</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('/krimsus/img/krimsus.png')}}" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/krimsus/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/krimsus/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('/krimsus/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/krimsus/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
    <link href="{{ asset('/krimsus/vendor/quill/quill.bubble.css')}}" rel=" stylesheet" />
    <link href="{{ asset('/krimsus/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
    <link href="{{ asset('/krimsus/vendor/simple-datatables/style.css')}}" rel="stylesheet" />


    <!-- Template Main CSS File -->
    <link href="{{ asset('/krimsus/css/style.css')}}" rel="stylesheet" />
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        @include("partial.navbarkrimsus")
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        @include("partial.sidebarkrimsus")
    </aside>


    <main id="main" class="main">
        <div class="pagetitle">
            <h1>@yield("title")</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                @yield("content")
            </div>
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            © Copyright <strong><span>CYBERCON</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/krimsus/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('/krimsus/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/krimsus/js/main.js')}}"></script>

    @yield("script")


    <!-- SweetAlert2
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#submit', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        })
    </script> -->
    @include('sweetalert::alert')

</body>

</html>