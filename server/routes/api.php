<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('restourant/store',[App\Http\Controllers\API\V1\Members\MemberController::class,'store']);
Route::post('members/all',[App\Http\Controllers\API\V1\Members\MemberController::class,'all']);
Route::post('restourant/update',[App\Http\Controllers\API\V1\Members\MemberController::class,'update']);
Route::put('restourant/edit',[App\Http\Controllers\API\V1\Members\MemberController::class,'edit']);
Route::post('restourant/delete',[App\Http\Controllers\API\V1\Members\MemberController::class,'destroy']);