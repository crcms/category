<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api')->namespace('CrCms\Category\Http\Controllers\Api\Manage')->middleware('api')->group(function () {
    Route::resource('categories', 'CategoryController');

    //Route::get('test','');
});

