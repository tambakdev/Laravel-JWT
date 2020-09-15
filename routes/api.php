<?php

use App\Helpers\getOption;
use App\Http\Controllers\Modul\RandomAyatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Modul')->group(function () {
    Route::get('quote', 'RandomAyatController@quote')->name('modul.randomayat.quote');
    Route::post('login', 'AuthController@login')->name('modul.login');
    Route::prefix('option')->group(function () {
        Route::get('get/{name}', 'OptionController@getOption')->name('modul.options.get');
    });

    Route::middleware('jwt.verify')->group(function () {
        Route::post('refresh-token', 'AuthController@refreshToken')->name('modul.refresh-token');
        Route::post('logout', 'AuthController@logout')->name('modul.logout');
        Route::get('profile', 'AuthController@getUserAuth')->name('modul.profile');
        Route::post('update-profile', 'AuthController@updateUserAuth')->name('modul.update-profile');
        Route::post('update-password', 'AuthController@updatepasswordUserAuth')->name('modul.update-password');

        Route::prefix('option')->group(function () {
            Route::put('update/{name}', 'OptionController@updateOption')->name('modul.option.update');
        });
        Route::prefix('random-ayat')->group(function () {
            Route::get('list', 'RandomAyatController@index')->name('modul.randomayat.index');
            Route::get('show/{id}', 'RandomAyatController@show')->name('modul.randomayat.show');
            Route::post('create', 'RandomAyatController@create')->name('modul.randomayat.create');
            Route::put('update/{id}', 'RandomAyatController@update')->name('modul.randomayat.update');
            Route::delete('destroy/{id}', 'RandomAyatController@destroy')->name('modul.randomayat.destroy');
        });
    });
});