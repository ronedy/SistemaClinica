@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Calendario</h5>
                        <p class="card-category">Citas próximas programadas</p>
                        <div class="stats">
                            <i class="fa fa-history"></i> Historial de citas
                        </div>
                    </div>
                    <div class="card-body ">
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
                        <!--<canvas id=chartHours width="400" height="100"></canvas>-->
                        <div class="table-responsive">
                            <table class="table" id="tabla">
                                <thead class=" text-primary">
                                    <th>Fecha citada</th>
                                    <th>Paciente</th>
                                    <th>Médico</th>
                                    <th class="text-right">Operaciones</th>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($cita->fecha_citada)) }} {{ $cita->hora_citada }}</td>
                                        <td>{{ $cita->cliente->nombre . ' ' . $cita->cliente->apellido }}</td>
                                        <td>{{ $cita->doctor->nombre . ' ' . $cita->doctor->apellido }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('cita.destroy', $cita) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @if ( $cita->estado != 2 )
                                                <a rel="tooltip" class="btn btn-info" href="{{ route('cita.atender', $cita) }}" data-original-title="" title="">
                                                    Atender
                                                </a>
                                                <a rel="tooltip" class="btn btn-success" href="{{ route('cita.edit', $cita) }}" data-original-title="" title="">
                                                    Editar
                                                </a>
                                                @endif
                                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("¿Este proceso no puede revertirse, estás seguro?") }}') ? this.parentElement.submit() : ''">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            //demo.initChartsPages();
        });
    </script>

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
            var tabla = $('#tabla').DataTable( {
                //"sPaginationType": "full_numbers",
                "pageLength": 10,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_/_PAGES_",
                    "infoEmpty": "Ningun registrado encontrado",
                    "infoFiltered": "(coincidencias de _MAX_ registros)",
                    "search": "Búsqueda",
                    "LoadingRecords": "Cargando ...",
                    "Processing": "Procesando...",
                    "paginate": {
                        "previous": " < ",
                        "next": " > ",
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar como PDF',
                        orientation: 'landscape', // 'portrait', 'landscape'
                        pageSize: 'LETTER', // 'A5', ‘EXECUTIVE’, ‘FOLIO’, ‘LEGAL’, ‘LETTER’, ‘TABLOID’
                        pageMargins: [10, 10, 10, 10], // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
                        title: 'Reporte citas programads pendientes',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4], // :visible: para exportar columnas visibles
                            modifier: {
                                page: 'all' // current: para registros que se esten visualizando actualmente
                            }
                        },
                        customize: function (doc) {
                            // ajustar el 100% del ancho, la tabla exportada a pdf
                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        }
                    }
                ]
            });
        } );
    </script>
@endpush
