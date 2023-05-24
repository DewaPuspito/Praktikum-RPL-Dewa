<?php

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/pesan/{id}' , [\App\Http\Controllers\KirimController::class , 'store'])->name('pesan');
Route::prefix('admin')->group(function () {
   Route::get('/index' , [\App\Http\Controllers\AdminController::class , 'index'])->name('admin.index');
   Route::get('/addItem' , [\App\Http\Controllers\AdminController::class , 'add'])->name('admin.additem');
    Route::post('/addItem' , [\App\Http\Controllers\AdminController::class , 'store'])->name('admin.additem');
    Route::get('/updateItem/{id}' , [\App\Http\Controllers\AdminController::class , 'put'])->name('admin.updateitem');
    Route::post('/updateItem/{id}' , [\App\Http\Controllers\AdminController::class , 'update'])->name('admin.updateitem');
    Route::get('/deleteItem/{id}', [\App\Http\Controllers\AdminController::class , 'delete'])->name('admin.deleteitem');

    Route::post('/addJadwal/{id}', [\App\Http\Controllers\JadwalController::class , 'store'])->name('admin.addjadwal');
    Route::post('/updateJadwal/{id}', [\App\Http\Controllers\JadwalController::class , 'update'])->name('admin.updatejadwal');
    Route::get('/deleteJadwal/{id}', [\App\Http\Controllers\JadwalController::class , 'delete'])->name('admin.deletejadwal');


    Route::post('/konfirm/{id}' , [\App\Http\Controllers\KirimController::class , 'confirm'])->name('admin.confirm');
});

Route::prefix('kurir')->group(function (){
   Route::get('/index' , [\App\Http\Controllers\KurirController::class , 'index'])->name('kurir.index');
   Route::get('/pickup/{id}' , [\App\Http\Controllers\KirimController::class , 'pickup'])->name('kurir.pickup');
});


Route::get('dashboard' , [\App\Http\Controllers\HomeController::class , 'dashboard'])->name('dashboard');
Route::get('/terima/{id}' , [\App\Http\Controllers\KirimController::class , 'antar'])->name('terima');


Route::post('/search/' , [\App\Http\Controllers\HomeController::class , 'search'])->name('search');
