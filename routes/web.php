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
---------------------------------------------------------------------
Verb	        Path	                Action     	Route Name      \
---------------------------------------------------------------------
GET	        /resource	                index	    resource.index
GET	        /resource/create	        create	    resource.create
POST    	/resource	                store	    resource.store
GET	        /resource/{resource}	    show	    resource.show
GET	        /resource/{resource}/edit  	edit	    resource.edit
PUT/PATCH   /resource/{resource}	    update	    resource.update
DELETE	    /resource/{resource}	    destroy	    resource.destroy
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');

    //Route Kelas
    Route::get('kelas', 'KelasController@index');
    Route::match(['get', 'post'], 'kelas/create', 'KelasController@create');
    Route::match(['get', 'put'], 'kelas/update/{id}', 'KelasController@update');
    Route::delete('kelas/delete/{id}', 'KelasController@delete');
});
