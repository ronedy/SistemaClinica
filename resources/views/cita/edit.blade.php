@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'citas'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Editar reservación cita</h5>
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
                    <form method="post" action="{{ route('cita.update', $cita) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="fecha_citada" class="form-label">Fecha citada</label>
                                    <div class="form-group{{ $errors->has('fecha_citada') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('fecha_citada') ? ' is-invalid' : '' }}"
                                            name="fecha_citada" id="fecha_citada" type="date" placeholder="{{ __('Fecha citada') }}"
                                            value="{{ old('fecha_citada', $cita->fecha_citada) }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="hora_citada" class="form-label">Hora citada</label>
                                    <div class="form-group{{ $errors->has('hora_citada') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('hora_citada') ? ' is-invalid' : '' }}"
                                            name="hora_citada" id="hora_citada" type="time" placeholder="{{ __('Hora citada') }}"
                                            value="{{ old('hora_citada', $cita->hora_citada) }}" aria-required="true" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="id_doctor" class="form-label">Médico</label>
                                    <div class="form-group{{ $errors->has('id_doctor') ? ' has-danger' : '' }}">
                                        <select name="id_doctor" id="id_doctor" class="form-control">
                                            @foreach($doctores as $doctor)
                                            @if($cita->id_doctor == $doctor->id)
                                            <option value="{{ $doctor->id }}" selected>{{ $doctor->nombre . ' ' . $doctor->apellido }}</option>
                                            @else
                                            <option value="{{ $doctor->id }}">{{ $doctor->nombre . ' ' . $doctor->apellido }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="id_cliente" class="form-label">Paciente</label>
                                    <div class="form-group{{ $errors->has('id_cliente') ? ' has-danger' : '' }}">
                                        <select name="id_cliente" id="id_cliente" class="form-control">
                                            @foreach($clientes as $cliente)
                                            @if($cita->id_cliente == $cliente->id)
                                            <option value="{{ $cliente->id }}" selected>{{ $cliente->nombre . ' ' . $cliente->apellido }}</option>
                                            @else
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombre . ' ' . $cliente->apellido }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="id_seguro" class="form-label">Seguro</label>
                                    <div class="form-group{{ $errors->has('id_seguro') ? ' has-danger' : '' }}">
                                        <select name="id_seguro" id="id_seguro" class="form-control">
                                            <option value="">Seleccione seguro</option>
                                            @foreach($seguros as $key => $value)
                                            @if($key == $cita->id_seguro)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="id_enfermedad" class="form-label">Enfermedad</label>
                                    <div class="form-group{{ $errors->has('id_enfermedad') ? ' has-danger' : '' }}">
                                        <select name="id_enfermedad" id="id_enfermedad" class="form-control">
                                            <option value="">Seleccione enfermedad</option>
                                            @foreach($enfermedades as $key => $value)
                                            @if($key == $cita->id_enfermedad)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="motivo" class="form-label">Motivo</label>
                                    <div class="form-group{{ $errors->has('motivo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('motivo') ? ' is-invalid' : '' }}"
                                            name="motivo" id="motivo" type="text" placeholder="{{ __('Motivo') }}"
                                            value="{{ old('motivo', $cita->motivo) }}" aria-required="true" maxlength="200" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="nombre_usuario" value="{{ auth()->user()->name }}">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
