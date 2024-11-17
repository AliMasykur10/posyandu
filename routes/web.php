<?php

use App\Http\Controllers\editAnak;
use Psy\Readline\Hoa\ConsoleWindow;
use App\Http\Controllers\TampilUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\bukuPosyandu\SKDN;
use App\Http\Controllers\dashboard\bukuPosyandu\KiaKms;
use App\Http\Controllers\dashboard\bukuPosyandu\PusWus;
use App\Http\Controllers\dashboard\bukuPosyandu\Sdidtk;
use SebastianBergmann\Environment\Console;
use App\Http\Controllers\dashboard\bukuPosyandu\IbuHamil;
use App\Http\Controllers\dashboard\bukuPosyandu\Kunjungan;
use App\Http\Controllers\dashboard\bukuPosyandu\Penyuluhan;
use App\Http\Controllers\dashboard\bukuPosyandu\PmtPosyandu;
use App\Http\Controllers\dashboard\bukuPosyandu\NotulenRapat;
use App\Http\Controllers\dashboard\bukuPosyandu\TugasAbsensi;
use App\Http\Controllers\dashboard\ChildController;
use App\Http\Controllers\dashboard\ComplaintsAdmin;
use App\Http\Controllers\dashboard\bukuPosyandu\PersediaanBahan;
use App\Http\Controllers\dashboard\bukuPosyandu\JaminanKesehatan;
use App\Http\Controllers\dashboard\bukuPosyandu\KegiatanPosyandu;
use App\Http\Controllers\dashboard\bukuPosyandu\KeuanganPosyandu;
use App\Http\Controllers\dashboard\ParentController;
use App\Http\Controllers\dashboard\MidwifeController;
use App\Http\Controllers\dashboard\OfficerController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\VaccineController;
use App\Http\Controllers\dashboard\bukuPosyandu\InventarisPosyandu;
use App\Http\Controllers\dashboard\VitaminsController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\AddNewUserController;
use App\Http\Controllers\dashboard\ComplaintsController;
use App\Http\Controllers\dashboard\bukuPosyandu\RekapitulasiEvaluasi;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\tambahUserController\TambahUser;

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

// Login
Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'authenticate');
});
// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');



Route::get('handle-user/admin', [TambahUser::class, 'admin'])->name('handle-user.admin');
Route::get('handle-user/kader', [TambahUser::class, 'kader'])->name('handle-user.kader');
Route::get('handle-user/bidan', [TambahUser::class, 'bidan'])->name('handle-user.bidan');
Route::get('handle-user/keluarga', [TambahUser::class, 'keluarga'])->name('handle-user.keluarga');
Route::get('handle-user/kepala-desa', [TambahUser::class, 'kepalaDesa'])->name('handle-user.kepalaDesa');
Route::get('handle-user/puskesmas', [TambahUser::class, 'puskesmas'])->name('handle-user.puskesmas');



Route::resource('tambah-user', AddNewUserController::class)->middleware('role:admin,kader');

Route::get('/tampil-user', [TampilUser::class, 'index'])->name('tampil-user.index');
Route::delete('/tampil-user/{id}', [TampilUser::class, 'destroy']);
Route::get('/tampil-user/edit/{id}', [TampilUser::class, 'edit']);
Route::get('/tampil-user/edit/anak/{id}', [editAnak::class, 'edit']);
Route::put('/tampil-user/edit/anak/{id}', [editAnak::class, 'update'])->name('tampil-user.edit.anak.update');


// Data Master
// 1. Data Keluarga
Route::resource('parent-data', ParentController::class)->middleware('role:admin,kader');
// 2. Data Anak
Route::resource('children-data', ChildController::class)->middleware('role:admin,kader');
// 3. Data Petugas
Route::resource('officer-data', OfficerController::class)->middleware('role:admin,kader');
// 4. Data Bidan
Route::resource('midwife-data', MidwifeController::class)->middleware('role:admin,kader');

