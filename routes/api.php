<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =======================
// PUBLIC ROUTE (NO JWT)
// =======================

// Authentication
Route::post('/login', [AuthController::class, 'login']);

// =======================
// PROTECTED ROUTES (JWT)
// =======================

Route::group(['middleware' => ['jwt.verify']], function () {

    // Token check
    Route::get('/cek-token', [AuthController::class, 'cek_token']); // kalau pakai UserController juga bisa

    // Products CRUD
    Route::apiResource('/products', ProductController::class);

});