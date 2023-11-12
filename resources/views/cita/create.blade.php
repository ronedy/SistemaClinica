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
                        <h5 class="card-title">Reservar cita</h5>
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
                    <form method="post" action="{{ route('cita.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="fecha_citada" class="form-label">Fecha citada</label>
                                    <div class="form-group{{ $errors->has('fecha_citada') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('fecha_citada') ? ' is-invalid' : '' }}"
                                            name="fecha_citada" id="fecha_citada" type="date" placeholder="{{ __('Fecha citada') }}"
                                            value="{{ old('fecha_citada', date('Y-m-d')) }}" aria-required="true" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="hora_citada" class="form-label">Hora citada</label>
                                    <div class="form-group{{ $errors->has('hora_citada') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('hora_citada') ? ' is-invalid' : '' }}"
                                            name="hora_citada" id="hora_citada" type="time" placeholder="{{ __('Hora citada') }}"
                                            value="{{ old('hora_citada', date('H:i:00')) }}" aria-required="true" required step="1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_doctor" class="form-label">Médico</label>
                                    <div class="form-group{{ $errors->has('id_doctor') ? ' has-danger' : '' }}">
                                        <select name="id_doctor" id="id_doctor" class="form-control">
                                            @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->nombre . ' ' . $doctor->apellido }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    DATOS DEL PACIENTE (*)
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id_cliente" class="form-label">Nombre:</label>
                                            <select class="form-control" id="selectPacientes" name="id_cliente" style="widows: 100%;">
                                                <option value="{{  old('id_cliente') }}">{{  old('selectPacientes_value') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cliente_edad">Edad:</label>
                                            <input class="form-control" type="text" id="cliente_edad" name="cliente_edad" value="{{  old('cliente_edad') }}" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cliente_alfabeta">Alfabeta:</label>
                                            <input class="form-control" type="text" name="cliente_alfabeta" id="cliente_alfabeta" value="{{  old('cliente_alfabeta') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="cliente_domicilio" class="form-label">Domicilio:</label>
                                            <input type="text" class="form-control" id="cliente_domicilio" name="cliente_domicilio" value="{{  old('cliente_domicilio') }}" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cliente_estado_civil">Estado Civil:</label>
                                            <input class="form-control" type="text" name="cliente_estado_civil" id="cliente_estado_civil" value="{{  old('cliente_estado_civil') }}" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cliente_telefono">Teléfono:</label>
                                            <input class="form-control" type="text" name="cliente_telefono" id="cliente_telefono" value="{{  old('cliente_telefono') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row" style="display: none;">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12">
                                                    ANTECEDENTES
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="antecedente_medico">Médico:</label>
                                                    <input type="text" class="form-control" name="antecedente_medico" id="antecedente_medico" />
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="antecedente_quirurgicos">Quirúrgicos:</label>
                                                    <input type="text" class="form-control" name="antecedente_quirurgicos" id="antecedente_quirurgicos" />
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="antecedente_alergicos">Alérgicos:</label>
                                                    <input type="text" class="form-control" name="antecedente_alergicos" id="antecedente_alergicos" />
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="antecedente_traumaticos">Traumaticos:</label>
                                                    <input type="text" class="form-control" name="antecedente_traumaticos" id="antecedente_traumaticos" />
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="antecedente_familiares">Familiares:</label>
                                                    <input type="text" class="form-control" name="antecedente_familiares" id="antecedente_familiares" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12">
                                                    ANTECEDENTES GINECO-OBSTETRICOS
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_g">G:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_g" id="antecedente_go_g" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_p">P:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_p" id="antecedente_go_p" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_ab">Ab:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_ab" id="antecedente_go_ab" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_c">C:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_c" id="antecedente_go_c" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_hv">Hv:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_hv" id="antecedente_go_hv" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="antecedente_go_hm">Hm:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_hm" id="antecedente_go_hm" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_menarquia">Menarquía:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_menarquia" id="antecedente_go_menarquia" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_ciclos">Ciclos:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_ciclos" id="antecedente_go_ciclos" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_fur">FUR:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_fur" id="antecedente_go_fur" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_fpp">FPP:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_fpp" id="antecedente_go_fpp" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antecedente_go_pap">Pap:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_pap" id="antecedente_go_pap" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antecedente_go_ets">ETS:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_ets" id="antecedente_go_ets" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antecedente_go_coitarquia">Coitarquia:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_coitarquia" id="antecedente_go_coitarquia" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_grupo_rh">Grupo Rh:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_grupo_rh" id="antecedente_go_grupo_rh" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="antecedente_go_no_parejas">No. Parejas:</label>
                                                    <input type="text" class="form-control" name="antecedente_go_no_parejas" id="antecedente_go_no_parejas" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: none;">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            REGISTRO CONTROL PARENTAL

                                            <button type="button" class="btn btn-sm btn-info">Ver historial control parental</button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="cp_edad_gestacional">Edad Gestacional:</label>
                                                    <input class="form-control" type="text" name="cp_edad_gestacional" id="cp_edad_gestacional" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_presion_arterial">Presión arterial (mm/hg):</label>
                                                    <input class="form-control" type="text" name="cp_presion_arterial" id="cp_presion_arterial" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_altura_uterina">Altura uterina:</label>
                                                    <input class="form-control" type="text" name="cp_altura_uterina" id="cp_altura_uterina" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_presentacion">Preentación:</label>
                                                    <input class="form-control" type="text" name="cp_presentacion" id="cp_presentacion" />
                                                </div>
                                            </div>+
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="cp_fcf">FCF:</label>
                                                    <input class="form-control" type="text" name="cp_fcf" id="cp_fcf" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_peso">Peso:</label>
                                                    <input class="form-control" type="text" name="cp_peso" id="cp_peso" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_ultrasonido">Ultrasonido:</label>
                                                    <input class="form-control" type="text" name="cp_ultrasonido" id="cp_ultrasonido" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="cp_vacunas">Vacunas:</label>
                                                    <input class="form-control" type="text" name="cp_vacunas" id="cp_vacunas" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="input_observaciones">Observaciones: (*)</label>
                                    <input class="form-control" type="text" name="observacion" id="input_observaciones" value="{{ old('observacion') }}" />
                                </div>
                            </div>
                            <div class="row" style="display: none;">
                                <div class="col-12">
                                    <label for="input_motivo_consulta">Motivo de consulta: (*)</label>
                                    <input class="form-control" type="text" name="motivo" id="input_motivo_consulta" value="{{ old('motivo') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                        </div>

                        <input type="hidden" name="selectPacientes_value" id="selectPacientes_value" value="{{  old('selectPacientes_value') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    $('#selectPacientes').select2({
        placeholder: "Buscar...",
        ajax: {
            url: "{{  route('autocomplete.pacientes') }}",
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
                            id: item.id,
                            text: item.nombre + " " + item.apellido,
                            edad: item.edad,
                            alfabeta: item.alfabeta ? item.alfabeta : 'S/D',
                            domicilio: item.direccion,
                            estado_civil: item.estado_civil ? item.estado_civil : 'S/D',
                            telefono: item.telefono
                        }
                    })
                };
            },
            cache: true
        },
        allowClear: true,
    }).on("select2:select", function (e) {
        let dataSeleccionada = e.params.data;
        $("#selectPacientes_value").val($('#selectPacientes :selected').text());
        $('#cliente_edad').val(dataSeleccionada.edad);
        $('#cliente_alfabeta').val(dataSeleccionada.alfabeta);
        $('#cliente_domicilio').val(dataSeleccionada.domicilio);
        $('#cliente_estado_civil').val(dataSeleccionada.estado_civil);
        $('#cliente_telefono').val(dataSeleccionada.telefono);
    }).on("select2:unselect", function (e) {
        $("#selectPacientes_value").val(null);
        $('#cliente_edad').val(null);
        $('#cliente_alfabeta').val(null);
        $('#cliente_domicilio').val(null);
        $('#cliente_estado_civil').val(null);
        $('#cliente_telefono').val(null);
    });
</script>
@endsection
