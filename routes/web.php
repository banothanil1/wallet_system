<?php

use App\Http\Controllers\relationshipController;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('homepage',[usercontroller::class,'homepage'])->name('user.homepage');
Route::get('Registerform',[usercontroller::class,'registerform'])->name('user.registerform');//registerform
Route::post('Register',[usercontroller::class,'register'])->name('user.register');//register

Route::get('Loginform',[usercontroller::class,'loginform'])->name('user.loginform');//loginform
Route::post('login',[usercontroller::class,'login'])->name('user.login');//login with data

Route::get('Logout', [UserController::class, 'logout'])->name('user.logout');//logout

Route::get('AddmoneyForm/{user}',[usercontroller::class,'AddMoneyForm'])->name('user.AddMoneyForm');//its form
Route::post('AddMoney/{user}',[usercontroller::class,'AddMoney'])->name('user.AddMoney');//its add money button route

Route::get('TransferMoneyForm/{user}',[usercontroller::class,'TransferMoneyForm'])->name('user.TransferMoneyForm');
Route::post('TransferMoney/{user}',[usercontroller::class,'TransferMoney'])->name('user.TranferMoney');

Route::post('history/{user}',[usercontroller::class,'history'])->name('user.history');

Route::get('WithdrawMoneyForm/{user}',[usercontroller::class,'WithdrawMoneyForm'])->name('user.WithdrawMoneyForm');
Route::post('WithdrawMoney/{user}',[usercontroller::class,'WithdrawMoney'])->name('user.WithdrawMoney');

Route::get('http',[usercontroller::class,'httpclient']);




///////////////////////////////////
Route::get('adress',[relationshipController::class,'insert_adress']);
Route::get('user',[relationshipController::class,'insert_user']);