<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\UserController;

Route::get('/', fn()=>redirect()->route('rooms.index'));
Route::resource('rooms', RoomController::class);
Route::resource('tenants', TenantController::class);
Route::resource('profile', ProfileController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('maintenance', MaintenanceRequestController::class);//Route::resource('users', UserController::class);
//Route::resource('users', UserController::class);
