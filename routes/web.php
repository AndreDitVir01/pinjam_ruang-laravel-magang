<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
  return view('welcome');
});

// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@getLogin'
  ]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
  ]);

  Route::get('/notadmin', function() {
    return view('notadmin');
  })->middleware('auth:user');

// Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/admin', 'AdminsController@index');
    Route::resource('rooms', 'RoomsController');
    Route::resource('users', 'UsersController');
    Route::resource('bookings', 'BookingsController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('position_in_departments', 'PositionInDepartmentsController');
});

// Route::prefix('/admin')->name('admin.')->group(function(){
//     Route::get('/', 'AdminController@index')->middleware('auth:admin');
//     Route::resource('/rooms', 'RoomsController');
//     Route::resource('/users', 'UsersController');
//     Route::resource('/bookings', 'BookingsController');
//     Route::resource('/departments', 'DepartmentsController');
//     Route::resource('/position_in_departments', 'PositionInDepartmentsController');
//   });

// Route::get('/searchajax',array('as'=>'searchajax','uses'=>'UsersController@autoComplete'));
