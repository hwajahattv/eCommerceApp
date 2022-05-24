<?php
use app\Models\Category;

use Illuminate\Support\Facades\Route;
use App\http\controllers\AdminController;
use App\http\controllers\CategoryController;
use App\http\controllers\ProductController;
// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['auth'=>'middleware'],function(){
    Route::resource('categories', 'CategoryController');
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/logout', [AdminController::class,'logout']);
    Route::get('/login', [AdminController::class,'login']);
    Route::get('/addCategory', [CategoryController::class,'index']);
    Route::post('/addCategory', [CategoryController::class,'store']);
    Route::get('/showCategory', [CategoryController::class,'showCategory']);
    Route::get('/deletecategory/{id}',[CategoryController::class,'deletecategory']);
    Route::get('/editcategory/{id}',[CategoryController::class,'editcategory']);
    Route::post('/posteditcategory/{id}',[CategoryController::class,'posteditcategory']);
    
    //Products routes

Route::get('/addProduct', [ProductController::class,'addproduct']);
Route::post('/storeproduct', [ProductController::class,'storeproduct']);
Route::get('/showCategoryList', [ProductController::class,'showCategoryList']);
Route::post('/displayProductsFromCategory', [ProductController::class,'displayProductsFromCategory']);
Route::get('/geteditpro/{id}', [ProductController::class,'geteditpro']);
Route::post('/posteditpro/{id}', [ProductController::class,'posteditpro']);
Route::get('/deleteproduct/{id}',[ProductController::class,'deleteproduct']);
    
    
    

});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
