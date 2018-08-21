<?php

Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\User\UserController@getAuthUser');
    Route::post('logout', 'Auth\LoginController@logout');
});
Route::get('get-items', 'API\Items\GetItemsController@getItems');
Route::get('menu-categories', 'API\Menu\MenuController@categories');
Route::get('get-items/{catName}', 'API\Items\GetItemsController@cat');
Route::get('get-items/{catName}/{subName}', 'API\Items\GetItemsController@subCat');
Route::get('get-items/{catName}/{subName}/{furthName}', 'API\Items\GetItemsController@furtherCat');
Route::get('get-provinces', 'API\Province\ProvinceController@allProvinces');
Route::get('get-countries', 'API\Country\CountryController@allCountries');
Route::get('get-payment-province/{countryId}', 'API\Province\ProvinceController@states');
Route::get('get-payment-cities/{stateId}', 'API\City\CityController@getPaymentCities');
Route::get('get-cities/{provCode}', 'API\City\CityController@getCities');
Route::get('get-brgys/{citymunCode}', 'API\Brgy\BrgyController@getBrgy');
Route::get('get-selected-brgy/{brgyCode}', 'API\Brgy\BrgyController@selectedBrgy');
Route::post('pay-with-credit-card', 'API\Payment\PaymentController@paywithCreditCard');
Route::get('search-user', 'API\User\UserController@search');
Route::resource('roles', 'API\Roles\RoleController');
Route::resource('items', 'API\Items\ItemsController');
Route::resource('categories', 'API\Category\CategoryController');
Route::resource('user', 'API\User\UserController');

