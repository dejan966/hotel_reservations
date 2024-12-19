<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::post('/reservations', [ReservationController::class, 'createReservartions'])->name('reservations.create');
