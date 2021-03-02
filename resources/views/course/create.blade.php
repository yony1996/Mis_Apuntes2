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
                    <a>Crear Asignatura</a>
                </div>
                <div class="card-body">

                    <form action="{{route('asignatura.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="name">Nombre de la asignatura</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" placeholder="nombre de la asignatura" required>
                            @error('name')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre del profesor</label>
                            <input class="form-control" type="text" name="teacher" id="teacher" value="{{old('teacher')}}" placeholder="nombre del maestro" required>
                            @error('teacher')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion de la asignatura</label>
                            <input class="form-control" type="text" id="description" name="description" value="{{old('description')}}" placeholder="descripcion de la asignatura">
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @can('asignatura create')
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Crear</button>
                        </div>
                        @endcan
                        

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
