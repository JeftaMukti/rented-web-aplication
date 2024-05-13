<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontrakanController;
use App\Http\Controllers\PengontrakController;
use App\Http\Controllers\PenyewaanController;
use App\Models\Kontrakan;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home',[HomeController::class, 'index']);
    //Kontrakan Route
    Route::get('house',[KontrakanController::class, 'index']);
    Route::get('house/create',[KontrakanController::class, 'create']);
    Route::post('house-create',[KontrakanController::class, 'store']);
    Route::get('house-edit/{id}',[KontrakanController::class,'edit']);
    Route::post('update/{id}',[KontrakanController::class,'update']);
    Route::get('delete/{id}',[KontrakanController::class,'destroy']);
    //Pengontrak Route
    Route::get('user',[PengontrakController::class, 'index']);
    Route::get('user-create',[PengontrakController::class, 'create']);
    Route::post('user-create',[PengontrakController::class, 'store']);
    Route::get('user-edit/{id}',[PengontrakController::class, 'edit']);
    Route::post('user-update/{id}',[PengontrakController::class, 'update']);
    Route::get('user-delete/{id}',[PengontrakController::class, 'destroy']);
    //Penyewaan Route
    Route::get('penyewaan',[PenyewaanController::class, 'index']);
    Route::get('penyewaan-create',[PenyewaanController::class, 'create']);
    Route::post('penyewaan-create',[PenyewaanController::class, 'store']);
    Route::delete('penyewaan-cancel/{id}',[PenyewaanController::class, 'cancel']);
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});
