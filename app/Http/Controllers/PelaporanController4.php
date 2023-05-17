<?php

namespace App\Http\Controllers;

use App\Models\JenisPelaporan;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\Unit;
use File;
use Alert;



class PelaporanController4 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pelaporan4 = Pelaporan::where("unit_id", "4")->get();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit4.tampil', ['pelaporan4' => $pelaporan4, 'jenis_pelaporan' => $jenis_pelaporan] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::where("id", "4")->get();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit4.tambah', ['units' => $unit, 'jenis_pelaporan' => $jenis_pelaporan] );
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
        return redirect('/pelaporan4');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $pelaporan4 = Pelaporan::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan4 = Pelaporan::find($id);
        $unit = Unit::all();
        $jenis_pelaporan = JenisPelaporan::all();

        return view('pelaporan.unit4.edit',['pelaporan4' => $pelaporan4, 'units' => $unit, 'jenis_pelaporan' => $jenis_pelaporan]);

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
        $validated = $request->validate([
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

        $pelaporan4 = Pelaporan::find($id);

        if($request->has('file_aduan')){
            $path = 'filepelaporan/';
            File::delete($path. $pelaporan4->file_aduan);

            $namaFile = time().'.'.$request->file_aduan->extension();

            $request->file_aduan->move(public_path('filepelaporan'), $namaFile);

            $pelaporan4->file_aduan = $namaFile;

            $pelaporan4->save();
        }

        $pelaporan4->unit_id = $request->unit_id;
        $pelaporan4->nama_aduan = $request->nama_aduan;
        $pelaporan4->id_jenis_laporan = $request->id_jenis_laporan;
        $pelaporan4->laporan_polisi = $request->laporan_polisi;
        $pelaporan4->pelapor = $request->pelapor;
        $pelaporan4->terlapor = $request->terlapor;
        $pelaporan4->tanggal = $request->tanggal;
        $pelaporan4->uraian = $request->uraian;

        $pelaporan4->save();
        Alert::success('Berhasil', 'Data Berhasil diedit');
        return redirect('/pelaporan4');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaporan4 = Pelaporan::find($id);

        $path = 'filepelaporan/';
        File::delete($path. $pelaporan4->file_aduan);

        $pelaporan4->delete();

        return redirect('/pelaporan4');
    }
}