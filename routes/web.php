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

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware'=> 'auth'], function() {
    Route::get('/', function() {
    	return view('admin.users.list');
    });
    Route::get('/user', function() {
    	return view('admin.users.list');
    });
    Route::get('/category', function() {
    	return view('admin.categories.list');
    } );
    Route::get('/image', function() {
    	return view('admin.images.list');
    } );

    Route::get('/course', function() {
    	return view('admin.courses.list');
    });

    Route::get('/role', function() {
    	return view('admin.roles.list');
    });

    Route::get('/permission', function() {
    	return view('admin.permissions.list');
    });

    Route::get('/message', function() {
    	return view('admin.messages.list');
    });

    Route::get('/enroll', function() {
    	return view('admin.enrolls.list');
    });

});

Route::group(['prefix' => 'user','namespace'=>'User', 'middleware'=> 'auth'], function() {
    Route::get('/', function() {
    	return 'User Dashboard';
    });
});

Route::get('/test', function() {
    $user = App\UserVerify::find(2);
    return $user->user->name;
});