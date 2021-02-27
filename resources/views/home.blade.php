@extends('layouts.panel')

@section('title','Tareas')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
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
                Tareas
                <a href="{{route('tareas.create')}}" class="btn btn-sm btn-primary ml-4"><i class="fas fa-plus"></i>
                    Crear tarea</a>
            </div>
            <div class="container">
                <div class="row mb-4">
                    @if(count($tasks)>=1)
                    @foreach($tasks as $task)
                    @if ($task['status']=='active')
                    <div class="card m-2" style="width: 20rem;">
                        <div class="card-body">
                            <a class="card-title">Tarea</a>
                            <p class="card-text"><strong>Materia:</strong>{{$task->course->name}}</p>
                            <p class="card-text"><strong>Fecha de Entrega:</strong> {{$task->delivery_date}}</p>
                            <p class="card-text"><strong>Descripcion:</strong></p>
                            <div class="card-text">
                                <p style="font-size: 15px">{{$task->description}}</p>
                            </div>

                            <div class="container offset">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('tareas.destroy', $task->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('tareas.edit',$task->id)}}" class="btn btn-sm btn-primary btn-block">Editar tarea</a>
                                            <button class="btn btn-sm btn-danger btn-block">Eliminar tarea</button>

                                        </form>
                                        &nbsp
                                        <form action="{{route('tareas.status',$task->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-warning btn-block">Marcar completada</button>
                                        </form>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    @else
                    <div class="card m-2" style="width: 20rem;">
                        <div class="card-body">
                            <a class="card-title">Tarea</a>
                            <label class="btn btn-sm btn-success offset-md-8">Completada</label>
                            <p class="card-text"><strong>Materia:</strong>{{$task->course->name}}</p>
                            <p class="card-text"><strong>Fecha de Entrega:</strong> {{$task->delivery_date}}</p>
                            <p class="card-text"><strong>Descripcion:</strong></p>
                            <div class="card-text">
                                <p style="font-size: 15px">{{$task->description}}</p>
                            </div>

                            <div class="container offset">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('tareas.destroy', $task->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('tareas.edit',$task->id)}}" class="btn btn-sm btn-primary btn-block">Editar tarea</a>
                                            <button class="btn btn-sm btn-danger btn-block">Eliminar tarea</button>

                                        </form>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    @endif
                    @endforeach

                    @else
                    <div class="col-md-12 text-center">
                        <h1>Aun no existen tareas registradas</h1>
                    </div>

                    @endif



                </div>
            </div>



        </div>
    </div>
</div>




@endsection
