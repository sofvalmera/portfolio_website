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
use App\Http\Controllers\FrontController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\HomeBlogController;
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

Route::get('/register',[AuthController::class,'register'])->name('account.register');
Route::post('/process-register',[AuthController::class,'processDioskoLordtaasapamani'])->name('account.processRegister');

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

             
            //social media route ni
            Route::get('/socials',[SocialController::class,'index'])->name('socials.index');
            Route::get('/socials/create',[SocialController::class,'create'])->name('socials.create');
           Route::post('/socials',[SocialController::class,'store'])->name('socials.store');
           Route::get('/socials/{blog}/edit',[SocialController::class,'edit'])->name('socials.edit');
           Route::put('/socials/{blog}',[SocialController::class,'update'])->name('socials.update');
           Route::delete('/socials/{blog}',[SocialController::class,'destroy'])->name('socials.delete');

              //portfolio
              Route::get('/portfolio',[PortfolioController::class,'index'])->name('portfolio.index');

            Route::get('/adminprofile',[SettingController::class,'adminprofile'])->name('admin.profile');
            Route::get('/change-password',[SettingController::class,'showChangePasswordForm'])->name('admin.showChangePasswordForm');
            Route::post('/process-change-password',[SettingController::class,'processChangePassword'])->name('admin.processChangePassword');

            // Route::get('/getSlug',function(Request $request){
            //     $slug ='';
            //     if(!empty($request->title)){
            //         $slug = Str::slug($request->title);
            //     }
            //     return response()->json([
            //         'status' => true,
            //         'slug' => $slug
            //     ]);
            // })->name('getSlug');

        });
    });
