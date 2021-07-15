<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::post('danh-muc/xoa/{id}', [HomeController::class, 'removeCate'])
        ->name('cate.remove');

                                    // controller xu li    ten ham
Route::get('/admin/product/list',"Admin\ProductController@getList")->name('product.getList');

//      b1 viet URL                 b2 nam o dau           b3 xu li n o dau
Route::get('/admin/product/create',"Admin\ProductController@getCreate")->name('product.getCreate');

Route::post('/admin/product/create',"Admin\ProductController@postCreate")->name('product.postCreate');

Route::get('/admin/product/edit/{id}',"Admin\ProductController@getEdit")->name('product.getEdit');

Route::post('/admin/product/edit/{id}',"Admin\ProductController@postEdit")->name('product.postEdit');

Route::post('/admin/product/delete/{id}',"Admin\ProductController@postDelete")->name('product.postDelete');



Route::get('/admin/category/list',"Admin\CategoryController@getList")->name('category.getList');
