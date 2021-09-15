<?php
use API\UserController;
use API\SellsController;
use API\PurchasesController;
use API\SupplierController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'admin'],function (){
    Route::post('login', 'API\AdminAuthController@index');
    // you masy login in system 
    Route::middleware('auth:admin-api')->group(function(){
        Route::post('logout','API\AdminAuthController@logout');
        Route::apiResource('Receipt','API\ReceiptController')->middleware('can:receipts');
        Route::apiResource('Fee','API\FeeController')->middleware('can:fees');
        Route::apiResource('Admin','API\AdminController')->middleware('can:admins');
        Route::apiResource('Store','API\StoreController')->middleware('can:stores');
        Route::apiResource('Product','API\ProductController')->middleware('can:products');
        Route::apiResource('Tax','API\TaxController')->middleware('can:taxes');
        Route::apiResource('Role','API\RoleController')->middleware('can:roles');
    });
});

Route::apiResource('user','API\UserController');
Route::apiResource('sells','API\SellsController');
Route::apiResource('purchases','API\PurchasesController');
// check supplier error
Route::apiResource('supplier','API\SupplierController');

Route::Post('clientreports','API\ReportsController@index');





