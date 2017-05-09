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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/error/403', function () {
    return view('error.403');
});
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('about', 'AboutController@index')->name('about');

    Route::get('about', function () {
        $data = [];
        return view('about', $data);
    })->name('about');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
   Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);
        
    Route::group(['prefix' => 'users'], function() {
        Route::get('', ['as' => 'admin.users.index', 'uses' => 'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
        Route::get('{id}', ['as' => 'admin.users.show', 'uses' => 'UserController@show'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit','middleware' => ['permission:user-edit']]);
        Route::patch('{id}', ['as' => 'admin.users.update', 'uses' => 'UserController@update','middleware' => ['permission:user-edit']]);
        Route::put('{id}', ['as' => 'admin.users.update', 'uses' => 'UserController@update','middleware' => ['permission:user-edit']]);
        Route::get('create', ['as' => 'admin.users.create', 'uses' => 'UserController@create','middleware' => ['permission:user-create']]);
        Route::post('', ['as' => 'admin.users.store', 'uses' => 'UserController@store','middleware' => ['permission:user-create']]);
        Route::delete('{id}', ['as' => 'admin.users.destroy', 'uses' => 'UserController@destroy','middleware' => ['permission:user-delete']]);
        Route::get('search', 'UserController@search');
    });
    
    Route::group(['prefix' => 'category'], function() {
        Route::get('', ['as' => 'admin.category.index', 'uses' => 'CategoryController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
        Route::get('{id}', ['as' => 'admin.category.show', 'uses' => 'CategoryController@show'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoryController@edit','middleware' => ['permission:item-edit']]);
        Route::patch('{id}', ['as' => 'admin.category.update', 'uses' => 'CategoryController@update','middleware' => ['permission:item-edit']]);
        Route::put('{id}', ['as' => 'admin.category.update', 'uses' => 'CategoryController@update','middleware' => ['permission:item-edit']]);
        Route::get('create', ['as' => 'admin.category.create', 'uses' => 'CategoryController@create','middleware' => ['permission:item-create']]);
        Route::post('', ['as' => 'admin.category.store', 'uses' => 'CategoryController@store','middleware' => ['permission:item-create']]);
        Route::delete('{id}', ['as' => 'admin.category.destroy', 'uses' => 'CategoryController@destroy','middleware' => ['permission:item-delete']]);
        Route::get('search', 'CategoryController@search');
    });
    Route::group(['prefix' => 'food'], function() {
           Route::get('', ['as' => 'admin.food.index', 'uses' => 'FoodController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
        Route::get('{id}', ['as' => 'admin.food.show', 'uses' => 'FoodController@show'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'admin.food.edit', 'uses' => 'FoodController@edit','middleware' => ['permission:item-edit']]);
        Route::patch('{id}', ['as' => 'admin.food.update', 'uses' => 'FoodController@update','middleware' => ['permission:item-edit']]);
        Route::put('{id}', ['as' => 'admin.food.update', 'uses' => 'FoodController@update','middleware' => ['permission:item-edit']]);
        Route::get('create', ['as' => 'admin.food.create', 'uses' => 'FoodController@create','middleware' => ['permission:item-create']]);
        Route::post('', ['as' => 'admin.food.store', 'uses' => 'FoodController@store','middleware' => ['permission:item-create']]);
        Route::delete('{id}', ['as' => 'admin.food.destroy', 'uses' => 'FoodController@destroy','middleware' => ['permission:item-delete']]);
        Route::get('search', 'FoodController@search');
    });
});




