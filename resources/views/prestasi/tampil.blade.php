@extends('layout.krimsus')
@section('title')
Halaman Prestasi Anggota
@endsection
@section('content')

<div class="col">
    <a href="/prestasi/create" class="btn btn-info btn-md my-3">Tambah Prestasi</a>
</div>
<div class="row">
    @forelse ($prestasi as $item)
    <div class="col-4">
        <div class="card">
            <img class="card-img-top" src="{{asset('fileprestasi/' . $item->foto_prestasi)}}" style="height: 400px" alt="">
            <div class="card-body" style="height:max-content">
                <h3 class="mt-2">{{$item->judul_prestasi}}</h3>
                <h5>Oleh</h5>
                <h5>{{$item->name}}</h5> 
                <br>
                <p class="card-text">{{ Str::limit($item->detail,200) }}</p>
                <a href="/prestasi/{{$item->id}} " class="btn btn-outline-primary w-100">Lihat Lebih Lengkap</a>
                <div class="row mt-3">
                    <div class="col">
                        <form action="/prestasi/{{$item->id}}" method="POST" id="form-delete">
                            @method('delete')
                            @csrf
                            <a href="/prestasi/{{$item->id}}/edit" class="btn btn-warning btn-sm mb-2 w-100">Edit</a>
                            <button type="submit" id="show_confirm" class="btn  btn-danger btn-sm mb-2 w-100 show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
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