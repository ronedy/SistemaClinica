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
                        <h5 class="card-title">Nuevo doctor</h5>
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
                    <form method="post" action="{{ route('doctor.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group{{ $errors->has('id_especialidad') ? ' has-danger' : '' }}">
                                        <label class="" for="selectEspecialidad">Especialidad: (*)</label>
                                        <select class="form-control" name="id_especialidad" id="selectEspecialidad"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        <label class="" for="nombre">Nombre: (*)</label>
                                        <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                            name="nombre" id="nombre" type="text" placeholder="{{ __('Nombre') }}"
                                            value="{{ old('nombre') }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                        <label class="" for="apellido">Apellido: (*)</label>
                                        <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                            name="apellido" id="apellido" type="text" placeholder="{{ __('Apellido') }}"
                                            value="{{ old('apellido') }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                        <label class="" for="telefono">Teléfono: (*)</label>
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                            name="telefono" id="telefono" type="text" placeholder="{{ __('Telefono') }}"
                                            value="{{ old('telefono') }}" aria-required="true" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                        <label class="" for="direccion">Dirección: (*)</label>
                                        <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                            name="direccion" id="direccion" type="text" placeholder="{{ __('Dirección') }}"
                                            value="{{ old('direccion') }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                            name="fecha_nacimiento" id="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                                        <label class="" for="correo">Correo:</label>
                                        <input class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                            name="correo" id="correo" type="correo" placeholder="{{ __('E-mail') }}"
                                            value="{{ old('correo') }}" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    $('#selectEspecialidad').select2({
        placeholder: "Buscar...",
        ajax: {
            url: "{{  route('autocomplete.especialidades') }}",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    filtro: params.term,
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.descripcion,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        },
        allowClear: true,
    }).on("select2:select", function (e) {
        let dataSeleccionada = e.params.data;
        //$("#select_bodega_value").val($('#select_detalle_bodega :selected').text());
    }).on("select2:unselect", function (e) {
        //$("#select_bodega_value").val(null);
    });
</script>
@endsection
