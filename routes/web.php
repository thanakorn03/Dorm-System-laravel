<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// หน้า homepage redirect ไป rooms
Route::get('/', fn() => redirect()->route('rooms.index'));

// Public routes (login/register)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes ที่ต้อง login
Route::middleware('auth')->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::resource('tenants', TenantController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('maintenance', MaintenanceRequestController::class);
});


