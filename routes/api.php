<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1')->namespace('CrCms\Category\Http\Controllers\Api')->middleware('api')->group(function () {

    Route::prefix('manage')->namespace('Manage')->group(function(){
        Route::post('categories/attributes/{type?}','AttributeController@postAttribute')->name('category.attributes.post');
        Route::resource('categories', 'CategoryController');
    });
});

Route::get('abc',function(){
   return 123;
});

