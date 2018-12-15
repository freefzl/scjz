<?php
Route::post('uploadImg', 'PublicController@uploadImg')->name('uploadImg');

Route::namespace('Home')->domain('www.'.env("DOMAIN"))->group(function () {

    Route::get('/','IndexController@index')->name('home');
    Route::post('/getMobile','IndexController@getMobile')->name('getMobile');
    Route::get('/about','AboutController@index')->name('about');
    Route::get('/product','ProductController@index')->name('product');
    Route::get('/details/{id}','ProductController@details')->name('details');
    Route::post('/getProduct','ProductController@getProduct')->name('getProduct');

});



Route::namespace('Wap')->domain('m.'.env("DOMAIN"))->group(function () {
    Route::get('/', 'IndexController@index');
    Route::get('/class', 'IndexController@classification');
    Route::get('/product/{id}', 'IndexController@product');
    Route::get('/details/{id}', 'IndexController@details');
    Route::post('/search', 'IndexController@search')->name('search');
    Route::post('/postData', 'IndexController@postData')->name('postData');
});



















