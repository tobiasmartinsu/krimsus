<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prestasi;
use App\Models\Unit;
use File;


class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = Prestasi::all();

        return view('prestasi.tampil', ['prestasi'=>$prestasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $unit = Unit::all();
        return view('prestasi.tambah',['users' => $user, 'units'=> $unit]);
    }

    /**A
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required',
            'name' => 'required',
            'judul_prestasi' => 'required',
            'tanggal' => 'required',
            'detail' => 'required',
            'foto_prestasi' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'unit_id.required' => 'Unit Harus Dipilih!',
            'name.required' => 'Nama Anggota Harus Dipilih!',
            'judul_prestasi.required' => 'Judul Prestasi Harus Dipilih!',
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'detail.required' => 'Detail Prestasi Harus Diisi!',
            'foto_prestasi.required' => 'Foto Prestasi Harus Diisi!'
        ]);


        $imageName = time().'.'.$request->foto_prestasi->extension();

        $request->foto_prestasi->move(public_path('fileprestasi'), $imageName);

        Prestasi::create([
            'unit_id' => $request['unit_id'],
            'name' => $request['name'],
            'judul_prestasi' => $request['judul_prestasi'],
            'tanggal' => $request['tanggal'],
            'detail' => $request['detail'],
            'foto_prestasi' => $imageName,
        ]);
        return redirect('/prestasi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = Prestasi::find($id);

        return view('prestasi.detail', ['prestasi'=>$prestasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::all();
        $prestasi = Prestasi::find($id);
        return view('prestasi.edit', ['prestasi'=>$prestasi, "units"=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_id' => 'required',
            'name' => 'required',
            'judul_prestasi' => 'required',
            'tanggal' => 'required',
            'detail' => 'required',
            'foto_prestasi' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'unit_id.required' => 'Unit Harus Dipilih!',
            'name.required' => 'Nama Anggota Harus Dipilih!',
            'judul_prestasi.required' => 'Judul Prestasi Harus Dipilih!',
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'detail.required' => 'Detail Prestasi Harus Diisi!',
            'foto_prestasi.required' => 'Foto Prestasi Harus Diisi!'
        ]);

        $prestasi = Prestasi::find($id);

        if($request->has('foto_prestasi')){
            $path = 'fileprestasi/';
            File::delete($path. $prestasi->foto_prestasi);

            $namaFile = time().'.'.$request->foto_prestasi->extension();

            $request->foto_prestasi->move(public_path('fileprestasi'), $namaFile);

            $prestasi->foto_prestasi = $namaFile;

            $prestasi->save();
        }

        $prestasi->unit_id = $request->unit_id;
        $prestasi->name = $request->name;
        $prestasi->judul_prestasi = $request->judul_prestasi;
        $prestasi->tanggal = $request->tanggal;
        $prestasi->detail = $request->detail;

        $prestasi->save();

        return redirect('/prestasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);

        $path = 'fileprestasi/';
        File::delete($path. $prestasi->foto_prestasi);


        $prestasi->delete();

        return redirect('/prestasi');
    }


    public function getNamaUnit($id){
        // $name = User::find($id);

        // return response()->json($name);

        $name = User::where('unit_id', "=", $id)->get();
        // dd($name);
        return response()->json($name);
    }

}

