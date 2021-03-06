<?php

$app->get('/', function() use ($app) {
    return view('index'); //$app->welcome();
});

$app->post('/create-user', 'App\Http\Controllers\UserController@store');
$app->get('/read-users', 'App\Http\Controllers\UserController@index');
$app->get('/read-user/{id}', 'App\Http\Controllers\UserController@show');
$app->post('/edit-user/{id}', 'App\Http\Controllers\UserController@update');
$app->post('/delete-user', 'App\Http\Controllers\UserController@destroy');

//lumen angular
$app->get('angular', function() use ($app) {
    return view('angular'); //$app->welcome();
});

//lumen vuejs
$app->get('vuejs',function(){
	return view('vue');
});


$app->get('auth/log', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLog']);
$app->post('auth/login', ['uses' => 'App\Http\Controllers\Auth\AuthController@postLogin']);
$app->get('auth/logout', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLogout']);
$app->get('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@getRegister']);
$app->post('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@postRegister']);

$app->get('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getEmail']);
$app->post('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postEmail']);
$app->get('password/reset/{token}', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getReset']);
$app->post('password/reset', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postReset']);


$app->get('dream', ['uses' => 'App\Http\Controllers\DreamController@index']);
$app->post('dream', ['uses' => 'App\Http\Controllers\DreamController@store']);
$app->put('dream/{id}', ['uses' => 'App\Http\Controllers\DreamController@update']);
$app->delete('dream/{id}', ['uses' => 'App\Http\Controllers\DreamController@destroy']);

//wisata app
//lumen angular
$app->get('appwisata', function() use ($app) {
    return view('wisata'); //$app->welcome();
});

$app->get('wisata', ['uses' => 'App\Http\Controllers\WisataController@index']);
$app->post('wisata', ['uses' => 'App\Http\Controllers\WisataController@store']);
$app->put('wisata/{id}', ['uses' => 'App\Http\Controllers\WisataController@update']);
$app->delete('wisata/{id}', ['uses' => 'App\Http\Controllers\WisataController@destroy']);



//comment app
$app->get('comments', function() use ($app) {
    return view('comments');
});

$app->get('api/comment', 'App\Http\Controllers\CommentController@index');
$app->post('api/comment', 'App\Http\Controllers\CommentController@store');
$app->delete('api/comment/{id}', 'App\Http\Controllers\CommentController@destroy');


//cafe spa app
$app->get('cafe',function() {
    return view('cafe.spa');
});
$app->get('api/cafe', 'App\Http\Controllers\CafeController@index');
$app->get('api/cafe/{id}', 'App\Http\Controllers\CafeController@show');
$app->post('api/cafe/{id}', 'App\Http\Controllers\CafeController@update');
$app->post('api/cafe', 'App\Http\Controllers\CafeController@store');
$app->delete('api/cafe/{id}', 'App\Http\Controllers\CafeController@destroy');

//angular file operation
$app->post('file', '\App\Http\Controllers\FileController@saveFile');
$app->post('list', '\App\Http\Controllers\FileController@getFileList');
$app->get('view/{filename}', '\App\Http\Controllers\FileController@viewFile');
$app->get('delete/{filename}', '\App\Http\Controllers\FileController@deleteFile');


$app->get('todoapp', '\App\Http\Controllers\TodoController@index');
$app->get('todos', '\App\Http\Controllers\TodoController@allTodos');
$app->post('add-todo', '\App\Http\Controllers\TodoController@store');
$app->post('todos/delete/{id}', '\App\Http\Controllers\TodoController@destroy');
$app->post('todos/complete/{id}/{completed}', '\App\Http\Controllers\TodoController@completed');
$app->post('update/{id}', '\App\Http\Controllers\TodoController@update' );
$app->get('add-form','\App\Http\Controllers\TodoController@formAdd' );
$app->get('edit-form', '\App\Http\Controllers\TodoController@formEdit');
$app->get('todos-table','\App\Http\Controllers\TodoController@tables');
 

 //my crud
$app->get('customer', function(){
	return view('crud.customers.index');
});