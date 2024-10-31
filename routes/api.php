<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\Apiresponse;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/status", function(){
    return Apiresponse::success('API is running');
})->middleware('auth:sanctum');



Route::apiResource('clients', ClientController::class)->middleware('auth:sanctum');
// auth route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
