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