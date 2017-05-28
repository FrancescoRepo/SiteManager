<?php

use App\Http\Controllers\SitoController;
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


Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/account', 'UserController@setting')->name('account');
    Route::get('/settings', 'SettingController@index')->name('setting');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/sites', 'SiteController@index')->name('sites');
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::post('/account/update/{user}', 'UserController@update')->name('updateUser');
    Route::post('/search/sites', 'SearchController@search')->name('searchSites');
    Route::post('/search/users', 'SearchController@search')->name('searchUsers');
    Route::post('/search/sensors', 'SearchController@search')->name('searchSensors');
    Route::get('/sites/sensors', 'SensorController@index')->name('sensors');
    Route::get('/welcome', 'HomeController@index')->name('welcome');
});


