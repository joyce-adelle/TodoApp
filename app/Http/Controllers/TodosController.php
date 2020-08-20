<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;

class TodosController extends Controller
{
    public function index()
    {

        $todos = Todos::all();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'todo' => 'required'
        ]);

        Todos::create([
            'title' => $request->todo
        ]);

        session()->flash('msg', 'Todo has been added');
        return redirect('/');
    }

    public function delete($id)
    {

        Todos::destroy($id);

        return redirect()->back()->with('msg', 'Todo has been deleted');
    }
}
