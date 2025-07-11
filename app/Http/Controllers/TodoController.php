<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TodoController extends Controller
{
    function homepage(){
        //  Logic for the homepage
        return view('homepage');
    }
    function allTodos(){
        //  Logic for displaying all todos
        $todos = Todo::latest()->get();
        // return view('AllTodos', compact('todos'));
        return view('AllTodos', compact('todos'));
    }
    function storeTodo(Request $request){
        // ! Validation
        $request->validate  ([
            'title'=>'required|min:3|max:50',
            'detail'=>'nullable|max:200',
            'publish_date'=>'required|after_or_equal:today',
        ],[
            'title.required'=>'Title koi??',
            'title.min'=>'Title must be at least 3 characters',
            'title.max'=>'Title must not exceed 50 characters',
            'detail.max'=>'Detail must not exceed 200 characters',
            'publish_date.required'=>'Publish date is required',
            'publish_date.after_or_equal'=>'Publish date must be today or later',
        ]);

        // ! Storing data
        try {
            Todo::create($request->all());
            return to_route('todos')->with('msg', [
                'type' => 'success',
                'res' => 'Todo created successfully!',
            ]);
        } catch (Exception $error) {
            dd($error);
        }
    }
}
