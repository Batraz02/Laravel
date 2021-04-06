<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\News;

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
Route::get('/getuser/','UserController@getUser');
Route::post('/adduser/','UserController@addUser');
Route::patch('/updateuser/','UserController@updateUser');
Route::get('/registruser/','UserController@registerUser');
Route::get('/singuser/','UserController@singUser');
