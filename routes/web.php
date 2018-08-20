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

    Route::get('/course/list/{id}', 'CourseController@showByCategory')->name('course.list');
    Route::resource('/course', 'CourseController');

    Route::resource('/role', 'RoleController');

    Route::get('/permission/add/{user_id}/{permission_name}', 'PermissionController@add');
    Route::get('/permission/remove/{user_id}/{permission_name}', 'PermissionController@remove');
    Route::resource('/permission', 'PermissionController');

    Route::get('/message/sent', 'MessageController@sent')->name('message.sent');
    Route::get('/message/image/{name}', 'MessageController@image')->name('message.image');
    Route::resource('/message', 'MessageController');

    Route::get('/enroll/image/{name}', 'EnrollController@image');
    Route::resource('/enroll', 'EnrollController');

});

Route::group(['prefix' => 'user','namespace'=>'User', 'middleware'=> 'user'], function() {
    Route::get('/', function() {
        return redirect('/user/course');
    });

    Route::get('my_course', 'CourseController@myCourse');
    Route::get('my_course/{id}', 'CourseController@show');
    Route::get('my_course/download/{id}', 'CourseController@download');
    Route::resource('/course', 'CourseController');

    Route::get('/message/sent', 'MessageController@sent')->name('message.sent');
    Route::get('/message/image/{name}', 'MessageController@image')->name('message.image');
    Route::resource('/message', 'MessageController');
    Route::resource('/enroll', 'EnrollController');
});

Route::get('/test', function() {
    $user = App\UserVerify::find(2);
    return $user->user->name;
});