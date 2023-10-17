<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\MemberDataPersonalController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\MemberDataAwardController;
use App\Http\Controllers\API\MemberNotedAwardController;
use App\Http\Controllers\API\MemberPurchasingController;
use App\Http\Controllers\API\MemberStampleController;
use App\Http\Controllers\API\MemberClaimStampleController;
use App\Http\Controllers\API\AuthController;
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

Route::get('/', function() { return 'API Berhasil Gess'; });
// Profile
Route::get('/profile', function(){ return 'untuk ringkasan profile'; });

// register
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']); 

Route::middleware('auth:sanctum')->group(function () {
  //logout
  Route::get('/logout', [AuthController::class, 'logout']);
  
  // Member
  Route::get('/member', [MemberController::class, 'index']);
  Route::post('/member/store', [MemberController::class, 'store']);
  Route::get('/member/{id}/show', [MemberController::class, 'show']);
  Route::put('/member/{id}/update', [MemberController::class, 'update']);
  Route::delete('/member/{id}/delete', [MemberController::class, 'destroy']);
  
  // Personal
  Route::get('/member-personal', [MemberDataPersonalController::class, 'index']);
  Route::post('/member-personal/store', [MemberDataPersonalController::class, 'store']);
  Route::get('/member-personal/{id}/show', [MemberDataPersonalController::class, 'show']);
  Route::put('/member-personal/{id}/update', [MemberDataPersonalController::class, 'update']);
  Route::delete('/member-personal/{id}/delete', [MemberDataPersonalController::class, 'destroy']);

  // Award
  Route::get('/member-award', [MemberDataAwardController::class, 'index']);
  Route::post('/member-award/store', [MemberDataAwardController::class, 'store']);

  // Noted Award
  Route::get('/member-noted-award', [MemberNotedAwardController::class, 'index']);
  Route::post('/member-noted-award/store', [MemberNotedAwardController::class, 'store']);

  // Stample
  Route::get('/member-stample', [MemberStampleController::class, 'index']);
  Route::post('/member-stample/store', [MemberStampleController::class, 'store']);

  // Stample Claim
  Route::get('/member-stample-claim', [MemberClaimStampleController::class, 'index']);
  Route::post('/member-stample-claim/store', [MemberClaimStampleController::class, 'store']);
});

// Purchasing
// Route::get('/member-purchasing', function() { return 'untuk ringkasan'; });
Route::get('/member-purchasing', [MemberPurchasingController::class, 'index']);
Route::post('/member-purchasing/store', [MemberPurchasingController::class, 'store']);

// Produk
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{id}/show', [ProductController::class, 'show']);