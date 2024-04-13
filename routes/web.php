<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminLogInController;
use App\Http\Controllers\spectator\SpectatorLoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\spectator\SpectatorHomeController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\spectator\SpectatorTestimonialController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\ExperienceController;
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


// Route::group(['prefix' => 'account'],function(){
//     Route::group(['middleware' => 'guest'],function(){
//       Route::get('/register',[AuthController::class,'register'])->name('account.register');
//       Route::post('/process-register',[AuthController::class,'processRegister'])->name('account.processRegister');

//    Route::get('/login',[AuthController::class,'login'])->name('account.login');
//    Route::get('/login',[AuthController::class,'authenticate'])->name('account.authenticate');



   

//        });
//         Route::group(['middleware' => 'auth'],function(){

//         });
//     });

Route::group(['prefix' => 'spectator'],function(){
   Route::group(['middleware' => 'spectator.guest'],function(){

  Route::get('/login',[SpectatorLoginController::class,'spectatorindex'])->name('spectator.login');

   Route::post('/spectatorauthenticate',[SpectatorLoginController::class,'spectatorauthenticate'])->name('spectator.spectatorauthenticate');

      });
       Route::group(['middleware' => 'spectator.auth'],function(){

          
        Route::get('/dash',[SpectatorHomeController::class,'spectatorindex'])->name('spectator.dashboard');
        Route::get('/logout',[SpectatorHomeController::class,'spectatorlogout'])->name('spectator.logout');

        Route::get('/testimonials',[SpectatorTestimonialController::class,'index'])->name('spectatortestimonials.index');
        Route::get('/testimonials/create',[SpectatorTestimonialController::class,'create'])->name('spectatortestimonials.create');
       Route::post('/testimonials',[SpectatorTestimonialController::class,'store'])->name('spectatortestimonials.store');
       Route::get('/testimonials/{testimonial}/edit',[SpectatorTestimonialController::class,'edit'])->name('spectatortestimonials.edit');
       Route::put('/testimonials/{testimonial}',[SpectatorTestimonialController::class,'update'])->name('spectatortestimonials.update');
       Route::delete('/testimonials/{testimonial}',[SpectatorTestimonialController::class,'destroy'])->name('spectatortestimonials.delete');
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
            Route::get('/profiles/createdsasdaDDSAdefwJEhqgxgaygqytSUQISYFatsAS',[ProfileController::class,'create'])->name('profiles.create');
           Route::post('/profiles',[ProfileController::class,'store'])->name('profiles.store');
           Route::get('/profiles/{profile}/edit',[ProfileController::class,'edit'])->name('profiles.edit');
           Route::put('/profiles/{profile}',[ProfileController::class,'update'])->name('profiles.update');
           Route::delete('/profiles/{profile}',[ProfileController::class,'destroy'])->name('profiles.delete');

              // Contact route
              Route::get('/contacts',[ContactController::class,'index'])->name('contacts.index');
              Route::get('/contacts/createahsdAGDJGYfdwtyqfdqdfftqfdytqdw',[ContactController::class,'create'])->name('contacts.create');
             Route::post('/contacts',[ContactController::class,'store'])->name('contacts.store');
             Route::get('/contacts/{contact}/edit',[ContactController::class,'edit'])->name('contacts.edit');
             Route::put('/contacts/{contact}',[ContactController::class,'update'])->name('contacts.update');
             Route::delete('/contacts/{contact}',[ContactController::class,'destroy'])->name('contacts.delete');
  

            
            //blog route ni
            Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');
            Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
           Route::post('/blogs',[BlogController::class,'store'])->name('blogs.store');
           Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->name('blogs.edit');
           Route::put('/blogs/{blog}',[BlogController::class,'update'])->name('blogs.update');
           Route::delete('/blogs/{blog}',[BlogController::class,'destroy'])->name('blogs.delete');

             //testimonial route ni
             Route::get('/testimonials',[TestimonialController::class,'index'])->name('testimonials.index');
             Route::get('/testimonials/create',[TestimonialController::class,'create'])->name('testimonials.create');
            Route::post('/testimonials',[TestimonialController::class,'store'])->name('testimonials.store');
            Route::get('/testimonials/{testimonial}/edit',[TestimonialController::class,'edit'])->name('testimonials.edit');
            Route::put('/testimonials/{testimonial}',[TestimonialController::class,'update'])->name('testimonials.update');
            Route::delete('/testimonials/{testimonial}',[TestimonialController::class,'destroy'])->name('testimonials.delete');
 

             
            //experience route ni
            Route::get('/experiences',[ExperienceController::class,'index'])->name('experiences.index');
            Route::get('/experiences/create',[ExperienceController::class,'create'])->name('experiences.create');
           Route::post('/experiences',[ExperienceController::class,'store'])->name('experiences.store');
           Route::get('/experiences/{experience}/edit',[ExperienceController::class,'edit'])->name('experiences.edit');
           Route::put('/experiences/{experience}',[ExperienceController::class,'update'])->name('experiences.update');
           Route::delete('/experiences/{experience}',[ExperienceController::class,'destroy'])->name('experiences.delete');

             
            //education route ni
            Route::get('/educations',[EducationController::class,'index'])->name('educations.index');
            Route::get('/educations/create',[EducationController::class,'create'])->name('educations.create');
           Route::post('/educations',[EducationController::class,'store'])->name('educations.store');
           Route::get('/educations/{education}/edit',[EducationController::class,'edit'])->name('educations.edit');
           Route::put('/educations/{education}',[EducationController::class,'update'])->name('educations.update');
           Route::delete('/educations/{education}',[EducationController::class,'destroy'])->name('educations.delete');

           
              //skill
              Route::get('/skills',[SkillController::class,'index'])->name('skills.index');
              Route::get('/skills/create',[SkillController::class,'create'])->name('skills.create');
             Route::post('/skills',[SkillController::class,'store'])->name('skills.store');
             Route::get('/skills/{skill}/edit',[SkillController::class,'edit'])->name('skills.edit');
             Route::put('/skills/{skill}',[SkillController::class,'update'])->name('skills.update');
             Route::delete('/skills/{skill}',[SkillController::class,'destroy'])->name('skills.delete');

               //users
               Route::get('/users',[UserController::class,'index'])->name('users.index');
               Route::get('/users/create',[UserController::class,'create'])->name('users.create');
              Route::post('/users',[UserController::class,'store'])->name('users.store');
              Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
              Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
              Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.delete');

           //member route ni
           Route::get('/members',[MemberController::class,'index'])->name('members.index');
           Route::get('/members/createDSAHJDSADhdgahdygwggdywfwdwvdgwfe',[MemberController::class,'create'])->name('members.create');
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

             //service route ni
             Route::get('/services',[ServiceController::class,'index'])->name('services.index');
             Route::get('/services/create',[ServiceController::class,'create'])->name('services.create');
             Route::post('/services',[ServiceController::class,'store'])->name('services.store');
             Route::get('/services/{service}/edit',[ServiceController::class,'edit'])->name('services.edit');
             Route::put('/services/{service}',[ServiceController::class,'update'])->name('services.update');
             Route::delete('/services/{service}',[ServiceController::class,'destroy'])->name('services.delete');
  

              //portfolio
            Route::get('/portfolios',[PortfolioController::class,'index'])->name('portfolios.index');
            Route::get('/portfolios/create',[PortfolioController::class,'create'])->name('portfolios.create');
           Route::post('/portfolios',[PortfolioController::class,'store'])->name('portfolios.store');
           Route::get('/portfolios/{portfolio}/edit',[PortfolioController::class,'edit'])->name('portfolios.edit');
           Route::put('/portfolios/{portfolio}',[PortfolioController::class,'update'])->name('portfolios.update');
           Route::delete('/portfolios/{portfolio}',[PortfolioController::class,'destroy'])->name('portfolios.delete');

            
              
              //user
              Route::get('/user',[UserController::class,'index'])->name('users.index');


            Route::get('/adminprofile',[SettingController::class,'adminprofile'])->name('admin.profile');
            Route::get('/change-password',[SettingController::class,'showChangePasswordForm'])->name('admin.showChangePasswordForm');
            Route::post('/process-change-password',[SettingController::class,'processChangePassword'])->name('admin.processChangePassword');


        });
    });
