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

//comment app
$app->get('comments', function() use ($app) {
    return view('comments');
});

$app->get('api/comment', 'App\Http\Controllers\CommentController@index');
$app->post('api/comment', 'App\Http\Controllers\CommentController@store');
$app->delete('api/comment/{id}', 'App\Http\Controllers\CommentController@destroy');

//angular file operation
$app->post('file', '\App\Http\Controllers\FileController@saveFile');
$app->post('list', '\App\Http\Controllers\FileController@getFileList');
$app->get('view/{filename}', '\App\Http\Controllers\FileController@viewFile');
$app->get('delete/{filename}', '\App\Http\Controllers\FileController@deleteFile');

// $app->get('todos',function(){
// 	return view('todos');
// });

//todo app
use App\Todos;
use Illuminate\Http\Request;

/**
* Render main view
*/
$app->get('todoapp', function() 
{
    return view('todos.index');
});

/**
* Get all todos
*/
$app->get('todos', function()
{
    $todos = Todos::orderBy('created_at', 'DESC')->paginate(5)->toArray();
    $remaining = Todos::where('completed', 0)->count();

    return ['todos' => $todos, 'remaining' => $remaining];

});

/**
* Create todo
*/
$app->post('add-todo', function(Request $request)
{
    Todos::create($request->all());
});

/**
* Delete todo
*/
$app->post('todos/delete/{id}', function($id)
{
    Todos::destroy($id);
});

/**
* Complete todo
*/
$app->post('todos/complete/{id}/{completed}', function($id, $completed)
{
    Todos::where('id', $id)->update(['completed' => $completed]);
});

/**
* Update todo
*/
$app->post('update/{id}', function(Request $request, $id)
{
    Todos::where('id', $id)->update([
        'name' => $request->input('name'),
        'body' => $request->input('body'),
        'completed' => $request->input('completed')
    ]);
});

/**
* Render add todo
*/
$app->get('add-form', function()
{
    return view('todos.templates.add_form');
});

/**
* Render update todo
*/
$app->get('edit-form', function()
{
    return view('todos.templates.edit_form');
});

/**
* Todos table
*/
$app->get('todos-table', function()
{
    return view('todos.templates.todos_table');
});
 