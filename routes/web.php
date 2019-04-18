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

Auth::routes();

Route::get('/', 'MainController@index')->name('main');









// ADMIN ============================================================================================================ //
Route::group([
    'namespace'  => 'Admin',
    'prefix'     => 'admin'], function() {
    Route::get('/',                             [ 'as' => 'index',                         'uses' => 'MainController@index'             ]);
    Route::get('/posts',                        [ 'as' => 'posts.index',                   'uses' => 'PostController@index'             ]);
    Route::get('/posts/categories',             [ 'as' => 'posts.category',                'uses' => 'PostController@taxonomies'        ]);
    Route::get('/posts/categories/create',      [ 'as' => 'posts.category.create',         'uses' => 'PostController@taxonomiesCreate'  ]);
    Route::post('/posts/categories/store',      [ 'as' => 'posts.category.store',          'uses' => 'PostController@taxonomiesStore'   ]);
});
