<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Enums\HttpStatusCodesEnum;
use App\Helpers\HttpResponses;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::any('/', [HomeController::class,'welcome']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:sanctum']);

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::any('/', [HomeController::class,'index'])->middleware('throttle:1,0.033');
});

# Def
Route::fallback(action: function () {
    return HttpResponses::error(null,null,HttpStatusCodesEnum::NotFound,HttpStatusCodesEnum::NotFound);
});

// ----------------------------------------------------------------
// Users
// ----------------------------------------------------------------
Route::apiResource('/users',UserController::class)->middleware(['auth:sanctum']);
Route::apiResource('/books',BookController::class)->middleware(['auth:sanctum']);
Route::apiResource('/loans',LoanController::class)->middleware(['auth:sanctum']);
