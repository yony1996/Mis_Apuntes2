@extends('layouts.panel')

@section('content')
<h1>Editar Tarea</h1>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header ">
                    <a href="{{redirect()->getUrlGenerator()->previous()}}" data-toggle="tooltip" data-placement="top" title="retornar"><i class="ni ni-bold-left"></i>

                    </a> &nbsp
                    <a>Editar Tarea</a>

                </div>
                <div class="card-body">

                    <form action="{{route('tareas.update',$task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="course">Asignatura</label>
                            <select name="course" id="course" class="form-control">
                                <option value="{{$task->course->id}}" selected>{{$task->course->name}}</option>
                                @foreach ($courses as $course)
                                <option {{$course->id}}">{{$course->name}}</option>
                                @endforeach

                            </select>

                            @error('course')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input class="form-control" name="description" id="description" value="{{old('description',$task->description)}}" placeholder="Describa la tarea" required></textarea>
                            @error('description')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input name="date" class="form-control datepicker" value="{{old('date',$task->delivery_date)}}" placeholder="Selecione la fecha de entrega" type="text" required>
                            </div>
                        </div>
                        @can('tareas edit')
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Actualizar Tarea</button>
                        </div>
                        @endcan
                        

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        language: 'es'
    });

</script>

@endsection
