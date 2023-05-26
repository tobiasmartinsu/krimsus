@extends('layout.krimsus')
@section('title')
Halaman Detail Prestasi Anggota
@endsection
@section('content')

<div class="col">
    <a href="/prestasi" class="btn btn-warning btn-block btn-md my-3">Kembali</a>
</div>
<div class="card">
    <img class="card-img-top my-3" src="{{asset('fileprestasi/' . $prestasi->foto_prestasi)}}" alt="" height="500 px">
    <div class="card-body">

        <h3>{{$prestasi->judul_prestasi}} </h3>
        <h5>Oleh</h5>
        <h5>{{$prestasi->name}}</h5><br>
        <p>{{$prestasi->detail}}</p>
    </div>

</div>




@endsection