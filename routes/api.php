<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1')->namespace('CrCms\Category\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->namespace('Manage')->group(function(){
        Route::get('categories/attributes', 'AttributeController@index')->name('category.attributes.index');
        Route::get('categories/attributes/{id}', 'AttributeController@show')->where('id', '[A-Za-z_]+')->name('category.attributes.show');

        Route::resource('categories', 'CategoryController')->names([
            'index' => 'category.categories.index',
            'store' => 'category.categories.store',
            'update' => 'category.categories.update',
            'destroy' => 'category.categories.destroy',
        ])->except(['show']);
    });
});
