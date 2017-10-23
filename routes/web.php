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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'Auth\AuthenticationController@index']);

    Route::group(['prefix' => 'user'], function () {
        Route::get(
            '{hashedUserId}',
            [
                'as' => 'user.details',
                'middleware' => 'hashids',
                'uses' => 'Users\UserController@getProfile'
            ]
        );

        Route::post(
            '{hashedUserId}',
            [
                'as' => 'user.details.update',
                'middleware' => 'hashids',
                'uses' => 'Users\UserController@updateProfile'
            ]
        );
    });
});

Route::group(['middleware' => ['guest'], 'namespace' => 'Auth'], function () {
    Route::get('/auth/login', ['as' => 'auth.login', 'uses' => 'AuthenticationController@getLogin']);
    Route::post('/auth/login', 'AuthenticationController@postLogin');

    Route::get(
        '/signup',
        [
            'as' => 'clients.sign_up',
            'uses' => 'AuthenticationController@getSignUpView'
        ]
    );

    Route::post(
        '/signup',
        [
            'as' => 'clients.signup.save',
            'uses' => 'AuthenticationController@postSignUp'
        ]
    );
});

Route::get('/auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthenticationController@getLogout'
]);