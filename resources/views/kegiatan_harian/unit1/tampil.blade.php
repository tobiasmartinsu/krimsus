@extends('layout.krimsus')
@section('title')
    Halaman Kegiatan Harian Unit 1
@endsection
@section('content')

   
<div class="card">
    <div class="card-body">
        <a href="/kegiatanharian/create" class="btn btn-primary btn-sm my-3">Tambah Kegiatan</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No</th>
                        <th scope="col" width="100px" style="text-align: center;">Unit</th>
                        <th scope="col" width="200px" style="text-align: center;">Nama Anggota</th>
                        <th scope="col" style="text-align: center;">Nama Kegiatan</th>
                        <th scope="col" width="200px" style="text-align: center;">Tanggal</th>
                        <th scope="col" width="300px" style="text-align: center;">Detail Kegiatan</th>
                        <th scope="col" width="100px" style="text-align: center;">File</th>
                        <th scope="col" width="100px" style="text-align: center;">Bukti Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatanharian as $key=>$value)
                    <tr>
                        <td style="text-align: center;">{{$key + 1}}</td>
                        <td style="text-align: center;">{{$value->unit->nama_unit}}</td>
                        <td style="text-align: center;">{{$value->name}}</td>
                        <td style="text-align: center;">{{$value->nama_kegiatan}}</td>
                        <td style="text-align: center;">{{$value->tanggal}}</td>
                        <td>{{$value->detail_kegiatan}}</td>
                        <td style="text-align: center;">
                            <a href="filekegiatanharian/{{$value->bukti_kegiatan}}">{{$value->bukti_kegiatan}}</a>
                        </td>
                        <td>
                            <form action="/kegiatanharian/{{$value->id}}" method="POST" id="form-delete">
                                @method('delete')
                                @csrf
                                <a href="/kegiatanharian/{{$value->id}}/edit" class="btn btn-warning btn-sm mb-2">Edit</a>
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
