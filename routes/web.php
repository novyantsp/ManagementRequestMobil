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

Route::get('/aaa', function () {
    return view('page.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('home')->group(function()
{
  Route::get('/listunit', 'HomeController@showlist')->name('home.showlist');
  Route::get('/listunit/{area}/requestunit', 'HomeController@showrequestunit')->name('home.showrequestunit');
  Route::post('/listunit/{area}', 'HomeController@requestunit')->name('home.requestunit.submit');
  Route::get('/historirequest', 'HomeController@historirequest')->name('home.historirequest');
  Route::get('/', 'HomeController@index')->name('home');
});

Route::prefix('admin')->group(function()
{
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/addunit', 'AdminController@showaddunit')->name('admin.addunit');
  Route::post('/addunit', 'AdminController@addunit')->name('admin.addunit.submit');
  Route::get('/listunit', 'AdminController@showunit')->name('admin.showunit');
  Route::delete('/listunit/{area}','AdminController@destroyunit')->name('admin.destroyunit');
  Route::get('/listuser', 'AdminController@showuser')->name('admin.showuser');
  Route::delete('/listuser/{area}','AdminController@destroyuser')->name('admin.destroyuser');
  Route::get('/listunit/{area}/edit','AdminController@editunit')->name('admin.editunit');
  Route::post('/listunit/{area}','AdminController@updateunit')->name('admin.updateunit');
  Route::get('/listrequest', 'AdminController@listrequest')->name('admin.listrequest');
  Route::get('/listrequest/{area}/edit','AdminController@editrequest')->name('admin.editrequest');
  Route::post('/listrequest/{area}','AdminController@updaterequest')->name('admin.updaterequest');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
