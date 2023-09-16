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
                        <h4 class="card-title">Doctores</h4>
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
                            <a href="{{ route('doctor.create') }}" class="btn btn-md btn-primary">{{ __('Agregar doctor') }}</a>
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
                                        Dirección
                                    </th>
                                    <th>
                                        Télefono
                                    </th>
                                    <th>
                                        Correo
                                    </th>
                                    <th class="text-right">
                                        Operaciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($doctores as $doctor)
                                    <tr>
                                        <td>{{ $doctor->nombre }} {{ $doctor->apellido }}</td>
                                        <td>{{ $doctor->direccion }}</td>
                                        <td>{{ $doctor->telefono }}</td>
                                        <td>{{ $doctor->correo }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('doctor.destroy', $doctor) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('doctor.edit', $doctor) }}" data-original-title="" title="">
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