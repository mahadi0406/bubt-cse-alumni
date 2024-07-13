<?php

use App\Http\Controllers\Admin\AlumniController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin', 'namespace' => 'JoulesLabs\IllumineAdmin\Controllers'], function() {
    Route::get('/login', 'AuthController@loginPage')->name('auth.login.page');
    Route::post('/login', 'AuthController@login')->name('auth.login');
});

Route::group(['middleware' => 'auth:admin', 'namespace' => 'JoulesLabs\IllumineAdmin\Controllers'], function() {
    Route::get('/', function () {
        return "Hello, Admin!";
    });
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    Route::view('/welcome', 'admin.home')->name('home');

    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users', 'UserController@store')->name('user.store');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/users/{id}', 'UserController@update')->name('user.update');
    Route::get('/users/change_password', 'UserController@changePassword')->name('user.change_password_page');
    Route::post('/users/change_password', 'UserController@updatePassword')->name('user.change_password');

    Route::get('/roles', 'RoleController@index')->name('role.index');
    Route::get('/roles/create', 'RoleController@create')->name('role.create');
    Route::post('/roles', 'RoleController@store')->name('role.store');
    Route::get('/roles/{id}/edit', 'RoleController@edit')->name('role.edit');
    Route::put('/roles/{id}', 'RoleController@update')->name('role.update');

    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::put('/alumni/{id}/change-status', [AlumniController::class, 'changeStatus'])->name('alumni.change-status');
    Route::get('/alumni/requests', [AlumniController::class, 'requests'])->name('alumni.requests');
    Route::put('/alumni/requests/{id}', [AlumniController::class, 'requestsStatusChange'])->name('alumni.requests.change-status');
});
