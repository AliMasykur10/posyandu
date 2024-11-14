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


Route::controller(KegiatanPosyandu::class)->middleware('role:admin,kader')->group(function () {
    Route::get('kegiatan', 'index')->name('kegiatan');
});
Route::controller(TugasAbsensi::class)->middleware('role:admin,kader')->group(function () {
    Route::get('tugas-absensi', 'index')->name('tugasAbsensi');
});
Route::controller(PmtPosyandu::class)->middleware('role:admin,kader')->group(function () {
    Route::get('pmt', 'index')->name('pmt');
});
Route::controller(InventarisPosyandu::class)->middleware('role:admin,kader')->group(function () {
    Route::get('inventaris', 'index')->name('inventaris');
});
Route::controller(PersediaanBahan::class)->middleware('role:admin,kader')->group(function () {
    Route::get('persediaan-bahan', 'index')->name('persediaanBahan');
});
Route::controller(KiaKms::class)->middleware('role:admin,kader')->group(function () {
    Route::get('kia-kms', 'index')->name('kiaKms');
});
Route::controller(KeuanganPosyandu::class)->middleware('role:admin,kader')->group(function () {
    Route::get('keuangan', 'index')->name('keuangan');
});
Route::controller(PusWus::class)->middleware('role:admin,kader')->group(function () {
    Route::get('pus-wus', 'index')->name('pusWus');
});
Route::controller(ibuHamil::class)->middleware('role:admin,kader')->group(function () {
    Route::get('ibu-hamil', 'index')->name('ibuHamil');
});
Route::controller(Penyuluhan::class)->middleware('role:admin,kader')->group(function () {
    Route::get('penyuluhan', 'index')->name('penyuluhan');
});
Route::controller(Sdidtk::class)->middleware('role:admin,kader')->group(function () {
    Route::get('sdidtk', 'index')->name('sdidtk');
});
Route::controller(JaminanKesehatan::class)->middleware('role:admin,kader')->group(function () {
    Route::get('jaminan-kesehatan', 'index')->name('jaminanKesehatan');
});
Route::controller(Kunjungan::class)->middleware('role:admin,kader')->group(function () {
    Route::get('kunjungan', 'index')->name('kunjungan');
});
Route::controller(RekapitulasiEvaluasi::class)->middleware('role:admin,kader')->group(function () {
    Route::get('rekapitulasi-evaluasi', 'index')->name('rekapitulasiEvaluasi');
});
Route::controller(SKDN::class)->middleware('role:admin,kader')->group(function () {
    Route::get('skdn', 'index')->name('skdn');
});
Route::controller(NotulenRapat::class)->middleware('role:admin,kader')->group(function () {
    Route::get('notulen-rapat', 'index')->name('notulenRapat');
});
