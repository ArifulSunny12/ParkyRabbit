<?php

use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Http\Controllers\productController;
use App\Http\Controllers\DropdownController;

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


/* 
Route::get('/dropdown', function () {
    return view('dropdown');
});
*/


/* route for dropdown by sunny*/
Route::get('dropdown', [DropdownController::class, 'products']);
Route::post('api/fetch-item', [DropdownController::class, 'fetchitem']);
Route::post('api/fetch-quantity', [DropdownController::class, 'fetchquantity']);
Route::post('api/increase-quantity', [DropdownController::class, 'increasequantity']);

/* route for additem by sunny*/
Route::get('additem', [DropdownController::class, 'addItem']);
Route::post('additem', [DropdownController::class, 'addItem2']);

Auth::routes();

/* for cheak the model by sunny
route::get('/product',function(){
    $product = product::all();
    echo "<pre>";
    print_r($product->toArray());

});
*/


Route::get('/product', [productController::class, 'show']);
Route::post('/home', [productController::class, 'onproductcreate']);




Route::post('/product', [productController::class, 'oninsert']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
