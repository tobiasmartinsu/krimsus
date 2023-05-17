@extends('layout.krimsus')
@section('title')
    Halaman Tambah Kegiatan Harian Unit 3
@endsection
@section('content')
    <form action="/kegiatanharian3" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Unit</label>
            <select name="unit_id" class="form-control text-dark" id="unit">
                <option value="" disabled selected hidden>--Pilih Unit--</option>
                @foreach ($unit3 as $unit)
                    <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                @endforeach

            </select>
            @error('unit_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Anggota</label>
            <select name="name" class="form-control text-dark" id='name'>
                <option value="" disabled selected hidden>--Pilih Nama Anggota--</option>;
            </select>
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" class="form-control text-dark" name="nama_kegiatan" placeholder="Masukkan Nama Aduan">
            @error('nama_kegiatan')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control text-dark" name="tanggal" placeholder="Masukkan Tanggal">
            @error('tanggal')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Detail Kegiatan</label>
            <textarea class="form-control text-dark" name="detail_kegiatan" placeholder="Masukkan Detail Kegiatan" cols="30"
                rows="10"></textarea>
            @error('detail_kegiatan')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Upload File</label>
            <input type="file" class="form-control text-dark" name="bukti_kegiatan">
            @error('bukti_kegiatan')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const unit = document.getElementById('unit');
        const name = document.getElementById('name');

        unit.addEventListener('change', () => {
            console.log(unit.value);
            $.ajax({
                url: '/kegiatanharian3/getUnitNama/' + unit.value,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    // name.value = result.name;

                    $('select[name="name"]').empty();
                    $('#name').html(
                        ' <option value="" disabled selected hidden>--Pilih Nama Anggota--</option>'
                        );

                    $.each(result, function(key, value) {
                        $('select[name="name"]').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    console.log(value)
                    });
                }
            })
        })
    </script>
@endsection
