<?php

Route::group(['namespace' => 'Wap'], function () {
    Route::get('/','IndexController@index')->name('wap');

});



