<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = todo::orderBy('completed')->latest()->paginate(5);
        return view('todos.index' , compact('todos'));
    }

    public function show(todo $todo)
    {
        return view('todos.show' , compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'description'  => 'required',
        ]);

        todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        session()->flash("success", 'تبریک میگم، شما موفق شدید تسک را ایجاد کنین');

        return redirect()->route('todos.index');
    }

    public function edit(todo $todo)
    {
        return view('todos.edit' , compact('todo'));
    }

    public function update(Request $request , todo $todo)
    {
        $request->validate([
            'title' =>  'required',
            'description'  => 'required',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        session()->flash("success", 'تبریک میگم، شما موفق شدید تسک را ویرایش کنین');

        return redirect()->route('todos.index');
    }

    public function delete(todo $todo)
    {
        $todo->delete();

        session()->flash("error", 'تبریک میگم، شما موفق شدید تسک را حذف کنین');

        return redirect()->route('todos.index');
    }

    public function complete(todo $todo)
    {
        if ($todo->completed) {
            $todo->update([
                'completed' => 0
            ]);
        } else {
            $todo->update([
                'completed' => 1
            ]);
        }
        
        

        session()->flash("success", 'تبریک میگم، شما موفق شدید عملیات را انجام دهید');

        return redirect()->route('todos.index');
    }
}
