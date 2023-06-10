<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('user', function () {
//     return User::all();
// });
// Route::get('user', [AuthController::class, 'user']);

// url api untuk akses seluruh data user
Route::get('/user', [ApiController::class, 'index']);

// url api untuk login
Route::post('/signin', [ApiController::class, 'login']);

// url api untuk register user baru
Route::post('/signup', [ApiController::class, 'register']);

// url api untuk menambahkan peminjaman
// tetapi belum bisa menambahkan barang dalam peminjaman (hanya membuat peminjaman saja)
Route::post('/lending', [ApiController::class, 'peminjaman']);

// url api untuk edit data user
Route::post('/edit/user/', [ApiController::class, 'updateProfile']);

// url api untuk akses seluruh data barang
Route::get('/post', [ApiController::class, 'post']);
