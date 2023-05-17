@extends('layout.krimsus')
@section('title')
    Halaman Kegiatan Harian Unit 2
@endsection
@section('content')
{{-- <div class="col">
    <a href="/kegiatanharian22/create" class="btn btn-info btn-md my-3">Tambah Kegiatan</a>
</div>

    <div class="row">
        @forelse ($kegiatanharian2 as $item)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('filekegiatanharian/' . $item->bukti_kegiatan)}}" style="height: 400px" alt="">
                <div class="card-body" style="height: 300px">
                    <h3>{{$item->nama_kegiatan}}</h3>
                    <p class="card-text">{{ Str::limit($item->detail_kegiatan,200) }}</p>
                    <a href="/kegiatanharian2/{{$item->id}} " class="btn btn-outline-primary btn-block">Lihat Lebih Lengkap</a>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="/kegiatanharian2/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                        </div>
                        <div class="col">
                            <form action="/kegiatanharian2/{{$item->id}}" method="post" id="form-delete">
                            @csrf
                            @method('delete')
                            <button type="submit" id="show_confirm" class="btn btn-xs  btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>

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
</div> --}}

<div class="card">
    <div class="card-body">
        <a href="/kegiatanharian2/create" class="btn btn-primary btn-sm my-3">Tambah Kegiatan</a>
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
                    @forelse ($kegiatanharian2 as $key=>$value)
                    <tr>
                        <td style="text-align: center;">{{$key + 1}}</td>
                        <td style="text-align: center;">{{$value->unit->nama_unit}}</td>
                        <td style="text-align: center;">{{$value->name}}</td>
                        <td style="text-align: center;">{{$value->nama_kegiatan}}</td>
                        <td style="text-align: center;">{{$value->tanggal}}</td>
                        <td>{{$value->detail_kegiatan}}</td>
                        <td style="text-align: center;">
                            <a href="filekegiatanharian2/{{$value->bukti_kegiatan}}">{{$value->bukti_kegiatan}}</a>
                        </td>
                        <td>
                            <form action="/kegiatanharian2/{{$value->id}}" method="POST" id="form-delete">
                                @method('delete')
                                @csrf
                                <a href="/kegiatanharian2/{{$value->id}}/edit" class="btn btn-warning btn-sm mb-2">Edit</a>
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
