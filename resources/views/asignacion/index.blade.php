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
                        <h4 class="card-title">Asignaciones de seguro y clientes</h4>
                    </div>
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
                    <div class="row">
                        <div class="col-12 text-left">
                            <a href="{{ route('asignacionSeguro.create') }}" class="btn btn-md btn-primary">{{ __('Agregar nuevo') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Paciente
                                    </th>
                                    <th>
                                        Seguro
                                    </th>
                                    <th>
                                        Valor descuento
                                    </th>
                                    <th class="text-right">
                                        Operaciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($asignaciones as $asignacionSeguro)
                                    <tr>
                                        <!-- condicion ? true : false -->
                                        <!-- miramos si hay cliente asignado, si es asi obtenemos sus datos, si no pues solo hacemos comillas -->
                                        <td>{{ $asignacionSeguro->cliente ? $asignacionSeguro->cliente->nombre . ' ' . $asignacionSeguro->cliente->apellido : '' }}</td>
                                        <td>{{ $asignacionSeguro->seguro ? $asignacionSeguro->seguro->descripcion : '' }}</td>
                                        <td>{{ $asignacionSeguro->valor_descuento }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('asignacionSeguro.destroy', $asignacionSeguro) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('asignacionSeguro.edit', $asignacionSeguro) }}" data-original-title="" title="">
                                                    Editar
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Este proceso no puede revertirse, estás seguro?") }}') ? this.parentElement.submit() : ''">
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
                </div>
            </div>
        </div>
    </div>
@endsection