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
Route::get('/user', [ApiController::class, 'index']);

Route::post('/signin', [ApiController::class, 'login']);

Route::post('/signup', [ApiController::class, 'register']);

Route::post('/edit/user/{id}', [ApiController::class, 'edit_user']);

Route::get('/post', [ApiController::class, 'post']);
