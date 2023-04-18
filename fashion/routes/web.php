<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('home');
// });

Route::get('/', [FrontController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');

// Frontend Product Details
Route::get('/product/details/{product}/{slug}', [ProductController::class, 'productDetails'])->name('product.details');
// Frontend Categorywise Product list
Route::get('/categorywise/product/{category}', [ProductController::class, 'categoryWiseProduct'])->name('categorywise.product');
// Frontend Contact Form
Route::resource('contacts', ContactController::class);
Route::get('/contact/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');




// Admin 
Route::group(['prefix' => 'admin'], function () {
	// For Admin Login
	Route::group(['middleware' => 'admin.guest'], function(){
		Route::get('/login', [AdminLoginController::class, 'adminLoginForm'])->name('admin.loginForm');
		Route::post('/login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');
	});

	// For Admin Dashboard & Logout
	Route::group(['middleware' => 'admin.auth'], function(){
		Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
		Route::post('/logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout');
	});

	Route::group(['middleware' => 'admin.auth'], function(){
		// Admin Category
		Route::resource('categories', CategoryController::class);
		Route::get('/category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');

		// Admin Product
		Route::resource('products', ProductController::class);
		Route::post('/multiimg/update', [ProductController::class, 'multiimgUpdate'])->name('multiimage.update');
		Route::get('/multiimg/delete/{multiimg}', [ProductController::class, 'multiimgDelete'])->name('multiimage.delete');
		Route::post('/thambnail/update/{product}', [ProductController::class, 'thambnailUpdate'])->name('thambnail.update');
		Route::get('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
	});
});