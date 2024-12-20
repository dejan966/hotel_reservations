<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::post('/reservations', [ReservationController::class, 'createReservartions'])->name('reservations.create');
Route::get('/rooms/edit/{id}', [RoomController::class, 'openEdit'])->name('room.edit');
Route::post('/rooms/edit/{id}', [RoomController::class, 'updateRoom'])->name('room.update');
