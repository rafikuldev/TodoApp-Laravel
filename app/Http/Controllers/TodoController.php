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
        $todos = Todo::orderBy('status','ASC')->latest()->paginate(6);
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

    function deleteTodo(Request $request){
        // ! Deleting a todo
        $todo = Todo::find($request->id);
        try {
            $todo->delete();
            return to_route('todos')->with('msg', [
                'type' => 'success',
                'res' => 'Todo deleted successfully!',
            ]);
        } catch (\Throwable $error) {
            return to_route('todos')->with('msg', [
                'type' => 'error',
                'res' => 'Failed to delete todo!',
            ]);
        }
    }
    function editTodo(Request $request){
        // ! Editing a todo
        $todo = Todo::findOrFail($request->id);
        try {
            return view('Edit', compact('todo'));
        } catch (\Throwable $error) {
            return to_route('todos')->with('msg', [
                'type' => 'error',
                'res' => 'Failed to load todo for editing!',
            ]);
        }
    }
    function updateTodo(Request $request, $id){
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
            Todo::findOrFail($id)->update($request->all());
            return to_route('todos')->with('msg', [
                'type' => 'success',
                'res' => 'Todo created successfully!',
            ]);
        } catch (Exception $error) {
            dd($error);
        }
    }
    public function markComplete($id) {
    $todo = Todo::findOrFail($id);

    try {
        $todo->update(['status' => 1]);  // status কে ১ দিয়ে দাও, না লিখো 'completed'
        return to_route('todos')->with('msg', [
            'type' => 'success',
            'res' => 'Todo marked as completed!',
        ]);
    } catch (\Throwable $error) {
        dd($error);
    }
}


}
