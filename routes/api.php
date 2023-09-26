<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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

Route::get('getuser',[MemberController::class,'getUser']);
Route::post('register',[MemberController::class,'register']);
Route::get('getUserById/{id}',[MemberController::class,'getUserById']);
Route::get('search',[MemberController::class,'search']);
Route::get('searchform',[MemberController::class,'searchform']);
Route::post('login',[MemberController::class,'login']);