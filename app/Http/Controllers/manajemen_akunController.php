<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Alert;






class manajemen_akunController extends Controller
{
    public function create()
    {
        $unit = Unit::all();
        return view('manajemen-akun.tambah', [
            'units' => $unit,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            //'unit_id' => 'required',
        ]);


        DB::table('users')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
            'jabatan' => $request['jabatan'],
            'unit_id' => $request['unit_id']
        ]);


        Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        return redirect('/manajemen_akun');
    }

    public function index()
    {
        $user = User::all();
        // $unit = Unit::all();


        return view('manajemen-akun.tampil', ['users' => $user]);
    }

    public function edit($id)
    {
        $unit = Unit::all();
        $users = DB::table('users')->find($id);
        return view('manajemen-akun.edit', ['users' => $users, 'units' => $unit]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            //'unit_id' => 'required',
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'level' => $request['level'],
                'jabatan' => $request['jabatan'],
                'unit_id' => $request['unit_id']
            ]);

        Alert::success('Berhasil', 'Data Berhasil diedit');
        return redirect('/manajemen_akun');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect('/manajemen_akun');
    }
}
