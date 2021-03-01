@extends('layouts.panel')

@section('title','Mi Perfil')


@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{asset('img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img id="uploadPreview1" src="{{asset('img/theme/')}}" onerror=this.src="{{asset('img/theme/team-op1.jpg')}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        &nbsp
                    </div>
                </div>
                <div class="card-body pt-0">

                    <div class="text-center">
                        <h5 class="h3">
                            {{$user->name}}
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{$user->city}} , {{$user->country}}
                        </div>

                        <div>
                            <i class="ni education_hat mr-2"></i>{{$user->university}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Editar Perfil </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('perfil.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Información del Estudiante</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="row ml-7">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" class="custom-file-input" id="uploadImage1" name="file" accept=".jpg, .png, .jpeg" onchange="previewImage(1);" value={{old('file')}} required>
                                            <label class="custom-file-label" for="customFileLang">Selecciona tu imagen de perfil</label>
                                            @error('file')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Nombre</label>
                                        <input type="text" name="name" id="input-username" class="form-control" placeholder="Username" value="{{old('name',$user->name)}}">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email</label>
                                        <input type="email" name="email" id="input-email" class="form-control" value="{{old('email',$user->email)}}">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Universidad</label>
                                        <input id="input-address" name="university" class="form-control" placeholder="Universidad" value="{{old('university',$user->university)}}" type="text">
                                        @error('university')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="my-4">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Informacion de Contacto</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Dirección</label>
                                        <input id="input-address" name="direction" class="form-control" placeholder="Dirección domiciliar" type="text" value="{{old('direction',$user->direction)}}">
                                        @error('direction')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">Ciudad</label>
                                        <input type="text" name="city" id="input-city" class="form-control" value="{{old('city',$user->city)}}" placeholder="Ciudad">
                                        @error('city')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Pais</label>
                                        <input type="text" name="country" id="input-country" value="{{old('country',$user->country)}}" class="form-control" placeholder="Pais">
                                        @error('country')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Acerca de mi</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Acerca de mi</label>
                                <textarea name="about" rows="4" class="form-control" placeholder="Unas pocas palabras sobre mi...">{{old('about',$user->about)}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Actualizar Informacion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
    function previewImage(nb) {
        var reader = new FileReader();
        reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
        reader.onload = function(e) {
            document.getElementById('uploadPreview' + nb).src = e.target.result;
        };
    }

</script>

@endsection
