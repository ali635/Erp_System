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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'admin'],function (){
    Route::post('login', 'API\AdminController@index');
    // you masy login in system 
    Route::middleware('auth:admin-api')->group(function(){
        Route::post('logout','API\AdminAuthController@logout');
        Route::apiResource('Receipt','API\ReceiptController');
        Route::apiResource('Fee','API\FeeController');
        Route::apiResource('Admin','API\AdminController');
        
    });
});
