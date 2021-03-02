<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Course;
use Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:tareas')->only('index');
        $this->middleware('can:tareas create')->only('create','store');
        $this->middleware('can:tareas edit')->only('edit','update');
        $this->middleware('can:tareas delete')->only('destroy');
        $this->middleware('can:tareas status')->only('updateStatus');
    }

    public function index()
    {
        $id=Auth::user()->id;
        $tasks=Task::where('user_id','=',$id)->orWhereNull('id')->paginate(5);
        //dd($tasks);
        return view('home',compact('tasks'));
    }

    public function create()
    {
        $id=Auth::user()->id;
        $courses= Course::where('user_id','=',$id)->orWhereNull('id')->select('id','name')->orderBy('name', 'ASC')->get();
        return view('task.create',compact('courses'));
    }

    public function edit($id)
    {
        $task=Task::find($id);
        $courses= Course::select('id','name')->orderBy('name', 'ASC')->get();
        return view('task.edit',compact('task','courses'));
    }

    public function store(Request $request)
    {
        
      $request->validate([
        'description'=>'required|regex:/^[a-zA-Z\s]+$/u',
        'delivery_date'=>'date_format:"d-m-Y"',
       ]);

       
        $tasks=new Task();
        $tasks->course_id=$request->input('course');
        $tasks->user_id=$request->input('user_id');
        $tasks->description=$request->input('description');
        $date=$request->input('date');
        $newdate=Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $tasks->delivery_date=$newdate;
        $tasks->save();
    
        
        $notification='La Tarea se ha creado satisfactoriamente';

        return redirect()->route('tareas')->with(compact('notification'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'description'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'delivery_date'=>'date_format:"d-m-Y"',
            ]);

           $task=Task::find($id);
           $task->course_id=$request->input('course');
           $tasks->user_id=$request->input('user_id');
           $task->description=$request->input('description');
           $date=$request->input('date');
           $newdate=Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
           $task->delivery_date=$newdate;
           $task->save();
        
        $notification = 'La Tarea se ha editado correctamente';

        return redirect()->route('tareas')->with(compact('notification'));

    }
    public function destroy(Task $task)
    {
        
        $task->delete();
        $notification = 'La tarea se ha eliminado correctamente';

        return redirect()->route('tareas')->with(compact('notification'));
    }

    public function updateStatus(Request $request,$id)
    {
        $status="inactive";
        $task=Task::find($id);
        $task->status=$status;
        $task->save();
        
        $notification = 'La tarea ha cambiado de status correctamente';
        return redirect()->route('tareas')->with(compact('notification'));
    }
}
