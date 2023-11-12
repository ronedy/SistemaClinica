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
                        <h5 class="card-title">Visualizar cita</h5>
                        <div class="row">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
                        </div>
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
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-3">
                            <label for="fecha_citada" class="form-label">Fecha citada</label>
                            <div class="form-group{{ $errors->has('fecha_citada') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('fecha_citada') ? ' is-invalid' : '' }}"
                                    name="fecha_citada" id="fecha_citada" type="date" placeholder="{{ __('Fecha citada') }}"
                                    value="{{ old('fecha_citada', $cita->fecha_citada) }}" aria-required="true" disabled />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="hora_citada" class="form-label">Hora citada</label>
                            <div class="form-group{{ $errors->has('hora_citada') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('hora_citada') ? ' is-invalid' : '' }}"
                                    name="hora_citada" id="hora_citada" type="time" placeholder="{{ __('Hora citada') }}"
                                    value="{{ old('hora_citada', $cita->hora_citada) }}" aria-required="true" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="id_doctor" class="form-label">Médico</label>
                            <div class="form-group{{ $errors->has('id_doctor') ? ' has-danger' : '' }}">
                                <select name="id_doctor" id="id_doctor" class="form-control" disabled >
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}" {{ $cita->id_doctor == $doctor->id ? 'selected' : '' }}>{{ $doctor->nombre . ' ' . $doctor->apellido }}</option>
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
                                    <select class="form-control" id="selectPacientes" name="id_cliente" style="widows: 100%;" disabled >
                                        <option value="{{  old('id_cliente', $cita->id_cliente) }}">{{  old('selectPacientes_value', $cita->cliente ? $cita->cliente->obtenerNombreCompletado() : '') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cliente_edad">Edad:</label>
                                    <input class="form-control" type="text" id="cliente_edad" name="cliente_edad" value="{{  old('cliente_edad', $cita->cliente->edad_actual) }}" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="cliente_alfabeta">Alfabeta:</label>
                                    <input class="form-control" type="text" name="cliente_alfabeta" id="cliente_alfabeta" value="{{  old('cliente_alfabeta', $cita->cliente->alfabeta) }}" disabled >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cliente_domicilio" class="form-label">Domicilio:</label>
                                    <input type="text" class="form-control" id="cliente_domicilio" name="cliente_domicilio" value="{{  old('cliente_domicilio', $cita->cliente->direccion) }}" disabled />
                                </div>
                                <div class="col-md-3">
                                    <label for="cliente_estado_civil">Estado Civil:</label>
                                    <input class="form-control" type="text" name="cliente_estado_civil" id="cliente_estado_civil" value="{{  old('cliente_estado_civil', $cita->cliente->estado_civil) }}" disabled />
                                </div>
                                <div class="col-md-3">
                                    <label for="cliente_telefono">Teléfono:</direccion>
                                    <input class="form-control" type="text" name="cliente_telefono" id="cliente_telefono" value="{{  old('cliente_telefono', $cita->cliente->telefono) }}" disabled >
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
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
                                            <input type="text" class="form-control" name="antecedente_medico" id="antecedente_medico" value="{{  old('antecedente_medico', optional($cita->citaAntecedente)->medicos ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="antecedente_quirurgicos">Quirúrgicos:</label>
                                            <input type="text" class="form-control" name="antecedente_quirurgicos" id="antecedente_quirurgicos" value="{{  old('antecedente_quirurgicos', optional($cita->citaAntecedente)->quirurgicos ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="antecedente_alergicos">Alérgicos:</label>
                                            <input type="text" class="form-control" name="antecedente_alergicos" id="antecedente_alergicos" value="{{  old('antecedente_alergicos', optional($cita->citaAntecedente)->alergicos ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="antecedente_traumaticos">Traumaticos:</label>
                                            <input type="text" class="form-control" name="antecedente_traumaticos" id="antecedente_traumaticos" value="{{  old('antecedente_traumaticos', optional($cita->citaAntecedente)->traumaticos ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="antecedente_familiares">Familiares:</label>
                                            <input type="text" class="form-control" name="antecedente_familiares" id="antecedente_familiares" value="{{  old('antecedente_familiares', optional($cita->citaAntecedente)->familiares ?? null) }}" disabled />
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
                                            <input type="text" class="form-control" name="antecedente_go_g" id="antecedente_go_g" value="{{  old('antecedente_go_g', optional($cita->citaAntecedenteGineicoObstretico)->g ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="antecedente_go_p">P:</label>
                                            <input type="text" class="form-control" name="antecedente_go_p" id="antecedente_go_p" value="{{  old('antecedente_go_p', optional($cita->citaAntecedenteGineicoObstretico)->p ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="antecedente_go_ab">Ab:</label>
                                            <input type="text" class="form-control" name="antecedente_go_ab" id="antecedente_go_ab" value="{{  old('antecedente_go_ab', optional($cita->citaAntecedenteGineicoObstretico)->ab ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="antecedente_go_c">C:</label>
                                            <input type="text" class="form-control" name="antecedente_go_c" id="antecedente_go_c" value="{{  old('antecedente_go_c', optional($cita->citaAntecedenteGineicoObstretico)->c ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="antecedente_go_hv">Hv:</label>
                                            <input type="text" class="form-control" name="antecedente_go_hv" id="antecedente_go_hv" value="{{  old('antecedente_go_hv', optional($cita->citaAntecedenteGineicoObstretico)->hv ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="antecedente_go_hm">Hm:</label>
                                            <input type="text" class="form-control" name="antecedente_go_hm" id="antecedente_go_hm" value="{{  old('antecedente_go_hm', optional($cita->citaAntecedenteGineicoObstretico)->hm ?? null) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="antecedente_go_menarquia">Menarquía:</label>
                                            <input type="text" class="form-control" name="antecedente_go_menarquia" id="antecedente_go_menarquia" value="{{  old('antecedente_go_menarquia', optional($cita->citaAntecedenteGineicoObstretico)->menarquia ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="antecedente_go_ciclos">Ciclos:</label>
                                            <input type="text" class="form-control" name="antecedente_go_ciclos" id="antecedente_go_ciclos" value="{{  old('antecedente_go_ciclos', optional($cita->citaAntecedenteGineicoObstretico)->ciclos ?? null) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="antecedente_go_fur">FUR:</label>
                                            <input type="text" class="form-control" name="antecedente_go_fur" id="antecedente_go_fur" value="{{  old('antecedente_go_fur', optional($cita->citaAntecedenteGineicoObstretico)->fur ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="antecedente_go_fpp">FPP:</label>
                                            <input type="text" class="form-control" name="antecedente_go_fpp" id="antecedente_go_fpp" value="{{  old('antecedente_go_fpp', optional($cita->citaAntecedenteGineicoObstretico)->fpp ?? null) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="antecedente_go_pap">Pap:</label>
                                            <input type="text" class="form-control" name="antecedente_go_pap" id="antecedente_go_pap" value="{{  old('antecedente_go_pap', optional($cita->citaAntecedenteGineicoObstretico)->pap ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="antecedente_go_ets">ETS:</label>
                                            <input type="text" class="form-control" name="antecedente_go_ets" id="antecedente_go_ets" value="{{  old('antecedente_go_ets', optional($cita->citaAntecedenteGineicoObstretico)->ets ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="antecedente_go_coitarquia">Coitarquia:</label>
                                            <input type="text" class="form-control" name="antecedente_go_coitarquia" id="antecedente_go_coitarquia" value="{{  old('antecedente_go_coitarquia', optional($cita->citaAntecedenteGineicoObstretico)->coitarquia ?? null) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="antecedente_go_grupo_rh">Grupo Rh:</label>
                                            <input type="text" class="form-control" name="antecedente_go_grupo_rh" id="antecedente_go_grupo_rh" value="{{  old('antecedente_go_grupo_rh', optional($cita->citaAntecedenteGineicoObstretico)->grupo_rh ?? null) }}" disabled />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="antecedente_go_no_parejas">No. Parejas:</label>
                                            <input type="number" class="form-control" name="antecedente_go_no_parejas" id="antecedente_go_no_parejas" min="0" step="1" value="{{  old('antecedente_go_no_parejas', optional($cita->citaAntecedenteGineicoObstretico)->no_parejas ?? null) }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    REGISTRO CONTROL PARENTAL
                                    <button type="button" class="btn btn-sm btn-info" onclick="obtenerHistorialControlParentalCliente()">Ver historial control parental</button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="cp_edad_gestacional">Edad Gestacional:</label>
                                            <input class="form-control" type="text" name="cp_edad_gestacional" id="cp_edad_gestacional" maxlength="50" value="{{ old('cp_edad_gestacional', optional($cita->citaControlParental)->edad_gestacional ?? '' ) }}" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_presion_arterial">Presión arterial (mm/hg):</label>
                                            <input class="form-control" type="text" name="cp_presion_arterial" id="cp_presion_arterial" maxlength="50" value="{{ old('cp_presion_arterial', optional($cita->citaControlParental)->presion_arterial ?? '' ) }}" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_altura_uterina">Altura uterina:</label>
                                            <input class="form-control" type="text" name="cp_altura_uterina" id="cp_altura_uterina" maxlength="50" value="{{ old('cp_altura_uterina', optional($cita->citaControlParental)->altura_uterina ?? '' ) }}" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_presentacion">Preentación:</label>
                                            <input class="form-control" type="text" name="cp_presentacion" id="cp_presentacion" maxlength="50" value="{{ old('cp_presentacion', optional($cita->citaControlParental)->presentacion ?? '' ) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="cp_fcf">FCF:</label>
                                            <input class="form-control" type="text" name="cp_fcf" id="cp_fcf" maxlength="50" value="{{ old('cp_fcf', optional($cita->citaControlParental)->fcf ?? '' ) }}" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_peso">Peso:</label>
                                            <input class="form-control" type="text" name="cp_peso" id="cp_peso" maxlength="50" value="{{ old('cp_peso', optional($cita->citaControlParental)->peso ?? '' ) }}" disabled  />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_ultrasonido">Ultrasonido:</label>
                                            <input class="form-control" type="text" name="cp_ultrasonido" id="cp_ultrasonido" maxlength="50" value="{{ old('cp_ultrasonido', optional($cita->citaControlParental)->ultrasonido ?? '' ) }}" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cp_vacunas">Vacunas:</label>
                                            <input class="form-control" type="text" name="cp_vacunas" id="cp_vacunas" maxlength="50" value="{{ old('cp_vacunas', optional($cita->citaControlParental)->vacunas ?? '' ) }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="input_observaciones">Observaciones: (*)</label>
                            <input class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" type="text" name="observacion" id="input_observaciones" value="{{ old('observacion', $cita->observacion) }}" disabled  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="input_motivo_consulta">Motivo de consulta: (*)</label>
                            <input class="form-control{{ $errors->has('motivo') ? ' is-invalid' : '' }}" type="text" name="motivo" id="input_motivo_consulta" value="{{ old('motivo', $cita->motivo) }}" disabled />
                        </div>
                    </div>
                    <hr />
                    <div class="card">
                        <div class="card-header">
                            RECETA
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="receta" class="form-label">Receta</label>
                                    <div class="form-group{{ $errors->has('receta') ? ' has-danger' : '' }}">
                                        {{-- <input class="form-control{{ $errors->has('receta') ? ' is-invalid' : '' }}"
                                            name="receta" id="receta" type="text" placeholder="{{ __('Receta') }}"
                                            value="{{ old('receta') }}" aria-required="true" maxlength="200"/> --}}
                                        <textarea class="form-control{{ $errors->has('receta') ? ' is-invalid' : '' }}" name="receta" id="receta" maxlength="200" rows="5" cols="50" disabled >{{  old('receta', $cita->receta) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="card" style="display: none;">
                        <div class="card-header">
                            COBRO
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="valor_cobro" class="form-label">Valor cita</label>
                                    <div class="form-group{{ $errors->has('valor_cobro') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('valor_cobro') ? ' is-invalid' : '' }}"
                                            name="valor_cobro" id="valor_cobro" type="number" placeholder="{{ __('Valor cita') }}"
                                            value="{{ old('valor_cobro') }}" step="0.01"/>
                                    </div>
                                </div>
                                <div class="col-md-4" style="display: none;">
                                    <label for="valor_descuento_seguro" class="form-label">Valor descuento por seguro</label>
                                    <div class="form-group{{ $errors->has('valor_descuento_seguro') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('valor_descuento_seguro') ? ' is-invalid' : '' }}"
                                            name="valor_descuento_seguro" id="valor_descuento_seguro" type="number" placeholder="{{ __('Valor descuento por seguro') }}"
                                            value="{{ old('valor_descuento_seguro') }}" step="0.01"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="total_pagar" class="form-label">Total pagar</label>
                                    <div class="form-group{{ $errors->has('total_pagar') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('total_pagar') ? ' is-invalid' : '' }}"
                                            name="total_pagar" id="total_pagar" type="number" placeholder="{{ __('Total pagar') }}"
                                            value="{{ old('total_pagar') }}" step="0.01" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.cliente.historial_control_parental')
@endsection

@section('javascript')
    <script>
        let historialControlParental = [];
        let indiceHistorialControlParental = -1;

        $( document ).ready(function() {
            document.getElementById('valor_cobro').addEventListener('change', function(){
                calcularTotalPagar();
            });

            document.getElementById('valor_descuento_seguro').addEventListener('change', function(){
                    calcularTotalPagar();
            });


        });

        function calcularTotalPagar(){
            var valor_cita = document.getElementById('valor_cobro').value;

            if ( valor_cita == "" ){
                document.getElementById('valor_cobro').value = 0;
                valor_cita = 0;
            }

            var descuento = document.getElementById('valor_descuento_seguro').value;

            if ( descuento == "" ){
                document.getElementById('valor_descuento_seguro').value = 0;
                descuento = 0;
            }

            var total = parseFloat(valor_cita) - parseFloat(descuento);
            document.getElementById('total_pagar').value = total.toFixed(2);
        }

        function obtenerHistorialControlParentalCliente(){
            try{
                let clienteId = "{{ $cita->id_cliente }}";
                let api_historial_control_parental = "{{ route('api.auth.cliente.historial-control-parental', ['id' => ':id']) }}";
                api_historial_control_parental = api_historial_control_parental.replace(":id", clienteId);

                 $.ajax({
                    url: api_historial_control_parental,
                    type: "GET",
                    data: null,
                    dataType: "json", // Espera una respuesta en formato JSON
                    success: function(data) {
                        historialControlParental = data;
                        indiceHistorialControlParental = 0;

                        verModalHistorialControlParental(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(jqXHR);
                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            alert(jqXHR.responseJSON.message);
                        } else {
                            alert('No response from server');
                        }
                    }
                });
            }catch(error){
                alert(error.message);
            }
        }

        function verModalHistorialControlParental(){
            if ( historialControlParental.length < 1 ){
                alert("No se ha encontrado historial de control parental.");
                return;
            }

            $('#modalHistorialControlParental').modal('show')

            actualizarDatosModalHistorialControlParental();
        }

        function actualizarDatosModalHistorialControlParental(){
            let itemHistorial = historialControlParental[indiceHistorialControlParental];
            if( itemHistorial == null ){
                return;
            }

            document.getElementById("modal_cp_fecha").value = itemHistorial["fecha_atendida"];
            document.getElementById("modal_cp_edad_gestacional").value = itemHistorial["edad_gestacional"];
            document.getElementById("modal_cp_presion_arterial").value = itemHistorial["presion_arterial"];
            document.getElementById("modal_cp_altura_uterina").value = itemHistorial["altura_uterina"];
            document.getElementById("modal_cp_presentacion").value = itemHistorial["presentacion"];
            document.getElementById("modal_cp_fcf").value = itemHistorial["fcf"];
            document.getElementById("modal_cp_peso").value = itemHistorial["peso"];
            document.getElementById("modal_cp_ultrasonido").value = itemHistorial["ultrasonido"];
            document.getElementById("modal_cp_vacunas").value = itemHistorial["vacunas"];

            document.getElementById("em_indice_actual").innerText = indiceHistorialControlParental + 1;
            document.getElementById("em_total").innerText = historialControlParental.length;
        }

        function verControlParentalAnterior(){
            if ( indiceHistorialControlParental > 0 ){
                indiceHistorialControlParental--;
            }

            actualizarDatosModalHistorialControlParental();
        }

        function verControlParentalSiguiente(){
            if( indiceHistorialControlParental < historialControlParental.length ){
                indiceHistorialControlParental++;
            }

            actualizarDatosModalHistorialControlParental();
        }
    </script>
@endsection
