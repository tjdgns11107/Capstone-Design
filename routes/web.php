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


// 메인 페이지

Route::get('/', 'MainController@index');

// 사용자 가입

Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);

Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);


// 사용자 인증

Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);

Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);

Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);


// 사용자 정보 수정

Route::get('auth/change', [
    'as' => 'informations.index',
    'uses' => 'InformationsController@index',
]);

Route::post('auth/change', [
    'as' => 'informations.update',
    'uses' => 'InformationsController@update',
]);


// 제품 페이지

Route::resource('products', 'ProductsController');


// 주문 페이지

// Route::get('products/order/{product}', [
//     'as' => 'orders.create',
//     'uses' => 'OrdersController@create',
// ]);


// Route::post('order', [
//     'as' => 'orders.store',
//     'uses' => 'OrdersController@store',
// ]);

// Route::delete()


// 질문 페이지

Route::resource('qna', 'QuestionsController');

