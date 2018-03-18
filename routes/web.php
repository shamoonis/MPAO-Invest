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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('settings/roles','RoleController@view')->name('settings/roles');
Route::get('settings/getUserRoles','UserRolesController@getUserRoles')->name('settings/getUserRoles');
Route::get('settings/getUserByRole/{id}','UserRolesController@getUserByRole')->name('settings/getUserByRole');

Route::get('funds/view','FundController@view')->name('funds/view');
Route::get('funds/new','FundController@new')->name('funds/new');
Route::post('funds/store','FundController@store')->name('funds/store');

Route::get('institutions/view','InstitutionController@view')->name('institutions/view');
Route::get('institutions/new','InstitutionController@new')->name('institutions/new');
Route::post('institutions/store','InstitutionController@store')->name('institutions/store');

Route::get('types/view','TypeController@view')->name('types/view');
Route::get('types/new','TypeController@new')->name('types/new');
Route::post('types/store','TypeController@store')->name('types/store');

Route::get('investments/new','InvestmentController@new')->name('investments/new');
Route::get('investments/view','InvestmentController@view')->name('investments/view');
Route::post('investments/store','InvestmentController@store')->name('investments/store');