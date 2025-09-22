<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('rooms',[RoomController::class,'apiIndex']);
Route::get('rooms/{room}',[RoomController::class,'apiShow']);
Route::post('rooms',[RoomController::class,'apiStore']);
Route::put('rooms/{room}',[RoomController::class,'apiUpdate']);
Route::delete('rooms/{room}',[RoomController::class,'apiDestroy']);
