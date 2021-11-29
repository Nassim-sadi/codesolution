<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
=
*/
//auth routes
//Route::get('auth/login','auth\logincontroller@getLogin');
//Route::post('auth/login','auth\logincontroller@getPost');
//Route::get('auth/logout','auth\logincontroller@getLogout');
//Registration routes
//Route::get('auth/register','auth\registercontroller@getRegister');
//Route::post('auth/register','auth\registercontroller@postRegister');

//route to show a single post with the Slug as a URL
Route::get('blog/{slug}','blogController@getSingle')->name('blog.single');
//route to blog index for guests
Route::get('blog','blogController@getIndex')->name('blog.index');
//route to 3 pages 'home,about,contact'
Route::get('contact', 'PagesController@getContact')->name('pages.contact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout')->name('pages.about');
Route::get('/', 'PagesController@getIndex')->name('pages.index');
//route to user cutomization page
Route::get('profile','UserController@profile')->name('user.profile');
Route::post('profile','UserController@update_avatar');
//route to comment page
Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
//route to post pages
Route::resource('posts','PostController');
//route to tags pages
Route::resource('tags','TagController');
//route to users pages
Route::resource('users','UserController');
//the routes that manage Authentification System
Auth::routes();
//admin routes
