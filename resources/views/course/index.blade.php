@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <div class="card-body">
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{session('notification')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        </div>
        <div class="card">
            <div class="card-header">
                <a href="{{redirect()->getUrlGenerator()->previous()}}" data-toggle="tooltip" data-placement="top" title="retornar"><i class="ni ni-bold-left"></i>

                </a> &nbsp
                <a>Asignaturas</a>&nbsp
                <a href="{{route('asignatura.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                    Crear Asignatura</a>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                @if (count($courses)>= 1)
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nombre</th>
                            <th>profesor</th>
                            <th>descripcion</th>
                            <th>Accion</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->teacher}}</td>
                            <td>{{$course->description}}</td>
                            <td>

                                <form action="{{route('asignatura.destroy', $course->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-info" href="{{route('asignatura.edit',$course->id)}}">Update</a>
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>

                                </form>

                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                @else
                <div class="col-md-12 text-center">
                    <h1>Aun no existen asignaturas registradas</h1>
                </div>

                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
