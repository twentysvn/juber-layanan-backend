<?php

use App\Http\Controllers\AlamatMerchantController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\FoodishProductController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\NPWPController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\VoucherController;
use App\Models\FoodishProduct;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('alamat', [AlamatMerchantController::class, 'index']);
Route::get('alamat/{id}', [AlamatMerchantController::class, 'show']);
Route::get('alamat/idrs/{idrs}', [AlamatMerchantController::class, 'byidrs']);
Route::post('alamat', [AlamatMerchantController::class, 'store']);
Route::put('alamat/{id}', [AlamatMerchantController::class, 'update']);
Route::delete('alamat/{id}', [AlamatMerchantController::class, 'destroy']);

Route::get('merchant', [MerchantController::class, 'index']);
Route::get('merchant/foodish', [MerchantController::class, 'foodish']);
Route::get('merchant/layanan', [MerchantController::class, 'layanan']);
Route::get('merchant/foodish/idrs/{idrs}', [MerchantController::class, 'foodishidrs']);
Route::get('merchant/layanan/idrs/{idrs}', [MerchantController::class, 'layananidrs']);
Route::get('merchant/{id}', [MerchantController::class, 'show']);
Route::get('merchant/idrs/{idrs}', [MerchantController::class, 'byidrs']);
Route::post('merchant', [MerchantController::class, 'store']);
Route::put('merchant/{id}', [MerchantController::class, 'update']);
Route::put('merchant/idrs/{idrs}', [MerchantController::class, 'updatebyidrs']);
Route::delete('merchant/{id}', [MerchantController::class, 'destroy']);

Route::get('foodish/product', [FoodishProductController::class, 'index']);
Route::get('foodish/product/{id}', [FoodishProductController::class, 'show']);
Route::get('foodish/product/idrs/{idrs}', [FoodishProductController::class, 'byidrs']);
Route::post('foodish/product', [FoodishProductController::class, 'store']);
Route::put('foodish/product/{id}', [FoodishProductController::class, 'update']);
Route::delete('foodish/product/{id}', [FoodishProductController::class, 'destroy']);
Route::post('foodish/product/search', [FoodishProductController::class, 'search']);

Route::get('rekening', [RekeningController::class, 'index']);
Route::get('rekening/{id}', [RekeningController::class, 'show']);
Route::get('rekening/idrs/{idrs}', [RekeningController::class, 'byidrs']);
Route::post('rekening', [RekeningController::class, 'store']);
Route::put('rekening/{id}', [RekeningController::class, 'update']);
Route::delete('rekening/{id}', [RekeningController::class, 'destroy']);

Route::get('npwp', [NPWPController::class, 'index']);
Route::get('npwp/{id}', [NPWPController::class, 'show']);
Route::get('npwp/idrs/{idrs}', [NPWPController::class, 'byidrs']);
Route::post('npwp', [NPWPController::class, 'store']);
Route::put('npwp/{id}', [NPWPController::class, 'update']);
Route::delete('npwp/{id}', [NPWPController::class, 'destroy']);

Route::get('voucher', [VoucherController::class, 'index']);
Route::get('voucher/toko', [VoucherController::class, 'alltoko']);
Route::get('voucher/produk', [VoucherController::class, 'allproduk']);
Route::get('voucher/{id}', [VoucherController::class, 'show']);
Route::get('voucher/idrs/{idrs}', [VoucherController::class, 'byidrs']);
Route::put('voucher/{id}', [VoucherController::class, 'update']);
Route::delete('voucher/{id}', [VoucherController::class, 'destroy']);
Route::post('voucher', [VoucherController::class, 'store']);

Route::get('diskon', [DiskonController::class, 'index']);
Route::get('diskon/{id}', [DiskonController::class, 'show']);
Route::get('diskon/idrs/{idrs}', [DiskonController::class, 'byidrs']);
Route::post('diskon', [DiskonController::class, 'store']);
Route::put('diskon/{id}', [DiskonController::class, 'update']);
Route::delete('diskon/{id}', [DiskonController::class, 'destroy']);
