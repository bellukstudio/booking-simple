<?php

use App\Http\Controllers\Booking\BookingController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Booking\BookingForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::get('/booking', BookingForm::class)->name('booking');
        Route::get('/booking/payment/{id}', [BookingController::class, 'show'])->name('booking.payment');
        Route::get('/booking/success', function () {
            return view('booking.success');
        })->name('booking.success');
    });

    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

    Route::post('/midtrans/callback', [BookingController::class, 'callback']);



    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
