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
    Route::get('/account', 'UserController@index')->name('account');
    Route::get('/settings', 'SettingController@index')->name('setting');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/sites', 'SiteController@index')->name('sites');
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::post('/account/update/{user}', 'UserController@update')->name('updateUser');

    Route::post('/search/sites', 'SearchController@search')->name('searchSites');
    Route::post('/search/users', 'SearchController@search')->name('searchUsers');
    Route::post('/search/sensors', 'SearchController@search')->name('searchSensors');

    Route::get('/site/{id}/sensors', 'SensorController@index')->name('sensors');
    Route::get('/welcome', 'HomeController@index')->name('welcome');

    Route::get('/site/add', 'SiteController@showAdd')->name('showAddSite');
    Route::post('/site/add', 'SiteController@create')->name('insertSite');
    Route::post('/site/edit', 'SiteController@edit')->name('editSite');
    Route::post('/site/delete', 'SiteController@delete')->name('deleteSite');

    Route::get('/sensor/{id}/add', 'SensorController@showAdd')->name('showAddSensor');
    Route::post('/sensor/add', 'SensorController@create')->name('insertSensor');
    Route::post('/sensor/edit', 'SensorController@edit')->name('editSensor');
    Route::post('/sensor/delete', 'SensorController@delete')->name('deleteSensor');

});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', 'AdminController@index')-> name('admin');
    Route::get('/admin/users', 'AdminController@users')-> name('adminUsers');
    Route::get('/admin/clients', 'AdminController@client')-> name('adminClients');
    Route::get('/admin/sites', 'AdminController@sites')-> name('adminSites');
    Route::get('/admin/sensors', 'AdminController@sensors')-> name('adminSensors');

    Route::post('/admin/{type}/edit', 'AdminController@edit')->name('edit');
    Route::post('/admin/{type}/delete', 'AdminController@delete')->name('delete');
});

Route::group(['middleware' => 'firstlogin'], function(){
    Route::get('/resetpassword','Auth\ResetPasswordController@index')-> name('resetPassword');
    Route::post('/resetpassword/update','MyResetPasswordController@updatePassword')-> name('updatePassword');

});

Route::get ('/error', 'AdminController@notAccesible')-> name('error');
