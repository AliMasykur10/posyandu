<?php

use App\Http\Controllers\SKDN;
use App\Http\Controllers\KiaKms;
use App\Http\Controllers\PusWus;
use App\Http\Controllers\Sdidtk;
use App\Http\Controllers\IbuHamil;
use App\Http\Controllers\Kunjungan;
use App\Http\Controllers\Penyuluhan;
use App\Http\Controllers\StockBahan;
use App\Http\Controllers\PmtPosyandu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotulenRapat;
use App\Http\Controllers\TugasAbsensi;
use App\Http\Controllers\JaminanKesehatan;
use App\Http\Controllers\KegiatanPosyandu;
use App\Http\Controllers\KeuanganPosyandu;
use App\Http\Controllers\InventarisPosyandu;
use App\Http\Controllers\RekapitulasiEvaluasi;
use App\Http\Controllers\dashboard\ChildController;
use App\Http\Controllers\dashboard\ComplaintsAdmin;
use App\Http\Controllers\dashboard\ParentController;
use App\Http\Controllers\dashboard\MidwifeController;
use App\Http\Controllers\dashboard\OfficerController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\VaccineController;
use App\Http\Controllers\dashboard\VitaminsController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\AddNewUserController;
use App\Http\Controllers\dashboard\ComplaintsController;
use App\Http\Controllers\authentications\LoginController;


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
Route::get('tambah-user', [AddNewUserController::class, 'index'])->name('addNewUser')->middleware('auth');

// Data Master
// 1. Data Keluarga
Route::resource('parent-data', ParentController::class)->middleware('role:admin,employee');
// 2. Data Anak
Route::resource('children-data', ChildController::class)->middleware('role:admin,employee');
// 3. Data Petugas
Route::resource('officer-data', OfficerController::class)->middleware('role:admin,employee');
// 4. Data Bidan
Route::resource('midwife-data', MidwifeController::class)->middleware('role:admin,employee');

// Data Pelayanan
// 1. Imunisasi
Route::get('DataImmunization', [ServiceController::class, 'DataImmunizationIndex'])->middleware('role:admin,employee,midwife');
Route::delete('DataImmunization/{id}', [ServiceController::class, 'destroy']);
// 2. Penimbangan
Route::get('DataWeighing', [ServiceController::class, 'DataWeighing'])->middleware('role:admin,employee,midwife');
Route::delete('DataWeighing/{id}', [ServiceController::class, 'DestroyDataWeighing']);

// Persediaan Vaksin
Route::controller(VaccineController::class)->middleware('role:admin,employee')->group(function () {
    Route::get('immunization', 'ImmunizationIndex');
    Route::post('immunization', 'ImmunizationStore')->name('immunization.store');
    Route::delete('immunization/{id}',  'ImmunizationDestroy')->name('immunization.destroy');
    Route::get('immunization/{id}/edit', 'ImmunizationEdit')->name('immunization.edit');
    Route::put('immunization/{id}', 'ImmunizationUpdate')->name('immunization.update');
});

// Persediaan Vitamin A
Route::controller(VitaminsController::class)->middleware('role:admin,employee')->group(function () {
    Route::get('vitamins', 'VitaminsIndex');
    Route::post('vitamins', 'VitaminsStore')->name('vitamins.store');
    Route::delete('vitamins/{id}', 'VitaminsDestroy')->name('vitamins.destroy');
    Route::get('vitamins/{id}/edit', 'VitaminsEdit')->name('vitamins.edit');
    Route::put('vatamins/{id}', 'VitaminsUpdate')->name('vitamins.update');
});

// Layanan Penimbangan Anak
Route::controller(ServiceController::class)->middleware('role:admin,employee,midwife')->group(function () {
    Route::get('weighing-children', 'WeighingChild')->name('weighing.child');
    Route::post('weighing-children', 'StoreWeighing')->name('store.weighing');
});

// Layanan Imunisasi Anak
Route::controller(ServiceController::class)->middleware('role:admin,employee,midwife')->group(function () {
    Route::get('child-immunization', 'ImmunizationChild')->name('Immunization');
    Route::post('child-immunization', 'ImmunizationStore')->name('store.Immunization');
});

//Pengaduan Saya
Route::resource('my-complaint', ComplaintsController::class)->middleware('auth');

// Daftar Pengaduan Admin
Route::controller(ComplaintsAdmin::class)->middleware('role:admin,employee,midwife')->group(function () {
    Route::get('complaint-message', 'index');
    Route::get('complaint-message/{id}', 'show')->name('complaint.show');
    Route::put('complaint-message/{complaints}/process', 'process')->name('complaint.process');
    Route::put('complaint-message/{complaints}/finished', 'finished')->name('complaint.finished');
    Route::put('complaint-message/{complaints}/reject', 'reject')->name('complaint.reject');
});


Route::controller(KegiatanPosyandu::class)->middleware('role:admin,employee')->group(function () {
    Route::get('kegiatan', 'index')->name('kegiatan');
});
Route::controller(TugasAbsensi::class)->middleware('role:admin,employee')->group(function () {
    Route::get('Tugas-absensi', 'index')->name('tugasAbsensi');
});
Route::controller(PmtPosyandu::class)->middleware('role:admin,employee')->group(function () {
    Route::get('pmt', 'index')->name('pmt');
});
Route::controller(InventarisPosyandu::class)->middleware('role:admin,employee')->group(function () {
    Route::get('inventaris', 'index')->name('inventaris');
});
Route::controller(StockBahan::class)->middleware('role:admin,employee')->group(function () {
    Route::get('stockbahan', 'index')->name('stockbahan');
});
Route::controller(KiaKms::class)->middleware('role:admin,employee')->group(function () {
    Route::get('kia-kms', 'index')->name('kiadankms');
});
Route::controller(KeuanganPosyandu::class)->middleware('role:admin,employee')->group(function () {
    Route::get('keuangan', 'index')->name('keuangan');
});
Route::controller(PusWus::class)->middleware('role:admin,employee')->group(function () {
    Route::get('puswus', 'index')->name('puswus');
});
Route::controller(IbuHamil::class)->middleware('role:admin,employee')->group(function () {
    Route::get('ibuhamil', 'index')->name('ibu.hamil');
});
Route::controller(Penyuluhan::class)->middleware('role:admin,employee')->group(function () {
    Route::get('penyuluhan', 'index')->name('penyuluhan');
});
Route::controller(Sdidtk::class)->middleware('role:admin,employee')->group(function () {
    Route::get('sditdk', 'index')->name('sditdk');
});
Route::controller(JaminanKesehatan::class)->middleware('role:admin,employee')->group(function () {
    Route::get('jaminanKesehatan', 'index')->name('jaminan.kesehatan');
});
Route::controller(Kunjungan::class)->middleware('role:admin,employee')->group(function () {
    Route::get('kunjungan', 'index')->name('kunjungan');
});
Route::controller(RekapitulasiEvaluasi::class)->middleware('role:admin,employee')->group(function () {
    Route::get('rekapitulasiEvaluasi', 'index')->name('rekapitulasi.evaluasi');
});
Route::controller(SKDN::class)->middleware('role:admin,employee')->group(function () {
    Route::get('skdn', 'index')->name('skdn');
});
Route::controller(NotulenRapat::class)->middleware('role:admin,employee')->group(function () {
    Route::get('notulenRapat', 'index')->name('notulen.rapat');
});
