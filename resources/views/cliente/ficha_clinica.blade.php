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
                        <h5 class="card-title">Fícha del cliente</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        name="nombre" id="nombre" type="text" placeholder="{{ __('Nombre') }}"
                                        value="{{ old('nombre', $cliente->nombre) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                        name="apellido" id="apellido" type="text" placeholder="{{ __('Apellido') }}"
                                        value="{{ old('apellido', $cliente->apellido) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                        name="direccion" id="direccion" type="text" placeholder="{{ __('Dirección') }}"
                                        value="{{ old('direccion', $cliente->direccion) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                        name="telefono" id="telefono" type="text" placeholder="{{ __('Teléfono') }}"
                                        value="{{ old('telefono', $cliente->telefono) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="dpi" class="form-label">DPI</label>
                                <div class="form-group{{ $errors->has('dpi') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('dpi') ? ' is-invalid' : '' }}"
                                        name="dpi" id="dpi" type="text" placeholder="{{ __('DPI') }}"
                                        value="{{ old('dpi', $cliente->dpi) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="correo" class="form-label">correo</label>
                                <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                        name="correo" id="correo" type="correo" placeholder="{{ __('E-mail') }}"
                                        value="{{ old('correo', $cliente->correo) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                                <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                        name="fecha_nacimiento" id="fecha_nacimiento" type="date" placeholder="{{ __('Fecha de nacimiento') }}"
                                        value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}" aria-required="true" readonly/>
                                </div>
                            </div>
                        </div>
                        <h4>Historial de citas</h4>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Fecha citada
                                        </th>
                                        <th>
                                            Fecha atendida
                                        </th>
                                        <th>
                                            Seguro
                                        </th>
                                        <th>
                                            Médico
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($citas as $cita)
                                        @if($cita->estado != 0)
                                        <tr>
                                            <td>{{ date('d/m/Y', strtotime($cita->fecha_citada)) }} {{ $cita->hora_citada }}</td>
                                            <td>{{ $cita->fecha_atendida != '' ? $cita->fecha_atendida : 'Sin atender' }}</td>
                                            <td>{{ $cita->seguro->descripcion ?? '' }}</td>
                                            <td>{{ $cita->doctor->nombre . ' ' . $cita->doctor->apellido }}</td>
                                            <td>
                                                @if($cita->estado == 0) Anulada
                                                @else
                                                    @if($cita->estado == 1) Reservada
                                                    @else
                                                        @if($cita->estado == 2) Atendido
                                                        @else
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4>Historial de alergias vistos</h4>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Fecha visto
                                        </th>
                                        <th>
                                            Descripcion
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($citas as $cita)
                                        @if ( $cita->estado != 0 )
                                        @if($cita->alergias != "")
                                        <tr>
                                            <td>{{ date('d/m/Y', strtotime($cita->fecha_citada)) }} {{ $cita->hora_citada }}</td>
                                            <td>{{ $cita->alergias }}</td>
                                        </tr>
                                        @endif
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-info">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
