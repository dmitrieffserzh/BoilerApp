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
    'prefix'     => 'admin2'], function() {
    Route::get(  '/',                                 [ 'as' => 'index',                         'uses' => 'MainController@index'             ]);

    // POSTS
    Route::get(  '/posts',                            [ 'as' => 'posts.index',                   'uses' => 'PostController@index'             ]);
    Route::get(  '/posts/create',                     [ 'as' => 'posts.create',                  'uses' => 'PostController@create'            ]);
    Route::post( '/posts/store',                      [ 'as' => 'posts.store',                   'uses' => 'PostController@store'             ]);
    Route::get(  '/posts/{id}/edit',                  [ 'as' => 'posts.edit',                    'uses' => 'PostController@edit'              ]);
    Route::patch('/posts/{id}/update',                [ 'as' => 'posts.update',                  'uses' => 'PostController@update'            ]);
    Route::get(  '/posts/{id}/delete',                [ 'as' => 'posts.delete',                  'uses' => 'PostController@delete'             ]);
    Route::get(  '/posts/categories',                 [ 'as' => 'posts.category',                'uses' => 'TaxonomyController@taxonomies'        ]);
    Route::get(  '/posts/categories/create',          [ 'as' => 'posts.category.create',         'uses' => 'TaxonomyController@taxonomiesCreate'  ]);
    Route::post( '/posts/categories/store',           [ 'as' => 'posts.category.store',          'uses' => 'TaxonomyController@taxonomiesStore'   ]);
    Route::get(  '/posts/categories/{id}/edit',       [ 'as' => 'posts.category.edit',           'uses' => 'TaxonomyController@taxonomiesEdit'    ]);
    Route::patch('/posts/categories/{id}/update',     [ 'as' => 'posts.category.update',         'uses' => 'TaxonomyController@taxonomiesUpdate'  ]);
    Route::get(  '/posts/categories/{id}/delete',     [ 'as' => 'posts.category.delete',         'uses' => 'TaxonomyController@taxonomiesDelete'  ]);

    // NEWS
    Route::get(  '/news',                            [ 'as' => 'news.index',                   'uses' => 'NewsController@index'             ]);
    Route::get(  '/news/categories',                 [ 'as' => 'news.category',                'uses' => 'TaxonomyController@taxonomies'        ]);
    Route::get(  '/news/categories/create',          [ 'as' => 'news.category.create',         'uses' => 'TaxonomyController@taxonomiesCreate'  ]);
    Route::post( '/news/categories/store',           [ 'as' => 'news.category.store',          'uses' => 'TaxonomyController@taxonomiesStore'   ]);
    Route::get(  '/news/categories/{id}/edit',       [ 'as' => 'news.category.edit',           'uses' => 'TaxonomyController@taxonomiesEdit'    ]);
    Route::patch('/news/categories/{id}/update',     [ 'as' => 'news.category.update',         'uses' => 'TaxonomyController@taxonomiesUpdate'  ]);
    Route::get(  '/news/categories/{id}/delete',     [ 'as' => 'news.category.delete',         'uses' => 'TaxonomyController@taxonomiesDelete'  ]);
});
