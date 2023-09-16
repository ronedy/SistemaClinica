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
                        <h4 class="card-title">Pacientes</h4>
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
                            <a href="{{ route('cliente.create') }}" class="btn btn-md btn-primary">{{ __('Agregar cliente') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Correo
                                    </th>
                                    <th>
                                        Dirección
                                    </th>
                                    <th class="text-right">
                                        Operaciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->correo }}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('cliente.destroy', $cliente) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('cliente.show', $cliente) }}" data-original-title="" title="">
                                                    Ficha clínica
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('cliente.edit', $cliente) }}" data-original-title="" title="">
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