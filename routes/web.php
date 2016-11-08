<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'manage'],function($router){

    $router->resource('categories','Manage\CategoryController');

});