<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Course;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::all();
        return view('home',compact('tasks'));
    }

    public function create()
    {
        $courses= Course::select('id','name')->orderBy('name', 'ASC')->get();
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
