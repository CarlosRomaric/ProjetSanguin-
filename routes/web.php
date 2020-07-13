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


Auth::routes(['verify'=>false]);
//Auth::routes();

//Routes Backend
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend', 'BackendController@index')->name('backend');


Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm')->name('confirmation');
Route::get('send-mail','MailSend@mailsend');

//Routes Frontend
/*Menu
    Volet A propos
*/
Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/', 'MemberController@create')->name('member.create');
Route::resource('member','MemberController');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

