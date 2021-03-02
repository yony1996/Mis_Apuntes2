@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
       
        <div class="card">
            <div class="card-header">
                <a href="{{redirect()->getUrlGenerator()->previous()}}" data-toggle="tooltip" data-placement="top" title="retornar"><i class="ni ni-bold-left"></i>

                </a> &nbsp
                <a>Usuarios Registrados</a>&nbsp
                


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                @if (count($users)>= 1)
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nombre</th>
                            <th>email</th>
                            

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                @else
                <div class="col-md-12 text-center">
                    <h1>Aun no existen usuarios registrados</h1>
                </div>

                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
