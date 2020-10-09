<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/','home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/work','work')->name('work');



Route::get('blog/{categoria?}', function($categoria=null){

    if(!isset($categoria)){
        return "Se muestran todas las publicaciones";
    }
    else{
        return "Se muestran las publicaciones de la categoría: {$categoria}" ;
    }
    
})->where([0-9]);

Route::get('blog/{N}/{M}', function($n,$m){

    return "multiplicar {$n}*{$m}";
});

Route::get('acerca-de', function (){
    return redirect()->route('about');
})->name('acerca-de');

Route::redirect('acerca-de', 'about');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
