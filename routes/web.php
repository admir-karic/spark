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
Route::get('admin/discounts','AdminController@getDiscounts')->name('getDiscounts');
Route::post('admin/discounts','AdminController@searchDiscounts')->name('searchDiscounts');
Route::get('admin/delete-discounts/{id}','AdminController@deleteDiscount')->name('deleteDiscount');
Route::get('admin/add-discount','AdminController@addDiscount')->name('addDiscount');
Route::post('admin/add-discount','AdminController@saveDiscount')->name('addDiscount');
Route::get('admin/specifications','AdminController@getSpecifications')->name('getSpecifications');
Route::post('admin/specifications','AdminController@searchSpecifications')->name('searchSpecifications');
Route::get('admin/delete-specifications/{id}','AdminController@deleteSpecification')->name('deleteSpecification');
Route::get('admin/add-specification','AdminController@addSpecification')->name('addSpecification');
Route::post('admin/add-specification','AdminController@saveSpecification')->name('addSpecification');
Route::get('admin/player-numbers','AdminController@getPlayerNumbers')->name('getPlayerNumbers');
Route::post('admin/player-numbers','AdminController@searchPlayerNumbers')->name('searchPlayerNumbers');
Route::get('admin/delete-player-numbers/{id}','AdminController@deletePlayerNumber')->name('deletePlayerNumber');
Route::get('admin/add-player-number','AdminController@addPlayerNumber')->name('addPlayerNumber');
Route::post('admin/add-player-number','AdminController@savePlayerNumber')->name('addPlayerNumber');
Route::get('admin/add-category-game','AdminController@addCategoryGame')->name('addCategoryGame');
Route::post('admin/add-category-game','AdminController@saveCategoryGame')->name('addCategoryGame');
Route::get('admin/add-language-game','AdminController@addLanguageGame')->name('addLanguageGame');
Route::post('admin/add-language-game','AdminController@saveLanguageGame')->name('addLanguageGame');
});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
Route::get('store','ShopController@store')->name('store');
Route::get('preview/{id}','ShopController@preview')->name('preview');
Route::post('add-review/{id}','ShopController@addReview')->name('addReview');
Route::post('add-order/{id}','ShopController@addOrder')->name('addOrder');
});