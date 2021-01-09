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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){

    route::get('/explore','ExploreController@index')->name('explore.index');

    Route::get('/posts','PostController@index')->name('home');
    Route::post('/posts/{user}','PostController@store')->name('posts.store');

    Route::post('/friends/{user}','FriendController@store')->name('friends.store');
    Route::delete('/friends/{user}','FriendController@destroy')->name('friends.delete');

    Route::get('/requests','RequestController@index')->name('requests.index');
    Route::post('/requests/{user}','RequestController@store')->name('requests.store');
    Route::delete('/requests/{user}','RequestController@delete')->name('requests.delete');

    Route::get('/profiles/{user}','ProfileController@show');
    Route::get('/profiles/{user}/edit','ProfileController@edit')->name('profiles.edit');
    Route::put('/profiles/{user}','ProfileController@update')->name('profiles.update');

    Route::get('/conversations','ConversationController@index')->name('conversations.index');
    Route::post('/conversations/{user}','ConversationController@store')->name('conversations.post');
    Route::get('/conversations/{user}','ConversationController@show')->name('conversations.show');


});
