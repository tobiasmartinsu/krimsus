@extends('layout.krimsus')
@section('title')
    Halaman Tambah User
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <form action="/manajemen_akun" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control text" name="name" placeholder="Masukkan Nama">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control text" name="email" placeholder="Masukkan Email">
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control text" name="password" placeholder="Masukkan Password">
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control text">
                    <option value="" disabled selected>--Pilih Level--</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                @error('level')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select name="jabatan" class="form-control text">
                    <option value="" disabled selected>--Pilih Jabatan--</option>
                    <option value="Kasubdit">Kasubdit</option>
                    <option value="Panit">Kanit</option>
                    <option value="Panit1">Panit 1</option>
                    <option value="Panit2">Panit 2</option>
                    <option value="Anggota">Anggota</option>
                </select>
                @error('jabatan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Unit</label>
                <select name="unit_id" class="form-control text">
                    <option value="" disabled selected>---Pilih Unit---</option>

                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                    @endforeach

                </select>
                @error('unit_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>

@endsection
