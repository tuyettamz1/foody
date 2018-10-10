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

Auth::routes();

Route::get('/', 'PlaceController@index');
Route::get('/permission', function(){
    return view('permission');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
	Route::get('','AdminController@index');
    Route::group(['prefix'=>'categories'],function(){
        Route::get('','AdminController@getIndexCategory');
        Route::get('create','AdminController@getCreateCategory');
        Route::post('create','AdminController@postCreateCategory')->name('categories.create');
        Route::get('edit/{id}','AdminController@getEditCategory');
        Route::post('edit/{id}','AdminController@postEditCategory')->name('categories.edit');
        Route::get('delete/{id}','AdminController@deleteCategory')->name('categories.delete');        
    });

    Route::group(['prefix'=>'districts'],function(){
        Route::get('','AdminController@getIndexDistrict');
        Route::get('create','AdminController@getCreateDistrict');
        Route::post('create','AdminController@postCreateDistrict')->name('districts.create');
        Route::get('edit/{id}','AdminController@getEditDistrict');
        Route::post('edit/{id}','AdminController@postEditDistrict')->name('districts.edit');
        Route::get('delete/{id}','AdminController@deleteDistrict')->name('districts.delete');        
    });

    Route::group(['prefix'=>'users'],function(){
        Route::get('','AdminController@getIndexUser');
        Route::get('edit/{id}','AdminController@getEditUser');
        Route::post('edit/{id}','AdminController@postEditUser')->name('users.edit');
        Route::get('delete/{id}','AdminController@deleteUser')->name('users.delete');        
    });

    Route::group(['prefix'=>'places'],function(){
        Route::get('','AdminController@getIndexPlace');        
        Route::get('pending','AdminController@getPendingPlace');        
        Route::get('approved/{id}/{flag}','AdminController@getApprovedPlace');        
        Route::get('delete/{id}','AdminController@getDeletePlace');        
        Route::get('view/{id}','AdminController@getViewPlace');        
    });

    Route::group(['prefix'=>'advertisements'],function(){
        Route::get('','AdminController@getIndexAd');        
        Route::get('create','AdminController@getCreateAd');        
        Route::post('create','AdminController@postCreateAd')->name('advertisements.create');        
        Route::get('deactive/{id}','AdminController@getDeactiveAd');        
        Route::post('deactive/{id}','AdminController@postDeactiveAd');   
        Route::get('delete/{id}','AdminController@deleteAd');     
    });

});

Route::group(['prefix'=>'places'],function(){       
        Route::post('create','PlaceController@store')->name('places.create');
        Route::post('rating','PlaceController@rating')->name('places.rating');
        Route::get('edit/{id}','PlaceController@edit');
        Route::post('update','PlaceController@update')->name('places.update');
        Route::post('comment','PlaceController@comment')->name('places.comment');
        Route::post('comment','PlaceController@comment')->name('places.comment');
        
          
    });
Route::get('them-dia-diem','PlaceController@create')->middleware('auth');
Route::get('/dia-diem/{slug}','PlaceController@show');
Route::get('dia-diem/category/{category}','PlaceController@category');
Route::get('lien-he','HomeController@contact');
Route::post('lien-he','HomeController@postContact')->name('contact');
Route::get('gioi-thieu','HomeController@about');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
