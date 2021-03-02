@extends('layouts.panel')

@section('content')
<h1>Crear Asignatura</h1>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <a href="{{redirect()->getUrlGenerator()->previous()}}" data-toggle="tooltip" data-placement="top" title="retornar"><i class="ni ni-bold-left"></i>

                    </a> &nbsp
                    <a>Actualizar Asignatura</a>
                </div>
                <div class="card-body">

                    <form action="{{route('asignatura.update',$course->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id" value="{{$course->user_id}}">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{old('name',$course->name)}}" placeholder="nombre de la asignatura" required>
                            @error('name')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Profesor</label>
                            <input class="form-control" type="text" name="teacher" id="teacher" value="{{old('teacher',$course->teacher)}}" placeholder="nombre del maestro" required>
                            @error('teacher')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input class="form-control" type="text" id="description" name="description" value="{{old('description',$course->description)}}" placeholder="descripcion de la asignatura">
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @can('asignatura edit')
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Editar Asignatura</button>
                        </div>
                        @endcan
                        

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
