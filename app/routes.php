<?php

//main views
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'))->before('auth');
Route::post('/', array('uses' => 'HomeController@postIndex'))->before('csrf');
Route::get('/complete', array('as' => 'complete', 'uses' => 'HomeController@getcIndex'))->before('auth');
Route::post('/complete', array('uses' => 'HomeController@postcIndex'))->before('csrf');
Route::get('/all', array('as' => 'all', 'uses' => 'HomeController@getaIndex'))->before('auth');
Route::post('/all', array('uses' => 'HomeController@postaIndex'))->before('csrf');

//new task route
Route::get('/new', array('as' => 'new', 'uses' => 'HomeController@getNew'));
Route::post('/new', array('uses' => 'HomeController@postNew'))->before('csrf');

//delete task route
Route::get('/delete/{item}', array('as' => 'delete','uses' => 'HomeController@getDelete'));

//edit task route
Route::get('/edit/{item}', array('as' => 'edit','uses' => 'HomeController@getEdit'));
Route::post('/edit/{item}', array('uses' => 'HomeController@postEdit'));

//log in route
Route::get('/login', array('as' => 'login', 'uses' => 'LogController@getLogin'))->before('guest');
Route::post('login', array('uses' => 'LogController@postLogin'))->before('csrf');

//log out route
Route::get('/logout', array('as' => 'logout', 'uses' => 'LogController@getLogout'));

//new user route
Route::get('/signup', array('uses' => 'LogController@getSignUp'))->before('guest');
Route::post('signup', array('uses' => 'LogController@postSignUp'))->before('csrf');


Route::bind('item',function($value,$route){
	return Task::where('id', $value)->first();
});

?>