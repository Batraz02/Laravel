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
Route::post('/adduser/','UserController@addUser');
Route::get('/getuser/','UserController@getUser');
Route::patch('/updateuser/','UserController@updateUser');
Route::get('/registruser/','UserController@registerUser');
Route::get('/singuser/','UserController@singUser');


Route::post('/registervalid/','UserController@registerValid');
Route::post('/loginvalid/','UserController@loginValid');
Route::post('/logoutvalid/','UserController@logoutValid');


Route::get('/getproduct/','ProductsController@getProduct');
Route::get('/addproduct/','ProductsController@addProduct');
Route::post('/deleteproduct/','ProductsController@deleteProduct');
