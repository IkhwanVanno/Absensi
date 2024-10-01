<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, "dashboard"]);
Route::get('/riwayat', [IndexController::class,'riwayat']);
Route::get('/absen', [IndexController::class, "absen"]);
Route::get('/profil', [IndexController::class, "profil"]);
Route::get('/login', [MahasiswaController::class, 'index']);

Route::get('/get-cookie', function () {
    $userName = request()->cookie('user_name');
    return "User Name: $userName";
});

Route::post('/absensi', [RiwayatController::class, 'store']);
Route::post('/logining', [IndexController::class, 'login']);
Route::get('/logout', [IndexController::class, 'logout']);