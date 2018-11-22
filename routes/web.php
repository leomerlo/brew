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

Route::get('/', [
	'as' => 'home.index',
	'uses' => 'FrontEndController@index'
]);

Route::middleware(['auth','auth.level'])->prefix('admin')->group(function() {

	Route::get('/', [
		'as' => 'admin.index',
		'uses' => 'RecordTypesController@index'
	]);

	/* CONFIG */

	Route::get('/config', [
		'as' => 'config.index',
		'uses' => 'RecordTypesController@index'
	]);

	Route::get('/config/edit', [
		'as' => 'config.edit',
		'uses' => 'RecordTypesController@add'
	]);

	Route::put('/config/edit', [
		'as' => 'config.editStore',
		'uses' => 'configController@editStore'
	]);

	/* RECORD TYPE */

	Route::get('/recordType', [
		'as' => 'recordType.index',
		'uses' => 'RecordTypesController@index'
	]);

	Route::get('/recordType/add', [
		'as' => 'recordType.formAdd',
		'uses' => 'RecordTypesController@add'
	]);

	Route::post('/recordType/store', [
		'as' => 'recordType.store',
		'uses' => 'RecordTypesController@store'
	]);

	Route::get('/recordType/{id}', [
		'as' => 'recordType.formEdit',
		'uses' => 'RecordTypesController@edit'
	]);

	Route::put('/recordType/{id}', [
		'as' => 'recordType.editStore',
		'uses' => 'RecordTypesController@editStore'
	]);

	Route::delete('/recordType/{id}', [
		'as' => 'recordType.delete',
		'uses' => 'RecordTypesController@delete'
	]);

	Route::get('/recordType/{id}/restore', [
		'as' => 'recordType.restore',
		'uses' => 'RecordTypesController@restore'
	]);

	Route::get('/list/{recordType}', [
		'as' => 'recordType.view',
		'uses' => 'RecordTypesController@view'
	]);

	/* FIELD */

	Route::get('/fields', [
		'as' => 'fields.index',
		'uses' => 'FieldsController@index'
	]);

	Route::post('/fields', [
		'as' => 'fields.indexFilter',
		'uses' => 'FieldsController@indexFilter'
	]);

	Route::get('/fields/add', [
		'as' => 'fields.formAdd',
		'uses' => 'FieldsController@add'
	]);

	Route::post('/fields/store', [
		'as' => 'fields.store',
		'uses' => 'FieldsController@store'
	]);

	Route::get('/fields/{id}', [
		'as' => 'fields.formEdit',
		'uses' => 'FieldsController@edit'
	]);

	Route::put('/fields/{id}', [
		'as' => 'fields.editStore',
		'uses' => 'FieldsController@editStore'
	]);

	Route::delete('/fields/{id}', [
		'as' => 'fields.delete',
		'uses' => 'FieldsController@delete'
	]);

	Route::get('/fields/{id}/restore', [
		'as' => 'fields.restore',
		'uses' => 'FieldsController@restore'
	]);

	/* RECORDS */

	Route::get('/record/{id}/edit', [
		'as' => 'record.formEdit',
		'uses' => 'RecordsController@edit'
	]);

	Route::put('/record/{id}', [
		'as' => 'record.editStore',
		'uses' => 'RecordsController@editStore'
	]);

	Route::delete('/record/{id}', [
		'as' => 'record.delete',
		'uses' => 'RecordsController@delete'
	]);

	Route::get('/record/{id}/restore', [
		'as' => 'record.restore',
		'uses' => 'RecordsController@restore'
	]);

	/* RECORDS */

	Route::get('/user/', [
		'as' => 'user.index',
		'uses' => 'UsersController@index'
	]);

	Route::get('/user/{id}', [
		'as' => 'user.formEdit',
		'uses' => 'UsersController@edit'
	]);

	Route::put('/user/{id}', [
		'as' => 'user.editStore',
		'uses' => 'UsersController@editStore'
	]);

	Route::delete('/user/{id}', [
		'as' => 'user.delete',
		'uses' => 'UsersController@delete'
	]);

	Route::get('/user/{id}/restore', [
		'as' => 'user.restore',
		'uses' => 'UsersController@restore'
	]);

	/* RECORD WILDCARDS */

	Route::get('/{slug}', [
		'as' => 'record.index',
		'uses' => 'RecordsController@index'
	]);

	Route::get('/{slug}/add', [
		'as' => 'record.formAdd',
		'uses' => 'RecordsController@add'
	]);

	Route::post('/{slug}/store', [
		'as' => 'record.store',
		'uses' => 'RecordsController@store'
	]);

});

Route::middleware(['auth'])->group(function() {

	/* COMMENTS */

	Route::post('/comment/{slug}/add', [
		'as' => 'comment.add',
		'uses' => 'CommentsController@store'
	]);

	Route::delete('/comment/{slug}', [
		'as' => 'comment.delete',
		'uses' => 'CommentsController@delete'
	]);

});

Route::view('/error', 'layouts.error')->name('error');

Route::get('/{slug}', [
	'as' => 'record.view',
	'uses' => 'FrontEndController@view',
	'middleware' => 'verificar.slug'
]);