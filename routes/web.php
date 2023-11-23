<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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


Route::get('/', 'DashboardController@index')->name('home');
Route::get('/load-more', 'DashboardController@loadMore')->name('load-more');
Route::get('/cari-rekomendasi', 'DashboardController@carirekomendasi')->name('cari-rekomendasi');
Route::get('/detail/{id}', 'DashboardController@detail')->name('detail');


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
            Route::post('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
         });
         // end route user

          // route pantai
        Route::prefix('pantai')->group(function () {
            Route::get('/', [App\Http\Controllers\PantaiController::class, 'index'])->name('pantai.index');
            Route::get('/create', [App\Http\Controllers\PantaiController::class, 'create'])->name('pantai.create');
            Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('pantai.show');
            Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('pantai.edit');
            Route::post('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('pantai.destroy');
         });
         // end route pantai

          // route fasilitas
        Route::prefix('fasilitas')->group(function () {
            Route::get('/', [App\Http\Controllers\FasilitasController::class, 'index'])->name('fasilitas.index');
            Route::get('/create', [App\Http\Controllers\FasilitasController::class, 'create'])->name('fasilitas.create');
            Route::get('/show/{id}', [App\Http\Controllers\FasilitasController::class, 'show'])->name('fasilitas.show');
            Route::get('/edit/{id}', [App\Http\Controllers\FasilitasController::class, 'edit'])->name('fasilitas.edit');
            Route::post('/destroy/{id}', [App\Http\Controllers\FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
   
         });
         // end route fasilitas

        // route wahana
        Route::prefix('wahana')->group(function () {
            Route::get('/', [App\Http\Controllers\WahanaController::class, 'index'])->name('wahana.index');
            Route::get('/create', [App\Http\Controllers\WahanaController::class, 'create'])->name('wahana.create');
            Route::get('/show/{id}', [App\Http\Controllers\WahanaController::class, 'show'])->name('wahana.show');
            Route::get('/edit/{id}', [App\Http\Controllers\WahanaController::class, 'edit'])->name('wahana.edit');
            Route::post('/destroy/{id}', [App\Http\Controllers\WahanaController::class, 'destroy'])->name('wahana.destroy');
   
         });
         // end route wahana

        // route kriteria
        Route::prefix('kriteria')->group(function () {
            Route::get('/', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria.index');
            Route::get('/create', [App\Http\Controllers\KriteriaController::class, 'create'])->name('kriteria.create');
            Route::get('/show/{id}', [App\Http\Controllers\KriteriaController::class, 'show'])->name('kriteria.show');
            Route::get('/edit/{id}', [App\Http\Controllers\KriteriaController::class, 'edit'])->name('kriteria.edit');
            Route::post('/destroy/{id}', [App\Http\Controllers\KriteriaController::class, 'destroy'])->name('kriteria.destroy');
   
         });
         // end route kriteria

         // route alternatif
        Route::prefix('alternatif')->group(function () {
            Route::get('/', [App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif.index');
            Route::get('/create', [App\Http\Controllers\AlternatifController::class, 'create'])->name('alternatif.create');
            Route::get('/show/{id}', [App\Http\Controllers\AlternatifController::class, 'show'])->name('alternatif.show');
            Route::get('/edit/{id}', [App\Http\Controllers\AlternatifController::class, 'edit'])->name('alternatif.edit');
            Route::post('/destroy/{id}', [App\Http\Controllers\AlternatifController::class, 'destroy'])->name('alternatif.destroy');
         });
         // end route alternatif


    });


});




