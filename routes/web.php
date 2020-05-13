<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('role-test',function (){
    $role=\App\Role::find(2);
   return $role->users;
});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('units-test','DataImportController@importUnits');
Route::group(['auth','user_is_admin'],function (){
    //units
    Route::get('units','UnitController@index')->name('units');
    Route::post('units','UnitController@store');
    Route::delete('units','UnitController@delete');
    Route::put('units','UnitController@update');
    Route::get('search-units/','UnitController@search')->name('search-units');

    //categories
    Route::get('categories','CategoryController@index')->name('categories');
    Route::post('categories','CategoryController@store');
    Route::delete('categories','CategoryController@delete');
    Route::put('categories','CategoryController@update');
    Route::get('search-categories','CategoryController@search')->name('search-categories');

    //Products
    Route::get('products','ProductController@index')->name('products');
    Route::get('new-product/{id?}','ProductController@newProduct')->name('new-product');
    Route::post('new-product','ProductController@store');

    Route::get('update-product/{id}','ProductController@newProduct')->name('update-product');

    Route::get('update-product','ProductController@update')->name('update-product');
    Route::delete('products/{id}','ProductController@delete');
    //Tags

    Route::get('tags','TagController@index')->name('tags');
    Route::post('tags','TagController@store');
    Route::delete('tags','TagController@delete');
    Route::put('tags','TagController@update');

    Route::get('search-tags','TagController@search')->name('search-tags');


    //Payments

    //Orders


    //Shipments

    //countries
    Route::get('countries','CountryController@index')->name('countries');

    //Cities
    Route::get('cities','CityController@index')->name('cities');
    //States
    Route::get('states','StateController@index')->name('states');


    //Reviews

    Route::get('reviews','ReviewController@index')->name('reviews');
    //Tickets

    Route::get('tickets','TicketController@index')->name('tickets');

    //Roles
    Route::get('roles','RoleController@index')->name('roles');



});
