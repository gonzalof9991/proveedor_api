<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('v1/products', \App\Http\Controllers\Api\V1\ProductController::class);
Route::apiResource('v1/categories', \App\Http\Controllers\Api\V1\CategoryController::class);
Route::apiResource('v1/tickets', \App\Http\Controllers\Api\V1\TicketControler::class);
Route::apiResource('v1/users', \App\Http\Controllers\Api\V1\UserController::class);
Route::apiResource('v1/types_of_users', \App\Http\Controllers\Api\V1\TypeOfUserController::class);
Route::apiResource('v1/stock/products', \App\Http\Controllers\Api\V1\Stock\ProductController::class);
Route::apiResource('v1/products_tickets', \App\Http\Controllers\Api\V1\ProductTicketController::class);
Route::apiResource('v1/facturas', \App\Http\Controllers\Api\V1\Contabilidad\FacturaController::class);



