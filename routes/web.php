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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware'=> 'admin'], function() {
    Route::get('/', function() {
    	return redirect()->route('user.index');
    });

    Route::resource('/user', 'UserController');

    Route::resource('/category', 'CategoryController');
    Route::get('/category/restore/{id}', 'CategoryController@restore');

    Route::get('/category/sub/{id}', 'SubCategoryController@index');
    Route::get('/category/sub/create/{id}', 'SubCategoryController@create');
    Route::post('/category/sub', 'SubCategoryController@store');
    Route::get('/category/sub/{id}/edit', 'SubCategoryController@edit');
    Route::put('/category/sub/{id}', 'SubCategoryController@update');
    Route::delete('/category/sub/{parentId}/{id}', 'SubCategoryController@destroy');
    Route::get('/category/sub/restore/{parentId}/{id}', 'SubCategoryController@restore');

    Route::resource('/image', 'ImageController');

    Route::resource('/video', 'VideoController');

    Route::resource('/course', 'CourseController');

    Route::resource('/role', 'RoleController');

    Route::resource('/permission', 'PermissionController');

    Route::resource('/message', 'MessageController');

    Route::get('/enroll', function() {
    	return view('admin.enrolls.list');
    });

});

Route::group(['prefix' => 'user','namespace'=>'User', 'middleware'=> 'user'], function() {
    Route::get('/', function() {
    	return 'User Dashboard';
    });
});

Route::get('/test', function() {
    $user = App\UserVerify::find(2);
    return $user->user->name;
});