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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomePageController@index');
Route::get('/listing', 'ListingPageController@index');
Route::get('/details', 'DetailsPageController@index');
Route::group(['prefix'=>'back'], function(){
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/categories/create', 'Admin\CategoryController@create');
    Route::get('/categories/edit', 'Admin\CategoryController@edit');
});

Route::get('/hello', function(){
    return 'Hello World';
});

Route::get('/book/{name}', function($name){
    return 'Your Favorite book is: '. $name; 
});

Route::get('/student/{id}/{name?}', function($id, $name = 'Safa'){
    return 'Your id is: '.' '.$id. ' And your name is: '.$name;
})->where('id', '[0-9]+');

Route::get('/world', 'HelloController@hello');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/front/home', 'HomePageController@index');

//Route::view('/about', 'about');
Route::get('/about', 'AboutController@about');
Route::view('/contact', 'contact');
