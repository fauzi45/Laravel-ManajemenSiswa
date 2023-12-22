<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    //CRUD Students
    //Route to form input add   
    Route::get('/studentCrud/create', [StudentController::class, 'create']);
    //Route Simpan create inputan ke database
    Route::post('/studentCrud', [StudentController::class, 'store'])->name('studentstore');
    //Read
    //Route for show all data from database to view
    Route::get('/studentCrud/tampil', [StudentController::class, 'index']);
    //Route sesuai id
    Route::get('/studentCrud/{id}', [StudentController::class, 'show']);
    Route::post('/studentCrud/{id}/tambahnilai', [StudentController::class, 'tambahnilai']);
    Route::get('/studentCrud/{id}/{idmapel}/deletenilai',[StudentController::class,'deletenilai']);
    //Update
    Route::get('/studentCrud/{id}/edit', [StudentController::class, 'edit']);
    //Simpan Update Data ke database berdasarkan id
    Route::put('/studentCrud/{id}', [StudentController::class, 'update']);
    //Delete
    Route::delete('/studentCrud/{id}', [StudentController::class, 'destroy']);

    Route::resource('/matapelajaran',MapelController::class);
    Route::get('/matapelajaran/pdf-mapel/view',[MapelController::class,'download']);
    Route::resource('/guru',GuruController::class);
    Route::get('/guru/pdf-guru/view',[GuruController::class,'download']);
});

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/',[DashboardController::class,'index']);
});
Auth::routes();

