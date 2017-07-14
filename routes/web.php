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
//RSS
Route::get('/rss', 'RssController@index')->name('rss');

Route::get('/nosotros', function () {
    return view('front.nosotros');
})->name('nosotros');

// Profile
Route::resource('profile/{username}', 'ProfileController');

// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


//Auth::routes();
// Login & Logout Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

    Route::middleware(['role:Admin'])->group(function () {

        Route::get('/home', 'HomeController@index')->name('admin.home');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('posts', 'PostController');

    });

});