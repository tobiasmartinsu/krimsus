<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KegiatanHarian;
use App\Models\Pelaporan;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Card User
        $user = User::count();

        // Card Pelaporan
        $jmllaporan = Pelaporan::count();

        // Card Kegiatanharian
        $jmlkegiatan = KegiatanHarian::count();

        // Unit
        $unit = Unit::where('nama_unit')->get();


        // Chart Aduan
        $counts = DB::table('jenis_pelaporan')
            ->leftJoin('pelaporan', 'jenis_pelaporan.id', '=', 'pelaporan.id_jenis_laporan')
            ->groupBy('jenis_pelaporan.id')
            ->orderBy('jenis_pelaporan.id')
            ->selectRaw('COUNT(pelaporan.id) as count')
            ->pluck('count')
            ->toArray();

        $output = array_map(function ($count) {
            return $count ?: 0;
        }, $counts);

        $output = json_encode($output);



        // Chart Unit
        $count_unit = DB::table('unit')
            ->leftJoin('pelaporan', 'unit.id', '=', 'pelaporan.unit_id')
            ->groupBy('unit.id')
            ->orderBy('unit.id')
            ->selectRaw('COUNT(pelaporan.id) as count')
            ->pluck('count')
            ->toArray();

        $output_unit = array_map(function ($count) {
            return $count ?: 0;
        }, $count_unit);

        $output_unit = json_encode($output_unit);



        
        return view('layout.dashboard', compact(
            'jmllaporan',
            'jmlkegiatan',
            'user',
            'unit',
            'output',
            'output_unit'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
