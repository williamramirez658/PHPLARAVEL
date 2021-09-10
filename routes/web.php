<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

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
})->middleware('auth');

//Route::get('/usuario' , function(){
    // AQUI PUEDO PONER TODO MI CODIGO//
  //return "HOLA MUNDO";
 //});

 //Route::get('/usuario/{nombre_usuario?}' , function($nombre_usuario = null){
    //if($nombre_usuario == null){
        //return 'Debe ingresar el nombre de usuario';
   // }
    //return 'Nombre usuario = '.$nombre_usuario;
 //})->where('nombre_usuario', '[A-Za-z]+');

 Route::get('/usuario/{nombre_usuario?}' , [PersonaController::class , 'mostrar'])
 ->where('nombre_usuario', '[A-Za-z]+');


 Route::get('/products', [ProductController::class, 'show']);
 Route::get('/product/form/{id?}', [ProductController::class, 'form'])->name('product.form');
 Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');
 Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


 Route::get('/brands', [BrandController::class, 'show']);
 Route::get('/brand/form/{id?}', [BrandController::class, 'form'])->name('brand.form');
 Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');
 Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
