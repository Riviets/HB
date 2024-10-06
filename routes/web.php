<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
