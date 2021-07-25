<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
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


Route::get('getdata', [ApiController::class, 'getData']); // api/getdata to access page in browser

//Route::get('getproducts', [ApiController::class, 'getProducts']);

Route::get('getproducts/{id?}', [ApiController::class, 'getProducts']); //with parameters, ? for no parameter

Route::post('insertproduct', [ApiController::class, 'insertProduct']);

Route::put('updateproduct', [ApiController::class, 'updateProduct']); //update

Route::delete('deleteproduct/{id}', [ApiController::class, 'deleteProduct']); //delete

Route::get('search/{data?}', [ApiController::class, 'searchProducts']); 
