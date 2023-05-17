<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\manajemen_akunController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PelaporanController2;
use App\Http\Controllers\PelaporanController3;
use App\Http\Controllers\PelaporanController4;
use App\Http\Controllers\KegiatanHarianController;
use App\Http\Controllers\KegiatanHarian2Controller;
use App\Http\Controllers\KegiatanHarian3Controller;
use App\Http\Controllers\KegiatanHarian4Controller;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PasswordController;
// use Psy\Command\EditCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);






// Middleware
Route::group(['middleware' => ['auth']], function () {
    //
    // CRUD Manajemen Akun

    // Create data
    Route::get('/manajemen_akun/create',[manajemen_akunController::class, 'create' ] );
    Route::post('/manajemen_akun',[manajemen_akunController::class, 'store' ] );

    // Read Data
    Route::get('/manajemen_akun',[manajemen_akunController::class, 'index' ] );

    // Update
    Route::get('/manajemen_akun/{id}/edit',[manajemen_akunController::class, 'edit' ] );
    Route::put('/manajemen_akun/{id}',[manajemen_akunController::class, 'update' ] );

    // Delete
    Route::delete('/manajemen_akun/{id}',[manajemen_akunController::class, 'destroy' ] );






    // CRUD Pelaporan

    // CRUD Pelaporan 1
    Route::resource('pelaporan', PelaporanController::class );

    // CRUD Pelaporan 2
    Route::resource('pelaporan2', PelaporanController2::class );

    // CRUD Pelaporan 3
    Route::resource('pelaporan3', PelaporanController3::class );

    // CRUD Pelaporan 4
    Route::resource('pelaporan4', PelaporanController4::class );





    // CRUD Kegiatan Harian

    // CRUD Kegiatan Harian 1
    Route::resource('kegiatanharian', KegiatanHarianController::class );
    Route::get('kegiatanharian/getUnitNama/{id}', [KegiatanHarianController::class, 'getNamaUnit']);

    //CRUD Kegiatan Harian 2
    Route::resource('kegiatanharian2', KegiatanHarian2Controller::class );
    Route::get('kegiatanharian2/getUnitNama/{id}', [KegiatanHarian2Controller::class, 'getNamaUnit']);


    //CRUD Kegiatan Harian 3
    Route::resource('kegiatanharian3', KegiatanHarian3Controller::class );
    Route::get('kegiatanharian3/getUnitNama/{id}', [KegiatanHarian3Controller::class, 'getNamaUnit']);


    //CRUD Kegiatan Harian 4
    Route::resource('kegiatanharian4', KegiatanHarian4Controller::class );
    Route::get('kegiatanharian4/getUnitNama/{id}', [KegiatanHarian4Controller::class, 'getNamaUnit']);


    // CRUD Prestasi Anggota
    Route::resource('prestasi', PrestasiController::class);
    Route::get('prestasi/getUnitNama/{id}', [PrestasiController::class, 'getNamaUnit']);


    // Ganti Password
    Route::get('editpassword', [PasswordController::class, 'changePassword']);
    Route::post('editpassword', [PasswordController::class, 'processChangePassword']);
    // Route::get('/account/ganti-password',[PasswordController::class, 'edit'])->name('profil')
    // Route::get('account/password', 'Account\PasswordController@edit') -> name('password.edit');
    // Route::patch('account/password', 'Account\PasswordController@update') -> name('password.edit');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
