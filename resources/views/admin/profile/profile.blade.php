@extends('admin.layouts.master')
@section('content')
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Perfil') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('Panel') }}</a></div>
                <div class="breadcrumb-item">{{ __('Perfil') }}</div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">{{ __('Hola') }}, {{ old('name', $user->name) }}</h2>
            <p class="section-lead">
                {{ __('Cambia información de tu perfil.') }}
            </p>

            <div class="row mt-sm-4">

                {{-- Columna --}}
                <div class="col-12 col-md-12 col-lg-12">

                    {{-- Avatar --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Avatar') }}</h4>
                        </div>

                        <div class="card-body">

                            <p class="card-subtitle">{{ __('The avatar is a profile picture that represents you and will be used to identify your account.') }} - {{ __('PNG or JPG maximum of 400px by 400px and maximum of 1MB.') }}</p>

                            <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                            
                                <div class="row align-items-center mt-4">
        
                                    {{-- Image --}}
                                    <div class="col-auto">
                                        <div>
                                            <img id="showImage" src="{{ !empty($user->avatar) ? url($user->avatar) : url('images/avatar.png') }}" alt="avatar" class="avatar avatar-xl">
                                        </div>

                                        <div>
                                            @if ($errors->has('avatar'))
                                                <span class="text-danger fs-6">{{ $errors->first('avatar') }}</span>
                                            @endif
                                        </div>
                                    </div>
        
                                    {{-- Cambiar Imagen --}}
                                    <div class="col-auto">
                                        <div>
                                            <label for="image-upload" class="form-label btn btn-primary mt-2">
                                                <i class="bi bi-cloud-upload"></i>&nbsp;
                                                {{ __('Change avatar') }}
                                            </label>
                                            <input type="file" id="image-upload" name="avatar" hidden=""> 
                                        </div>
                                    </div>
        
                                    {{-- Eliminar Imagen --}}
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-danger eliminar-avatar">
                                            <i class="bi bi-trash"></i>&nbsp;
                                            {{ __('Delete avatar') }}
                                        </a>
                                    </div>
        
                                </div>
        
                                <br>
                                {{-- Botón Actualizar Avatar --}}
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">{{ __('Update Avatar') }}</button>
                                </div>

                            </form>

                        </div>

                    </div>

                    {{-- Información de Perfil Nombre y Correo Electrónico --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Información de Perfil') }}</h4>
                        </div>

                        <div class="card-body">
                            {{-- Nombre y Correo Electrónico --}}
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="row">

                                    {{-- Nombre --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('Nombre') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required="">
                                        @if ($errors->has('name'))
                                            <code>{{ $errors->first('name') }}</code>
                                        @endif
                                    </div>

                                    {{-- Correo Electrónico --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('Correo Electrónico') }}</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required="">
                                        @if ($errors->has('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif
                                    </div>

                                </div>

                                {{-- Botón Submit Guardar --}}
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                                </div>

                            </form>
                        </div>

                    </div>

                    {{-- Actualizar Contraseña --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Actualizar Contraseña') }}</h4>
                        </div>

                        <div class="card-body">

                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    {{-- Contraseña Actual --}}
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{ __('Contraseña Actual') }}</label>
                                        <input type="password" name="current_password" class="form-control"
                                            autocomplete="current-password">
                                        @if ($errors->updatePassword->has('current_password'))
                                            <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                        @endif
                                    </div>

                                    {{-- Nueva Contraseña --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('Nueva Contraseña') }}</label>
                                        <input type="password" name="password" class="form-control"
                                            autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password'))
                                            <code>{{ $errors->updatePassword->first('password') }}</code>
                                        @endif
                                    </div>

                                    {{-- Confirmar Contraseña --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('Confirmar Contraseña') }}</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password_confirmation'))
                                            <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                        @endif
                                    </div>

                                </div>

                                {{-- Botón Submit Guardar --}}
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">{{ __('Actualizar Contraseña') }}</button>
                                </div>

                            </form>

                        </div>

                    </div>

                    {{-- Seleccionar Idioma --}}
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Seleccionar Idioma') }}</h4>
                        </div>

                        <div class="card-body">

                            <p class="card-subtitle">{{ __('Here you can change the language in which the application will be displayed.') }}  {{ __('Currently your language is: ') }} <span class="fw-bold text-warning">{{ App::getLocale()== 'en' ? __('English') : __('Spanish')}}</span></p>

                            <form action="{{ route('profile.language.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="row mt-3">

                                    {{-- Radio Button, Select Language --}}
                                    <div class="form-group col-md-6 col-12">

                                        @php
                                            $locale = App::getLocale();
                                            if($locale == 'en'){
                                                $status_ingles = 'checked';
                                                $status_español = '';
                                            }elseif ($locale == 'es') {
                                                $status_ingles = '';
                                                $status_español = 'checked';
                                            }
                                            else{
                                                $status_ingles = '';
                                                $status_español = '';
                                            }
                                        @endphp
                                        {{-- Ingles --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="flexRadioDefault1" value="en" {{ $status_ingles }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ __('English') }}
                                            </label>
                                        </div>
                                        <br>
                                        {{-- Español --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="language"
                                                id="flexRadioDefault2" value="es" {{ $status_español }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                {{ __('Spanish') }}
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                {{-- Botón Update Language --}}
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">{{ __('Actualizar Idioma') }}</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            
            // Mi JS para el manejo de la imagen en la forma
            $('#image-upload').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            // Eliminar Avatar
            $(document).on('click', '.eliminar-avatar', function() {
                $('#showImage').attr('src', "{{ url('images/avatar.png') }}");
                $('#image-upload').val('');
            });

        });
    </script>
@endpush