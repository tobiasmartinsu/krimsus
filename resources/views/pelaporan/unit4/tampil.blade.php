@extends('layout.krimsus')
@section('title')
Halaman Laporan Unit 4
@endsection

@section('content')


<div class="card">
    <div class="card-body">
        <a href="/pelaporan4/create" class="btn btn-primary btn-sm my-3">Tambah Pelaporan</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No</th>
                        <th scope="col" width="100px" style="text-align: center;">Unit</th>
                        <th scope="col" width="200px" style="text-align: center;">Nama Aduan</th>
                        <th scope="col" style="text-align: center;">Jenis Aduan</th>
                        <th scope="col" width="200px" style="text-align: center;">Laporan Polisi</th>
                        <th scope="col" style="text-align: center;">Pelapor</th>
                        <th scope="col" style="text-align: center;">Terlapor</th>
                        <th scope="col" width="200px" style="text-align: center;">Tanggal</th>
                        <th scope="col" width="300px" style="text-align: center;">Uraian</th>
                        <th scope="col" width="100px" style="text-align: center;">File</th>
                        <th scope="col" width="100px" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelaporan4 as $key=>$value)
                    <tr>
                        <td style="text-align: center;">{{$key + 1}}</td>
                        <td style="text-align: center;">{{$value->unit->nama_unit}}</td>
                        <td style="text-align: center;">{{$value->nama_aduan}}</td>
                        <td style="text-align: center;">{{$value->jenis_pelaporan->nama_pelaporan ?? '-'}}</td>
                        <td style="text-align: center;">{{$value->laporan_polisi}}</td>
                        <td style="text-align: center;">{{$value->pelapor}}</td>
                        <td style="text-align: center;">{{$value->terlapor}}</td>
                        <td style="text-align: center;">{{$value->tanggal}}</td>
                        <td>{{$value->uraian}}</td>
                        <td style="text-align: center;">
                            <a href="filepelaporan/{{$value->file_aduan}}">{{$value->file_aduan}}</a>
                        </td>
                        <td>
                            <form action="/pelaporan4/{{$value->id}}" method="POST" id="form-delete">
                                @method('delete')
                                @csrf
                                <a href="/pelaporan4/{{$value->id}}/edit" class="btn btn-warning btn-sm mb-2">Edit</a>
                                <button type="submit" id="show_confirm" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>

                            </form>

                        </td>

                    </tr>
                    @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section("script")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    let confirm = document.getElementById('show_confirm');
    let form = document.getElementById('form-delete');
    confirm.addEventListener("click", (event) => {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin ingin hapus data?',
            text: "Anda akan kehilangan data ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Sukses!',
                    'Data anda sudah terhapus',
                    'success'
                )
            }
        })
    })
   
</script>
@endsection