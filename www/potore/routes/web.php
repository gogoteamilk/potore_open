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


#認証
Auth::routes(['verify' => true]);
Route::get('auth/login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('auth/login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

//route
Route::get('/', 'IndexController@index');

//home
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home/{usreID?}', 'HomeController@index')->where(['usreID'=>'\d*'])->name('home');
Route::get('/home/edit', 'userController@index')->name('home.edit');
Route::post('/Comment/store/', 'CommentController@store')->name('comment.store');
Route::view('/home/setting', '/home/setting')->name('home.setting')->middleware('verified');
Route::get('/users/search', 'userSearchController@search')->name('user.search');
//home.profile
Route::get('/home/profile/edit', 'userController@profileEdit')->name('home.profile');
Route::post('/home/profile/update', 'userController@updateUser')->name('home.profile.update');
//home.gallery
Route::get('/home/gallery', 'userPhotoController@edit')->name('home.gallery');
Route::post('/users/fetch', 'userPhotoController@usersFetch')->name('users.fetch');
Route::post('/creaters/fetch', 'userPhotoController@creatersIndex')->name('creaters.fetch');
Route::post('/photo/update', 'userPhotoController@photoUpdate')->name('photo.update');
Route::post('/photo/info', 'userPhotoController@photoInfo')->name('photo.info');
Route::post('/photo/store', 'userPhotoController@photoStore')->name('photo.store');
Route::post('/photo/delete', 'userPhotoController@photoDelete')->name('photo.delete');
//home.security
Route::get('/home/security/edit', 'userController@securityEdit')->name('home.security.edit')->middleware(['auth', 'password.confirm']);
Route::post('/home/security/edit', 'userController@securityEdit')->name('home.security.edit');
Route::post('/home/email/update', 'userController@emailUpdate')->name('home.email.update');
Route::post('/home/password/update', 'userController@passwordUpdate')->name('home.password.update');
Route::post('/home/withdrawal', 'userController@userWithdrawal')->name('home.withdrawal');

//情報提供
Route::view('/userPolicy', '/information/userPolicy')->name('userPolicy');
Route::view('/privacyPolicy', '/information/privacyPolicy')->name('privacyPolicy');
Route::view('/contact', '/information/contact')->name('contact');
Route::post('/contact/confirm', 'contactController@confirm')->name('contact.confirm');
Route::post('/contact/thanks', 'contactController@send')->name('contact.send');

