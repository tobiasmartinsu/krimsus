@extends('layout.krimsus')
@section('title')
Halaman List User
@endsection

@section('content')

<div class="card px-1">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-md-4">
                    <a href="/manajemen_akun/create">
                        <button class="btn btn-primary btn-sm my-4">Tambah User</button>
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">No</th>
                                    <th scope="col" style="text-align: center;">Nama</th>
                                    <th scope="col" style="text-align: center; ">Email</th>
                                    <th scope="col" style="text-align: center;">Password</th>
                                    <th scope="col" style="text-align: center;">Level</th>
                                    <th scope="col" style="text-align: center;">Jabatan</th>
                                    <th scope="col" style="text-align: center; width:100px;">Unit</th>
                                    <th scope="col" style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key=>$value)
                                <tr>
                                    <td>{{$key + 1}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td style="word-wrap: break-word; white-space: pre-wrap;">{{$value->password}}</td>
                                    <td style="text-align: center;">{{$value->level}}</td>
                                    <td style="text-align: center;">{{$value->jabatan}}</td>
                                    <td style="text-align: center;">{{$value->unit->nama_unit ?? '-'}}</td>
                                    <td>
                                        <form action="/manajemen_akun/{{$value->id}}" method="POST" class="d-flex justify-content-center" id="form-delete">
                                            @method('delete')
                                            @csrf
                                            <a href="/manajemen_akun/{{$value->id}}/edit" class="btn btn-warning centered btn-xs mx-2">Edit</a>
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