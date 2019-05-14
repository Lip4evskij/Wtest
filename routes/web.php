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

//Route::get('/', function () {
//    return view('front.pages.home');
//});
Route::get('/', 'FrontController@get_all_news');
Route::get('/sort-news', 'FrontController@sort')->name('sort');
Route::get('/all-reviews', 'FrontController@get_all_reviews');
Route::get('news/{slug}','FrontController@Show_new')->name('newShow');
Route::resource('admin-panel', 'MainController');
Route::resource('reviews', 'ReviewsController');