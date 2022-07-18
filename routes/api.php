<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\DressesController;
use App\Http\Controllers\ReviewsController;

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


Route::apiResource('dresses', DressesController::class);

Route::apiResource('reviews', ReviewsController::class);

 Route::apiResource('shoes', ShoesController::class);
Route::post('reviews/models/{id}', [ReviewsController::class, 'store']);

Route::post('reviews/dress/{dress}', [DressesController::class, 'addDressReview']);

Route::post('reviews/shoe/{shoe}', [ShoesController::class, 'addShoeReview']);