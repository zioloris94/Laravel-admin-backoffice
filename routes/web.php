<?php

Route::get('/', function () {
    //return realpath(base_path('resources/views'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('tabellacustomers','Controller@getDataCustomers');

Route::get('tabellaagenti','Controller@getDataAgenti');

/*REGISTRAZIONE*/
Route::get('insertusers',function(){
    return view ('insertusers');
});
Route::post('/insert','registercontroller@register');

/*******LOGIN******/
Route::get('accesso',function(){
    return view ('accesso');
});

Route::post('/loginme','loginController@login');

/*****CRUD*****/

Route::post('crud/delete', 'CRUDController@delete');

Route::post('/crudinsert','CRUDController@add');

Route::post('crud/update','CRUDController@update');

Route::get('crud/view', 'CRUDController@view');

Route::get('searchcustomers','Controller@searchcustomers');

Route::get('searchagenti','Controller@searchagenti');

/********FILTERS*******/

Route::get('name/asc', 'Controller@nameasc');

Route::get('name/desc', 'Controller@namedesc');

Route::get('email/desc', 'Controller@emaildesc');

Route::get('email/asc', 'Controller@emailasc');

Route::get('agente/desc', 'Controller@agentedesc');

Route::get('agente/asc', 'Controller@agenteasc');