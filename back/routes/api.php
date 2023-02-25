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

Route::post('/register', \App\Http\Controllers\RegisterController::class);
Route::post('/auth', \App\Http\Controllers\AuthController::class);

Route::get('/category', [\App\Http\Controllers\API\CategoryController::class, 'index']);
Route::get('/subcategory/{category}', [\App\Http\Controllers\API\SubcategoryController::class, 'index']);
Route::get('/product/{subcategory}', [\App\Http\Controllers\API\ProductController::class, 'index']);
Route::get('/getSize/{product}/{color}', [\App\Http\Controllers\API\ProductController::class, 'getSize']);

Route::post('/fast_register', [\App\Http\Controllers\API\RegisterController::class, 'fastRegister']);
Route::post('/full_register', [\App\Http\Controllers\API\RegisterController::class, 'register']);
Route::get('/get/verf/{user}', [\App\Http\Controllers\API\RegisterController::class, 'verification']);
Route::post('/search/product', [\App\Http\Controllers\API\SearchController::class, 'searchProduct']);


Route::post('/basket/addProduct', [\App\Http\Controllers\API\BasketController::class, 'addProduct']);

Route::post('/review', [\App\Http\Controllers\API\ReviewController::class, 'create']);
Route::post('/favorite', [\App\Http\Controllers\API\FavoriteController::class, 'create']);
Route::get('/get/favorite/{user}', [\App\Http\Controllers\API\FavoriteController::class, 'index']);


