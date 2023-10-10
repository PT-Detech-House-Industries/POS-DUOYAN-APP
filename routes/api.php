<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MemberController;

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

Route::get('/member', [MemberController::class, 'index']);
Route::post('/member/store', [MemberController::class, 'store']);
Route::get('/member/{id}/show', [MemberController::class, 'show']);
Route::put('/member/{id}/update', [MemberController::class, 'update']);
Route::delete('/member/{id}/delete', [MemberController::class, 'destroy']);

