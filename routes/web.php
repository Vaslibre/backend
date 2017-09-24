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

Route::get('/archivos', 'HomeController@archives')->name('archivos');

// Notas publicadas
Route::get('/notas', 'PublicacionesController@index')->name('notas');
Route::get('/notas/{slug?}', 'PublicacionesController@show')->name('notas');

// colaboraciones
Route::get('/colaboraciones', 'HomeController@colaboraciones')->name('colaboraciones');
// politicas
Route::get('/politicas', 'HomeController@politicas')->name('politicas');

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
Route::get('profile/{slug}', 'ProfileController@show');

// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

    Route::middleware(['role:Admin'])->group(function () {

        Route::resource('users', 'AdminUserController'); // Administra Usuarios
        Route::resource('roles', 'RoleController'); // Administra Roles

        Route::resource('banner', 'AdminBannerController', ['except' => ['show']]); // Administra Banner
        Route::resource('blogroll', 'AdminBlogRollController', ['except' => ['show']]); // Administra Blog roll

        Route::get('post', 'UserPostController@index',['only'=> ['index']]);

        //Google Analytics
        Route::get('analytics', 'AnalyticsController@index');
        Route::get('analytics-mobile', 'AnalyticsController@mobile');
        Route::get('analytics-returning', 'AnalyticsController@newreturningsessions');
        Route::get('analytics-operating', 'AnalyticsController@operatingsystem');
        Route::get('analytics-traffic', 'AnalyticsController@traffic');
        Route::get('analytics-time-on-site', 'AnalyticsController@timeonsite');
        Route::get('analytics-referring-sites', 'AnalyticsController@referringsites');
        Route::get('analytics-search-engines', 'AnalyticsController@searchengines');
        Route::get('analytics-keywords', 'AnalyticsController@keywords');
        Route::get('analytics-topcontent', 'AnalyticsController@topcontent');
        Route::get('analytics-top-landing-pages', 'AnalyticsController@toplandingpages');
        Route::get('analytics-top-exit-pages', 'AnalyticsController@topexitpages');
    });

});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('profile', 'ProfileController', [
        'only' => [
            'update', 'edit'
        ]
    ]);
    Route::group(['prefix' => 'user'], function () {

        Route::resource('post', 'UserPostController', ['except' => ['index']]);

    });

});
