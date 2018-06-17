<?php



//user route
Route::group(['namespace'=>'User'],function(){

	Route::get('/','HomeController@index')->name('home');
	Route::get('post/{post?}','PostController@post')->name('post');

	//commtent route
	Route::resource('user/comment','CommentController');

	// get post by cateogery and tag routes
	Route::get('posts/cateogery/{cateogery}','HomeController@cateogery')->name('cateogery');
	Route::get('posts/tag/{tag}','HomeController@tag');



});
   

//admin route  ,'middleware'=>'auth:admin'
Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function(){


	Route::get('admin/home','HomeController@index')->name('admin/home');
 
 	//tag search route
 	Route::post('tag/index','TagController@index');
 	Route::get('tag/search','TagController@search');

 	//cateogery search route
 	Route::post('cateogery/index','CateogeryController@index');
 	Route::get('cateogery/search','CateogeryController@search');

 	//post search route
 	Route::post('post/index','PostController@index');
 	Route::get('post/search','PostController@search');

 	//post routes
 	Route::resource('admin/post','PostController');
 	//tag routes
 	Route::resource('admin/tag','TagController');
 	//cateogery routes
 	Route::resource('admin/cateogery','CateogeryController');
 	//user routes
 	Route::resource('admin/user','UserController');

 	//user roles routes
 	Route::resource('admin/role','RoleController'); 

 		//permissions routes
 	Route::resource('admin/permission','PermissionController'); 



});

// admin login

Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function(){

	Route::get('admin/login','Auth\LoginController@showLoginForm');
	Route::post('admin/login','Auth\LoginController@login');		

});		
	
	


Route::get('admin/logout','Admin\Auth\LoginController@logout');


// user login
Route::group(['middleware'=>'guest'],function(){
	Route::get('user/login','User\UserController@get_login_view');
	Route::post('user/login','User\UserController@login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



