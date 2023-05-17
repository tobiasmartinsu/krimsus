<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Alert;

class PasswordController extends Controller
{
    public function changePassword()
    {
        return view('edit');
    }

    public function processChangePassword(Request $request)
    {
        // Cek password Lama
        $cek = Hash::check($request->oldPassword, auth()->user()->password);

        if(!$cek){
            return back()->with('error', 'password tidak sesuai.');
        }

        // Cek password baru dengan konfirmasi password
        $cek2 = $request->newPassword == $request->password_confirmation;
        
        if(!$cek2){
            return back()->with('error', 'password dan konfirmasi password tidak sesuai.');
        }

        auth()->user()->update([
            'password' => Hash::make($request->newPassword)
        ]);

        Alert::success('Berhasil', 'Password Berhasil diganti');

        return redirect('/dashboard');
    }
}
