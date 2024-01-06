<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\UserController;

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
    return view('dashboard');
})->name('dashboard');


Route::prefix('/dataSurat')->name('data-klasifikasi-surat.')->group(function() {
    Route::get('/', [LetterTypeController::class, 'index'])->name('index');
    Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
    Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
    Route::get('/{id}', [LetterTypeController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LetterTypeController::class, 'update'])->name('update');
    Route::delete('/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
});

Route::prefix('/Staff')->name('Staff.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');


});
Route::prefix('/dataGuru')->name('dataGuru.')->group(function() {
    Route::get('/', [UserController::class, 'index2'])->name('index');
    Route::get('/create', [UserController::class, 'create2'])->name('create');
    Route::post('/store', [UserController::class, 'store2'])->name('store');
    Route::get('/{id}', [UserController::class, 'edit2'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update2'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy2'])->name('destroy');
});

    