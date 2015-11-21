<?php 
namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TodoController extends BaseController
{

	public function index()
	{
   		 return view('todos.index');
	}

	public function allTodos()
	{
		$todos = Todos::orderBy('created_at', 'DESC')->paginate(5)->toArray();
    	$remaining = Todos::where('completed', 0)->count();

    	return ['todos' => $todos, 'remaining' => $remaining];
	}

	public function store(Request $request)
	{
	    Todos::create($request->all());
	}

	public function destroy($id)
	{
	    Todos::destroy($id);
	}

	public function completed($id, $completed)
	{
	    Todos::where('id', $id)->update(['completed' => $completed]);
	}

	public function update(Request $request, $id)
	{
	    Todos::where('id', $id)->update([
	        'name' => $request->input('name'),
	        'body' => $request->input('body'),
	        'completed' => $request->input('completed')
	    ]);
	}

	public function formEdit()
	{
		return view('todos.templates.edit_form');
	}

	public function formAdd()
	{
 		return view('todos.templates.add_form');
	}

	public function tables()
	{
		return view('todos.templates.todos_table');
	}
	
}