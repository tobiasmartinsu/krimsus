<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KegiatanHarian;
use App\Models\Unit;
use File;
use Alert;

class KegiatanHarian3Controller extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $kegiatanharian3 = KegiatanHarian::where("unit_id","3")->get();

            return view('kegiatan_harian.unit3.tampil', ['kegiatanharian3'=>$kegiatanharian3]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */

        public function create()
        {
            $user = User::all();
            $unit = Unit::where("id", "3")->get();;
             // dd($user);

            return view('kegiatan_harian.unit3.tambah', ['user' => $user, 'unit3'=> $unit]);


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
            return redirect('/kegiatanharian3');

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $kegiatanharian3 = KegiatanHarian::find($id);

            return view('kegiatan_harian.unit3.detail', ['kegiatanharian3'=>$kegiatanharian3]);

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {

            $unit = Unit::where("id", "3")->get();
            $kegiatanharian3 = KegiatanHarian::find($id);
            return view('kegiatan_harian.unit3.edit', ['kegiatanharian3'=>$kegiatanharian3, "unit3"=>$unit]);
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

            $kegiatanharian3 = KegiatanHarian::find($id);

            if($request->has('bukti_kegiatan')){
                $path = 'filekegiatanharian/';
                File::delete($path. $kegiatanharian3->bukti_kegiatan);

                $namaFile = time().'.'.$request->bukti_kegiatan->extension();

                $request->bukti_kegiatan->move(public_path('filekegiatanharian'), $namaFile);

                $kegiatanharian3->bukti_kegiatan = $namaFile;

                $kegiatanharian3->save();
            }

            $kegiatanharian3->unit_id = $request->unit_id;
            $kegiatanharian3->name = $request->name;
            $kegiatanharian3->nama_kegiatan = $request->nama_kegiatan;
            $kegiatanharian3->tanggal = $request->tanggal;
            $kegiatanharian3->detail_kegiatan = $request->detail_kegiatan;

            $kegiatanharian3->save();
            Alert::success('Berhasil', 'Data Berhasil diedit');
            return redirect('/kegiatanharian3');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $kegiatanharian3 = KegiatanHarian::find($id);

            $path = 'filekegiatanharian/';
            File::delete($path. $kegiatanharian3->bukti_kegiatan);


            $kegiatanharian3->delete();

            return redirect('/kegiatanharian3');
        }


        public function getNamaUnit($id){
            // $name = User::find($id);

            // return response()->json($name);

            $name = User::where('unit_id', "=", $id)->get();
            // dd($name);
            return response()->json($name);
        }
    }
