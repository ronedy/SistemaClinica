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
                        <h4 class="card-title">Citas</h4>
                        @if (session('mensaje'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('mensaje') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
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
                        <div class="row">
                            <div class="col-12 text-left">
                                <a href="{{ route('cita.create') }}" class="btn btn-md btn-primary">{{ __('Reservar cita') }}</a>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <form action="{{ route('cita.index') }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="fecha_inicio">{{__('Fecha inicio')}}</label>
                                <input class="form-control" type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $fecha_inicio ?? null)}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="fecha_fin">{{__('Fecha fin')}}</label>
                                <input class="form-control" type="date" name="fecha_fin" value="{{ old('fecha_fin', $fecha_fin ?? null)}}">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="submit" value="Aplicar filtros" class="btn btn-success btn-sm" style="height: 100%;">
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tabla">
                                <thead class=" text-primary">
                                    <th>Fecha citada</th>
                                    <th>Fecha atendida</th>
                                    <th>Paciente</th>
                                    <th>Médico</th>
                                    <th>Estado</th>
                                    <th class="text-right">Operaciones</th>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($cita->fecha_citada)) }} {{ $cita->hora_citada }}</td>
                                        <td>{{ $cita->fecha_atendida != '' ? $cita->fecha_atendida : 'Sin atender' }}</td>
                                        <td>{{ $cita->cliente->nombre . ' ' . $cita->cliente->apellido }}</td>
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
                                        <td class="text-right">
                                            <form action="{{ route('cita.destroy', $cita) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @if ( $cita->estado != 2 )
                                                <a rel="tooltip" class="btn btn-sm btn-info" href="{{ route('cita.atender', $cita) }}" data-original-title="" title="">
                                                    Atender
                                                </a>
                                                <a rel="tooltip" class="btn btn-sm btn-success" href="{{ route('cita.edit', $cita) }}" data-original-title="" title="">
                                                    Editar
                                                </a>
                                                @endif
                                                @if ( $cita->estado == 2 )
                                                <button type="button" rel="tooltip" class="btn btn-sm btn-warning" onclick="descargarRecetaPDF('{{ $cita->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                        <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                                    </svg>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-sm btn-secondary" onclick="previsualizarPDF('{{ $cita->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-minus" viewBox="0 0 16 16">
                                                        <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                                    </svg>
                                                </button>
                                                <a rel="tooltip" class="btn btn-sm btn-primary" href="{{ route('cita.show', $cita) }}" data-original-title="" title="">
                                                    Ver
                                                </a>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-danger" data-original-title="" title="" onclick="confirm('{{ __("¿Este proceso no puede revertirse, estás seguro?") }}') ? this.parentElement.submit() : ''">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $citas->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        .pagination .page-item.active .page-link { background-color: #000; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
            background-color: #000;
        }

        .pagination .page-item.active .page-link:hover {
            background-color: #000;
                }   
    </style>

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- export buttons -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready( function () {
            // var tabla = $('#tabla').DataTable( {
            //     //"sPaginationType": "full_numbers",
            //     "pageLength": 10,
            //     "language": {
            //         "lengthMenu": "Mostrar _MENU_ registros por pagina",
            //         "zeroRecords": "No se encontraron registros",
            //         "info": "Mostrando página _PAGE_/_PAGES_",
            //         "infoEmpty": "Ningun registrado encontrado",
            //         "infoFiltered": "(coincidencias de _MAX_ registros)",
            //         "search": "Búsqueda",
            //         "LoadingRecords": "Cargando ...",
            //         "Processing": "Procesando...",
            //         "paginate": {
            //             "previous": " < ",
            //             "next": " > ",
            //         }
            //     },
            //     dom: 'Bfrtip',
            //     buttons: [
            //         {
            //             extend: 'pdfHtml5',
            //             text: 'Exportar como PDF',
            //             orientation: 'landscape', // 'portrait', 'landscape'
            //             pageSize: 'LETTER', // 'A5', ‘EXECUTIVE’, ‘FOLIO’, ‘LEGAL’, ‘LETTER’, ‘TABLOID’
            //             pageMargins: [10, 10, 10, 10], // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
            //             title: 'Reporte citas',
            //             exportOptions: {
            //                 columns: [0, 1, 2, 3, 4, 5], // :visible: para exportar columnas visibles
            //                 modifier: {
            //                     page: 'all' // current: para registros que se esten visualizando actualmente
            //                 }
            //             },
            //             customize: function (doc) {
            //                 // ajustar el 100% del ancho, la tabla exportada a pdf
            //                 doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            //             }
            //         }
            //     ]
            // });
        } );

        function descargarRecetaPDF(idCita){
            try{
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('export.pdf.cita.receta') }}", true);
                xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4) {
                        if(xhr.status == 200) {
                            let blob = xhr.response;
                            let fileName = xhr.getResponseHeader("fileName")
                            let link=document.createElement('a');
                            link.href=window.URL.createObjectURL(blob);
                            link.download=fileName ? fileName : 'Receta Cita #' + idCita  + '.pdf';
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
                formData.set('idCita', JSON.stringify(idCita));

                xhr.send(formData);
            }catch(error){
                console.error(error);
                alert(error.message);
            }
        }

        function previsualizarPDF(idCita){
            try{
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('export.pdf.cita.ficha') }}", true);
                xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4) {
                        if(xhr.status == 200) {
                            let blob = xhr.response;
                            let fileName = xhr.getResponseHeader("fileName")
                            let link=document.createElement('a');
                            link.href=window.URL.createObjectURL(blob);
                            link.download=fileName ? fileName : 'Ficha Cita #' + idCita  + '.pdf';
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
                formData.set('idCita', JSON.stringify(idCita));

                xhr.send(formData);
            }catch(error){
                console.error(error);
                alert(error.message);
            }
        }
    </script>

@endsection
