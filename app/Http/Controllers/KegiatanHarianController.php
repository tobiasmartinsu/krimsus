<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KegiatanHarian;
use App\Models\Unit;
use File;
use Alert;

class KegiatanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatanharian = KegiatanHarian::where("unit_id","1")->get();

        return view('kegiatan_harian.unit1.tampil', ['kegiatanharian'=>$kegiatanharian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $unit = Unit::where("id", "1")->get();
         // dd($user);

        return view('kegiatan_harian.unit1.tambah', ['user' => $user, 'units'=> $unit]);


    }

    /**
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
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'detail_kegiatan' => 'required',
            'bukti_kegiatan' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'unit_id.required' => 'Unit Harus Dipilih!',
            'name.required' => 'Nama Harus Diisi!',
            'nama_kegiatan.required' => 'Nama Kegiatan Harus Diisi!',
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'detail_kegiatan.required' => 'Detail Kegiatan Harus Diisi!',
            'bukti_kegiatan.required' => 'Bukti Kegiatan Harus Diisi!'
        ]);




        $imageName = time().'.'.$request->bukti_kegiatan->extension();

        $request->bukti_kegiatan->move(public_path('filekegiatanharian'), $imageName);

        KegiatanHarian::create([
            'unit_id' => $request['unit_id'],
            'name' => $request['name'],
            'nama_kegiatan' => $request['nama_kegiatan'],
            'tanggal' => $request['tanggal'],
            'detail_kegiatan' => $request['detail_kegiatan'],
            'bukti_kegiatan' => $imageName,
        ]);
        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/kegiatanharian');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatanharian = KegiatanHarian::find($id);

        return view('kegiatan_harian.unit1.detail', ['kegiatanharian'=>$kegiatanharian]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $unit = Unit::where("id", "1")->get();
        $kegiatanharian = KegiatanHarian::find($id);
        return view('kegiatan_harian.unit1.edit', ['kegiatanharian'=>$kegiatanharian, "units"=>$unit]);
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
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'detail_kegiatan' => 'required',
            'bukti_kegiatan' => 'mimes:jpg,jpeg,png',
        ],
        [
            'unit_id.required' => 'Unit Harus Dipilih!',
            'name.required' => 'Nama Harus Diisi!',
            'nama_kegiatan.required' => 'Nama Kegiatan Harus Diisi!',
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'detail_kegiatan.required' => 'Detail Kegiatan Harus Diisi!',
            'bukti_kegiatan.required' => 'Bukti Kegiatan Harus Diisi!'
        ]);

        $kegiatanharian = KegiatanHarian::find($id);

        if($request->has('bukti_kegiatan')){
            $path = 'filekegiatanharian/';
            File::delete($path. $kegiatanharian->bukti_kegiatan);

            $namaFile = time().'.'.$request->bukti_kegiatan->extension();

            $request->bukti_kegiatan->move(public_path('filekegiatanharian'), $namaFile);

            $kegiatanharian->bukti_kegiatan = $namaFile;

            $kegiatanharian->save();
        }

        $kegiatanharian->unit_id = $request->unit_id;
        $kegiatanharian->name = $request->name;
        $kegiatanharian->nama_kegiatan = $request->nama_kegiatan;
        $kegiatanharian->tanggal = $request->tanggal;
        $kegiatanharian->detail_kegiatan = $request->detail_kegiatan;

        $kegiatanharian->save();
        Alert::success('Berhasil', 'Data Berhasil diedit');
        return redirect('/kegiatanharian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatanharian = KegiatanHarian::find($id);

        $path = 'filekegiatanharian/';
        File::delete($path. $kegiatanharian->bukti_kegiatan);


        $kegiatanharian->delete();

        return redirect('/kegiatanharian');
    }


    public function getNamaUnit($id){
        // $name = User::find($id);

        // return response()->json($name);

        $name = User::where('unit_id', "=", $id)->get();
        // dd($name);
        return response()->json($name);
    }
}
