<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'Auth\AuthController@index');
    Route::post('authentication', 'Auth\AuthController@authentication');

});


# GROUP BACKEND
Route::group(['middleware'=> ['web','auth'] ], function(){

    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');

    # USERS
    Route::get('users','Backend\UsersController@index');
    Route::get('users/create','Backend\UsersController@create');

    # STATUS
    Route::get('status','Backend\StatusController@index');
    Route::get('status/create','Backend\StatusController@create');
    Route::get('status/update/{id}','Backend\StatusController@update');
    Route::get('status/delete/{id}','Backend\StatusController@delete');
    Route::post('status/actions','Backend\StatusController@actions');

    # PAGINATION
    Route::get('pagination','Backend\PaginationController@index');
    Route::get('pagination/create','Backend\PaginationController@create');
    Route::get('pagination/update/{id}','Backend\PaginationController@update');
    Route::get('pagination/delete/{id}','Backend\PaginationController@delete');
    Route::post('pagination/actions','Backend\PaginationController@actions');

    # PAGINATION
    Route::get('priority','Backend\PriorityController@index');
    Route::get('priority/create','Backend\PriorityController@create');
    Route::get('priority/update/{id}','Backend\PriorityController@update');
    Route::get('priority/delete/{id}','Backend\PriorityController@delete');
    Route::post('priority/actions','Backend\PriorityController@actions');

    # TASKS
    Route::get('tasks','Backend\TasksController@index');
    Route::get('tasks/create','Backend\TasksController@create');
    Route::get('tasks/update/{id}','Backend\TasksController@update');
    Route::get('tasks/delete/{id}','Backend\TasksController@delete');
    Route::post('tasks/actions','Backend\TasksController@actions');

});
