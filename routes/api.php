<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;

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


Route::group(['prefix' => 'product'], function () {

    Route::post('add', [ProductController::class, 'addProduct']);
    Route::put('edit', [ProductController::class, 'editProduct']);
    Route::delete('delete/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('getAll', [ProductController::class, 'getAllProduct']);
    Route::get('getAllSupplier', [ProductController::class, 'getAllSupplier']);

});

Route::group(['prefix' => 'order'], function () {

    Route::post('add', [OrderController::class, 'addOrder']);
    Route::put('edit', [OrderController::class, 'editOrder']);
    Route::delete('delete/{id}', [OrderController::class, 'deleteOrder']);
    Route::get('getAll', [OrderController::class, 'getAllOrder']);
    Route::get('getAllCustomer', [OrderController::class, 'getAllCustomer']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
