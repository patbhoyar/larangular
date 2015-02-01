<?php

Route::get('/', function()
{
	return \Illuminate\Support\Facades\Redirect::to('/contacts/');
});

Route::get("/contacts/", "ContactsController@index");
Route::get("/contacts/getAll", "ContactsController@getAll");
Route::get("/contacts/{id}", "ContactsController@show");
Route::put("/contacts/update/{id}", "ContactsController@update");
Route::delete("/contacts/{id}", "ContactsController@destroy");
Route::post("/contacts/store", "ContactsController@store");
