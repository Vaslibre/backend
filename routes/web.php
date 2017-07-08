<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/blog/{slug?}', 'HomeController@show')->name('blog');


// Notas publicadas
Route::get('/notas', 'PublicacionesController@index')->name('notas');
Route::get('/notas/{slug?}', 'PublicacionesController@show')->name('notas');

// colaboraciones
Route::get('/colaboraciones', 'HomeController@colaboraciones')->name('colaboraciones');

// buscador
Route::get('find', 'SearchController@find')->name('search');

// sitemap
Route::get('/sitemap.xml', 'SitemapController@index');

Route::get('/nosotros', function () {
    return view('front.nosotros');
})->name('nosotros');

Auth::routes();



Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/home', 'HomeController@index')->name('admin.home');
    
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');

});