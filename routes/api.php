<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\MemberDataPersonalController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\MemberDataAwardController;
use App\Http\Controllers\API\MemberNotedAwardController;
use App\Http\Controllers\API\MemberPurchasing;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() { return 'API Sukses'; });
// Profile
Route::get('/profile', function(){ return 'untuk ringkasan profile'; });
// Purchasing
Route::get('/member-purchasing', function() { return 'untuk ringkasan'; });
Route::post('/member-purchasing/store', [MemberPurchasing::class, 'store']);
// Award
Route::get('/member-noted-award', [MemberNotedAwardController::class, 'index']);
Route::post('/member-noted-award/store', [MemberNotedAwardController::class, 'store']);
// Award
Route::get('/member-award', [MemberDataAwardController::class, 'index']);
Route::post('/member-award/store', [MemberDataAwardController::class, 'store']);
// Produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/store', [ProdukController::class, 'store']);
// Personal
Route::get('/member-personal', [MemberDataPersonalController::class, 'index']);
Route::post('/member-personal/store', [MemberDataPersonalController::class, 'store']);
Route::get('/member-personal/{id}/show', [MemberDataPersonalController::class, 'show']);
Route::put('/member-personal/{id}/update', [MemberDataPersonalController::class, 'update']);
Route::delete('/member-personal/{id}/delete', [MemberDataPersonalController::class, 'destroy']);

Route::get('/member', [MemberController::class, 'index']);
Route::post('/member/store', [MemberController::class, 'store']);
Route::get('/member/{id}/show', [MemberController::class, 'show']);
Route::put('/member/{id}/update', [MemberController::class, 'update']);
Route::delete('/member/{id}/delete', [MemberController::class, 'destroy']);