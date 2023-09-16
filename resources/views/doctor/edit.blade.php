@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'doctores'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Editar doctor</h5>
                    </div>
                    @if ($errors->any())
                    <div class="card-body ">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <form method="post" action="{{ route('doctor.update', $doctor) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                            name="nombre" id="nombre" type="text" placeholder="{{ __('Nombre') }}"
                                            value="{{ old('nombre', $doctor->nombre) }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                            name="apellido" id="apellido" type="text" placeholder="{{ __('Apellido') }}"
                                            value="{{ old('apellido', $doctor->apellido) }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                            name="direccion" id="direccion" type="text" placeholder="{{ __('Dirección') }}"
                                            value="{{ old('direccion', $doctor->direccion) }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                            name="telefono" id="telefono" type="text" placeholder="{{ __('Telefono') }}"
                                            value="{{ old('telefono', $doctor->telefono) }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                            name="correo" id="correo" type="correo" placeholder="{{ __('E-mail') }}"
                                            value="{{ old('correo', $doctor->correo) }}" aria-required="true" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-md-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                                <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                        name="fecha_nacimiento" id="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $doctor->fecha_nacimiento) }}" aria-required="true" required/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection