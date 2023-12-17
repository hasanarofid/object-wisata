<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
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


Route::get('/ubah-password', [App\Http\Controllers\UbahpasswordController::class, 'ubah'])->name('ubah-password');
Route::post('/update-password', [App\Http\Controllers\UbahpasswordController::class, 'update'])->name('update-password');

Route::get('/', 'DashboardController@index')->name('home');
Route::get('/load-more', 'DashboardController@loadMore')->name('load-more');
Route::get('/cari-rekomendasi', 'DashboardController@carirekomendasi')->name('cari-rekomendasi');
Route::get('/detail/{id}/{no?}/{id_alternatif?}', 'DashboardController@detail')->name('detail');
Route::post('/ulasan', 'DashboardController@ulasan')->name('ulasan');
Route::get('/feed', 'DashboardController@sendfeed')->name('feed');
Route::get('/perhitungan', 'DashboardController@perhitungan')->name('perhitungan');
Route::get('/getNearestPantai', 'DashboardController@getNearestPantai')->name('pantai-terdekat');


Auth::routes();
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');


        // route user
        Route::prefix('user')->group(function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
            Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
            Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
            Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
            Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
         });
         // end route user

         // route feedback
        Route::prefix('feedback')->group(function () {
            Route::get('/', [App\Http\Controllers\FeedController::class, 'index'])->name('feedback.index');
         });
         // end route feedback

          // route pantai
        Route::prefix('pantai')->group(function () {
            Route::get('/', [App\Http\Controllers\PantaiController::class, 'index'])->name('pantai.index');
            Route::get('/create', [App\Http\Controllers\PantaiController::class, 'create'])->name('pantai.create');
            Route::get('/show/{id}', [App\Http\Controllers\PantaiController::class, 'show'])->name('pantai.show');
            Route::get('/edit/{id}', [App\Http\Controllers\PantaiController::class, 'edit'])->name('pantai.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\PantaiController::class, 'destroy'])->name('pantai.destroy');
            Route::post('/store', [App\Http\Controllers\PantaiController::class, 'store'])->name('pantai.store');
            Route::post('/update/{id}', [App\Http\Controllers\PantaiController::class, 'update'])->name('pantai.update');

         });
         // end route pantai

          // route fasilitas
        Route::prefix('fasilitas')->group(function () {
            Route::get('/', [App\Http\Controllers\FasilitasController::class, 'index'])->name('fasilitas.index');
            Route::get('/create', [App\Http\Controllers\FasilitasController::class, 'create'])->name('fasilitas.create');
            Route::get('/show/{id}', [App\Http\Controllers\FasilitasController::class, 'show'])->name('fasilitas.show');
            Route::get('/edit/{id}', [App\Http\Controllers\FasilitasController::class, 'edit'])->name('fasilitas.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
            Route::post('/store', [App\Http\Controllers\FasilitasController::class, 'store'])->name('fasilitas.store');
         });
         // end route fasilitas

        // route wahana
        Route::prefix('wahana')->group(function () {
            Route::get('/', [App\Http\Controllers\WahanaController::class, 'index'])->name('wahana.index');
            Route::get('/create', [App\Http\Controllers\WahanaController::class, 'create'])->name('wahana.create');
            Route::get('/show/{id}', [App\Http\Controllers\WahanaController::class, 'show'])->name('wahana.show');
            Route::get('/edit/{id}', [App\Http\Controllers\WahanaController::class, 'edit'])->name('wahana.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\WahanaController::class, 'destroy'])->name('wahana.destroy');
            Route::post('/store', [App\Http\Controllers\WahanaController::class, 'store'])->name('wahana.store');
       
         });
         // end route wahana

        // route kriteria
        Route::prefix('kriteria')->group(function () {
            Route::get('/', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria.index');
            Route::get('/create', [App\Http\Controllers\KriteriaController::class, 'create'])->name('kriteria.create');
            Route::get('/show/{id}', [App\Http\Controllers\KriteriaController::class, 'show'])->name('kriteria.show');
            Route::get('/edit/{id}', [App\Http\Controllers\KriteriaController::class, 'edit'])->name('kriteria.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\KriteriaController::class, 'destroy'])->name('kriteria.destroy');
            Route::post('/store', [App\Http\Controllers\KriteriaController::class, 'store'])->name('kriteria.store');
      
         });
         // end route kriteria

         // route alternatif
        Route::prefix('alternatif')->group(function () {
            Route::get('/', [App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif.index');
            Route::get('/create', [App\Http\Controllers\AlternatifController::class, 'create'])->name('alternatif.create');
            Route::get('/show/{id}', [App\Http\Controllers\AlternatifController::class, 'show'])->name('alternatif.show');
            Route::get('/edit/{id}', [App\Http\Controllers\AlternatifController::class, 'edit'])->name('alternatif.edit');
            Route::delete('/destroy/{id}', [App\Http\Controllers\AlternatifController::class, 'destroy'])->name('alternatif.destroy');
            Route::post('/store', [App\Http\Controllers\AlternatifController::class, 'store'])->name('alternatif.store');
        });
         // end route alternatif


    });


});




