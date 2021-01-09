<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/post/{slug}', 'FrontendController@singlePost')->name('post.single');
Route::get('/category/{id}', 'FrontendController@category')->name('category.single');
Route::get('/tag/{id}', 'FrontendController@tag')->name('tag.single');
Route::get('/results', 'FrontendController@search')->name('post.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/trashed', 'PostController@trashed')->name('trashed');

    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/save', 'PostController@store')->name('post.save');

    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');

    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
    Route::get('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/save', 'CategoryController@store')->name('category.save');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    Route::get('/tag', 'TagsController@index')->name('tags');

    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::post('/tag/save', 'TagsController@store')->name('tag.save');

    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');


    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create', 'UsersController@create')->name('user.create');
    Route::post('/users/save', 'UsersController@store')->name('user.save');

    Route::get('/users/admin/{id}', 'UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('user.not-admin')->middleware('admin');

    Route::get('/users/profile', 'ProfileController@edit')->name('user.profile');
    Route::post('/users/profile/update', 'ProfileController@update')->name('user.profile.update');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('user.delete');

    Route::get('/settings/edit', 'SettingController@index')->name('settings');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');
});
