<?php 
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::group(['prefix' => 'bai-viet'], function() {
	    Route::get('/', 'PostController@index')->name('post.list');
	    Route::get('xoa/{id}', 'PostController@remove')->name('post.delete');
		Route::get('them', 'PostController@add')->name('post.add');
		Route::get('sua/{id}', 'PostController@edit')->name('post.edit');
		Route::post('save', 'PostController@save')->name('post.save');

	});
	Route::group(['prefix' => 'category' ], function() {
		Route::get('/', 'CateController@index')->name('cate.list');
		Route::get('xoa/{id}', 'CateController@remove')->name('cate.delete');
		Route::get('them', 'CateController@add')->name('cate.add');
		Route::get('sua/{id}', 'CateController@edit')->name('cate.edit');
		Route::post('save', 'CateController@save')->name('cate.save');
	});
	Route::group(['prefix' => 'user' ], function() {
		Route::get('/', 'UserController@index')->name('user.list');
		Route::get('xoa/{id}', 'UserController@remove')->name('user.delete');
		Route::get('them', 'UserController@add')->name('user.add');
		Route::get('sua/{id}', 'UserController@edit')->name('user.edit');
		Route::get('password/{id}', 'UserController@changepass')->name('change-pass');
		Route::post('passwordsave', 'UserController@PassSave')->name('pass.save');

		Route::post('save', 'UserController@save')->name('user.save');
	});
	Route::get('admin/user', function () {

		})->middleware('checkrole');
 ?>