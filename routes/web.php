<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\RangkingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', function () {
    return view('myhome');
});
//auth
Route::get('/logout', [AuthController::class, 'logout'])->name('getlogout');
Route::get('/login', [AuthController::class, 'login'])->name('getlogin');
Route::get('/register', [AuthController::class, 'register'])->name('getregister');
Route::post('/post_register', [AuthController::class, 'post_register'])->name('post_register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('postlogin');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['cekAuth:admin,guru,kepala_sekolah']], function () {
        Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::group(['prefix' => 'kriteria', 'as' => 'kriteria.'], function () {
                $class = KriteriaController::class;

                Route::get('/', [$class, 'index'])->name('index');
                Route::get('/create', [$class, 'create'])->name('create');
                Route::post('/store', [$class, 'store'])->name('store');
                Route::post('/update', [$class, 'update'])->name('update');

                Route::get('/edit', [$class, 'edit'])->name('edit');
                Route::post('/delete/{id}', [$class, 'destroy'])->name('delete');


                Route::get('/parameter', [$class, 'parameter'])->name('parameter');
                Route::post('/sub_delete/{id}', [$class, 'sub_destroy'])->name('sub_delete');
                Route::post('/parameter/store', [$class, 'parameter_store'])->name('parameter_store');
            });

            Route::group(['prefix' => 'konfigurasi', 'as' => 'konfigurasi.'], function () {
                $class = KonfigurasiController::class;
    
                Route::get('/', [$class, 'index'])->name('index');
                Route::get('/create', [$class, 'create'])->name('create');
                Route::post('/store', [$class, 'store'])->name('store');
    
                Route::get('/edit', [$class, 'edit'])->name('edit');
                Route::post('/delete', [$class, 'destroy'])->name('delete');
            });
    //     });
    // });
    // Route::group(['middleware' => ['cekAuth:admin,guru']], function () {
    //     Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');

    //     Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //         //nanda area
            Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
                $class = SiswaController::class;

                Route::get('/', [$class, 'index'])->name('index');
                Route::get('/create', [$class, 'create'])->name('create');
                Route::post('/store', [$class, 'store'])->name('store');
                Route::post('/update', [$class, 'update'])->name('update');
                Route::get('/edit', [$class, 'edit'])->name('edit');
                Route::post('/delete', [$class, 'destroy'])->name('delete');
                Route::get('/cek/{id}', [$class, 'cek'])->name('cek');

                Route::get('/penilaian', [$class, 'penilaian'])->name('penilaian');
                Route::Post('/penilaian_store', [$class, 'penilaian_store'])->name('penilaian.store');

            });
            Route::group(['prefix' => 'penilaian', 'as' => 'penilaian.'], function () {
                $class = PenilaianController::class;
                Route::get('/', [$class, 'index'])->name('index');
            });
    //     });
    // });
    // Route::group(['middleware' => ['cekAuth:admin,guru,kepala_sekolah']], function () {
    //     Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');

    //     Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

            Route::get('/password', [AuthController::class, 'admin_password_get'])->name('password_get');
            Route::post('/password', [AuthController::class, 'admin_password_post'])->name('password_post');
            Route::group(['prefix' => 'rangking', 'as' => 'rangking.'], function () {
                $class = RangkingController::class;
    
                Route::get('/', [$class, 'getRangkingData'])->name('index');
            });
    //     });
    // });
    // Route::group(['middleware' => ['cekAuth:admin,kepala_sekolah']], function () {
    //     Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');

    //     Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function () {
                $class = RangkingController::class;
                Route::get('/', [$class, 'laporan'])->name('index');
                Route::get('/cetak/{numberOfStudents}', [$class, 'cetak'])->name('cetak');

                
            });
        });
    });

}); //'middleware' => 'auth'
