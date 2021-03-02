<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;
use App\User;
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:asignatura')->only('index');
        $this->middleware('can:asignatura create')->only('create','store');
        $this->middleware('can:asignatura edit')->only('edit','update');
        $this->middleware('can:asignatura delete')->only('destroy');
        
    }
    public function index()
    {
        
        $id=Auth::user()->id;
        $user=User::find($id);
        $rol=$user->roles->implode('name',',');
        if($rol=='admin'){
            $courses=Course::paginate(5);
            return view('course.index',compact('courses'));
        }
        $courses=Course::where('user_id','=',$id)->orWhereNull('id')->paginate(5);
        return  view('course.index',compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function edit($id)
    {
        $course=Course::find($id);
        return view('course.edit',compact('course'));
    }

    public function store(Request $request)
    {
        
      $request->validate([
        'name'=>'required|regex:/^[a-zA-Z\s]+$/u',
        'teacher'=>'required|regex:/^[a-zA-Z\s]+$/u',
        'description'=>'required|regex:/^[a-zA-Z\s]+$/u',
       ]);

        $courses=new Course();
        $courses->name= $request->input('name');
        $courses->teacher=$request->input('teacher');
        $courses->description=$request->input('description');
        $courses->user_id=$request->input('user_id');
        $courses->save();
        $notification='La asignatura se a creado satisfactoriamente';

        return redirect('courses')->with(compact('notification'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'teacher'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'description'=>'required|regex:/^[a-zA-Z\s]+$/u',
           ]);

        $course=Course::find($id);
        $course->name= $request->input('name');
        $course->teacher=$request->input('teacher');
        $course->description=$request->input('description');
        $course->user_id=$request->input('user_id');
        $course->save();
        
        $notification = 'La asignatura se ha editado correctamente';

        return redirect('courses')->with(compact('notification'));

    }
    public function destroy(Course $course)
    {
        $courseDeleted=$course->name;
        $course->delete();
        $notification = 'La asignatura ' . $courseDeleted . ' se ha eliminado correctamente';

        return redirect('courses')->with(compact('notification'));
    }
}
