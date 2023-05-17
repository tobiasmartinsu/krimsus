@extends('layout.krimsus')
@section('title')
    Halaman Edit User
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/manajemen_akun/{{ $users->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control text" value="{{ $users->name }}" name="name" placeholder="Masukkan Nama">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control text" value="{{ $users->email }}" name="email"
                    placeholder="Masukkan email">
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control text" value="{{ $users->password }}" name="password"
                    placeholder="Masukkan Password">
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" value="{{ $users->level }}" class="form-control text">
                    <option value="{{ $users->level }}" selected hidden>{{ $users->level }}</option>
                    <option value="" disabled>--Pilih Level--</option>
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
                <select name="jabatan" value="{{ $users->jabatan }}" class="form-control text">
                    <option value="{{ $users->jabatan }}" selected hidden>{{ $users->jabatan }}</option>
                    <option value="" disabled>--Pilih Jabatan--</option>
                    <option value="Kasubdit">Kasubdit</option>
                    <option value="Panit">Panit</option>
                    <option value="Kanit">Kanit</option>
                    <option value="Personil">Personil</option>
                </select>
                @error('jabatan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Unit</label>
                <select name="unit_id" value="{{ $users->unit_id }}" class="form-control text">

                    @foreach ($units as $unit)
                        @if($users->unit_id == $unit->id)
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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
