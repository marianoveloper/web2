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
Route::resource('autor', 'AutorController');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/post/create','PostController@create')->name('post.create');
    Route::post('post','PostController@store')->name('post.store');
    Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
    RRoute::match(['put','patch'],'post/{post}', 'PostController@update')->name('post.update');

    Route::delete('post/{id}', 'Post@destroy')->name('post.destroy');

});