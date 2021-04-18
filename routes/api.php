<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\News;



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


Route::get('/getusers/', 'App\Http\Controllers\UsController@getUsers');
Route::post('/addusers/', 'App\Http\Controllers\UsController@addUser');
Route::patch('/apdateusers/', 'App\Http\Controllers\UsController@apdateUser');
Route::get('/registuгser/', 'App\Http\Controllers\UsController@registrUser');
Route::get('/autorizusers/','App\Http\Controllers\UsController@autorizUser');

//========================================================================================================//

Route::get('/getpoducts/', 'App\Http\Controllers\ProdController@getProd');
Route::post('/addpoducts/', 'App\Http\Controllers\ProdController@addProd');
Route::post('/deletepoducts/', 'App\Http\Controllers\ProdController@deleteProd');

//========================================================================================================//

Route::post('/registrvalid/','App\Http\Controllers\UsController@registrValid');
Route::post('/loginvalid/','App\Http\Controllers\UsController@loginValid');
Route::post('/logoutvalid/','App\Http\Controllers\UsController@logoutValid');