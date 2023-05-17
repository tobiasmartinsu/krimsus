@extends('layout.krimsus')
@section('title')
Dashboard
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <!-- Card Jumlah Anggota -->
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="text-muted font-weight-normal my-3">Jumlah Anggota</h6>
                            <h3 class="">{{ $user }}</h3>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Card Jumlah Laporan -->
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="text-muted font-weight-normal my-3">Total Laporan</h6>
                            <h3 class="">{{ $jmllaporan }}</h3>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Card Jumlah Kegiatan -->
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="text-muted font-weight-normal my-3">Total Kegiatan</h6>
                            <h3 class="">{{ $jmlkegiatan }}</h3>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <!-- Chart Jenis Aduan  -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jenis Aduan</h5>

                    <div id="barChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                                series: [{
                                    name: 'Jumlah',
                                    data: JSON.parse('{{ $output }}')
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 4,
                                        horizontal: true,
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                xaxis: {
                                    categories: ['Kesusilaan', 'Perjudian', 'Pencemaran Nama Baik', 'Ancaman Pemerasan', 'Penipuan', 'Ujaran Kebencian', 'Ancaman Kekerasan', 'Akses Ilegal Peretasan',
                                        'Penyadapan Ilegal', 'Gangguan terhadap Data', 'Gangguan terhadap Sistem', 'Penyalahgunaan Perangkat', 'Manipulasi Data', 'Hoax', 'Investasi', 'Pinjol'
                                    ],
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Bar Chart -->
                </div>
            </div>
        </div>


        <!-- Chart Unit -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tindak Lanjut</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: JSON.parse('{{ $output_unit }}'),
                    chart: {
                      height: 350,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Unit 1', 'Unit 2', 'Unit 3', 'Unit 4']
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>


        @endsection