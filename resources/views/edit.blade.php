
@extends('layout.krimsus')
@section('title')
Halaman Ganti Password
@endsection

@section('content')
<div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <h1 class="pb-4">Ganti Password</h1>
                <form action="editpassword" method="POST">
                    @csrf
                  <div class="row mb-3">
                    <label for="oldPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="oldPassword" type="password" class="form-control" id="oldPassword">
                      @error('password')
                          <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newPassword" type="password" class="form-control" id="newPassword">
                      @error('password')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                      @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form>

            </div>
          </div>

        </div>
      </div>
@endsection