// Data Pelayanan
// 1. Imunisasi
Route::get('DataImmunization', [ServiceController::class, 'DataImmunizationIndex'])->middleware('role:admin,kader,bidan
');
Route::delete('DataImmunization/{id}', [ServiceController::class, 'destroy']);
// 2. Penimbangan
Route::get('DataWeighing', [ServiceController::class, 'DataWeighing'])->middleware('role:admin,kader,bidan
');
Route::delete('DataWeighing/{id}', [ServiceController::class, 'DestroyDataWeighing']);

// Persediaan Vaksin
Route::controller(VaccineController::class)->middleware('role:admin,kader')->group(function () {
    Route::get('immunization', 'ImmunizationIndex');
    Route::post('immunization', 'ImmunizationStore')->name('immunization.store');
    Route::delete('immunization/{id}',  'ImmunizationDestroy')->name('immunization.destroy');
    Route::get('immunization/{id}/edit', 'ImmunizationEdit')->name('immunization.edit');
    Route::put('immunization/{id}', 'ImmunizationUpdate')->name('immunization.update');
});

// Persediaan Vitamin A
Route::controller(VitaminsController::class)->middleware('role:admin,kader')->group(function () {
    Route::get('vitamins', 'VitaminsIndex');
    Route::post('vitamins', 'VitaminsStore')->name('vitamins.store');
    Route::delete('vitamins/{id}', 'VitaminsDestroy')->name('vitamins.destroy');
    Route::get('vitamins/{id}/edit', 'VitaminsEdit')->name('vitamins.edit');
    Route::put('vatamins/{id}', 'VitaminsUpdate')->name('vitamins.update');
});

// Layanan Penimbangan Anak
Route::controller(ServiceController::class)->middleware('role:admin,kader,bidan
')->group(function () {
    Route::get('weighing-children', 'WeighingChild')->name('weighing.child');
    Route::post('weighing-children', 'StoreWeighing')->name('store.weighing');
});

// Layanan Imunisasi Anak
Route::controller(ServiceController::class)->middleware('role:admin,kader,bidan
')->group(function () {
    Route::get('child-immunization', 'ImmunizationChild')->name('Immunization');
    Route::post('child-immunization', 'ImmunizationStore')->name('store.Immunization');
});

//Pengaduan Saya
Route::resource('my-complaint', ComplaintsController::class)->middleware('auth');

// Daftar Pengaduan Admin
Route::controller(ComplaintsAdmin::class)->middleware('role:admin,kader,bidan
')->group(function () {
    Route::get('complaint-message', 'index');
    Route::get('complaint-message/{id}', 'show')->name('complaint.show');
    Route::put('complaint-message/{complaints}/process', 'process')->name('complaint.process');
    Route::put('complaint-message/{complaints}/finished', 'finished')->name('complaint.finished');
    Route::put('complaint-message/{complaints}/reject', 'reject')->name('complaint.reject');
});


Route::resource('kegiatan', KegiatanPosyandu::class);

Route::resource('tugas-absensi', TugasAbsensi::class);

Route::resource('pmt', PmtPosyandu::class);

Route::resource('inventaris', InventarisPosyandu::class);

Route::resource('persediaan-bahan', PersediaanBahan::class);

Route::resource('kia-kms', KiaKms::class);

Route::resource('keuangan', KeuanganPosyandu::class);

Route::resource('pus-wus', PusWus::class);

Route::resource('ibu-hamil', IbuHamil::class);

Route::resource('penyuluhan', Penyuluhan::class);

Route::resource('sdidtk', Sdidtk::class);

Route::resource('jaminan-kesehatan', JaminanKesehatan::class);

Route::resource('kunjungan', Kunjungan::class);

Route::resource('rekapitulasi-evaluasi', RekapitulasiEvaluasi::class);

Route::resource('skdn', SKDN::class);

Route::resource('notulen-rapat', NotulenRapat::class);
