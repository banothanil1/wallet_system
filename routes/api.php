<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\API_controller;
use App\Models\Practise;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mydata',[API_controller::class,'firstApi']);
Route::get('mylist',[API_controller::class,'History_List']);
Route::get('List/{id?}',[API_controller::class,'List_ID'])->name('here');

Route::post('storedata',[API_controller::class,'storemethod']);
Route::post('updatedata/{name}',[API_controller::class,'updatemethod']);

Route::delete('deletedata',[API_controller::class,'Deletedata']);

Route::post('createUser',[API_controller::class,'createUser']);//checking third party post api

Route::put('updateUser/{id}',[API_controller::class,'updateUser']);//checking third party put api

Route::patch('patchUser/{id}',[API_controller::class,'patchUser']);//checking third party patch api
Route::delete('deleteUser/{id}',[API_controller::class,'deleteUser']);//checking third party delete api

Route::post('RegisterSuccess',[API_controller::class,'RegisterSuccess']);//checking third party delete api