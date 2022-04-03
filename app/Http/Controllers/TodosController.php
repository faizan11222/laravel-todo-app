<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {
       
      
        return view('todos.index', [
            'todos' => Todo::all(),
            'id' => Todo::all()->pluck('id'),
            'date' => Todo::all()->pluck('date'),
            'title' => Todo::all()->pluck('title'),
            'complete' => Todo::all()->pluck('completed'),
            'desc' => Todo::all()->pluck('description')
           
        ]);
    }
    public function user()
    {
      
    


        return view('todos.user', [
            'todos' => Todo::all(),
            'id' => Todo::all()->pluck('id'),
            'date' => Todo::all()->pluck('date'),
            'title' => Todo::all()->pluck('title'),
            'complete' => Todo::all()->pluck('completed'),
            'desc' => Todo::all()->pluck('description')
           
            
        ]);
    }

    public function create()
    {
        return view('todos/create');
    }

    public function store(Request $req)
    
    {  
        $data = $req->all();
       
      
        
        $todo1 = new Todo;
       
        $todo1->title = $data['title'];
        $todo1->date = \Carbon\Carbon::parse($data['date'])->format("m/d/Y H:i:s");
        $todo1->description =  $data['description'];
        $todo1->completed =  0;
        $todo1->save();
        return redirect('/todos');
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', [
            'todo' => $todo
        ]);
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
       
        return view('todos.edit', [
            'todo' => $todo
        ]);
    }
    public function edituser($id)
    {
        $todo = Todo::findOrFail($id);
          
        return view('todos.edituser', [
            'todo' => $todo
        ]);
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->title = request('title');
        $todo->description = request('description');
        $todo->date = request('date');
        $todo->completed = is_null(request('completed')) ? 0 : 1;
        $todo->save();
        return redirect('/todos');
    }
    public function updateuser($id)
    {
        $todo = Todo::findOrFail($id);
      
        $todo->completed = is_null(request('completed')) ? 0 : 1;
        $todo->save();
        return redirect('/todos');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/todoshow');
    }
}
