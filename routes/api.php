<?php

use Facades\ {
    Dingo\Api\Routing\Router as Router
};

//Router::version('v3',['middleware' => 'api','prefix'=>'aaaa','namespace' => 'CrCms\Category\Http\Controllers\Api'],function($apiRouter){
//Router::version('v3',['prefix'=>'abc','namespace' => 'CrCms\Category\Http\Controllers\Api'],function($apiRouter){
//
//    Router::group(['middleware' => 'api'], function ($apiRouter) {
//        Router::get('b/categories/create','TestController@index')->name('api.categories.create.a');
//    });
//
//});

$namespace = 'CrCms\Category\Http\Controllers\Api';

Router::version('v1', ['namespace' => $namespace], function ($apiRouter) {

    Router::group(['prefix'=>'manage','namespace'=>'Manage'],function($apiRouter){
        Router::get('categories/create', 'CategoryController@create')
//        ->middleware('api.auth')
            ->name('api.manage.categories.create');
        Router::get('categories/{category}/edit', 'CategoryController@edit')->name('api.manage.categories.edit');
        Router::resource('categories', 'CategoryController', ['names' => [
            'index' => 'api.manage.categories.index',
            'store' => 'api.manage.categories.store',
            'update' => 'api.manage.categories.update',
            'show' => 'api.manage.categories.show',
            'destroy' => 'api.manage.categories.destroy',
        ], 'except' => 'show']);
    });


});






