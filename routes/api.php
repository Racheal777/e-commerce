<?php

use App\Http\Controllers\BagsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\DressesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;

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

Route::apiResource('users', UserController::class);

Route::apiResource('dresses', DressesController::class);

Route::apiResource('reviews', ReviewsController::class);

Route::apiResource('bags', BagsController::class);

Route::apiResource('shoes', ShoesController::class);

Route::apiResource('posts', PostController::class);



Route::post('reviews/models/{id}', [ReviewsController::class, 'store']);

Route::post('reviews/dresses/{dress}', [DressesController::class, 'addDressReview']);

Route::post('reviews/shoes/{shoe}', [ShoesController::class, 'addShoeReview']);

Route::post('reviews/bag/{bag}', [BagsController::class, 'addBagsReview']);