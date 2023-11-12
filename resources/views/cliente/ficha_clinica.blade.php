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
                        <h5 class="card-title">Fícha del paciente</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <button type="button" rel="tooltip" class="btn btn-md btn-secondary" onclick="descargarExpedienteCliente('{{ $cliente->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-minus" viewBox="0 0 16 16">
                                        <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                    </svg>
                                    Descargar Expediente
                                </button>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-3">
                                <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-info">Editar cliente</a>
                            </div>
                        </div>
                        <hr />
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
                                        <th>ID</th>
                                        <th>Fecha citada</th>
                                        <th>Fecha atendida</th>
                                        <th>Médico</th>
                                        <th>Estado</th>
                                        <th>Operaciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach($citas as $cita)
                                        @if($cita->estado != 0)
                                        <tr>
                                            <td>{{  $cita->id }}</td>
                                            <td>{{ date('d/m/Y', strtotime($cita->fecha_citada)) }} {{ $cita->hora_citada }}</td>
                                            <td>{{ $cita->fecha_atendida != '' ? date('d/m/Y H:i:s', strtotime($cita->fecha_atendida)) : 'Sin atender' }}</td>
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
                                            <td class="text-left">
                                                <a rel="tooltip" class="btn btn-primary" href="{{ route('cita.show', $cita) }}" data-original-title="" title="">
                                                    Ver
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready( function () {
            //
        } );

        function descargarExpedienteCliente(idCliente){
            try{
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('export.pdf.cliente.expediente') }}", true);
                xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4) {
                        if(xhr.status == 200) {
                            let blob = xhr.response;
                            let fileName = xhr.getResponseHeader("fileName")
                            let link=document.createElement('a');
                            link.href=window.URL.createObjectURL(blob);
                            link.download=fileName ? fileName : 'Expediente Paciente #' + idCliente  + '.pdf';
                            link.click();
                        } else if(xhr.responseText != "") {
                            console.log(xhr);
                            mostrarAlerta(xhr.responseText, 3);
                        }
                    } else if(xhr.readyState == 2) {
                        if(xhr.status == 200) {
                            xhr.responseType = "blob";
                        } else {
                            xhr.responseType = "application/json";
                        }
                    }
                };

                let formData = new FormData();
                formData.set('idCliente', JSON.stringify(idCliente));

                xhr.send(formData);
            }catch(error){
                console.error(error);
                alert(error.message);
            }
        }
    </script>
@endsection
