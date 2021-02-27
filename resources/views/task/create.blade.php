@extends('layouts.panel')

@section('content')
<h1>Crear Tarea</h1>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header ">
                    <a href="{{redirect()->getUrlGenerator()->previous()}}" data-toggle="tooltip" data-placement="top" title="retornar"><i class="ni ni-bold-left"></i>

                    </a> &nbsp
                    <a>Crear Tarea</a>



                </div>
                <div class="card-body">

                    <form action="{{route('tareas.store')}}" method="POST">
                        @csrf
                        {{--<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">--}}

                        <div class="form-group">
                            <label for="course">Asignatura</label>
                            <select name="course" id="course" class="form-control">
                                <option selected>--Seleccionar una asignatura--</option>

                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach

                            </select>

                            @error('course')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" name="description" id="description" value="{{old('description')}}" placeholder="Describa la tarea" required></textarea>
                            @error('description')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input name="date" class="form-control datepicker" placeholder="Selecione la fecha de entrega" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Crear Tarea</button>
                        </div>

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
