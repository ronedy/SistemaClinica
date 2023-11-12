@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'clientes'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Nuevo paciente</h5>
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
                    <form method="post" action="{{ route('cliente.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="selectGeneros">Genéro: (*)</label>
                                    <select class="form-control" name="genero" id="selectGeneros">
                                        <option value="Hombre" {{ old('genero', 'Hombre') == 'Hombre' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenina" {{ old('genero') == 'Femenina' ? 'selected' : '' }}>Femenina</option>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        <label for="nombre">Nombre: (*)</label>
                                        <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                            name="nombre" id="nombre" type="text" placeholder="{{ __('Nombre') }}"
                                            value="{{ old('nombre') }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                        <label for="apellido">Apellido: (*)</label>
                                        <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                            name="apellido" id="apellido" type="text" placeholder="{{ __('Apellido') }}"
                                            value="{{ old('apellido') }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('dpi') ? ' has-danger' : '' }}">
                                        <label for="dpi">DPI:</label>
                                        <input class="form-control{{ $errors->has('dpi') ? ' is-invalid' : '' }}"
                                            name="dpi" id="dpi" type="text" placeholder="{{ __('DPI') }}"
                                            value="{{ old('dpi') }}" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                        <label for="telefono">Teléfono: (*)</label>
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                            name="telefono" id="telefono" type="text" placeholder="{{ __('Telefono') }}"
                                            value="{{ old('telefono') }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                        <label for="direccion">Dirección: (*)</label>
                                        <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                            name="direccion" id="direccion" type="text" placeholder="{{ __('Dirección') }}"
                                            value="{{ old('direccion') }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
                                        <label for="fecha_nacimiento">Fecha de nacimiento: *</label>
                                        <input class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                            name="fecha_nacimiento" id="fecha_nacimiento" type="date"
                                            value="{{ old('fecha_nacimiento') }}" aria-required="true"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('estado_civil') ? ' has-danger' : '' }}">
                                        <label for="selectEstadoCivil">Estado Civil: (*)</label>
                                        <select class="form-control" name="estado_civil" id="selectEstadoCivil">
                                            <option value="Soltero(a)" {{ old('estado_civil', 'Soltero(a)') == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                                            <option value="Casado(a)" {{ old('estado_civil') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                                            <option value="Divorciado(a)" {{ old('estado_civil') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('alfabeta') ? ' has-danger' : '' }}">
                                        <label for="alfabeta">Alfabeta: (*)</label>
                                        <input class="form-control" type="text" name="alfabeta" id="alfabeta" value="{{  old('alfabeta', 'S/D') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                                        <label for="correo">Correo:</label>
                                        <input class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                            name="correo" id="correo" type="email" placeholder="{{ __('E-mail') }}"
                                            value="{{ old('correo') }}" aria-required="true"/>
                                    </div>
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
