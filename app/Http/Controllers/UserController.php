<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:admin index')->only('index');
        $this->middleware('can:perfil edit')->only('edit','update');
    }
    public function index()
    {
        $id=Auth::user()->id;
        $users=User::where('id','!=',$id)->orWhereNull('id')->get();
        return view('admin.index',compact('users'));
    }

    public function edit()
    {
         
        $user=User::find(Auth::user()->id);
        return view('user.account',compact('user'));
    }

    public function update(Request $request)
    {

        $request->validate([

            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'email' => 'required|string|email|max:255',Rule::unique('users')->ignore(Auth::user()->id),
            'university'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'direction'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'city'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'country'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'about'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u'
        ]);
        $user=User::find(Auth::user()->id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->university=$request->input('university');
        $user->direction=$request->input('direction');
        $user->city=$request->input('city');
        $user->country=$request->input('country');
        $user->about=$request->input('about');
        
        /** proceso para almacenar la imagen del usuario*/
        $ruta_imagen="vacio";
        $nombreImagen = Str::slug($request->name, '-');

        if ($request->file('file')) {
            $archivo=$request->file('file');
            $nombre_Imagen= $nombreImagen ."-".time(). '.' . $archivo->getClientOriginalExtension();
            $r2=Storage::disk('photos')->put(utf8_decode($nombre_Imagen),\File::get($archivo));
            $ruta_imagen="storage/photos/" . $nombre_Imagen;
        }else{
            $ruta_imagen="#";
        }

        $user->file=$ruta_imagen;
       // dd($user->toArray());
        $user->save();
       $notification='El perfil se ha actualizado correctamente';
        return redirect()->route('tareas')->with(compact('notification'));
    }


}
