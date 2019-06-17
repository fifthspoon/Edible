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

Route::get('/', 'RecipesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/create_recipe', 'CreateRecipeController@index')->name('create_recipe');

Auth::routes();

Route::get('/eula', 'EulaController@index')->name('eula');

Auth::routes();

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

Auth::routes();

Route::get('/delete', 'AdminController@delete')->middleware('is_admin')->name('admin');

Auth::routes();

Route::get('/welcome', 'RecipesController@index');

Auth::routes();
 
Route::get('/meat', 'RecipesController@getByCategoryMeat');

Auth::routes();
 
Route::get('/fish', 'RecipesController@getByCategoryFish');

Auth::routes();
 
Route::get('/myrecipe', 'RecipesController@getMyRecipe');

Auth::routes();
 
Route::get('/create_recipe', function () {
    return view('create_recipe');
});

Auth::routes();
 
Route::post('/added', 'RecipesController@store');

Auth::routes();
 
Route::get('/search', 'RecipesController@search');
