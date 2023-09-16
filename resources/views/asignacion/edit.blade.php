@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'asignaciones-seguros'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Editar asignacion del seguro</h5>
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
                    @if (session('mensaje'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('mensaje') }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form method="post" action="{{ route('asignacionSeguro.update', $asignacionSeguro) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="fecha_nacimiento" class="form-label">Seleccione DPI del cliente</label>
                                    <div class="form-group{{ $errors->has('id_cliente') ? ' has-danger' : '' }}">
                                        <select name="id_cliente" class="form-control">
                                            @foreach($clientes as $key => $value)
                                            @if ( $asignacionSeguro->id_cliente == $key)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="fecha_nacimiento" class="form-label">Seleccione seguro</label>
                                    <div class="form-group{{ $errors->has('id_cliente') ? ' has-danger' : '' }}">
                                        <select name="id_seguro" class="form-control">
                                            @foreach($seguros as $key => $value)
                                            @if ( $asignacionSeguro->id_seguro == $key)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="fecha_nacimiento" class="form-label">Valor de descuento a aplicar</label>
                                    <div class="form-group{{ $errors->has('valor_descuento') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('valor_descuento') ? ' is-invalid' : '' }}"
                                            name="valor_descuento" id="valor_descuento" type="number" placeholder="{{ __('Valor descuento') }}"
                                            value="{{ old('valor_descuento', $asignacionSeguro->valor_descuento) }}" aria-required="true" required step="0.01"/>
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