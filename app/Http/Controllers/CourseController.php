<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class CourseController extends Controller
{
    public function index()
    {
        $courses=Course::all();
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
       // $courses->user_id=$request->input('user_id');
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
       // $course->user_id=$request->input('user_id');
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
