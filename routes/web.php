<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RumahController;
use App\Models\Rumah;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home',[HomeController::class, 'index']);
    Route::get('house',[RumahController::class, 'index']);
    Route::get('house/create',[RumahController::class, 'create']);
    Route::post('house-create',[RumahController::class, 'store']);
    Route::get('house-edit/{id}',[RumahController::class,'edit']);
    Route::post('update',[RumahController::class,'update']);
    Route::get('delete/{id}',[RumahController::class,'destroy']);
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});
    