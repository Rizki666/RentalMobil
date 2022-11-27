<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Menampilkan Semuanya
Route::get('rentals', [RentalController::class, 'index']);

//Menampilkan data yang dipilih
Route::get('rentals/{id}', [RentalController::class, 'show']);

//Menambahkan data
Route::post('rentals', [RentalController::class, 'store']);

//Mengedit data
Route::put('rentals/{id}', [RentalController::class, 'update']);

//Menghapus data
Route::delete('rentals/{id}', [RentalController::class, 'destroy']);


Route::get('transaksis', [TransaksiController::class, 'index']);
Route::get('transaksis/{id}', [TransaksiController::class, 'show']);
Route::post('transaksis', [TransaksiController::class, 'store']);
Route::put('transaksis/{id}', [TransaksiController::class, 'update']);
Route::delete('transaksis/{id}', [TransaksiController::class, 'destroy']);

Route::resource('rentals', RentalController::class)->except(
    ['create', 'edit']
);
Route::resource('transaksis', TransaksiController::class)->except(
    ['create', 'edit']
);    