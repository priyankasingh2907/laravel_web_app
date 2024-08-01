<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BlogController as AdminBlogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\faqController as AdminFaqController;
use App\Http\Controllers\admin\pageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServesController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\settingController as AdminSettingController;
use App\Http\Controllers\pageController as ControllersPageController;
use App\Http\Controllers\settingController;



// use App\Http\Controllers\admin\TempImageController;



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

Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/about", [HomeController::class, 'about'])->name('about');
Route::get("/term", [HomeController::class, 'terms'])->name('terms');
Route::get("/policy", [HomeController::class, 'policy'])->name('policy');

Route::get("/services", [ServesController::class, 'services'])->name('services');
Route::get("/services/detail/{id}", [ServesController::class, 'detail'])->name('service.detail');
Route::post("/save-comment", [BlogController::class, 'saveComment'])->name('save.blog');

Route::get("/faq", [FaqController::class, 'faq'])->name('faq');
Route::get("/faq/detail/{id}", [FaqController::class, 'detail'])->name('faq.detail');

Route::get("/blog", [BlogController::class, 'blog'])->name('blog');
Route::get("/blog/detail/{id}", [BlogController::class, 'detail'])->name('blog.detail');

Route::get("/footer", [ContactsController::class, 'footer'])->name('footer');
Route::get("/contacts", [ContactsController::class, 'contacts'])->name('contacts');
Route::post("/send_email", [ContactsController::class, 'sendEmail'])->name('sendEmail');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        // Route::view('/dashboard','admin.dashboard')->name('admin.dashboard');
        Route::get('/dashboard', [DashboardController::class, "index"])->name('admin.dashboard');
        Route::get('/logout', [AdminLoginController::class, "logout"])->name('admin.logout');


        Route::post('/service/createPost', [ServiceController::class, "save"]);
        Route::get('/service/create', [ServiceController::class, "create"])->name('service.create');
        Route::get('/services', [ServiceController::class, "index"])->name('services.list');
        // Route::get('/services/search', [ServiceController::class, "search"])->name('services.search');
        Route::get('/service/edit/{id}', [ServiceController::class, "edit"])->name('service.edit');
        Route::post('/service/edit/{id}', [ServiceController::class, "update"])->name('service.update');
        Route::get('/service/delete/{id}', [ServiceController::class, "delete"])->name('service.delete');

        Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/createBlog', [AdminBlogController::class, "save"])->name('blog.save');
        Route::get('/blog', [AdminBlogController::class, "index"])->name('blog.list');
        Route::get('/blog/edit/{id}', [AdminBlogController::class, "edit"])->name('blog.edit');
        Route::post('/blog/edit/{id}', [AdminBlogController::class, "update"])->name('blog.update');
        Route::get('/blog/delete/{id}', [AdminBlogController::class, "delete"])->name('blog.delete');
   
        Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('faq.create');
        Route::post('/faq/createBlog', [AdminFaqController::class, "save"])->name('faq.save');
        Route::get('/faq', [AdminFaqController::class, "index"])->name('faq.list');
        Route::get('/faq/edit/{id}', [AdminFaqController::class, "edit"])->name('faq.edit');
        Route::post('/faq/edit/{id}', [AdminFaqController::class, "update"])->name('faq.update');
        Route::get('/faq/delete/{id}', [AdminFaqController::class, "delete"])->name('faq.delete');
 
        Route::get('/page/create', [pageController::class, 'create'])->name('page.create');
        Route::post('/page/createBlog', [pageController::class, "save"])->name('page.save');
        Route::get('/page', [pageController::class, "index"])->name('page.list');
        Route::get('/page/edit/{id}', [pageController::class, "edit"])->name('page.edit');
        Route::post('/page/edit/{id}', [pageController::class, "update"])->name('page.update');
        Route::get('/page/delete/{id}', [pageController::class, "delete"])->name('page.delete');
 
        Route::get('/setting/create', [AdminSettingController::class, 'create'])->name('setting.create');
        Route::post('/setting/createBlog', [AdminSettingController::class, "save"])->name('setting.save');
        Route::get('/setting', [AdminSettingController::class, "index"])->name('setting.list');
        Route::get('/setting/edit/{id}', [AdminSettingController::class, "edit"])->name('setting.edit');
        Route::post('/setting/edit/{id}', [AdminSettingController::class, "update"])->name('setting.update');
        Route::get('/setting/delete/{id}', [AdminSettingController::class, "delete"])->name('setting.delete');
 
   
    });
});
