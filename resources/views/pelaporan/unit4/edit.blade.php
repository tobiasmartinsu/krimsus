@extends('layout.krimsus')
@section('title')
Halaman Edit Pelaporan 
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/pelaporan4/{{$pelaporan4->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Unit</label>
                <div class="col-sm-10">
                    <select name="unit_id" value="{{ $pelaporan4->unit_id }}" class="form-select">
                        @foreach ($units as $unit)
                        @if($pelaporan4->unit_id == $unit->id)
                        <option value="{{$unit->id}}" selected>{{$unit->nama_unit}}</option>
                        @else
                        <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('unit_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Nama Aduan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$pelaporan4->nama_aduan}}" name="nama_aduan" placeholder="Masukkan Nama Aduan">
                    @error('nama_aduan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Jenis Pelaporan</label>
                <div class="col-sm-10">
                    <select name="id_jenis_laporan" class="form-select">
                        <option value="" disabled selected hidden>---Pilih Jenis Pelaporan---</option>

                        @foreach ($jenis_pelaporan as $jenispelaporan)
                        <option value="{{$jenispelaporan->id}}">{{$jenispelaporan->nama_pelaporan}}</option>
                        @endforeach

                    </select>

                    @error('id_jenis_laporan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Laporan Polisi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$pelaporan4->laporan_polisi}}" name="laporan_polisi" placeholder="Masukkan Laporan Polisi">
                    @error('laporan_polisi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Pelapor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$pelaporan4->pelapor}}" name="pelapor" placeholder="Masukkan Laporan Nama Pelapor">
                    @error('pelapor')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Terlapor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$pelaporan4->terlapor}}" name="terlapor" placeholder="Masukkan Nama Terlapor">
                    @error('terlapor')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" value="{{$pelaporan4->tanggal}}" name="tanggal" placeholder="Masukkan Tanggal">
                    @error('tanggal')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="uraian" placeholder="Masukkan Uraian" cols="30" rows="10">{{$pelaporan4->uraian}}</textarea>
                    @error('uraian')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row my-3">
                <label class="col-sm-2 col-form-label">Upload File (.pdf atau .docx)</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_aduan">
                    @error('file_aduan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-end">Submit</button>

        </form>
    </div>
</div>

@endsection
