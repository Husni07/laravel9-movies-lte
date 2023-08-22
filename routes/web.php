<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\TransactionController;

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

// Route::get('/', function () {
//     return view('p');
// });

Route::view('/', 'p');

Route::group(['prefix' => 'admin'], function () {

    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::get('transaction', [TransactionController::class, 'index'])->name('admin.transaction');

    Route::group(['prefix' => 'movie'], function () {

        Route::get('/', [MoviesController::class, 'index'])->name('admin.movie');
        Route::get('/create', [MoviesController::class, 'create'])->name('admin.movie.create');
        Route::post('/store', [MoviesController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}', [MoviesController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}', [MoviesController::class, 'update'])->name('admin.movie.update');
        Route::delete('/delete/{id}', [MoviesController::class, 'destroy'])->name('admin.movie.destroy');
    });
});