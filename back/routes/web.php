<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/test', TestController::class);

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('ad.index');

    Route::group(['prefix' => 'category'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/{category_id}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.category.show');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    });
    Route::group(['prefix' => 'subcategory'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\SubcategoryController::class, 'index'])->name('admin.subcategory.index');
        Route::post('/', [\App\Http\Controllers\Admin\SubcategoryController::class, 'store'])->name('admin.subcategory.store');
    });
    Route::group(['prefix' => 'color'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\ColorController::class, 'index'])->name('admin.color.index');
        Route::post('/', [\App\Http\Controllers\Admin\ColorController::class, 'store'])->name('admin.color.store');
    });
    Route::group(['prefix' => 'size'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\SizeController::class, 'index'])->name('admin.size.index');
        Route::post('/', [\App\Http\Controllers\Admin\SizeController::class, 'store'])->name('admin.size.store');
    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
        Route::post('/', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.show');
        Route::post('/product/create/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'productCreate'])->name('admin.product.createProduct');
        Route::post('/product/add/photo/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'addPhoto'])->name('admin.product.addPhoto');
    });

    Route::group(['prefix' => 'comment'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\CommentsController::class, 'index'])->name('admin.comments.index');
    });

    Route::group(['prefix' => 'user'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
    });
    Route::post('/add/comment',[\App\Http\Controllers\Admin\CommentsController::class, 'addComment'])->name('user.comment');
    Route::post('/add/comment/image',[\App\Http\Controllers\Admin\CommentsController::class, 'addImage'])->name('user.comment.image');
    Route::get('/get/comments/{product}', [\App\Http\Controllers\Admin\CommentsController::class, 'getComments'])->name('admin.getComments');
});
