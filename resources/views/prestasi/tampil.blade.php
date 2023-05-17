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
                <div class="card-body" style="height: 300px">
                    <h3>{{$item->judul_prestasi}}</h3>
                    <p class="card-text">{{ Str::limit($item->detail,200) }}</p>
                    <a href="/prestasi/{{$item->id}} " class="btn btn-outline-primary btn-block center">Lihat Lebih Lengkap</a>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="/prestasi/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                        </div>
                        <div class="col">
                            <form action="/prestasi/{{$item->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
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
