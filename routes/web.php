<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminLogInController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\FrontController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontController::class,'index'])->name('front.home');

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function(){

   Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');

    Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');

       });
        Route::group(['middleware' => 'admin.auth'],function(){
           //home ni

           Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');

            Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

        });
    });
