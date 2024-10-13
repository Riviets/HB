<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
Route::get('/hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::get('/hotels/sorted', [HotelController::class, 'sortByRating'])->name('hotels.sorted');


Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');


Route::get('/rooms/{room}/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::resource('bookings', BookingController::class);
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/get-rooms/{hotelId}', [BookingController::class, 'getRooms']);
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');


Route::resource('users', UserController::class);
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Auth::routes();
