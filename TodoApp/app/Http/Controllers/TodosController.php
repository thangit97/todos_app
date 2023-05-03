<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::orderBy('updated_at', 'desc')->paginate(5);
        return view('todos.index')->with('todos', $todos);
    }

    public function show(Todo $todo) {
        return view('todos.show')->with('todo', $todo);
    }

    public function create() {
        return view('todos.create');
    }

    public function store(Request $request) {
        $validatedData = validator::make($request->all(), [
            'name' => 'required|min:6|max:50',
            'description' => 'required',
        ]);

        if ($validatedData->fails()) {
            return redirect('/new-todos')
                        ->withErrors($validatedData)
                        ->withInput();
        }

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/todos');
    }

    public function edit(Todo $todo) {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, Todo $todo) {
       $this->validate(request(), [
            'name' => 'required|min:6|max:50',
            'description' => 'required',
        ]);
        
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/todos');

    }

    public function destroy(Todo $todo) {
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo) {
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Todo completed successfully');
        return redirect('/todos');
    }
}