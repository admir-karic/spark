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

Route::get('/', 'Facts');

Auth::routes();

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::get('admin', 'HomeController@admin')->name('admin');
Route::get('admin/users','AdminController@getUsers')->name('users');
Route::get('admin/banuser/{id}','AdminController@banUser')->name('banUser');
Route::get('admin/unbanuser/{id}','AdminController@unbanUser')->name('unbanUser');
Route::get('admin/banned-users','AdminController@getBannedUsers')->name('bannedUsers');
Route::post('admin/banned-users','AdminController@searchUser')->name('searchUser');
Route::get('admin/games','AdminController@getGames')->name('games');
Route::get('admin/edit-game/{id}','AdminController@editGame')->name('editGame');
Route::post('admin/edit-game/{id}','AdminController@saveGame')->name('editGame');
Route::get('admin/add-game','AdminController@addGame')->name('addGame');
Route::post('admin/add-game','AdminController@addNewGame')->name('addGame');
Route::get('admin/delete-game/{id}','AdminController@deleteGame')->name('deleteGame');
Route::post('admin/games','AdminController@searchGames')->name('searchGames');
Route::get('admin/categories','AdminController@getCategories')->name('getCategories');
Route::post('admin/categories','AdminController@searchCategories')->name('searchCategories');
Route::get('admin/delete-category/{id}','AdminController@deleteCategory')->name('deleteCategory');
Route::get('admin/add-category','AdminController@addCategory')->name('addCatergory');
Route::post('admin/add-category','AdminController@saveCategory')->name('addCategory');
Route::get('admin/languages','AdminController@getLanguages')->name('getLanguages');
Route::post('admin/languages','AdminController@searchLanguages')->name('searchLanguages');
Route::get('admin/delete-languages/{id}','AdminController@deleteLanguage')->name('deleteLanguage');
Route::get('admin/add-language','AdminController@addLanguage')->name('addLanguage');
Route::post('admin/add-language','AdminController@saveLanguage')->name('addLanguage');
});