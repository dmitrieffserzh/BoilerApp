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
    Route::get(  '/',                                 [ 'as' => 'index',                         'uses' => 'MainController@index'             ]);
    Route::get(  '/posts',                            [ 'as' => 'posts.index',                   'uses' => 'PostController@index'             ]);
    Route::get(  '/posts/categories',                 [ 'as' => 'posts.category',                'uses' => 'TaxonomyController@taxonomies'        ]);
    Route::get(  '/posts/categories/create',          [ 'as' => 'posts.category.create',         'uses' => 'TaxonomyController@taxonomiesCreate'  ]);
    Route::post( '/posts/categories/store',          [ 'as' => 'posts.category.store',          'uses' => 'TaxonomyController@taxonomiesStore'   ]);
    Route::get(  '/posts/categories/{id}/edit',       [ 'as' => 'posts.category.edit',           'uses' => 'TaxonomyController@taxonomiesEdit'    ]);
    Route::patch('/posts/categories/{id}/update',   [ 'as' => 'posts.category.update',         'uses' => 'TaxonomyController@taxonomiesUpdate'  ]);
    Route::get(  '/posts/categories/{id}/delete',     [ 'as' => 'posts.category.delete',         'uses' => 'TaxonomyController@taxonomiesDelete'  ]);
});
