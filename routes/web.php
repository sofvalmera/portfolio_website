<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminLogInController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\admin\TempImageController;
// use App\Http\Controllers\HomeBlogController;
// use App\Http\Controllers\HomeBlogController;

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


Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware' => 'guest'],function(){

   Route::get('/login',[AuthController::class,'login'])->name('account.login');
    Route::get('/register',[AuthController::class,'register'])->name('account.register');
    Route::post('/process-register',[AuthController::class,'processRegister'])->name('account.processRegister');

       });
        Route::group(['middleware' => 'auth'],function(){

        });
    });

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function(){

   Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');

    Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');

       });
        Route::group(['middleware' => 'admin.auth'],function(){

           
             
           

           Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');

            Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

            //picture
            Route::post('/upload-temp-image',[TempImageController::class,'create'])->name('temp-images.create');


            // profile route
            Route::get('/profiles',[ProfileController::class,'index'])->name('profiles.index');
            Route::get('/profiles/create',[ProfileController::class,'create'])->name('profiles.create');
           Route::post('/profiles',[ProfileController::class,'store'])->name('profiles.store');
           Route::get('/profiles/{profile}/edit',[ProfileController::class,'edit'])->name('profiles.edit');
           Route::put('/profiles/{profile}',[ProfileController::class,'update'])->name('profiles.update');
           Route::delete('/profiles/{profile}',[ProfileController::class,'destroy'])->name('profiles.delete');

            
            //blog route ni
            Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');
            Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
           Route::post('/blogs',[BlogController::class,'store'])->name('blogs.store');
           Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->name('blogs.edit');
           Route::put('/blogs/{blog}',[BlogController::class,'update'])->name('blogs.update');
           Route::delete('/blogs/{blog}',[BlogController::class,'destroy'])->name('blogs.delete');

           //member route ni
           Route::get('/members',[MemberController::class,'index'])->name('members.index');
           Route::get('/members/create',[MemberController::class,'create'])->name('members.create');
          Route::post('/members',[MemberController::class,'store'])->name('members.store');
          Route::get('/members/{member}/edit',[MemberController::class,'edit'])->name('members.edit');
          Route::put('/members/{member}',[MemberController::class,'update'])->name('members.update');
          Route::delete('/members/{member}',[MemberController::class,'destroy'])->name('members.delete');
             
            //social media route ni
           Route::get('/socials',[SocialController::class,'index'])->name('socials.index');
           Route::get('/socials/create',[SocialController::class,'create'])->name('socials.create');
           Route::post('/socials',[SocialController::class,'store'])->name('socials.store');
           Route::get('/socials/{blog}/edit',[SocialController::class,'edit'])->name('socials.edit');
           Route::put('/socials/{blog}',[SocialController::class,'update'])->name('socials.update');
           Route::delete('/socials/{blog}',[SocialController::class,'destroy'])->name('socials.delete');

              //portfolio
            Route::get('/portfolios',[PortfolioController::class,'index'])->name('portfolios.index');
            Route::get('/portfolios/create',[PortfolioController::class,'create'])->name('portfolios.create');
           Route::post('/portfolios',[PortfolioController::class,'store'])->name('portfolios.store');
           Route::get('/portfolios/{portfolio}/edit',[PortfolioController::class,'edit'])->name('portfolios.edit');
           Route::put('/portfolios/{portfolio}',[PortfolioController::class,'update'])->name('portfolios.update');
           Route::delete('/portfolios/{portfolio}',[PortfolioController::class,'destroy'])->name('portfolios.delete');

            
              //contact
              Route::get('/contact',[ContactController::class,'index'])->name('contacts.index');

              
              //user
              Route::get('/user',[UserController::class,'index'])->name('users.index');


            Route::get('/adminprofile',[SettingController::class,'adminprofile'])->name('admin.profile');
            Route::get('/change-password',[SettingController::class,'showChangePasswordForm'])->name('admin.showChangePasswordForm');
            Route::post('/process-change-password',[SettingController::class,'processChangePassword'])->name('admin.processChangePassword');


        });
    });
