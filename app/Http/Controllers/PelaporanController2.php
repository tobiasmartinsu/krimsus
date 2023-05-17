<?php

namespace App\Http\Controllers;

use App\Models\JenisPelaporan;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\Unit;
use File;
use Alert;




class PelaporanController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pelaporan2 = Pelaporan::where("unit_id", "2")->get();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit2.tampil', ['pelaporan2' => $pelaporan2, 'jenis_pelaporan' => $jenis_pelaporan] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::where("id", "2")->get();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit2.tambah', ['units' => $unit, 'jenis_pelaporan' => $jenis_pelaporan] );
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
            'nama_aduan' => 'required',
            'id_jenis_laporan' => 'required',
            'laporan_polisi' => 'required',
            'pelapor' => 'required',
            'terlapor' => 'required',
            'tanggal' => 'required',
            'uraian' => 'required',
            'file_aduan' => 'required|mimes:pdf,docx',
        ],
        [
            'nama_aduan.required' => 'Nama Aduan harus diisi!',
            'id_jenis_laporan.required' => 'Jenis Laporan harus diisi!',
            'laporan_polisi.required' => 'Laporan Polisi harus diisi!',
            'pelapor.required' => 'Pelapor harus diisi!',
            'terlapor.required' => 'Terlapor harus diisi!',
            'tanggal.required' => 'Tanggal harus diisi!',
            'uraian.required' => 'Uraian harus diisi!',
            'file_aduan.required' => 'File harus berbentuk .pdf atau .docx'

        ]);

        $fileName = time().'.'.$request->file_aduan->extension();

        $request->file_aduan->move(public_path('filepelaporan'), $fileName);

        Pelaporan::create([
            'unit_id' => $request['unit_id'],
            'nama_aduan' => $request['nama_aduan'],
            'laporan_polisi' => $request['laporan_polisi'],
            'pelapor' => $request['pelapor'],
            'terlapor' => $request['terlapor'],
            'tanggal' => $request['tanggal'],
            'uraian' => $request['uraian'],
            'file_aduan' => $fileName,
            'id_jenis_laporan' => $request['id_jenis_laporan'],


        ]);
        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/pelaporan2');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $pelaporan2 = Pelaporan::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan2 = Pelaporan::find($id);
        $unit = Unit::all();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit2.edit',['pelaporan2' => $pelaporan2, 'units' => $unit, 'jenis_pelaporan' => $jenis_pelaporan]);

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
            'nama_aduan' => 'required',
            'id_jenis_laporan' => 'required',
            'laporan_polisi' => 'required',
            'pelapor' => 'required',
            'terlapor' => 'required',
            'tanggal' => 'required',
            'uraian' => 'required',
            'file_aduan' => 'mimes:pdf,docx',
        ],
        [
            'nama_aduan.required' => 'Nama Aduan harus diisi!',
            'id_jenis_laporan.required' => 'Jenis Laporan harus diisi!',
            'laporan_polisi.required' => 'Laporan Polisi harus diisi!',
            'pelapor.required' => 'Pelapor harus diisi!',
            'terlapor.required' => 'Terlapor harus diisi!',
            'tanggal.required' => 'Tanggal harus diisi!',
            'uraian.required' => 'Uraian harus diisi!',
            'file_aduan.required' => 'File harus berbentuk .pdf atau .docx'
        ]);


        $pelaporan2 = Pelaporan::find($id);

        if($request->has('file_aduan')){
            $path = 'filepelaporan/';
            File::delete($path. $pelaporan2->file_aduan);

            $namaFile = time().'.'.$request->file_aduan->extension();

            $request->file_aduan->move(public_path('filepelaporan'), $namaFile);

            $pelaporan2->file_aduan = $namaFile;

            $pelaporan2->save();
        }

        $pelaporan2->unit_id = $request->unit_id;
        $pelaporan2->nama_aduan = $request->nama_aduan;
        $pelaporan2->id_jenis_laporan = $request->id_jenis_laporan;
        $pelaporan2->laporan_polisi = $request->laporan_polisi;
        $pelaporan2->pelapor = $request->pelapor;
        $pelaporan2->terlapor = $request->terlapor;
        $pelaporan2->tanggal = $request->tanggal;
        $pelaporan2->uraian = $request->uraian;

        $pelaporan2->save();
        Alert::success('Berhasil', 'Data Berhasil diedit');
        return redirect('/pelaporan2');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaporan2 = Pelaporan::find($id);

        $path = 'filepelaporan/';
        File::delete($path. $pelaporan2->file_aduan);

        $pelaporan2->delete();

        return redirect('/pelaporan2');
    }
}


